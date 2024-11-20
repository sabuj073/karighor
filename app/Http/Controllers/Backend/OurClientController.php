<?php

namespace App\Http\Controllers\Backend;

use App\Models\OurClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class OurClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeRequirement = OurClient::where('status', 'publish')->paginate(10);
        $draftRequirement = OurClient::where('status', 'draft')->paginate(10);
        $trashedRequirement = OurClient::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.ourClient.index', compact('activeRequirement', 'draftRequirement', 'trashedRequirement'));
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
    public function show(OurClient $ourClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurClient $ourClient)
    {
        //
        return view('backend.ourClient.edit', compact('ourClient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurClient $ourClient)
    {
        $meta_photo = $request->file('meta_photo');
        if ($meta_photo) {
            $folder = 'ourStory';
            $response = cloudUpload($request->meta_photo, $folder, $ourClient->meta_photo);
            $ourClient->meta_photo = $response;
        }
        $photo = $request->file('photo');
        if ($photo) {
            $folder = 'ourStory';
            $response = cloudUpload($photo, $folder, $ourClient->photo);
            $ourClient->photo = $response;
        }


        // if ($request->hasFile('video')) {
        //     $folder = 'videoGallery';
        //     $response = cloudUpload($request->video, $folder, $videoGallery->video);
        //     $videoGallery->video = $response;
        // }

        $ourClient->update([
            'photo' =>   $ourClient->photo,
            'alt_text' => $request->alt_text,

            'meta_photo' => $ourClient->meta_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,



        ]);
        Toastr::success('Our Client Updated', 'success');
        return redirect(route('backend.ourClient.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurClient $ourClient)
    {
        //
    }
}