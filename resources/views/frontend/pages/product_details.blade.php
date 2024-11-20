@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@php
    $variations = [];
    foreach ($product->product_variations as $p_variations) {
        foreach ($p_variations->variations as $variation) {
            $variations[] = $variation;
        }
    }
    $medias = [];
    foreach ($variations as $key => $value) {
        $medias[] = $value->media;
    }




$price = null;
$variation_id = null;
$location_id = null;
$hasStock = false;

foreach ($product->product_variations as $productVariation) {
    foreach ($productVariation->variations as $variation) {
        foreach ($variation->variation_location_details as $locationDetail) {
            if ((int)$locationDetail->qty_available >= 1) {
                $hasStock = true;
                $price = (double)$variation->sell_price_inc_tax;
                $variation_id = $locationDetail->variation_id;
                $location_id = $locationDetail->location_id;
                break 3;
            }
        }
    }
}


@endphp

@section('content')
    <section class="page_sec_pad_50 bg_soft pt_25_res">
        <div class="container">

            <div class="product-single-container product-single-default mb-0 custom-scrollbar">
                <div class="row">
                    <div class="col-md-6 product-single-gallery mb-md-0">
                        <div class="product-slider-container  box_shadow br_15">

                            <div class="product-single-carousel  owl-carousel owl-theme">
                                @foreach ($medias as $media)
                                    <div class="product-item">
                                        <img class="product-single-image bg-white br_15"
                                            src="{{ asset($media[0]->display_url) }}"
                                            data-zoom-image="{{ asset($media[0]->display_url) }}" />
                                    </div>
                                @endforeach

                            </div>
                            <!-- End .product-single-carousel -->
                        </div>
                        <div class="prod-thumbnail owl-dots ">
                            @foreach ($medias as $media)
                                <div class="owl-dot box_shadow rad_5">
                                    <img class="rad_5 bg-white" src="{{ asset($media[0]->display_url) }}" />
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="product-single-details bg-white box_shadow p-5 br_15 mb-0 ml-md-4">
                            <h1 class="product-title">{{ $product->name }}</h1>

                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                </div><!-- End .product-ratings -->

                                <a href="#" class="rating-link">( 6 Reviews )</a>
                            </div>
                            {{-- <div class="price-box">
                                <span class="product-price"> $1,699.00</span><del>$2000</del>
                            </div> --}}
                            <div class="price-box product-filtered-price">
                                <span class="product-price"></span>
                                <del class="old-price"><span></span></del>
                            </div>

                            <ul class="single-info-list">
                                <!---->
                                <li>

                                    Product Code:
                                    <strong>{{ $product->sku }}</strong>
                                </li>

                                {{-- <li>
                                    CATEGORY:
                                    <strong>
                                        <a href="#" class="product-category">SHOES</a>
                                    </strong>
                                    </li> --}}
                            </ul>

                            <div class="product-filters-container">
                                <div class="product-single-filter">
                                    <label>Color:</label>
                                    <ul class="config-size-list">
                                        @foreach ($variations as $variation)
                                            <li class="active">
                                                <a href="javascript:;" onclick="handleChangeColorVariation('{{ $variation->name }}','{{ $variation->name }}', '{{ $variation->default_sell_price }}','{{ $variation->media[0]->display_url }}')"
                                                    class="d-flex align-items-center justify-content-center">{{ $variation->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="product-single-filter d-none">
                                    <label></label>
                                    <a class="font1 text-uppercase clear-btn" href="#">Clear</a>
                                </div>
                                <!---->
                            </div>
                            <div class="product-filters-container">

                                <div class="product-single-filter d-none">
                                    <label></label>
                                    <a class="font1 text-uppercase clear-btn" href="#">Clear</a>
                                </div>
                                <!---->
                            </div>

                            <div class="product-action">
                                <div class="product-single-qty cart_quantity d-flex gap_10">
                                    <label>Quantity:</label>
                                    <input class="horizontal-quantity form-control" name="quantity" type="text" />
                                </div><!-- End .product-single-qty -->


                            </div><!-- End .product-action -->
                            @if($hasStock)
                            <div class="row mt-1">
                                <input id="product_buy_item_quantity-value{{ $product->id }}" type="hidden" name="product_buy_item" value="1">
                                <div class="col-lg-6 mb_10_res">
                                    <a href="javascript:;" class="btn btn-primary rad_5 mr-2 w-100 second_btn add-to-cart"
                                        title="Order Now" style="line-height: 24px" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-qty="1" data-location="{{ $location_id }}" data-price="{{ $price }}" data-weight="{{ $product->weight }}" data-image="{{ $product->image_url }}" data-type="{{ $variation_id }}">Order
                                        Now</a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="javascript:;" class="btn btn-sm add-cart rad_5 mr-2 w-100 second_btn add-to-cart"
                                        title="Add to Cart" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-qty="1" data-location="{{ $location_id }}" data-price="{{ $price }}" data-weight="{{ $product->weight }}" data-image="{{ $product->image_url }}" data-type="{{ $variation_id }}">Add to
                                        Cart</a>
                                </div>
                            </div>
                             @else
                             <div class="row mt-1">
                                <div class="col-lg-12">
                                    <a href="javascript:;" class="btn btn-sm add-cart rad_5 mr-2 w-100 second_btn"
                                        title="Add to Cart">Out Of Stock</a>
                                </div>
                            </div>
                             @endif
                            <div class="btn btn-sm rad_5 bg_blue text-white mt-1 w-100 product_details_info_btn">For Direct
                                Call Click Here: <a href="tel:{{ $contact_info->mobile }}" class="text-white">{{ $contact_info->mobile }}</a>
                            </div>
                            <div class="btn btn-sm rad_5 bg_yellow text-dark mt-1 w-100 product_details_info_btn">Whatsapp
                                Message: <a href="tel:{{ $contact_info->mobile }}" class="text-dark">{{ $contact_info->mobile }}</a>
                            </div>
                            <div class="btn btn-sm rad_5 bg_default  mt-1 w-100 d-flex justify-content-between"
                                style="font-weight: 400">
                                Inside dhaka delivery charge <span class="">{{ $contact_info->custom_field2 }}tk</span>
                            </div>
                            <div class="btn btn-sm rad_5 bg_default  mt-1 w-100 d-flex justify-content-between"
                                style="font-weight: 400">
                                Near by dhaka delivery charge <span class="">{{ $contact_info->custom_field3 }}tk</span>
                            </div>
                            <div class="btn btn-sm rad_5 bg_default  mt-1 w-100 d-flex justify-content-between"
                                style="font-weight: 400">
                                Outside dhaka delivery charge <span class="">{{ $contact_info->custom_field4 }}tk</span>
                            </div>
                            <div class="mt-1">
                                <h5 class="mb-0">In case of orders outside Dhaka, the delivery charge must be paid
                                    in advance.</h5>
                            </div>

                            {{-- <div class="product-single-share mb-0">
                <label class="sr-only">Share:</label>

                <div class="social-icons mr-2">
                  <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                    title="Facebook"></a>
                  <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                  <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                    title="Linkedin"></a>
                  <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
                    title="Google +"></a>
                  <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                </div><!-- End .social-icons -->

                <a href="https://www.portotheme.com/html/porto_ecommerce/ajax/wishlist.html"
                  class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i class="icon-wishlist-2"></i><span>Add to
                    Wishlist</span></a>
              </div><!-- End .product single-share --> --}}
                        </div>
                    </div><!-- End .product-single-details -->

                    {{--  <button title="Close (Esc)" type="button" class="mfp-close">
            ×
          </button> --}}
                </div><!-- End .row -->
            </div>

            <div class="product-single-tabs mt-3">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content"
                            role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-video" data-toggle="tab" href="#product-video-content"
                            role="tab" aria-controls="product-video-content" aria-selected="true">Videos</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="product-tab-size" data-toggle="tab" href="#product-size-content"
                            role="tab" aria-controls="product-size-content" aria-selected="true">Size Guide</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content"
                            role="tab" aria-controls="product-tags-content" aria-selected="false">Additional
                            Information</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content"
                            role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (1)</a>
                    </li> --}}
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                        aria-labelledby="product-tab-desc">
                        <div class="product-desc-content">
                            <div class="bg-white box_shadow br_15 mt-3">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="product_description p-4">
                                            <h3>Description</h3>

                                            {!! $product->product_description !!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End .product-desc-content -->
                    </div>
                    <!-- End .tab-pane -->
                    <div class="tab-pane fade" id="product-video-content" role="tabpanel"
                        aria-labelledby="product-tab-video">
                        <div class="product-video-content">
                            <div class="row">
                                {{-- @for ($i = 0; $i < 4; $i++)
                                    <div class="col-lg-4">
                                        <div class="bg-white video-thumbnail box_shadow br_15 mt-3 p-3  cursor-pointer"
                                            id="vimeo"
                                            onclick="popupvideo('{{ 'https://www.youtube.com/watch?v=HQWPbXzUbfY' }}')">
                                            <img src="{{ asset('frontend/img/products/grid/product-1.jpg') }}"
                                                alt="">
                                            <span class="play_btn"><i class="fa-solid fa-play"></i></span>
                                        </div>
                                    </div>
                                @endfor --}}
                                <div class="col-lg-12">
                                    <div class="bg-white video-thumbnail box_shadow br_15 mt-3 p-3 position-relative  cursor-pointer"
                                        id="vimeo"
                                        onclick="popupvideo('{{ $product->product_custom_field1 }}')">
                                        <center><img src="{{ env('Base_Url') }}/uploads/cms/{{ $site_info->logo }}" alt="" class="min_height"></center>
                                        <span class="play_btn"><i class="fa-solid fa-play"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- End .row -->
                        </div>
                        <!-- End .product-size-content -->
                    </div>

                    <div class="tab-pane fade" id="product-size-content" role="tabpanel"
                        aria-labelledby="product-tab-size">
                        <div class="product-size-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="assets/images/products/single/body-shape.png" alt="body shape"
                                        width="217" height="398">
                                </div>
                                <!-- End .col-md-4 -->

                                <div class="col-md-8">
                                    <table class="table table-size">
                                        <thead>
                                            <tr>
                                                <th>SIZE</th>
                                                <th>CHEST(in.)</th>
                                                <th>WAIST(in.)</th>
                                                <th>HIPS(in.)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>XS</td>
                                                <td>34-36</td>
                                                <td>27-29</td>
                                                <td>34.5-36.5</td>
                                            </tr>
                                            <tr>
                                                <td>S</td>
                                                <td>36-38</td>
                                                <td>29-31</td>
                                                <td>36.5-38.5</td>
                                            </tr>
                                            <tr>
                                                <td>M</td>
                                                <td>38-40</td>
                                                <td>31-33</td>
                                                <td>38.5-40.5</td>
                                            </tr>
                                            <tr>
                                                <td>L</td>
                                                <td>40-42</td>
                                                <td>33-36</td>
                                                <td>40.5-43.5</td>
                                            </tr>
                                            <tr>
                                                <td>XL</td>
                                                <td>42-45</td>
                                                <td>36-40</td>
                                                <td>43.5-47.5</td>
                                            </tr>
                                            <tr>
                                                <td>XXL</td>
                                                <td>45-48</td>
                                                <td>40-44</td>
                                                <td>47.5-51.5</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End .row -->
                        </div>
                        <!-- End .product-size-content -->
                    </div>
                    <!-- End .tab-pane -->

                    <div class="tab-pane fade" id="product-tags-content" role="tabpanel"
                        aria-labelledby="product-tab-tags">
                        <table class="table table-striped mt-2">
                            <tbody>
                                <tr>
                                    <th>Weight</th>
                                    <td>23 kg</td>
                                </tr>

                                <tr>
                                    <th>Dimensions</th>
                                    <td>12 × 24 × 35 cm</td>
                                </tr>

                                <tr>
                                    <th>Color</th>
                                    <td>Black, Green, Indigo</td>
                                </tr>

                                <tr>
                                    <th>Size</th>
                                    <td>Large, Medium, Small</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- End .tab-pane -->

                    <div class="tab-pane fade" id="product-reviews-content" role="tabpanel"
                        aria-labelledby="product-tab-reviews">
                        <div class="product-reviews-content">
                            <h3 class="reviews-title">1 review for Men Black Sports Shoes</h3>

                            <div class="comment-list">
                                <div class="comments">
                                    <figure class="img-thumbnail">
                                        <img src="assets/images/blog/author.jpg" alt="author" width="80"
                                            height="80">
                                    </figure>

                                    <div class="comment-block">
                                        <div class="comment-header">
                                            <div class="comment-arrow"></div>

                                            <div class="ratings-container float-sm-right">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:60%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>

                                            <span class="comment-by">
                                                <strong>Joe Doe</strong> – April 12, 2018
                                            </span>
                                        </div>

                                        <div class="comment-content">
                                            <p>Excellent.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <div class="add-product-review">
                                <h3 class="review-title">Add a review</h3>

                                <form action="#" class="comment-form m-0">
                                    <div class="rating-form">
                                        <label for="rating">Your rating <span class="required">*</span></label>
                                        <span class="rating-stars">
                                            <a class="star-1" href="#">1</a>
                                            <a class="star-2" href="#">2</a>
                                            <a class="star-3" href="#">3</a>
                                            <a class="star-4" href="#">4</a>
                                            <a class="star-5" href="#">5</a>
                                        </span>

                                        <select name="rating" id="rating" required="" style="display: none;">
                                            <option value="">Rate…</option>
                                            <option value="5">Perfect</option>
                                            <option value="4">Good</option>
                                            <option value="3">Average</option>
                                            <option value="2">Not that bad</option>
                                            <option value="1">Very poor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Your review <span class="required">*</span></label>
                                        <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                    </div>
                                    <!-- End .form-group -->


                                    <div class="row">
                                        <div class="col-md-6 col-xl-12">
                                            <div class="form-group">
                                                <label>Name <span class="required">*</span></label>
                                                <input type="text" class="form-control form-control-sm" required>
                                            </div>
                                            <!-- End .form-group -->
                                        </div>

                                        <div class="col-md-6 col-xl-12">
                                            <div class="form-group">
                                                <label>Email <span class="required">*</span></label>
                                                <input type="text" class="form-control form-control-sm" required>
                                            </div>
                                            <!-- End .form-group -->
                                        </div>

                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="save-name" />
                                                <label class="custom-control-label mb-0" for="save-name">Save my
                                                    name, email, and website in this browser for the next time I
                                                    comment.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </form>
                            </div>
                            <!-- End .add-product-review -->
                        </div>
                        <!-- End .product-reviews-content -->
                    </div>
                    <!-- End .tab-pane -->
                </div>
                <!-- End .tab-content -->
            </div>
            <!-- End .product-single-tabs -->


        </div>
    </section>
@endsection
@push('script')
    <script>
        function popupvideo(url) {
            $.magnificPopup.open({
                items: {
                    src: url,
                    type: 'iframe'
                }
            });
        }

 function handleChangeColorVariation(variation_name,name,price,displayUrl) {
        var colorNameElement = $('.changeColorName');
        var priceChange = $('.priceChange');
        colorNameElement.text(name);
        priceChange.text('Taka '+price);
        $(".add-to-cart").data("price",price);
        $(".add-to-cart").data("image",price);
        $(".add-to-cart").data("size",name);
        $(".add-to-cart").data("type",name);
        $(".add-to-cart").data("variation",variation_name+" "+name);
        var get_url = displayUrl.split( '/' );
        var final_url = 'https://shinenbd.techdynobdltd.com/uploads/media/'+get_url[5]
        $(".add-to-cart").data("data-image",final_url);
         var imgChnage = $('.imgChnage');
        imgChnage.html(`
  <img style="border-radius: 10px;" alt="himelshop" class="img-responsive" src="${final_url}">
`);
        
    }

    
    </script>
@endpush
