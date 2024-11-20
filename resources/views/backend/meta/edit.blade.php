@extends('layouts.backend.master')
@section('title', 'Edit Meta Info')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Meta Info</li>
                    </ol>
                </nav>
                <h1 class="m-0">Meta Info</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit Meta Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.meta.update', $meta->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Page Name:</label>
                                    <input type="text" name="page_name" class="form-control"
                                        value="{{ $meta->page_name }}" readonly>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Title:</label>
                                    <input type="text" name="m_title" class=" form-control" value="{{ $meta->m_title }}">
                                </div>
                                
                                <div class="form-group mt-2">
                                    <label>Keyword:</label>
                                    <input type="text" name="m_keyword" class="form-control" value="{{ $meta->m_keyword }}">
                                </div>
                                <div class="form-group mt-2">
                                    <label>Description:</label>
                                    <textarea name="m_description" class="form-control" rows="7">{{ $meta->m_description }}</textarea>
                                </div>

                                <div class="form-group mt-2">
                                    <label>Photo:</label>
                                    <input type="file" name="m_photo" class="form-control" onchange="imagePreView(this,'meta_img')">
                                    <img src="{{ $meta->m_photo }}" class="mt-2" width="60" alt="meta">
                                    <img id="meta_img" class="mt-3" src="#" alt="Preview"
                                        style="display: none; max-width: 80px; max-height: 80px;">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
