<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $activeProducts = Product::where('status', 'publish')->orderBy('order_number', 'desc')->get();
        $serialNumber = 0;
        // $draftProducts = Product::where('status', 'draft')->orderBy('order_level', 'desc')->paginate(10);
        // $trashedProducts = Product::onlyTrashed()->orderBy('order_level', 'desc')->paginate(10);
        // return view('backend.product.index', compact('activeProducts', 'draftProducts', 'trashedProducts'));
        if (request()->ajax()) {

            // $status = $request->input('status');
            // $data = Product::query()
            //     ->where('status', 'publish')
            //     ->orderBy('created_at', 'desc')
            //     ->get();

            // if ($status === 'trash') {
            //     $data->onlyTrashed();
            // } else {
            //     $data->where('status', $status);
            // }
            $status = $request->input('status');
            $data = Product::query()->orderBy('created_at', 'desc');
            if ($status === 'trash') {
                $data->onlyTrashed();
            } else {
                $data->where('status', $status);
            }
            return DataTables::of($data)
                ->addColumn('action', function ($data) use ($status) {

                    if ($status === 'publish') {
                        return '<a href="' . route('backend.product.edit', ['product' => $data->id]) . '" class="btn btn-sm btn-info">
                        <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="' . route('backend.product.status', $data->id) . '"
                        class="btn btn-sm btn-warning">
                        <i class="fa-solid fa-pen-ruler"></i>
                        </a>
                        <a href="' . route('backend.product.trash', $data->id) . '"
                        class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-trash"></i>
                        </a>';
                        // Trashed property, show Restore and Delete buttons

                    } elseif ($status === 'draft') {
                        // Draft property, show Publish, Edit, and Trash buttons
                        return '<a href="#" class="btn btn-sm btn-info">
                        <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                            <a href="' . route('backend.product.status', $data->id) . '"
                            class="btn ' . ($data->status == 'publish' ? 'btn-warning' : 'btn-success') . '">' . ($data->status == 'publish' ? '<i class="fa-solid fa-pen-ruler"></i>' : '<i class="fa-solid fa-upload"></i>') . '</a>

                           
                            <a href="' . route('backend.product.trash', $data->id) . '"
                            class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash"></i>
                            </a>';
                    } else {

                        return '<a href="' . route('backend.product.reStore', $data->id) . '"
                            class="btn btn-sm btn-success">
                            <i class="fa-solid fa-box"></i>
                            </a>
                            <form action="' . route('backend.product.delete', $data->id) . '" method="POST" class="delete_form">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-sm btn-danger"  style="margin-top: 5px;" 
                                    onclick="return confirm(\'Are you Sure to Delete?\')">
                                    <i class="fa-solid fa-trash-can"></i>
                                    </button>
                            </form>';
                    }
                })
                ->addColumn('category', function ($data) {
                    return $data->category->name ?? '';
                })
                ->addColumn('sl', function ($data) use (&$serialNumber) {
                    // Increment the serial number for each row
                    return ++$serialNumber;
                })

                ->rawColumns(['action', 'category', 'sl'])
                ->make(true);
        }
        return view('backend.product.index', compact('activeProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 'publish')->get();
        return view('backend.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $thumbnail = $request->file('thumbnail');
        $photo = $request->file('photo');
        $m_photo = $request->file('m_photo');
        if ($thumbnail) {
            $folder = 'product';
            $response = cloudUpload($thumbnail, $folder, null);
            $thumbnail = $response;
        }
        if ($photo) {
            $folder = 'product';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        if ($m_photo) {
            $folder = 'product';
            $response = cloudUpload($m_photo, $folder, null);
            $m_photo = $response;
        }
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pdfName = time() . '_' . uniqid() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move('storage/product', $pdfName);
        }
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
        $type_sf_info = [];
        $type_sf = $request->t_name;
        if ($type_sf) {
            $type_data = [];
            foreach ($type_sf as $key => $t_name) {
                $type_data[] = [
                    'name' => $t_name,
                    'value' => $request->t_value[$key],
                ];
            }

            $type_sf_info[] = [
                'type' => $request->type,
                'data' => $type_data
            ];
        }

        // Convert to JSON
        $type_sf_info_json = json_encode($type_sf_info);
        $specification_json = json_encode($specification_info);

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'order_number' => $request->order_number ?? 0,
            'slug' => Str::slug($request->slug) . '-' . Str::random(5),
            'thumbnail' => $thumbnail,
            'photo' => $photo,
            'sku' => $request->sku,
            'description' => $request->description,
            'feature' => $request->feature,
            'specification' => $specification_json,
            'type_specification' => $type_sf_info_json,
            'm_photo' => $m_photo ?? $thumbnail,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
            'pdf' => isset($pdfName) ? $pdfName : null,

        ]);
        Toastr::success('Product Info Added', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::where('status', 'publish')->get();
        return view('backend.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        if ($request->has('thumbnail')) {
            $folder = 'product';
            $response = cloudUpload($request->thumbnail, $folder, $product->thumbnail);
            $product->thumbnail = $response;
        }
        if ($request->has('photo')) {
            $folder = 'product';
            $response = cloudUpload($request->photo, $folder, $product->photo);
            $product->photo = $response;
        }
        if ($request->has('m_photo')) {
            $folder = 'product';
            $response = cloudUpload($request->m_photo, $folder, $product->m_photo);
            $product->m_photo = $response;
        }
        if ($request->hasFile('pdf')) {
            if ($product->pdf != null) {
                $existingFile = public_path('storage/product/' . $product->pdf);
                if (file_exists($existingFile)) {
                    unlink($existingFile);
                }
            }
            $pdf = $request->file('pdf');
            $ph_pdf_en = time() . '_' . uniqid() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move('storage/product', $ph_pdf_en);
        }
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
        } elseif ($sf_name_arr) {
            $all_sf_name_arr = $sf_name_arr;
        } else {
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
        // type specification
        $type_sf_info = [];
        $t_sf_name_arr = $request->t_name;
        $t_sf_name_arr_new = $request->t_name_new;
        $t_sf_value_arr = $request->t_value;
        $t_sf_value_new_arr = $request->t_value_new;
        if ($t_sf_name_arr_new && $t_sf_name_arr) {
            $all_t_sf_name_arr = array_merge($t_sf_name_arr, $t_sf_name_arr_new);
        } else if ($t_sf_name_arr_new) {
            $all_t_sf_name_arr = $t_sf_name_arr_new;
        } elseif ($t_sf_name_arr) {
            $all_t_sf_name_arr = $t_sf_name_arr;
        } else {
            $all_t_sf_name_arr = [];
        }
        if ($t_sf_value_new_arr && $t_sf_value_arr) {
            $all_t_sf_value_arr = array_merge($t_sf_value_arr, $t_sf_value_new_arr);
        } else if ($t_sf_value_new_arr) {
            $all_t_sf_value_arr = $t_sf_value_new_arr;
        } else {
            $all_t_sf_value_arr = $t_sf_value_arr;
        }

        if ($all_t_sf_name_arr) {
            $type_data = [];
            foreach ($all_t_sf_name_arr as $key => $t_name) {
                $type_data[] = [
                    'name' => $t_name,
                    'value' => $all_t_sf_value_arr[$key],
                ];
            }

            $type_sf_info[] = [
                'type' => $request->type,
                'data' => $type_data
            ];
        }

        // Convert to JSON
        $type_sf_info_json = json_encode($type_sf_info);


        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'order_number' => $request->order_number,
            'slug' => Str::slug($request->slug),
            'thumbnail' => $product->thumbnail,
            'photo' => $product->photo,
            'sku' => $request->sku,
            'description' => $request->description,
            'feature' => $request->feature,
            'specification' => $specification_json,
            'type_specification' => $type_sf_info_json,
            'm_photo' => $product->m_photo ?? $product->thumbnail,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
            'pdf' => isset($ph_pdf_en) ? $ph_pdf_en : $product->ph_pdf_en,

        ]);
        Toastr::success('Product Info Updated', 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->status == 'draft';
        $product->save();
        $product->delete();
        Toastr::success("Product Info Trashed", 'Success');
        return back();
    }

    public function status(Product $product)
    {
        if ($product->status == 'publish') {
            $product->status = 'draft';
            $product->save();
        } else {
            $product->status = 'publish';
            $product->save();
        }
        Toastr::success($product->status == 'publish' ? 'Product info Published' : 'Product info Drafted', 'Success');
        return back();
    }
    public function reStore($id)
    {
        $product = Product::onlyTrashed()->find($id);
        $product->restore();
        Toastr::success("Product Info Restored", 'Success');
        return back();
    }
    public function permDelete($id)
    {
        $product = Product::onlyTrashed()->find($id);
        $product->forceDelete();
        Toastr::success("Product Info Deleted", 'Success');
        return back();
    }
}
