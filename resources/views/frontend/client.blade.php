 <!-- brand start -->
 @php
 $g_leaf = App\Models\Leaf::where('status','publish')->where('section_name','glance')->get();
     $bg_img = App\Models\Bradcrumb::first();
 @endphp
 <section class="brand page_sec_pad_50 pad_bot_40 brand_sec_pad_res position-relative" style="background-image: url('{{ $bg_img->blog_photo }}');">
     <div class="container">
         <h2 class="brand-title text-center mb-50">
             <div class="hadding9">
                 <span class="font-f-3 span" data-aos="fade-up" data-aos-duration="700">
                     Group at a Glance
                 </span>
             </div>
         </h2>
         <div class="xb-swiper-sliders brand-slider mt-3">
             <div class="xb-carousel-inner">
                 <div class="xb-swiper-container swiper-container">
                     <div class="brand_slider">
                         @foreach ($clients as $client)
                             <div class="swiper-slide xb-swiper-slide mobile_margin">
                                 <div class="client_block">
                                     <center>
                                         <img src="{{ $client->photo }}" alt="partner image">
                                     </center>
                                     <div class="client_counter">{{ $client->number }}+</div>
                                     <div class="client_counter">{{ $client->title }}</div>
                                 </div>
                             </div>
                         @endforeach

                     </div>
                 </div>
             </div>
         </div>
         <img class="cta1-shape1 aniamtion-key-2" src="{{ $g_leaf[0]->photo }}" width="100" alt="{{ $g_leaf[0]->alt_text }}">
  <img class="cta1-shape2 aniamtion-key-2" src="{{ $g_leaf[1]->photo }}" width="100" alt="{{ $g_leaf[1]->alt_text }}">
     </div>
 </section>
 <!-- brand end -->
