@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="page_sec_pad_50 pt_25_res">
        <div class="container">
            <div class="row">
                @include('frontend.user.sidebar')
                <div class="col-lg-9 order-lg-last order-1 tab-content">
                    <div class="row row-lg">
                        <div class="col-lg-12">
                            <div class="bg-white box_shadow rad_5 p-4">
                                <h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1"><i
                                        class="icon-user-2 align-middle mr-3 pr-1"></i>Account Details</h3>
                                <div class="account-content">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="acc-name">Name <span class="required">*</span></label>
                                                    <input type="text" name="name" class="form-control" placeholder="User"
                                                        id="acc-name"  required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="acc-name">Phone <span class="required">*</span></label>
                                                    <input type="number" name="phone" class="form-control" placeholder="012xxxxxxxx"
                                                        id="acc-name"   />
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group mb-4">
                                            <label for="acc-email">Email</label>
                                            <input type="email" class="form-control" id="acc-email" name="acc-email"
                                                placeholder="user@gmail.com"  />
                                        </div>

                                        <div class="change-password">
                                            <h3 class="text-uppercase mb-2">Password Change</h3>

                                            <div class="form-group">
                                                <label for="acc-password">Current Password (leave blank to leave
                                                    unchanged)</label>
                                                <input type="password" class="form-control" id="acc-password"
                                                    name="acc-password" />
                                            </div>

                                            <div class="form-group">
                                                <label for="acc-password">New Password (leave blank to leave
                                                    unchanged)</label>
                                                <input type="password" class="form-control" id="acc-new-password"
                                                    name="acc-new-password" />
                                            </div>

                                            <div class="form-group">
                                                <label for="acc-password">Confirm New Password</label>
                                                <input type="password" class="form-control" id="acc-confirm-password"
                                                    name="acc-confirm-password" />
                                            </div>
                                        </div>

                                        <div class="form-footer mt-3 mb-0">
                                            <button type="submit" class="btn btn-primary rad_5 mr-0">
                                                Save changes
                                            </button>
                                        </div>
                                    </form>
                                </div><!-- End .col-lg-8 -->
                            </div>
                        </div><!-- End .row -->
                    </div><!-- End .tab-content -->
                </div><!-- End .row -->
            </div><!-- End .container -->
    </section>
@endsection
