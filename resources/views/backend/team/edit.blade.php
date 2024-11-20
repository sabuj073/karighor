@extends('layouts.backend.master')
@section('title', 'Create Team')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('index') }}">Dashboard /</a></h5>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Team</li>
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
                            <h1 class="text-center">Create Team Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.team.update',$team->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                               
                                <div class="row ">
                                    <div class="form-group col-lg-4">
                                        <label>Select Type:</label>
                                        <select name="type_id" id="" class="form-control" required>
                                            <option value="">--Select--</option>
                                            @foreach ($types as $type)
                                            <option value="{{ $type->id }}" {{ $type->id == $team->type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Name:</label>
                                        <input type="text" name="name" class=" form-control"
                                            placeholder="Enter Name" value="{{ $team->name }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Slug:</label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="If you don't want to create keep it blank" value="{{ $team->slug }}">
                                    </div>
                                   
                                </div>
                                <div class="row mt-3">
                                    {{-- <div class=" form-group col-lg-4">
                                        <label>Bradcamp(1750*550):</label>
                                        <input type="file" name="slider" class=" form-control" id="photoInput"
                                            value="{{ old('slider') }}">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div> --}}
                                    
                                    <div class=" form-group col-lg-4">
                                        <label>Photo(400*500):</label>
                                        <input type="file" name="photo" class=" form-control" id="photoInput">
                                        <img src="{{ $team->photo }}" width="80" class="mt-3" alt="">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>


                                    <div class="form-group col-lg-4">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ $team->alt_text }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Order Level:</label>
                                        <input type="text" name="order_level" class="form-control"
                                            placeholder="Enter Order Level" value="{{ $team->order_level }}">
                                    </div>

                                </div>
                                
                                {{-- <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <label>About Member:</label>
                                        <textarea name="about" id="editor" class="form-control " rows="5" placeholder="Enter Member Description">{{ old('about') }}</textarea>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Address:</label>
                                        <textarea name="address" id="address" class="form-control " rows="5" placeholder="Enter Member Address">{{ old('address') }}</textarea>
                                    </div>
                                </div> --}}                                
                                <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <label>Designation:</label>
                                        <input type="text" name="designation" class="form-control"
                                            placeholder="Enter Designation" value="{{ $team->designation }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Experience:</label>
                                        <input type="text" name="experience" class="form-control"
                                            placeholder="Enter Experience" value="{{ $team->experience }}">
                                    </div>
                                    
                                    <div class="form-group col-lg-3">
                                        <label>Phone:</label>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="Enter Designation" value="{{ $team->phone }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email"
                                            value="{{ $team->email }}">
                                    </div>

                                </div>
                                <div class="row mt-3">                                    
                                    <div class="form-group col-lg-3">
                                        <label>Website Link:</label>
                                        <input type="text" name="website_link" class="form-control"
                                            placeholder="Enter website_link" value="{{ $team->website_link }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Twitter:</label>
                                        <input type="text" name="twitter" class="form-control"
                                            placeholder="Enter twitter link" value="{{ $team->twitter }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Facebook:</label>
                                        <input type="text" name="facebook" class="form-control"
                                            placeholder="Enter facebook link" value="{{ $team->facebook }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Instagram:</label>
                                        <input type="text" name="instagram" class="form-control"
                                            placeholder="Enter instagram link" value="{{ $team->instagram }}">
                                    </div>

                                </div>

                                {{-- <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Meta Photo:</label>
                                        <input type="file" name="meta_photo" class=" form-control" id="photoInput"
                                            value="{{ old('meta_photo') }}">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Meta Title:</label>
                                        <input type="text" name="m_title" class="form-control"
                                            placeholder="Enter Meta Title" value="{{ old('m_title') }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Meta Keyword:</label>
                                        <input type="text" name="m_keyword" class="form-control"
                                            placeholder="Enter Meta Keyword" value="{{ old('m_keyword') }}">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label>Meta Description:</label>
                                        <textarea name="m_description" class="form-control" placeholder="Enter Meta Description" rows="5">{{ old('m_description') }}</textarea>
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
   
@endsection
