<?php

namespace App\Http\Controllers\Backend;

use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activevideo = VideoGallery::where('status', 'publish')->paginate(10);
        $draftvideo = VideoGallery::where('status', 'draft')->paginate(10);
        $trashedvideo = VideoGallery::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        $whychooseModaldata = VideoGallery::get();
        return view('backend.video.index', compact('activevideo', 'draftvideo', 'trashedvideo','whychooseModaldata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);
        $photo = $request->file('photo');
        
        if ($photo) {
            $folder = 'videoGallery';
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
        
        VideoGallery::create([
            'title' => $request->title,
            'alt_text' => $request->alt_text,
            'photo' => $photo,
            'video' => $request->video,

        ]);
        Toastr::success('Video Gallery Info Added Successful!','Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoGallery $videoGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoGallery $videoGallery)
    {
        return view('backend.video.edit',compact('videoGallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VideoGallery $videoGallery)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);
        $photo = $request->file('photo');
        if ($photo) {
            $folder = 'videoGallery';
            $response = cloudUpload($request->photo, $folder, $videoGallery->photo);
            $videoGallery->photo = $response;
        }

        // if ($request->hasFile('video')) {
        //     $folder = 'videoGallery';
        //     $response = cloudUpload($request->video, $folder, $videoGallery->video);
        //     $videoGallery->video = $response;
        // }
        
        $videoGallery->update([
            'title' => $request->title,
            'alt_text' => $request->alt_text,
            'photo' => $videoGallery->photo,
            'video' => $request->video,

        ]);
        Toastr::success('Video Gallery Info Updated!','Success');
        return redirect(route('backend.videoGallery.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoGallery $videoGallery)
    {
        $videoGallery->status == 'draft';
        $videoGallery->save();
        $videoGallery->delete();
        Toastr::success('Video Gallery Info Added Trashed!','Success');
        return back();
    }
    public function status(VideoGallery $videoGallery)
    {
        if ($videoGallery->status == 'publish') {
            $videoGallery->status = 'draft';
            $videoGallery->save();
        } else {
            $videoGallery->status = 'publish';
            $videoGallery->save();
        }
        Toastr::success($videoGallery->status == 'publish' ? 'VideoGallery  info Published' : 'VideoGallery Info Drafted','Success');
        return back();
    }
    public function reStore($id)
    {
        $videoGallery = VideoGallery::onlyTrashed()->find($id);
        $videoGallery->restore();
        Toastr::success('VideoGallery Info Restored!','Success');
        
        return back();
    }
    public function permDelete($id)
    {
        $videoGallery = VideoGallery::onlyTrashed()->find($id);
        $videoGallery->forceDelete();
        Toastr::success('VideoGallery Info Deleted!','Success');
        return back();
    }
}
