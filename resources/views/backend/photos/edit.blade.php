@extends('layouts.backend.master')
@section('title', 'Edit Photos')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><h5><a href="{{ route('index') }}">Dashboard /</a></h5></li>
                        <li class="breadcrumb-item active" aria-current="page"><h6><a href="{{ route('backend.photoGallery.index') }}">All Photos</a></li>
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
                            <h1 class="text-center">Edit Gallery Photo</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.photoGallery.update', $photoGallery->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class=" form-group">
                                    <label>Title:</label>
                                    <input type="text" name="photo_title" class=" form-control" placeholder="Enter Title"
                                        value="{{ $photoGallery->photo_title }}" >
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label>Photo(649x494):</label>
                                    <input type="file" name="photo[]" class=" form-control mb-2" id="photoInput"
                                        multiple>
                                    @if ($photoGallery->photo)
                                        @php
                                            $photoArray = explode(';', $photoGallery->photo);
                                            
                                        @endphp

                                        <div style="display: flex;padding-top:5px">
                                            @foreach ($photoArray as $photoArrays)
                                                <div class="carousel-cell property-image"> <img src="{{ $photoArrays }}"
                                                        width="60" alt="">
                                                    <input type="hidden" name="image[]" class="form-control" value="{{ $photoArrays }}">
                                                    <img src="{{ asset('backend/images/icon/close.png') }}"
                                                        width="30px" style="padding-right: 5px; cursor: pointer;margin-top:-15px"
                                                        alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    </div>




                                    <div class="form-group col-lg-4 mt-3">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ $photoGallery->alt_text }}">
                                    </div>
                                    {{-- <div class="form-group col-lg-4 mt-3">
                                        <label for="">Select Year:</label>
                                        <select name="parent_id" class="form-control">
                                            <option selected disabled>Select Year</option>
                                            @foreach ($thumb as $data)
                                                <option @if ($photoGallery->parent_id == $data->id) selected @endif
                                                    value="{{ $data->id }}">{{ $data->year }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                </div>


                                <button type="submit" name="submit" class="btn btn-primary mt-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--<div class="col-lg-4 col-md-4 col-sm-12 col-12 m_top_15">-->
                <!--    <div class="card">-->
                <!--        <div class="card-header">-->
                <!--            <h4>Edit Year:</h4>-->
                <!--        </div>-->
                <!--        <div class="card-body">-->
                <!--            <form></form>-->
                <!--            <form action="{{ route('backend.photoGallery.update', $photoGallery->id) }}" method="POST"-->
                <!--                enctype="multipart/form-data">-->
                <!--                @csrf-->
                <!--                <div class="form-group">-->
                <!--                    <label>Title:</label>-->
                <!--                    <input type="text" name="title" class="form-control"-->
                <!--                        placeholder="Enter Thumb Title" value="{{ $photoGallery->title }}">-->
                <!--                </div>-->
                <!--                <div class=" form-group mt-3">-->
                <!--                    <label>Thumb Photo(63x62):</label>-->

                <!--                    <input type="file" name="thumb_photo" class=" form-control" id="photoInput2"-->
                <!--                        value="{{ old('thumb_photo') }}">-->
                <!--                    <img src="{{ $photoGallery->thumb_photo }}" width="80px" class="mt-2"-->
                <!--                        alt="">-->
                <!--                    <img id="previewImage2" class="mt-3" src="#" alt="Preview"-->
                <!--                        style="display: none; max-width: 80px; max-height: 80px;">-->
                <!--                </div>-->
                <!--                <div class="form-group mt-3">-->
                <!--                    <label>Alter Text:</label>-->
                <!--                    <input type="text" name="thumb_alt_text" class="form-control"-->
                <!--                        placeholder="Enter Alter Text" value="{{ $photoGallery->thumb_alt_text }}">-->
                <!--                </div>-->
                <!--                <div class="form-group mt-3">-->
                <!--                    <label>Year:</label>-->
                <!--                    <input type="text" name="year" class="form-control"-->
                <!--                        placeholder="Enter Year" value="{{ $photoGallery->year }}">-->
                <!--                </div>-->
                <!--                <button type="submit" class=" btn btn-sm btn-primary my-3">Update+</button>-->
                <!--            </form>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </section>

    <script>
        function removeRow(image) {
            var row = image.closest('.property-image');
            row.parentNode.removeChild(row);
            updateTotalAmount();
        }
    </script>

@endsection
