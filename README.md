 PHP_Laravel12_Google_Map_Using_Lat_Long
---
Project Name: PHP_Laravel12_Google_Map_Using_Lat_Long

Laravel Version: 12.x

By: Manasi Patel

Date: 2025
---
 Project Aim

This project demonstrates how to:

Integrate Google Maps inside a Laravel 12 application.

Create a controller to manage map data.

Setup routes to load the map page.

Pass latitude and longitude from Laravel to JavaScript.

Display a marker on the map.

Make a fully responsive, beginner-friendly map page.
---
 Why Google Maps in Laravel?

Display company locations, offices, or branches.

Add markers for stores, events, or real estate.

Dynamically display locations from a database.

Learn how to pass PHP data to JavaScript in Blade templates.
---
STEP 1: Create Laravel 12 Project

Command:
```
composer create-project laravel/laravel PHP_Laravel12_Google_Map_Using_Lat_Long "12.*"
cd PHP_Laravel12_Google_Map_Using_Lat_Long
php artisan serve
```

Explanation:

composer create-project laravel/laravel google-map-app "12.*" → Installs Laravel version 12 into a folder named google-map-app.

cd google-map-app → Moves into the project directory.

php artisan serve → Starts a local development server at http://127.0.0.1:8000.

STEP 2: Create Controller

Command:
```
php artisan make:controller MapController
```

This generates a controller file at app/Http/Controllers/MapController.php.

Controller Code:
```
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

        // Pass the location data to the Blade view
        return view('map', compact('location'));
    }
}

```
Explanation:

$location is an array holding latitude and longitude.

compact('location') sends $location to the Blade view named map.blade.php.

STEP 3: Add Route

File: routes/web.php
```
<?php

use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;

// Default Laravel welcome page
Route::get('/', function () {
    return view('welcome');
});

// Route for the Google Map page
Route::get('/map', [MapController::class, 'index']);

```
Explanation:

/map URL will load the map page.

It calls the index() method of MapController.

STEP 4: Generate Google Maps API Key
```
Go to Google Cloud Console.

Create a new project.

Enable Maps JavaScript API.

Generate a new API Key.

Replace YOUR_API_KEY in the Blade view script with this key.
```
STEP 5: Create Blade View

File: resources/views/map.blade.php
```
<!DOCTYPE html>
<html>
<head>
    <title>Google Map in Laravel 12</title>
    <style>
        /* Container for Google Map */
        #map {
            height: 500px;  /* Map height */
            width: 100%;    /* Full width */
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Google Map Example (Laravel 12)</h2>

<!-- Map container -->
<div id="map"></div>

<script>
    // Initialize the map
    function initMap() {
        // Get coordinates from Laravel Controller
        var location = {
            lat: {{ $location['lat'] }},  // Latitude
            lng: {{ $location['lng'] }}   // Longitude
        };

        // Create the map centered at the location
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,           // Zoom level (1 = world, 20 = street)
            center: location    // Center the map at our location
        });

        // Add a marker at the location
        new google.maps.Marker({
            position: location,           // Marker position
            map: map,                     // Attach marker to map
            title: "Excelsior Technologies®"  // Tooltip text
        });
    }
</script>

<!-- Load Google Maps JavaScript API -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

</body>
</html>
```

Explanation:

{{ $location['lat'] }} → Passes PHP variable to JavaScript.

google.maps.Map → Creates a new map object.

google.maps.Marker → Adds a marker at the given coordinates.

async defer → Loads the Google Maps API asynchronously without blocking HTML rendering.

STEP 6: Run the Application
---
Command:
```
php artisan serve
```

Open in browser:
```
http://127.0.0.1:8000/map
```

Result:
---

<img width="1919" height="972" alt="Screenshot 2025-12-08 131801" src="https://github.com/user-attachments/assets/9b7fff5b-7fdb-42b4-9bb4-05fe38c2ef90" />



Google Map loads.

Marker is displayed at Excelsior Technologies, Ahmedabad.

Fully functional, dynamic, and responsive.

 Project Structure
```
PHP_Laravel12_Google_Map_Using_Lat_Long/
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
