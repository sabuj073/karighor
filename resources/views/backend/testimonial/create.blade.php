@extends('layouts.backend.master')
@section('title', 'Create Testimonial')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><h5><a href="{{ route('admin') }}">Dashboard /</a></h5></li>
                        <li class="breadcrumb-item active" aria-current="page"> Professional Excellence</li>
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
                            <h1 class="text-center">Create Professional Excellence Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.testimonial.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    {{-- <div class="form-group col-lg-4">
                                        <label>Name:</label>
                                        <input type="text" name="name" class=" form-control"
                                            placeholder="Enter Name" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Designation:</label>
                                        <input type="text" name="designation" class=" form-control"
                                            placeholder="Enter Designation" value="{{ old('designation') }}">
                                    </div> --}}
                                    <div class="form-group col-lg-6">
                                        <label>Photo(480x480):</label>
                                        <input type="file" name="photo" class="form-control" id="photoInput">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div> 
                                    <div class="form-group col-lg-6">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class=" form-control"
                                            placeholder="Enter Alter Text" value="{{ old('alt_text') }}">
                                    </div>
                                </div>                              
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Description:</label>
                                        <textarea name="description" id="description" class="form-control" rows="7">{{ old('description') }}</textarea>
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
