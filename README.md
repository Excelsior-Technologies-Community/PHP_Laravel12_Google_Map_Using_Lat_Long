Google Map Integration in Laravel 12 (Fully Explained)

By: Manasi Patel
Date: 2025
Laravel Version: 12

This project demonstrates how to integrate Google Maps inside a Laravel 12 application.
Everything is explained in a very simple way so even beginners can understand clearly.

⭐ Overview

This project teaches you how to:

Install and setup Laravel 12.

Create a controller to manage map data.

Setup routes to load the map page.

Load Google Maps inside a Blade view.

Pass latitude and longitude from Laravel to JavaScript.

Generate and use a Google Maps API key.

Display a marker on the map.

Fully responsive and beginner-friendly.

🧰 Requirements

PHP 8.2+ – Required by Laravel 12.

Composer – For installing Laravel and dependencies.

Laravel 12 – Latest version.

Google Maps API Key – To safely load maps on your site.

🚀 Step 1 — Create a New Laravel 12 Project
composer create-project laravel/laravel google-map-app "12.*"


Explanation:

Downloads all Laravel 12 project files.

"12.*" ensures Laravel version 12 is installed.

Creates a new folder called google-map-app.

🚀 Step 2 — Go Inside the Project Folder
cd google-map-app


Explanation:
You must be inside the project folder to run Laravel commands like php artisan serve or make:controller.

🚀 Step 3 — Create a Controller
php artisan make:controller MapController


Explanation:

Controllers handle logic and return views.

MapController will manage the map page and send coordinates to the view.

Laravel creates the file here:
app/Http/Controllers/MapController.php

🚀 Step 4 — Add Logic in Controller

File: app/Http/Controllers/MapController.php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        // Default location (example: Excelsior Technologies, Ahmedabad)
        $location = [
            'lat' => 23.0455039,  // Latitude
            'lng' => 72.5051614   // Longitude
        ];

        // Passing the $location array to the Blade view
        return view('map', compact('location'));
    }
}


Explanation:

$location array stores latitude and longitude.

compact('location') sends the array to the Blade view.

Access in Blade as {{ $location['lat'] }} and {{ $location['lng'] }}.

Makes the map dynamic, not hard-coded.

🌐 Step 5 — Add Route

File: routes/web.php

use App\Http\Controllers\MapController;

// When user opens /map, call index() method of MapController
Route::get('/map', [MapController::class, 'index']);


Explanation:

Visiting http://127.0.0.1:8000/map calls index() in MapController.

Loads map.blade.php.

Demonstrates URL → Controller → View flow in Laravel.

🔑 Step 6 — Generate Google Maps API Key

Why API Key is needed:

Google verifies requests come from allowed websites.

Prevents misuse and quota overflow.

Steps to get the key:

Go to Google Cloud Console
.

Create a new project.

Enable Maps JavaScript API.

Create API Key and copy it.

Replace YOUR_API_KEY in Blade with this key.

🖥️ Step 7 — Create Blade View

File: resources/views/map.blade.php

<!DOCTYPE html>
<html>
<head>
    <title>Google Map in Laravel 12</title>
    <style>
        /* Map container size */
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Google Map Example (Laravel 12)</h2>

<!-- Map will load inside this div -->
<div id="map"></div>

<script>
    // Function to initialize Google Map
    function initMap() {

        // Get coordinates from Laravel controller
        var location = {
            lat: {{ $location['lat'] }},
            lng: {{ $location['lng'] }}
        };

        // Create the map
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,          // Zoom level
            center: location   // Center on coordinates
        });

        // Add marker
        new google.maps.Marker({
            position: location,
            map: map,
            title: "Excelsior Technologies®"
        });
    }
</script>

<!-- Load Google Maps JavaScript API -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

</body>
</html>


Explanation of Blade File:

<div id="map"></div> → Container for the map.

CSS ensures the map has height and width.

initMap() is called automatically when the script loads.

$location['lat'] and $location['lng'] pass PHP values to JS.

new google.maps.Marker({...}) adds a marker.

Replace YOUR_API_KEY with your actual Google Maps API Key.

▶️ Step 8 — Run the Laravel Application
php artisan serve


Open in browser:

http://127.0.0.1:8000/map


Result:

Google Map loads.

Marker shows the location.

No database is needed.

Fully functional map for practice, assignments, or viva.

📚 Project Structure (Explained)
google-map-app/
│
├── app/
│   └── Http/
│       └── Controllers/
│           └── MapController.php   <-- Logic for map
│
├── resources/
│   └── views/
│       └── map.blade.php           <-- Map UI using HTML + JS
│
└── routes/
    └── web.php                     <-- URL for accessing map


✅ You successfully integrated Google Maps in Laravel 12

Map loads on browser

Marker displays default location

Fully dynamic and beginner-friendly
