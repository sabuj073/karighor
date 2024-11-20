@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="page-title text-center"
            style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #ffe9e6">
            <div class="contact_tag1 text-center text-bold">All Services</div>
            <hr class="hr_for_all">
        </div>
    </section>
    <section class="about pos-rel  bg__image page_sec_pad_50">
        <div class="container">
            <div class="">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-4">
                            <div class="service9-box text-center card_pad_l_r_20" data-aos="fade-up"
                                data-aos-duration="700">
                                <div class="service9-img img5 img100">
                                    <img src="{{ asset('frontend/img/image/service9-img1.png') }}" alt="">
                                </div>
                                <div class="serivce9-icon text-center service_name_block">
                                    <h4><a href="{{ route('service_details', $service->slug) }}"><img
                                                src="{{ $service->logo }}" alt="">
                                            <span>{{ $service->title }}</span> </a></h4>
                                </div>
                                <div class="space16"></div>
                                <a href="{{ route('service_details', $service->slug) }}"
                                    class="learn-more9 font-f-3 service_read_more">Read more <span><i
                                            class="fa-solid fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="mt-3 d-flex justify-content-center paginate_row">
                <div>
                    {{ $services->links() }}
                </div>
            </div>

        </div>
    </section>
@endsection
