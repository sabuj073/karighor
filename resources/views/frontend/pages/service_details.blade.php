@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="container-fluid" style="padding: 0 !important">
            <div class="row align-items-center">
                <div class="pages_slider">
                    @php
                        $sliders = explode(';', $service->slider);
                    @endphp
                    @foreach ($sliders as $slider)
                        <div>
                            <img src="{{ $slider }}" width="100%" alt="">


                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </section>

    <section class="page_sec_pad_50 @if ($service->photo) pad_top_30 @else pad_top_0 @endif bg_soft_green">
        <div class="cta1 _relative @if ($service->photo) mt_90 @endif"
            style="background-color: #00833E;padding:20px 0;">
            <div class="container">
                <div class="row justify-content-center">
                    @if ($service->photo)
                        <div class="col-lg-3">
                            <div class="serv_det_top_block_img">
                                <img src="{{ $service->photo }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-7">

                        <div
                            class="hadding1-w text-center @if ($service->photo) serv_det_top_block_content @endif">
                            <h1 class="font-f-3 newsletter_header" style="color: white !important">
                                {{ $service->title1 }}
                            </h1>
                            <div class="space16"></div>
                            <p class="font-f-3 serv_det_top_short_det">
                                {!! $service->content1 !!}
                            </p>
                            <div class="row mt-3">
                                @php
                                    $contact_info = json_decode($service->contact_info);
                                @endphp
                                @if ($contact_info)
                                    @foreach ($contact_info as $contac_no)
                                        <div class="col-lg-6 col-md-6 service_phone_box_res">
                                            <div class="service_phone_box">
                                                <div class="d-flex news_letter_box">
                                                    <div class="news_letter_icon">
                                                        <i class="fa-solid fa-phone"></i>
                                                    </div>
                                                    <div>
                                                        <div><a href="tel:+{{ $contac_no->phone }}"
                                                                class="text-dark">+{{ $contac_no->phone }}</a>
                                                        </div>
                                                        <div>{{ $contac_no->name }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif


                            </div>
                            <div class="row mt-3 justify-content-center">
                                <div class="col-lg-6">
                                    <button href="" class="theme-btn18">For Agentship</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <img class="cta1-shape1 aniamtion-key-2" src="{{ asset('frontend/img/icons/cta-shape1.svg') }}" alt="">
            <img class="cta1-shape2 aniamtion-key-2" src="{{ asset('frontend/img/icons/cta-shape2.svg') }}" alt="">
        </div>


        @if (count($domestic_flag) > 0 || count($international_flag) > 0)
            @if ($domestic_flag || $international_flag)
                <div class="container ">
                    <div class="airline_section mt-5">
                        <div class="row">
                            {{-- @php
                                $airline_photos = explode(';', $service->airline_photo);
                                $airline_names = explode(';', $service->airline_name);

                            $country_name = json_decode($service->airline_slug);

                            @endphp
                            --}}
                            <div class="col-lg-6">
                                @if ($domestic_flag != null)
                                    <div class="hadding9 text-center dom_air_heading">
                                        <span class="font-f-3 position-relative underline_" data-aos="fade-up"
                                            data-aos-duration="700">
                                            Domestic Air Ticket
                                        </span>
                                        <div class="space16"></div>
                                    </div>

                                    <div class="row">
                                        <div class="airline_slider">
                                            {{-- @php
                                                $ticket_info_json = json_decode($domestic_flag->ticket_info);
                                            @endphp --}}
                                            @foreach ($domestic_flag as $d_flag)
                                                <div class="airline_block ">
                                                    <a
                                                        href="{{ route('country-details', ['slug' => $service->slug, 'json_slug' => $d_flag->slug]) }}">
                                                        <img src="{{ $d_flag->thumbnail }}" class="img-fluid"
                                                            alt="">

                                                        <div class="text-center text-white mt-2">
                                                            {{ $d_flag->name }}
                                                        </div>
                                                    </a>

                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif


                                {{-- @foreach ($airline_photos as $index => $a_photo)
                                            <div class="airline_block ">
                                                <img src="{{ $a_photo }}" class="img-fluid" alt="">
                                                @if (isset($airline_names[$index]))
                                                    <div class="text-center text-white mt-2">{{ $airline_names[$index] }}
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach --}}
                                {{-- @else
                                <div class="airline_slider">
                                    @foreach ($airline_photos as $index => $a_photo)
                                        <div class="airline_block ">
                                            <img src="{{ $a_photo }}" class="img-fluid" alt="">
                                            @if (isset($airline_names[$index]))
                                                <div class="text-center text-white mt-2">{{ $airline_names[$index] }}</div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div> --}}
                            </div>
                            <hr class="air_dom_hr">
                            <div class="col-lg-6">
                                @if ($international_flag != null)
                                    <div class="hadding9 text-center dom_air_heading">
                                        <span class="font-f-3 position-relative underline_" data-aos="fade-up"
                                            data-aos-duration="700">
                                            Iternational Air Ticket
                                        </span>
                                        <div class="space16"></div>
                                    </div>
                                    <div class="airline_slider">

                                        {{-- @php
                                        $ticket_info_json = json_decode($international_flag->ticket_info);
                                    @endphp --}}
                                        @foreach ($international_flag as $int_flag)
                                            <div class="airline_block ">
                                                <a
                                                    href="{{ route('country-details', ['slug' => $service->slug, 'json_slug' => $int_flag->slug]) }}">
                                                    <img src="{{ $int_flag->thumbnail }}" class="img-fluid" alt="">

                                                    <div class="text-center text-white mt-2">{{ $int_flag->name }}
                                                    </div>
                                                </a>

                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                {{-- <div class="row">

                                @if (count($flags) > 0)
                                @foreach ($flags as $flag)
                                    <div class="col-lg-6">
                                        <a href="">
                                            <a href=""><img src="{{ $flag->photo }}" class="img-fluid"
                                                    alt=""></a>
                                        </a>

                                        <div class="text-center text-white mt-2">{{ $flag->name }}</div>
                                    </div>
                                @endforeach
                                @else
                                <div class="airline_slider">
                                    @foreach ($airline_photos as $index => $a_photo)
                                        <div class="airline_block">
                                            <img src="{{ $a_photo }}" class="img-fluid" alt="">
                                            @if (isset($airline_names[$index]))
                                                <div class="text-center text-white mt-2">{{ $airline_names[$index] }}</div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                @endif
                                </div> --}}
                            </div>
                        </div>
                    </div>
            @endif
            </div>

        @endif
    </section>

    {{-- @php
        $flags = \App\Models\Flag::where('service_id', 20)->get();
     
    @endphp --}}
    @if (count($flags) > 0)
        <div class="visa_processing">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-9">
                        <div class="hadding9 text-center">
                            <span class="span font-f-3" data-aos="fade-up" data-aos-duration="700">
                                Our Affiliation panel
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-3 affiliation_search_res">
                        <div class="text-right d-flex">
                            <input type="text" name="" id="search_flag"
                                class="form-control year_search_input bg_soft_green" placeholder="Search Here..."
                                id="" onkeyup="searchFlag({{ $service->id }})">
                            <span class="year_search_icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                    </div>
                </div>
                <div class="loader_spinner d-none">
                    <center>
                        <div class="lds-spinner">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </center>
                </div>
                <div class="row mt-4">
                    <div class="flag_slider search_flag_value">
                        @foreach ($flags as $flag)
                            <div class="card set_box_shadow" style="width: 18rem;">
                                <img class="card-img-top flag_img" src="{{ $flag->thumbnail }}" alt="flag-image">
                                <div>
                                    <h6 class="card-title text-center">{{ $flag->name }}</h6>
                                </div>
                                <div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('country-details', ['slug' => $service->slug, 'json_slug' => $flag->slug]) }}"
                                        class="theme-btn18 font-f-7 mb-4">Details</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif



    @if ($service->s_banner)
        <section class="page_sec_pad_50">
            <div class="">
                <div class="row">
                    <div>
                        <img src="{{ $service->s_banner }}" class="w-100 single_banner" alt="">
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($service->banner)
        <section class="page_sec_pad_50">
            <div class="container">
                @php
                    $banners = explode(';', $service->banner);
                @endphp
                <div class="row">
                    <div class="service_banner_slider">
                        @foreach ($banners as $banner)
                            <div class="mul_banner_res">
                                <div>
                                    <img src="{{ $banner }}" class="w-100 multi_banner" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Packages --}}
    @if (count($packages) > 0)
        <section
            class="page_sec_pad_50 pad_bot_0 bg_soft_green package_section_color @if ($service->banner == null) pad_top_0 @endif">

            <div class="container">
                <div class="row text-center package_head_row">
                    <h3>{{ $packageSecContent->header }}</h3>
                    <div class="title_description">
                        {{ $packageSecContent->sub_header }}
                    </div>
                </div>

                <div class="row pad_top_30">
                    @foreach ($packages as $myPackage)
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
                        <div class="col-md-4 set_pos  pad_bot_30">
                            <div class="bg-white package_img">
                                {{-- <div class="package_uper">

                                        <div class="text-dark"><i class="fa-solid fa-calendar-days"></i>
                                            {{ \Carbon\Carbon::parse($myPackage->start_date)->format('M d') }}-
                                            {{ \Carbon\Carbon::parse($myPackage->end_date)->format('M d') }}
                                        </div>


                            </div> --}}
                                <img src="{{ $myPackage->package_photo }}" class="package_img" alt="package-image">
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
                                                                <i class="fas fa-star" style="color: #DF9D34;"></i>
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
                                                    <a href="tel:{{ $myPackage->phone }}" class="package_contact">
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
                <div class="d-flex package_view_all_btn_res">
                    <a href="{{ route('all_packages') }}" class="theme-btn18 m-auto">View All</a>
                </div>
            </div>
        </section>
    @endif
    @if (count($hotel_bookings) > 0)
        <section class="page_sec_pad_50 pad_bot_0 bg_soft_green package_section_color">

            <div class="container">
                <div class="row text-center package_head_row">
                    <h3>{{ @$hotelSecContent->header }}</h3>
                    <div class="title_description">
                        {{ @$hotelSecContent->sub_header }}
                    </div>
                </div>

                <div class="row pad_top_30">
                    @foreach ($hotel_bookings as $hotel_booking)
                        @php
                            $ratings = $hotel_booking->ratings;
                            $ratings = $ratings->where('approve', 1)->where('type', 'hotel');
                            $totalRating = 0;
                            $ratingsCount = count($ratings);

                            foreach ($ratings as $rating) {
                                $totalRating += $rating->rating;
                            }

                            $averageRating = $ratingsCount > 0 ? $totalRating / $ratingsCount : 0;
                        @endphp
                        <div class="col-md-4 set_pos  pad_bot_30">
                            <div class="bg-white package_img">
                                {{-- <div class="package_uper">

                                        <div class="text-dark"><i class="fa-solid fa-calendar-days"></i>
                                            {{ \Carbon\Carbon::parse($myPackage->start_date)->format('M d') }}-
                                            {{ \Carbon\Carbon::parse($myPackage->end_date)->format('M d') }}
                                        </div>


                            </div> --}}
                                <img src="{{ $hotel_booking->photo }}" class="package_img" alt="package-image">
                                <div class="text-img">


                                    <div class="package_footer">
                                        {{-- <div class="d-flex justify-content-between mt-3">
                                            <div>
                                                <div class="text1">Starts From BDT {{ $myPackage->package_price }}</div>
                                                <div class="text1">{{ $myPackage->package_limitation }}</div>
                                            </div>
                                            <span class="package_validity">Valid Till:
                                                {{ \Carbon\Carbon::parse($myPackage->end_date)->format('d M Y') }}</span>
                                        </div> --}}

                                        <div class="text1 fw-bold mt-3 package_title">
                                            {{ $hotel_booking->title }}
                                        </div>

                                        <div class="d-flex justify-content-between mt-3 pb-4">
                                            <div class="d-block">
                                                <div class="d-flex">
                                                    <span>
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $averageRating)
                                                                <i class="fas fa-star" style="color: #DF9D34;"></i>
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
                                                @if ($hotel_booking->phone)
                                                    <a href="tel:{{ $hotel_booking->phone }}" class="package_contact">
                                                        <i class="fa-solid fa-phone"></i> {{ $hotel_booking->phone }}
                                                    </a>
                                                @endif
                                            </div>
                                            <a href="{{ route('hotel_details', $hotel_booking->slug) }}"
                                                class="theme-btn18 pack_det_btn">Get Queries</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="d-flex package_view_all_btn_res">
                    <a href="{{ route('all_hotels') }}" class="theme-btn18 m-auto">View All</a>
                </div>



            </div>
        </section>
    @endif
    @if ($service->p_banner)
        <section class="page_sec_pad_50 pad_bot_0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ $service->link_url }}">
                            <img src="{{ $service->p_banner }}" class="w-100 single_banner" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- Packages --}}
    @if ($service->title2 || $service->content2 || $service->photo1)
        <section class="page_sec_pad_50" @if (count($packages) < 1 && count($hotel_bookings) < 1) style="padding-top: 0" @endif>
            <div class="container">
                <div class="air_ticket_section bg_soft_green">
                    <div class="row justify-content-end">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12 air_ticket_section_img">
                            <div class="air_ticket_section_img_div">
                                <img src="{{ $service->photo1 }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-12 p-4 pad_top_res_0">
                            <div class="hadding9 text-center">
                                <span class="span font-f-3" data-aos="fade-up" data-aos-duration="700">
                                    {{ $service->title2 }}
                                </span>
                                <div class="space16"></div>
                            </div>
                            <div class="mt-2 air_ticket_section_content">
                                {!! $service->content2 !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($service->title3)
        <section class="page_sec_pad_50 pad_top_50 bg_soft_green">
            <div class="container">
                <div class="row">
                    {{-- @php
                        $jsonData = $service->reservation;
                    @endphp
                    @if ($jsonData)
                        @foreach ($jsonData as $servicesData)
                            @foreach ($servicesData['photo'] as $index => $photo)
                                <div class="col-lg-6">
                                    <div class="reservation_border"></div>
                                    <div class="reservation_block mt-3">
                                        <div class="row">
                                            <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                                <div class="text-end">
                                                    <img src="{{ $photo }}" class="img-fluid" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-10">
                                                <div>
                                                    {{ $servicesData['description'][$index] }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endif --}}
                    <div class="col-lg-8">
                        <div class="hadding9 serv_det_heading">
                            <span class="span font-f-3" data-aos="fade-up" data-aos-duration="700">
                                {{ $service->title3 }}
                            </span>
                            <div class="space16"></div>
                        </div>
                        <div>
                            {!! $service->content5 !!}
                        </div>
                        @php
                            $service_reservation = json_decode($service->reservation);
                        @endphp
                        @foreach ($service_reservation as $key => $s_reservation)
                            <div class="mt-2">
                                <span style="color: #F5911E">{{ $key + 1 }}.{{ $s_reservation->name }}:</span>
                                {{ $s_reservation->description }}
                            </div>
                        @endforeach

                    </div>
                    <div class="col-lg-4">
                        <div>
                            <img src="{{ $service->photo2 }}" alt="">
                        </div>
                    </div>


                </div>
            </div>
        </section>
    @endif
    @if ($service->title4 || $service->content3)
        <section class="mt-5">
            <div class="container">
                <div class="">
                    <div class="hadding9 serv_det_heading">
                        <span class="span font-f-3" data-aos="fade-up" data-aos-duration="700">
                            {{ $service->title4 }}
                        </span>
                        <div class="space16"></div>
                    </div>
                    <div class="row mt-3 page_sec_pad_50 bg_soft_green">
                        <div class="col-lg-8 col-md-8">
                            {{-- <div>
                            <img src="{{ $service->photo1 ?? '' }}" class="" width="100%" alt="">
                        </div> --}}
                            <div class="we_are_friendly_content">
                                {!! $service->content3 !!}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 service_details_tags_div">

                            <div class="service_details_tags">
                                @php
                                    $myTags = explode(';', $service->section_tags);
                                @endphp
                                @foreach ($myTags as $tags)
                                    <div class="d-flex mb-3">
                                        <div class="mr-2">
                                            <img src="{{ asset('frontend/img/service/Ellipse 6.png') }}" alt="">
                                        </div>
                                        {{ strip_tags($tags) }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($service->title5 || $service->content4)
        <section class="page_sec_pad_50 bg_soft_green mt-5">
            <div class="container">
                <div class="row">
                    <div class="hadding9 text-center">
                        <span class="span font-f-3" data-aos="fade-up" data-aos-duration="700">
                            {{ $service->title5 }}
                        </span>
                        <div class="space16"></div>
                    </div>
                    <div class="mt-3">{!! $service->content4 !!}</div>
                </div>
            </div>
        </section>
    @endif

    @if ($service->title6 && $service->hajj_content)
        <section class="page_sec_pad_50 bg_soft_green mt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="hadding9 text-center">
                        <span class="span font-f-3" data-aos="fade-up" data-aos-duration="700">
                            {{ $service->title6 }}
                        </span>
                        <div class="space16"></div>
                    </div>
                    <div class="col-lg-9">
                        <div class="mt-3 hajj_content">{!! $service->hajj_content !!}</div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
@push('script')
    <script>
        function searchFlag(service_id) {
            var search_value = $('#search_flag').val();
            $(".loader_spinner").removeClass('d-none');
            $(".lds-spinner").fadeIn(300);
            var url = "{{ route('search_flag') }}";
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    search_value: search_value,
                    service_id: service_id,
                    _token: '{{ csrf_token() }}',
                },
                success: (data) => {
                    $('.search_flag_value').html(data);
                    $(".loader_spinner").addClass('d-none');


                    $(".flag_slider").slick({
                        dots: false,
                        arrows: true,
                        infinite: true,
                        autoplay: true,
                        autoplaySpeed: 3000,
                        slidesToShow: 6,
                        slidesToScroll: 6,
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 6,
                                    slidesToScroll: 6,
                                    autoplay: true,
                                    autoplaySpeed: 3000,
                                    infinite: true,
                                },
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                },
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2,
                                },
                            },
                        ],
                    });

                },
                complete: function() {
                    // Hide loading spinner after the Ajax call is complete
                    $(".lds-spinner").fadeOut(300);
                }
            });
        }
    </script>
@endpush
