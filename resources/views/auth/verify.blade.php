@extends('layouts.frontend.master',['title' => 'Verify', 'description' => 'Verify'])

@section('content')
{{-- <section class="">
    <div class="page-title text-center" style="background: url(../frontend/img/slider/h1-s1.jpg) no-repeat left center #d0af5f;">
        <div class="contact_tag1 text-center text-bold">Verify Email</div>
        <hr class="hr_for_all">
    </div>
</section> --}}
<section class="verify_section page_section_padding_50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>
    
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
    
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
