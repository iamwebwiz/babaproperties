<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Fetch all users except the admin
     */
    public function index()
    {
        $users = User::whereIsAdmin(false)->get();

        return view('admin.users.index', compact('users'));
    }
}
