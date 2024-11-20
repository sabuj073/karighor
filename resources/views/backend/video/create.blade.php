@extends('layouts.backend.master')
@section('title', 'Create Videos')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Videos</li>
                    </ol>
                </nav>
                <h1 class="m-0">Videos</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Videos</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.videoGallery.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Title:</label>
                                    <input type="text" name="title" class=" form-control" placeholder="Enter Title"
                                        value="{{ old('title') }}">
                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Thumb Photo(649x494):</label>
                                        <input type="file" name="photo" class=" form-control" id="photoInput"
                                            value="{{ old('photo') }}" required>
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ old('alt_text') }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Video:</label>
                                        <input type="text" name="video" class="form-control"
                                            placeholder="Enter Video URL" value="{{ old('video') }}" required>
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
    
@endsection
