<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Models\WhyBaganbari;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class WhyBaganbariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activedreamWithUs = WhyBaganbari::where('status', 'publish')->paginate(10);
        $draftdreamWithUs = WhyBaganbari::where('status', 'draft')->paginate(10);
        $trasheddreamWithUs = WhyBaganbari::onlyTrashed()->orderBy('id', 'desc')->paginate(10);

        $Baganbari_head = WhyBaganbari::where('type', 'heading')->first();

        return view('backend.whyBaganbari.index', compact('activedreamWithUs', 'draftdreamWithUs', 'trasheddreamWithUs', 'Baganbari_head'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.whyBaganbari.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');

        if ($photo) {
            $folder = 'whyBaganbari';
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

        WhyBaganbari::create([
            'photo' => $photo,
            'alt_text' => $request->alt_text,
            'head' => $request->head,
            'slug' => Str::slug($request->slug ?? $request->head),
            'card_description' => $request->card_description,
        ]);
        Toastr::success('Why BaganBari Added', 'success');
        return back();
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(WhyBaganbari $whyBaganbari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhyBaganbari $whyBaganbari)
    {
        //
        return view('backend.whyBaganbari.edit', compact('whyBaganbari'));
    }
    public function editHead(WhyBaganbari $whyBaganbari)
    {
        //
        return view('backend.whyBaganbari.editHead', compact('whyBaganbari'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WhyBaganbari $whyBaganbari)
    {

        $photo = $request->file('photo');
        $b_photo = $request->file('b_photo');
        if ($photo) {
            $folder = 'whyBaganbari';
            $response = cloudUpload($request->photo, $folder, $whyBaganbari->photo);
            $whyBaganbari->photo = $response;
        }
        if ($b_photo) {
            $folder = 'whyBaganbari';
            $response = cloudUpload($request->b_photo, $folder, $whyBaganbari->b_photo);
            $whyBaganbari->b_photo = $response;
        }

        // if ($request->hasFile('video')) {
        //     $folder = 'videoGallery';
        //     $response = cloudUpload($request->video, $folder, $videoGallery->video);
        //     $videoGallery->video = $response;
        // }

        $whyBaganbari->update([
            'title' => $request->title,
            'description' => $request->description,
            'b_photo' => $whyBaganbari->b_photo,

            'photo' => $whyBaganbari->photo,
            'alt_text' => $request->alt_text,
            'head' => $request->head,
            'slug' => Str::slug($request->slug ?? $request->head),
            'card_description' => $request->card_description,


        ]);
        Toastr::success('whyBaganbari  Updated', 'success');
        return redirect(route('backend.whyBaganbari.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhyBaganbari $whyBaganbari)
    {
        $whyBaganbari->status == 'draft';
        $whyBaganbari->save();
        $whyBaganbari->delete();
        return back()->with('success', 'whyBaganbari Info Trashed');
    }
    public function status(WhyBaganbari $whyBaganbari)
    {
        if ($whyBaganbari->status == 'publish') {
            $whyBaganbari->status = 'draft';
            $whyBaganbari->save();
        } else {
            $whyBaganbari->status = 'publish';
            $whyBaganbari->save();
        }
        return back()->with('success', $whyBaganbari->status == 'publish' ? 'whyBaganbari  info Published' : 'whyBaganbari Info Drafted');
    }
    public function reStore($id)
    {
        $whyBaganbari = WhyBaganbari::onlyTrashed()->find($id);
        $whyBaganbari->restore();
        return back()->with('success', 'whyBaganbari Info Restored');
    }
    public function permDelete($id)
    {
        $whyBaganbari = WhyBaganbari::onlyTrashed()->find($id);
        $whyBaganbari->forceDelete();
        return back()->with('success', 'whyBaganbari Info Deleted');
    }
}
