<?php

namespace App\Http\Controllers\Backend;

use App\Models\Packages;
use Illuminate\Http\Request;
use App\Models\CustomerReview;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CustomerReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer_reviews = CustomerReview::orderBy('id', 'desc')->get();
        return view('backend.customer_review.index', compact('customer_reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = Packages::where('status', 'publish')->whereIn('service_id', [3, 29])->get();
        return view('backend.customer_review.create',compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        CustomerReview::create([
            'package_id' => $request->package_id,
            'name' => $request->name,
            'title' => $request->title,
            'rating' => $request->rating,
            'description' => $request->description,

        ]);
        Toastr::success('Customer Review Info Added', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerReview $customerReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerReview $customerReview)
    {
        $packages = Packages::where('status', 'publish')->whereIn('service_id', [3, 29])->get();
        return view('backend.customer_review.edit', compact('packages', 'customerReview'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerReview $customerReview)
    {
        
        $customerReview->update([
            'package_id' => $request->package_id,
            'name' => $request->name,
            'title' => $request->title,
            'rating' => $request->rating,
            'description' => $request->description,

        ]);
        Toastr::success('Customer Review Info Updated', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerReview $customerReview)
    {
        $customerReview->delete();
        Toastr::success('Customer Review Info Deleted', 'success');
        return back();
    }
    
}
