@extends('layouts.backend.master')
@section('title', 'Create Category')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard /</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <h5>
                                <a href="{{ route('backend.category.index') }}">
                                    All Category
                                </a>
                            </h5>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <form action="{{ route('backend.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center pl-10">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Add Category</h1>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" id="name" name="name" class=" form-control"
                                        placeholder="Enter Name" value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label>Slug:</label>
                                    <input type="text" id="slug" name="slug" class=" form-control"
                                        placeholder="Enter Slug" value="{{ old('slug') }}">
                                </div>
                                {{-- <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <label for="">Select Parent:</label>
                                        <select name="parent_id" id="" class="form-control">
                                            <option value="">--Select</option>
                                            <option value="">--Select</option>
                                            <option value="">--Select</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Order Level:</label>
                                        <input type="text" class="form-control" name="order_level" id="">
                                    </div>
                                </div> --}}
                                <div class="form-group mt-3">
                                    <label>Logo:</label>
                                    <input type="file" name="logo" class=" form-control" onchange="imagePreView(this,'photoInput')">
                                    <img id="photoInput" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                </div>
                                <div class="form-group mt-3">
                                    <label>Banner:</label>
                                    <input type="file" name="banner" class=" form-control" onchange="imagePreView(this,'baner_img')">
                                    <img id="baner_img" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                </div>
                                <div class="form-group mt-3">
                                    <label>Order Level:</label>
                                    <input type="text" class="form-control" name="order_level" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Add Meta Info</h1>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Meta Photo:</label>
                                    <input type="file" name="m_photo" class=" form-control" onchange="imagePreView(this,'meta_img')">
                                    <img id="meta_img" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                </div>
                                <div class="form-group mt-2">
                                    <label>Meta Title:</label>
                                    <input type="text" name="m_title" class=" form-control" placeholder="Enter Title"
                                        value="{{ old('m_title') }}">
                                </div>
                                <div class="form-group mt-2">
                                    <label>Meta Keyword:</label>
                                    <input type="text" name="m_keyword" class="form-control"
                                        placeholder="Enter Meta Keyword" value="{{ old('m_keyword') }}">
                                </div>
                                <div class="form-group mt-2">
                                    <label>Meta Description:</label>
                                    <textarea name="m_description" id="" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 justify-content-end">
                    <div class="col-lg-4 text-end">
                        <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>


@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $("#name").on("keyup", function(e) {
                $("#slug").val(convertToSlug($(this).val()));
            })
        });

        function convertToSlug(Text) {
            return Text
                .toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
        }
    </script>
@endpush
