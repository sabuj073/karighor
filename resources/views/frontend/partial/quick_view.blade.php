<div class="product-single-container product-quick-view product-single-default mb-0 custom-scrollbar">
    <div class="row">
        <div class="col-md-6 product-single-gallery mb-md-0">
            <div class="product-slider-container  box_shadow br_15">

                <div class="product-single-carousel  owl-carousel owl-theme">
                    @for ($i = 0; $i < 5; $i++)
                        <div class="product-item">
                            <img class="product-single-image bg-white br_15"
                                src="{{ asset('frontend/img/products/grid/product-1.jpg') }}"
                                data-zoom-image="{{ asset('frontend/img/products/grid/product-1.jpg') }}" />
                        </div>
                    @endfor

                </div>
                <!-- End .product-single-carousel -->
            </div>
            <div class="prod-thumbnail owl-dots ">
                @for ($i = 0; $i < 5; $i++)
                    <div class="owl-dot box_shadow rad_5">
                        <img class="br_15 bg-white" src="{{ asset('frontend/img/products/grid/product-1.jpg') }}" />
                    </div>
                @endfor

            </div>
        </div>

        <div class="col-md-6">
            <form action="" id="addToCart" method="POST">
                @csrf
                <div class="product-single-details bg-white box_shadow p-4 br_15 mb-0 ml-md-4">
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
                        <span class="product-price">৳245.00</span>
                        <del class="old-price"><span>৳286.00</span></del>
                    </div>

                    <ul class="single-info-list">
                        <!---->
                        <li>
                            Product Code:
                            <strong>654613612</strong>
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
                                @foreach ($product->product_variations as $p_variations)
                                    @foreach ($p_variations->variations as $variation)
                                        <li class="active"><a href="javascript:;"
                                                class="d-flex align-items-center justify-content-center">{{ $variation->name }}</a>
                                        </li>
                                    @endforeach
                                @endforeach


                            </ul>
                        </div>

                        <div class="product-single-filter d-none">
                            <label></label>
                            <a class="font1 text-uppercase clear-btn" href="#">Clear</a>
                        </div>
                        <!---->
                    </div>

                    <div class="product-action">
                        <input type="hidden" name="product_id" id="" value="{{ $product->id }}">

                        <div class="product-single-qty d-flex gap_10">
                            <label>Quantity</label>
                            <input class="horizontal-quantity form-control" name="quantity" type="text" />
                        </div><!-- End .product-single-qty -->


                    </div><!-- End .product-action -->
                    <div class="d-flex mt-1">
                        <div class="btn btn-sm btn-primary rad_5 mr-2" title="Order Now" onclick="ordernow({{ $product->id }})">Order Now
                        </div>
                        <div class="btn btn-sm add-cart rad_5 mr-2" title="Add to Cart" onclick="addToCart()">Add to
                            Cart</div>

                        {{--   <a href="https://www.portotheme.com/html/porto_ecommerce/ajax/cart.html" class="btn btn-sm view-cart d-none">View
                    cart</a> --}}
                    </div>
                    <div class="btn btn-sm rad_5 bg_blue text-white mt-1 w-100 product_details_info_btn">For Direct Call
                        Click Here: <a href="tel:01254789654" class="text-white">01254789654</a>
                    </div>
                    <div class="btn btn-sm rad_5 bg_yellow text-dark mt-1 w-100 product_details_info_btn">Whatsapp
                        Message: <a href="tel:01254789654" class="text-dark">01254789654</a>
                    </div>
                    <div class="btn btn-sm rad_5 bg_default  mt-1 w-100 d-flex justify-content-between"
                        style="font-weight: 400">
                        Inside dhaka delivery charge <span class="">60tk</span>
                    </div>
                    <div class="btn btn-sm rad_5 bg_default  mt-1 w-100 d-flex justify-content-between"
                        style="font-weight: 400">
                        Near by dhaka delivery charge <span class="">100tk</span>
                    </div>
                    <div class="btn btn-sm rad_5 bg_default  mt-1 w-100 d-flex justify-content-between"
                        style="font-weight: 400">
                        Outside dhaka delivery charge <span class="">100tk</span>
                    </div>
                    <div class="mt-1">
                        In case of orders outside Dhaka, the delivery charge must be paid in advance.
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
            </form>
        </div><!-- End .product-single-details -->

        {{--  <button title="Close (Esc)" type="button" class="mfp-close">
            ×
          </button> --}}
    </div><!-- End .row -->
</div>
