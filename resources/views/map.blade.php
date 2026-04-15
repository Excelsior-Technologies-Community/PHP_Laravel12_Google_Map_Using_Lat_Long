<!DOCTYPE html>
<html>
<head>
    <title>Google Map in Laravel 12</title>

    <style>
        #map {
            height: 500px;
            width: 100%;
        }

        #coords {
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Google Map in Laravel 12</h2>

<div id="map"></div>

<!--Coordinates Display -->
<p id="coords">Click on map to get coordinates</p>

<script>
    function initMap() {

        // Get locations from Laravel
        const locations = @json($locations);

        // Initialize map centered at first location
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13,
            center: {
                lat: locations[0].lat,
                lng: locations[0].lng
            },
        });

        //  Multiple Markers
        locations.forEach(function(loc) {
            new google.maps.Marker({
                position: { lat: loc.lat, lng: loc.lng },
                map: map,
                title: loc.title
            });
        });

        //  Click to Add Marker + Show Coordinates
        map.addListener("click", function(event) {

            // Show lat/lng in UI
            document.getElementById("coords").innerText =
                "Latitude: " + event.latLng.lat() +
                " , Longitude: " + event.latLng.lng();

            // Add marker on click
            new google.maps.Marker({
                position: event.latLng,
                map: map
            });
        });
    }
</script>

<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_map.key') }}&callback=initMap" async defer></script>

</body>
</html>