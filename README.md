🌐 Laravel 12 – Google Map Integration Demo

Project Name: google-map-app
Laravel Version: 12.x
Author: Manasi Patel
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
composer create-project laravel/laravel google-map-app "12.*"
cd google-map-app
php artisan serve


Explanation:

Installs Laravel 12 project.

Creates google-map-app folder.

Starts the development server.

STEP 2: Create Controller
php artisan make:controller MapController


Explanation:

Controllers handle the logic and send data to views.

MapController will manage the map page and provide latitude/longitude to Blade.

Controller Code: app/Http/Controllers/MapController.php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    // Function to load the map page
    public function index()
    {
        // Default location coordinates (Excelsior Technologies, Ahmedabad)
        $location = [
            'lat' => 23.0455039,  // Latitude
            'lng' => 72.5051614   // Longitude
        ];

        // Send $location array to the Blade view named 'map'
        return view('map', compact('location'));
        // compact('location') creates an array ['location' => $location]
        // Blade can now access $location['lat'] and $location['lng']
    }
}

STEP 3: Add Route
routes/web.php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;

// Route to display Google Map
Route::get('/map', [MapController::class, 'index']);


Explanation:

Visiting /map calls the index() method in MapController.

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

Replace YOUR_API_KEY in the Blade file with this key.

STEP 5: Create Blade View
resources/views/map.blade.php
<!DOCTYPE html>
<html>
<head>
    <title>Google Map in Laravel 12</title>
    <style>
        /* Container for Google Map */
        #map {
            height: 500px; /* Map height */
            width: 100%;   /* Map full width */
        }
    </style>
</head>
<body>

<!-- Page Heading -->
<h2 style="text-align:center;">Google Map Example (Laravel 12)</h2>

<!-- Google Map Container -->
<div id="map"></div>

<script>
    // Function to initialize Google Map
    function initMap() {
        // Get coordinates passed from Laravel Blade
        var location = {
            lat: {{ $location['lat'] }},  // Latitude from controller
            lng: {{ $location['lng'] }}   // Longitude from controller
        };

        // Create a new map centered at the location
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,            // Zoom level (1-20)
            center: location     // Center map at coordinates
        });

        // Add a marker at the location
        new google.maps.Marker({
            position: location,  // Marker position
            map: map,            // Attach to our map
            title: "Excelsior Technologies®"  // Tooltip text on hover
        });
    }
</script>

<!-- Load Google Maps API (replace YOUR_API_KEY with actual key) -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

</body>
</html>


Explanation of Key Parts:

{{ $location['lat'] }} and {{ $location['lng'] }} → Pass PHP variables to JavaScript.

initMap() → Called automatically by Google Maps API callback.

zoom: 16 → Close-up view; higher numbers zoom in more.

Marker → Shows a pin with your company name on the map.

STEP 6: Run the Application
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
