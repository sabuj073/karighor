<?php

namespace App\Http\Controllers\Backend;

use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activepGallery = PhotoGallery::where('status', 'publish')
            ->where('year', NULL)
            ->paginate(10);
        $draftpGallery = PhotoGallery::where('status', 'draft')->where('year', NULL)->paginate(10);

        $trashedpGallery = PhotoGallery::where('year', NULL)->onlyTrashed()->orderBy('id', 'desc')->paginate(10);


        $activeParent =  PhotoGallery::where('status', 'publish')
            ->where('parent_id', NULL)
            ->where('id', '!=', 8)
            ->paginate(10);
        $draftParent =  PhotoGallery::where('status', 'draft')
            ->where('parent_id', NULL)
            ->where('id', '!=', 8)
            ->paginate(10);
        $trashedParent =  PhotoGallery::where('status', 'publish')
            ->where('parent_id', NULL)
            ->where('id', '!=', 8)
            ->onlyTrashed()->orderBy('id', 'desc')->paginate(10);

        $slider = PhotoGallery::where('status', 'publish')
            ->where('id', 8)
            ->first();

        return view('backend.photos.index', compact('activepGallery', 'draftpGallery', 'trashedpGallery', 'activeParent', 'draftParent', 'trashedParent','slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $thumb = PhotoGallery::whereNotNull('title')->get();
        return view('backend.photos.create', compact('thumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'photo' => 'nullable|mimes:png,jpg,jpeg,svg|max:2000',
            'thumb_photo' => 'nullable|mimes:png,jpg,jpeg,svg|max:2000'
        ]);

        $photo = $request->file('photo');
        $slider = $request->file('slider');
        $thumb_photo = $request->file('thumb_photo');

        $images = [];
        if ($photo) {
            foreach ($photo as $photos) {
                $folder = 'photo_gallery';
                $response = cloudUpload($photos, $folder, null);
                $images[] = $response;
            }
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
        if ($thumb_photo) {
            $folder = 'photo_gallery';
            $response = cloudUpload($thumb_photo, $folder, null);
            $thumb_photo = $response;
        }

        $images = implode(";", $images);

        PhotoGallery::create([
            'title' => $request->title,
            'photo' => $images,
            'slider' => $s_images,
            'thumb_photo' => $thumb_photo,
            'photo_title' => $request->photo_title,
            'alt_text' => $request->alt_text,
            'thumb_alt_text' => $request->thumb_alt_text,
            'parent_id' => $request->parent_id,
            'year' => $request->year,
        ]);
        Toastr::success('Photo Gallery Info Create Successful!', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotoGallery $photoGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotoGallery $photoGallery)
    {
      
        $thumb = PhotoGallery::whereNotNull('title')->get();
        return view('backend.photos.edit', compact('photoGallery', 'thumb'));
    }
    public function slider(PhotoGallery $photoGallery)
    {
      
        return view('backend.photos.editslider', compact('photoGallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhotoGallery $photoGallery)
    {
        $photo = $request->file('photo');
        $thumb_photo = $request->file('thumb_photo');
        $hidden_image = $request->image;
        $slider = $request->file('slider');
        $s_hidden_image = $request->s_image;


        $images = [];
        if ($request->has('photo')) {
            if ($photo) {
                foreach ($photo as $photos) {
                    $folder = 'photo_gallery';
                    $response = cloudUpload($photos, $folder, null);
                    $images[] = $response;
                }
            }
        }


        $images = implode(";", $images);
        if (is_array($hidden_image)) {
            $hidden_image = implode(";", $hidden_image);
        }
        if ($images) {
            $images .= ";";
        }
        $allphoto = $images . $hidden_image;
        $allphoto = rtrim($allphoto, ";");

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


        $data = [
            'title' => $request->title,
            'photo' => $allphoto,
            'slider' => $allslider,
            'alt_text' => $request->alt_text,
            'photo_title' => $request->photo_title,
            'alt_text' => $request->alt_text,
            'thumb_alt_text' => $request->thumb_alt_text,
            'parent_id' => $request->parent_id,
            'year' => $request->year,

        ];


        if ($thumb_photo) {
            $folder = 'photo_gallery';
            $response = cloudUpload($thumb_photo, $folder, null);
            $thumb_photo = $response;
            $data["thumb_photo"] = $thumb_photo;
        }

        $photoGallery->update($data);

        Toastr::success('Photos  Edit Successful!', 'Success');
        return redirect(route('backend.photoGallery.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoGallery $photoGallery)
    {
        $photoGallery->status == 'draft';
        $photoGallery->save();
        $photoGallery->delete();
        Toastr::success('Photos Info  Trashed!', 'Success');
        return back();
    }
    public function status(PhotoGallery $photoGallery)
    {
        if ($photoGallery->status == 'publish') {
            $photoGallery->status = 'draft';
            $photoGallery->save();
        } else {
            $photoGallery->status = 'publish';
            $photoGallery->save();
        }
        Toastr::success($photoGallery->status == 'publish' ? 'PhotoGallery info Published' : 'PhotoGallery info Drafted', 'Success');
        return back();
    }
    public function reStore($id)
    {
        $portfolio = PhotoGallery::onlyTrashed()->find($id);
        $portfolio->restore();
        Toastr::success('PhotoGallery Info Restored', 'Success');
        return back();
    }
    public function permDelete($id)
    {
        $portfolio = PhotoGallery::find($id);
        $portfolio->forceDelete();
        Toastr::success('PhotoGallery Info Deleted', 'Success');
        return back();
    }
}
