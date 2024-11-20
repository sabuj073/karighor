<!--=====explore start=======-->
<div class="visa-explore page_sec_pad_50 section_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 text-center m-auto">
                <div class="hadding9">
                    <span class="font-f-3 span" data-aos="fade-up" data-aos-duration="700">
                        {{ @$concernsection->header }}
                    </span>
                    <div class="space16"></div>
                    <h1 class="font-f-3" data-aos="fade-up" data-aos-duration="900">
                        {{ @$concernsection->sub_header }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            @php
                $count = 1;
            @endphp
            @foreach ($concerns as $index => $concern)
                @if ($count % 2 == 1)
                    <div class="col-lg-6 col-md-6">
                        <div class="card_pad_l_r_20" data-aos="fade-up" data-aos-duration="700">
                            <div class="explore-box explore-box9">
                                <span class="font-f-2">Concern 0{{ $index + 1 }}</span>
                                <div class="explore-box-hadding hadding1">
                                    <div class="text-center concern_icon">
                                        <img src="{{ $concern->icon }}"
                                            alt="{{ $concern->alt_text ?? $concern->title }}">

                                    </div>
                                    <div class="space16"></div>
                                    <p class="font-f-2 text-center">
                                        {!! Str::limit($concern->description, 130, '...') !!}
                                    </p>
                                    <div class="text-center set_this_btn_pad concern_btn">
                                        <a href="{{ $concern->url }}"
                                            class="theme-btn18 font-f-7" target="_blank">Read About Concern</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- <div class="" data-aos="fade-up" data-aos-duration="900">
                    <div class="explore-box explore-box9">
                        <span class="font-f-2">Concern 03</span>
                        <div class="explore-box-hadding hadding1">
                            <div class="text-center mb-1">
                                <img src="{{ asset('frontend/img/our_concern/concern (1).svg') }}" alt="">
                            </div>
                            <h3><a href="service-details.html" class="font-f-2">Biometrics and interviews</a></h3>
                            <div class="space16"></div>
                            <p class="font-f-2">In some cases, applicants may need to undergo biometric data
                                collection (fingerprinting) or attend an interview at the visa processing center.
                            </p>
                        </div>
                    </div>
                </div> --}}
                    </div>
                @else
                    <div class="col-lg-6 col-md-6">
                        <div class="space30"></div>
                        <div class="card_pad_l_r_20" data-aos="fade-up" data-aos-duration="700">
                            <div class="explore-box explore-box9">
                                <span class="font-f-2">Concern 0{{ $index + 1 }}</span>
                                <div class="explore-box-hadding hadding1">
                                    <div class="text-center mb-1">
                                        <img src="{{ $concern->icon }}"
                                            alt="{{ $concern->alt_text ?? $concern->title }}">
                                    </div>
                                    {{-- <h3><a href="service-details.html" class="font-f-2">Submission of application</a>
                                    </h3> --}}
                                    <div class="space16"></div>
                                    <p class="font-f-2 text-center">
                                        {!! Str::limit($concern->description, 130, '...') !!}
                                    </p>
                                    <div class="text-center set_this_btn_pad concern_btn">
                                        <a href="{{ $concern->url }}"
                                            class="theme-btn18 font-f-7" target="_blank">Read About Concern</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- 
                <div class="" data-aos="fade-up" data-aos-duration="1100">
                    <div class="explore-box explore-box9">
                        <span class="font-f-2">Concern 04</span>
                        <div class="explore-box-hadding hadding1">
                            <div class="text-center mb-1">
                                <img src="{{ asset('frontend/img/our_concern/concern (1).svg') }}" alt="">
                            </div>
                            <h3><a href="service-details.html" class="font-f-2">Decision and notification</a></h3>
                            <div class="space16"></div>
                            <p class="font-f-2">After processing the application, the visa issuing authority will
                                make a decision. If approved, the applicant will receive the visa in their passport,
                            </p>
                        </div>
                    </div>
                </div> --}}


                    </div>
                @endif
                @php
                    $count++;
                @endphp
            @endforeach

        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="text-center" data-aos="fade-up" data-aos-duration="900">
                    <a href="{{ route('all_concern') }}" class="theme-btn18 font-f-7">View All</a>
                </div>
            </div>
        </div>

    </div>
</div>

<!--=====explore end=======-->
