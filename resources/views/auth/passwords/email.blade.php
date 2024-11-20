@extends('layouts.frontend.master')

@section('content')
<section class="">
    <div class="page-title text-center" style="background: url(../frontend/img/slider/h1-s1.jpg) no-repeat left center #d0af5f;">
        <div class="contact_tag1 text-center text-bold">Reset Password</div>
        <hr class="hr_for_all">
    </div>
</section>

<section class="forgetPassword_area page_section_padding_50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login_card">
                    <div class="card-header text-center">{{ __('Reset Password') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="form-control btn login_btn text-center">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
