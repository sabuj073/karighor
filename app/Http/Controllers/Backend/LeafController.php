<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Leaf;
use Illuminate\Http\Request;

class LeafController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $activePartner = Leaf::where('status', 'publish')->paginate(10);
        $draftPartner = Leaf::where('status', 'draft')->paginate(10);
        $trashedPartner = Leaf::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.leaf.index', compact('activePartner', 'draftPartner', 'trashedPartner'));
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
    public function show(Leaf $leaf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leaf $leaf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leaf $leaf)
    {
        $leaf = Leaf::where('id', $request->id)->first();


        if ($request->has('photo')) {
            $folder = 'leaf';
            $response = cloudUpload($request->photo, $folder, $leaf->photo);
            $leaf->photo = $response;
        }




        Leaf::where('id', $request->id)->update([



            'photo' => $leaf->photo,
            'section_name' => $request->section_name,
            'alt_text' => $request->alt_text,
        ]);

        return back()->with('success', 'Leaf  Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leaf $leaf)
    {
        //
    }
}
