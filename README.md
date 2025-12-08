🌐 Laravel 12 – Google Map Integration Demo

Project Name: google-map-app
Laravel Version: 12.x
By: Manasi Patel
Date: 2025

🚀 Project Aim

This project demonstrates how to:

Integrate Google Maps inside a Laravel 12 application.

Create a controller to manage map data.

Setup routes to load the map page.

Pass latitude and longitude from Laravel to JavaScript.

Display a marker on the map.

Make a fully responsive, beginner-friendly map page.

📌 Why Google Maps in Laravel?

Integrating Google Maps is useful for:

Showing company locations, offices, or branches.

Adding markers for stores, events, or real estate.

Dynamically displaying locations from a database.

Learning how to pass PHP data to JavaScript in Blade templates.

STEP 1: Create Laravel 12 Project

Command:

composer create-project laravel/laravel google-map-app "12.*"
cd google-map-app
php artisan serve


Explanation:

Installs Laravel 12 project.

Creates google-map-app folder.

Starts the development server.

STEP 2: Create Controller

Command:

php artisan make:controller MapController


Explanation:

Controllers handle the logic and send data to views.

MapController will manage the map page and provide latitude/longitude to Blade.

File: app/Http/Controllers/MapController.php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        // Default location: Excelsior Technologies, Ahmedabad
        $location = [
            'lat' => 23.0455039,  // Latitude
            'lng' => 72.5051614   // Longitude
        ];

        // Send coordinates to Blade view
        return view('map', compact('location'));
    }
}


Explanation:

$location array stores latitude & longitude.

compact('location') sends data to the Blade view.

Blade can access them as {{ $location['lat'] }} and {{ $location['lng'] }}.

STEP 3: Add Route

File: routes/web.php

use App\Http\Controllers\MapController;

// Route to display Google Map
Route::get('/map', [MapController::class, 'index']);


Explanation:

Visiting /map calls index() in MapController.

Loads map.blade.php view.

STEP 4: Generate Google Maps API Key

Why API Key is needed:

Google verifies requests come from allowed websites.

Prevents misuse or quota overuse.

Steps:

Go to Google Cloud Console
.

Create a new project.

Enable Maps JavaScript API.

Create an API Key.

Replace YOUR_API_KEY in Blade with this key.

STEP 5: Create Blade View

Folder: resources/views
File: map.blade.php

<!DOCTYPE html>
<html>
<head>
    <title>Google Map in Laravel 12</title>
    <style>
        /* Container for Google Map */
        #map {
            height: 500px;  /* Map height */
            width: 100%;    /* Map width */
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Google Map Example (Laravel 12)</h2>

<!-- Map container -->
<div id="map"></div>

<script>
    function initMap() {
        // Get coordinates from Laravel
        var location = {
            lat: {{ $location['lat'] }},  // Latitude from Controller
            lng: {{ $location['lng'] }}   // Longitude from Controller
        };

        // Initialize map
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,           // Zoom level
            center: location    // Center map on location
        });

        // Add marker
        new google.maps.Marker({
            position: location,          // Marker position
            map: map,                    // Attach to map
            title: "Excelsior Technologies®"  // Tooltip
        });
    }
</script>

<!-- Load Google Maps JavaScript API -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

</body>
</html>


Explanation:

<div id="map"></div> → Container for the map.

CSS ensures height & width of the map.

initMap() initializes the map using Laravel coordinates.

Marker displays the company location dynamically.

STEP 6: Run the Application

Command:

php artisan serve


Open in browser:

http://127.0.0.1:8000/map


Result:

Google Map loads with a marker at the specified location.

Fully functional and dynamic.

No database needed.

📚 Project Structure
google-map-app/
│
├── app/
│   └── Http/
│       └── Controllers/
│           └── MapController.php   # Logic for map
│
├── resources/
│   └── views/
│       └── map.blade.php           # Map UI using Blade + JS
│
└── routes/
    └── web.php                     # Route for map page
