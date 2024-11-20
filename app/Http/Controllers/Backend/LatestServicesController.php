<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\LatestServices;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

class LatestServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $activeRequirement = LatestServices::where('status', 'publish')->paginate(10);
        $draftRequirement = LatestServices::where('status', 'draft')->paginate(10);
        $trashedRequirement = LatestServices::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.LatestServices.index', compact('activeRequirement', 'draftRequirement', 'trashedRequirement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('backend.LatestServices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $photo = $request->file('photo');

        if ($photo) {
            $folder = 'services';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }


        LatestServices::create([
            'services_id' => $request->services_id,
            'photo' => $photo,
            'alt_text' => $request->alt_text,
            'title' => $request->title,
            'slug' => Str::slug($request->slug ?? $request->title),
            'description' => $request->description,
        ]);
        Toastr::success('Latest Services Added', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(LatestServices $latestServices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LatestServices $latestServices)
    {
        //

        return view('backend.LatestServices.edit', compact('latestServices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LatestServices $latestServices)
    {
        $photo = $request->file('photo');
        if ($photo) {
            $folder = 'services';
            $response = cloudUpload($request->photo, $folder, $latestServices->photo);
            $latestServices->photo = $response;
        }

        // if ($request->hasFile('video')) {
        //     $folder = 'videoGallery';
        //     $response = cloudUpload($request->video, $folder, $videoGallery->video);
        //     $videoGallery->video = $response;
        // }

        $latestServices->update([
            'services_id' => $request->services_id,
            'photo' =>  $latestServices->photo,
            'alt_text' => $request->alt_text,
            'title' => $request->title,
            'slug' => Str::slug($request->slug ?? $latestServices->slug),
            'description' => $request->description,


        ]);
        Toastr::success('Latest Services Updated', 'success');
        return redirect(route('backend.LatestServices.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LatestServices $latestServices)
    {
        $latestServices->status == 'draft';
        $latestServices->save();
        $latestServices->delete();
        return back()->with('success', 'Latest Services Trashed');
    }
    public function status(LatestServices $latestServices)
    {
        if ($latestServices->status == 'publish') {
            $latestServices->status = 'draft';
            $latestServices->save();
        } else {
            $latestServices->status = 'publish';
            $latestServices->save();
        }
        return back()->with('success', $latestServices->status == 'publish' ? 'latestServices info Published' : 'latestServices info Drafted');
    }
    public function reStore($id)
    {
        $career = LatestServices::onlyTrashed()->find($id);
        $career->restore();
        return back()->with('success', 'LatestServices Info Restored');
    }
    public function permDelete($id)
    {
        $career = LatestServices::onlyTrashed()->find($id);
        $career->forceDelete();
        return back()->with('success', 'LatestServices Info Deleted');
    }
}
