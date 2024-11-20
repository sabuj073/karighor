@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="page-title text-center"
            style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #ffe9e6">
            <div class="contact_tag1 text-center text-bold">Our Concerns</div>
            <hr class="hr_for_all">
        </div>
    </section>
    <section class="page_sec_pad_50">
        <div class="container">

            {{-- <div class="row">
              @foreach ($concerns as $concern)
                <div class="col-xl-3 col-lg-3 col-md-3 mt-30">
                    <div class="xb-team text-center">
                        <div class="xb-item--inner" data-parallax='{"scale" : 1}'>
                            <div class="xb-item--img mt-4">
                                <img src="{{ $concern->icon }}" alt="{{ $concern->alt_text }}">
                            </div>
                            <div class="xb-item--holder">
                                <div class="concern_box_title pb_10">{{ $concern->title }}</div>

                                <div class="concern-btn  mb-3">
                                    <a href="{{ route('concern_details',$concern->slug) }}" class="btn btn-primary my-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div> --}}
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
                                        <div class="text-center mb-1 concern_icon">
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
    
    
                        </div>
                    @endif
                    @php
                        $count++;
                    @endphp
                @endforeach
    
            </div>
            <div class="mt-5 d-flex justify-content-center paginate_row">
                <div>
                    {{ $concerns->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
