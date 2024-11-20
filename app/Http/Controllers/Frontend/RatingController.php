<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class RatingController extends Controller
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

        $request->validate([
            'rating' => 'required',
            'comment' => 'nullable',
        ]);
        $ip_address = $_SERVER['REMOTE_ADDR'];
        Rating::updateOrCreate(
            [
                'id_address' => $ip_address,
                'package_id' => $request->product_id,
            ],
            [
                'rating' => $request->rating,
                'type' => $request->type,
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment,

            ]
        );

        // You can return the success message as part of the response
        return response()->json(['success' => true]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function bookingstore(Request $request)
    {

        $request->validate([
            'rating' => 'required',
            'comment' => 'nullable',
        ]);
        $ip_address = $_SERVER['REMOTE_ADDR'];
        Rating::updateOrCreate(
            [
                'id_address' => $ip_address,
                'hotelbooking_id' => $request->product_id,
            ],
            [
                'rating' => $request->rating,
                'type' => $request->type,
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment,

            ]
        );

        // You can return the success message as part of the response
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
