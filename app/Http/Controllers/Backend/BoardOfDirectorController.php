<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\BoardOfDirector;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BoardOfDirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activedreamWithUs = BoardOfDirector::where('status', 'publish')->paginate(10);
        $draftdreamWithUs = BoardOfDirector::where('status', 'draft')->paginate(10);
        $trasheddreamWithUs = BoardOfDirector::onlyTrashed()->orderBy('id', 'desc')->paginate(10);

        return view('backend.board_of_director.index', compact('activedreamWithUs', 'draftdreamWithUs', 'trasheddreamWithUs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.board_of_director.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg|max:3000',
        ]);
        $photo = $request->file('photo');
        $meta_photo = $request->file('meta_photo');
        if ($meta_photo) {
            $folder = 'team';
            $response = cloudUpload($meta_photo, $folder, null);
            $meta_photo = $response;
        }
        if ($photo) {
            $folder = 'team';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        BoardOfDirector::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'whatsapp' => $request->whatsapp,
            'description' => $request->description,
            'photo' => $photo,
            'alt_text' => $request->alt_text,
            'meta_photo' => $meta_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);
        Toastr::success('Board Of member Added', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(BoardOfDirector $boardOfDirector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoardOfDirector $boardOfDirector)
    {
        //
        return view('backend.board_of_director.edit', compact('boardOfDirector'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BoardOfDirector $boardOfDirector)
    {
        $photo = $request->file('photo');
        $meta_photo = $request->file('meta_photo');
        if ($photo) {
            $folder = 'team';
            $response = cloudUpload($request->photo, $folder, $boardOfDirector->photo);
            $boardOfDirector->photo = $response;
        }
        if ($meta_photo) {
            $folder = 'team';
            $response = cloudUpload($request->meta_photo, $folder, $boardOfDirector->meta_photo);
            $boardOfDirector->meta_photo = $response;
        }

        // if ($request->hasFile('video')) {
        //     $folder = 'videoGallery';
        //     $response = cloudUpload($request->video, $folder, $videoGallery->video);
        //     $videoGallery->video = $response;
        // }

        $boardOfDirector->update([


            'photo' => $boardOfDirector->photo,
            'alt_text' => $request->alt_text,
            'name' => $request->name,
            'designation' => $request->designation,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'whatsapp' => $request->whatsapp,
            'description' => $request->description,

            'meta_photo' => $boardOfDirector->meta_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);
        Toastr::success('Board Of Member  Updated', 'success');
        return redirect(route('backend.board_of_director.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoardOfDirector $boardOfDirector)
    {
        $boardOfDirector->status == 'draft';
        $boardOfDirector->save();
        $boardOfDirector->delete();
        return back()->with('success', 'boardOfDirector Trashed');
    }
    public function status(BoardOfDirector $boardOfDirector)
    {
        if ($boardOfDirector->status == 'publish') {
            $boardOfDirector->status = 'draft';
            $boardOfDirector->save();
        } else {
            $boardOfDirector->status = 'publish';
            $boardOfDirector->save();
        }
        return back()->with('success', $boardOfDirector->status == 'publish' ? 'boardOfDirector type Published' : 'boardOfDirector Drafted');
    }
    public function reStore($id)
    {
        $terms = BoardOfDirector::onlyTrashed()->find($id);
        $terms->restore();
        return back()->with('success', 'BoardOfDirector Info Restored');
    }
    public function permDelete($id)
    {
        $terms = BoardOfDirector::onlyTrashed()->find($id);
        $terms->forceDelete();
        return back()->with('success', 'BoardOfDirector Deleted');
    }
}
