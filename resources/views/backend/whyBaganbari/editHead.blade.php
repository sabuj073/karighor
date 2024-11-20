@extends('layouts.backend.master')
@section('title', 'Create Videos')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Why BaganBari</li>
                    </ol>
                </nav>
                <h1 class="m-0">Why BaganBari</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Why BaganBari</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.whyBaganbari.update', $whyBaganbari->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class=" form-group col-lg-4">
                                        <label>Change Background(1728x804):</label>
                                        <input type="file" name="b_photo" class=" form-control" id="photoInput"
                                            value="{{ old('b_photo') }}">
                                        <img src="{{ $whyBaganbari->b_photo }}" width="80px" class="mt-2"
                                            alt="">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-3 form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" value="{{ $whyBaganbari->title }}"
                                            name="title" id="">
                                    </div>
                                    <div class="mt-3 form-group">
                                        <label>Description:</label>
                                        <textarea name="description" id="editor" class="form-control " rows="7" placeholder="Enter Description">{!! $whyBaganbari->description !!}</textarea>
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
