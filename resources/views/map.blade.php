<!DOCTYPE html>
<html>
<head>
    <title>Google Map in Laravel 12</title>

    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Google Map in Laravel 12</h2>

<div id="map"></div>

<script>
    function initMap() {
        const myLatLng = {
            lat: {{ $location['lat'] }},
            lng: {{ $location['lng'] }},
        };

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13,
            center: myLatLng,
        });

        new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: "Default Location",
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_map.key') }}
&callback=initMap" async defer></script>

</body>
</html>
