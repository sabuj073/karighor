@extends('layouts.backend.master')
@section('title', 'User Create')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Create</li>
                    </ol>
                </nav>
                <h1 class="m-0">User Create</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid text-dark">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add User</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.user.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <b>Name:</b>
                                        <input type="text" name="name" class=" form-control"
                                            placeholder="Enter Your Name" required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <b>Email:</b>
                                        <input type="email" name="email" class=" form-control"
                                            placeholder="Enter your Email" required>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <b>Phone:</b>
                                        <input type="number" name="phone" class="form-control"
                                            placeholder="Enter Your Phone">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <b>Photo:</b>
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <b>Password:</b>
                                        <input type="password" name="password" class=" form-control" placeholder="Enter Password" required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <b>Confirm Password:</b>
                                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <b>Role:</b>
                                        <select name="role" class="form-control">
                                            <option selected disabled>Select Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
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
@endsection
