<?php

namespace App\Http\Controllers;

use App\Interest;
use App\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show user properties
     */
    public function showUserProperties()
    {
        $properties = auth()->user()->properties;

        return view('properties', compact('properties'));
    }

    /**
     * Apply for property
     */
    public function applyForProperty(Request $request, int $propertyId)
    {
        if ($this->checkPreviousApplication($propertyId)) {
            session()->flash('error', 'You have already applied for this property.');
            return redirect()->back();
        }

        $interest = new Interest();
        $interest->user_id = auth()->id();
        $interest->property_id = $propertyId;
        $interest->save();

        session()->flash('success', 'Successfully applied.');
        return redirect()->back();
    }

    public function checkPreviousApplication(int $propertyId)
    {
        $interest = Interest::wherePropertyId($propertyId)->whereUserId(auth()->id())->first();

        if ($interest) {
            return true;
        }

        return false;
    }

    /**
     * Log a user out of the application
     */
    public function logout()
    {
        auth()->logout();

        return redirect()->to('/');
    }
}
