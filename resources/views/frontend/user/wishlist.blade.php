@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="page_sec_pad_50">
        <div class="container">
            <div class="row">
                @include('frontend.user.sidebar')
                <div class="col-lg-9 order-lg-last order-1 tab-content">
                    <div class="row row-lg">
                        <div class="col-lg-12">
                            <div class="cart-table-container bg-white box_shadow rad_5 p-4 table-responsive">
                                <h4 class="text-center mb-1" style="color: #1a4622">Wishlist</h4>
                                <hr class="mb-0 mt-0" style="border-top: 1px solid #1a4622;">
                                <table class="table table-cart">
                                    <thead>
                                        <tr>
                                            <th class="product-col">Product</th>
                                            <th class="price-col">Price</th>
                                            <th class="qty-col">Status</th>
                                            <th class="text-right">Amount</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < 3; $i++)
                                            <tr class="product-row">

                                                <td>

                                                    <figure class="product-image-container gap_5">
                                                        <a href="product.html" class="product-image">
                                                            <img src="{{ asset('frontend/img/products/New folder/image (1).png') }}"
                                                                alt="product">
                                                        </a>
                                                        <h5 class="product-title">
                                                            <a href="product.html">Lorem ipsum dolor sit
                                                                amet consectetur adipisicing elit. </a>
                                                        </h5>
                                                    </figure>
                                                </td>

                                                <td class="unit_price">৳17.90</td>
                                                <td class="stock">
                                                    In Stock
                                                </td>
                                                <td class="text-right wish_amount"><span class="subtotal-price">৳17.90</span></td>
                                                <td>
                                                    <div class="text-center text-danger cursor-pointer cart_trash">
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
