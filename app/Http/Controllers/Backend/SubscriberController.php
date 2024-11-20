<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RequestMessage;
use App\Models\Subscriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers = Subscriber::paginate(20);
        return view('backend.subscriber.index', compact('subscribers'));
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

        Subscriber::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        Toastr::success('Your Subscription Successful!', 'Success');
        return back();
    }
    public function message(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        RequestMessage::create([
            'package_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'visit_date' => $request->visit_date,
            'project_type' => $request->project_type,
            'project_size' => $request->project_size,
            'message' => $request->message,
        ]);

        Toastr::success('Message Send Successfully', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return back()->with('success', 'Subscriber Deleted!');
    }
}
