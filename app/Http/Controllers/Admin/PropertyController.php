<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interest;
use App\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    /**
     * Fetch all properties
     */
    public function index()
    {
        $properties = Property::paginate();

        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Fetch a single property
     *
     * @param int $id
     */
    public function show(int $id)
    {
        $property = Property::with(['applicants', 'tenant'])->find($id);

        return view('admin.properties.show', compact('property'));
    }

    /**
     * Decline a user interest
     *
     * @param int $propertyId
     * @param int $userId
     */
    public function declineInterest(int $propertyId, int $userId)
    {
        $interest = Interest::whereUserId($userId)->wherePropertyId($propertyId)->first();
        $interest->delete();

        session()->flash('success', 'Applicant interest declined.');
        return redirect()->route('admin.properties.show', $propertyId);
    }

    /**
     * Approve a user's interest in a property
     *
     * @param int $propertyId
     * @param int $userId
     */
    public function approveInterest(int $propertyId, int $userId)
    {
        // approve user interest
        $property = Property::find($propertyId);
        $property->user_id = $userId;
        $property->tenancy_expires_at = Carbon::now()->addMonths(12);
        $property->available = false;
        $property->save();

        // delete interests
        DB::table('interests')->wherePropertyId($propertyId)->delete();

        session()->flash('success', 'Applicant interest has been approved.');
        return redirect()->route('admin.properties');
    }

    /**
     * Remove property
     *
     * @param \Illuminate\Http\Request $request
     * @param App\Property $property
     */
    public function destroy(Request $request, Property $property)
    {
        $property->delete();

        session()->flash('info', 'Property has been removed.');
        return redirect()->route('admin.properties');
    }
}
