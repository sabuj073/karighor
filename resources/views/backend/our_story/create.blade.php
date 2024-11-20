@extends('layouts.backend.master')
@section('title', 'Create Videos')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Our Stoty</li>
                    </ol>
                </nav>
                <h1 class="m-0">Our Story</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Our Story</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.our_story.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- <div class=" form-group">
                                    <label>Title:</label>
                                    <input type="text" name="title" class=" form-control" placeholder="Enter Title"
                                        value="{{ old('title') }}">
                                </div>
                                <div class="mt-3 form-group">
                                    <label>Slug:</label>
                                    <input type="text" name="slug" class=" form-control" placeholder="Enter Slug"
                                        value="{{ old('slug') }}">
                                </div> --}}
                                <div class="row mt-3">
                                    <div class="form-group col-lg-4">
                                        <label>Photo(89x58):</label>
                                        <input type="file" name="sec1_photo" class=" form-control" id="photoInput"
                                            value="{{ old('photo') }}">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Alter Text:</label>
                                        <input type="text" name="sec1_alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ old('sec1_alt_text') }}">
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="mt-3 form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="sec1_title" id="">
                                    </div>
                                    <div class="mt-3 form-group">
                                        <label>Description:</label>
                                        <textarea name="sec1_description" id="editor" class="form-control " rows="7" placeholder="Enter Description">{{ old('sec1_description') }}</textarea>
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

@endsection
