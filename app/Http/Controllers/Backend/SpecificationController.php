<?php

namespace App\Http\Controllers\Backend;

use App\Models\Type;
use App\Models\Product;
use function Ramsey\Uuid\v1;

use Illuminate\Http\Request;
use App\Models\Specification;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specifications = Specification::orderBy('created_at','desc')->paginate(15);
        return view('backend.product.specification.index',compact('specifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('status','publish')->orderBy('created_at','desc')->get();
        $types = Type::orderBy('created_at','desc')->get();
        return view('backend.product.specification.create',compact('products','types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $specification_info = [];
        $specification = $request->s_name;
        if ($specification) {
            foreach ($specification as $key => $o_name) {
                $specification_info[] = [
                    'name' => $o_name,
                    'value' => $request->value[$key],
                ];
            }
        }
        $specification_json = json_encode($specification_info);
        Specification::create([
            'product_id'=>$request->product_id,
            'type_id'=>$request->type_id,
            'data'=>$specification_json,
        ]);

        Toastr::success("Specifications Info Added", 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Specification $specification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specification $specification)
    {
        $products = Product::where('status','publish')->orderBy('created_at','desc')->get();
        $types = Type::orderBy('created_at','desc')->get();
        return view('backend.product.specification.edit',compact('specification','products','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specification $specification)
    {
        // specification
        $specification_info = [];
        $sf_name_arr = $request->s_name;
        $sf_name_arr_new = $request->s_name_new;
        $sf_value_arr = $request->s_value;
        $sf_value_new_arr = $request->s_value_new;
        if ($sf_name_arr_new && $sf_name_arr) {
            $all_sf_name_arr = array_merge($sf_name_arr, $sf_name_arr_new);
        } else if ($sf_name_arr_new) {
            $all_sf_name_arr = $sf_name_arr_new;
        } elseif($sf_name_arr) {
            $all_sf_name_arr = $sf_name_arr;
        }else{
            $all_sf_name_arr = []; 
        }
        if ($sf_value_new_arr && $sf_value_arr) {
            $all_sf_value_arr = array_merge($sf_value_arr, $sf_value_new_arr);
        } else if ($sf_value_new_arr) {
            $all_sf_value_arr = $sf_value_new_arr;
        } else {
            $all_sf_value_arr = $sf_value_arr;
        }

        if ($all_sf_name_arr) {
            foreach ($all_sf_name_arr as $key => $o_name) {
                $specification_info[] = [
                    'name' => $o_name,
                    'value' => $all_sf_value_arr[$key],
                ];
            }
        }
        $specification_json = json_encode($specification_info);
        $specification->update([
            'product_id'=>$request->product_id,
            'type_id'=>$request->type_id,
            'data'=>$specification_json,
        ]);

        Toastr::success("Specifications Info Updated", 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specification $specification)
    {
        $specification->delete();
        Toastr::success('Specification Info Deleted!','Success');
        return back();
    }
}
