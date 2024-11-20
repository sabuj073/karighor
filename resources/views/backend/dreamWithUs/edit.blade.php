@extends('layouts.backend.master')
@section('title', 'Update')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Dream With Us</li>
                    </ol>
                </nav>
                <h1 class="m-0">Edit Dream With Us</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit Dream With Us</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.dreamWithUs.update', $dreamWithUs->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class=" form-group">
                                    <label>Title:</label>
                                    <input type="text" name="title" value="{{ $dreamWithUs->title }}"
                                        class=" form-control" placeholder="Enter Title">
                                </div>
                                <div class="mt-3 form-group">
                                    <label>Slug:</label>
                                    <input type="text" name="slug" value="{{ $dreamWithUs->slug }}"
                                        class=" form-control" placeholder="Enter Title">
                                </div>
                                <div class="mt-3 form-group">
                                    <label>Description:</label>
                                    <textarea name="description" id="editor" class="form-control " rows="7" placeholder="Enter Description">{!! $dreamWithUs->description !!}</textarea>
                                </div>
                                <div class="mt-3 form-group">
                                    <label>Additional Description:</label>
                                    <textarea name="add_description" id="editor1" class="form-control " rows="7" placeholder="Enter Description">{!! $dreamWithUs->add_description !!}</textarea>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6 form-group">
                                        <label>Name:</label>
                                        <input type="text" name="name" value="{{ $dreamWithUs->name }}"
                                            class=" form-control" placeholder="Enter name">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Address:</label>
                                        <input type="text" name="address" class=" form-control" placeholder="Enter Title"
                                            value="{{ $dreamWithUs->address }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Thumb Photo(739x517):</label>
                                        <input type="file" name="photo" class=" form-control" id="photoInput"
                                            value="{{ old('photo') }}">
                                        <img src="{{ $dreamWithUs->photo }}" width="80px" class="mt-2" alt="">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ $dreamWithUs->alt_text }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Video:</label>
                                        <input type="text" name="video" class="form-control"
                                            placeholder="Enter Video URL" value="{{ $dreamWithUs->video }}">
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
        CKEDITOR.replace('editor');
    </script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
@endsection
