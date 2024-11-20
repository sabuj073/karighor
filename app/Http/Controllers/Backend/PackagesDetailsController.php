<?php

namespace App\Http\Controllers\Backend;

use App\Models\Packages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PackagesDetails;
use App\Http\Controllers\Controller;
use App\Models\Services;
use Brian2694\Toastr\Facades\Toastr;

class PackagesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeData = PackagesDetails::where('status', 'publish')->paginate(10);
        $draftData = PackagesDetails::where('status', 'draft')->paginate(10);
        $trashedData = PackagesDetails::onlyTrashed()->orderBy('id', 'desc')->paginate(10);

        return view('backend.package_details.index', compact('activeData', 'draftData', 'trashedData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = Packages::where('status','publish')->whereIn('service_id', [3, 29])->get();
        
        return view('backend.package_details.create',compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $brad_photo = $request->file('brad_photo');
        $c_review = $request->file('c_review');
        $h_makkah_img = $request->file('h_makkah');
        $h_madinah_img = $request->file('h_madinah');
        $m_photo = $request->file('m_photo');
               
        if ($photo) {
            $folder = 'product_details';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        if ($brad_photo) {
            $folder = 'product_details';
            $response = cloudUpload($brad_photo, $folder, null);
            $brad_photo = $response;
        }
        if ($c_review) {
            $folder = 'product_details';
            $response = cloudUpload($c_review, $folder, null);
            $c_review = $response;
        }
       
        if ($m_photo) {
            $folder = 'product_details';
            $response = cloudUpload($m_photo, $folder, null);
            $m_photo = $response;
        }

        $h_makkah_images = [];
        if ($h_makkah_img) {
            foreach ($h_makkah_img as $h_makkah) {
                $folder = 'product_details';
                $response = cloudUpload($h_makkah, $folder, null);
                $h_makkah_images[] = $response;
            }
        }
        $h_makkah_images = implode(";", $h_makkah_images);

        $h_madinah_images = [];
        if ($h_madinah_img) {
            foreach ($h_madinah_img as $m_madinah) {
                $folder = 'product_details';
                $response = cloudUpload($m_madinah, $folder, null);
                $h_madinah_images[] = $response;
            }
        }
        $h_madinah_images = implode(";", $h_madinah_images);
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

        PackagesDetails::create([
            'package_id' => $request->package_id,
            'photo' => $photo,
            'brad_photo' => $brad_photo,
            'c_review' => $c_review,
            'h_makkah' => $h_makkah_images,
            'h_madinah' => $h_madinah_images,
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'description' => $request->description,
            'brad_title' => $request->brad_title,
            'brad_subtitle' => $request->brad_subtitle,
            'duration' => $request->duration,
            'package_type' => $request->package_type,
            'airline' => $request->airline,
            'makkah' => $request->makkah,
            'madinah' => $request->madinah,
            'price' => $request->price,
            'up_flight' => $request->up_flight,
            'sh_flight' => $request->sh_flight,
            'package_include' => $request->package_include,
            'mad_description' => $request->mad_description,
            'registration' => $request->registration,
            'phone' => $request->phone,

            'm_photo' => $m_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
        ]);
        Toastr::success('Package Details Added', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(PackagesDetails $packagesDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackagesDetails $packagesDetails)
    {
        $packages = Packages::where('status','publish')->get();
        return view('backend.package_details.edit', compact('packagesDetails','packages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PackagesDetails $packagesDetails)
    {

        $photo = $request->file('photo');
        $h_makkah_images = $request->file('h_makkah');
        $hid_h_makkah = $request->hid_h_makkah;

        $h_madinah_images = $request->file('h_madinah');
        $hid_h_madinah = $request->hid_h_madinah;

        if ($request->has('brad_photo')) {
            $folder = 'package_Details';
            $response = cloudUpload($request->brad_photo, $folder, $packagesDetails->brad_photo);
            $packagesDetails->brad_photo = $response;
        }
        if ($request->has('c_review')) {
            $folder = 'package_Details';
            $response = cloudUpload($request->c_review, $folder, $packagesDetails->c_review);
            $packagesDetails->c_review = $response;
        }
        if ($request->has('m_photo')) {
            $folder = 'package_Details';
            $response = cloudUpload($request->m_photo, $folder, $packagesDetails->m_photo);
            $packagesDetails->m_photo = $response;
        }
       
        
        if ($photo) {
            $folder = 'package_details';
            $response = cloudUpload($request->photo, $folder, $packagesDetails->photo);
            $packagesDetails->photo = $response;
        }
        // makkah image

        $h_makkah_img = [];
        if ($request->has('h_makkah')) {
            if ($h_makkah_images) {
                foreach ($h_makkah_images as $h_makkah) {
                    $folder = 'package_details';
                    $response = cloudUpload($h_makkah, $folder, null);
                    $h_makkah_img[] = $response;
                }
            }
        }

        $h_makkah_img = implode(";", $h_makkah_img);
        if (is_array($hid_h_makkah)) {
            $hid_h_makkah = implode(";", $hid_h_makkah);
        }
        if ($h_makkah_img) {
            $h_makkah_img .= ";";
        }
        $all_h_makkah_image = $h_makkah_img . $hid_h_makkah;
        $all_h_makkah_image = rtrim($all_h_makkah_image, ";");

        // madinah image

        $h_madinah_img = [];
        if ($request->has('h_madinah')) {
            if ($h_madinah_images) {
                foreach ($h_madinah_images as $h_makkah) {
                    $folder = 'package_details';
                    $response = cloudUpload($h_makkah, $folder, null);
                    $h_madinah_img[] = $response;
                }
            }
        }

        $h_madinah_img = implode(";", $h_madinah_img);
        if (is_array($hid_h_madinah)) {
            $hid_h_madinah = implode(";", $hid_h_madinah);
        }
        if ($h_madinah_img) {
            $h_madinah_img .= ";";
        }
        $all_h_madinah_image = $h_madinah_img . $hid_h_madinah;
        $all_h_madinah_image = rtrim($all_h_madinah_image, ";");

        $packagesDetails->update([
            'package_id' => $request->package_id,
            'photo' => $packagesDetails->photo,
            'brad_photo' => $packagesDetails->brad_photo,
            'c_review' => $packagesDetails->c_review,
            'h_makkah' => $all_h_makkah_image,
            'h_madinah' => $all_h_madinah_image,
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'description' => $request->description,
            'brad_title' => $request->brad_title,
            'brad_subtitle' => $request->brad_subtitle,
            'duration' => $request->duration,
            'package_type' => $request->package_type,
            'airline' => $request->airline,
            'makkah' => $request->makkah,
            'madinah' => $request->madinah,
            'price' => $request->price,
            'up_flight' => $request->up_flight,
            'sh_flight' => $request->sh_flight,
            'package_include' => $request->package_include,
            'mad_description' => $request->mad_description,
            'registration' => $request->registration,
            'phone' => $request->phone,

            'm_photo' => $packagesDetails->m_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);
        Toastr::success('Package Details  Updated', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackagesDetails $packagesDetails)
    {
        $packagesDetails->status == 'draft';
        $packagesDetails->save();
        $packagesDetails->delete();
        return back()->with('success', 'packagesDetails Trashed');
    }
    public function status(PackagesDetails $packagesDetails)
    {
        if ($packagesDetails->status == 'publish') {
            $packagesDetails->status = 'draft';
            $packagesDetails->save();
        } else {
            $packagesDetails->status = 'publish';
            $packagesDetails->save();
        }
        return back()->with('success', $packagesDetails->status == 'publish' ? 'packagesDetails type Published' : 'packagesDetails Drafted');
    }
    public function reStore($id)
    {
        $terms = PackagesDetails::onlyTrashed()->find($id);
        $terms->restore();
        return back()->with('success', 'PackagesDetails Info Restored');
    }
    public function permDelete($id)
    {
        $terms = PackagesDetails::onlyTrashed()->find($id);
        $terms->forceDelete();
        return back()->with('success', 'PackagesDetails Deleted');
    }
}
