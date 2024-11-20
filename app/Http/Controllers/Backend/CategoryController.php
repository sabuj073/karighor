<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeRequirement = Category::where('status', 'publish')->paginate(10);
        $draftRequirement = Category::where('status', 'draft')->paginate(10);
        $trashedRequirement = Category::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.category.index', compact('activeRequirement', 'draftRequirement', 'trashedRequirement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = Category::where('parent_id', 0)
        //     ->with('childrenCategories')
        //     ->get();
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $logo = $request->file('logo');
        $banner = $request->file('banner');
        $m_photo = $request->file('m_photo');
        if ($logo) {
            $folder = 'category';
            $response = cloudUpload($logo, $folder, null);
            $logo = $response;
        }
        if ($banner) {
            $folder = 'category';
            $response = cloudUpload($banner, $folder, null);
            $banner = $response;
        }
        if ($m_photo) {
            $folder = 'category';
            $response = cloudUpload($m_photo, $folder, null);
            $m_photo = $response;
        }
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'logo' => $logo,
            'banner' => $banner,
            'm_photo' => $m_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);
        Toastr::success('Category Added', 'success');
        return back();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        
        if ($request->has('logo')) {
            $folder = 'Category';
            $response = cloudUpload($request->logo, $folder, $category->logo);
            $category->logo = $response;
        }
        if ($request->has('banner')) {
            $folder = 'Category';
            $response = cloudUpload($request->banner, $folder, $category->banner);
            $category->banner = $response;
        }
        if ($request->has('m_photo')) {
            $folder = 'Category';
            $response = cloudUpload($request->m_photo, $folder, $category->m_photo);
            $category->m_photo = $response;
        }

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'logo' => $category->logo,
            'banner' => $category->banner,
            'm_photo' => $category->m_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);
        Toastr::success('Category  Info Edited!','Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->status == 'draft';
        $category->save();
        $category->delete();
        Toastr::success('Category  Info Trashed!','Success');
        return back();
    }
    public function status(Category $category)
    {
        if ($category->status == 'publish') {
            $category->status = 'draft';
            $category->save();
        } else {
            $category->status = 'publish';
            $category->save();
        }
        Toastr::success($category->status == 'publish' ? 'Category Published' : 'Category Drafted','Success');
        return back();
    }
    public function reStore($id)
    {
        $terms = Category::onlyTrashed()->find($id);
        $terms->restore();
        Toastr::success('Category  Info Restored!','Success');
        return back();
    }
    public function permDelete($id)
    {
        $terms = Category::onlyTrashed()->find($id);
        $terms->forceDelete();
        Toastr::success('Category  Info Deleted!','Success');
        return back();
    }
}
