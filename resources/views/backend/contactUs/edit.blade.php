@extends('layouts.backend.master')
@section('title', 'Update Contact Info')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h6><a href="{{ route('admin') }}">Dashboard /</a></h6>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <h5><a href="{{ route('backend.contactUs.index') }}">All Contact Info</a></h5>
                        </li>
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
                            <h1 class="text-center">Edit Contact Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.contactUs.update', $contactUs->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Logo(46x42):</label>
                                        <input type="file" name="logo" class="form-control" id="photoInput">
                                        <img src="{{ $contactUs->contact_image }}" class="mt-2" width="60" alt="Logo">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Title:</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ $contactUs->title }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <label>Phone:</label>
                                        <input type="number" name="phone" class="form-control" placeholder="Enter Phone" value="{{ $contactUs->phone }}">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label>Map Location URL:</label>
                                    <textarea name="map" class="form-control" placeholder="Enter Map URL" rows="5">{{ $contactUs->map }}</textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <label>Address:</label>
                                    <textarea name="address" id="address" class="form-control " rows="7">{{ $contactUs->description }}</textarea>
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
        CKEDITOR.replace('address');
        CKEDITOR.replace('facebook_pixel');
        CKEDITOR.replace('facebook_messenger');
        CKEDITOR.replace('bullet_content');
    </script>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            initializeSummernote('#address');
        });
    </script>
@endpush
