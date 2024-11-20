@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="cat-section page_sec_pad_25 bg-gray">
        <div class="container">
            <h2 class="section-title ls-n-10 pb-3 m-b-4 text-center">Smart Watch</h2>
            <div class="row">
                @for ($i = 0; $i <= 5; $i++)
                    <div class="col-lg-2 col-sm-4 col-4">
                        <div class="product-category">
                            <a href="demo21-shop.html">
                                <div class="category-content">
                                    <img src="{{ asset('frontend/img/categories/image.png') }}" alt="">
                                    <h3>Fashion</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                @endfor

            </div>
        </div>
    </section>
    <section class="page_sec_pad_25 bg-gray pt_0_res">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 category_filter_option">
                    <div class="box_shadow p-3 bg-white rad_5">
                        <h4 class="text-center mb-1 border-bottom">Select Brand</h4>
                        @for ($i = 0; $i < 12; $i++)
                            <div class="brand-option">
                                <input type="radio" name="brand" id="apple" class="custom-radio">
                                <label for="apple">Apple</label>
                            </div>
                        @endfor
                    </div>
                    <div class="box_shadow p-3 bg-white rad_5 mt-3">
                        <h4 class="text-center mb-1 border-bottom">Availability</h4>

                        <div class="brand-option">
                            <input type="radio" name="availability" id="apple" class="custom-radio">
                            <label for="apple">In Stock</label>
                        </div>
                        <div class="brand-option">
                            <input type="radio" name="availability" id="apple" class="custom-radio">
                            <label for="apple">Out of Stock</label>
                        </div>

                    </div>
                    <div class="box_shadow p-3 bg-white rad_5 mt-3 price_range_box">
                        <h4 class="text-center mb-1 border-bottom">Price Range</h4>
                        <div id="priceRangeSlider" class="w-100 mt-2 priceRangeSlider"></div>
                        <div class="d-flex justify-content-between mt-2 gap_10">
                            <input type="text" class="w-50 rad_5 text-center minPrice" id="minPrice" readonly
                                value="100">

                            <!-- Maximum Price -->
                            <input type="text" class="w-50 rad_5 text-center maxPrice" id="maxPrice" readonly
                                value="1000">
                        </div>
                    </div>

                </div>

                <div class="category_off_canvas w-100">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-6">
                                <nav class="navbar navbar-light bg-light d-block text-center">
                                    <h3 class="mb-0">Filter</h3>
                                    <div id="catOffCanSidebarToggle" class=" rad_5 ml-3">
                                        <i class="fa-solid fa-list"></i>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-6">
                                <nav class="navbar navbar-light bg-light category_filter">
                                    <h4 class="mb-0">Sort By</h4>
                                    <select name="" id="" class="form-control rad_5">
                                        <option value="">Newest</option>
                                        <option value="">Oldest</option>
                                    </select>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- catOffCanSidebar -->
                <div id="catOffCanSidebar">
                    <!-- Close Button -->
                    <div class="p-3 d-flex justify-content-end align-items-center">
                        <button id="closecatOffCanSidebar" class="btn btn-light OffCanSidebarClose">
                            &times; <!-- Close icon -->
                        </button>
                    </div>
                    <div class="p-3">
                        <div class="box_shadow p-3 bg-white rad_5">
                            <h4 class="text-center mb-1 border-bottom">Select Brand</h4>
                            @for ($i = 0; $i < 12; $i++)
                                <div class="brand-option">
                                    <input type="radio" name="brand" id="apple" class="custom-radio">
                                    <label for="apple">Apple</label>
                                </div>
                            @endfor
                        </div>
                        <div class="box_shadow p-3 bg-white rad_5 mt-3">
                            <h4 class="text-center mb-1 border-bottom">Availability</h4>

                            <div class="brand-option">
                                <input type="radio" name="availability" id="apple" class="custom-radio">
                                <label for="apple">In Stock</label>
                            </div>
                            <div class="brand-option">
                                <input type="radio" name="availability" id="apple" class="custom-radio">
                                <label for="apple">Out of Stock</label>
                            </div>
                        </div>
                        <div class="box_shadow p-3 bg-white rad_5 mt-3 price_range_box">
                            <h4 class="text-center mb-1 border-bottom">Price Range</h4>
                            <div id="priceRangeSlider" class="w-100 mt-2 priceRangeSlider"></div>
                            <div class="d-flex justify-content-between mt-2 gap_10">
                                <input type="text" class="w-50 rad_5 text-center minPrice" id="minPrice" readonly
                                    value="100">

                                <!-- Maximum Price -->
                                <input type="text" class="w-50 rad_5 text-center maxPrice" id="maxPrice" readonly
                                    value="1000">
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Overlay -->
                <div class="overlay" id="overlay"></div>

                <div class="col-lg-9 mt_10_res">
                    <div class="row">
                        @for ($i = 0; $i < 12; $i++)
                            <div class="col-lg-3 mb-2 col-sm-6 col-6">
                                @include('frontend.partial.product_card')
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        #catOffCanSidebar {
            width: 250px;
            height: 100vh;
            background-color: #f8f9fa;
            position: fixed;
            top: 0;
            left: -250px;
            transition: left 0.3s ease;
            z-index: 1050;
        }

        #catOffCanSidebar.active {
            left: 0;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1040;
        }

        .overlay.active {
            display: block;
        }
    </style>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $(".priceRangeSlider").slider({
                range: true, // Enables dual-handle slider
                min: 100, // Minimum range value
                max: 1000, // Maximum range value
                values: [100, 1000], // Initial values for the handles
                slide: function(event, ui) {
                    // Update the minimum and maximum price input fields
                    $(".minPrice").val(ui.values[0]);
                    $(".maxPrice").val(ui.values[1]);
                }
            });

            // Set initial values for the input fields
            $(".minPrice").val($(".priceRangeSlider").slider("values", 0));
            $(".maxPrice").val($(".priceRangeSlider").slider("values", 1));
        });
    </script>

    <script>
        $(document).ready(function() {
            // Toggle catOffCanSidebar and overlay
            $('#catOffCanSidebarToggle').on('click', function() {
                $('#catOffCanSidebar').toggleClass('active');
                $('#overlay').toggleClass('active');
                $('#closecatOffCanSidebar').removeClass('d-none');
            });

            // Close catOffCanSidebar on overlay click
            $('#overlay').on('click', function() {
                $('#catOffCanSidebar').removeClass('active');
                $(this).removeClass('active');
            });

            // Close catOffCanSidebar on close button click
            $('#closecatOffCanSidebar').on('click', function() {
                $('#catOffCanSidebar').removeClass('active');
                $('#overlay').removeClass('active');
                $('#closecatOffCanSidebar').addClass('d-none');
            });
        });
    </script>
@endpush
