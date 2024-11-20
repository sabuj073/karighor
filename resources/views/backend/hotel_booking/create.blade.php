@extends('layouts.backend.master')
@section('title', 'Create Hotel Booking')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('admin') }}">Dashboard/</a></h5>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Hotel Booking Info</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="{{ route('backend.hotelBooking.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Create Hotel Booking Info</h1>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-lg-8">
                                        <label>Title:</label>
                                        <input type="text" name="title" class=" form-control" placeholder="Enter Title"
                                            value="{{ old('title') }}">
                                    </div>
                                    {{-- 
                                <div class="mt-3 form-group">
                                    <label>Slug:</label>
                                    <input type="text" name="slug" class=" form-control" placeholder="Enter Slug"
                                        value="{{ old('slug') }}">
                                </div> --}}

                                    <div class="col-md-4">
                                        <label for="">Select Service*</label>
                                        <select class="form-control" name="service_id" id="serviceTypeSelect" required>
                                            <option value="" selected disabled>Select Service</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <label for="">Select Type*</label>
                                        <select class="form-control" name="type" id="serviceTypeSelect" required>
                                            <option value="" selected disabled>Select type</option>
                                            <option value="domestic">Domestic</option>
                                            <option value="international">International</option>
                                        </select>
                                    </div> --}}
                                </div>
                                <div class="row mt-3">
                                    {{-- <div class="form-group col-lg-6">
                                        <label>Thumbnail:</label>
                                        <input type="file" name="thumbnail" class="form-control" id="photoInput">
                                        
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                        style="display: none; max-width: 80px; max-height: 80px;">
                                    </div> --}}
                                    <div class="form-group col-lg-8">
                                        <label>Photo(470x235):</label>
                                        <input type="file" name="photo" class="form-control" id="photoInput1">

                                        <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Phone:</label>
                                        <input type="number" name="phone" class="form-control" placeholder="012xxxxxxxx" value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="" id="">
                                    {{-- <div class="row mt-3">
                                        <div class="form-group col-lg-3">
                                            <label>Name:</label>
                                            <input type="text" name="name[]" class="form-control"
                                                placeholder="Enter Name" value="{{ old('name') }}">
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>Phone:</label>
                                            <input type="text" name="phone[]" class="form-control"
                                                placeholder="Enter Phone" value="{{ old('phone') }}">
                                        </div>
                                        <div class=" form-group col-lg-3">
                                            <label>Thumbnail(56x56px):</label>
                                            <input type="file" name="thumbnail[]" class=" form-control" id="photoInput"
                                                value="{{ old('photo') }}">

                                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                                style="display: none; max-width: 80px; max-height: 80px;">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Photo(56x56px):</label>
                                            <input type="file" name="photo[]" class=" form-control" id="photoInput1"
                                                value="{{ old('photo') }}">

                                            <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                                style="display: none; max-width: 80px; max-height: 80px;">
                                        </div>
                                        <div class="col-md-1">
                                            <img style="margin-top: 28px" onclick="removeRowfeature(this)"
                                                src="{{ asset('backend/images/icon/close.png') }}" alt=""
                                                style="cursor: pointer">
                                        </div>
                                        <div class="form-group col-lg-11">
                                            <label for="">Short Description:</label>
                                            <textarea name="short_description[]" id="editor2" class="form-control" placeholder="Enter Description" rows="5">{{ old('description') }}</textarea>
                                        </div>
                                        <div class="form-group col-lg-11 mt-3">
                                            <label for="">Description:</label>
                                            <textarea name="description[]" id="editor" class="form-control" placeholder="Enter Description" rows="5">{{ old('description') }}</textarea>
                                        </div>
                                        <span class="multiple_field"></span>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-success" onclick="addNewRow()">Add
                                                    More</button>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="row mt-3">
                                        <div class="form-group">
                                            <label>Slug:</label>
                                            <input type="text" name="slug" class="form-control"
                                                placeholder="If You Don't Want to create keep it blank"
                                                value="{{ old('slug') }}">
                                        </div>
                                    </div>
                                     --}}
                                    {{-- <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Short Description:</label>
                                            <textarea name="short_description" id="short_description" class="form-control" placeholder="Enter Description"
                                                rows="5">{{ old('short_description') }}</textarea>
                                        </div>
                                    </div> --}}
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Description:</label>
                                            <textarea name="description" id="editor" class="form-control" placeholder="Enter Description" rows="5">{{ old('description') }}</textarea>
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
        CKEDITOR.replace('short_description');
        CKEDITOR.replace('editor');
    </script>
@endsection
@push('script')
    <script>
        let count = 1;
        let count_s = 1;

        function addNewRow() {
            count++;
            count_s++;
            // Create a new row element
            var newRow = document.createElement('div');
            newRow.className = 'row mt-3';
            // Set the inner HTML of the new row
            newRow.innerHTML = `<div class="form-group col-lg-3">
                                            <label>Name:</label>
                                            <input type="text" name="name[]" class="form-control"
                                                placeholder="Enter Name" value="{{ old('name') }}">
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>Phone:</label>
                                            <input type="text" name="phone[]" class="form-control"
                                                placeholder="Enter Phone" value="{{ old('phone') }}">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Thumbnail(56x56px):</label>
                                            <input type="file" name="thumbnail[]" class=" form-control" id="photoInput1"
                                                value="{{ old('photo') }}">

                                            <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                                style="display: none; max-width: 80px; max-height: 80px;">
                                        </div>
                                        <div class=" form-group col-lg-3">
                                            <label>Photo(56x56px):</label>
                                            <input type="file" name="photo[]" class=" form-control" id="photoInput"
                                                value="{{ old('photo') }}">

                                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                                style="display: none; max-width: 80px; max-height: 80px;">
                                        </div>
                                        <div class="form-group col-lg-1">
          <img style="cursor:pointer;margin-top:28px" src="/backend/images/icon/close.png" alt="Remove" class="remove-btn" onclick="removeRowfeature(this)">
          
       </div>
       <div class="form-group col-lg-11">
                                            <label for="">Short Description:</label>
                                            <textarea name="short_description[]" id=editor_des_sh_${count_s }" class="form-control" placeholder="Enter Description" rows="5">{{ old('short_description') }}</textarea>
                                        </div>
       <div class="form-group col-lg-11 mt-3">
                                            <label for="">Description:</label>
                                            <textarea name="description[]" id="editor_des_${count }" class="form-control" placeholder="Enter Description" rows="5">{{ old('description') }}</textarea>
                                        </div>
       `;
            // Append the new row to the "multiple_field" class element
            var multipleField = document.querySelector('.multiple_field');
            multipleField.appendChild(newRow);
            let count_id = `editor_des_${count}`
            let count_id_s = `editor_des_sh_${count_s}`
            CKEDITOR.replace(count_id);
            CKEDITOR.replace(count_id_s);
        }

        function removeRowfeature(image) {
            var row = image.closest('.row');
            row.parentNode.removeChild(row);
        }
    </script>
    <script>
        CKEDITOR.replace('editor');
        CKEDITOR.replace('editor2');
    </script>
@endpush
