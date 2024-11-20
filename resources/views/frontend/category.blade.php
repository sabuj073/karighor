 <section class="cat-section page_sec_pad_25 bg-gray pt_0_res">
     <div class="container">
         <h2 class="section-title ls-n-10 pb-3 m-b-4 text-center">Top Categories</h2>
         <div class="row justify-content-center">
              @foreach ($categories as $category)
                 <div class="col-lg-2 col-sm-4 col-4 mb-2">
                     <div class="product-category">
                         <a href="{{ route('category_product', [$category->name]) }}">
                             <div class="category-content">
                                 <img src="{{ env('Base_Url') }}/uploads/cms/{{ $category->image }}" alt="{{ $category->name }}">
                                 <h3>{{ $category->name }}</h3>
                             </div>
                         </a>
                     </div>
                 </div>
             @endforeach
         </div>
         <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <a href="{{ route('categories') }}" class="btn btn-primary rad_5 mt-3 view_all_btn">View All</a>
            </div>
        </div>
     </div>
 </section>
