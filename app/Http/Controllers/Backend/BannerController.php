<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activeBanner = Banner::where('status', 'publish')->paginate(10);
        $draftBanners = Banner::where('status', 'draft')->paginate(10);
        $trashedBanners = Banner::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.banner.index', compact('activeBanner', 'draftBanners', 'trashedBanners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'video' => 'nullable|max:5000',
        ]);
        $photo = $request->file('photo');
        $video = $request->file('video');
        $promo_photo = $request->file('promo_img');
        if ($photo) {
            $folder = 'banner';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        if ($promo_photo) {
            $folder = 'banner';
            $response = cloudUpload($promo_photo, $folder, null);
            $promo_photo = $response;
        }
        if ($video) {
            $folder = 'banner';
            $response = cloudUpload($video, $folder, null);
            $video = $response;
        }

        Banner::create([
            'title' => $request->title,
            'url' => $request->url,
            'sub_title' => $request->sub_title,
            'photo' => $photo,
            'promo_img' => $promo_photo,
            'video' => $video,
            'alt_text' => $request->alt_text,
            'description' => $request->description,
            'type' => $request->type,

        ]);
        Toastr::success('Banner Added Successful!', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'video' => 'nullable|max:5000',
        ]);
        if ($request->has('photo')) {
            $folder = 'banner';
            $response = cloudUpload($request->photo, $folder, $banner->photo);
            $banner->photo = $response;
        }
        if ($request->has('promo_img')) {
            $folder = 'banner';
            $response = cloudUpload($request->promo_img, $folder, $banner->promo_img);
            $banner->promo_img = $response;
        }
        if ($request->hasFile('video')) {
            $folder = 'banner';
            $response = cloudUpload($request->video, $folder, $banner->video);
            $banner->video = $response;
        }
        $banner->update([
            'title' => $request->title,
            'url' => $request->url,
            'sub_title' => $request->sub_title,
            'alt_text' => $request->alt_text,
            'description' => $request->description,
            'photo' => $banner->photo,
            'promo_img' => $banner->promo_img,
            'video' => $banner->video,
            'type' => $request->type,


        ]);
        Toastr::success('Banner Info Updated!', 'Success');
        return redirect(route('backend.banner.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->status == 'draft';
        $banner->save();
        $banner->delete();
        Toastr::success('Banner Info Trashed!', 'Success');
        return back();
    }
    public function status(Banner $banner)
    {
        if ($banner->status == 'publish') {
            $banner->status = 'draft';
            $banner->save();
        } else {
            $banner->status = 'publish';
            $banner->save();
        }
        Toastr::success($banner->status == 'publish' ? 'Banner info Published' : 'Banner info Drafted', 'Success');
        return back();
    }
    public function reStore($id)
    {
        $banner = Banner::onlyTrashed()->find($id);
        $banner->restore();
        Toastr::success('Banner Info Restored!', 'Success');
        return back();
    }
    public function permDelete($id)
    {
        $banner = Banner::onlyTrashed()->find($id);
        $banner->forceDelete();
        Toastr::success('Banner Info Deleted!', 'Success');
        return back();
    }
}
