 <header class="header box-shadow">
     <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
         <div class="container">
             <div class="header-left">
                 <button class="mobile-menu-toggler" type="button">
                     <i class="fas fa-bars"></i>
                 </button>
                 <a href="{{ route('index') }}" class="logo">
                     {{-- <img class="logo__img" src="{{ env('Base_Url') }}/uploads/cms/{{ $site_info->logo }}" alt="Porto Logo"> --}}
                    
                     <img class="logo__img" src="{{ env('Base_Url') }}/uploads/cms/{{ $site_info->logo }}" alt="Porto Logo" class="sticky-logo">
                 </a>

                 <div class="position-relative">
                     <span class="header_cat_bar rad_5 cursor-pointer"><i class="fa-solid fa-bars"></i></span>
                     <div id="categoryDropdown" class="category-list box_shadow bg-white rad_5">
                         <!-- Your categories as a list or links -->
                         <div class="category_section box_shadow pt-3 pb-3 rad_5 position-relative">
                             <div class="title border-bottom">
                                 <a href="">All Categories</a>
                             </div>
                             @foreach ($categories as $category)
                                 <div class="cat_list cursor-pointer position-relative">
                                     <a href="{{ route('category_product', [$category->name]) }}">{{ $category->name }}</a>
                                     <div class="subcategory_dropdown">
                                        @foreach($category->sub_categories as $key)

                                         <div class="subcategory_column">
                                          <a href="{{ route('category_product', [$key->name]) }}">{{ $key->name }}</a>
                                         </div>
                                        @endforeach
                                         <!-- Add more columns as needed -->
                                     </div>
                                 </div>
                             @endforeach
                         </div>
                     </div>
                 </div>


             </div>

             <div class="header-center">
                 <div class="header-search header-search-inline header-search-category w-lg-max text-right mt-0">
                     <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                     <form action="#" method="get">
                         <div class="header-search-wrapper">
                             <span class="search_icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                             <input type="search" class="form-control" name="q" id="q"
                                 placeholder="I'm searching for..." required>

                             <!-- End .select-custom -->
                             <button class="btn text-white" type="submit">Search</button>
                         </div>
                         <!-- End .header-search-wrapper -->
                     </form>
                 </div>
                 <!-- End .header-search -->
             </div>

             <div class="header-right ml-0 ml-lg-auto">

                 <a href="{{ route('user.wishlist') }}" class="header-icon wishlist_icon position-relative">
                     <i class="fa-solid fa-heart"></i>
                     {{-- <span class="cart-count badge-circle">3</span> --}}
                 </a>

                 <div class="dropdown cart-dropdown">
                     <a href="#" title="Cart" class="header-icon dropdown-toggle cart-toggle" role="button"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                         <i class="fa-solid fa-cart-shopping"></i>
                         <span class="displayCart badge-circle">3</span>
                     </a>

                     <div class="cart-overlay"></div>

                     <div class="dropdown-menu mobile-cart">
                         <a href="#" title="Close (Esc)" class="btn-close">×</a>

                         <div class="dropdownmenu-wrapper custom-scrollbar">
                             <div class="dropdown-cart-header">Shopping Cart</div>
                             <!-- End .dropdown-cart-header -->

                             <div class="dropdown-cart-products show-cart">
                                 
                                 <!-- End .product -->

                             </div>
                             <!-- End .cart-product -->

                             <div class="dropdown-cart-total">
                                 <span>SUBTOTAL:</span>

                                 <span class="cart-total-price float-right total-cart"></span>
                             </div>
                             <!-- End .dropdown-cart-total -->

                             <div class="dropdown-cart-action">
                                 {{-- <a href="cart.html" class="btn btn-gray btn-block view-cart">View
                                     Cart</a> --}}
                                 <a href="{{ route('cart') }}" class="btn btn-primary btn-block rad_5">Checkout</a>
                             </div>
                             <!-- End .dropdown-cart-total -->
                         </div>
                         <!-- End .dropdownmenu-wrapper -->
                     </div>
                     <!-- End .dropdown-menu -->
                 </div>
                 <!-- End .dropdown -->
                 <a href="{{ route('user.login') }}" class="d-flex align-items-center gap_5 position-relative">
                     <span class="header-icon"><i class="fa-solid fa-user"></i> </span>Sign In
                 </a>
             </div>
         </div>
     </div>

     {{-- <div class="header-bottom sticky-header" data-sticky-options="{'mobile': false}">
     <div class="container">
       <div class="header-left">
         <a href="demo21.html" class="logo">
           <img src="{{ asset('frontend/img/logo.png') }}" alt="Logo">
         </a>
       </div>
       <div class="header-center">
         <nav class="main-nav w-100">
           <ul class="menu">
             <li class="active">
               <a href="demo21.html">Home</a>
             </li>
             <li>
               <a href="demo21-shop.html">Categories <i class="fa-solid fa-angle-down"></i></a>
               <div class="megamenu megamenu-fixed-width megamenu-3cols">
                 <div class="row">
                   <div class="col-lg-4">
                     <a href="#" class="nolink">VARIATION 1</a>
                     <ul class="submenu">
                       <li><a href="category.html">Fullwidth Banner</a></li>
                       <li><a href="category-banner-boxed-slider.html">Boxed Slider
                           Banner</a>
                       </li>
                       <li><a href="category-banner-boxed-image.html">Boxed Image
                           Banner</a>
                       </li>
                       <li><a href="category.html">Left Sidebar</a></li>
                       <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                       <li><a href="category-off-canvas.html">Off Canvas Filter</a></li>
                       <li><a href="category-horizontal-filter1.html">Horizontal
                           Filter1</a>
                       </li>
                       <li><a href="category-horizontal-filter2.html">Horizontal
                           Filter2</a>
                       </li>
                     </ul>
                   </div>
                   <div class="col-lg-4">
                     <a href="#" class="nolink">VARIATION 2</a>
                     <ul class="submenu">
                       <li><a href="category-list.html">List Types</a></li>
                       <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll</a>
                       </li>
                       <li><a href="category.html">3 Columns Products</a></li>
                       <li><a href="category-4col.html">4 Columns Products</a></li>
                       <li><a href="category-5col.html">5 Columns Products</a></li>
                       <li><a href="category-6col.html">6 Columns Products</a></li>
                       <li><a href="category-7col.html">7 Columns Products</a></li>
                       <li><a href="category-8col.html">8 Columns Products</a></li>
                     </ul>
                   </div>
                   <div class="col-lg-4 p-0">
                     <div class="menu-banner">
                       <figure>
                         <img src="assets/images/menu-banner.jpg" alt="Menu banner" width="300" height="300">
                       </figure>
                       <div class="banner-content">
                         <h4>
                           <span class="">UP TO</span><br />
                           <b class="">50%</b>
                           <i>OFF</i>
                         </h4>
                         <a href="category.html" class="btn btn-sm btn-dark">SHOP NOW</a>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <!-- End .megamenu -->
             </li>
             <li>
               <a href="demo21-product.html">Products <i class="fa-solid fa-angle-down"></i></a>
               <div class="megamenu megamenu-fixed-width">
                 <div class="row">
                   <div class="col-lg-4">
                     <a href="#" class="nolink">PRODUCT PAGES</a>
                     <ul class="submenu">
                       <li><a href="demo21-product.html">SIMPLE PRODUCT</a></li>
                       <li><a href="product-variable.html">VARIABLE PRODUCT</a></li>
                       <li><a href="demo21-product.html">SALE PRODUCT</a></li>
                       <li><a href="demo21-product.html">FEATURED & ON SALE</a></li>
                       <li><a href="product-custom-tab.html">WITH CUSTOM TAB</a></li>
                       <li><a href="product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
                       <li><a href="product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
                       <li><a href="product-addcart-sticky.html">ADD CART STICKY</a></li>
                     </ul>
                   </div>
                   <!-- End .col-lg-4 -->

                   <div class="col-lg-4">
                     <a href="#" class="nolink">PRODUCT LAYOUTS</a>
                     <ul class="submenu">
                       <li><a href="product-extended-layout.html">EXTENDED LAYOUT</a></li>
                       <li><a href="product-grid-layout.html">GRID IMAGE</a></li>
                       <li><a href="product-full-width.html">FULL WIDTH LAYOUT</a></li>
                       <li><a href="product-sticky-info.html">STICKY INFO</a></li>
                       <li><a href="product-sticky-both.html">LEFT & RIGHT STICKY</a></li>
                       <li><a href="product-transparent-image.html">TRANSPARENT IMAGE</a>
                       </li>
                       <li><a href="product-center-vertical.html">CENTER VERTICAL</a></li>
                       <li><a href="#">BUILD YOUR OWN</a></li>
                     </ul>
                   </div>
                   <!-- End .col-lg-4 -->

                   <div class="col-lg-4 p-0">
                     <div class="menu-banner menu-banner-2">
                       <figure>
                         <img src="assets/images/menu-banner-1.jpg" alt="Menu banner" class="product-promo"
                           width="380" height="790">
                       </figure>
                       <i>OFF</i>
                       <div class="banner-content">
                         <h4>
                           <span class="">UP TO</span><br />
                           <b class="">50%</b>
                         </h4>
                       </div>
                       <a href="category.html" class="btn btn-sm btn-dark">SHOP NOW</a>
                     </div>
                   </div>
                   <!-- End .col-lg-4 -->
                 </div>
                 <!-- End .row -->
               </div>
               <!-- End .megamenu -->
             </li>
             <li>
               <a href="#">Pages <i class="fa-solid fa-angle-down"></i></a>
               <ul>
                 <li><a href="wishlist.html">Wishlist</a></li>
                 <li><a href="cart.html">Shopping Cart</a></li>
                 <li><a href="checkout.html">Checkout</a></li>
                 <li><a href="dashboard.html">Dashboard</a></li>
                 <li><a href="demo21-about.html">About Us</a></li>
                 <li><a href="#">Blog</a>
                   <ul>
                     <li><a href="blog.html">Blog</a></li>
                     <li><a href="single.html">Blog Post</a></li>
                   </ul>
                 </li>
                 <li><a href="demo21-contact.html">Contact Us</a></li>
                 <li><a href="login.html">Login</a></li>
                 <li><a href="forgot-password.html">Forgot Password</a></li>
               </ul>
             </li>
             <li><a href="blog.html">Blog</a></li>
             <li>
               <a href="#">Elements <i class="fa-solid fa-angle-down"></i></a>
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
             <li class="float-right"><a href="https://1.envato.market/DdLk5" target="_blank">Buy
                 Porto!<span class="tip tip-hot">Hot</span></a></li>
           </ul>
         </nav>
       </div>
       <div class="header-right pr-0">
         <div class="header-icon header-search header-search-popup header-search-category w-lg-max text-right">
           <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
           <form action="#" method="get">
             <div class="header-search-wrapper">
               <input type="search" class="form-control" name="q" id="q1"
                 placeholder="I'm searching for..." required>
               <div class="select-custom">
                 <select id="cat1" name="cat">
                   <option value="">All Categories</option>
                   <option value="4">Fashion</option>
                   <option value="12">- Women</option>
                   <option value="13">- Men</option>
                   <option value="66">- Jewellery</option>
                   <option value="67">- Kids Fashion</option>
                   <option value="5">Electronics</option>
                   <option value="21">- Smart TVs</option>
                   <option value="22">- Cameras</option>
                   <option value="63">- Games</option>
                   <option value="7">Home &amp; Garden</option>
                   <option value="11">Motors</option>
                   <option value="31">- Cars and Trucks</option>
                   <option value="32">- Motorcycles &amp; Powersports</option>
                   <option value="33">- Parts &amp; Accessories</option>
                   <option value="34">- Boats</option>
                   <option value="57">- Auto Tools &amp; Supplies</option>
                 </select>
               </div>
               <!-- End .select-custom -->
               <button class="btn icon-search-3 bg-dark text-white p-0" title="search" type="submit"></button>
             </div>
             <!-- End .header-search-wrapper -->
           </form>
         </div>
         <!-- End .header-search -->

         <a href="wishlist.html" class="header-icon">
           <i class="icon-wishlist-2"></i>
         </a>

         <div class="dropdown cart-dropdown">
           <a href="#" title="Cart" class="dropdown-toggle cart-toggle" role="button"
             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
             <i class="minicart-icon"></i>
             <span class="cart-count badge-circle">3</span>
           </a>

           <div class="cart-overlay"></div>

           <div class="dropdown-menu mobile-cart">
             <a href="#" title="Close (Esc)" class="btn-close">×</a>

             <div class="dropdownmenu-wrapper custom-scrollbar">
               <div class="dropdown-cart-header">Shopping Cart</div>
               <!-- End .dropdown-cart-header -->

               <div class="dropdown-cart-products">
                 <div class="product">
                   <div class="product-details">
                     <h4 class="product-title">
                       <a href="demo21-product.html">Ultimate 3D Bluetooth Speaker</a>
                     </h4>

                     <span class="cart-product-info">
                       <span class="cart-product-qty">1</span> × $99.00
                     </span>
                   </div>
                   <!-- End .product-details -->

                   <figure class="product-image-container">
                     <a href="demo21-product.html" class="product-image">
                       <img src="assets/images/products/product-1.jpg" alt="product" width="80" height="80">
                     </a>

                     <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                   </figure>
                 </div>
                 <!-- End .product -->

                 <div class="product">
                   <div class="product-details">
                     <h4 class="product-title">
                       <a href="demo21-product.html">Brown Women Casual HandBag</a>
                     </h4>

                     <span class="cart-product-info">
                       <span class="cart-product-qty">1</span> × $35.00
                     </span>
                   </div>
                   <!-- End .product-details -->

                   <figure class="product-image-container">
                     <a href="demo21-product.html" class="product-image">
                       <img src="assets/images/products/product-2.jpg" alt="product" width="80" height="80">
                     </a>

                     <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                   </figure>
                 </div>
                 <!-- End .product -->

                 <div class="product">
                   <div class="product-details">
                     <h4 class="product-title">
                       <a href="demo21-product.html">Circled Ultimate 3D Speaker</a>
                     </h4>

                     <span class="cart-product-info">
                       <span class="cart-product-qty">1</span> × $35.00
                     </span>
                   </div>
                   <!-- End .product-details -->

                   <figure class="product-image-container">
                     <a href="demo21-product.html" class="product-image">
                       <img src="assets/images/products/product-3.jpg" alt="product" width="80" height="80">
                     </a>
                     <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                   </figure>
                 </div>
                 <!-- End .product -->
               </div>
               <!-- End .cart-product -->

               <div class="dropdown-cart-total">
                 <span>SUBTOTAL:</span>

                 <span class="cart-total-price float-right">$134.00</span>
               </div>
               <!-- End .dropdown-cart-total -->

               <div class="dropdown-cart-action">
                 <a href="cart.html" class="btn btn-gray btn-block view-cart">View
                   Cart</a>
                 <a href="checkout.html" class="btn btn-dark btn-block">Checkout</a>
               </div>
               <!-- End .dropdown-cart-total -->
             </div>
             <!-- End .dropdownmenu-wrapper -->
           </div>
           <!-- End .dropdown-menu -->
         </div>
         <!-- End .dropdown -->
       </div>
     </div>
   </div> --}}
 </header>
 <!-- End .header -->
 <script>
     document.querySelector('.header_cat_bar').addEventListener('click', function() {
         var dropdown = document.getElementById('categoryDropdown');
         dropdown.style.display = dropdown.style.display === 'none' || dropdown.style.display === '' ? 'block' :
             'none';
     });
 </script>
