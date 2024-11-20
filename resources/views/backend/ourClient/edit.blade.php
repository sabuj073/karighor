@extends('layouts.backend.master')
@section('title', 'Update')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Out Client</li>
                    </ol>
                </nav>
                <h1 class="m-0">Edit Mision Vision</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit Client</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.ourClient.update', $ourClient->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf



                                <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Photo(89x58):</label>
                                        <input type="file" name="photo" class=" form-control" id="photoInput"
                                            value="{{ old('mission_photo') }}">
                                        <img src="{{ $ourClient->photo }}" width="80px" class="mt-2" alt="">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Alter text:</label>
                                        <input type="text" name="alt_text" class="form-control mt-2"
                                            placeholder="Enter Meta Title" value="{{ $ourClient->alt_text }}">

                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <label>Meta Title:</label>
                                        <input type="text" name="m_title" class="form-control mt-2"
                                            placeholder="Enter Meta Title" value="{{ $ourClient->m_title }}">

                                    </div>
                                    <div class=" form-group col-lg-3">
                                        <label>Meta Photo:</label>
                                        <input type="file" name="meta_photo" class="form-control mt-2" id="photoInput">
                                        (16x9 ratio recomended)
                                        <img src="{{ $ourClient->meta_photo }}" width="80px" class="mt-2"
                                            alt="">

                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Meta Keyword:</label>
                                        <input type="text" name="m_keyword" class="form-control mt-2"
                                            placeholder="Enter Meta Keyword" value="{{ $ourClient->m_keyword }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Meta Description:</label>
                                        <textarea name="m_description" class="form-control mt-2" placeholder="Enter Meta Description" rows="1">{{ $ourClient->m_description }}</textarea>
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
    <script>
        CKEDITOR.replace('editor2');
    </script>
    <script>
        CKEDITOR.replace('editor3');
    </script>

@endsection
