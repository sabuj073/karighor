@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="page_sec_pad_50 pt_25_res">
        <div class="container">
            <div class="row">
                @include('frontend.user.sidebar')
                <div class="col-lg-9 order-lg-last order-1 tab-content">
                    <div class="row row-lg">
                        <div class="col-lg-12">
                            <div class="bg-white box_shadow rad_5 p-4 table-responsive">
                                <h4 class="text-center mb-1" style="color: #1a4622">Purchase History</h4>
                                <hr class="mb-0 mt-0" style="border-top: 1px solid #1a4622;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Code</th>
                                            <th class="">Date</th>
                                            <th class="">Amount</th>
                                            <th class="">Delivery Status</th>
                                            <th class="">Payment Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < 3; $i++)
                                            <tr class="product-row">
                                                <td>123654789</td>
                                                <td><div>11 Nov 2024</div></td>

                                                <td>৳17.90</td>
                                                <td>Delivered</td>
                                                <td>Paid</td>
                                                <td class="d-flex justify-content-center gap_5">
                                                    <div class="text-center text-success cursor-pointer icon_show">
                                                        <i class="fa-solid fa-eye rad_5"></i>
                                                    </div>
                                                    <div class="text-center text-danger cursor-pointer icon_trash">
                                                        <i class="fa-solid fa-trash rad_5"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endfor


                                    </tbody>
                                </table>
                            </div><!-- End .cart-table-container -->
                        </div><!-- End .col-lg-8 -->
                    </div><!-- End .row -->
                </div><!-- End .tab-content -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </section>
@endsection
