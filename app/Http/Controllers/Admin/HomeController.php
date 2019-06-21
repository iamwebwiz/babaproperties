<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Property;
use App\User;

class HomeController extends Controller
{
    /**
     * Show the administrator dashboard
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $properties = Property::all();
        $users = User::whereIsAdmin(false)->get();

        return view('admin.index', compact('properties', 'users'));
    }
}
