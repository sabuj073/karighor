@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="container-fluid" style="padding: 0 !important">
            <div class="row align-items-center">
                <div class="pages_slider">
                    @php
                        $sliders = explode(';', $portal->slider);
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

    <section class="page_sec_pad_50 bg_soft_green">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="ota_info_block">
                        <div class="d-flex">
                            <div class="hadding9 m-auto">
                                <span class="font-f-3 span" data-aos="fade-up" data-aos-duration="700">Get OTA Portal
                                    Service</span>
                                <div class="space16"></div>
                            </div>
                        </div>
                        <div>OTAs increase the visibility of your travel business. The OTAs provide a platform for small
                            tour operators to become visible to a new market and locations.
                            You need to have the following
                            information</div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-lg-8">
                                {{-- @php
                                    $ota_info_data = explode(';', $portal->ota_info);
                                @endphp
                                @foreach ($ota_info_data as $key => $ota_info)
                                    <div class="hadding9">
                                        <span class="font-f-3 span ota_portal_info w-100" data-aos="fade-up"
                                            data-aos-duration="700">{{ $key + 1 }}.{{ $ota_info }}</span>
                                    </div>
                                @endforeach
                                <button type="submit" class="theme-btn18 mt-3 w-100" data-bs-toggle="modal"
                                    data-bs-target="#otaModal">Submit Your Information</button> --}}
                                <form action="{{ route('backend.portal.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-sm-12 col-12">
                                            <label for="">Name:</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Enter Name" id="">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12 col-12">
                                            <label for="">Phone:</label>
                                            <input type="number" name="phone" class="form-control"
                                                placeholder="Enter Phone" id="">
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group col-lg-6 col-sm-12 col-12">
                                            <label for="">Email:</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter Email" id="">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12 col-12">
                                            <label for="">Photo:</label><span class="text-danger">*</span>
                                            <input type="file" name="photo" class="form-control" required>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group col-lg-6 col-sm-12 col-12 mt-3">
                                        <label for="">Trade Licence:</label>
                                        <input type="file" name="trade_licence" class="form-control"
                                            placeholder="Enter Email" id="">
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group col-lg-6 col-sm-12 col-12">
                                            <label for="">NID Card:</label><span class="text-danger">*</span>
                                            <input type="file" name="nid_card" class="form-control" id=""
                                                required>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12 col-12">
                                            <label for="">Visiting Card:</label> <span class="text-danger">*</span>
                                            <input type="file" name="visiting_card" class="form-control" id=""
                                                required>
                                        </div>
                                    </div>
                                    <div class="mt-4" style="border-top: none">
                                        <button type="submit" class="theme-btn18">Submit</button>
                                    </div>
                                </form>
                                
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <img src="{{ $portal->photo }}" class="portal_img_res w-100" alt="ota-portal-image">
                                </div>
                                <a href="{{ $portal->url }}" class="theme-btn18 visit_portal_btn w-100" target="_blank">
                                    Visit Our OTA Portal
                                </a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <div class="row mt-5">
                <div class="d-flex">
                    <div class="hadding9 m-auto">
                        <span class="font-f-3 span text-center" data-aos="fade-up" data-aos-duration="700">
                            Benefits and features of our OTA portal services
                        </span>
                        <div class="space16"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ota_benefits_block bg_mid_green">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ota_img_block">
                                    <img src="{{ $portal->photo1 }}" class="img-fluid w-100" alt="{{ $portal->alt_text }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="portal_des">
                                    {!! $portal->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="otaModal" tabindex="-1" aria-labelledby="otaModalLabel" aria-hidden="true">
            <div class="modal-dialog otaModal_dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="otaModalLabel">Submit Your Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('backend.portal.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12 col-12">
                                    <label for="">Name:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                        id="">
                                </div>
                                <div class="form-group col-lg-6 col-sm-12 col-12">
                                    <label for="">Phone:</label>
                                    <input type="number" name="phone" class="form-control" placeholder="Enter Phone"
                                        id="">
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-lg-6 col-sm-12 col-12">
                                    <label for="">Email:</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email"
                                        id="">
                                </div>
                                <div class="form-group col-lg-6 col-sm-12 col-12">
                                    <label for="">Trade Licence:</label><span class="text-danger">*</span>
                                    <input type="file" name="trade_licence" class="form-control"
                                        placeholder="Enter Email" id="" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-lg-6 col-sm-12 col-12">
                                    <label for="">NID Card:</label><span class="text-danger">*</span>
                                    <input type="file" name="nid_card" class="form-control" id="" required>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12 col-12">
                                    <label for="">Visiting Card:</label> <span class="text-danger">*</span>
                                    <input type="file" name="visiting_card" class="form-control" id=""
                                        required>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: none">
                                <button type="submit" class="theme-btn18">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
