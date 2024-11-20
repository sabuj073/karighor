<!DOCTYPE html>
<html lang="en">
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Title -->
      <title>{{ $title ?? 'Webkarigor' }} {{ '-' . config('app.name') }}</title>
      <meta name="description" content="{{ $description ?? 'Webkarigor' }}">
      <!-- HTML Meta Tags -->
      <!-- Google / Search Engine Tags -->
      <meta itemprop="name" content="{{ $title ?? 'Webkarigor' }}">
      <meta itemprop="description" content="{{ $description ?? 'Webkarigor' }}">
      <meta itemprop="image" content="{{ $metaData->m_photo ?? 'Webkarigor' }}" alt="meta photo">
      <!-- Facebook Meta Tags -->
      <meta property="og:type" content="website">
      <meta property="og:title" content="{{ $title ?? 'Webkarigor' }}">
      <meta property="og:description" content="{{ $description ?? 'Webkarigor' }}">
      <meta property="og:image" content="{{ $metaData->m_photo ?? 'Webkarigor' }}" alt="meta photo">
      <!-- Twitter Meta Tags -->
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content=" {{ $title ?? 'Webkarigor' }}">
      <meta name="twitter:description" content="{{ $description ?? 'Webkarigor' }}">
      <meta name="twitter:image" content="{{ $metaData->m_photo ?? 'Webkarigor' }}" alt="meta photo">
      <link rel="shortcut icon" href="{{ $generalInfo->logo }}" type="images/x-icon" />
      {{-- <script>
         WebFontConfig = {
             google: {
                 families: ['Open+Sans:300,400,600,700,800', 'Poppins:200,300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800']
             }
         };
         (function(d) {
             var wf = d.createElement('script'),
                 s = d.scripts[0];
             wf.src = '{{ asset('frontend/js/webfont.js') }}';
             wf.async = true;
             s.parentNode.insertBefore(wf, s);
         })(document);
      </script> --}}
      <!-- Plugins CSS File -->
      <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
      <!-- Main CSS File -->
      <link rel="stylesheet" href="{{ asset('frontend/css/demo21.min.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/css/jquery.magnific-popup.css') }}">
      {{-- 
      <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/all.min.css') }}">
      --}}
      <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/simple-line-icons.min.css') }}">
      <link rel="stylesheet" href="{{ asset('backend/css/all.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('default/css/simple-lightbox.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('default/css/slick.css') }}" />
      <link rel="stylesheet" href="{{ asset('default/css/slick-theme.css') }}" />
      <link rel="stylesheet" href="{{ asset('default/css/styleim.css') }}" />
      <link rel="stylesheet" href="{{ asset('frontend/css/styleim.css') }}" />
      <link rel="stylesheet" href="{{ asset('frontend/css/responsiveim.css') }}" />
      <link rel="stylesheet" href="{{ asset('backend/css/toastr.min.css') }}" />
   </head>
   <body>
      <div class="page-wrapper">
         @include('layouts.frontend.header')
         <main class="main">
            @yield('content')
         </main>
         <!-- End .main -->
         @include('layouts.frontend.footer')
      </div>
      <!-- End .page-wrapper -->
      <div class="loading-overlay">
         <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
         </div>
      </div>
      <div class="mobile-menu-overlay"></div>
      <!-- End .mobil-menu-overlay -->
      <div class="mobile-menu-container">
         <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
               <ul class="mobile-menu">
                  <li><a href="demo21.html">Home</a></li>
                  <li>
                     <a href="demo21-shop.html">Categories</a>
                     <ul>
                        <li><a href="category.html">Full Width Banner</a></li>
                        <li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
                        <li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
                        <li><a href="https://www.portotheme.com/html/porto_ecommerce/category-sidebar-left.html">Left
                           Sidebar</a>
                        </li>
                        <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                        <li><a href="category-off-canvas.html">Off Canvas Filter</a></li>
                        <li><a href="category-horizontal-filter1.html">Horizontal Filter 1</a></li>
                        <li><a href="category-horizontal-filter2.html">Horizontal Filter 2</a></li>
                        <li><a href="#">List Types</a></li>
                        <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll<span
                           class="tip tip-new">New</span></a></li>
                        <li><a href="category.html">3 Columns Products</a></li>
                        <li><a href="category-4col.html">4 Columns Products</a></li>
                        <li><a href="category-5col.html">5 Columns Products</a></li>
                        <li><a href="category-6col.html">6 Columns Products</a></li>
                        <li><a href="category-7col.html">7 Columns Products</a></li>
                        <li><a href="category-8col.html">8 Columns Products</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="demo21-product.html">Products</a>
                     <ul>
                        <li>
                           <a href="#" class="nolink">PRODUCT PAGES</a>
                           <ul>
                              <li><a href="demo21-product.html">SIMPLE PRODUCT</a></li>
                              <li><a href="product-variable.html">VARIABLE PRODUCT</a></li>
                              <li><a href="demo21-product.html">SALE PRODUCT</a></li>
                              <li><a href="demo21-product.html">FEATURED & ON SALE</a></li>
                              <li><a href="product-sticky-info.html">WIDTH CUSTOM TAB</a></li>
                              <li><a href="product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
                              <li><a href="product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
                              <li><a href="product-addcart-sticky.html">ADD CART STICKY</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#" class="nolink">PRODUCT LAYOUTS</a>
                           <ul>
                              <li><a href="product-extended-layout.html">EXTENDED LAYOUT</a></li>
                              <li><a href="product-grid-layout.html">GRID IMAGE</a></li>
                              <li><a href="product-full-width.html">FULL WIDTH LAYOUT</a></li>
                              <li><a href="product-sticky-info.html">STICKY INFO</a></li>
                              <li><a href="product-sticky-both.html">LEFT & RIGHT STICKY</a></li>
                              <li><a href="product-transparent-image.html">TRANSPARENT IMAGE</a></li>
                              <li><a href="product-center-vertical.html">CENTER VERTICAL</a></li>
                              <li><a href="#">BUILD YOUR OWN</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li>
                     <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                     <ul>
                        <li>
                           <a href="wishlist.html">Wishlist</a>
                        </li>
                        <li>
                           <a href="cart.html">Shopping Cart</a>
                        </li>
                        <li>
                           <a href="checkout.html">Checkout</a>
                        </li>
                        <li>
                           <a href="dashboard.html">Dashboard</a>
                        </li>
                        <li>
                           <a href="login.html">Login</a>
                        </li>
                        <li>
                           <a href="forgot-password.html">Forgot Password</a>
                        </li>
                     </ul>
                  </li>
                  <li><a href="blog.html">Blog</a></li>
                  <li>
                     <a href="#">Elements</a>
                     <ul class="custom-scrollbar">
                        <li><a href="element-accordions.html">Accordion</a></li>
                        <li><a href="element-alerts.html">Alerts</a></li>
                        <li><a href="element-animations.html">Animations</a></li>
                        <li><a href="element-banners.html">Banners</a></li>
                        <li><a href="element-buttons.html">Buttons</a></li>
                        <li><a href="element-call-to-action.html">Call to Action</a></li>
                        <li><a href="element-countdown.html">Count Down</a></li>
                        <li><a href="element-counters.html">Counters</a></li>
                        <li><a href="element-headings.html">Headings</a></li>
                        <li><a href="element-icons.html">Icons</a></li>
                        <li><a href="element-info-box.html">Info box</a></li>
                        <li><a href="element-posts.html">Posts</a></li>
                        <li><a href="element-products.html">Products</a></li>
                        <li><a href="element-product-categories.html">Product Categories</a></li>
                        <li><a href="element-tabs.html">Tabs</a></li>
                        <li><a href="element-testimonial.html">Testimonials</a></li>
                     </ul>
                  </li>
               </ul>
               <ul class="mobile-menu mt-2 mb-2">
                  <li class="border-0">
                     <a href="#">
                     Special Offer!
                     </a>
                  </li>
                  <li class="border-0">
                     <a href="https://1.envato.market/DdLk5" target="_blank">
                     Buy Porto!
                     <span class="tip tip-hot">Hot</span>
                     </a>
                  </li>
               </ul>
               <ul class="mobile-menu">
                  <li><a href="login.html">My Account</a></li>
                  <li><a href="demo21-contact.html">Contact Us</a></li>
                  <li><a href="blog.html">Blog</a></li>
                  <li><a href="wishlist.html">My Wishlist</a></li>
                  <li><a href="cart.html">Cart</a></li>
                  <li><a href="login.html" class="login-link">Log In</a></li>
               </ul>
            </nav>
            <!-- End .mobile-nav -->
            <form class="search-wrapper mb-2" action="#">
               <input type="text" class="form-control mb-0" placeholder="Search..." required />
               <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form>
            <div class="social-icons">
               <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
               </a>
               <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
               </a>
               <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
               </a>
            </div>
         </div>
         <!-- End .mobile-menu-wrapper -->
      </div>
      <!-- End .mobile-menu-container -->
      <div class="sticky-navbar fixed">
         <div class="sticky-info">
            <a href="{{ route('index') }}">
            <i class="fa-solid fa-house"></i>Home
            </a>
         </div>
         <div class="sticky-info">
            <a href="{{ route('categories') }}" class="">
            <i class="fa-solid fa-list"></i>Categories
            </a>
         </div>
         <div class="sticky-info">
            <a href="{{ route('user.wishlist') }}" class="">
            <i class="fa-solid fa-heart"></i>Wishlist
            </a>
         </div>
         <div class="sticky-info">
            <a href="{{ route('cart') }}" class="">
               <div class="position-relative">
                  <i class="fa-solid fa-cart-shopping"></i>
                  <span class="cart-count bottom_cart_count badge-circle">3</span>
               </div>
               Cart
            </a>
         </div>
         {{-- @auth
         <span class="" id="dashboardOffCanSidebarToggle">
         <i class="fa-solid fa-user"></i>Account
         </span> 
         <!-- dashboardOffCanSidebar -->
         <div id="dashboardOffCanSidebar">
            <!-- Close Button -->
            <div class="p-3 d-flex justify-content-end align-items-center">
               <button id="closedashboardOffCanSidebar" class="btn btn-light">
                  &times; <!-- Close icon -->
               </button>
            </div>
            <div class="p-3">
               <div class="box_shadow p-3 bg-white rad_5">
                  <h5 class="text-center mb-0 border-bottom">Select Brand</h5>
                  @for ($i = 0; $i < 12; $i++)
                  <div class="brand-option">
                     <input type="radio" name="brand" id="apple" class="custom-radio">
                     <label for="apple">Apple</label>
                  </div>
                  @endfor
               </div>
               <div class="box_shadow p-3 bg-white rad_5 mt-3">
                  <h5 class="text-center mb-0 border-bottom">Availability</h5>
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
                  <h5 class="text-center mb-0 border-bottom">Price Range</h5>
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
         <div class="overlay" id="overlay_dashboard"></div>
         @else
         <a href="{{ route('user.login') }}" class="">
         <i class="fa-solid fa-user"></i>Account
         </a>
         @endauth --}}
         <div class="sticky-info">
            <a href="javscript:void(0)" class="" id="dashboardOffCanSidebarToggle">
            <i class="fa-solid fa-user"></i>Account
            </a>
         </div>
      </div>
      <div id="dashboardOffCanSidebar">
         <!-- Close Button -->
         <div class="p-3 d-flex justify-content-end align-items-center">
            <button id="closedashboardOffCanSidebar" class="btn btn-light d-none OffCanSidebarClose">
               &times; <!-- Close icon -->
            </button>
         </div>
         <div class="p-3">
            <div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">
               <div class="box_shadow bg-white rad_5">
                  <div class="user_info_box p-2">
                     <img src="{{ asset('backend/images/default_profile.png') }}" class="m-auto" alt="">
                     <h2 class="text-uppercase text-center mt-2 text-white">Md Imran Hossain</h2>
                  </div>
                  <ul class="nav nav-tabs list flex-column mb-0 p-4" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('user.dashboard')) active @endif"
                           href="{{ route('user.dashboard') }}">Dashboard</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('user.orders')) active @endif"
                           href="{{ route('user.orders') }}">Orders</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link  @if (request()->routeIs('user.wishlist')) active @endif"
                           href="{{ route('user.wishlist') }}">Wishlist</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link  @if (request()->routeIs('user.profile')) active @endif"
                           href="{{ route('user.profile') }}">Manage Profile</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Logout</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- Overlay -->
      <div class="overlay_dashboard" id="overlay_dashboard"></div>
      <style>
         #dashboardOffCanSidebar {
         width: 250px;
         height: 100vh;
         background-color: #f8f9fa;
         position: fixed;
         top: 0;
         left: -250px;
         transition: left 0.3s ease;
         z-index: 1050;
         }
         #dashboardOffCanSidebar.active {
         left: 0;
         }
         .overlay_dashboard {
         display: none;
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0, 0, 0, 0.5);
         z-index: 1040;
         }
         .overlay_dashboard.active {
         display: block;
         }
      </style>
      {{-- 
      <div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background: #f1f1f1 no-repeat center/cover url(assets/images/newsletter_popup_bg.jpg)">
         <div class="newsletter-popup-content">
            <img src="assets/images/logo-black.png" alt="Logo" class="logo-newsletter" width="111" height="44">
            <h2>Subscribe to newsletter</h2>
            <p>
               Subscribe to the Porto mailing list to receive updates on new arrivals, special offers and our promotions.
            </p>
            <form action="#">
               <div class="input-group">
                  <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Your email address" required />
                  <input type="submit" class="btn btn-primary" value="Submit" />
               </div>
            </form>
            <div class="newsletter-subscribe">
               <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                  <label for="show-again" class="custom-control-label">
                  Don't show this popup again
                  </label>
               </div>
            </div>
         </div>
         <!-- End .newsletter-popup-content -->
         <button title="Close (Esc)" type="button" class="mfp-close">
         ×
         </button>
      </div>
      --}}
      <!-- End .newsletter-popup -->
      <a id="scroll-top" href="#top" title="Top" role="button"><i class="fa-solid fa-arrow-up"></i></a>
      <!-- Plugins JS File -->
      {{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
      <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
      <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
      <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('frontend/js/plugins.min.js') }}"></script>
      <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
      <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
      <script src="{{ asset('frontend/js/jquery.appear.min.js') }}"></script>
      <script src="{{ asset('frontend/js/plugins.min.js') }}"></script>
      <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
      <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
      <script src="{{ asset('default/js/simple-lightbox.jquery.min.js') }}"></script>
      <script src="{{ asset('default/js/simple-lightbox.legacy.min.js') }}"></script>
      <script src="{{ asset('default/js/slick.min.js') }}"></script>
      <script src="{{ asset('default/js/script.js') }}"></script>
      <script src="{{ asset('default/js/readmore.min.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
      <script src="{{ asset('backend/js/toastr.min.js') }}"></script>
      <!-- Main JS File -->
      <script src="{{ asset('frontend/js/main.min.js') }}"></script>
      <script src="{{ asset('frontend/js/script.js') }}"></script>
      <script src="{{ asset('frontend/js/cart.js') }}?v=10"></script>
      <script>
         var gallery = $('.gallery a').simpleLightbox({
             sourceAttr: 'href',
         
             nav: true,
             overlay: true,
             close: true,
             closeText: 'X',
             swipeClose: true,
             showCounter: true,
             fileExt: 'png|jpg|jpeg|gif|webp',
         
         
         })
      </script>
      <script>
         $(document).ready(function() {
             // Toggle dashboardOffCanSidebar and overlay
             $('#dashboardOffCanSidebarToggle').on('click', function() {
                 $('#dashboardOffCanSidebar').toggleClass('active');
                 $('#overlay_dashboard').toggleClass('active');
                 $('#closedashboardOffCanSidebar').removeClass('d-none');
             });
         
             // Close dashboardOffCanSidebar on overlay click
             $('#overlay_dashboard').on('click', function() {
                 $('#dashboardOffCanSidebar').removeClass('active');
                 $(this).removeClass('active');
             });
         
             // Close dashboardOffCanSidebar on close button click
             $('#closedashboardOffCanSidebar').on('click', function() {
                 $('#dashboardOffCanSidebar').removeClass('active');
                 $('#overlay_dashboard').removeClass('active');
                 $('#closedashboardOffCanSidebar').addClass('d-none');
             });
         });
         
         function ordernow(product_id) {
             $.ajax({
                 url: "{{ route('carts.store') }}",
                 type: "POST",
                 data: {
                     product_id: product_id,
                     action: 'order_now',
                     _token: "{{ csrf_token() }}",
                 },
                 success: function(response) {
                     toastr.success("Cart Added!");
                     window.location.href = '{{ route('cart') }}';
         
                 },
                 error: function(response) {
                     toastr.error("Something Went Wrong!");
                 },
             });
         }
         
         function addToCart() {
             let formData = $('#addToCart')[0];
             formData = new FormData(formData);
             $.ajax({
                 url: "{{ route('carts.store') }}",
                 type: "POST",
                 data: formData,
                 processData: false,
                 contentType: false,
                 headers: {
                     "X-CSRF-TOKEN": "{{ csrf_token() }}",
                 },
                 success: function(response) {
                     toastr.success("Cart Added!");
                 },
                 error: function(response) {
                     toastr.error("Something Went Wrong!");
                 },
             });
         }
      </script>
      @stack('script')
      @if(request()->is('/') || request()->is('home'))
      <script>
         let page = 1;
         let complete = 0;
         let loading = false; // Prevent multiple requests
         
         function loadProducts() {
             if(complete){
                return 1;
             }
             if (loading) return; // Skip if already loading
             loading = true;
             $(".last__loading").html('Loading More Products...');
             $.ajax({
                 url: "{{ route('getproducts_ajax') }}",
                 type: "GET",
                 data: { page: page },
                 success: function (response) {
                    if(response==""){
                        complete = 1;
                        $(".last__loading").html('');
                    }else{
                        $('.product-container').append(response);
                        page++; 
                        loading = false;
                        $(".last__loading").html('');
                    }
                     
                 },
                 error: function (xhr, status, error) {
                     console.error('Failed to load products:', error);
                     loading = false;
                 }
             });
         }
         
         
         $(window).scroll(function () {
             if ($(window).scrollTop() + $(window).height() >= $(document).height() - 400) {
                 loadProducts();
             }
         });
         
         loadProducts();
      </script>
      @endif
      {!! Toastr::message() !!}
   </body>
</html>