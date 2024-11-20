<!--=====service start=======-->
<div class="service9 page_sec_pad_50 section_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto text-center">
                <div class="hadding9">
                    <span class="span font-f-3" data-aos="fade-up" data-aos-duration="700">
                      {{ @$whatweoffersection->header }}
                    </span>
                    <div class="space16"></div>
                    <h1 class="font-f-3" data-aos="fade-up" data-aos-duration="900">
                      {{ @$whatweoffersection->sub_header }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-4">
                    <div class="service9-box text-center card_pad_l_r_20" data-aos="fade-up" data-aos-duration="700">
                        <div class="service9-img img5 img100">
                            <img src="{{ $service->thumbnail }}" alt="service-image">
                        </div>
                        <div class="serivce9-icon text-center service_name_block">
                            <h4><a href="{{ route('service_details', $service->slug) }}">
                              <img src="{{ $service->logo }}" width="20"
                                        alt="service-icon"> 
                                        <span>{{ $service->title }}</span> </a>
                                      </h4>
                        </div>
                        <div class="space16"></div>
                        <a href="{{ route('service_details', $service->slug) }}"
                            class="learn-more9 font-f-3 service_read_more">Read more <span><i
                                    class="fa-solid fa-arrow-right"></i></span></a>
                    </div>
                </div>
            @endforeach

            {{-- 
      <div class="col-lg-4 col-md-6">
        <div class="service9-box text-center" data-aos="fade-up" data-aos-duration="900">
          <div class="service9-img img5 img100">
            <img src="{{ asset('frontend/img/image/service9-img2.png') }}" alt="">
          </div>
          <div class="serivce9-icon text-center">
            <h4><a href="service-details.html"><img src="{{ asset('frontend/img/icons/service9-icon2.svg') }}"
                  alt=""> <span>Government Payment</span> </a></h4>
          </div>
          <div class="space16"></div>
          <a href="service-details.html" class="learn-more9 font-f-3">Read more <span><i
                class="fa-solid fa-arrow-right"></i></span></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service9-box text-center" data-aos="fade-up" data-aos-duration="1000">
          <div class="service9-img img5 img100">
            <img src="{{ asset('frontend/img/image/service9-img3.png') }}" alt="">
          </div>
          <div class="serivce9-icon text-center">
            <h4><a href="service-details.html"><img src="{{ asset('frontend/img/icons/service9-icon3.svg') }}"
                  alt=""> <span>Acquirer Solutions</span> </a></h4>
          </div>
          <div class="space16"></div>
          <a href="service-details.html" class="learn-more9 font-f-3">Read more <span><i
                class="fa-solid fa-arrow-right"></i></span></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service9-box text-center" data-aos="fade-up" data-aos-duration="700">
          <div class="service9-img img5 img100">
            <img src="{{ asset('frontend/img/image/service9-img4.png') }}" alt="">
          </div>
          <div class="serivce9-icon text-center">
            <h4><a href="service-details.html"><img src="{{ asset('frontend/img/icons/service9-icon4.svg') }}"
                  alt=""> <span>Market Insight</span> </a></h4>
          </div>
          <div class="space16"></div>
          <a href="service-details.html" class="learn-more9 font-f-3">Read more <span><i
                class="fa-solid fa-arrow-right"></i></span></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service9-box text-center" data-aos="fade-up" data-aos-duration="900">
          <div class="service9-img img5 img100">
            <img src="{{ asset('frontend/img/image/service9-img5.png') }}" alt="">
          </div>
          <div class="serivce9-icon text-center">
            <h4><a href="service-details.html"><img src="{{ asset('frontend/img/icons/service9-icon5.svg') }}"
                  alt=""> <span>Payment Strategy</span> </a></h4>
          </div>
          <div class="space16"></div>
          <a href="service-details.html" class="learn-more9 font-f-3">Read more <span><i
                class="fa-solid fa-arrow-right"></i></span></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service9-box text-center" data-aos="fade-up" data-aos-duration="700">
          <div class="service9-img img5 img100">
            <img src="{{ asset('frontend/img/image/service9-img6.png') }}" alt="">
          </div>
          <div class="serivce9-icon text-center">
            <h4><a href="service-details.html"><img src="{{ asset('frontend/img/icons/service9-icon6.svg') }}"
                  alt=""> <span>Risk Management</span> </a></h4>
          </div>
          <div class="space16"></div>
          <a href="service-details.html" class="learn-more9 font-f-3">Read more <span><i
                class="fa-solid fa-arrow-right"></i></span></a>
        </div>
      </div> --}}

        </div>
        <div class="space40"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center" data-aos="fade-up" data-aos-duration="900">
                    <a href="{{ route('all_service') }}" class="theme-btn18 font-f-7">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=====service end=======-->
