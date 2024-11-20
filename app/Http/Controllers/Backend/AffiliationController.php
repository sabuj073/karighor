<?php

namespace App\Http\Controllers\Backend;

use App\Models\Packages;
use App\Models\Affiliation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AffiliationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeData = Affiliation::where('status', 'publish')->orderBy('id', 'desc')->paginate(10);
        $draftData = Affiliation::where('status', 'draft')->orderBy('id', 'desc')->paginate(10);
        $trashedData = Affiliation::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.affiliation.index', compact('activeData', 'draftData', 'trashedData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = Packages::where('status', 'publish')->whereIn('service_id', [3, 29])->get();
        return view('backend.affiliation.create', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');

        if ($photo) {
            $folder = 'affiliation';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }

        Affiliation::create([
            'package_id' => $request->package_id,
            'photo' => $photo,
            'name' => $request->name,
            'type' => $request->type,

        ]);
        Toastr::success('Packages Added', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Affiliation $affiliation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Affiliation $affiliation)
    {
        $packages = Packages::where('status', 'publish')->whereIn('service_id', [3, 29])->get();
        return view('backend.affiliation.edit', compact('packages', 'affiliation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Affiliation $affiliation)
    {

        if ($request->has('photo')) {
            $folder = 'affiliation';
            $response = cloudUpload($request->photo, $folder, $affiliation->photo);
            $affiliation->photo = $response;
        }

        $affiliation->update([
            'package_id' => $request->package_id,
            'photo' => $affiliation->photo,
            'name' => $request->name,
            'type' => $request->type,

        ]);
        Toastr::success('Affiliation Info Updated', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Affiliation $affiliation)
    {
        $affiliation->status == 'draft';
        $affiliation->save();
        $affiliation->delete();
        Toastr::success('affiliation Info Trashed!','Success');
        return back();
    }
    public function status(Affiliation $affiliation)
    {
        if ($affiliation->status == 'publish') {
            $affiliation->status = 'draft';
            $affiliation->save();
        } else {
            $affiliation->status = 'publish';
            $affiliation->save();
        }
        Toastr::success($affiliation->status == 'publish' ? 'Affiliation  info Published' : 'Affiliation Info Drafted','Success');
        return back();
    }
    public function reStore($id)
    {
        $affiliation = Affiliation::onlyTrashed()->find($id);
        $affiliation->restore();
        Toastr::success('Affiliation Info Restored!','Success');
        return back();
    }
    public function permDelete($id)
    {
        $affiliation = Affiliation::onlyTrashed()->find($id);
        $affiliation->forceDelete();
        Toastr::success('Affiliation Info Deleted!','Success');
        return back();
    }
}
