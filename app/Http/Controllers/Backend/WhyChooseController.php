<?php

namespace App\Http\Controllers\Backend;

use App\Models\WhyChoose;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class WhyChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activewhychoose = WhyChoose::where('status', 'publish')->paginate(10);
        $draftwhychoose = WhyChoose::where('status', 'draft')->paginate(10);
        $trashedwhychoose = WhyChoose::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        $whychooseModaldata = WhyChoose::get();
        return view('backend.whychoose.index', compact('activewhychoose', 'draftwhychoose', 'trashedwhychoose','whychooseModaldata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.whychoose.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'description' => 'nullable',
            'icon' => 'nullable|mimes:png,jpg,jpeg,gif|max:5000',
        ]);
        $icon = $request->file('icon');
        if ($icon) {
            $folder = 'whychoose';
            $response = cloudUpload($icon, $folder, null);
            $icon = $response;
        }
        WhyChoose::create([
            'title' => $request->title,
            'alt_text' => $request->alt_text,
            'counter' => $request->counter,
            'content' => $request->content,
            'description' => $request->description,
            'icon' => $icon,

        ]);
        Toastr::success('WhyChoose Info Added Successful!','Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(WhyChoose $whyChoose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhyChoose $whyChoose)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WhyChoose $whyChoose)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'description' => 'nullable',
            'icon' => 'nullable|mimes:png,jpg,jpeg,gif,svg|max:5000',
        ]);
        
        if ($request->has('icon')) {
            $folder = 'whychoose';
            $response = cloudUpload($request->icon, $folder, $whyChoose->icon);
            $whyChoose->icon = $response;
        }
        if ($request->has('icon')) {
            WhyChoose::where('id', $request->id)->update([
                'title' => $request->title,
                'slug' => Str::slug($request->slug ?? $request->title),
                'alt_text' => $request->alt_text,
                'counter' => $request->counter,
                'content' => $request->content,
                'description' => $request->description,
                'icon' => $whyChoose->icon,
    
            ]);
        }
        else{
            WhyChoose::where('id', $request->id)->update([
                'title' => $request->title,
                'slug' => Str::slug($request->slug ?? $request->title),
                'alt_text' => $request->alt_text,
                'counter' => $request->counter,
                'content' => $request->content,
                'description' => $request->description,
              
    
            ]);
        }
     
        Toastr::success('WhyChoose Info Updated!','Success');
        return redirect(route('backend.whyChoose.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhyChoose $whyChoose)
    {
        $whyChoose->save();
        $whyChoose->delete();
        Toastr::success('WhyChoose Info Trashed!','Success');
        return back();
    }
    public function status(WhyChoose $whyChoose)
    {
        if ($whyChoose->status == 'publish') {
            $whyChoose->status = 'draft';
            $whyChoose->save();
        } else {
            $whyChoose->status = 'publish';
            $whyChoose->save();
        }
        Toastr::success($whyChoose->status == 'publish' ? 'WhyChoose info Published' : 'WhyChoose info Drafted','Success');
        return back();
    }
    public function reStore($id)
    {
        $whyChoose = WhyChoose::onlyTrashed()->find($id);
        $whyChoose->restore();
        Toastr::success('WhyChoose Info Restored!','Success');
        return back();
    }
    public function permDelete($id)
    {
        $whyChoose = WhyChoose::onlyTrashed()->find($id);
        $whyChoose->forceDelete();
        Toastr::success('WhyChoose Info Deleted!','Success');
        return back();
    }
}
