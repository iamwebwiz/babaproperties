<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Property;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Fetch all users except the admin
     */
    public function index()
    {
        $users = User::whereIsAdmin(false)->orderBy('created_at', 'DESC')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show a single user
     *
     * @param int $userId
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(int $userId)
    {
        $user = User::with(['properties', 'interests'])->find($userId);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Terminate user's tenancy of a property
     *
     * @param int $userId
     * @param int $propertyId
     * @return \Illuminate\Http\Response
     */
    public function terminateTenancy(int $userId, int $propertyId)
    {
        $property = Property::find($propertyId);
        $property->user_id = null;
        $property->tenancy_expires_at = null;
        $property->available = true;
        $property->save();

        session()->flash('info', 'User tenancy has been terminated.');
        return redirect()->back();
    }

    /**
     * Delete user
     *
     * @param \Illuminate\Http\Request $request
     * @param App\User $user
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        session()->flash('success', 'User has been deleted.');
        return redirect()->route('admin.users');
    }
}
