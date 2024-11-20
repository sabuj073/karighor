<!--Project Two Start-->
{{-- <section class="project-two">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="section-title__title">Products We Are Offering</h2>
            <div class="section-title__icon">
                <img src="{{ asset('frontend/img/icon/section-title-icon-1.png') }}" alt="">
            </div>
        </div>
        <div class="row">
            <!--Project Two Single Start-->
            @foreach ($products as $product)
                <div class="item col-lg-4">
                    <div class="project-two__single">
                        <div class="project-two__img">
                            <img src="{{ $product->thumbnail }}" alt="">
                            <div class="project-two__content">
                                <a href="{{ route('product_details', $product->slug) }}">
                                    <h3 class="project-two__title">{{ $product->name }}</h3>
                                    <span class="short_description">{{ $product->feature }}</span>
                                </a>

                                <div class="project-two__arrow">
                                    <a href="{{ route('product_details', $product->slug) }}">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!--Project Two Single End-->
        </div>
    </div>
</section> --}}
<!--Project Two End-->
<!--Services Two Start-->
<section class="services-two brand">
    <div class="container">
        <div class="section-title text-center">
            {{-- <span class="section-title__tagline">What</span> --}}
            <h2 class="section-title__title">{{ $product_sec_content->header }}</h2>
            {{-- <div class="section-title__icon">
                <img src="{{ asset('frontend/img/icon/section-title-icon-1.png') }}" alt="">
            </div> --}}
        </div>
        <div class="row justify-content-center">
            <!--Services Two Single Start-->
            @foreach ($products as $key=>$product)
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                    <div class="services-two__single">
                        <div class="services-two__img">
                            <img src="{{ $product->thumbnail }}" alt="">
                        </div>
                       
                        <div class="services-two__title-box">
                            <h3 class="services-two__title"><a href="{{ route('product_details',$product->slug) }}">{{ $product->name }}</a></h3>
                        </div>
                        <div class="services-two__hover-content">
                            <h3 class="services-two__hover-title"><a href="{{ route('product_details',$product->slug) }}">{{ $product->name }}</a>
                            </h3>
                            <a href="{{ route('product_details',$product->slug) }}">
                            <p class="services-two__hover-text">
                                {{ Str::limit($product->feature, 100, '...') }}
                            </p>
                            </a>
                            <div class="services-two__hover-more-details">
                                <a href="{{ route('product_details',$product->slug) }}">
                                    <i class="fa-solid fa-arrow-right"></i>More Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!--Services Two Single End-->
        </div>
    </div>
</section>
<!--Services Two End-->
