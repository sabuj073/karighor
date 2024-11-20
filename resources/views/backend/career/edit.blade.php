@extends('layouts.backend.master')
@section('title', 'Edit Career')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Career</li>
                    </ol>
                </nav>
                <h1 class="m-0">Career</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit Career Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.career.update', $career->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <b>Title:</b>
                                        <input type="text" name="title" class=" form-control"
                                            placeholder="Enter Job Title" value="{{ $career->title }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <b>Job Type:</b>
                                        <input type="text" name="job_type" class="form-control"
                                            placeholder="Enter Job Type" value="{{ $career->job_type }}">
                                    </div>
                                    {{-- <div class=" form-group col-lg-4">
                                        <label>Bradcamp(1750*550):</label>
                                        <input type="file" name="slider" class=" form-control" id="photoInput"
                                            value="{{ old('slider') }}">
                                        <img src="{{ $career->slider }}" class="" width="60" alt="">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div> --}}
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <b>Salary:</b>
                                        <input type="text" name="salary" class="form-control" placeholder="Enter Salary"
                                            value="{{ $career->salary }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <b>Job Location:</b>
                                        <input type="text" name="location" class="form-control"
                                            placeholder="Enter Job Location" value="{{ $career->location }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <b>Job Deadline:</b>
                                        <input type="date" name="deadline" class="form-control"
                                            placeholder="Enter Job Location" value="{{ $career->deadline }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <b>Alter Text:</b>
                                        <input type="text" name="alt_text" class=" form-control"
                                            placeholder="Enter Alter Text" value="{{ $career->alt_text }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <b>Photo(767x942):</b>
                                        <input type="file" name="photo" class="form-control" onchange="imagePreView(this,'photoInput')">
                                        <img src="{{ $career->photo }}" class="mt-2" width="60" alt="">
                                        <img id="photoInput" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <b>Meta Photo(767x942):</b>
                                        <input type="file" name="meta_photo" class="form-control" onchange="imagePreView(this,'meta_img')">
                                        <img src="{{ $career->meta_photo }}" class="mt-2" width="60" alt="">
                                        <img id="meta_img" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                </div>
                                
                                <div class=" form-group mt-3">
                                    <b>Description:</b>
                                    <textarea name="description" class="form-control" id="editor" rows="7" placeholder="Enter Description">{{ $career->description }}</textarea>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <b>Meta Title:</b>
                                        <input type="text" name="m_title" class="form-control"
                                            placeholder="Enter Meta Title" value="{{ $career->m_title }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <b>Meta Keyword:</b>
                                        <input type="text" name="m_keyword" class="form-control"
                                            placeholder="Enter Meta Keyword" value="{{ $career->m_keyword }}">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <b>Meta Description:</b>
                                    <textarea name="m_description" class="form-control" id="meta_editor" rows="7"
                                        placeholder="Enter Mtea Description">{{ $career->m_description }}</textarea>
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
        CKEDITOR.replace('meta_editor');
    </script>
@endsection
