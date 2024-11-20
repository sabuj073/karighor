<?php

namespace App\Http\Controllers\Backend;

use App\Models\Rating;
use App\Models\Services;
use Illuminate\Support\Str;
use App\Models\HotelBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class HotelBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeRequirement = HotelBooking::where('status', 'publish')->paginate(10);
        $draftRequirement = HotelBooking::where('status', 'draft')->paginate(10);
        $trashedRequirement = HotelBooking::onlyTrashed()->orderBy('id', 'desc')->paginate(10);

        return view('backend.hotel_booking.index', compact('activeRequirement', 'draftRequirement', 'trashedRequirement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Services::where('status','publish')->get();
        return view('backend.hotel_booking.create', compact('services'));
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
        //         $folder = 'HotelBooking';
        //         $response = cloudUpload($photo, $folder, null);
        //         $photo_arr[] = $response;
        //     }
        // }
        // $thumbnails = $request->file('thumbnail');
        // $thumbnail_arr = [];

        // if ($thumbnails) {
        //     foreach ($thumbnails as $thumbnail) {
        //         $folder = 'HotelBooking';
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
        //     $slug_arr[] = Str::slug($ticket_name).'-'.Str::random(5);
        // }
        // $ticket_info = [];
        // foreach ($name_arr as $key => $ticket_name) {
        //     $photo = isset($photo_arr[$key]) ? $photo_arr[$key] : null;
        //     $thumbnail = isset($thumbnail_arr[$key]) ? $thumbnail_arr[$key] : null;
        //     $ticket_info[] = [
        //         'name' => $ticket_name,
        //         'phone' => $phone_arr[$key],
        //         'slug' => $slug_arr[$key],
        //         'photo' => $photo,
        //         'thumbnail' => $thumbnail,
        //         'description' => $description_arr[$key],
        //         'short_description' => $short_description_arr[$key],
        //     ];
        // }


        // $ticket_info_json = json_encode($ticket_info);

        $thumbnail = $request->file('thumbnail');
        $photo = $request->file('photo');
        $m_photo = $request->file('m_photo');

        if ($thumbnail) {
            $folder = 'HotelBooking';
            $response = cloudUpload($thumbnail, $folder, null);
            $thumbnail = $response;
        }
        if ($photo) {
            $folder = 'HotelBooking';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        if ($m_photo) {
            $folder = 'HotelBooking';
            $response = cloudUpload($m_photo, $folder, null);
            $m_photo = $response;
        }

        HotelBooking::create([
            'service_id' => $request->service_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
            'thumbnail' => $thumbnail,
            'photo' => $photo,
            'm_photo' => $m_photo,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'phone' => $request->phone,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
        ]);
        Toastr::success('Hotel Booking Info Added to your Services', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelBooking $hotelBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelBooking $hotelBooking)
    {
        $services = Services::where('status','publish')->get();
        return view('backend.hotel_booking.edit', compact('hotelBooking', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelBooking $hotelBooking)
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
        //         $folder = 'HotelBooking';
        //         $response = cloudUpload($photo, $folder, null);
        //         $photo_arr[] = $response;
        //     }
        // }

        // if ($photo_new) {
        //     foreach ($photo_new as $photo_n) {
        //         $folder = 'HotelBooking';
        //         $response = cloudUpload($photo_n, $folder, null);
        //         $new_photo_arr[] = $response;
        //     }
        // }

        // if ($thumbnails) {
        //     foreach ($thumbnails as $thumbnail) {
        //         $folder = 'HotelBooking';
        //         $response = cloudUpload($thumbnail, $folder, null);
        //         $thumbnail_arr[] = $response;
        //     }
        // }

        // if ($thumbnail_new) {
        //     foreach ($thumbnail_new as $thumbnail_n) {
        //         $folder = 'HotelBooking';
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


        // // foreach ($all_name_arr as $ticket_name) {
        // // }



        // $ticket_info = [];
        // foreach ($all_name_arr as $key => $ticket_name) {
        //     $photo = isset($all_photo_arr[$key]) ? $all_photo_arr[$key] : null;
        //     $thumbnail = $all_thumbnail_arr[$key] ? $all_thumbnail_arr[$key] : null;
        //     $ticket_info[] = [
        //         'name' => $ticket_name,
        //         'phone' => $all_phone_arr[$key],
        //         'slug' => $all_slug_arr[$key],
        //         'photo' => $photo,
        //         'thumbnail' => $thumbnail,
        //         'description' => $all_description_arr[$key],
        //         'short_description' => $all_short_description_arr[$key],
        //     ];
        // }

        // $ticket_info_json = json_encode($ticket_info);

        if ($request->has('thumbnail')) {
            $folder = 'HotelBooking';
            $response = cloudUpload($request->thumbnail, $folder, $hotelBooking->thumbnail);
            $hotelBooking->thumbnail = $response;
        }
        if ($request->has('photo')) {
            $folder = 'HotelBooking';
            $response = cloudUpload($request->photo, $folder, $hotelBooking->photo);
            $hotelBooking->photo = $response;
        }
        if ($request->has('m_photo')) {
            $folder = 'HotelBooking';
            $response = cloudUpload($request->m_photo, $folder, $hotelBooking->m_photo);
            $hotelBooking->m_photo = $response;
        }

        $hotelBooking->update([
            'service_id' => $request->service_id,
            'title' => $request->title,
            'photo' => $hotelBooking->photo,
            'thumbnail' => $hotelBooking->thumbnail,
            'm_photo' => $hotelBooking->m_photo,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'phone' => $request->phone,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
        ]);
        Toastr::success('HotelBooking Info  Updated', 'Success');
        return redirect(route('backend.hotelBooking.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelBooking $hotelBooking)
    {
        $hotelBooking->status == 'draft';
        $hotelBooking->save();
        $hotelBooking->delete();
        return back()->with('success', 'HotelBooking Info Trashed');
    }
    public function status(HotelBooking $hotelBooking)
    {
        if ($hotelBooking->status == 'publish') {
            $hotelBooking->status = 'draft';
            $hotelBooking->save();
        } else {
            $hotelBooking->status = 'publish';
            $hotelBooking->save();
        }
        return back()->with('success', $hotelBooking->status == 'publish' ? 'HotelBooking Info Published' : 'HotelBooking Info Drafted');
    }
    public function reStore($id)
    {
        $hotelBooking = HotelBooking::onlyTrashed()->find($id);
        $hotelBooking->restore();
        return back()->with('success', 'HotelBooking Info Restored');
    }
    public function permDelete($id)
    {
        $hotelBooking = HotelBooking::onlyTrashed()->find($id);
        $hotelBooking->forceDelete();
        return back()->with('success', 'HotelBooking info Deleted');
    }

    public function review()
    {
        $package_review = Rating::where('package_id', null)->paginate(10);
        return view('backend.hotel_booking.review', compact('package_review'));
    }


    public function review_approve(Rating $rating)
    {

       
        if ($rating->approve == 1) {
            $rating->approve = 0;
            $rating->save();
        } else {
            $rating->approve = 1;
            $rating->save();
        }
        Toastr::success($rating->approve == 1 ? 'Approved' : 'Not Approved');
        return back();
    }
}
