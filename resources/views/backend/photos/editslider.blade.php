@extends('layouts.backend.master')
@section('title', 'Edit Photos')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('index') }}">Dashboard /</a></h5>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <h6><a href="{{ route('backend.photoGallery.index') }}">All Photos</a>
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
                            <h1 class="text-center">Bradcrumb Photos</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.photoGallery.update', $photoGallery->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class=" form-group">
                                    <label>Slider Photo(1728x550):</label>
                                    <input type="hidden" name="year" id="" value="1900">
                                    <input type="file" name="slider[]" class="form-control" value="{{ old('photo') }}"
                                        >

                                    @if ($photoGallery->slider)
                                        @php
                                            $photoArray = explode(';', $photoGallery->slider);

                                        @endphp

                                        <div class="mt-2" style="display: flex;padding-top:5px">
                                            @foreach ($photoArray as $photoArrays)
                                                <div class="carousel-cell property-image">
                                                    <img src="{{ $photoArrays }}" width="60" alt="">
                                                    <input type="hidden" name="s_image[]" class="form-control"
                                                        value="{{ $photoArrays }}">
                                                    <img src="{{ asset('backend/images/icon/close.png') }}" width="30px"
                                                        style="padding-right: 5px; cursor: pointer;margin-top:-15px"
                                                        alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
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
        function removeRow(image) {
            var row = image.closest('.property-image');
            row.parentNode.removeChild(row);
            updateTotalAmount();
        }
    </script>

@endsection
