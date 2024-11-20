@extends('layouts.backend.master')
@section('title', 'Edit Affiliation')
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
            <form action="{{ route('backend.affiliation.update',$affiliation->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Edit Affiliation</h1>
                            </div>
                            <div class="card-body">

                                <div class="row ">
                                    <div class="form-group col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $affiliation->name }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Select Package:</label>
                                        <select name="package_id" id="" class="form-control">
                                            <option value="" selected disabled>--Select--</option>
                                            @foreach ($packages as $package)
                                                <option value="{{ $package->id }}" {{ $affiliation->package_id == $package->id ? 'selected' : '' }}>{{ $package->package_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <label>Select Type:</label>
                                        <select name="type" id="" class="form-control">
                                            <option value="" selected disabled>--Select--</option>
                                                <option value="flight" {{ $affiliation->type == 'flight' ? 'selected' : '' }}>Flight</option>
                                                <option value="hotel" {{ $affiliation->type == 'hotel' ? 'selected' : '' }}>Hotel</option>
                                        </select>
                                    </div>
                                    <div class=" form-group col-lg-6">
                                        <label>Photo(320x320):</label>
                                        <input type="file" name="photo" class="form-control" id="photoInput1">
                                        <img src="{{ $affiliation->photo }}" width="80" class="mt-3" alt="">

                                        <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
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

@endsection
