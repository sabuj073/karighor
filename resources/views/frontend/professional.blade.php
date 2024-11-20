<!--=====countries start=======-->
@php
  $n_leaf = App\Models\Leaf::where('status','publish')->where('section_name','newsletter')->get();
  $bg_img = App\Models\Bradcrumb::first();
@endphp
<div class="countries8 page_sec_pad_50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="hadding9 text-center">
                    <span class="span font-f-3" data-aos="fade-up" data-aos-duration="700"> 
                        Products We are Offering
                    </span>
                    {{-- <div class="space16"></div>
                    <h1 class="font-f-3" data-aos="fade-up" data-aos-duration="800">
                        {{ @$testimonialsection->sub_header }}
                    </h1> --}}
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($products as $testimonial)
                <div class="col-lg-4 col-md-4">
                    <div class="countries8-box text-center" data-aos="fade-up" data-aos-duration="900">
                        <div class="countries8-box-img img100">
                            <img src="{{ $testimonial->thumbnail }}" alt="">
                        </div>
                        {{-- <a href="service.html" class="theme-btn18 font-f-7 professional_btn">{!! \Illuminate\Support\Str::limit($testimonial->description, 45) !!}</a> --}}
                        <div class="theme-btn18 font-f-7 professional_btn">{!! \Illuminate\Support\Str::limit($testimonial->name, 45) !!}</div>

                        <div class="hadding8-w countries8-box-hadding countries9-box-hadding">
                            <p class="font-f-3">{{ Str::limit($testimonial->feature, 250, '...') }}</p>
                            <a href="{{ route('product_details',$testimonial->slug) }}" class="theme-btn18 mt-3">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('all_product') }}" class="theme-btn18 mt-1 mb-1 text-center">View All</a>
            </div>

        </div>
    </div>
</div>

<!--=====countries end=======-->
