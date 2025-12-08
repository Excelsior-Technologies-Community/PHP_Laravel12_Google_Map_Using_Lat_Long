<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        // Default Google Map location (example: Ahmedabad)
        // Latitude and Longitude values that will be passed to the map
        $location = [
           'lat' => 23.0452748,   // Latitude
            'lng' => 72.5053775  // Longitude
        ];

        // Passing the $location array to the view
        // compact('location') converts it into ['location' => $location]
        return view('map', compact('location'));
    }
}

