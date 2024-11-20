@extends('layouts.frontend.master')
@section('content')
    <section class="page_sec_pad_50">
       <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="box_shadow bg-white p-5 rad_5 login_box">
                    <h4 class="text-center text_primary">Login</h4>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="number" name="phone" id="" class="form-control rad_5" placeholder="Enter your 11digit Phone Number Here">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="" class="form-control rad_5" placeholder="Enter your password here">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rad_5" style="padding: 12px 20px">Continue</button>
                    </form>
                </div>
            </div>
        </div>
       </div>
    </section>
@endsection