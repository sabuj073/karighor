@extends('layouts.backend.master')
@section('title', 'Edit Concerns')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('admin') }}">Dashboard /</a></h5>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="{{ route('backend.achievement.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Edit Achievement Info</h1>
                            </div>
                            <div class="card-body">                                
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-6">
                                        <label>Photo(200x100):</label>
                                        <input type="file" name="photo" class="form-control" id="photoInput">
                                        <img src="{{ $achievement->photo }}" width="80" class="mt-2" alt="">

                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class=" form-group col-lg-6">
                                        <label>Alter Text:</label>
                                        <input type="file" name="alt_text" class="form-control" value="{{ $achievement->alt_text }}">
                                    </div>
                                    
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-12">
                                        <label>Description:</label>
                                        <textarea name="description" id="editor" class="form-control " rows="7" placeholder="Enter Description">{{ $achievement->description }}</textarea>
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

