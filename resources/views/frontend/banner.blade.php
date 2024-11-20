<section class="intro-section pad_bot_25">
   <div class="container">
      <div class="row">
         <div class="col-lg-2 mt-1 pr-0">
            <div class="category_section home_cat_res box_shadow pt-3 pb-3 rad_5 position-relative">
               <div class="title border-bottom">
                  <a href="">All Categories</a>
               </div>
               @foreach ($categories as $category)
               <div class="cat_list cursor-pointer position-relative">
                  @if ($category->parent_id == 0)
                  <a href="{{ route('category_product', [$category->name]) }}">{{ $category->name }}</a>
                  @endif
                  @foreach($category->sub_categories as $key)
                  <div class="subcategory_dropdown">
                     <div class="subcategory_column">
                        <h4><a href="{{ route('category_product', [$key->name]) }}">{{ $key->name }}</a></h4>
                     </div>
                  </div>
                  @endforeach
               </div>
               @endforeach
            </div>
            <div class="sub_menu_overlay"></div>
         </div>
         <div class="col-lg-10">
            <div class="aiz-carousel gutters-10 banner-slider" data-items="1" data-arrows='true' data-dots='true'
               data-infinite='true'>
               @php $banners = explode(",",$banner->homepagedata->feature_image) @endphp
               @foreach($banners as $row)
               <div class="item">
                  <img src="{{ env('Base_Url') }}/uploads/cms/{{ $row }}" alt="{{ $banner->homepagedata->title }}">
               </div>
               @endforeach
               <!-- End .home-slide -->
            </div>
         </div>
      </div>
   </div>
</section>