<?php

namespace App\Http\Controllers\Backend;

use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // $parent =  RequirementType::where('status', 'publish')->whereNull('parent_id')->get();
        $activeRequirement = Location::where('status', 'publish')->paginate(10);
        $draftRequirement = Location::where('status', 'draft')->paginate(10);
        $trashedRequirement = Location::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.location.index', compact('activeRequirement', 'draftRequirement', 'trashedRequirement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Location::create([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

        ]);
        return back()->with('success', 'Location  Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        Location::where('id', $request->id)->update([
            'name' => $request->name,

            'slug' => Str::slug($request->slug ?? $request->name),
        ]);
        return back()->with('success', 'Location Info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->status == 'draft';
        $location->save();
        $location->delete();
        return back()->with('success', 'Location Trashed');
    }
    public function status(Location $location)
    {
        if ($location->status == 'publish') {
            $location->status = 'draft';
            $location->save();
        } else {
            $location->status = 'publish';
            $location->save();
        }
        return back()->with('success', $location->status == 'publish' ? 'location type Published' : 'location Type Drafted');
    }
    public function reStore($id)
    {
        $terms = Location::onlyTrashed()->find($id);
        $terms->restore();
        return back()->with('success', 'Location Info Restored');
    }
    public function permDelete($id)
    {
        $terms = Location::onlyTrashed()->find($id);
        $terms->forceDelete();
        return back()->with('success', 'Location Info Deleted');
    }
}
