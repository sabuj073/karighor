<div class="about9 page_sec_pad_50">
    <div class="container">
        <div class="row scroll_margin" id="aboutus">
            <div class="col-lg-5">
                <div class="about9-images position-relative">
                    <div class="about9-img1 img5" data-aos="zoom-out" data-aos-duration="700">
                        <img src="{{ $about->photo }}" class="img-fluid" alt="about-image">
                    </div>
                    @if ($about->youtube_link)
                        <div class="video-play-box" data-aos="zoom-out" data-aos-duration="700">
                            <div class="about9-img2 img5">
                                <img src="{{ $about->youtube_thumb }}" alt="">
                            </div>
                            <div class="video-play-btn9">
                                <a id="play-video" class="video-play-button popup-youtube"
                                    href="{{ $about->youtube_link }}">
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hadding9 about9-hadding pt-mobile-30 concern_description">
                    <span class="span font-f-3" data-aos="fade-left" data-aos-duration="700">Know Us</span>
                    <div class="space16"></div>
                    <h1 class="font-f-3" data-aos="fade-left" data-aos-duration="900">{{ $about->title }}</h1>
                    <div class="space24"></div>
                    {!! $about->description !!}


                    @if ($about->important_note)
                        <div class="about9-after-pera" data-aos="fade-left" data-aos-duration="800">
                            <p class="font-f-7">“{{ $about->important_note }}”</p>
                        </div>
                    @endif
                    <div class="space30"></div>
                    {{-- <div class="d-flex justify-content-end">
                        <div class="" data-aos="fade-left mt-3" data-aos-duration="800" style="margin-top: 10px">
                            <a onclick="make__focus('aboutus')" href="{{ route('about_us') }}/#aboutus"
                                class="theme_btn">See Details</a>
                        </div>
                        
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')  

    <script>
        $('.concern_description').readmore({
            moreLink: '<a class="my-btn theme_btn" href="#">Read More</a>',
            collapsedHeight: 460,
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
