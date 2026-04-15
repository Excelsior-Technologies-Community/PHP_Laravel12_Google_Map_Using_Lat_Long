<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        // Multiple locations (Ahmedabad example)
        $locations = [
            ['lat' => 23.0452748, 'lng' => 72.5053775, 'title' => 'Location 1'],
            ['lat' => 23.0225, 'lng' => 72.5714, 'title' => 'Location 2'],
            ['lat' => 23.0300, 'lng' => 72.5800, 'title' => 'Location 3'],
        ];

        return view('map', compact('locations'));
    }
}