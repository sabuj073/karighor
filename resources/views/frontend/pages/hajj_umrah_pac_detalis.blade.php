@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->m_description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="page-title text-center"
            style="background: url('{{ @$package_details_data->brad_photo }}') no-repeat left center #ffe9e6; background-size:cover !important;padding:0">
            <div class="contact_tag1 contact_tag1_hajj text-center text-bold">{{ @$package_details_data->brad_title }}</div>
            <p class="text-white">{{ @$package_details_data->brad_subtitle }}</p>
        </div>
    </section>
    <section class="page_sec_pad_50 @if ($package_details_data->package->service->id == 3) hajj_content_block @endif">
        <div class="container">
            <div class="row justify-content-center">
                @if ($package_details_data->package->service->id == 3)
                    <div class="col-lg-4 col-md-12 position-relative">
                        <div class="hajj_arrow_img">
                            <img src="{{ asset('frontend/img/package/arrow_pack_det.png') }}" class="hajj_arrow_img_res"
                                alt="">

                        </div>
                        <div class="hajj_arrow_content">
                            <div class="mb-2">
                                {!! @$package_details_data->registration !!}
                            </div>
                            <div class="contact_row_lg">
                                <div class="row">
                                    @php
                                        $contact_number = explode(',', $package_details_data->phone);
                                    @endphp
                                    @foreach ($contact_number as $contact)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="service_phone_box">
                                                <div class="d-flex news_letter_box">
                                                    <div class="news_letter_icon">
                                                        <i class="fa-solid fa-phone"></i>
                                                    </div>
                                                    <div>
                                                        <div><a href="tel:+{{ $contact }}"
                                                                class="text-dark">+{{ $contact }}</a>
                                                        </div>
                                                        <div class="text-dark">Call us Now</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 contact_row_res">
                        <div class="row">
                            @php
                                $contact_number = explode(',', $package_details_data->phone);
                            @endphp
                            @foreach ($contact_number as $contact)
                                <div class="col-lg-6 col-md-6 mb_15_res">
                                    <div class="service_phone_box" style="background:#e6f4ec">
                                        <div class="d-flex news_letter_box">
                                            <div class="news_letter_icon">
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                            <div>
                                                <div><a href="tel:+{{ $contact }}"
                                                        class="text-dark">+{{ $contact }}</a>
                                                </div>
                                                <div class="text-dark">Call us Now</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif
                <div
                    class="@if ($package_details_data->package->service->id == 29) col-lg-12
                @else
                col-lg-8 @endif">
                    <div class="bg_soft_green br_5">
                        <h2 class="text-center pt-4">
                            <div class="hadding9 hadding9_res">
                                <span class="font-f-3 span" data-aos="fade-up" data-aos-duration="700">
                                    {{ $package_details_data->package->package_title }}
                                </span>
                                <div class="space16"></div>
                            </div>
                        </h2>
                        <div class="row justify-content-center mt-3">
                            <div class="col-lg-10 col-md-10">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="hajj_tag_block">
                                            <div class="hajj_duration">
                                                Duration:
                                            </div>
                                            <span>
                                                {{ $package_details_data->duration }}
                                            </span>
                                        </div>
                                        <div class="hajj_tag_block">
                                            <div class="hajj_duration">
                                                Package Type:
                                            </div>
                                            <span>
                                                {{ $package_details_data->package_type }}
                                            </span>
                                        </div>
                                        <div class="hajj_tag_block">
                                            <div class="hajj_duration">
                                                Airline:
                                            </div>
                                            <span>
                                                {{ $package_details_data->airline }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="hajj_tag_block">
                                            <div class="hajj_duration">
                                                Makkah:
                                            </div>
                                            <span>
                                                {{ $package_details_data->makkah }}
                                            </span>
                                        </div>
                                        <div class="hajj_tag_block">
                                            <div class="hajj_duration">
                                                Madinah:
                                            </div>
                                            <span>
                                                {{ $package_details_data->madinah }}
                                            </span>
                                        </div>
                                        <div class="hajj_tag_block position-relative">
                                            <div>
                                                <img src="{{ asset('frontend/img/package/Polygon 3.png') }}"
                                                    alt="">
                                                <img src="{{ asset('frontend/img/package/Polygon 2.png') }}"
                                                    class="haj_pac_det_img" alt="">
                                            </div>
                                            <span class="hajj_package_price">
                                                Price:BDT, <br>
                                                {{ $package_details_data->price }}tk
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="page_sec_pad_50">
        <div class="container">
            <div class="row">


                <div class="col-lg-2">
                    <ul class="nav nav-pills haj_umrah_nav_pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link active p-0 w-100" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">
                                <div class="bg_soft_green pad_10 mb-3 cur_point haj_nav_div">
                                    <img src="{{ asset('frontend/img/package/Package-includes.png') }}" alt="">
                                    <span>Package Includes</span>
                                </div>
                            </button>
                        </li>
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link p-0 w-100" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">
                                <div class="bg_soft_green pad_10 mb-3 cur_point haj_nav_div">
                                    <img src="{{ asset('frontend/img/package/Makkah 1.png') }}" alt="">
                                    <span class="fw-bold">Hotel in Makkah</span>
                                </div>
                            </button>
                        </li>
                        <li class="nav-item w-100" role="presentation">
                            <button class="nav-link p-0 w-100" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab"
                                aria-controls="pills-contact" aria-selected="false">
                                <div class="bg_soft_green pad_10 cur_point haj_nav_div">
                                    <img src="{{ asset('frontend/img/package/Madina 1.png') }}" alt="">
                                    <span class="fw-bold">Hotel in Madinah</span>
                                </div>
                            </button>
                        </li>
                    </ul>



                </div>
                <div class="col-lg-10">
                    <div class="tab-content" id="pills-tabContent">
                        @if ($package_details_data->package_include)
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="bg_soft_green p-4">
                                    <div class="row mt-3 pt-3 justify-content-center">
                                        <div class="col-lg-11">
                                            <div class="bg-white">
                                                <div class="up_flight_table flight_table_th">
                                                    {!! $package_details_data->package_include !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                        @if ($package_details_data->description)
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="bg_soft_green p-4">

                                    <div class="haj_hotel_content page_sec_pad_50">
                                        {!! $package_details_data->description !!}
                                    </div>
                                    @if ($package_details_data->h_makkah)
                                        @php
                                            $h_makkah_img = explode(';', $package_details_data->h_makkah);
                                        @endphp
                                        <div class="hajj_umrah_slider">
                                            @foreach ($h_makkah_img as $h_makkah)
                                                <div class="swiper-slide xb-swiper-slide mobile_margin margin_10">
                                                    <span>
                                                        <img src="{{ $h_makkah }}" class="w-100"
                                                            alt="partner image">
                                                    </span>
                                                </div>
                                            @endforeach

                                        </div>
                                    @endif
                                </div>

                            </div>
                        @endif
                        @if ($package_details_data->mad_description)
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <div class="bg_soft_green p-4">
                                    <div class="haj_hotel_content page_sec_pad_50">
                                        {!! $package_details_data->mad_description !!}
                                    </div>
                                    @if ($package_details_data->h_madinah)
                                        @php
                                            $h_madinah_img = explode(';', $package_details_data->h_madinah);
                                        @endphp
                                        <div class="hajj_umrah_slider">
                                            @foreach ($h_madinah_img as $h_madinah)
                                                <div class="swiper-slide xb-swiper-slide mobile_margin margin_10">
                                                    <span>
                                                        <img src="{{ $h_madinah }}" class="w-100"
                                                            alt="partner image">
                                                    </span>
                                                </div>
                                            @endforeach

                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </section>
    <section class="page_sec_pad_50 pad_top_0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center">
                        <div class="hadding9">
                            <span class="font-f-3 span" data-aos="fade-up" data-aos-duration="700">
                                Real Reviews by Real Customers
                            </span>
                            <div class="space16"></div>
                        </div>
                    </h2>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div>
                        <img src="{{ $package_details_data->c_review }}" class="customer_rev_img" alt="">
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="review_slider">
                            @foreach ($customerReview as $review)
                                @php

                                    $averageRating = $review->rating;
                                @endphp
                                <div>
                                    <div class="review_block">
                                        <span>{{ $review->title }}</span>
                                        <div class="d-flex">
                                            <span>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $averageRating)
                                                        <i class="fas fa-star" style="color: white;"></i>
                                                    @elseif ($i - 0.5 <= $averageRating)
                                                        <i class="fas fa-star-half-alt" style="color: white;"></i>
                                                    @else
                                                        <i class="far fa-star" style="color: #e6f4ec;"></i>
                                                    @endif
                                                @endfor
                                            </span>
                                            <span>
                                                ({{ $averageRating }})
                                                / 5
                                            </span>

                                        </div>
                                        <div>
                                            {!! $review->description !!}
                                        </div>
                                    </div>
                                    <div class="text-center fw-bold">
                                        {{ $review->name }}
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page_sec_pad_50 pad_top_0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb_15_res">
                    <h2 class="text-center">
                        <div class="hadding9">
                            <span class="font-f-3 span" data-aos="fade-up" data-aos-duration="700">
                                Looking for the Package detail?
                            </span>
                        </div>
                    </h2>
                    <div class="mt-3 mb-3">
                        Feel free to send us a message. You will get package details from us within a very short time! In
                        Sha Allah
                    </div>
                    <form action="">
                        @csrf
                        <div class="contact_us_form">
                            <div>
                                <h5 class="text-center mb-2 contact_us_fillup_text">Fill Up The Form</h5>
                                <hr class="fillup_form_hr">
                                <p class="text-center mt-2 mb-2">Whether You Have question about our services, want to book
                                    a consultation, or need visa application,</p>
                            </div>
                            <div class="form-group">
                                <label for="">Name:</label>
                                <input type="text" name="name" id="" class="form-control"
                                    placeholder="Enter Your Name">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Email:</label>
                                <input type="email" name="email" id="" class="form-control"
                                    placeholder="Enter Your Email">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Phone:</label>
                                <input type="text" name="phone" id="" class="form-control"
                                    placeholder="Enter Your Phone Number">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Message:</label>
                                <textarea name="message" id="" class="form-control" rows="5" placeholder="Enter Your Message"></textarea>
                            </div>
                            <button type="submit" class="theme-btn18 mt-3 w-100">Submit Now</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 br_5 ">
                    <div class="border_line p-2">
                        <h2 class="text-center pt-3">
                            <div class="hadding9">
                                <span class="font-f-3 span" data-aos="fade-up" data-aos-duration="700">
                                    Looking for another umrah package you also like
                                </span>
                            </div>
                        </h2>
                        <div class="row pad_top_30 justify-content-center">
                            @foreach ($related_package as $myPackage)
                                @php
                                    $ratings = $myPackage->ratings;
                                    $ratings = $ratings->where('approve', 1)->where('type', 'package');
                                    $totalRating = 0;
                                    $ratingsCount = count($ratings);

                                    foreach ($ratings as $rating) {
                                        $totalRating += $rating->rating;
                                    }

                                    $averageRating = $ratingsCount > 0 ? $totalRating / $ratingsCount : 0;
                                @endphp
                                <div class="col-lg-10 col-md-8 set_pos  pad_bot_30">
                                    <div class="bg_soft_green package_img">
                                        {{-- <div class="package_uper">
        
                                                <div class="text-dark"><i class="fa-solid fa-calendar-days"></i>
                                                    {{ \Carbon\Carbon::parse($myPackage->start_date)->format('M d') }}-
                                                    {{ \Carbon\Carbon::parse($myPackage->end_date)->format('M d') }}
                                                </div>
        
        
                                    </div> --}}
                                        <img src="{{ $myPackage->package_photo }}" class="package_img"
                                            alt="package-image">
                                        <div class="text-img">


                                            <div class="package_footer">
                                                <div class="d-flex justify-content-between mt-3">
                                                    <div>Starts From BDT
                                                        <div class="text1"> {{ $myPackage->package_price }}, {{ $myPackage->package_limitation }}</div>
                                                        
                                                    </div>
                                                    <span>
                                                        Valid Till:
                                                        <span class="package_validity">
                                                            {{ \Carbon\Carbon::parse($myPackage->end_date)->format('d M Y') }}</span>
                                                    </span>
                                                </div>

                                                <div class="text1 fw-bold mt-3 package_title">
                                                    {{ $myPackage->package_title }}
                                                </div>

                                                <div class="d-flex justify-content-between mt-3 pb-4">
                                                    <div class="d-block">
                                                        <div class="d-flex">
                                                            <span>
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $averageRating)
                                                                        <i class="fas fa-star"
                                                                            style="color: #DF9D34;"></i>
                                                                    @elseif ($i - 0.5 <= $averageRating)
                                                                        <i class="fas fa-star-half-alt"
                                                                            style="color: #DF9D34;"></i>
                                                                    @else
                                                                        <i class="far fa-star" style="color: gray;"></i>
                                                                    @endif
                                                                @endfor
                                                            </span>
                                                            <span>
                                                                ({{ $ratingsCount }})
                                                            </span>

                                                        </div>
                                                        @if ($myPackage->phone)
                                                            <a href="tel:{{ $myPackage->phone }}"
                                                                class="package_contact">
                                                                <i class="fa-solid fa-phone"></i> {{ $myPackage->phone }}
                                                            </a>
                                                        @endif
                                                    </div>
                                                    @if ($myPackage->service_id == 3 || $myPackage->service_id == 29)
                                                        <a href="{{ route('package_details_visa', $myPackage->package_slug) }}"
                                                            class="theme-btn18 pack_det_btn">Get Queries</a>
                                                    @else
                                                        <a href="{{ route('package-details', $myPackage->package_slug) }}"
                                                            class="theme-btn18 pack_det_btn">Get Queries</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page_sec_pad_50 pad_top_0">
        <div class="container">
            <div class="row bg_soft_green pt-4 pb-4">
                <div class="col-lg-6">
                    <h2 class="text-center">
                        <div class="hadding9">
                            <span class="font-f-3 span" data-aos="fade-up" data-aos-duration="700">
                                Our Affiliations (Flight)
                            </span>
                        </div>
                    </h2>
                    <div class="affiliation_slider">
                        @foreach ($affiliation_flight as $affiliation)
                            <div class="airline_block ">
                                <a href="">
                                    <img src="{{ $affiliation->photo }}" class="img-fluid" alt="afilliation-image">

                                    <div class="text-center text-white mt-2 affiliation_name">
                                        {{ $affiliation->name }}
                                    </div>
                                </a>

                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="text-center">
                        <div class="hadding9">
                            <span class="font-f-3 span" data-aos="fade-up" data-aos-duration="700">
                                Our Affiliations (Hotel)
                            </span>
                        </div>
                    </h2>
                    <div class="affiliation_slider">
                        @foreach ($affiliation_hotel as $h_affiliation)
                            <div class="airline_block ">
                                <a href="">
                                    <img src="{{ $h_affiliation->photo }}" class="img-fluid" alt="afilliation-image">

                                    <div class="text-center text-white mt-2 affiliation_name">
                                        {{ $h_affiliation->name }}
                                    </div>
                                </a>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        function hotelMakkah(pack_det_id) {
            console.log(pack_det_id);
        }
    </script>
@endpush
