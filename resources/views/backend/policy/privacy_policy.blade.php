@extends('layouts.backend.master')
@section('title', 'Update Privacy Policy Info')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><h5><a href="{{ route('admin') }}">Dashboard /</a></h5></li>
                        <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
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
                            <h1 class="text-center">Edit Privacy Policy Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.policy.update', $policy->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Write Privacy Policy Content:</label>
                                    <textarea name="privacy" id="editor" class="form-control " rows="7">{{ $policy->privacy }}</textarea>
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
@push('script')
    <script>
        $(document).ready(function(){
            initializeSummernote('#editor');
        });
    </script>
@endpush
