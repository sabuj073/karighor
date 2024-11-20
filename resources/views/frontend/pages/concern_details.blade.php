@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="container-fluid" style="padding: 0 !important">
            <div class="row align-items-center">
                <div class="pages_slider">
                    @php
                        $sliders = explode(';', $concern->slider);
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

    <section class="page_sec_pad_50 page_sec_pad_50_bottom sec_back_color">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="hadding9 concern_details_heading">
                        <span class="font-f-3 span" data-aos="fade-up" data-aos-duration="700">Our Concern</span>
                        <div class="space16"></div>

                    </div>
                    <div class="space16"></div>
                    <img src="{{ $concern->photo }}" alt="">
                </div>
                <div class="col-md-8">
                    <div class="concern_details">
                        <h4 class="font-f-4">{{ $concern->title }}
                        </h4>
                        <div class="space12"></div>
                        <p class="font-f-4 "> 
                            <div class="concern_description">
                                {!! $concern->description !!} 
                            </div>                       
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $('.concern_description').readmore({
            moreLink: '<a class="read-more-btn readmore_pad" href="#">Read More</a>',
            collapsedHeight: 185,
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
