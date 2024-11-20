<?php

namespace App\Http\Controllers\Backend;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Policy $policy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Policy $policy)
    {
        return view('backend.policy.privacy_policy',compact('policy'));
    }
    public function terms(Policy $policy)
    {
        return view('backend.policy.terms',compact('policy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Policy $policy)
    {
        $policy->update([
            'privacy' => $request->privacy,
        ]);
        Toastr::success('Privacy Policy Info Updated','Success');
        return back();
    }
    public function termsupdate(Request $request, Policy $policy)
    {
        $policy->update([
            'terms' => $request->terms,
        ]);
        Toastr::success('Terms and Conditions Info Updated','Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Policy $policy)
    {
        //
    }
}
