@extends('layouts.backend.master')
@section('title', 'Edit Banner')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('admin') }}">Dashboard /</a></h5>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{ route('backend.banner.index') }}">All Banner</a></li>
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
                            <h1 class="text-center">Edit Banner Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.banner.update', $banner->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group col-lg-4">
                                    <label>Select type</label>
                                    <select name="type" id="" class="form-control" required>
                                        <option value="">--Select--</option>
                                        <option value="photo" {{ $banner->type == 'photo' ? 'selected' : '' }}>Photo
                                        </option>
                                        <option value="video" {{ $banner->type == 'video' ? 'selected' : '' }}>Video
                                        </option>
                                    </select>
                                </div>
                                <div class="row mt-3">

                                    <div class="form-group col-lg-6">
                                        <label>Title:[Use "" for special text]</label>
                                        <input type="text" name="title" class=" form-control"
                                            placeholder="Enter Banner Title" value="{{ $banner->title }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Sub Title:</label>
                                        <input type="text" name="sub_title" class=" form-control"
                                            placeholder="Enter Banner Sub Title" value="{{ $banner->sub_title }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Photo(1600x595):</label>
                                        <input type="file" name="photo" class=" form-control"
                                            onchange="imagePreView(this,'banner_img')">
                                        <img src="{{ $banner->photo }}" class="mt-2" width="80" alt="">
                                        <img id="banner_img" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Video(1600x595):mp4*</label>
                                        <input type="file" name="video" class=" form-control" value="">
                                        [Video must be mp4]
                                        @if ($banner->video)
                                            <video autoplay muted loop auto width="200px" height="100px">
                                                <source src="{{ $banner->video }}">
                                            </video>
                                        @endif
                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ $banner->alt_text }}">
                                    </div>
                                    {{-- <div class=" form-group mt-3">
                                        <label>Bulllet Point(max 3):</label>
                                        <textarea name="description" class=" form-control " rows="7"
                                            placeholder="Enter Banner Description">{{ $banner->description }}</textarea>
                                            [Use (;) After Each Bullet Point]
                                    </div> --}}

                                </div>
                                <div class="row mt-3">
                                    {{-- <div class=" form-group col-lg-6">
                                        <label>Promo Photo(570x340):</label>
                                        <input type="file" name="promo_img" class="form-control" id="photoInput1">
                                        <img src="{{ $banner->promo_img }}" class="mt-2" width="80" alt="">
                                        <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div> --}}
                                    <div class="form-group">
                                        <label>URL:</label>
                                        <input type="text" name="url" class=" form-control"
                                            placeholder="Enter Link Url" value="{{ $banner->url }}">
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
        CKEDITOR.replace('description');
    </script>
@endsection
