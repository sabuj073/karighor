<?php

namespace App\Http\Controllers\Backend;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activetype = Type::orderBy('created_at','desc')->paginate(15);
        return view('backend.product.type.index',compact('activetype'));
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
        Type::create([
            'name'=>$request->name,
        ]);
        Toastr::success("Type Name Added", 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $type->update([
            'name' => $request->name,

        ]);
        Toastr::success('Type Info Updated!','Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        Toastr::success('Type Info Deleted!','Success');
        return back();
    }
}
