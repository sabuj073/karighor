<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\MissionVision;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class MissionVisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $parent =  RequirementType::where('status', 'publish')->whereNull('parent_id')->get();
        $activeRequirement = MissionVision::where('status', 'publish')->paginate(10);
        $draftRequirement = MissionVision::where('status', 'draft')->paginate(10);
        $trashedRequirement = MissionVision::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.mission.index', compact('activeRequirement', 'draftRequirement', 'trashedRequirement'));
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
    public function show(MissionVision $missionVision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MissionVision $missionVision)
    {
        //
        return view('backend.mission.edit', compact('missionVision'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MissionVision $missionVision)
    {
        $mission_photo = $request->file('mission_photo');
        if ($mission_photo) {
            $folder = 'ourStory';
            $response = cloudUpload($request->mission_photo, $folder, $missionVision->mission_photo);
            $missionVision->mission_photo = $response;
        }
        $vision_photo = $request->file('vision_photo');
        if ($vision_photo) {
            $folder = 'ourStory';
            $response = cloudUpload($request->vision_photo, $folder, $missionVision->vision_photo);
            $missionVision->vision_photo = $response;
        }
        $values_photo = $request->file('values_photo');
        if ($values_photo) {
            $folder = 'ourStory';
            $response = cloudUpload($request->values_photo, $folder, $missionVision->values_photo);
            $missionVision->values_photo = $response;
        }

        // if ($request->hasFile('video')) {
        //     $folder = 'videoGallery';
        //     $response = cloudUpload($request->video, $folder, $videoGallery->video);
        //     $videoGallery->video = $response;
        // }

        $missionVision->update([




            'mission' => $request->mission,
            'mission_icon' => $request->mission_icon,
            'vision_icon' => $request->vision_icon,
            'values_icon' => $request->values_icon,
            'mission_photo' =>   $missionVision->mission_photo,
            'alt_text' =>   $request->alt_text,
            'vision' => $request->vision,
            'vision_photo' =>   $missionVision->vision_photo,
            'values' => $request->values,
            'values_photo' =>   $missionVision->values_photo,


        ]);
        Toastr::success('Mission Info  Updated', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MissionVision $missionVision)
    {
        //
    }
}
