   <!-- testimonial start -->
   <section class="testimonial bg_img pt-130  pb-130 pb-mobile-40  pt-mobile-40" data-bg-color="#fcf5eb"
       data-background="{{ asset('frontend/img/bg/testimonial_bg.png') }}">
       <div class="container">
           <div class="row align-items-center">
               <div class="col-lg-3">
                   <div class="sec-title testimonial_title margin-none-md mb-30-xs mb-125">
                       <h2 class=" wow skewIn">{{ $testimonialsection->header }}<br>
                           <span> {{ $testimonialsection->sub_header }}</span>
                       </h2>
                       <p class="mt-3" style="color: #969696">{!! $testimonialsection->content !!}</p>
                   </div>
                   <div class="xb-testimonial__nav ul_li">
                       <div class="tm-nav-item tm-button-prev"> <i class="fa-solid fa-chevron-left testimonial_prev"></i></div>
                       <div class="tm-nav-item tm-button-next"><i class="fa-solid fa-chevron-right testimonial_next"></i></div>
                   </div>
               </div>
               <div class="col-lg-9">
                   <div class="xb-swiper-sliders">
                       <div class="xb-carousel-inner">
                           <div class="xb-testimonial-slider xb-swiper-container swiper-container">
                               <div class="swiper-wrapper">
                                   @foreach ($testimonials as $testimonial)
                                       <div class="swiper-slide xb-swiper-slide">
                                           <div class="xb-testimonial">
                                               <div class="xb-item--inner text-center">
                                                   <div class="xb-item--img">
                                                       <img src="{{ $testimonial->photo }}"
                                                           alt="{{ $testimonial->alt_text }}">
                                                   </div>
                                                   <div class="xb-item--content">
                                                       {!! Str::limit($testimonial->description, 200, '...') !!}
                                                   </div>

                                               </div>
                                           </div>
                                       </div>
                                   @endforeach
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- testimonial end -->
