@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="page-title text-center"
            style=" background: url({{ $generalInfo->bradcrum_photo }}) no-repeat left center #ffe9e6; background-size:cover">
            <div class="contact_tag1 text-center text-bold">Mission & Vision</div>
            <hr class="hr_for_all">
        </div>
    </section>
 

    <section class="page_sec_pad_50 pad_top_0_res">
      
        <div class="" id="mission_section">
            <div class="container">
                <div class="row scroll_margin" id="mission">

                    <div class="col-lg-7">
                        <div class="hadding2 about2-hadding card_pad_l_r_20">
                            <div class="hadding9 concern_details_heading">
                                <span class="span font-f-3" data-aos="fade-up" data-aos-duration="700">
                                    {{ @$missionsection->header }}
                                </span>
                            </div>
                            <div class="space16"></div>
                            <h5 style="font-size: 20px">{{ @$missionsection->sub_header }}</h5>
                            <div class="space24"></div>
                            <div class="concern_description">
                                <p>{!! $mission->mission !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="hero2-all-images text-end">
                            <div class="hero2-img1">
                                <img src="{{ $mission->mission_photo }}" class="img-fluid" alt="mission-image">
                            </div>
                            {{-- <div class="hero2-img2 aniamtion-key-2">
                                <img src="{{ asset('frontend/img/shapes/hero2-img-element.svg') }}" alt="">
                            </div> --}}


                        </div>
                    </div>

                </div>
            </div>
            {{-- <img class="service2-shape1 aniamtion-key-2" src="assets/img/shapes/service2-shape2.svg" alt="">
            <img class="service2-shape2 aniamtion-key-2" src="assets/img/shapes/service2-shape1.svg" alt=""> --}}
        </div>
       
    </section>
@endsection
@push('script')
   

    <script>
        $('.concern_description').readmore({
            moreLink: '<a class="my-btn theme_btn" href="#">Read More</a>',
            collapsedHeight: 330,
            afterToggle: function(trigger, element, expanded) {
                if (!expanded) { // The "Close" link was clicked
                    $('html, body').animate({
                        scrollTop: element.offset().top
                    }, {
                        duration: 100
                    });
                }
            }
        });

        $('article').readmore({
            speed: 500
        });

        $('.popup-youtube').magnificPopup({
            type: 'iframe'
        });

       
    </script>
@endpush
