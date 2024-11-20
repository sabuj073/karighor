@extends('layouts.backend.master')
@section('title', 'Update Portal Info')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('admin') }}">Dashboard /</h5></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Portal Info</li>
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
                            <h1 class="text-center">Edit Portal Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.portal.update', $portal->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label>Photo(212x263):</label>
                                        <input type="file" name="photo" class="form-control" id="photoInput">
                                        <img src="{{ $portal->photo }}" class="mt-2" width="60" alt="Logo">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Photo1(560x440):</label>
                                        <input type="file" name="photo1" class="form-control" id="photoInput1">
                                        <img src="{{ @$portal->photo1 }}" class="mt-2" width="60" alt="Logo">
                                        <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            value="{{ $portal->alt_text }}">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label>OTA Portal Link:</label>
                                        <input type="text" name="url" class="form-control"
                                            value="{{ $portal->url }}">
                                    </div>
                                </div>
                                
                                @php
                                    $ota_info_json = explode(';', $portal->ota_info);
                                @endphp
                                @if ($ota_info_json)

                                    @foreach ($ota_info_json as $servicesData)
                                        <div class="row mt-3">
                                            <div class="form-group col-lg-7">
                                                <label for="">Info Name:</label>
                                                <input type="text" name="ota_info[]" class="form-control" id=""
                                                    value="{{ @$servicesData }}">
                                            </div>
                                            <div class="col-md-1">
                                                <img style="margin-top: 28px" onclick="removeRowfeature(this)"
                                                    src="{{ asset('backend/images/icon/close.png') }}" alt=""
                                                    style="cursor: pointer">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <span class="multiple_field"></span>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-success" onclick="addNewRow()">Add
                                            More</button>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group">
                                        <label>Slider Photo(1728x550):</label>
                                        <input type="file" name="slider[]" class="form-control"
                                            value="{{ old('photo') }}" multiple>

                                        @if ($portal->slider)
                                            @php
                                                $photoArray = explode(';', $portal->slider);

                                            @endphp

                                            <div class="mt-2" style="display: flex;padding-top:5px">
                                                @foreach ($photoArray as $photoArrays)
                                                    <div class="carousel-cell property-image">
                                                        <img src="{{ $photoArrays }}" width="60" alt="">
                                                        <input type="hidden" name="s_image[]" class="form-control"
                                                            value="{{ $photoArrays }}">
                                                        <img src="{{ asset('backend/images/icon/close.png') }}"
                                                            width="30px"
                                                            style="padding-right: 5px; cursor: pointer;margin-top:-15px"
                                                            alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label>Description:</label>
                                    <textarea name="description" id="description" cols="30" rows="10">{{ $portal->description }}</textarea>
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
@push('script')
    <script>
        function addNewRow() {
            // Create a new row element
            var newRow = document.createElement('div');
            newRow.className = 'row';
            // Set the inner HTML of the new row
            newRow.innerHTML = `<div class="form-group col-lg-7">
                                                    <label for="">Info Name:</label>
                                                    <input type="text" name="ota_info_new[]" class="form-control" placeholder="Enter Info Name"
                                                        id="" value="">
                                                </div>
                                        <div class="form-group col-lg-1">
          <img style="cursor:pointer;margin-top:28px" src="/backend/images/icon/close.png" alt="Remove" class="remove-btn" onclick="removeRowfeature(this)">
       </div>`;
            // Append the new row to the "multiple_field" class element
            var multipleField = document.querySelector('.multiple_field');
            multipleField.appendChild(newRow);
        }
        function removeRowfeature(image) {
            var row = image.closest('.row');
            row.parentNode.removeChild(row);
        }

        function removeRow(image) {
            var row = image.closest('.property-image');
            row.parentNode.removeChild(row);
            updateTotalAmount();
        }
    </script>
@endpush
