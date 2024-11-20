@extends('layouts.backend.master')
@section('title', 'Create Blog')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('index') }}">Dashboard /</a></h5>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
                            <h1 class="text-center">Create Blog Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.blog.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class=" form-group">
                                    <label>Title:</label>
                                    <input type="text" name="title" class=" form-control"
                                        placeholder="Enter Blog Title" value="{{ old('title') }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label>Slug:</label>
                                    <input type="text" name="slug" class="form-control"
                                        placeholder="If you don't want to create keep it blank" value="{{ old('slug') }}">
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label>Bradcrum Photo(1728x485):</label>
                                        <input type="file" name="slider[]" class="form-control"
                                            value="{{ old('photo') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <label>Auther Name:</label>
                                        <input type="text" name="auther" class=" form-control"
                                            placeholder="Enter Auther Name" value="{{ old('auther') }}">
                                    </div>
                                    <div class=" form-group col-lg-3">
                                        <label>Photo(800*500):</label>
                                        <input type="file" name="photo" class=" form-control" id="photoInput"
                                            value="{{ old('photo') }}">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ old('alt_text') }}">
                                    </div>
                                    <div class=" form-group col-lg-3">
                                        <label>Date:</label>
                                        <input type="date" name="date" class="form-control"
                                            value="{{ old('date') }}">
                                    </div>
                                </div>
                                <div class=" form-group mt-3">
                                    <label>Description:</label>
                                    <textarea name="description" id="editor" class="form-control " rows="7" placeholder="Enter Blog Description">{{ old('description') }}</textarea>
                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Meta Photo:</label>
                                        <input type="file" name="meta_photo" class=" form-control" id="photoInput"
                                            value="{{ old('meta_photo') }}">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Meta Title:</label>
                                        <input type="text" name="m_title" class="form-control"
                                            placeholder="Enter Meta Title" value="{{ old('m_title') }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Meta Keyword:</label>
                                        <input type="text" name="m_keyword" class="form-control"
                                            placeholder="Enter Meta Keyword" value="{{ old('m_keyword') }}">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label>Meta Description:</label>
                                        <textarea name="m_description" class="form-control" placeholder="Enter Meta Description" rows="5">{{ old('m_description') }}</textarea>
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
@push('script')
    <script>
        $(document).ready(function() {
            initializeSummernote('#editor');
        });
    </script>
@endpush
