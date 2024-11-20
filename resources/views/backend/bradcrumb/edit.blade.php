@extends('layouts.backend.master')
@section('title', 'Edit Photos')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('admin') }}">Dashboard</a></h5>
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
                            <h1 class="text-center">Background Images</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.bradcrumb.update', $bradcrumb->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Choose US Photo(1700x700):</label>
                                        <input type="file" name="about_photo" class="form-control"
                                            onchange="imagePreView(this,'photoInput')">
                                        <img src="{{ $bradcrumb->about_photo }}" class="mt-3" width="80"
                                            alt="">
                                        <img id="photoInput" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Newsletter Photo(1700x300):</label>
                                        <input type="file" name="team_photo" class="form-control"
                                            onchange="imagePreView(this,'team_photo')">
                                        <img src="{{ $bradcrumb->team_photo }}" class="mt-3" width="80"
                                            alt="">
                                        <img id="team_photo" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <label>Glance Photo(1700x300):</label>
                                        <input type="file" name="blog_photo" class="form-control" onchange="imagePreView(this,'blog_photo')">
                                        <img src="{{ $bradcrumb->blog_photo }}" class="mt-3" width="80"
                                            alt="">
                                        <img id="blog_photo" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    {{-- <div class="form-group col-lg-6">
                                        <label>Career Photo(1728x485):</label>
                                        <input type="file" name="career_photo" class="form-control" onchange="imagePreView(this,'career_photo')">
                                        <img src="{{ $bradcrumb->career_photo }}" class="mt-3" width="80"
                                            alt="">
                                        <img id="career_photo" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div> --}}
                                </div>
                                {{-- 
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <label>Gallery Photo(1728x485):</label>
                                        <input type="file" name="gallery_photo" class="form-control" onchange="imagePreView(this,'gallery_photo')">
                                        <img src="{{ $bradcrumb->gallery_photo }}" class="mt-3" width="80"
                                            alt="">
                                        <img id="gallery_photo" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Videos Photo(1728x485):</label>
                                        <input type="file" name="video_photo" class="form-control" onchange="imagePreView(this,'video_photo')">
                                        <img src="{{ $bradcrumb->video_photo }}" class="mt-3" width="80"
                                            alt="">
                                        <img id="video_photo" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <label>Client Photo(1728x485):</label>
                                        <input type="file" name="client_photo" class="form-control" onchange="imagePreView(this,'client_photo')">
                                        <img src="{{ $bradcrumb->client_photo }}" class="mt-3" width="80"
                                            alt="">
                                        <img id="client_photo" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Contact Us Photo(1728x485):</label>
                                        <input type="file" name="contact_photo" class="form-control" onchange="imagePreView(this,'contact_photo')">
                                        <img src="{{ $bradcrumb->contact_photo }}" class="mt-3" width="80"
                                            alt="">
                                        <img id="contact_photo" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                </div> --}}

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
