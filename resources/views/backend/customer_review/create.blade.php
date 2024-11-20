@extends('layouts.backend.master')
@section('title', 'Create Customer Review')
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
            <form action="{{ route('backend.customerReview.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Create Customer Review</h1>
                            </div>
                            <div class="card-body">

                                <div class="row ">
                                    <div class="form-group col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Select Package:</label>
                                        <select name="package_id" id="" class="form-control" required>
                                            <option value="" selected disabled>--Select--</option>
                                            @foreach ($packages as $package)
                                                <option value="{{ $package->id }}">{{ $package->package_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class=" form-group col-lg-6">
                                        <label>Rating Title:</label>
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Enter Rating Title">
                                    </div>
                                    <div class=" form-group col-lg-6">
                                        <label>Rating:</label>
                                        <input type="text" name="rating" id="rating" class="form-control" placeholder="Enter Rating" max="5" min="2">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Description:</label>
                                        <textarea name="description" id="editor" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>

            </form>
        </div>
    </section>
    <script>
        CKEDITOR.replace('editor');
    </script>

@endsection
@push('script')
<script>
    document.getElementById("rating").addEventListener("input", function() {
        var ratingInput = parseFloat(this.value);
        var min = 2;
        var max = 5;

        if (ratingInput < min) {
            this.value = min;
        } else if (ratingInput > max) {
            this.value = max;
        }
    });
</script>
@endpush
