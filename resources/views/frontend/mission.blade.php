<!--=====about mission start=======-->

<div class="service2 _relative page_sec_pad_50">
    <div class="container">
        <div class="row">

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
                        <img src="{{ $mission->mission_photo }}" alt="">
                    </div>
                    <div class="hero2-img2 aniamtion-key-2">
                        <img src="{{ asset('frontend/img/shapes/hero2-img-element.svg') }}" alt="">
                    </div>

                   
                </div>
            </div>

        </div>
    </div>
    {{-- <img class="service2-shape1 aniamtion-key-2" src="assets/img/shapes/service2-shape2.svg" alt="">
    <img class="service2-shape2 aniamtion-key-2" src="assets/img/shapes/service2-shape1.svg" alt=""> --}}
</div>

<!--=====about mission end=======-->

    @push('script')
        <script>
            $('.concern_description').readmore({
                moreLink: '<a class="read-more-btn theme-btn18 mt-3 mission_read_more" href="#">Read More</a>',
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
        </script>
    @endpush
