@extends('layouts.backend.master')
@section('title', 'Create Why Choose')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Why Choose</li>
                    </ol>
                </nav>
                <h1 class="m-0">Why Choose</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Why Choose Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.whyChoose.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" name="title" class=" form-control" placeholder="Enter Title"
                                            value="{{ old('title') }}" required>
                                    </div>
                                    {{-- <div class="form-group col-lg-6">
                                        <label>Counter:</label>
                                        <input type="number" name="counter" class="form-control" placeholder="Enter Number"
                                            value="{{ old('counter') }}">
                                    </div> --}}
                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-6">
                                        <label>Icon(50x50):</label>
                                        <input type="file" name="icon" class=" form-control" id="photoInput"
                                            value="{{ old('icon') }}">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ old('alt_text') }}">
                                    </div>
                                </div>
                                {{-- <div class="form-group col-lg-6">
                                        <label>Top Content:</label>
                                        <textarea name="content" id="content" class="form-control " rows="7" placeholder="Enter Top Content">{{ old('content') }}</textarea>
                                    </div> --}}
                                <div class="form-group mt-3">
                                    <label>Description:</label>
                                    <textarea name="description" id="editor" class="form-control " rows="7" placeholder="Enter Blog Description">{{ old('description') }}</textarea>
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
        CKEDITOR.replace('content');
    </script>
@endsection
