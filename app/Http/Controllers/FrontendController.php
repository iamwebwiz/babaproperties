<?php

namespace App\Http\Controllers;

use App\Property;

class FrontendController extends Controller
{
    /**
     * Show the landing page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show property details
     *
     * @param App\Property $property
     */
    public function showPropertyDetails(Property $property)
    {
        return view('property', compact('property'));
    }
}
