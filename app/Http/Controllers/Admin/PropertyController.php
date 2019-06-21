<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interest;
use App\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Fetch all properties
     */
    public function index()
    {
        $properties = Property::orderBy('created_at', 'DESC')->paginate();

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

    /**
     * Update a property
     *
     * @param \Illuminate\Http\Request $request
     * @param App\Property $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'price' => 'required',
            'summary' => 'required',
            'type' => 'required',
            'address' => 'required|string',
        ]);

        $property->title = $request->title;
        $property->price = $request->price;
        $property->type = $request->type;
        $property->summary = $request->summary;
        $property->address = $request->address;
        $property->available = (bool) $request->availability;
        $property->save();

        session()->flash('info', 'Property has been updated.');
        return redirect()->back();
    }

    /**
     * Show new proeprty page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.properties.create');
    }

    /**
     * Store a new property
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'price' => 'required',
            'summary' => 'required',
            'address' => 'required|string',
        ]);

        $property = new Property();

        if ($request->hasFile('image1')) {
            $image1 = Str::random(5) . time() . '.' . $request->file('image1')->getClientOriginalExtension();
            $request->file('image1')->move(public_path('images/properties'), $image1);
            $property->image1 = $image1;
        }

        if ($request->hasFile('image2')) {
            $image2 = Str::random(5) . time() . '.' . $request->file('image2')->getClientOriginalExtension();
            $request->file('image2')->move(public_path('images/properties'), $image2);
            $property->image2 = $image2;
        }

        if ($request->hasFile('image3')) {
            $image3 = Str::random(5) . time() . '.' . $request->file('image3')->getClientOriginalExtension();
            $request->file('image3')->move(public_path('images/properties'), $image3);
            $property->image3 = $image3;
        }

        $property->title = $request->title;
        $property->price = (float) $request->price;
        $property->address = $request->address;
        $property->type = $request->type;
        $property->summary = $request->summary;
        $property->available = (bool) $request->availability;
        $property->save();

        session()->flash('success', 'Property has been added successfully.');
        return redirect()->route('admin.properties');
    }
}
