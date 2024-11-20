<?php

namespace App\Http\Controllers\Backend;

use App\Models\Concern;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ConcernController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeConcern = Concern::where('status', 'publish')->orderBy('id', 'desc')->get();
        $draftConcern = Concern::where('status', 'draft')->orderBy('id', 'desc')->get();
        $trashedConcern = Concern::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('backend.concern.index', compact('activeConcern', 'draftConcern', 'trashedConcern'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.concern.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable',
            'photo' => 'nullable|mimes:png,jpg,jpeg,svg|max:2000',
        ]);
        $icon = $request->file('icon');
        $photo = $request->file('photo');
        $slider = $request->file('slider');
        $m_photo = $request->file('m_photo');
        // if ($icon) {
        //     $iconName = uniqid() . '.' . $icon->getClientOriginalExtension();
        //     $icon->save(public_path('storage/concern/' . $iconName));
        // }
        if ($icon) {
            $folder = 'concern';
            $response = cloudUpload($icon, $folder, null);
            $icon = $response;
        }
        if ($photo) {
            $folder = 'concern';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }

        $s_images = [];
        if ($slider) {
            foreach ($slider as $sliderD) {
                $folder = 'services';
                $response = cloudUpload($sliderD, $folder, null);
                $s_images[] = $response;
            }
        }
        $s_images = implode(";", $s_images);

        if ($m_photo) {
            $folder = 'concern';
            $response = cloudUpload($m_photo, $folder, null);
            $m_photo = $response;
        }
        Concern::create([
            'title' => $request->title,
            'slug' => Str::slug($request->slug ? $request->slug : $request->title),
            'description' => $request->description,
            'icon' => $icon,
            'photo' => $photo,
            'slider' => $s_images,
            'alt_text' => $request->alt_text,
            'url' => $request->url,
            'm_photo' => $m_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);
        Toastr::success('Concern Added Successful!', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Concern $concern)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Concern $concern)
    {
        return view('backend.concern.edit', compact('concern'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Concern $concern)
    {
        $request->validate([
            'icon' => 'nullable|mimes:png,jpg,jpeg,svg|max:2000',
            'photo' => 'nullable|mimes:png,jpg,jpeg,svg|max:2000',
        ]);
        $slider = $request->file('slider');
        $s_hidden_image = $request->s_image;
        if ($request->has('icon')) {
            $folder = 'concern';
            $response = cloudUpload($request->icon, $folder, $concern->icon);
            $concern->icon = $response;
        }
        // $icon = $request->file('icon');
        // if ($icon) {
        //     $path = public_path('storage/concern/' . $concern->icon);
        //     if (file_exists($path)) {
        //         unlink($path);
        //     }
        //     $iconName = uniqid() . '.' . $icon->getClientOriginalExtension();
        //     $icon->move(public_path('storage/concern/'), $iconName);
        // } else {
        //     $iconName = $concern->icon;
        // }


        if ($request->has('photo')) {
            $folder = 'concern';
            $response = cloudUpload($request->photo, $folder, $concern->photo);
            $concern->photo = $response;
        }
        if ($request->has('m_photo')) {
            $folder = 'concern';
            $response = cloudUpload($request->m_photo, $folder, $concern->m_photo);
            $concern->m_photo = $response;
        }

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

        $concern->update([
            'title' => $request->title,
            'slug' => Str::slug($request->slug ? $request->slug : $request->title),
            'description' => $request->description,
            'icon' => $concern->icon,
            'photo' => $concern->photo,
            'slider' => $allslider,
            'alt_text' => $request->alt_text,
            'url' => $request->url,
            'm_photo' => $concern->m_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
        ]);

        Toastr::success('Concern Info Updated!', 'Success');
        return redirect(route('backend.concern.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concern $concern)
    {
        $concern->status == 'draft';
        $concern->save();
        $concern->delete();
        Toastr::success('Concern Info Trashed!', 'Success');
        return back();
    }
    public function status(Concern $concern)
    {
        if ($concern->status == 'publish') {
            $concern->status = 'draft';
            $concern->save();
        } else {
            $concern->status = 'publish';
            $concern->save();
        }
        Toastr::success($concern->status == 'publish' ? 'Concern info Published' : 'Concern info Drafted', 'Success');
        return back();
    }
    public function reStore($id)
    {
        $concern = concern::onlyTrashed()->find($id);
        $concern->restore();
        Toastr::success('Concern Info Restored!', 'Success');
        return back();
    }
    public function permDelete($id)
    {
        $concern = concern::onlyTrashed()->find($id);
        $concern->forceDelete();
        Toastr::success('Concern Info Deleted!', 'Success');
        return back();
    }
}
