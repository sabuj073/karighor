@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="page-title text-center"
            style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #ffe9e6">
            <div class="contact_tag1 text-center text-bold">Products We Are Offering</div>
            <hr class="hr_for_all">

        </div>
    </section>

    <section class="page_sec_pad_50">
        <div class="brand page_sec_pad_50 pad_bot_20">
            <div class="container">
                @if ($product_section->header)
                <h2 class="brand-title text-center mb-50">
                    <div class="hadding9">
                        <span class="font-f-3 span" data-aos="fade-up" data-aos-duration="700">
                            {{ @$product_section->header }}
                        </span>
                    </div>
                </h2>
                @endif
                <div class="mt-3">
                    <div class="row justify-content-center">
                        @if (count($all_products) > 0)
                            {{-- <div class="grid-container">
                            @foreach ($all_products as $product)
                                @php
                                    $features = explode(';', $product->feature);
                                @endphp
                                <div class="grid-item">
                                    <div class="swiper-slide xb-swiper-slide mobile_margin">
                                        <div class="product_block">
                                            <center>
                                                <img src="{{ @$product->thumbnail }}" alt="partner image">
                                            </center>
                                            <div class="fw-700">{{ Str::limit(@$product->name, 30, '...') }}</div>
                                            <div class="fw-600">{{ $features[0] }}</div>
                                            @foreach ($features as $key => $feature)
                                                 @if ($key != 0)
                                                 <div class="">{{ $feature }}</div>
                                                 @endif
                                             @endforeach
                                            <a href="{{ route('product_details', $product->slug) }}"
                                                class="theme-btn18 mt-2">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div> --}}
                            @foreach ($all_products as $product)
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
                        @else
                            <h2 class="text-center">No Product Available</h2>
                        @endif
                        @if (count($all_products) > 24)
                            <div class="mt-3 d-flex justify-content-center paginate_row">
                                <div>
                                    {{ $all_products->links() }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
