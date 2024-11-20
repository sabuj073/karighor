@extends('layouts.backend.master')
@section('title', 'Update')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Our Stoty</li>
                    </ol>
                </nav>
                <h1 class="m-0">Edit Our Story</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit Our Story</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.our_story.updateSection2', $ourStory->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- <div class=" form-group">
                                    <label>Title:</label>
                                    <input type="text" name="title" class=" form-control" placeholder="Enter Title"
                                        value="{{ old('title') }}">
                                </div>
                                <div class="mt-3 form-group">
                                    <label>Slug:</label>
                                    <input type="text" name="slug" class=" form-control" placeholder="Enter Slug"
                                        value="{{ old('slug') }}">
                                </div> --}}

                                <div class="row">
                                    <div class="mt-3 form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" value="{{ $ourStory->sec2_title }}"
                                            name="sec2_title" id="">
                                    </div>
                                    <div class="mt-3 form-group">
                                        <label>Description:</label>
                                        <textarea name="sec2_description" id="editor" class="form-control " rows="7" placeholder="Enter Description">{{ $ourStory->sec2_description }}</textarea>
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
