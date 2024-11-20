<?php

namespace App\Http\Controllers\Backend;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeClient = Client::where('status', 'publish')->paginate(10);
        $draftClient = Client::where('status', 'draft')->paginate(10);
        $trashedClient = Client::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.client.index', compact('activeClient', 'draftClient', 'trashedClient'));
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
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($photo) {          
            $folder = 'partner';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        Client::create([
            'photo' => $photo,
            'number' => $request->number,
            'title' => $request->title,

        ]);
        Toastr::success('Client Added Successful!','Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);
        
        if ($request->has('photo')) {          
            $folder = 'Client';
            $response = cloudUpload($request->photo, $folder, $client->photo);
            $client->photo = $response;
        }
        $client->update([
            'photo' => $client->photo,
            'number' => $request->number,
            'title' => $request->title,

        ]);
        Toastr::success('Client Info Updated!','Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->status == 'draft';
        $client->save();
        $client->delete();
        Toastr::success('Client Info Trashed!','Success');
        return back();
    }
    public function status(Client $client)
    {
        if ($client->status == 'publish') {
            $client->status = 'draft';
            $client->save();
        } else {
            $client->status = 'publish';
            $client->save();
        }
        Toastr::success($client->status == 'publish' ? 'Client  info Published' : 'Client Info Drafted','Success');
        return back();
    }
    public function reStore($id)
    {
        $client = Client::onlyTrashed()->find($id);
        $client->restore();
        Toastr::success('Client Info Restored!','Success');
        return back();
    }
    public function permDelete($id)
    {
        $client = Client::onlyTrashed()->find($id);
        $client->forceDelete();
        Toastr::success('Client Info Deleted!','Success');
        return back();
    }
}
