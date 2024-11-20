@extends('layouts.backend.master')
@section('title', 'Edit Property')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Property</li>
                    </ol>
                </nav>
                <h1 class="m-0">Edit Property</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit Property Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.property.update', $property->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class=" form-group">
                                    <label>Title:</label>
                                    <input type="text" name="title" class=" form-control"
                                        value="{{ $property->title }}">
                                </div>
                                <div class="row mt-3">


                                    <div class=" form-group col-lg-4">
                                        <label>Banner Photo(1170x785):</label>
                                        <input type="file" name="banner_image" class=" form-control" id="photoInput">
                                        <img class="mt-3" src="{{ $property->banner_image }}"
                                            style="max-width: 80px; max-height: 80px;">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Thumb Photo(494x656):</label>
                                        <input type="file" name="thumb_image_front" class=" form-control"
                                            id="photoInput">
                                        <img class="mt-3" src="{{ $property->thumb_image_front }}"
                                            style="max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Feature Photo(1170x785):</label>
                                        <input type="file" name="thumb_image" class=" form-control" id="photoInput">
                                        <img class="mt-3" src="{{ $property->thumb_image }}"
                                            style="max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Alter Text:</label>
                                        <input type="text" value="{{ $property->alt_text }}" name="alt_text"
                                            class="form-control" placeholder="Enter Alter Text">
                                    </div>


                                </div>
                                <div class="row mt-3">


                                    <div class=" form-group col-lg-12">
                                        <label>Description:</label>
                                        <textarea name="description" id="editor" cols="30" rows="10">{{ $property->description }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">

                                    <div class=" form-group col-lg-4">
                                        <label>Address:</label>
                                        <input type="text" name="address" value="{{ $property->address }}"
                                            class=" form-control" id="bedroom" placeholder="bedroom">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Location:</label>

                                        <select id="" name="location" class="mt-1 form-control property_id ">
                                            <option value="0">--Select Location-- </option>
                                            @foreach ($location as $locations)
                                                <option @if ($property->location == $locations->id) selected @endif
                                                    value="{{ $locations->id }}">{{ $locations->name }}
                                                </option>
                                            @endforeach
                                        </select>



                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Land area:</label>
                                        <input value="{{ $property->land_area }}" type="text" name="land_area"
                                            class="form-control" placeholder="land_area">
                                    </div>


                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Property Orientation:</label>
                                        <input type="text" value="{{ $property->property_orientation }}"
                                            name="property_orientation" class="form-control"
                                            placeholder="property_orientation">
                                    </div>

                                    <div class=" form-group col-lg-4">
                                        <label>Property Type:</label>

                                        <select id="requirement_type3" name="requirement_type_id"
                                            class="mt-1 form-control property_id ">
                                            <option value="0">--Select Property-- </option>
                                            @foreach ($requirementType as $requirementTypes)
                                                <option @if ($property->requirement_type_id == $requirementTypes->id) selected @endif
                                                    value="{{ $requirementTypes->id }}">{{ $requirementTypes->name }}
                                                </option>
                                            @endforeach
                                        </select>



                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Category Type:</label>

                                        <select id="" name="category_id" class="mt-1 form-control property_id ">
                                            <option value="0">--Select Category-- </option>
                                            @foreach ($categoryType as $categories)
                                                <option @if ($property->category_id == $categories->id) selected @endif
                                                    value="{{ $categories->id }}">{{ $categories->category }}
                                                </option>
                                            @endforeach
                                        </select>



                                    </div>


                                    {{-- <div class="form-group col-lg-4">
                                        <label>Area:</label>
                                        <select name="sub_area_id" id="areaSelect" class="form-control">
                                            <option selected disabled>Select Area</option>
                                            @foreach ($subarea as $areas)
                                                <option value="{{ $areas->id }}">{{ $areas->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                </div>
                                <div class="row">



                                    <div class=" form-group col-lg-6">
                                        <label>Road Width:</label>
                                        <input type="text" name="road_width" value="{{ $property->road_width }}"
                                            class=" form-control" id="road_width" placeholder="road_width">

                                    </div>
                                    <div class=" form-group col-lg-6">
                                        <label>Design Consultant:</label>
                                        <input type="text" name="design_consultant"
                                            value="{{ $property->design_consultant }}" class="form-control"
                                            placeholder="design_consultant">
                                    </div>


                                </div>
                                <div class="row mt-3">

                                    <div class=" form-group col-lg-4">
                                        <label>Building Height:</label>
                                        <input type="text" name="building_height"
                                            value="{{ $property->building_height }}" class=" form-control"
                                            id="building_height" placeholder="building_height">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>No of Unit:</label>
                                        <input type="text" name="no_of_unit" value="{{ $property->no_of_unit }}"
                                            class=" form-control" id="no_of_unit" placeholder="no_of_unit">

                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>No of Parking:</label>
                                        <input type="text" value="{{ $property->no_of_parking }}"
                                            name="no_of_parking" class="form-control" placeholder="no_of_parking">
                                    </div>


                                </div>
                                <div class="row mt-3">

                                    <div class=" form-group col-lg-4">
                                        <label>Launch Date:</label>
                                        <input type="text" name="launch_date" value="launch_date"
                                            class=" form-control" id="launch_date" placeholder="launch_date">

                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label>Video:</label>
                                        <input type="text" name="video" class="form-control"
                                            placeholder="Enter Video URL" value="{{ $property->video }}">
                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Video Thumbnail(1170x785):</label>
                                        <input type="file" name="video_thumb" class=" form-control" id="photoInput">
                                        <img class="mt-3" src="{{ $property->video_thumb }}"
                                            style="max-width: 80px; max-height: 80px;">
                                    </div>

                                </div>


                                <div class="row mt-3">


                                    <div class=" form-group col-lg-6">
                                        <label>Gallery Photo(494x656):</label>
                                        <input type="file" name="photo[]" class=" form-control" id="photoInput"
                                            multiple>
                                        @if ($property->gallery_image)
                                            @php
                                                $photoArray = explode(';', $property->gallery_image);

                                            @endphp
                                            <div style="display: flex;padding-top:5px">
                                                @foreach ($photoArray as $photoArrays)
                                                    <div class="carousel-cell property-image"> <img
                                                            src="{{ $photoArrays }}" width="60" alt="">
                                                        <input type="hidden" name="image[]"
                                                            value="{{ $photoArrays }}">
                                                        <img src="{{ asset('frontend/image/close icon/cross.png') }}"
                                                            width="30px" style="padding-right: 5px; cursor: pointer"
                                                            alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        {{-- <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;"> --}}
                                    </div>


                                </div>

                                {{-- feature --}}

                                @foreach ($features as $feature)
                                    <div class="row mt-3 ">
                                        <input type="hidden" name="feature_id[]" value="{{ $feature->id }}">
                                        <div class="form-group col-lg-2">
                                            <label>Features Photo:</label>
                                            <input type="file" name="features_photo[]" class="form-control"
                                                id="photoInput">
                                            <img class="mt-3" src="{{ $feature->photo }}"
                                                style="max-width: 80px; max-height: 80px;">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Features Alter text:</label>
                                            <input type="text" name="features_alt_text[]" class="form-control"
                                                value="{{ $feature->alt_text }}">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Features Title:</label>
                                            <input type="text" name="features_title[]" class="form-control"
                                                value="{{ $feature->title }}">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Features Description:</label>
                                            <textarea name="features_description[]" class="form-control" rows="1">{{ $feature->description }}</textarea>
                                        </div>
                                        <div class="col-md-1">
                                            <img style="margin-top: 28px" onclick="removeNewRow(this)"
                                                src="{{ asset('backend/images/icon/close.png') }}" alt=""
                                                style="cursor: pointer">
                                        </div>
                                    </div>
                                    <hr> <!-- Add a horizontal line to separate each feature -->
                                @endforeach
                                <span class="multiple_field"></span>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-success" onclick="addNewRow()">Add
                                            Feature</button>
                                    </div>
                                </div>

                                {{-- Meta Info --}}
                                <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <label>Meta Title:</label>
                                        <input type="text" name="m_title" class="form-control mt-2"
                                            placeholder="Enter Meta Title" value="{{ $property->m_title }}">

                                    </div>
                                    <div class=" form-group col-lg-3">
                                        <label>Meta Photo:</label>
                                        <input type="file" name="meta_photo" class="form-control mt-2"
                                            id="photoInput">
                                        (16x9 ratio recomended)
                                        <img class="mt-3" src="{{ $property->meta_photo }}"
                                            style="max-width: 80px; max-height: 80px;">

                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Meta Keyword:</label>
                                        <input type="text" name="m_keyword" class="form-control mt-2"
                                            placeholder="Enter Meta Keyword" value="{{ $property->m_keyword }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Meta Description:</label>
                                        <textarea name="m_description" class="form-control mt-2" placeholder="Enter Meta Description" rows="1">{{ $property->m_description }}</textarea>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>

    <script>
        function addNewRow() {
            // Create a new row element
            var newRow = document.createElement('div');
            newRow.className = 'col-md-12';
            // Set the inner HTML of the new row
            newRow.innerHTML = `
    <div style="padding-top:10px" class="row">
        <input type="hidden" name="feature_id[]" value="0">
        <div class="form-group col-md-2">

            <label>Features Photo:</label>
            <div class="input-group">
                <input type="file" name="features_photo[]" class=" form-control"
                                        id="photoInput">


            </div>
            </div>
            
            
            



            <div class=" form-group col-md-3">
                <label>Features alter text:</label>
                 <input type="text" name="features_alt_text[]" class="form-control mt-2"
                placeholder="" value="">
            </div>
            <div class=" form-group col-md-3">
                <label>Features Title:</label>
                 <input type="text" name="features_title[]" class="form-control mt-2"
                placeholder="Features title" value="">
            </div>
            <div class="form-group col-lg-3">
                    <label>Features Description:</label>
                     <textarea name="features_description[]" class="form-control mt-2" placeholder="Features Description" rows="1"></textarea>
                    </div>
            <div class="col-md-1">
              <img style="cursor:pointer;margin-top:28px" src="/backend/images/icon/close.png" alt="Remove" class="remove-btn" onclick="removeRowfeature(this)">
           </div>
        </div>
    `;
            // Append the new row to the "multiple_field" class element
            var multipleField = document.querySelector('.multiple_field');
            multipleField.appendChild(newRow);
        }

        function removeRowfeature(image) {
            // Get the parent row element and remove it
            var row = image.closest('.col-md-12');
            row.parentNode.removeChild(row);
            updateTotalAmount();
        }
    </script>
    <script>
        function removeRow(image) {
            var row = image.closest('.property-image');
            row.parentNode.removeChild(row);
            updateTotalAmount();
        }
    </script>
    {{-- Remove Feature row --}}

    <script>
        function removeNewRow(image) {
            var row = image.closest('.row');
            row.parentNode.removeChild(row);
            updateTotalAmount();
        }
    </script>


@endsection
