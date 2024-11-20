@extends('layouts.backend.master')
@section('title', 'Create Packages')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                    </ol>
                </nav>
                <h1 class="m-0">Add Packages</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="{{ route('backend.packages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Add Packages</h1>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Select Service*</label>
                                        <select class="form-control" name="service_id" id="serviceTypeSelect">
                                            <option value="" selected disabled>Select Service</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="" id="">
                                    <div class="row mt-3">
                                        <div class="form-group col-lg-8">
                                            <label>Package Title:</label>
                                            <input type="text" name="package_title" class="form-control"
                                                placeholder="Enter Title" value="{{ old('package_title') }}">
                                        </div>
                                        <div class=" form-group col-lg-4">
                                            <label>Package photo(470x235):</label>
                                            <input type="file" name="package_photo" class=" form-control" id="photoInput"
                                                value="{{ old('package_photo') }}">

                                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                                style="display: none; max-width: 80px; max-height: 80px;">
                                        </div>
                                    </div>
                                    <div class="row mt-3">

                                        <div class="form-group col-lg-8">
                                            <label>Package Slug:</label>
                                            <input type="text" name="package_slug" class="form-control"
                                                placeholder="If You Don't Want to create keep it blank"
                                                value="{{ old('slug') }}">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Phone:</label>
                                            <input type="number" name="phone" class="form-control"
                                                placeholder="+88012xxxxxxxx"
                                                value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group col-md-6">
                                            <label>Package Limitation Message(1 person/2 person):</label>
                                            <input type="text" name="package_limitation" class="form-control"
                                                placeholder="1 person/2 person" value="{{ old('package_limitation') }}">
                                        </div>
                                        <div class="form-group col-md-6">

                                            <label>Package Price:</label>
                                            <input type="text" name="package_price" class="form-control" placeholder="Enter Package Price"
                                                value="{{ old('package_price') }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        {{-- <div class="form-group col-md-6">
                                            <label>Total Day:</label>
                                            <input type="text" name="total_day" class="form-control" placeholder=""
                                                value="{{ old('total_day') }}">
                                        </div> --}}
                                        <div class="form-group col-md-6">
                                            <label>Tour Starting Date:</label>
                                            <input type="date" name="start_date" class="form-control"
                                                placeholder="Select Tour Starting Date" value="{{ old('start_date') }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tour Ending Date:</label>
                                            <input type="date" name="end_date" class="form-control"
                                                placeholder="Select Tour Ending Date" value="{{ old('end_date') }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group">
                                            <label for="">Tour Description:</label>
                                            <textarea name="tour_description" id="editor" class="form-control" placeholder="Enter Description" rows="5">{{ old('package_description') }}</textarea>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Add Meta Info</h1>
                            </div>
                            <div class="card-body">
                                {{-- meta info --}}
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>
                </div>
                
            </form>
        </div>
    </section>
    <script>
        CKEDITOR.replace('editor');
    </script>

@endsection
