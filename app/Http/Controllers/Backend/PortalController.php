<?php

namespace App\Http\Controllers\Backend;

use App\Models\Portal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeportal_data = Portal::where('id', '!=', 1)->get();
        return view('backend.portal.index',compact('activeportal_data'));
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

        $photo = $request->file('photo');
        $trade_licence = $request->file('trade_licence');
        $nid_card = $request->file('nid_card');
        $visiting_card = $request->file('visiting_card');
        if ($photo) {
            $folder = 'portal';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        if ($trade_licence) {
            $folder = 'portal';
            $response = cloudUpload($trade_licence, $folder, null);
            $trade_licence = $response;
        }
        if ($nid_card) {
            $folder = 'portal';
            $response = cloudUpload($nid_card, $folder, null);
            $nid_card = $response;
        }
        if ($visiting_card) {
            $folder = 'portal';
            $response = cloudUpload($visiting_card, $folder, null);
            $visiting_card = $response;
        }
        $customer_info = json_encode([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'photo' => $photo,
            'trade_licence' => $trade_licence,
            'nid_card' => $nid_card,
            'visiting_card' => $visiting_card,
        ]);
        Portal::create([
            'customer_info' => $customer_info
        ]);

        Toastr::success('Your Info Submitted!', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Portal $portal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portal $portal)
    {
        return view('backend.portal.edit', compact('portal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portal $portal)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);
        $slider = $request->file('slider');
        $s_hidden_image = $request->s_image;
        if ($request->has('photo')) {
            $folder = 'portal';
            $response = cloudUpload($request->photo, $folder, $portal->photo);
            $portal->photo = $response;
        }
        if ($request->has('photo1')) {
            $folder = 'portal';
            $response = cloudUpload($request->photo1, $folder, $portal->photo1);
            $portal->photo1 = $response;
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

        $info_name_data = $request->ota_info;
        $info_name_data = implode(";", $info_name_data);
        $info_name_new_data = $request->ota_info_new;
        if (is_array($info_name_new_data)) {
            $info_name_new_data = implode(";", $info_name_new_data);
        }
        if ($info_name_data) {
            $info_name_data .= ";";
        }

        $info_name_new = $info_name_data . $info_name_new_data;
        $info_name_new = rtrim($info_name_new, ";");

        $portal->update([
            'description' => $request->description,
            'url' => $request->url,
            'alt_text' => $request->alt_text,
            'photo' => $portal->photo,
            'photo1' => $portal->photo1,
            'slider' => $allslider,
            'ota_info' => $info_name_new,
        ]);
        Toastr::success('OTA Portal Info Updated!', 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portal $portal)
    {
        //
    }
}
