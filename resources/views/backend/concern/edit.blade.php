@extends('layouts.backend.master')
@section('title', 'Edit Concerns')
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
                            <h6><a href="{{ route('backend.concern.index') }}">All Concerns</a></h6>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="{{ route('backend.concern.update', $concern->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Edit Concern Info</h1>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $concern->title }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Slug:</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Enter Slug"
                                            value="{{ $concern->slug }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label>Link URL:</label>
                                        <input type="text" name="url" class="form-control"
                                            placeholder="Enter Link URL" value="{{ $concern->url }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-6">
                                        <label>Logo(200x100):</label>
                                        <input type="file" name="icon" class="form-control" id="photoInput">
                                        <img src="{{ $concern->icon }}" width="80" class="mt-2" alt="">

                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    {{-- <div class=" form-group col-lg-4">
                                        <label>Photo(420x224):</label>
                                        <input type="file" name="photo" class="form-control" id="photoInput1">
                                        <img src="{{ $concern->photo }}" width="80" class="mt-2" alt="">
                                        <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div> --}}
                                    <div class="form-group col-lg-6">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            value="{{ $concern->alt_text }}">
                                    </div>
                                </div>
                                {{-- <div class="row mt-3">
                                    <div class=" form-group">
                                        <label>Slider Photo(1728x550):</label>
                                        <input type="file" name="slider[]" class="form-control"
                                            value="{{ old('photo') }}" multiple>

                                        @if ($concern->slider)
                                            @php
                                                $photoArray = explode(';', $concern->slider);

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
                                </div> --}}
                                <div class="row mt-3">
                                    <div class="form-group col-lg-12">
                                        <label>Description:</label>
                                        <textarea name="description" id="editor" class="form-control " rows="7" placeholder="Enter Description">{{ $concern->description }}</textarea>
                                    </div>

                                </div>



                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>
                    {{-- <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Edit Meta Info</h1>
                            </div>
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label>Meta Title:</label>
                                        <input type="text" name="m_title" class="form-control"
                                            placeholder="Enter Meta Title" value="{{ $concern->m_title }}">

                                    </div>
                                    <div class=" form-group mt-3">
                                        <label>Meta Photo(16x9 ratio recomended):</label>
                                        <input type="file" name="m_photo" class="form-control" id="photoInput">
                                        <img src="{{ $concern->m_photo }}" width="80" alt="">



                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Meta Keyword:</label>
                                        <input type="text" name="m_keyword" class="form-control"
                                            placeholder="Enter Meta Keyword" value="{{ $concern->m_keyword }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Meta Description:</label>
                                        <textarea name="m_description" class="form-control" placeholder="Enter Meta Description" rows="5">{{ $concern->m_description }}</textarea>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div> --}}
                </div>
                {{-- <div class="row">
                    <div class="col-lg-3">
                        <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>
                </div> --}}
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

@endsection
@push('script')
    <script>
        function removeRow(image) {
            var row = image.closest('.property-image');
            row.parentNode.removeChild(row);
            updateTotalAmount();
        }
    </script>
@endpush
