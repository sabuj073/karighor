<?php

namespace App\Http\Controllers\Backend;

use App\Models\Bradcrumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BradcrumbController extends Controller
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
    public function show(Bradcrumb $bradcrumb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bradcrumb $bradcrumb)
    {
        return view('backend.bradcrumb.edit',compact('bradcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bradcrumb $bradcrumb)
    {
        if ($request->has('blog_photo')) {
            $folder = 'Bradcrumb';
            $response = cloudUpload($request->blog_photo, $folder, $bradcrumb->blog_photo);
            $bradcrumb->blog_photo = $response;
        }
        if ($request->has('team_photo')) {
            $folder = 'Bradcrumb';
            $response = cloudUpload($request->team_photo, $folder, $bradcrumb->team_photo);
            $bradcrumb->team_photo = $response;
        }
        if ($request->has('about_photo')) {
            $folder = 'Bradcrumb';
            $response = cloudUpload($request->about_photo, $folder, $bradcrumb->about_photo);
            $bradcrumb->about_photo = $response;
        }
        if ($request->has('career_photo')) {
            $folder = 'Bradcrumb';
            $response = cloudUpload($request->career_photo, $folder, $bradcrumb->career_photo);
            $bradcrumb->career_photo = $response;
        }
        if ($request->has('gallery_photo')) {
            $folder = 'Bradcrumb';
            $response = cloudUpload($request->gallery_photo, $folder, $bradcrumb->gallery_photo);
            $bradcrumb->gallery_photo = $response;
        }
        if ($request->has('video_photo')) {
            $folder = 'Bradcrumb';
            $response = cloudUpload($request->video_photo, $folder, $bradcrumb->video_photo);
            $bradcrumb->video_photo = $response;
        }
        if ($request->has('contact_photo')) {
            $folder = 'Bradcrumb';
            $response = cloudUpload($request->contact_photo, $folder, $bradcrumb->contact_photo);
            $bradcrumb->contact_photo = $response;
        }
        if ($request->has('client_photo')) {
            $folder = 'Bradcrumb';
            $response = cloudUpload($request->client_photo, $folder, $bradcrumb->client_photo);
            $bradcrumb->client_photo = $response;
        }
        $bradcrumb->update([            
            'blog_photo' => $bradcrumb->blog_photo,
            'team_photo' => $bradcrumb->team_photo,
            'about_photo' => $bradcrumb->about_photo,
            'career_photo' => $bradcrumb->career_photo,
            'gallery_photo' => $bradcrumb->gallery_photo,
            'video_photo' => $bradcrumb->video_photo,
            'contact_photo' => $bradcrumb->contact_photo,
            'client_photo' => $bradcrumb->client_photo,

        ]);
        Toastr::success('Bradcrumb Image  Updated', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bradcrumb $bradcrumb)
    {
        //
    }
}
