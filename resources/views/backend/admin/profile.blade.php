@extends('layouts.backend.master')
@section('title', 'User Profile')
@section('content')
    <div class="user_profile_page">
        <div class="container">
            <div class="row ">
                @include('backend.admin.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12">
                    <div class="user_info_box_shadow">
                        <div class="card-header text-center">
                            Manage Profile
                        </div>
                        <div class="row">
                            <form action="{{ route('backend.user.update', auth()->user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
                                        <div class="col-lg-3">
                                            <label for="">Your Name</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" name="name" class="form-control" placeholder=""
                                                value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
                                        <div class="col-lg-3">
                                            <label for="">Your Phone</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" name="phone" class="form-control" placeholder=""
                                                value="{{ auth()->user()->phone ?? '--' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
                                        <div class="col-lg-3">
                                            <label for="">Your Email</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="email" name="email" class="form-control" placeholder=""
                                                value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
                                        <div class="col-lg-3">
                                            <label for="">Your Password</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="password" name="password" class="form-control"
                                                autocomplete="new-password"
                                                placeholder="If you don't want to update password keep it blank">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
                                        <div class="col-lg-3">
                                            <label for="">Confirm Password</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                autocomplete="new-password"
                                                placeholder="If you don't want to update password keep it blank">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
                                        <div class="col-lg-3">
                                            <label for="">Your Photo(270x320)</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="file" name="photo" class="form-control" placeholder=""
                                                value="">
                                                <img src="{{ url('storage/user/'.auth()->user()->photo) }}" class="pt-2" width="60" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
                                        <div class="col-lg-3">
                                            <label for="">Your Address</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <textarea name="address" id="" class="form-control" rows="5">{{ auth()->user()->address ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="text-center col-lg-12 col-md-12 col-sm-12 col-12 blog_works_btn">
                                        <div class="glance_btn">
                                            <button type="submit" class="works_btn button_cursor">Update Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
