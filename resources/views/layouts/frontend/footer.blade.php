<div class="whatsapp-icon">
        <a href="https://wa.me/{{ $contact_info->mobile }}" target="_blank">
            <i class="fa-brands fa-whatsapp"></i>
        </a>

    </div>
<!--Site Footer Start-->
<footer>
    <div class="footer">
        @include('frontend.feature_box')
        
        <div class="container">
            <div class="footer-middle">
                <div class="row">
                    <div class="col-lg-3 mb-1">
                        <a href="{{ route('index') }}">
                            <img src="{{ env('Base_Url') }}/uploads/cms/{{ $site_info->logo }}" alt="{{ $site_info->footer_data->title }}">
                        </a>

                        <div>
                            {!! $site_info->footer_data->content !!}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget">
                            <h4 class="widget-title">Contact Us</h4>
                            
                            <ul class="links">
                                <li><a href="mailtp:{{ $contact_info->email }}"><i class="fa-solid fa-envelope"></i>
                                    {{ $contact_info->email }}</a></li>
                                <li><a href="tel:{{ $contact_info->mobile }}"><i class="fa-solid fa-phone"></i>
                                    {{ $contact_info->mobile }}</a></li>
                                <li>
                                    <a href="demo21-contact.html"><i class="fa-solid fa-location-dot"></i> {{ $contact_info->landmark }} {{ $contact_info->city }} {{ $contact_info->zip_code }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6">
                        <div class="widget">
                            <h4 class="widget-title">Quick Links</h4>

                            <ul class="links">
                                <li><a href="{{ route('about_us') }}">About Us</a></li>
                                <li><a href="{{ route('terms_condition') }}">Terms &amp; Conditions</a></li>
                                <li><a href="{{ route('privacy') }}">Privacy policy</a></li>
                                <li><a href="{{ route('return_policy') }}">Return policy</a></li>
                                <li><a href="{{ route('refund_policy') }}">Refund policy</a></li>
                                <li><a href="{{ route('track_order') }}">Track Order</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-6">
                        <div class="widget">
                            <h4 class="widget-title">Follow Us</h4>

                            <div class="social-icons">
                                <a href="{{ $site_info->social_media->facebook }}" class="social-icon social-facebook icon-facebook" target="_blank">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                                <a href="{{ $site_info->social_media->instagram }}" class="social-icon social-twitter icon-twitter" target="_blank">
                                    <i class="fa-brands fa-square-instagram"></i>
                                </a>
                                <a href="{{ $site_info->social_media->youtube }}" class="social-icon social-linkedin " target="_blank">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                                <a href="{{ $site_info->social_media->linkedin }}" class="social-icon social-linkedin" target="_blank">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- End .footer-bottom -->
        <div class="footer-bottom d-flex align-items-center justify-content-center">
            <div class="footer-left">
                <span class="footer-copyright">© Sohoz Software. 2024. All Rights Reserved</span>
            </div>

            {{-- <div class="footer-right ml-auto mt-1 mt-sm-0">
                <img src="{{asset('frontend/img/demoes/demo21/payment-icon.png')}}" alt="payment">
            </div> --}}
        </div>
    </div>
</footer>
<!--Site Footer End-->
