@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="page_sec_pad_50">
       <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="box_shadow bg-white p-5 rad_5 login_box">
                    <h4 class="text-center text_primary">Track your order</h4>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="phone" id="" class="form-control rad_5" placeholder="Enter your Order Number Here">
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 rad_5" style="padding: 12px 20px">Submit</button>
                    </form>
                </div>
            </div>
        </div>
       </div>
    </section>
@endsection