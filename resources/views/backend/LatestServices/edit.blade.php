@extends('layouts.backend.master')
@section('title', 'Edit')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Latest Services</li>
                    </ol>
                </nav>
                <h1 class="m-0">Add Latest Services</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Latest Services</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.LatestServices.update', $latestServices->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label>Photo(89x58):</label>
                                        <input type="file" name="photo" class=" form-control" id="photoInput"
                                            value="{{ old('photo') }}">
                                        <img src="{{ $latestServices->photo }}" width="80px" class="mt-2"
                                            alt="">

                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ $latestServices->alt_text }}">
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <label>Title:</label>
                                    <input type="text" name="title" class=" form-control" placeholder="Enter Title"
                                        value="{{ $latestServices->title }}">
                                </div>
                                <div class="mt-3 form-group">
                                    <label>Slug:</label>
                                    <input type="text" name="slug" class=" form-control" placeholder="Enter Slug"
                                        value="{{ $latestServices->slug }}">
                                </div>
                                <div class="row">
                                    <div class="mt-3 form-group">
                                        <label>Description:</label>
                                        <textarea name="description" id="editor" class="form-control " rows="7" placeholder="Enter Description">{!! $latestServices->description !!}</textarea>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="mt-3 form-group">
                                        <label>Select Service name</label>
                                        <select name="services_id" class="form-control" id="category" name="category">
                                            <option selected>service name</option>
                                            @foreach ($serviceData as $service)
                                                <option @if ($service->id == $latestServices->services_id) selected @endif
                                                    value="{{ $service->id }}">{{ $service->title }}</option>
                                            @endforeach
                                            <!-- Add more options as needed -->
                                        </select>
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
