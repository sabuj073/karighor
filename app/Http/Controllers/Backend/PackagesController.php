<?php

namespace App\Http\Controllers\Backend;

use App\Models\Rating;
use App\Models\Packages;
use App\Models\Services;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


        $activeRequirement = Packages::where('status', 'publish')->paginate(10);
        $draftRequirement = Packages::where('status', 'draft')->paginate(10);
        $trashedRequirement = Packages::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        $package_one = Packages::get();
        return view('backend.packages.index', compact('activeRequirement', 'draftRequirement', 'trashedRequirement', 'package_one'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Services::where('status','publish')->get();
        return view('backend.packages.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $package_photo = $request->file('package_photo');
        $m_photo = $request->file('m_photo');

        if ($package_photo) {
            $folder = 'package';
            $response = cloudUpload($package_photo, $folder, null);
            $package_photo = $response;
        }
        if ($m_photo) {
            $folder = 'package';
            $response = cloudUpload($m_photo, $folder, null);
            $m_photo = $response;
        }
        Packages::create([
            'service_id' => $request->service_id,
            'package_photo' => $package_photo,
            'package_title' => $request->package_title,
            'package_slug' => Str::slug($request->package_slug ?? $request->package_title),
            'package_limitation' => $request->package_limitation,
            'package_price' => $request->package_price,
            'total_day' => $request->total_day,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'tour_description' => $request->tour_description,
            'about_package' => $request->about_package,
            'phone' => $request->phone,
            'm_photo' => $m_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);
        Toastr::success('Packages Added', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Packages $packages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Packages $packages)
    {
        $services = Services::where('status','publish')->get();
        return view('backend.packages.edit', compact('packages', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Packages $packages)
    {
        if ($request->has('package_photo')) {
            $folder = 'Packages';
            $response = cloudUpload($request->package_photo, $folder, $packages->package_photo);
            $packages->package_photo = $response;
        }
        if ($request->has('m_photo')) {
            $folder = 'Packages';
            $response = cloudUpload($request->m_photo, $folder, $packages->m_photo);
            $packages->m_photo = $response;
        }
        $packages->update([

            'service_id' => $request->service_id,
            'package_photo' => $packages->package_photo,
            'package_title' => $request->package_title,
            'package_slug' => Str::slug($request->package_slug ?? $request->package_title),

            'package_limitation' => $request->package_limitation,
            'package_price' => $request->package_price,
            'total_day' => $request->total_day,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'tour_description' => $request->tour_description,
            'phone' => $request->phone,

            'm_photo' => $packages->m_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);
        Toastr::success('Packages Info  Updated', 'Success');
        return redirect(route('backend.packages.index'));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Packages $packages)
    {
        $packages->status == 'draft';
        $packages->save();
        $packages->delete();
        return back()->with('success', 'Packages Trashed');
    }
    public function status(Packages $packages)
    {
        if ($packages->status == 'publish') {
            $packages->status = 'draft';
            $packages->save();
        } else {
            $packages->status = 'publish';
            $packages->save();
        }
        return back()->with('success', $packages->status == 'publish' ? 'packages type Published' : 'packages Drafted');
    }
    public function reStore($id)
    {
        $terms = Packages::onlyTrashed()->find($id);
        $terms->restore();
        return back()->with('success', 'Packages Info Restored');
    }
    public function permDelete($id)
    {
        $terms = Packages::onlyTrashed()->find($id);
        $terms->forceDelete();
        return back()->with('success', 'Packages Deleted');
    }

    public function review()
    {
        $package_review = Rating::where('hotelbooking_id', null)->paginate(10);
        return view('backend.packages.review', compact('package_review'));
    }

    public function review_approve(Rating $rating)
    {

       
        if ($rating->approve == 1) {
            $rating->approve = 0;
            $rating->save();
        } else {
            $rating->approve = 1;
            $rating->save();
        }
        Toastr::success($rating->approve == 1 ? 'Approved' : 'Not Approved');
        return back();
    }
}
