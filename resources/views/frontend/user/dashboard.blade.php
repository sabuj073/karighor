@extends('layouts.frontend.master')
@section('content')
    <section class="page_sec_pad_50 pt_25_res">
        <div class="container">
            <div class="row">
                @include('frontend.user.sidebar')
                <div class="col-lg-9 order-lg-last order-1 tab-content">
                    <div class="dashboard-content box_shadow bg-white p-5 rad_5">
                        <div class="row row-lg">
                            <div class="col-6 col-md-4">
                                <div class="feature-box text-center pb-4">
                                    <a href="#order" class="link-to-tab"><i class="sicon-social-dropbox"></i></a>
                                    <div class="feature-box-content">
                                        <h3>Total Orders</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-4">
                                <div class="feature-box text-center pb-4">
                                    <a href="#download" class="link-to-tab"><i class="sicon-cloud-download"></i></a>
                                    <div class=" feature-box-content">
                                        <h3>DOWNLOADS</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-4">
                                <div class="feature-box text-center pb-4">
                                    <a href="#address" class="link-to-tab"><i class="sicon-location-pin"></i></a>
                                    <div class="feature-box-content">
                                        <h3>ADDRESSES</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-4">
                                <div class="feature-box text-center pb-4">
                                    <a href="#edit" class="link-to-tab"><i class="fa-solid fa-user-tie"></i></a>
                                    <div class="feature-box-content p-0">
                                        <h3>ACCOUNT DETAILS</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-4">
                                <div class="feature-box text-center pb-4">
                                    <a href="wishlist.html"><i class="sicon-heart"></i></a>
                                    <div class="feature-box-content">
                                        <h3>WISHLIST</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-4">
                                <div class="feature-box text-center pb-4">
                                    <a href="login.html"><i class="sicon-logout"></i></a>
                                    <div class="feature-box-content">
                                        <h3>LOGOUT</h3>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .row -->
                    </div>
                </div><!-- End .tab-content -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </section>
@endsection
