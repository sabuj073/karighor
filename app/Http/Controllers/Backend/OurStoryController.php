<?php

namespace App\Http\Controllers\Backend;

use App\Models\OurStory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class OurStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activedreamWithUs = OurStory::where('status', 'publish')->paginate(10);
        $draftdreamWithUs = OurStory::where('status', 'draft')->paginate(10);
        $trasheddreamWithUs = OurStory::onlyTrashed()->orderBy('id', 'desc')->paginate(10);



        return view('backend.our_story.index', compact('activedreamWithUs', 'draftdreamWithUs', 'trasheddreamWithUs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.our_story.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $photo = $request->file('sec1_photo');

        if ($photo) {
            $folder = 'OurStory';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }

        OurStory::create([
            'sec1_photo' => $photo,
            'sec1_alt_text' => $request->sec1_alt_text,
            'sec1_title' => $request->sec1_title,
            'sec1_description' => $request->sec1_description,
        ]);
        Toastr::success('Our Story Added', 'success');
        return back();
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OurStory $ourStory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurStory $ourStory)
    {
        //
        return view('backend.our_story.edit', compact('ourStory'));
    }
    public function editBanner(OurStory $ourStory)
    {
        //
        return view('backend.our_story.editBanner', compact('ourStory'));
    }
    public function editSection2(OurStory $ourStory)
    {
        //
        return view('backend.our_story.editSection2', compact('ourStory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurStory $ourStory)
    {
        //
        $photo = $request->file('photo');
        if ($photo) {
            $folder = 'ourStory';
            $response = cloudUpload($request->photo, $folder, $ourStory->sec1_photo);
            $ourStory->sec1_photo = $response;
        }

        // if ($request->hasFile('video')) {
        //     $folder = 'videoGallery';
        //     $response = cloudUpload($request->video, $folder, $videoGallery->video);
        //     $videoGallery->video = $response;
        // }

        $ourStory->update([


            'sec1_photo' => $ourStory->sec1_photo,

            'sec1_alt_text' => $request->sec1_alt_text,
            'sec1_title' => $request->sec1_title,
            'sec1_description' => $request->sec1_description,

        ]);
        Toastr::success('ourStory  Updated', 'success');
        return redirect(route('backend.our_story.index'));
    }
    public function updateBanner(Request $request, OurStory $ourStory)
    {
        //
        $photo = $request->file('photo');
        if ($photo) {
            $folder = 'ourStory';
            $response = cloudUpload($request->photo, $folder, $ourStory->banner_photo);
            $ourStory->banner_photo = $response;
        }

        // if ($request->hasFile('video')) {
        //     $folder = 'videoGallery';
        //     $response = cloudUpload($request->video, $folder, $videoGallery->video);
        //     $videoGallery->video = $response;
        // }

        $ourStory->update([


            'banner_photo' => $ourStory->banner_photo,

            'banner_alt_text' => $request->banner_alt_text,
            'banner_title' => $request->banner_title,
            'banner_description' => $request->banner_description,

        ]);
        Toastr::success('ourStory  Updated', 'success');
        return redirect(route('backend.our_story.index'));
    }
    public function updateSection2(Request $request, OurStory $ourStory)
    {
        //


        // if ($request->hasFile('video')) {
        //     $folder = 'videoGallery';
        //     $response = cloudUpload($request->video, $folder, $videoGallery->video);
        //     $videoGallery->video = $response;
        // }

        $ourStory->update([

            'sec2_title' => $request->sec2_title,
            'sec2_description' => $request->sec2_description,

        ]);
        Toastr::success('ourStory  Updated', 'success');
        return redirect(route('backend.our_story.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurStory $ourStory)
    {
        $ourStory->status == 'draft';
        $ourStory->save();
        $ourStory->delete();
        return back()->with('success', 'ourStory Trashed');
    }
    public function status(OurStory $ourStory)
    {
        if ($ourStory->status == 'publish') {
            $ourStory->status = 'draft';
            $ourStory->save();
        } else {
            $ourStory->status = 'publish';
            $ourStory->save();
        }
        return back()->with('success', $ourStory->status == 'publish' ? 'ourStory type Published' : 'ourStory Drafted');
    }
    public function reStore($id)
    {
        $terms = OurStory::onlyTrashed()->find($id);
        $terms->restore();
        return back()->with('success', 'ourStory Info Restored');
    }
    public function permDelete($id)
    {
        $terms = OurStory::onlyTrashed()->find($id);
        $terms->forceDelete();
        return back()->with('success', 'ourStory Deleted');
    }
}
