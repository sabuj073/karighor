@extends('layouts.backend.master')
@section('title', 'Create Services')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('admin') }}">Dashboard /</a></h5>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Service</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="{{ route('backend.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Create Services</h1>
                            </div>
                            <div class="card-body">


                                <div class="" id="">
                                    <div class="row mt-3">
                                        <div class="form-group col-lg-6">
                                            <label>Name:</label>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Enter Title" value="{{ old('title') }}">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Slug:</label>
                                            <input type="text" name="slug" class="form-control"
                                                placeholder="If You Don't Want to create keep it blank"
                                                value="{{ old('slug') }}">
                                        </div>
                                        
                                    </div>
                                    <div class="row mt-3">
                                        <div class=" form-group col-lg-4">
                                            <label>Logo/icon(svg):</label>
                                            <input type="file" name="logo" class=" form-control" id="photoInput"
                                                value="{{ old('logo') }}">

                                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                                style="display: none; max-width: 80px; max-height: 80px;">
                                        </div>
                                        <div class=" form-group col-lg-4">
                                            <label>Thumbnail(370x320):</label>
                                            <input type="file" name="thumbnail" class=" form-control" id="photoInput1"
                                                value="{{ old('thumbnail') }}">

                                            <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                                style="display: none; max-width: 80px; max-height: 80px;">
                                        </div>
                                       
                                        <div class="form-group col-lg-4">
                                            <label>Order Level:</label>
                                            <input type="number" name="order_level" class="form-control"
                                                placeholder="Enter Order Level" value="{{ old('order_level') }}">
                                            [Higher Number Get Priority]
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="">Contact Info:</label>
                                        <div class="contact_field row">
                                            <div class="form-group col-lg-5">
                                                <label for="">Office Name:</label>
                                                <input type="text" name="office_name[]" class="form-control"
                                                    placeholder="Enter Office Name" id="">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="">Phone:</label>
                                                <input type="number" name="office_phone[]" class="form-control"
                                                    placeholder="Enter Phone">
                                            </div>
                                            <div class="form-group col-lg-1">
                                                <img src="{{ asset('backend/images/icon/plus.png') }}" alt=""
                                                    onclick="addContactRow(this)" style="cursor: pointer;margin-top:28px">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="row mt-3">
                                        <div class="form-group col-lg-12">
                                            <label>Short Description:</label>
                                            <textarea name="short_description" id="editor" class="form-control " rows="7"
                                                placeholder="Enter Short Description">{{ old('short_description') }}</textarea>
                                        </div>
                                    </div> --}}
                                    <div class="row mt-3">
                                        <div class=" form-group col-lg-8">
                                            <label>Slider Photo(1728x485):</label>
                                            <input type="file" name="slider[]" class="form-control"
                                                value="{{ old('photo') }}" multiple>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Alter Text:</label>
                                            <input type="text" name="alt_text" class="form-control"
                                                placeholder="Enter Alter Text" value="{{ old('alt_text') }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Section1 Title:</label>
                                            <input type="text" name="title1" class="form-control"
                                                placeholder="Enter Title1" id="" value="{{ old('title1') }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Section1 Content:</label>
                                            <textarea name="content1" class="form-control" placeholder="Enter Content1" rows="5">{{ old('content1') }}</textarea>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="">Section1 Photo(607x419):</label>
                                            <input type="file" name="photo" class="form-control" id="photoInput1">
                                            <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                                style="display: none; max-width: 80px; max-height: 80px;">
                                        </div>
                                    </div>
                                    {{-- <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Airline Photo(320x320):</label>
                                            <input type="file" name="airline_photo[]" class="form-control" id=""
                                                multiple>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group mt-3">
                                            <label for="">Airline:[Separated by Semicolon(;)]</label>
                                            <input type="text" name="airline_name" class="form-control" id=""
                                                value="{{ old('airline_name') }}">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="">Airline/Country Slug</label>
                                            <input type="text" name="airline_slug" placeholder="If not need ignore it!"
                                                class="form-control" id="" value="{{ old('airline_slug') }}">
                                        </div>
                                     
                                    </div> --}}
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Single Banner(1700x300):</label>
                                            <input type="file" name="s_banner" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Promo Banner(714x272):</label>
                                            <input type="file" name="p_banner" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Link Url:</label>
                                            <input type="text" name="link_url" class="form-control" id="" placeholder="Enter Link Url" value="{{ old('link_url') }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Multiple Banner(470x270):</label>
                                            <input type="file" name="banner[]" class="form-control" id=""
                                                multiple>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Section2 Title:</label>
                                            <input type="text" name="title2" class="form-control"
                                                placeholder="Enter Title2" id="" value="{{ old('title2') }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Section2 Content:</label>
                                            <textarea name="content2" class="form-control" placeholder="Enter Content2" rows="5">{{ old('content2') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Section2 Photo(453x436):</label>
                                            <input type="file" name="photo1" class="form-control" id="photoInput1">
                                            <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                                style="display: none; max-width: 80px; max-height: 80px;">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Section3 Title:</label>
                                            <input type="text" name="title3" class="form-control"
                                                placeholder="Enter Title3" id="" value="{{ old('title3') }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Section3 Content:</label>
                                            <textarea name="content5" id="editor3" class="form-control" placeholder="Enter Content" rows="5">{{ old('content5') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Section3 Photo(535x422):</label>
                                            <input type="file" name="photo2" class="form-control" id="photoInput2">
                                            <img id="previewImage2" class="mt-3" src="#" alt="Preview"
                                                style="display: none; max-width: 80px; max-height: 80px;">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="">Reservation:</label>
                                        <div class="multiple_field row">
                                            {{-- <div class="form-group col-lg-4">
                                                <label for="">Photo:</label>
                                                <input type="file" name="r_photo[]" class="form-control"
                                                    placeholder="Enter json content" id="">
                                            </div> --}}
                                            <div class="form-group col-lg-5">
                                                <label for="">Name:</label>
                                                <input type="text" name="r_name[]" class="form-control"
                                                    placeholder="Enter Name" id="">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="">Short Description:</label>
                                                <textarea name="r_description[]" class="form-control" id="" rows="5"></textarea>
                                            </div>
                                            <div class="form-group col-lg-1">
                                                <img src="{{ asset('backend/images/icon/plus.png') }}" alt=""
                                                    onclick="addNewRow(this)" style="cursor: pointer">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Section4 Title:</label>
                                            <input type="text" name="title4" class="form-control"
                                                placeholder="Enter Title4" id="" value="{{ old('title4') }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Section4 Content:</label>
                                            <textarea name="content3" class="form-control" placeholder="Enter Content3" rows="5">{{ old('content3') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Section4 Tags:[';', Semicolon Separator]</label>
                                            <textarea name="tags" class="form-control" placeholder="Enter tags" rows="5">{{ old('tags') }}</textarea>
                                            {{-- <input name='tags' value='{{ old('tags') }}' class="form-control" autofocus> --}}
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Section5 Title</label>
                                            <input type="text" name="title5" class="form-control"
                                                placeholder="Enter Title5" id="" value="{{ old('title5') }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Section5 Content:</label>
                                            <textarea name="content4" class="form-control" placeholder="Enter Content4" rows="5">{{ old('content4') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">About Hajj Title</label>
                                            <input type="text" name="title6" class="form-control"
                                                placeholder="Enter About Hajj Title" id=""
                                                value="{{ old('title6') }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">About Hajj Content:</label>
                                            <textarea name="hajj_content" id="hajj_content" class="form-control" placeholder="Enter Content">{{ old('hajj_content') }}</textarea>
                                        </div>
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
                                            placeholder="Enter Meta Title" value="{{ old('m_title') }}">

                                    </div>
                                    <div class=" form-group mt-3">
                                        <label>Meta Photo:</label>
                                        <input type="file" name="m_photo" class="form-control" id="photoInput">
                                        (16x9 ratio recomended)


                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Meta Keyword:</label>
                                        <input type="text" name="m_keyword" class="form-control"
                                            placeholder="Enter Meta Keyword" value="{{ old('m_keyword') }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Meta Description:</label>
                                        <textarea name="m_description" class="form-control" placeholder="Enter Meta Description" rows="5">{{ old('m_description') }}</textarea>
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
    </script>
    <script>
        CKEDITOR.replace('editor2');
    </script>
    <script>
        CKEDITOR.replace('editor3');
    </script>
    <script>
        CKEDITOR.replace('editor4');
    </script>
    <script>
        CKEDITOR.replace('hajj_content');
    </script>

@endsection
@push('script')
    <script>
        function addNewRow() {
            // Create a new row element
            var newRow = document.createElement('div');
            newRow.className = 'col-md-12';
            // Set the inner HTML of the new row
            newRow.innerHTML = `<div class="multiple_field row">
                                        
                                        <div class="form-group col-lg-5">
                                                <label for="">Name:</label>
                                                <input type="text" name="r_name[]" class="form-control"
                                                    placeholder="Enter Name" id="">
                                            </div>
                                        <div class="form-group col-lg-6">
                                            <label for="">Short Description:</label>
                                            <textarea name="r_description[]" class="form-control" id="" rows="5"></textarea>
                                        </div>
                                        <div class="form-group col-lg-1">
                                            <img style="cursor:pointer;margin-top:28px" src="/backend/images/icon/close.png" alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                        </div>
                                    </div>`;
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
                                                <input type="text" name="office_name[]" class="form-control"
                                                    placeholder="Enter Office Name" id="">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="">Phone:</label>
                                                <input type="number" name="office_phone[]" class="form-control"
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

        function removeRow(image) {
            // Get the parent row element and remove it
            var row = image.closest('.col-md-12');
            row.parentNode.removeChild(row);
        }
    </script>
    <script>
        // Get the select element by its id
        var selectElement = document.getElementById("serviceTypeSelect");
        var standardSection = document.getElementById("standard_section");
        var packageSection = document.getElementById("package_section");

        // Add an event listener to detect changes in the selected value
        selectElement.addEventListener("change", function() {
            // Get the selected value
            var selectedValue = selectElement.value;

            // Hide both sections initially
            standardSection.classList.add("d-none");
            packageSection.classList.add("d-none");

            // Show the selected section based on the value
            if (selectedValue === 'standard') {
                standardSection.classList.remove("d-none");
            } else if (selectedValue === 'packages') {
                packageSection.classList.remove("d-none");
            }
        });
    </script>
    <script>
        // The DOM element you wish to replace with Tagify
        var input = document.querySelector('input[name=tags]');

        // initialize Tagify on the above input node reference
        new Tagify(input)
    </script>
@endpush
