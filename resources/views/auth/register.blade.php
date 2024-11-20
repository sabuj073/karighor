@extends('layouts.frontend.master',['title' => 'Register', 'description' => 'Register'])

@section('content')
{{-- <section class="pad_top_120">
    <div class="page-title text-center" style="background: url('asset('frontend/img/bg/hero_bg.jpg')') no-repeat left center #d0af5f;">
        <div class="contact_tag1 text-center text-bold">Register Here</div>
        <hr class="hr_for_all">
    </div>
</section> --}}

<section class="signup_area page_sec_pad_50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login_card">
                    {{-- <div class="card-header text-center signup_header">{{ __('Sign Up') }}</div> --}}
    
                    <div class="card-body logincard_body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="logout_padding">
                                <div class="row justify-content-center mb-3">
                                    {{-- <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label> --}}
        
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="login_input form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Your Name*">
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row justify-content-center mb-3">
                                    {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}
        
                                    <div class="col-md-8">
                                        <input id="email" type="email" class="login_input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email*">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-3">
                                    {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}
        
                                    <div class="col-md-8">
                                        <input id="phone" type="number" class="login_input form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" placeholder="Enter Your Phone">
        
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row justify-content-center mb-3">
                                    {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}
        
                                    <div class="col-md-8">
                                        <input id="password" type="password" class="login_input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password*">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row justify-content-center mb-3">
                                    {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label> --}}
        
                                    <div class="col-md-8">
                                        <input id="password-confirm" type="password" class="login_input form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password*">
                                    </div>
                                </div>
        
                                <div class="row justify-content-center mb-0">
                                    <div class="col-md-8">
                                        <button type="submit" class="form-control btn login_btn">
                                            {{ __('Sign Up') }}
                                        </button>
                                    </div>
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
