<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeCareer = Career::where('status', 'publish')->paginate(10);
        $draftCareer = Career::where('status', 'draft')->paginate(10);
        $trashedCareer = Career::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.career.index', compact('activeCareer', 'draftCareer', 'trashedCareer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.career.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'deadline' => 'required',
            'description' => 'nullable',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        $slider = $request->file('slider');
        $photo = $request->file('photo');
        $meta_photo = $request->file('meta_photo');
        if ($photo) {
            $folder = 'career';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        if ($slider) {
            $folder = 'team';
            $response = cloudUpload($slider, $folder, null);
            $slider = $response;
        }
        if ($meta_photo) {
            $folder = 'career';
            $response = cloudUpload($meta_photo, $folder, null);
            $meta_photo = $response;
        }
        Career::create([
            'title' => $request->title,
            'slider' => $slider,
            'description' => $request->description,
            'job_type' => $request->job_type,
            'salary' => $request->salary,
            'alt_text' => $request->alt_text,
            'photo' => $photo,
            'meta_photo' => $meta_photo,
            'location' => $request->location,
            'deadline' => $request->deadline,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);
        return back()->with('success', 'Career Added Successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        return view('backend.career.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Career $career)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($request->has('photo')) {
            $folder = 'career';
            $response = cloudUpload($request->photo, $folder, $career->photo);
            $career->photo = $response;
        }
        if ($request->has('slider')) {
            $folder = 'career';
            $response = cloudUpload($request->slider, $folder, $career->slider);
            $career->slider = $response;
        }
        if ($request->has('meta_photo')) {
            $folder = 'career';
            $response = cloudUpload($request->meta_photo, $folder, $career->meta_photo);
            $career->meta_photo = $response;
        }
        $career->update([
            'title' => $request->title,
            'description' => $request->description,
            'slider' => $career->slider,
            'job_type' => $request->job_type,
            'salary' => $request->salary,
            'alt_text' => $request->alt_text,
            'photo' => $career->photo,
            'meta_photo' => $career->meta_photo,
            'location' => $request->location,
            'deadline' => $request->deadline,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);
        return redirect(route('backend.career.index'))->with('success', 'Career Edit Successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        $career->status == 'draft';
        $career->save();
        $career->delete();
        return back()->with('success', 'career Item Trashed');
    }
    public function status(Career $career)
    {
        if ($career->status == 'publish') {
            $career->status = 'draft';
            $career->save();
        } else {
            $career->status = 'publish';
            $career->save();
        }
        return back()->with('success', $career->status == 'publish' ? 'Career info Published' : 'Career info Drafted');
    }
    public function reStore($id)
    {
        $career = Career::onlyTrashed()->find($id);
        $career->restore();
        return back()->with('success', 'Career Info Restored');
    }
    public function permDelete($id)
    {
        $career = Career::onlyTrashed()->find($id);
        $career->forceDelete();
        return back()->with('success', 'Career Info Deleted');
    }
}
