<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Features;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activeRequirement = Features::where('status', 'publish')->paginate(10);
        $draftRequirement = Features::where('status', 'draft')->paginate(10);
        $trashedRequirement = Features::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.features.index', compact('activeRequirement', 'draftRequirement', 'trashedRequirement'));
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
    public function show(Features $features)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Features $features)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $features = Features::where('id', $request->id)->first();

        if ($request->has('photo')) {
            $folder = 'property';
            $response = cloudUpload($request->photo, $folder, $features->photo);
            $features->photo = $response;
        }





        Features::where('id', $request->id)->update([

            'photo' => $features->photo,
            'alt_text' => $request->alt_text,
            'title' => $request->title,
            'description' => $request->description,

        ]);

        return redirect(route('backend.features.index'))->with('success', 'features Info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Features $features)
    {
        $features->status == 'draft';
        $features->save();
        $features->delete();
        return back()->with('success', 'features Trashed');
    }
    public function status(Features $features)
    {
        if ($features->status == 'publish') {
            $features->status = 'draft';
            $features->save();
        } else {
            $features->status = 'publish';
            $features->save();
        }
        return back()->with('success', $features->status == 'publish' ? 'features type Published' : 'features Drafted');
    }
    public function reStore($id)
    {
        $terms = Features::onlyTrashed()->find($id);
        $terms->restore();
        return back()->with('success', 'Features Info Restored');
    }
    public function permDelete($id)
    {
        $terms = Features::onlyTrashed()->find($id);
        $terms->forceDelete();
        return back()->with('success', 'Features deleted');
    }
}