<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Terms;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activeTerms = Terms::where('status', 'publish')->paginate(10);
        $draftTerms = Terms::where('status', 'draft')->paginate(10);
        $trashedTerms = Terms::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.terms.index', compact('activeTerms', 'draftTerms', 'trashedTerms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.terms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([

            'title' => 'nullable',
            'description' => 'nullable',
        ]);


        Terms::create([

            'title' => $request->title,
            'description' => $request->description,
        ]);
        return back()->with('success', 'Terms and Condition Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Terms $terms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Terms $terms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Terms $terms)
    {
        //

        $request->validate([

            'title' => 'nullable',
            'description' => 'nullable',

        ]);

        // if ($photo) {
        //     $path = public_path('storage/blog/' . $blog->photo);
        //     if (file_exists($path)) {
        //         unlink($path);
        //     }

        //     $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
        //     Image::make($photo)->save(public_path('storage/blog/' . $photoName));
        // } else {
        //     $photoName = $blog->photo;
        // }


        Terms::where('id', $request->id)->update([
            'id' => $request->id,
            'title' => $request->title,
            'description' => $request->description,


        ]);

        return redirect(route('backend.terms.index'))->with('success', 'Terms and Condition Info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Terms $terms)
    {
        //
        $terms->status == 'draft';
        $terms->save();
        $terms->delete();
        return back()->with('success', 'Terms And Condition Trashed');
    }
    public function status(Terms $terms)
    {
        if ($terms->status == 'publish') {
            $terms->status = 'draft';
            $terms->save();
        } else {
            $terms->status = 'publish';
            $terms->save();
        }
        return back()->with('success', $terms->status == 'publish' ? 'Terms info Published' : 'Terms info Drafted');
    }
    public function reStore($id)
    {
        $terms = Terms::onlyTrashed()->find($id);
        $terms->restore();
        return back()->with('success', 'Terms Info Restored');
    }
    public function permDelete($id)
    {
        $terms = Terms::onlyTrashed()->find($id);
        $terms->forceDelete();
        return back()->with('success', 'Terms Info Deleted');
    }
}