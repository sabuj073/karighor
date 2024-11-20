<?php

namespace App\Http\Controllers\Backend;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activePartner = Partner::where('status', 'publish')->paginate(10);
        $draftPartner = Partner::where('status', 'draft')->paginate(10);
        $trashedPartner = Partner::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.partner.index', compact('activePartner', 'draftPartner', 'trashedPartner'));
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
        $request->validate([
            'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($photo) {          
            $folder = 'partner';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        Partner::create([
            'name' => $request->name,
            'photo' => $photo,

        ]);
        Toastr::success('Partner Added Successful!','Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);
        
        if ($request->has('photo')) {          
            $folder = 'partner';
            $response = cloudUpload($request->photo, $folder, $partner->photo);
            $partner->photo = $response;
        }  
        
        
        
        $partner->update([
            'name' => $request->name,
            'photo' => $partner->photo,

        ]);
        Toastr::success('Partner Info Updated!','Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $partner->status == 'draft';
        $partner->save();
        $partner->delete();
        Toastr::success('Partner Info Trashed!','Success');
        return back();
    }
    public function status(Partner $partner)
    {
        if ($partner->status == 'publish') {
            $partner->status = 'draft';
            $partner->save();
        } else {
            $partner->status = 'publish';
            $partner->save();
        }
        Toastr::success($partner->status == 'publish' ? 'Partner  info Published' : 'Partner Info Drafted','Success');
        return back();
    }
    public function reStore($id)
    {
        $partner = Partner::onlyTrashed()->find($id);
        $partner->restore();
        Toastr::success('Partner Info Restored!','Success');
        return back();
    }
    public function permDelete($id)
    {
        $partner = Partner::onlyTrashed()->find($id);
        $partner->forceDelete();
        Toastr::success('Partner Info Deleted!','Success');
        return back();
    }
}
