<?php

namespace App\Http\Controllers\Backend;

use App\Models\Services;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeService = Services::where('status', 'publish')->orderBy('order_level', 'desc')->paginate(10);
        $draftService = Services::where('status', 'draft')->orderBy('order_level', 'desc')->paginate(10);
        $trashedService = Services::onlyTrashed()->orderBy('order_level', 'desc')->paginate(10);

        return view('backend.services.index', compact('activeService', 'draftService', 'trashedService'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $logo = $request->file('logo');
        $package_photo = $request->file('package_photo');
        $single_banner = $request->file('s_banner');
        $p_banner = $request->file('p_banner');
        $slider = $request->file('slider');
        $airline_photo = $request->file('airline_photo');
        $banner = $request->file('banner');
        $r_photo = $request->file('r_photo');
        $photo = $request->file('photo');
        $photo1 = $request->file('photo1');
        $photo2 = $request->file('photo2');
        $m_photo = $request->file('m_photo');
        $thumbnail = $request->file('thumbnail');

        if ($logo) {
            $folder = 'services';
            $response = cloudUpload($logo, $folder, null);
            $logo = $response;
        }
        if ($thumbnail) {
            $folder = 'services';
            $response = cloudUpload($thumbnail, $folder, null);
            $thumbnail = $response;
        }
        if ($single_banner) {
            $folder = 'services';
            $response = cloudUpload($single_banner, $folder, null);
            $single_banner = $response;
        }
        if ($p_banner) {
            $folder = 'services';
            $response = cloudUpload($p_banner, $folder, null);
            $p_banner = $response;
        }


        $r_images = [];
        $r_name_arr = $request->r_name;
        $office_name = $request->office_name;
        // $r_descriptions = [];
        // if ($r_photo) {
        //     foreach ($r_photo as $key => $r_photoData) {
        //         $folder = 'services';
        //         $response = cloudUpload($r_photoData, $folder, null);
        //         $r_images[$key] = $response;
        //         $r_descriptions[$key] = $request->r_description[$key] ?? null;
        //     }
        // }
        $reservationData = [];
        $contact_info = [];
        if ($r_name_arr) {
            foreach ($r_name_arr as $key => $r_name) {
                $reservationData[] = [
                    'name' => $r_name,
                    'description' => $request->r_description[$key],
                ];
            }
        }
        if ($office_name) {
            foreach ($office_name as $key => $o_name) {
                $contact_info[] = [
                    'name' => $o_name,
                    'phone' => $request->office_phone[$key],
                ];
            }
        }

        $reservationData_json = json_encode($reservationData);
        $contact_info_json = json_encode($contact_info);



        // $reservationData = [
        //     'reservation' => [
        //         'name' => $r_images,
        //         'description' => $r_descriptions,
        //     ],
        // ];


        $s_images = [];
        if ($slider) {
            foreach ($slider as $sliderD) {
                $folder = 'services';
                $response = cloudUpload($sliderD, $folder, null);
                $s_images[] = $response;
            }
        }
        $s_images = implode(";", $s_images);
        $air_images = [];
        if ($airline_photo) {
            foreach ($airline_photo as $air_photo) {
                $folder = 'services';
                $response = cloudUpload($air_photo, $folder, null);
                $air_images[] = $response;
            }
        }
        $air_images = implode(";", $air_images);
        $b_images = [];
        if ($banner) {
            foreach ($banner as $b_photo) {
                $folder = 'services';
                $response = cloudUpload($b_photo, $folder, null);
                $b_images[] = $response;
            }
        }
        $b_images = implode(";", $b_images);


        if ($photo) {
            $folder = 'services';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        if ($photo1) {
            $folder = 'services';
            $response = cloudUpload($photo1, $folder, null);
            $photo1 = $response;
        }
        if ($photo2) {
            $folder = 'services';
            $response = cloudUpload($photo2, $folder, null);
            $photo2 = $response;
        }

        if ($m_photo) {
            $folder = 'services';
            $response = cloudUpload($m_photo, $folder, null);
            $m_photo = $response;
        }

        // $airlineNames = explode(';', $request->airline_name);
        // $airlineSlugs = [];

        // foreach ($airlineNames as $airlineName) {
        //     $airlineSlugs[] = Str::slug($airlineName);
        // }

        Services::create([
            'logo' => $logo,
            'thumbnail' => $thumbnail,
            's_banner' => $single_banner,
            'p_banner' => $p_banner,
            'type' => $request->type,
            'package_photo' => $package_photo,
            'slider' => $s_images,
            'airline_photo' => $air_images,
            'banner' => $b_images,
            'photo' => $photo,
            'photo1' => $photo1,
            'photo2' => $photo2,
            'alt_text' => $request->alt_text,
            'title' => $request->title,
            'slug' => Str::slug($request->slug ? $request->slug : $request->title),
            'short_description' => $request->short_description,
            'order_level' => $request->order_level ?? 0,
            'title1' => $request->title1,
            'title2' => $request->title2,
            'title3' => $request->title3,
            'title4' => $request->title4,
            'title5' => $request->title5,
            'title6' => $request->title6,
            'content1' => $request->content1,
            'content2' => $request->content2,
            'content3' => $request->content3,
            'content4' => $request->content4,
            'content5' => $request->content5,
            'hajj_content' => $request->hajj_content,
            'section_tags' => $request->section_tags,

            'airline_name' => $request->airline_name,
            'link_url' => $request->link_url,
            // 'airline_slug' => $airlineSlugs,
            // 'airline_description' => $request->airline_description,


            'm_photo' => $m_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

            'reservation' => $reservationData_json,
            'contact_info' => $contact_info_json
        ]);

        // Services::create($services);

        Toastr::success('Services Info Created Successful!', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $services)
    {
        return view('backend.services.edit', compact('services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Services $services)
    {

        $slider = $request->file('slider');

        $airline_photo = $request->file('airline_photo');
        $banner = $request->file('banner');
        $r_photo = $request->file('r_photo');
        $r_photo_new = $request->file('r_photo_new');

        $s_hidden_image = $request->s_image;
        $air_image_hidden_image = $request->air_image;
        $b_hidden_image = $request->b_image;

        $hidden_r_photo = $request->hidden_r_photo;
        $photo = $request->hidden_photo;
        $photo1 = $request->hidden_photo1;
        $s_banner = $request->hidden_s_banner;
        $p_banner = $request->hidden_p_banner;



        $r_images = [];
        $r_descriptions = [];
        $r_images1 = [];
        $r_descriptions1 = [];
        if ($r_photo) {
            foreach ($r_photo as $key => $r_photoData) {
                $folder = 'services';
                $response = cloudUpload($r_photoData, $folder, null);
                $r_images[$key] = $response;
                $r_descriptions[$key] = $request->r_description[$key] ?? null;
            }
        }

        if ($hidden_r_photo) {
            foreach ($hidden_r_photo as $key => $r_photoData) {
                $r_descriptions[$key] = $request->r_description[$key] ?? null;
            }
        }

        if ($r_photo_new) {
            foreach ($r_photo_new as $key => $r_photoData) {
                $folder = 'services';
                $response = cloudUpload($r_photoData, $folder, null);
                $r_images1[$key] = $response;
                $r_descriptions1[$key] = $request->r_description_new[$key] ?? null;
            }
        }

        foreach ($r_images as $key => $value) {
            $hidden_r_photo[$key] = $value;
        }
        $hidden_r_photo = $hidden_r_photo ?? [];
        $r_images1 = $r_images1 ?? [];

        $allPhoto = array_merge($hidden_r_photo, $r_images1);
        $hidden_r_description = $request->hidden_r_description;
        $allDes = array_merge($r_descriptions, $r_descriptions1);



        $name_arr = $request->r_name;
        $description_arr = $request->r_description;
        $new_description_arr = $request->r_description_new;
        $name_arr_new = $request->r_name_new;
        if ($name_arr_new) {
            $all_name_arr = array_merge($name_arr, $name_arr_new);
        } else {
            $all_name_arr = $name_arr;
        }
        if ($new_description_arr) {
            $all_description_arr = array_merge($description_arr, $new_description_arr);
        } else {
            $all_description_arr = $description_arr;
        }

        $office_name_arr = $request->office_name;
        $office_name_arr_new = $request->office_name_new;
        $office_phone_arr = $request->office_phone;
        $office_phone_new_arr = $request->office_phone_new;
        if ($office_name_arr_new && $office_name_arr) {
            $all_office_name_arr = array_merge($office_name_arr, $office_name_arr_new);
        } else if ($office_name_arr_new) {
            $all_office_name_arr = $office_name_arr_new;
        } else {
            $all_office_name_arr = $office_name_arr;
        }
        if ($office_phone_new_arr && $office_phone_arr) {
            $all_office_phone_arr = array_merge($office_phone_arr, $office_phone_new_arr);
        } else if ($office_phone_new_arr) {
            $all_office_phone_arr = $office_phone_new_arr;
        } else {
            $all_office_phone_arr = $office_phone_arr;
        }


        $reservationData = [];
        foreach ($all_name_arr as $key => $r_name) {
            $reservationData[] = [
                'name' => $r_name,
                'description' => $all_description_arr[$key],
            ];
        }
        $reservationdata_json = json_encode($reservationData);

        $contact_info = [];
        foreach ($all_office_name_arr as $key => $o_name) {
            $contact_info[] = [
                'name' => $o_name,
                'phone' => $all_office_phone_arr[$key],
            ];
        }
        $reservationdata_json = json_encode($reservationData);
        $contact_info_json = json_encode($contact_info);


        // slider image
        $s_images = [];
        if ($request->has('slider')) {
            if ($slider) {
                foreach ($slider as $s_photos) {
                    $folder = 'photo_gallery';
                    $response = cloudUpload($s_photos, $folder, null);
                    $s_images[] = $response;
                }
            }
        }

        $s_images = implode(";", $s_images);
        if (is_array($s_hidden_image)) {
            $s_hidden_image = implode(";", $s_hidden_image);
        }
        if ($s_images) {
            $s_images .= ";";
        }
        $allslider = $s_images . $s_hidden_image;
        $allslider = rtrim($allslider, ";");

        // airline image
        $air_images = [];
        if ($request->has('airline_photo')) {
            if ($airline_photo) {
                foreach ($airline_photo as $air_photos) {
                    $folder = 'photo_gallery';
                    $response = cloudUpload($air_photos, $folder, null);
                    $air_images[] = $response;
                }
            }
        }

        $air_images = implode(";", $air_images);
        if (is_array($air_image_hidden_image)) {
            $air_image_hidden_image = implode(";", $air_image_hidden_image);
        }
        if ($air_images) {
            $air_images .= ";";
        }
        $all_air_image = $air_images . $air_image_hidden_image;
        $all_air_image = rtrim($all_air_image, ";");

        // banner image

        $b_images = [];
        if ($request->has('banner')) {
            if ($banner) {
                foreach ($banner as $b_photos) {
                    $folder = 'service';
                    $response = cloudUpload($b_photos, $folder, null);
                    $b_images[] = $response;
                }
            }
        }

        $b_images = implode(";", $b_images);
        if (is_array($b_hidden_image)) {
            $b_hidden_image = implode(";", $b_hidden_image);
        }
        if ($b_images) {
            $b_images .= ";";
        }
        $all_banner_image = $b_images . $b_hidden_image;
        $all_banner_image = rtrim($all_banner_image, ";");


        if ($request->has('logo')) {
            $folder = 'services';
            $response = cloudUpload($request->logo, $folder, $services->logo);
            $services->logo = $response;
        }
        if ($request->has('thumbnail')) {
            $folder = 'services';
            $response = cloudUpload($request->thumbnail, $folder, $services->thumbnail);
            $services->thumbnail = $response;
        }
        if ($request->has('s_banner')) {
            $folder = 'services';
            $response = cloudUpload($request->s_banner, $folder, null);
            $s_banner = $response;
        }
        if ($request->has('p_banner')) {
            $folder = 'services';
            $response = cloudUpload($request->p_banner, $folder, null);
            $p_banner = $response;
        }
        if ($request->has('photo')) {
            $folder = 'services';
            $response = cloudUpload($request->photo, $folder, $services->photo);
            $photo = $response;
        }

        if ($request->has('photo1')) {
            $folder = 'services';
            $response = cloudUpload($request->photo1, $folder, null);
            $photo1 = $response;
        }
        if ($request->has('photo2')) {
            $folder = 'services';
            $response = cloudUpload($request->photo2, $folder, $services->photo2);
            $services->photo2 = $response;
        }

        if ($request->has('m_photo')) {
            $folder = 'services';
            $response = cloudUpload($request->m_photo, $folder, $services->m_photo);
            $services->m_photo = $response;
        }
        // $airlineNames = explode(';', $request->airline_name);
        // $airlineSlugs = [];

        // foreach ($airlineNames as $airlineName) {
        //     $airlineSlugs[] = Str::slug($airlineName);
        // }



        $services->update([

            'logo' => $services->logo,
            'thumbnail' => $services->thumbnail,
            's_banner' => $s_banner,
            'p_banner' => $p_banner,
            'slider' => $allslider,
            'airline_photo' => $all_air_image,
            'airline_name' => $request->airline_name,

            // 'airline_slug' => $airlineSlugs,
            // 'airline_description' => $request->airline_description,
            'banner' => $all_banner_image,
            'photo' => $photo,
            'photo1' => $photo1,
            'photo2' => $services->photo2,
            'alt_text' => $request->alt_text,
            'title' => $request->title,
            'slug' => Str::slug($request->slug ? $request->slug : $request->title),
            'short_description' => $request->short_description,
            'order_level' => $request->order_level ?? 0,
            'title1' => $request->title1,
            'title2' => $request->title2,
            'title3' => $request->title3,
            'title4' => $request->title4,
            'title5' => $request->title5,
            'title6' => $request->title6,
            'content1' => $request->content1,
            'content2' => $request->content2,
            'content3' => $request->content3,
            'content4' => $request->content4,
            'content5' => $request->content5,
            'hajj_content' => $request->hajj_content,
            'section_tags' => $request->section_tags,
            'link_url' => $request->link_url,


            'm_photo' => $services->m_photo,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
            'reservation' => $reservationdata_json,
            'contact_info' => $contact_info_json,

        ]);
        Toastr::success('Services  Updated', 'success');
        return redirect(route('backend.services.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $services)
    {
        $services->status = 'draft';
        $services->save();
        $services->delete();
        Toastr::success('Services  Trashed', 'success');
        return back();
    }
    public function status(Services $services)
    {
        if ($services->status == 'publish') {
            $services->status = 'draft';
            $services->save();
        } else {
            $services->status = 'publish';
            $services->save();
        }
        Toastr::success($services->status == 'publish' ? 'Services Info Published' : 'Services Info Drafted', 'success');
        return back();
    }
    public function reStore($id)
    {
        $terms = Services::onlyTrashed()->find($id);
        $terms->restore();
        Toastr::success('Services Info Restored', 'Success');
        return back();
    }
    public function permDelete($id)
    {
        $terms = Services::onlyTrashed()->find($id);
        $terms->forceDelete();
        Toastr::success('Services Info Deleted', 'Success');
        return back();
    }
}
