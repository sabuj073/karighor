@foreach($products as $product)
<div class="product-card">
   <div class="product-default inner-quickview inner-icon">
      <figure>
         <a href="{{ route('product_details', $product->slug) }}">
         <img src="{{ asset($product->image_url) }}" width="217" height="217" alt="{{ $product->name }}">
         </a>
         <div class="label-group">
            {{-- 
            <div class="product-label label-hot">HOT</div>
            --}}
            @if($product->discount)
            <div class="product-label label-sale">- {{ $product->discount }} @if( $product->discount_type!="flat")% @else bdt @endif</div>
            @endif
         </div>
      </figure>
      <div class="product-details text-center">
         <h3 class="product-title">
            <a href="{{ route('product_details', $product->id) }}">{{ $product->name }}</a>
         </h3>
         {{--  
         <div class="ratings-container">
            <div class="product-ratings">
               <span class="ratings" style="width:80%"></span>
               <!-- End .ratings -->
               <span class="tooltiptext tooltip-top"></span>
            </div>
            <!-- End .product-ratings -->
         </div>
         --}}
         <!-- End .product-container -->
         <div class="price-box">
            @if($product->discount)
                @if($product->discount_type=="flat")
                    <span class="product-price">{{ number_format($product->unit_price - $product->discount) }} </span><del>{{ number_format($product->unit_price) }} BDT</del>
                @else
                    <span class="product-price">{{ number_format($product->unit_price - ($product->unit_price*$product->discount)/100) }} </span><del>{{ number_format($product->unit_price) }} BDT</del>
                @endif
            @else
                <span class="product-price">{{ number_format($product->unit_price) }} BDT</span>
            @endif
            
         </div>
         <div class="d-flex justify-content-between product_box_bottom_btn w-100">
            <a href="{{ route('quick_view', $product->slug) }}"
               class="btn-quickview cart_btn d-flex align-items-center"><i class="fa-solid fa-cart-shopping"></i></a>
            <div class="btn btn-primary rad_5 second_btn" onclick="ordernow({{ $product->id }})">Order Now</div>
         </div>
         <!-- End .price-box -->
      </div>
      <!-- End .product-details -->
   </div>
</div>
@endforeach