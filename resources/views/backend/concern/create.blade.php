@extends('layouts.backend.master')
@section('title', 'Create Concern')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('admin') }}">Dashboard /</a></h5>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Concern</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="{{ route('backend.concern.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Create Concern</h1>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Enter Concern Name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Slug:</label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="If You Want to create automatic keep it blank"
                                            value="{{ old('slug') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label>Link URL:</label>
                                        <input type="text" name="url" class="form-control"
                                            placeholder="Enter Link URL"
                                            value="{{ old('url') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-6">
                                        <label>Logo(200x100):</label>
                                        <input type="file" name="icon" class="form-control" id="photoInput"
                                            value="{{ old('icon') }}">

                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    {{-- <div class=" form-group col-lg-4">
                                        <label>Photo(420x224):</label>
                                        <input type="file" name="photo" class="form-control" id="photoInput1"
                                            value="{{ old('photo') }}">

                                        <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div> --}}

                                    <div class="form-group col-lg-6">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control">
                                    </div>
                                </div>
                                {{-- <div class="row mt-3">
                                    <div class="form-group">
                                        <label>Slider Photo(1728x550):</label>
                                        <input type="file" name="slider[]" class="form-control"
                                            value="{{ old('photo') }}" multiple>
                                    </div>
                                </div> --}}
                                <div class="row mt-3">
                                    <div class="form-group col-lg-12">
                                        <label>Description:</label>
                                        <textarea name="description" id="editor" class="form-control " rows="7" placeholder="Enter Description"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>
                    {{-- <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Add Meta Info</h1>
                            </div>
                            <div class="card-body">
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
                    </div> --}}

                </div>
                {{-- <div class="row">
                    <div class="col-lg-3">
                        
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
