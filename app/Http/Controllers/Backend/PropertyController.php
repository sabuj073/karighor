<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Features;
use App\Models\Location;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RequirementType;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use PHPUnit\Metadata\Version\Requirement;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $activeRequirement = Property::where('status', 'publish')->paginate(10);

        if (request()->ajax()) {
            $status = $request->input('status');
            $data = Property::query();
            if ($status === 'trash') {
                $data->onlyTrashed();
            } else {
                $data->where('status', $status);
            }
            return DataTables::of($data)
                ->addColumn('action', function ($data) use ($status) {
                    if ($status === 'publish') {
                        return '<a href="' . route('backend.property.edit', $data->id) . '"
                                    class="btn btn-sm btn-info">Edit</a>
                                <a href="' . route('backend.property.status', $data->id) . '"
                                    class="btn btn-sm btn-warning">Draft</a>
                                <a href="' . route('backend.property.trash', $data->id) . '"
                                    class="btn btn-sm btn-danger">Trash</a>';
                    } elseif ($status === 'draft') {
                        // Draft property, show Publish and Trash buttons
                        return '<a href="' . route('backend.property.status', $data->id) . '"
                                    class="btn ' . ($data->status == 'publish' ? 'btn-warning' : 'btn-success') . '">' . ($data->status == 'publish' ? 'Draft' : 'Publish') . '</a>
                                    <a href="' . route('backend.property.trash', $data->id) . '"
                                    class="btn btn-sm btn-danger">Trash</a>';
                    } else {

                        return '<a href="' . route('backend.property.reStore', $data->id) . '"
                            class="btn btn-sm btn-success">Restore</a>
                            <form action="' . route('backend.property.delete', $data->id) . '" method="POST" class="delete_form">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-sm btn-danger"  style="margin-top: 5px;" 
                                    onclick="return confirm(\'Are you Sure to Delete?\')">Delete</button>
                            </form>';
                    }
                })
                // ->orderBy('id', 'desc')
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('backend.property.index', compact('activeRequirement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $location = Location::get();
        $requirementType = RequirementType::get();
        $categoryType = Category::get();
        return view('backend.property.create', compact('requirementType', 'categoryType', 'location'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $feature_photo = $request->file('thumb_image');
        $thumb_image_front = $request->file('thumb_image_front');
        $banner_photo = $request->file('banner_image');
        $meta_photo = $request->file('meta_photo');
        $video_thumb = $request->file('video_thumb');
        $features_photo = $request->file('features_photo');
        // if ($photo) {
        //     $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
        //     Image::make($photo)->save(public_path('storage/blog/' . $photoName));
        // }
        $images = [];
        if ($photo) {

            foreach ($photo as $photos) {
                $folder = 'property';
                $response = cloudUpload($photos, $folder, null);
                $images[] = $response;
            }
        }
        $images = implode(";", $images);

        if ($meta_photo) {
            $folder = 'property';
            $response = cloudUpload($meta_photo, $folder, null);
            $meta_photo = $response;
        }
        if ($feature_photo) {
            $folder = 'property';
            $response = cloudUpload($feature_photo, $folder, null);
            $feature_photo = $response;
        }
        if ($thumb_image_front) {
            $folder = 'property';
            $response = cloudUpload($thumb_image_front, $folder, null);
            $thumb_image_front = $response;
        }
        if ($banner_photo) {
            $folder = 'property';
            $response = cloudUpload($banner_photo, $folder, null);
            $banner_photo = $response;
        }
        if ($video_thumb) {
            $folder = 'property';
            $response = cloudUpload($video_thumb, $folder, null);
            $video_thumb = $response;
        }


        $propertyData = Property::create([

            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'requirement_type_id' => $request->requirement_type_id,
            'gallery_image' => $images,
            'thumb_image' => $feature_photo,
            'thumb_image_front' => $thumb_image_front,
            'banner_image' => $banner_photo,
            'meta_photo' => $meta_photo,
            'alt_text' => $request->alt_text,
            'address' => $request->address,
            'location' => $request->location,
            'land_area' => $request->land_area,
            'property_orientation' => $request->property_orientation,
            'road_width' => $request->road_width,
            'design_consultant' => $request->design_consultant,
            'building_height' => $request->building_height,
            'no_of_unit' => $request->no_of_unit,
            'no_of_parking' => $request->no_of_parking,
            'launch_date' => $request->launch_date,
            'video' => $request->video,
            'video_thumb' => $video_thumb,

            'slug' => Str::slug($request->title),
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,

        ]);

        $feature_image = [];

        if ($features_photo) {

            $folder = 'property';
            foreach ($features_photo as $photo) {
                $response = cloudUpload($photo, $folder, null);
                $feature_image[] = $response;
            }
        }

        $feature_alt_text = $request->features_alt_text;
        $feature_title = $request->features_title;
        $feature_description = $request->features_description;
        for ($i = 0; $i < count($feature_image); $i++) {
            # code...

            Features::create([
                'property_id' => $propertyData->id,
                'photo' => $feature_image[$i],
                'alt_text' => $feature_alt_text[$i],
                'title' => $feature_title[$i],
                'description' => $feature_description[$i]
            ]);
        }


        return back()->with('success', 'Property Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
        $location = Location::get();
        $requirementType = RequirementType::get();
        $categoryType = Category::get();
        $features = Features::where('property_id', $property->id)->get();

        return view('backend.property.edit', compact('location', 'requirementType', 'categoryType', 'property', 'features'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property, Features $features)
    {
        //
        $photo = $request->file('photo');

        $hidden_image = $request->image;

        if ($request->has('thumb_image')) {
            $folder = 'property';
            $response = cloudUpload($request->thumb_image, $folder, $property->thumb_image);
            $property->thumb_image = $response;
        }
        if ($request->has('thumb_image_front')) {
            $folder = 'property';
            $response = cloudUpload($request->thumb_image_front, $folder, $property->thumb_image_front);
            $property->thumb_image_front = $response;
        }
        if ($request->has('banner_image')) {
            $folder = 'property';
            $response = cloudUpload($request->banner_image, $folder, $property->banner_image);
            $property->banner_image = $response;
        }
        if ($request->has('video_thumb')) {
            $folder = 'property';
            $response = cloudUpload($request->video_thumb, $folder, $property->video_thumb);
            $property->video_thumb = $response;
        }

        if ($request->has('meta_photo')) {
            $folder = 'property';
            $response = cloudUpload($request->meta_photo, $folder, $property->meta_photo);
            $property->meta_photo = $response;
        }


        $images = [];
        if ($request->has('photo')) {
            if ($photo) {
                foreach ($photo as $photos) {
                    $folder = 'property';
                    $response = cloudUpload($photos, $folder, null);
                    $images[] = $response;
                }
            }
        }


        $images = implode(";", $images);
        if (is_array($hidden_image)) {
            $hidden_image = implode(";", $hidden_image);
        }
        if ($images) {
            $images .= ";";
        }
        $allphoto = $images . $hidden_image;
        $allphoto = rtrim($allphoto, ";");


        $property->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'requirement_type_id' => $request->requirement_type_id,
            'gallery_image' => $allphoto,
            'banner_image' => $property->banner_image,
            'meta_photo' => $property->meta_photo,
            'thumb_image' => $property->thumb_image,
            'thumb_image_front' => $property->thumb_image_front,

            'alt_text' => $request->alt_text,

            'address' => $request->address,
            'location' => $request->location,
            'land_area' => $request->land_area,
            'property_orientation' => $request->property_orientation,
            'road_width' => $request->road_width,
            'design_consultant' => $request->design_consultant,
            'building_height' => $request->building_height,
            'no_of_unit' => $request->no_of_unit,
            'no_of_parking' => $request->no_of_parking,
            'launch_date' => $request->launch_date,
            'video' => $request->video,
            'video_thumb' => $property->video_thumb,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
            'slug' => Str::slug($request->title),
        ]);

        // update Feature
        $features_photo = $request->file('features_photo');
        $feature_id = $request->feature_id;
        $feature_alt_text = $request->features_alt_text;
        $feature_title = $request->features_title;
        $feature_description = $request->features_description;

        // Delete features that are not in the updated list
        if (isset($feature_id)) {
            $property->features()
                ->whereNotIn('id', $feature_id)
                ->delete();
        }


        // Iterate over the features
        if (is_array($feature_id)) {


            for ($i = 0; $i < count($feature_id); $i++) {
                $features = null;

                if (isset($feature_id[$i])) {
                    $features = Features::where("id", $feature_id[$i])->first();
                }

                if ($features) {
                    // Update the feature
                    $features->id = $feature_id[$i];
                    $features->property_id = $property->id;
                    $features->alt_text = $feature_alt_text[$i];
                    $features->title = $feature_title[$i];
                    $features->description = $feature_description[$i];

                    // Update the photo if a new one is provided
                    if ($features_photo && isset($features_photo[$i])) {
                        $folder = 'property';
                        $response = cloudUpload($features_photo[$i], $folder, $features->photo);
                        $features->photo = $response;
                    }

                    $features->save();
                } else {
                    // Create a new feature
                    $newFeature = Features::create([
                        'property_id' => $property->id,
                        'alt_text' => $feature_alt_text[$i],
                        'title' => $feature_title[$i],
                        'description' => $feature_description[$i]
                    ]);

                    // Upload the photo for the new feature if provided
                    if ($features_photo && isset($features_photo[$i])) {
                        $folder = 'property';
                        $response = cloudUpload($features_photo[$i], $folder, null);
                        $newFeature->photo = $response;
                        $newFeature->save();
                    }
                }
            }
        } else {
            Features::where('property_id', $property->id)->delete();
        }


        return redirect(route('backend.property.index'))->with('success', 'Property Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->status == 'draft';
        $property->save();
        $property->delete();
        return back()->with('success', 'property Trashed');
    }
    public function status(Property $property)
    {
        if ($property->status == 'publish') {
            $property->status = 'draft';
            $property->save();
        } else {
            $property->status = 'publish';
            $property->save();
        }
        return back()->with('success', $property->status == 'publish' ? 'property type Published' : 'property Drafted');
    }
    public function reStore($id)
    {
        $terms = Property::onlyTrashed()->find($id);
        $terms->restore();
        return back()->with('success', 'Property Info Restored');
    }
    public function permDelete($id)
    {
        $terms = Property::onlyTrashed()->find($id);
        $terms->forceDelete();
        return back()->with('success', 'Property deleted');
    }
}
