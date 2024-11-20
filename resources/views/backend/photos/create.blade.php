@extends('layouts.backend.master')
@section('title', 'Create Photos')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><h5><a href="{{ route('index') }}">Dashboard /</a></h5></li>
                        <li class="breadcrumb-item active" aria-current="page">Photos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    {{-- <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Slider Photos</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.photoGallery.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Slider Photo(1728x485):</label>
                                    <input type="file" name="slider[]" class="form-control"
                                        value="{{ old('photo') }}" multiple>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div> --}}
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Gallery Photos</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.photoGallery.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class=" form-group">
                                    <label>Title:</label>
                                    <input type="text" name="photo_title" class=" form-control" placeholder="Enter Title"
                                        value="{{ old('photo_title') }}" required>
                                </div>
                                <div class="row mt-3">

                                    <div class=" form-group col-lg-4">
                                        <label>Photo(649x494):</label>
                                        <input type="file" name="photo[]" class=" form-control" id="photoInput" multiple required>
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    

                                    <div class="form-group col-lg-4">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ old('alt_text') }}">
                                    </div>
                                    {{-- <div class="form-group col-lg-4">
                                        <label for="">Select Year:</label>
                                        <select name="parent_id" class="form-control">
                                            <option selected disabled>Select Year</option>
                                            @foreach ($thumb as $data)
                                                <option value="{{ $data->id }}">{{ $data->year }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                </div>


                                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--<div class="col-lg-4 col-md-4 col-sm-12 col-12 m_top_15">-->
                <!--    <div class="card">-->
                <!--        <div class="card-header">-->
                <!--            <h4>Add Gallery Year:</h4>-->
                <!--        </div>-->
                <!--        <div class="card-body">-->
                <!--            <form></form>-->
                <!--            <form action="{{ route('backend.photoGallery.store') }}" method="POST"-->
                <!--                enctype="multipart/form-data">-->
                <!--                @csrf-->
                <!--                {{-- <div class="form-group">-->
                <!--                    <label>Title:</label>-->
                <!--                    <input type="text" name="title" class="form-control"-->
                <!--                        placeholder="Enter Thumb Title" value="{{ old('title') }}">-->
                <!--                </div>-->
                <!--                <div class=" form-group mt-3">-->
                <!--                    <label>Thumb Photo(63x62):</label>-->
                <!--                    <input type="file" name="thumb_photo" class=" form-control"-->
                <!--                        value="{{ old('thumb_photo') }}">-->
                <!--                    <img id="previewImage" class="mt-3" src="#" alt="Preview"-->
                <!--                        style="display: none; max-width: 80px; max-height: 80px;">-->
                <!--                </div>-->
                <!--                <div class="form-group mt-3">-->
                <!--                    <label>Alter Text:</label>-->
                <!--                    <input type="text" name="thumb_alt_text" class="form-control"-->
                <!--                        placeholder="Enter Alter Text" value="{{ old('thumb_alt_text') }}">-->
                <!--                </div> --}}-->
                <!--                <div class="form-group">-->
                <!--                    <label>Year:</label>-->
                <!--                    <input type="text" name="year" class="form-control"-->
                <!--                        placeholder="Enter Year" value="{{ old('year') }}">-->
                <!--                </div>-->
                <!--                <button type="submit" class=" btn btn-sm btn-primary my-3">Add+</button>-->
                <!--            </form>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </section>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
