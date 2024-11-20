<?php

namespace App\Http\Controllers\Backend;

use App\Models\Flag;
use App\Models\Services;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class FlagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeRequirement = Flag::where('status', 'publish')->paginate(10);
        $draftRequirement = Flag::where('status', 'draft')->paginate(10);
        $trashedRequirement = Flag::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        $package_one = Flag::get();

        return view('backend.flag.index', compact('activeRequirement', 'draftRequirement', 'trashedRequirement', 'package_one'));
    }
    public function index_flag()
    {
        $activeRequirement = Flag::where('status', 'publish')->where('type', null)->paginate(10);
        $draftRequirement = Flag::where('status', 'draft')->where('type', null)->paginate(10);
        $trashedRequirement = Flag::onlyTrashed()->where('type', null)->orderBy('id', 'desc')->paginate(10);
        $package_one = Flag::where('service_id', 20)->get();

        return view('backend.visa_flag.index', compact('activeRequirement', 'draftRequirement', 'trashedRequirement', 'package_one'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Services::where('status','publish')->get();
        return view('backend.flag.create', compact('services'));
    }
    public function create_flag()
    {
        $services = Services::where('status','publish')->get();
        return view('backend.visa_flag.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $photos = $request->file('photo');
        // $photo_arr = [];

        // if ($photos) {
        //     foreach ($photos as $photo) {
        //         $folder = 'Flags';
        //         $response = cloudUpload($photo, $folder, null);
        //         $photo_arr[] = $response;
        //     }
        // }
        // $thumbnails = $request->file('thumbnail');
        // $thumbnail_arr = [];

        // if ($thumbnails) {
        //     foreach ($thumbnails as $thumbnail) {
        //         $folder = 'Flags';
        //         $response = cloudUpload($thumbnail, $folder, null);
        //         $thumbnail_arr[] = $response;
        //     }
        // }

        // $name_arr = $request->name;
        // $phone_arr = $request->phone;
        // $description_arr = $request->description;
        // $short_description_arr = $request->short_description;
        // $slug_arr = [];
        // // .'_'.Str::random(5)
        // foreach ($name_arr as $ticket_name) {
        //     $slug_arr[] = Str::slug($ticket_name) . '-' . Str::random(5);
        // }
        // $ticket_info = [];
        // foreach ($name_arr as $key => $ticket_name) {
        //     $photo = isset($photo_arr[$key]) ? $photo_arr[$key] : null;
        //     $thumbnail = isset($thumbnail_arr[$key]) ? $thumbnail_arr[$key] : null;

        //     if (!isset($phone_arr[$key]) || $short_description_arr[$key] === null) {
        //         $ticket_info[] = [
        //             'name' => $ticket_name,
        //             'slug' => $slug_arr[$key],
        //             'photo' => $photo,
        //             'thumbnail' => $thumbnail,
        //             'description' => $description_arr[$key],

        //         ];
        //     } else {
        //         $ticket_info[] = [
        //             'name' => $ticket_name,
        //             'phone' => $phone_arr[$key] ?? null,
        //             'slug' => $slug_arr[$key],
        //             'photo' => $photo,
        //             'thumbnail' => $thumbnail,
        //             'description' => $description_arr[$key],
        //             'short_description' => $short_description_arr[$key] ?? null,
        //         ];
        //     }
        // }

        // $ticket_info_json = json_encode($ticket_info);

        $photo = $request->file('photo');
        $thumbnail = $request->file('thumbnail');
        $m_photo = $request->file('m_photo');
       
        if ($photo) {
            $folder = 'Flag';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        if ($thumbnail) {
            $folder = 'Flag';
            $response = cloudUpload($thumbnail, $folder, null);
            $thumbnail = $response;
        }
        if ($m_photo) {
            $folder = 'Flag';
            $response = cloudUpload($m_photo, $folder, null);
            $m_photo = $response;
        }

        Flag::create([
            'service_id' => $request->service_id,
            'type' => $request->type,
            'name' => $request->name,
            'slug' => Str::slug($request->name).'-'.Str::random(5),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'photo' => $photo,
            'thumbnail' => $thumbnail,
            'm_photo' => $m_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
        ]);
        Toastr::success('Flags Added to your services', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Flag $flag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flag $flag)
    {
        $services = Services::where('status','publish')->get();
        return view('backend.flag.edit', compact('flag', 'services'));
    }
    public function edit_flag(Flag $flag)
    {
        $services = Services::where('status','publish')->get();
        return view('backend.visa_flag.edit', compact('flag', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flag $flag)
    {

       
        // $photo_hidden = $request->photo_hidden;
        // $photos = $request->file('photo');
        // $photo_new = $request->file('photo_new');
        // $photo_arr = [];
        // $new_photo_arr = [];


        // $thumbnail_hidden = $request->hidden_thumbnail;
        // $thumbnails = $request->file('thumbnail');
        // $thumbnail_new = $request->file('thumbnail_new');
        // $thumbnail_arr = [];
        // $new_thumbnail_arr = [];


        // if ($photos) {
        //     foreach ($photos as $photo) {
        //         $folder = 'Flags';
        //         $response = cloudUpload($photo, $folder, null);
        //         $photo_arr[] = $response;
        //     }
        // }

        // if ($photo_new) {
        //     foreach ($photo_new as $photo_n) {
        //         $folder = 'Flags';
        //         $response = cloudUpload($photo_n, $folder, null);
        //         $new_photo_arr[] = $response;
        //     }
        // }

        // if ($thumbnails) {
        //     foreach ($thumbnails as $thumbnail) {
        //         $folder = 'Flags';
        //         $response = cloudUpload($thumbnail, $folder, null);
        //         $thumbnail_arr[] = $response;
        //     }
        // }

        // if ($thumbnail_new) {
        //     foreach ($thumbnail_new as $thumbnail_n) {
        //         $folder = 'Flags';
        //         $response = cloudUpload($thumbnail_n, $folder, null);
        //         $new_thumbnail_arr[] = $response;
        //     }
        // }
        // $all_photo_arr = array_merge($photo_hidden, $photo_arr, $new_photo_arr);
        // $all_thumbnail_arr = array_merge($thumbnail_hidden, $thumbnail_arr, $new_thumbnail_arr);

        // $name_arr = $request->name;
        // $name_arr_new = $request->name_new;

        // $phone_arr = $request->phone;
        // $phone_arr_new = $request->phone_new;

        // $description_arr = $request->description;
        // $description_arr_new = $request->description_new;

        // $slug_arr = $request->slug;
        // $slug_arr_new = [];
        // if ($name_arr_new) {
        //     foreach ($name_arr_new as $n_name) {
        //         $slug_arr_new[] = Str::slug($n_name) . '-' . Str::random(5);
        //     }
        // }

        // $short_description_arr = $request->short_description;
        // $short_description_arr_new = $request->short_description_new;
        // if ($name_arr_new) {
        //     $all_name_arr = array_merge($name_arr, $name_arr_new);
        // } else {
        //     $all_name_arr = $name_arr;
        // }

        // if ($phone_arr_new) {
        //     $all_phone_arr = array_merge($description_arr, $phone_arr_new);
        // } else {
        //     $all_phone_arr = $phone_arr;
        // }
        // if ($description_arr_new) {
        //     $all_description_arr = array_merge($description_arr, $description_arr_new);
        // } else {
        //     $all_description_arr = $description_arr;
        // }

        // if ($slug_arr_new) {
        //     $all_slug_arr = array_merge($slug_arr, $slug_arr_new);
        // } else {
        //     $all_slug_arr = $slug_arr;
        // }
        // if ($short_description_arr_new) {
        //     $all_short_description_arr = array_merge($short_description_arr, $short_description_arr_new);
        // } else {
        //     $all_short_description_arr = $short_description_arr;
        // }


        // $ticket_info = [];
        // foreach ($all_name_arr as $key => $ticket_name) {
        //     $photo = isset($all_photo_arr[$key]) ? $all_photo_arr[$key] : null;
        //     $thumbnail = $all_thumbnail_arr[$key] ? $all_thumbnail_arr[$key] : null;


        //     if (!isset($all_phone_arr[$key]) || $all_short_description_arr[$key] === null) {
        //         $ticket_info[] = [
        //             'name' => $ticket_name,
        //             'slug' => $all_slug_arr[$key],
        //             'photo' => $photo,
        //             'thumbnail' => $thumbnail,
        //             'description' => $all_description_arr[$key],

        //         ];
        //     } else {
        //         $ticket_info[] = [
        //             'name' => $ticket_name,
        //             'phone' => $all_phone_arr[$key],
        //             'slug' => $all_slug_arr[$key],
        //             'photo' => $photo,
        //             'thumbnail' => $thumbnail,
        //             'description' => $all_description_arr[$key],
        //             'short_description' => $all_short_description_arr[$key],
        //         ];
        //     }
        // }

        // $ticket_info_json = json_encode($ticket_info);

         if ($request->has('photo')) {
            $folder = 'Flag';
            $response = cloudUpload($request->photo, $folder, $flag->photo);
            $flag->photo = $response;
        }
         if ($request->has('thumbnail')) {
            $folder = 'Flag';
            $response = cloudUpload($request->thumbnail, $folder, $flag->thumbnail);
            $flag->thumbnail = $response;
        }
         if ($request->has('m_photo')) {
            $folder = 'Flag';
            $response = cloudUpload($request->m_photo, $folder, $flag->m_photo);
            $flag->m_photo = $response;
        }

        $flag->update([
            'service_id' => $request->service_id,
            'type' => $request->type,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'photo' => $flag->photo,
            'thumbnail' => $flag->thumbnail,
            'm_photo' => $flag->m_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
        ]);
        Toastr::success('Flags  Updated', 'success');
        return redirect(route('backend.flag.index'));
    }
    public function update_flag(Request $request, Flag $flag)
    {

        // if ($request->has('photo')) {
        //     $folder = 'Flags';
        //     $response = cloudUpload($request->photo, $folder, $flag->photo);
        //     $flag->photo = $response;
        // }
        $photo_hidden = $request->photo_hidden;
        $photos = $request->file('photo');
        $photo_new = $request->file('photo_new');
        $photo_arr = [];
        $new_photo_arr = [];


        $thumbnail_hidden = $request->hidden_thumbnail;
        $thumbnails = $request->file('thumbnail');
        $thumbnail_new = $request->file('thumbnail_new');
        $thumbnail_arr = [];
        $new_thumbnail_arr = [];


        if ($photos) {
            foreach ($photos as $photo) {
                $folder = 'Flags';
                $response = cloudUpload($photo, $folder, null);
                $photo_arr[] = $response;
            }
        }

        if ($photo_new) {
            foreach ($photo_new as $photo_n) {
                $folder = 'Flags';
                $response = cloudUpload($photo_n, $folder, null);
                $new_photo_arr[] = $response;
            }
        }

        if ($thumbnails) {
            foreach ($thumbnails as $thumbnail) {
                $folder = 'Flags';
                $response = cloudUpload($thumbnail, $folder, null);
                $thumbnail_arr[] = $response;
            }
        }

        if ($thumbnail_new) {
            foreach ($thumbnail_new as $thumbnail_n) {
                $folder = 'Flags';
                $response = cloudUpload($thumbnail_n, $folder, null);
                $new_thumbnail_arr[] = $response;
            }
        }
        $all_photo_arr = array_merge($photo_hidden, $photo_arr, $new_photo_arr);
        $all_thumbnail_arr = array_merge($thumbnail_hidden, $thumbnail_arr, $new_thumbnail_arr);

        $name_arr = $request->name;
        $name_arr_new = $request->name_new;

        $phone_arr = $request->phone;
        $phone_arr_new = $request->phone_new;

        $description_arr = $request->description;
        $description_arr_new = $request->description_new;

        $slug_arr = $request->slug;
        $slug_arr_new = [];
        if ($name_arr_new) {
            foreach ($name_arr_new as $n_name) {
                $slug_arr_new[] = Str::slug($n_name) . '-' . Str::random(5);
            }
        }

        $short_description_arr = $request->short_description;
        $short_description_arr_new = $request->short_description_new;
        if ($name_arr_new) {
            $all_name_arr = array_merge($name_arr, $name_arr_new);
        } else {
            $all_name_arr = $name_arr;
        }

        if ($phone_arr_new) {
            $all_phone_arr = array_merge($description_arr, $phone_arr_new);
        } else {
            $all_phone_arr = $phone_arr;
        }
        if ($description_arr_new) {
            $all_description_arr = array_merge($description_arr, $description_arr_new);
        } else {
            $all_description_arr = $description_arr;
        }

        if ($slug_arr_new) {
            $all_slug_arr = array_merge($slug_arr, $slug_arr_new);
        } else {
            $all_slug_arr = $slug_arr;
        }
        if ($short_description_arr_new) {
            $all_short_description_arr = array_merge($short_description_arr, $short_description_arr_new);
        } else {
            $all_short_description_arr = $short_description_arr;
        }


        // foreach ($all_name_arr as $ticket_name) {
        // }


        $ticket_info = [];
        foreach ($all_name_arr as $key => $ticket_name) {
            $photo = isset($all_photo_arr[$key]) ? $all_photo_arr[$key] : null;
            $thumbnail = $all_thumbnail_arr[$key] ? $all_thumbnail_arr[$key] : null;


            if (!isset($all_phone_arr[$key]) || $all_short_description_arr[$key] === null) {
                $ticket_info[] = [
                    'name' => $ticket_name,
                    'slug' => $all_slug_arr[$key],
                    'photo' => $photo,
                    'thumbnail' => $thumbnail,
                    'description' => $all_description_arr[$key],

                ];
            } else {
                $ticket_info[] = [
                    'name' => $ticket_name,
                    'phone' => $all_phone_arr[$key],
                    'slug' => $all_slug_arr[$key],
                    'photo' => $photo,
                    'thumbnail' => $thumbnail,
                    'description' => $all_description_arr[$key],
                    'short_description' => $all_short_description_arr[$key],
                ];
            }
        }

        $ticket_info_json = json_encode($ticket_info);

        $flag->update([
            'service_id' => $request->service_id,
            'type' => $request->type,
            'description' => $request->description,
            'ticket_info' => $ticket_info_json,
        ]);
        Toastr::success('Flags  Updated', 'success');
        return redirect(route('backend.visa_flag.index_flag'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flag $flag)
    {
        $flag->status == 'draft';
        $flag->save();
        $flag->delete();
        return back()->with('success', 'Flag Trashed');
    }
    public function status(Flag $flag)
    {
        if ($flag->status == 'publish') {
            $flag->status = 'draft';
            $flag->save();
        } else {
            $flag->status = 'publish';
            $flag->save();
        }
        return back()->with('success', $flag->status == 'publish' ? 'Flag type Published' : 'Flag Drafted');
    }
    public function reStore($id)
    {
        $terms = Flag::onlyTrashed()->find($id);
        $terms->restore();
        return back()->with('success', 'Flag Info Restored');
    }
    public function permDelete($id)
    {
        $terms = Flag::onlyTrashed()->find($id);
        $terms->forceDelete();
        return back()->with('success', 'Flag Deleted');
    }
}
