<?php

namespace App\Http\Controllers\Backend;

use App\Models\dreamWithUs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class DreamConreoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activedreamWithUs = dreamWithUs::where('status', 'publish')->paginate(10);
        $draftdreamWithUs = dreamWithUs::where('status', 'draft')->paginate(10);
        $trasheddreamWithUs = dreamWithUs::onlyTrashed()->orderBy('id', 'desc')->paginate(10);

        return view('backend.dreamWithUs.index', compact('activedreamWithUs', 'draftdreamWithUs', 'trasheddreamWithUs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.dreamWithUs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $photo = $request->file('photo');

        if ($photo) {
            $folder = 'dreamWithUs';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        // if ($video) {
        //     $folder = 'videoGallery';
        //     $response = cloudUpload($video, $folder, null);
        //     $video = $response;
        // }

        // if ($request->hasFile('video')) {
        //     $video = $request->file('video');
        //     $videoName = time() . '_' . uniqid() . '.' . $video->getClientOriginalExtension();
        //     $video->move('storage/video', $videoName);
        // }

        dreamWithUs::create([
            'title' => $request->title,
            'slug' => Str::slug($request->slug ?? $request->title),
            'description' => $request->description,
            'add_description' => $request->add_description,
            'name' => $request->name,
            'address' => $request->address,
            'photo' => $photo,
            'alt_text' => $request->alt_text,
            'video' => $request->video,

        ]);
        Toastr::success('Deam With US Added', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(dreamWithUs $dreamWithUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dreamWithUs $dreamWithUs)
    {

        return view('backend.dreamWithUs.edit', compact('dreamWithUs'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dreamWithUs $dreamWithUs)
    {
        //

        $photo = $request->file('photo');
        if ($photo) {
            $folder = 'dreamWithUs';
            $response = cloudUpload($request->photo, $folder, $dreamWithUs->photo);
            $dreamWithUs->photo = $response;
        }

        // if ($request->hasFile('video')) {
        //     $folder = 'videoGallery';
        //     $response = cloudUpload($request->video, $folder, $videoGallery->video);
        //     $videoGallery->video = $response;
        // }

        $dreamWithUs->update([
            'title' => $request->title,
            'slug' => Str::slug($request->slug ?? $dreamWithUs->slug),
            'description' => $request->description,
            'add_description' => $request->add_description,
            'name' => $request->name,
            'address' => $request->address,
            'photo' => $dreamWithUs->photo,
            'alt_text' => $request->alt_text,
            'video' => $request->video,

        ]);
        Toastr::success('Deam With US Updated', 'success');
        return redirect(route('backend.dreamWithUs.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dreamWithUs $dreamWithUs)
    {
        $dreamWithUs->status == 'draft';
        $dreamWithUs->save();
        $dreamWithUs->delete();
        return back()->with('success', 'dreamWithUs Info Trashed');
    }
    public function status(dreamWithUs $dreamWithUs)
    {
        if ($dreamWithUs->status == 'publish') {
            $dreamWithUs->status = 'draft';
            $dreamWithUs->save();
        } else {
            $dreamWithUs->status = 'publish';
            $dreamWithUs->save();
        }
        return back()->with('success', $dreamWithUs->status == 'publish' ? 'dreamWithUs  info Published' : 'dreamWithUs Info Drafted');
    }
    public function reStore($id)
    {
        $dreamWithUs = dreamWithUs::onlyTrashed()->find($id);
        $dreamWithUs->restore();
        return back()->with('success', 'dreamWithUs Info Restored');
    }
    public function permDelete($id)
    {
        $dreamWithUs = dreamWithUs::onlyTrashed()->find($id);
        $dreamWithUs->forceDelete();
        return back()->with('success', 'dreamWithUs Info Deleted');
    }
}
