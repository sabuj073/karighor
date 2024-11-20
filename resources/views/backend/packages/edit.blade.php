@extends('layouts.backend.master')
@section('title', 'Edit Packages')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('admin') }}">Dashboard / </a></h5>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <h6><a href="{{ route('backend.packages.index') }}">All Packages</a></h6>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="{{ route('backend.packages.update', $packages->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit packages Info</h1>
                        </div>
                        <div class="card-body">
                            
                                <div class="col-md-4">
                                    <label for="">Select Service*</label>
                                    <select class="form-control" name="service_id" id="serviceTypeSelect">
                                        <option value="" selected disabled>Select Service</option>
                                        @foreach ($services as $service)
                                            <option @if ($service->id == $packages->service_id) selected @endif
                                                value="{{ $service->id }}">{{ $service->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-8">
                                        <label>Title:</label>
                                        <input type="text" name="package_title" value="{{ $packages->package_title }}"
                                            class=" form-control" placeholder="Enter Title">
    
                                    </div>

                                    <div class=" form-group col-lg-4">
                                        <label>Photo(470x235):</label>
                                        <input type="file" name="package_photo" class=" form-control" id="photoInput">
                                        <img src="{{ $packages->package_photo }}" class="mt-3" width="60"
                                            alt="" id="edit_image2">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="form-group col-lg-8">
                                        <label>Package Slug:</label>
                                        <input type="text" name="package_slug" value="{{ $packages->package_slug }}"
                                            class=" form-control" placeholder="Edit Slug">

                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Phone:</label>
                                        <input type="number" name="phone" class="form-control"
                                            placeholder="+88012xxxxxxxx" value="{{ $packages->phone }}">
                                    </div>
                                </div>

                                
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <b>Package Limitation(2 person/3 person):</b>
                                        <input type="text" name="package_limitation"
                                            value="{{ $packages->package_limitation }}" class=" form-control">

                                    </div>
                                    <div class="form-group col-lg-6">
                                        <b>Price:</b>
                                        <input type="text" name="package_price" value="{{ $packages->package_price }}"
                                            class=" form-control">

                                    </div>
                                </div>
                                {{-- <div class="form-group mt-3">
                                    <b>Total Day:</b>
                                    <input type="text" name="total_day" value="{{ $packages->total_day }}"
                                        class=" form-control">

                                </div> --}}
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <b>Start Date:</b>
                                        <input type="date" name="start_date" value="{{ $packages->start_date }}"
                                            class=" form-control">

                                    </div>
                                    <div class="form-group col-lg-6">
                                        <b>End Date:</b>
                                        <input type="date" name="end_date" value="{{ $packages->end_date }}"
                                            class=" form-control">

                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <b>Tour Description:</b>
                                    <textarea name="tour_description" id="editor" class="form-control " rows="7" placeholder="About Package">{{ $packages->tour_description }}</textarea>

                                </div>



                               
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit Meta Info</h1>
                        </div>
                        <div class="card-body">
                            {{-- meta info --}}
                            <div class="row mt-3">
                                <div class="form-group">
                                    <label>Meta Title:</label>
                                    <input type="text" name="m_title" class="form-control"
                                        placeholder="Enter Meta Title" value="{{ $packages->m_title }}">

                                </div>
                                <div class=" form-group mt-3">
                                    <label>Meta Photo(16x9 ratio recomended):</label>
                                    <input type="file" name="m_photo" class="form-control" id="photoInput">
                                    <img src="{{ $packages->m_photo }}" width="80" alt="">
                                    


                                </div>
                                <div class="form-group mt-3">
                                    <label>Meta Keyword:</label>
                                    <input type="text" name="m_keyword" class="form-control"
                                        placeholder="Enter Meta Keyword" value="{{ $packages->m_keyword }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label>Meta Description:</label>
                                    <textarea name="m_description" class="form-control" placeholder="Enter Meta Description" rows="5">{{ $packages->m_description }}</textarea>
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
