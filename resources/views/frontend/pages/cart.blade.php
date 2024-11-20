@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="page_sec_pad_50 pt_25_res">
        <div class="container">

            <div class="row justify-content-end">

                <div class="col-lg-4">
                    <div class="cart-summary box_shadow br_15">
                        <h6 class="mb-0 primary_color">* To order, please enter your full name, mobile number, complete
                            address and
                            click confirm order.</h6>
                        <form action="">
                            <div class="form-group mt-2">
                                <input type="text" name="name" class="form-control" id=""
                                    placeholder="Enter Your Name">
                            </div>
                            <div class="form-group mt-1">
                                <input type="text" name="phone" class="form-control" id=""
                                    placeholder="Enter Your Mobile Number*" required>
                            </div>
                            <div class="form-group mt-1">
                                <textarea name="address" id="" class="form-control" rows="3" placeholder="Enter your full address"></textarea>
                            </div>
                            <div class="form-group mt-1">
                                <select name="delivery_charge" id="delivery_charge" class="form-control" required>
                                    <option value="">--Please Select--</option>
                                    <option value="{{ $contact_info->custom_field2 }}">Inside dhaka ({{ $contact_info->custom_field2 }}tk)</option>
                                    <option value="{{ $contact_info->custom_field3 }}">Near by dhaka({{ $contact_info->custom_field3 }}tk)</option>
                                    <option value="{{ $contact_info->custom_field4 }}">Outside Dhaka({{ $contact_info->custom_field4 }}tk)</option>
                                </select>
                            </div>
                            <div class="form-group mt-1">
                                <textarea name="note" id="" class="form-control" rows="3"
                                    placeholder="In your order note, please leave any comments"></textarea>
                            </div>
                        </form>

                    </div><!-- End .cart-summary -->
                </div><!-- End .col-lg-4 -->
                <div class="col-lg-8">
                    <div class="cart-table-container bg-white box_shadow br_15 p-4 table-responsive">
                        <h4 class="text-center mb-1" style="color: #1a4622">Your Cart Summery</h4>
                        <hr class="mb-0 mt-0" style="border-top: 1px solid #1a4622;">
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <th class="product-col">Product</th>
                                    <th class="price-col">Price</th>
                                    <th class="qty-col">Quantity</th>
                                    <th class="text-right">Amount</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="cart_data">
                                

                            </tbody>
                        </table>
                    </div><!-- End .cart-table-container -->

                    <div class="col-lg-6 col-sm-12 col-12 pl-0 pr-0" style="float: inline-end">
                        <div class="bg-white box_shadow br_15 p-4">
                            <h4 class="text-center mb-1" style="color: #1a4622">Your Order Summery</h4>
                            <hr class="mb-0 mt-0" style="border-top: 1px solid #1a4622;">
                            <div class="coupon_box mt-2 d-flex justify-content-between gap_10">
                                <div class="form-group w-100">
                                    <input type="text" name="coupon_code" id="" class="form-control"
                                        placeholder="Enter code here">
                                </div>
                                <button class="btn btn-sm btn-primary rad_5"
                                    style="height: 45px;margin-bottom: 0;padding-bottom: 0;">Apply Coupon</button>
                            </div>


                            <div class="row mt-2 mb-1">
                                <div class="col-lg-8">
                                    <h6 class="mb-0">Sub Total</h6>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="mb-0 text-right total_amount">0</h6>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-lg-8">
                                    <h6 class="mb-0">Shipping</h6>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="mb-0 text-right shipping_charge_amount">0</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <h6 class="mb-0">Discount</h6>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="mb-0 text-right">0</h6>
                                </div>
                            </div>


                            <hr class="cart_total_hr">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h4 class="mb-0">Total</h4>
                                </div>
                                <div class="col-lg-4">
                                    <h4 class="mb-0 text-right total_amount_full"></h4>
                                </div>
                            </div>

                            <div class="checkout-methods mt-2">
                                <a href="cart.html" class="btn btn-sm btn-primary rad_5" style="height: 50px">Confirm
                                    Order Now
                                </a>
                            </div>


                        </div><!-- End .float-right -->
                    </div>
                </div><!-- End .col-lg-8 -->

            </div><!-- End .row -->
        </div><!-- End .container -->
    </section>
@endsection
