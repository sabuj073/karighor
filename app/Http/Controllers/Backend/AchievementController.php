<?php

namespace App\Http\Controllers\Backend;

use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        return view('backend.achievement.edit',compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);
        
        if ($request->has('photo')) {          
            $folder = 'Achievement';
            $response = cloudUpload($request->photo, $folder, $achievement->photo);
            $achievement->photo = $response;
        }
        $achievement->update([
            'photo' => $achievement->photo,
            'description' => $request->description,
        ]);
        Toastr::success('Achievement Info Updated!','Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        //
    }
}
