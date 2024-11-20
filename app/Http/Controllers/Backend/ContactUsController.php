<?php

namespace App\Http\Controllers\Backend;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activePartner = ContactUs::where('status', 'publish')->where('id', '!=', 6)->paginate(10);
        $draftPartner = ContactUs::where('status', 'draft')->where('id', '!=', 6)->paginate(10);
        $trashedPartner = ContactUs::onlyTrashed()->where('id', '!=', 6)->orderBy('id', 'desc')->paginate(10);
        $slider = ContactUs::where('status', 'publish')
            ->where('id', 6)
            ->first();
        return view('backend.contactUs.index', compact('activePartner', 'draftPartner', 'trashedPartner','slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contactUs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);
        $logo = $request->file('logo');
        if ($logo) {
            $folder = 'blog';
            $response = cloudUpload($logo, $folder, null);
            $logo = $response;
        }
        ContactUs::create([
            'title' => $request->title,
            'map' => $request->map,
            'description' => $request->address,
            'phone' => $request->phone,
            'contact_image' => $logo,
        ]);
        Toastr::success('Contact Info Addedd Successful!', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUs $contactUs)
    {
        return view('backend.contactUs.edit', compact('contactUs'));
    }
    public function slider(ContactUs $contactUs)
    {
      
        return view('backend.contactUs.editSlider', compact('contactUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        $slider = $request->file('slider');
        $s_hidden_image = $request->s_image;
        if ($request->has('logo')) {
            $folder = 'contact';
            $response = cloudUpload($request->logo, $folder, $contactUs->contact_image);
            $contactUs->contact_image = $response;
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




        $contactUs->update([
            'title' => $request->title,
            'map' => $request->map,
            'description' => $request->address,
            'phone' => $request->phone,
            'contact_image' => $contactUs->contact_image,
            'slider' => $allslider,
        ]);
        Toastr::success('Contact Info Updated!', 'Success');
        return redirect(route('backend.contactUs.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contactUs)
    {
        $contactUs->status == 'draft';
        $contactUs->save();
        $contactUs->delete();
        Toastr::success('Banner Info Trashed!', 'Success');
        return back();
    }
    public function status(ContactUs $contactUs)
    {
        if ($contactUs->status == 'publish') {
            $contactUs->status = 'draft';
            $contactUs->save();
        } else {
            $contactUs->status = 'publish';
            $contactUs->save();
        }
        // Toastr::success($contactUs->status == 'publish' ? 'Contact info Published' : 'Contact info Drafted', 'Success');
        return back();
    }
    public function reStore($id)
    {
        $contactUs = ContactUs::onlyTrashed()->find($id);
        $contactUs->restore();
        // Toastr::success('Contact Info Restored!', 'Success');
        return back();
    }
    public function permDelete($id)
    {
        $contactUs = ContactUs::onlyTrashed()->find($id);
        $contactUs->forceDelete();
        // Toastr::success('Contact Info Deleted!', 'Success');
        return back();
    }
}
