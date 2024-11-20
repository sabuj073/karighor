<?php

namespace App\Http\Controllers\Backend;

use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequirementType;
use Brian2694\Toastr\Facades\Toastr;

class TeamController extends Controller
{
    //
    public function index()
    {
        $activeBlogs = Team::where('status', 'publish')->paginate(10);
        $draftBlogs = Team::where('status', 'draft')->paginate(10);
        $trashedBlogs = Team::onlyTrashed()->orderBy('id', 'desc')->paginate(10);

        return view('backend.team.index', compact('activeBlogs', 'draftBlogs', 'trashedBlogs'));
    }

    public function create()
    {
        $types = RequirementType::where('status','publish')->get();
        return view('backend.team.create',compact('types'));
    }

    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $meta_photo = $request->file('meta_photo');
        $slider = $request->file('slider');
        // if ($photo) {
        //     $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
        //     Image::make($photo)->save(public_path('storage/blog/' . $photoName));
        // }
        if ($photo) {
            $folder = 'team';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        if ($slider) {
            $folder = 'team';
            $response = cloudUpload($slider, $folder, null);
            $slider = $response;
        }
        if ($meta_photo) {
            $folder = 'team';
            $response = cloudUpload($meta_photo, $folder, null);
            $meta_photo = $response;
        }

        Team::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'slug' => Str::slug($request->slug ?? $request->name),
            'photo' => $photo,
            'slider' => $slider,

            'designation' => $request->designation,
            'about' => $request->about,
            'experience' => $request->experience,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'website_link' => $request->website_link,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'order_level' => $request->order_level,

            'meta_photo' => $meta_photo,
            'alt_text' => $request->alt_text,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);
        Toastr::success("Team Member Added", 'Success');
        return back();
    }
    public function edit(Team $team)
    {
        $types = RequirementType::where('status','publish')->get();
        return view('backend.team.edit', compact('team','types'));
    }
    public function update(Request $request, Team $team)
    {


        if ($request->has('photo')) {
            $folder = 'team';
            $response = cloudUpload($request->photo, $folder, $team->photo);
            $team->photo = $response;
        }
        if ($request->has('slider')) {
            $folder = 'team';
            $response = cloudUpload($request->slider, $folder, $team->slider);
            $team->slider = $response;
        }
        if ($request->has('meta_photo')) {
            $folder = 'team';
            $response = cloudUpload($request->meta_photo, $folder, $team->meta_photo);
            $team->meta_photo = $response;
        }



        $team->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug ?? $request->name),
            'type_id' => $request->type_id,
            'photo' => $team->photo,
            'slider' => $team->slider,
            'designation' => $request->designation,
            'about' => $request->about,
            'experience' => $request->experience,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'website_link' => $request->website_link,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'order_level' => $request->order_level,

            'meta_photo' => $team->meta_photo,
            'alt_text' => $request->alt_text,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
        ]);
        Toastr::success("Team Update Successful", 'Success');
        return redirect(route('backend.team.index'));
    }
    public function destroy(Team $team)
    {
        $team->status == 'draft';
        $team->save();
        $team->delete();
        Toastr::success("Team Info Trashed", 'Success');
        return back();
    }

    public function status(Team $team)
    {
        if ($team->status == 'publish') {
            $team->status = 'draft';
            $team->save();
        } else {
            $team->status = 'publish';
            $team->save();
        }
        Toastr::success($team->status == 'publish' ? 'Team info Published' : 'Team info Drafted', 'Success');
        return back();
    }
    public function reStore($id)
    {
        $team = Team::onlyTrashed()->find($id);
        $team->restore();
        Toastr::success("Team Info Restored", 'Success');
        return back();
    }
    public function permDelete($id)
    {
        $blog = Team::onlyTrashed()->find($id);
        $blog->forceDelete();
        Toastr::success("Team Info Deleted", 'Success');
        return back();
    }
}
