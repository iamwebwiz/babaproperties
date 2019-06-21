<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $properties = Property::whereAvailable(true)->get();
        $locations = Property::pluck('address');

        return response()->json([
            'properties' => $properties,
            'locations' => $locations,
        ], 200);
    }

    /**
     * Filter properties
     */
    public function filterProperties(Request $request)
    {
        $location = $request->query('location');
        $type = $request->query('type');
        $minimum_price = $request->query('min_price');
        $maximum_price = $request->query('max_price');

        $properties = DB::table('properties')->where('address', $location)
            ->where('type', $type)
            ->whereBetween('price', [$minimum_price, $maximum_price])
            ->get();

        return response()->json([
            'properties' => $properties,
        ], 200);
    }
}
