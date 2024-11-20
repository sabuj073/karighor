<?php

namespace App\Http\Controllers\Backend;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeService = AboutUs::where('status', 'publish')->paginate(10);
        $draftService = AboutUs::where('status', 'draft')->paginate(10);
        $trashedService = AboutUs::onlyTrashed()->orderBy('id', 'desc')->paginate(10);

        return view('backend.aboutUs.index', compact('activeService', 'draftService', 'trashedService'));
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
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs $aboutUs)
    {
        $aboutUs = AboutUs::first();
        return view('backend.aboutUs.edit', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutUs $aboutUs)
    {
        $slider = $request->file('slider');

        $s_hidden_image = $request->s_image;
        // slider image
        $s_images = [];
        if ($request->has('slider')) {
            if ($slider) {
                foreach ($slider as $s_photos) {
                    $folder = 'photo_gallery';
                    $response = cloudUpload($s_photos, $folder, null);
                    $s_images[] = $response;
                }
            }
        }

        $s_images = implode(";", $s_images);
        if (is_array($s_hidden_image)) {
            $s_hidden_image = implode(";", $s_hidden_image);
        }
        if ($s_images) {
            $s_images .= ";";
        }
        $allslider = $s_images . $s_hidden_image;
        $allslider = rtrim($allslider, ";");

        

        if ($request->has('youtube_thumb')) {
            $folder = 'About Us';
            $response = cloudUpload($request->youtube_thumb, $folder, $aboutUs->youtube_thumb);
            $aboutUs->youtube_thumb = $response;
        }
        if ($request->has('photo')) {
            $folder = 'About Us';
            $response = cloudUpload($request->photo, $folder, $aboutUs->photo);
            $aboutUs->photo = $response;
        }
        if ($request->has('chairman_photo')) {
            $folder = 'About Us';
            $response = cloudUpload($request->chairman_photo, $folder, $aboutUs->chairman_photo);
            $aboutUs->chairman_photo = $response;
        }
        if ($request->has('approach_photo')) {
            $folder = 'AboutUs';
            $response = cloudUpload($request->approach_photo, $folder, $aboutUs->approach_photo);
            $aboutUs->approach_photo = $response;
        }



        $aboutUs->update([
            'slider' => $allslider,
            'alt_text' => $request->alt_text,
            'youtube_link' => $request->youtube_link,
            'title' => $request->title,
            'important_note' => $request->important_note,
            'photo' => $aboutUs->photo,
            'youtube_thumb' => $aboutUs->youtube_thumb,
            'chairman_photo' => $aboutUs->chairman_photo,
            'approach_photo' => $aboutUs->approach_photo,
            'description' => $request->description,
            'approach_des' => $request->approach_des,
            'chairman_message' => $request->chairman_message,
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'whatsapp' => $request->whatsapp,
            'twitter' => $request->twitter,


        ]);
        Toastr::success('About Us  Updated', 'success');
        return redirect(route('backend.aboutUs.edit'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
