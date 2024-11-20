@extends('layouts.backend.master')
@section('title', 'Edit Services')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('admin') }}">Dashboard /</a></h5>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <h6><a href="{{ route('backend.services.index') }}">All Service</a></h6>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="{{ route('backend.services.update', $services->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Edit Services</h1>
                            </div>
                            <div class="card-body">


                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title"
                                            value="{{ $services->title }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Slug:</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Enter Slug"
                                            value="{{ $services->slug }}">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Logo/icon(svg):</label>
                                        <input type="file" name="logo" class=" form-control" id="photoInput">
                                        <img src="{{ $services->logo }}" class="mt-2" width="80" alt="">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Thumbnail(370x320):</label>
                                        <input type="file" name="thumbnail" class=" form-control" id="photoInput1"
                                            value="{{ $services->thumbnail }}">

                                        <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Order Level:</label>
                                        <input type="number" name="order_level" class="form-control"
                                            placeholder="Enter Order Level" value="{{ $services->order_level }}">
                                        [Higher Number Get Priority]
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Contact Info:</label>
                                    </div>
                                </div>
                                @php
                                    $contact_info_json = json_decode($services->contact_info);
                                @endphp
                                @if ($contact_info_json)
                                    @foreach ($contact_info_json as $contact_info)
                                        <div class="row mt-3">
                                            <div class="row">
                                                <div class="form-group col-lg-5">
                                                    <label for="">Office Name:</label>
                                                    <input type="text" name="office_name[]" class="form-control"
                                                        placeholder="Enter Office Name" id=""
                                                        value="{{ $contact_info->name }}">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="">Phone:</label>
                                                    <input type="number" name="office_phone[]" class="form-control"
                                                        placeholder="Enter Phone" value="{{ $contact_info->phone }}">
                                                </div>
                                                <div class="col-md-1">
                                                    <img style="margin-top: 28px" onclick="removeNewRow(this)"
                                                        src="{{ asset('backend/images/icon/close.png') }}" alt=""
                                                        style="cursor: pointer">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <span class="contact_field"></span>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-success" onclick="addContactRow()">Add
                                            More</button>
                                    </div>
                                </div>
                                {{-- <div class="row mt-3">
                                    <div class="form-group col-lg-12">
                                        <label>Short Description:</label>
                                        <textarea name="short_description" id="editor" class="form-control " rows="7"
                                            placeholder="Enter Short Description">{{ $services->short_description }}</textarea>
                                    </div>
                                </div> --}}
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-8">
                                        <label>Slider Photo(1728x485):</label>
                                        <input type="file" name="slider[]" class="form-control"
                                            value="{{ old('photo') }}" multiple>

                                        @if ($services->slider)
                                            @php
                                                $photoArray = explode(';', $services->slider);

                                            @endphp

                                            <div class="mt-2" style="display: flex;padding-top:5px">
                                                @foreach ($photoArray as $photoArrays)
                                                    <div class="carousel-cell property-image">
                                                        <img src="{{ $photoArrays }}" width="60" alt="">
                                                        <input type="hidden" name="s_image[]" class="form-control"
                                                            value="{{ $photoArrays }}">
                                                        <img src="{{ asset('backend/images/icon/close.png') }}"
                                                            width="30px"
                                                            style="padding-right: 5px; cursor: pointer;margin-top:-15px"
                                                            alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ $services->alt_text }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Section1 Title</label>
                                        <input type="text" name="title1" class="form-control"
                                            placeholder="Enter Title1" id="" value="{{ $services->title1 }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Section1 Content:</label>
                                        <textarea name="content1" id="editor1" class="form-control" placeholder="Enter Title1" rows="5">{{ $services->content1 }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Section1 Photo(283x360):</label>
                                        <input type="file" name="photo" class="form-control" id="photoInput1">
                                        @if ($services->photo)
                                            <div class="property-image">
                                                <input type="hidden" name="hidden_photo" id=""
                                                    value="{{ $services->photo }}">
                                                <div class="d-flex">
                                                    <img src="{{ $services->photo }}" class="mt-2" width="80"
                                                        alt="">
                                                    <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                                        style="display: none; max-width: 80px; max-height: 80px;">
                                                    <img src="{{ asset('backend/images/icon/close.png') }}"
                                                        width="30px" height="30px"
                                                        style="padding-right: 5px; cursor: pointer;margin-top:2px"
                                                        alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Airline Photo(320x320):</label>
                                        <input type="file" name="airline_photo[]" class="form-control" id=""
                                            multiple>
                                        @if ($services->airline_photo)
                                            @php
                                                $airline_photo = explode(';', $services->airline_photo);

                                            @endphp

                                            <div class="mt-2" style="display: flex;padding-top:5px">
                                                @foreach ($airline_photo as $a_photo)
                                                    <div class="carousel-cell property-image"> <img
                                                            src="{{ $a_photo }}" width="60" alt="">
                                                        <input type="hidden" name="air_image[]" class="form-control"
                                                            value="{{ $a_photo }}">
                                                        <img src="{{ asset('backend/images/icon/close.png') }}"
                                                            width="30px"
                                                            style="padding-right: 5px; cursor: pointer;margin-top:-15px"
                                                            alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Airline Name: [Separated by Semicolon(;)]</label>
                                        <input type="text" name="airline_name" class="form-control" id=""
                                            value="{{ $services->airline_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Airline Slug</label>
                                        <input type="text" name="airline_slug" class="form-control" id=""
                                            value="{{ $services->airline_slug }}">
                                    </div>


                                </div> --}}
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Single Banner(1700x300):</label>
                                        
                                        <input type="file" name="s_banner" class="form-control" id="photoInput4">
                                        @if ($services->s_banner)
                                            <div class="property-image">
                                                <input type="hidden" name="hidden_s_banner" id=""
                                            value="{{ $services->s_banner }}">
                                                <img src="{{ $services->s_banner }}" class="mt-2" width="80"
                                                    alt="">
                                                <img id="previewImage4" class="mt-3" src="#" alt="Preview"
                                                    style="display: none; max-width: 80px; max-height: 80px;">
                                                <img src="{{ asset('backend/images/icon/close.png') }}" width="30px"
                                                    height="30px"
                                                    style="padding-right: 5px; cursor: pointer;margin-top:2px"
                                                    alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Promo Banner(714x272):</label>
                                        
                                        <input type="file" name="p_banner" class="form-control" id="photoInput4">
                                        @if ($services->p_banner)
                                            <div class="property-image">
                                                <input type="hidden" name="hidden_p_banner" id=""
                                            value="{{ $services->p_banner }}">
                                                <img src="{{ $services->p_banner }}" class="mt-2" width="80"
                                                    alt="">
                                                <img id="previewImage4" class="mt-3" src="#" alt="Preview"
                                                    style="display: none; max-width: 80px; max-height: 80px;">
                                                <img src="{{ asset('backend/images/icon/close.png') }}" width="30px"
                                                    height="30px"
                                                    style="padding-right: 5px; cursor: pointer;margin-top:2px"
                                                    alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Link Url:</label>
                                        <input type="text" name="link_url" class="form-control" placeholder="Enter Link Url" id="" value="{{ $services->link_url }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Multiple Banner(470x270):</label>
                                        <input type="file" name="banner[]" class="form-control" id=""
                                            multiple>

                                        @if ($services->banner)
                                            @php
                                                $banners = explode(';', $services->banner);

                                            @endphp

                                            <div class="mt-2" style="display: flex;padding-top:5px">
                                                @foreach ($banners as $banner)
                                                    <div class="carousel-cell property-image">
                                                        <img src="{{ $banner }}" width="60" alt="">
                                                        <input type="hidden" name="b_image[]" class="form-control"
                                                            value="{{ $banner }}">
                                                        <img src="{{ asset('backend/images/icon/close.png') }}"
                                                            width="30px"
                                                            style="padding-right: 5px; cursor: pointer;margin-top:-15px"
                                                            alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Section2 Title</label>
                                        <input type="text" name="title2" class="form-control"
                                            placeholder="Enter Title2" id="" value="{{ $services->title2 }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Section2 Content:</label>
                                        <textarea name="content2" id="editor2" class="form-control" placeholder="Enter Content2" rows="5">{{ $services->content2 }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Section2 Photo(453x436):</label>
                                        <input type="file" name="photo1" class="form-control" id="photoInput1">
                                        @if ($services->photo1)
                                            <div class="property-image">
                                                <input type="hidden" name="hidden_photo1" id=""
                                                    value="{{ $services->photo1 }}">
                                                <div class="d-flex">
                                                    <img src="{{ $services->photo1 }}" class="mt-2" width="80"
                                                        alt="">
                                                    <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                                        style="display: none; max-width: 80px; max-height: 80px;">
                                                    <img src="{{ asset('backend/images/icon/close.png') }}"
                                                        width="30px" height="30px"
                                                        style="padding-right: 5px; cursor: pointer;margin-top:2px"
                                                        alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Section3 Title:</label>
                                        <input type="text" name="title3" class="form-control"
                                            placeholder="Enter Title3" id="" value="{{ $services->title3 }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Section3 Content:</label>
                                        <textarea name="content5" id="editor3" class="form-control" placeholder="Enter Content" rows="5">{{ $services->content5 }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Section3 Photo(535x422):</label>
                                        <input type="file" name="photo2" class="form-control" id="photoInput2">
                                        <img src="{{ $services->photo2 }}" class="mt-2" width="80"
                                            alt="">
                                        <img id="previewImage2" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                </div>
                                {{-- Reservation --}}
                                {{-- feature --}}


                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Reservation:</label>
                                    </div>
                                </div>
                                @php
                                    $servicesDataItem = json_decode($services->reservation);
                                @endphp
                                @if ($servicesDataItem)
                                    {{-- @foreach ($servicesDataItem as $servicesData)
                                        @foreach ($servicesData['photo'] as $index => $photo)
                                            <div class="row mt-3">
                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label for="">Photo:</label>
                                                        <input type="hidden" name="hidden_r_photo[]"
                                                            value="{{ $photo }}">
                                                        <input type="file" name="r_photo[]" value="0"
                                                            class="form-control" id="photoInput2">
                                                        <img src="{{ $photo }}" class="mt-2" width="80"
                                                            alt="">
                                                        <img id="previewImage2" class="mt-3" src="#"
                                                            alt="Preview"
                                                            style="display: none; max-width: 80px; max-height: 80px;">
                                                    </div>
                                                    <div class="form-group col-lg-7">
                                                        <label for="">Description:</label>

                                                        <textarea name="r_description[]" class="form-control" rows="5">{{ @$servicesData['description'][$index] }}</textarea>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <img style="margin-top: 28px" onclick="removeNewRow(this)"
                                                            src="{{ asset('backend/images/icon/close.png') }}"
                                                            alt="" style="cursor: pointer">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif --}}
                                    @foreach ($servicesDataItem as $servicesData)
                                        <div class="row mt-3">
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <label for="">Name:</label>
                                                    <input type="text" class="form-control" name="r_name[]"
                                                        value="{{ $servicesData->name }}">
                                                </div>
                                                <div class="form-group col-lg-7">
                                                    <label for="">Description:</label>

                                                    <textarea name="r_description[]" class="form-control" rows="5">{{ @$servicesData->description }}</textarea>
                                                </div>
                                                <div class="col-md-1">
                                                    <img style="margin-top: 28px" onclick="removeNewRow(this)"
                                                        src="{{ asset('backend/images/icon/close.png') }}" alt=""
                                                        style="cursor: pointer">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <span class="multiple_field"></span>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-success" onclick="addNewRow()">Add
                                            Reservation</button>
                                    </div>
                                </div>

                                {{-- Reservation --}}
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Section4 Title:</label>
                                        <input type="text" name="title4" class="form-control"
                                            placeholder="Enter Title4" id="" value="{{ $services->title4 }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Section4 Content:</label>
                                        <textarea name="content3" id="editor4" class="form-control" placeholder="Enter Content3" rows="5">{{ $services->content3 }}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-3">

                                    <div class="form-group">
                                        <label for="">Section4 Tags:[';', Semicolon Separator]</label>
                                        <textarea name="section_tags" id="" class="form-control" cols="30" rows="5">
                                            {{ strip_tags($services->section_tags) }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Section5 Title:</label>
                                        <input type="text" name="title5" class="form-control"
                                            placeholder="Enter Title5" id="" value="{{ $services->title5 }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Section5 Content:</label>
                                        <textarea name="content4" id="editor5" class="form-control" placeholder="Enter Content4" rows="5">{{ $services->content4 }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">About Hajj Title</label>
                                        <input type="text" name="title6" class="form-control"
                                            placeholder="Enter About Hajj Title" id=""
                                            value="{{ $services->title6 }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">About Hajj Content:</label>
                                        <textarea name="hajj_content" id="hajj_content" class="form-control" placeholder="Enter Content">{{ $services->hajj_content }}</textarea>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Add Meta Info</h1>
                            </div>
                            <div class="card-body">
                                {{-- meta info --}}
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label>Meta Title:</label>
                                        <input type="text" name="m_title" class="form-control"
                                            placeholder="Enter Meta Title" value="{{ $services->m_title }}">

                                    </div>
                                    <div class=" form-group mt-3">
                                        <label>Meta Photo(16x9 ratio recomended):</label>
                                        <input type="file" name="m_photo" class="form-control" id="photoInput">
                                        <img src="{{ $services->m_photo }}" class="mt-3" width="80"
                                            alt="">



                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Meta Keyword:</label>
                                        <input type="text" name="m_keyword" class="form-control"
                                            placeholder="Enter Meta Keyword" value="{{ $services->m_keyword }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Meta Description:</label>
                                        <textarea name="m_description" class="form-control" placeholder="Enter Meta Description" rows="5">{{ $services->m_description }}</textarea>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script>
        CKEDITOR.replace('editor');
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('editor3');
        CKEDITOR.replace('editor4');
        CKEDITOR.replace('editor5');
        CKEDITOR.replace('hajj_content');
    </script>

    <script>
        function addNewRow() {
            // Create a new row element
            var newRow = document.createElement('div');
            newRow.className = 'col-md-12';
            // Set the inner HTML of the new row
            newRow.innerHTML = `
<div style="padding-top:10px" class="row">
        <div class="form-group col-lg-5">
                                            <label for="">Name:</label>
                                            <input type="text" name="r_name_new[]" class="form-control"
                                                placeholder="Enter json content" id="">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="">Description:</label>
                                            <textarea name="r_description_new[]" class="form-control" id="" rows="5"></textarea>
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

        function addContactRow() {
            // Create a new row element
            var newRow = document.createElement('div');
            newRow.className = 'col-md-12';
            // Set the inner HTML of the new row
            newRow.innerHTML = `<div class="contact_field row">
                                        
                <div class="form-group col-lg-5">
                                                <label for="">Office Name:</label>
                                                <input type="text" name="office_name_new[]" class="form-control"
                                                    placeholder="Enter Office Name" id="">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="">Phone:</label>
                                                <input type="number" name="office_phone_new[]" class="form-control"
                                                placeholder="Enter Phone">
                                            </div>
                                            <div class="form-group col-lg-1">
                                            <img style="cursor:pointer;margin-top:28px" src="/backend/images/icon/close.png" alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                        </div>
                                    </div>`;
            // Append the new row to the "multiple_field" class element
            var multipleField = document.querySelector('.contact_field');
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
    <script>
        // The DOM element you wish to replace with Tagify
        var input = document.querySelector('input[name=tags]');

        // initialize Tagify on the above input node reference
        new Tagify(input)
    </script>


@endsection
