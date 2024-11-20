<!--=====choose start=======-->
@php
    $bg_img = App\Models\Bradcrumb::first();
@endphp
<div class="choose2 _relative page_sec_pad_50 page_sec_pad_50_bottom" style="background-image: url('{{ $bg_img->about_photo }}'); background-size:contain">

    <div class="container">
        <div class="row">
            <div class="col-lg-7 m-auto text-center">
                <div class="hadding9">
                    <span class="font-f-3 span " data-aos="fade-up"
                        data-aos-duration="700">{{ @$whychoosesection->header }}</span>
                    <div class="space16"></div>
                    <h1 class="font-f-3 text-white" data-aos="fade-up" data-aos-duration="900">
                        {{ @$whychoosesection->sub_header }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="space30 whychoose_space"></div>
        <div class="row align-items-center">
            @php
                $count = 0;
            @endphp

            <div class="col-lg-4 whychoose_block_res ">
                @foreach ($whychoose as $item)
                    @if ($count < 3)
                        @if ($count == 0)
                            <div class="card_pad_l_r_20" data-aos="fade-right" data-aos-duration="700">
                                <div class="choose2-box3 choose2-left">
                                    <div class="choose2-text-box3 choose2-text-box9">
                                        <h4 class="font-f-4">{{ $item->title }}
                                        </h4>
                                        <div class="space12"></div>
                                        <p class="font-f-4"> {!! \Illuminate\Support\Str::limit($item->description, 80) !!}</p>
                                    </div>
                                    <div class="choose2-icon-box3 choose2-icon-box9">
                                        <img src="{{ $item->icon }}" alt="why-choose-icon">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($count == 1)
                            <div class="card_pad_l_r_20" data-aos="fade-right" data-aos-duration="900">
                                <div class="choose2-box3 choose2-right">
                                    <div class="choose2-text-box3 choose2-text-box9">
                                        <h4 class="font-f-4">{{ $item->title }}
                                        </h4>
                                        <div class="space12"></div>
                                        <p class="font-f-3">{!! \Illuminate\Support\Str::limit($item->description, 80) !!}</p>
                                    </div>
                                    <div class="choose2-icon-box3 choose2-icon-box9">
                                        <img src="{{ $item->icon }}" alt="why-choose-icon">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($count == 2)
                            <div class="card_pad_l_r_20" data-aos="fade-right" data-aos-duration="1100">
                                <div class="choose2-box3 choose2-left">
                                    <div class="choose2-text-box3 choose2-text-box9">
                                        <h4 class="font-f-4">{{ $item->title }}
                                        </h4>
                                        <div class="space12"></div>
                                        <p class="font-f-3">{!! \Illuminate\Support\Str::limit($item->description, 80) !!}
                                        </p>
                                    </div>
                                    <div class="choose2-icon-box3 choose2-icon-box9">
                                        <img src="{{ $item->icon }}" alt="why-choose-icon">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    @php
                        $count++;
                    @endphp
                @endforeach
            </div>


            <div class="col-lg-4">
                <div class="choose2-main-image" data-aos="zoom-out" data-aos-duration="700">
                    <div class="choose2-image img50">
                        <img src=" {{ @$whychoosesection->photo }}" alt="why-choose-image">
                    </div>
                </div>
            </div>


            <div class="col-lg-4 whychoose_block_res mobile_pad_left">
                @php
                    $count = 0;
                @endphp
                @foreach ($whychoose as $item)
                    @if ($count >= 3 && $count < 6)
                        @if ($count == 3)
                            <div class="card_pad_l_r_20" data-aos="fade-left" data-aos-duration="700">
                                <div class="choose2-box4 choose2-box9 choose2-right">
                                    <div class="choose2-text-box4 choose2-text-box9">
                                        <h4 class="font-f-4 text-white">{{ $item->title }}
                                        </h4>
                                        <div class="space12"></div>
                                        <p class="font-f-3">{!! \Illuminate\Support\Str::limit($item->description, 80) !!}
                                        </p>
                                    </div>
                                    <div class="choose2-icon-box4 choose2-icon-box9">
                                        <img src="{{ $item->icon }}" alt="why-choose-icon">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($count == 4)
                            <div class="card_pad_l_r_20" data-aos="fade-left" data-aos-duration="700">
                                <div class="choose2-box4 choose2-box9 choose2-left">
                                    <div class="choose2-text-box4 choose2-text-box9">
                                        <h4 class="font-f-4 text-white">{{ $item->title }}
                                        </h4>
                                        <div class="space12"></div>
                                        <p class="font-f-3">{!! \Illuminate\Support\Str::limit($item->description, 80) !!}
                                        </p>
                                    </div>
                                    <div class="choose2-icon-box4 choose2-icon-box9">
                                        <img src="{{ $item->icon }}" alt="why-choose-icon">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($count == 5)
                            <div class="card_pad_l_r_20" data-aos="fade-left" data-aos-duration="700">
                                <div class="choose2-box4 choose2-box9 choose2-right">
                                    <div class="choose2-text-box4 choose2-text-box9">
                                        <h4 class="font-f-4 text-white">{{ $item->title }}
                                        </h4>
                                        <div class="space12"></div>
                                        <p class="font-f-3">{!! \Illuminate\Support\Str::limit($item->description, 80) !!}
                                        </p>
                                    </div>
                                    <div class="choose2-icon-box4 choose2-icon-box9">
                                        <img src="{{ $item->icon }}" alt="why-choose-icon">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    @php
                        $count++;
                    @endphp
                @endforeach

            </div>


        </div>

    </div>
    {{-- <img class="service2-shape1 aniamtion-key-2" src="{{ asset('frontend/img/shapes/choose9-shape2.svg') }}" alt="">
    <img class="service2-shape2 aniamtion-key-2" src="{{ asset('frontend/img/shapes/choose9-shape1.svg') }}" alt=""> --}}
</div>

<!--=====choose end=======-->
