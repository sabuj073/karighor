<!--=====about mission start=======-->

<div class="service2 page_sec_pad_50 _relative">
    <div class="container">
        <h2 class="brand-title text-center mb-50">
            <div class="hadding9">
                <span class="font-f-3 span" data-aos="fade-up" data-aos-duration="700">
                    Achievment Of The Company
                </span>
                <div class="space16"></div>
            </div>
        </h2>
        <div class="row">

            <div class="col-lg-5">
                <div class="hero2-all-images text-end">
                    <div class="">
                        <img src="{{ $achievement->photo }}" alt="">
                    </div>    

                </div>
            </div>

            <div class="col-lg-7">
                <div class="hadding2 pt-mobile-30">
                    <div class="concern_description">
                        <p>{!! $achievement->description !!}</p>
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
@endpush
