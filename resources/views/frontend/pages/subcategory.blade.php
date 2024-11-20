@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="cat-section page_sec_pad_25 bg-gray">
        <div class="container">
            <h2 class="section-title mb-0 text-center">Smart Watch</h2>

        </div>
    </section>
    <section class="page_sec_pad_25 pt-0 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="box_shadow p-3 bg-white rad_5">
                        <h5 class="text-center mb-0 border-bottom">Select Brand</h5>
                        @for ($i = 0; $i < 12; $i++)
                            <div class="d-flex mt-1 gap_10">
                                <input type="checkbox" name="" id="">
                                Apple
                            </div>
                        @endfor
                    </div>
                    <div class="box_shadow p-3 bg-white rad_5 mt-3">
                        <h5 class="text-center mb-0 border-bottom">Availability</h5>

                        <div class="d-flex mt-1 gap_10">
                            <input type="checkbox" name="" id="">
                            In Stock
                        </div>
                        <div class="d-flex mt-1 gap_10">
                            <input type="checkbox" name="" id="">
                            Out of Stock
                        </div>
                    </div>
                    <div class="box_shadow p-3 bg-white rad_5 mt-3">
                        <h5 class="text-center mb-0 border-bottom">Price Range</h5>

                        <div class="d-flex justify-content-between mt-1 gap_10">
                            <input type="text" class="w-50" name="" id="" readonly value="100">
                            <input type="text" class="w-50" name="" id="" readonly value="1000">
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        @for ($i = 0; $i < 12; $i++)
                            <div class="col-lg-3 mb-2">
                                @include('frontend.partial.product_card')
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
