<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RequirementType;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class RequirementTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $parent =  RequirementType::where('status', 'publish')->whereNull('parent_id')->get();
        $activeRequirement = RequirementType::where('status', 'publish')->paginate(10);
        $draftRequirement = RequirementType::where('status', 'draft')->paginate(10);
        $trashedRequirement = RequirementType::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.requirementType.index', compact('activeRequirement', 'draftRequirement', 'trashedRequirement'));
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
        RequirementType::create([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

        ]);
        Toastr::success('Team Type Info Created!','Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(RequirementType $requirementType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequirementType $requirementType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequirementType $requirementType)
    {



        RequirementType::where('id', $request->id)->update([
            'name' => $request->name,

            'slug' => Str::slug($request->name),
        ]);
        Toastr::success('Team Type Info Edited!','Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequirementType $requirementType)
    {
        $requirementType->status == 'draft';
        $requirementType->save();
        $requirementType->delete();
        return back()->with('success', 'Requirement Type Trashed');
    }
    public function status(RequirementType $requirementType)
    {
        if ($requirementType->status == 'publish') {
            $requirementType->status = 'draft';
            $requirementType->save();
        } else {
            $requirementType->status = 'publish';
            $requirementType->save();
        }
        return back()->with('success', $requirementType->status == 'publish' ? 'Requirement type Published' : 'Requirement Type Drafted');
    }
    public function reStore($id)
    {
        $terms = RequirementType::onlyTrashed()->find($id);
        $terms->restore();
        return back()->with('success', 'RequirementType Info Restored');
    }
    public function permDelete($id)
    {
        $terms = RequirementType::onlyTrashed()->find($id);
        $terms->forceDelete();
        Toastr::success('Team Type Info Deleted!','Success');
        return back();
    }
}
