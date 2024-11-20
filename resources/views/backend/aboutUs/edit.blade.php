@extends('layouts.backend.master')
@section('title', 'Edit About Us')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('admin') }}">Dashboard</a></h5>
                        </li>

                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit About Us</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.aboutUs.update', $aboutUs->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- <div class="row mt-3">
                                    <div class=" form-group">
                                        <label>Bradcrumb Photo(1728x550):</label>
                                        <input type="file" name="slider[]" class="form-control"
                                            value="{{ old('photo') }}">

                                        @if ($aboutUs->slider)
                                            @php
                                                $photoArray = explode(';', $aboutUs->slider);

                                            @endphp

                                            <div class="mt-2" style="display: flex;padding-top:5px">
                                                @foreach ($photoArray as $photoArrays)
                                                    <div class="carousel-cell property-image"> <img
                                                            src="{{ $photoArrays }}" width="60" alt="">
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

                                </div> --}}
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Youtube Thumb Photo(338x234):</label>
                                        <input type="file" name="youtube_thumb" class=" form-control" id="photoInput">
                                        <img src="{{ $aboutUs->youtube_thumb }}" class="mt-2" width="80"
                                            alt="">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Youtube Link:</label>
                                        <input type="text" name="youtube_link" class="form-control"
                                            placeholder="Youtube link here" value="{{ $aboutUs->youtube_link }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Title:</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title"
                                            value="{{ $aboutUs->title }}">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-9">
                                        <label>Important Note:</label>
                                        <textarea name="important_note" class="form-control" placeholder="Youtube link here">{{ $aboutUs->important_note }}</textarea>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-6">
                                        <label>Company Photo(688x432):</label>
                                        <input type="file" name="photo" class=" form-control" id="photoInput">
                                        <img src="{{ $aboutUs->photo }}" class="mt-2" width="80" alt="">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ $aboutUs->alt_text }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-12">
                                        <label>Description:</label>
                                        <textarea name="description" id="editor" class="form-control " rows="7" placeholder="Enter  Description">{{ $aboutUs->description }}</textarea>
                                    </div>
                                </div>



                                <div class="row mt-3">
                                    <div class="form-group col-lg-4">
                                        <label>Chairman Photo(304x325):</label>
                                        <input type="file" name="chairman_photo" class=" form-control"
                                            id="photoInput">
                                        <img src="{{ $aboutUs->chairman_photo }}" class="mt-2" width="80"
                                            alt="">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-8">
                                        <label>Chairman Message:</label>
                                        <textarea name="chairman_message" id="editor2" class="form-control " rows="7"
                                            placeholder="Enter  chairman_message">{{ $aboutUs->chairman_message }}</textarea>
                                    </div>
                                </div>




                                <div class="row mt-3">
                                    <div class="form-group col-lg-4">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Chairman Name" id=""
                                            value="{{ $aboutUs->name }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter Email" id=""
                                            value="{{ $aboutUs->email }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="">Designation</label>
                                        <input type="text" name="designation" class="form-control"
                                            placeholder="Enter Designation" id=""
                                            value="{{ $aboutUs->designation }}">
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <label for="">Facebook</label>
                                        <input type="text" name="facebook" class="form-control"
                                            placeholder="Facebook link here" id=""
                                            value="{{ $aboutUs->facebook }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="">Linkedin</label>
                                        <input type="text" name="linkedin" class="form-control"
                                            placeholder="linkedin link here" id=""
                                            value="{{ $aboutUs->linkedin }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="">Whatsapp</label>
                                        <input type="text" name="whatsapp" class="form-control"
                                            placeholder="whatsapp number" id=""
                                            value="{{ $aboutUs->whatsapp }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="">Twitter</label>
                                        <input type="text" name="twitter" class="form-control"
                                            placeholder="twitter link here" id=""
                                            value="{{ $aboutUs->twitter }}">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-4">
                                        <label>Core Value Photo(557x660):</label>
                                        <input type="file" name="approach_photo" class=" form-control"
                                            id="photoInput2">
                                        <img src="{{ $aboutUs->approach_photo }}" class="mt-2" width="80"
                                            alt="">
                                        <img id="previewImage2" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-8">
                                        <label>Core Value Description:</label>
                                        <textarea name="approach_des" id="approach_des" class="form-control " rows="7"
                                            placeholder="Enter  Description">{{ $aboutUs->approach_des }}</textarea>
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
  

    <script>
        function removeRow(image) {
            var row = image.closest('.property-image');
            row.parentNode.removeChild(row);
            updateTotalAmount();
        }
    </script>

@endsection
@push('script')
    <script>
         $(document).ready(function() {
            initializeSummernote('#editor');
            initializeSummernote('#editor2');
            initializeSummernote('#editor3');
            initializeSummernote('#approach_des');
        });
    </script>
@endpush
