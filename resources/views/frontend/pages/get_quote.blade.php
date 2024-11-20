@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        @php
            $contact_bradcrumb = App\Models\Bradcrumb::first();
        @endphp
        <div class="page-title text-center"
            style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #ffe9e6">
            <div class="contact_tag1 text-center text-bold">Contact Us</div>
            <hr class="hr_for_all">

        </div>
    </section>
    {{-- <section class="page_sec_pad_50 bg_soft_green">
        <div class="container">
            <div class="row ">
                @foreach ($contact_us as $index => $contact)
                    <div class="col-lg-3 pb-mobile-20">
                        <div class="card">
                            <div class="address_card" onclick="showonmap('{{ $contact->map }}')">
                                <h4>(0{{ $index + 1 }}) {{ $contact->title }}</h4>
                                <div class="mt-3 d-flex">
                                    <img src="{{ $contact->contact_image }}" class="mt-2 mr-2" alt="contact-icon">
                                    {!! $contact->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <section class="page_sec_pad_50 pad_top_15">

        <div class="container">

            <div class="row justify-content-center">
                {{-- <div class="col-lg-6 mobile_map">
                    <div>
                        <div class="map_area" id="map_area">
                            @php
                                $contact = $contact_us[0]->map;
                            @endphp
                            <iframe src="{{ $contact }}" width="100%" height="425px" frameborder="0"
                                allowfullscreen="true" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div> --}}
                @if ($generalInfo->call_center)
                    <div class="col-lg-6">
                        <div class="contact_us_form get_quote_form">
                            <img src="{{ $generalInfo->call_center }}" class="w-100" alt="">
                        </div>

                    </div>
                @endif
                <div class="col-lg-6 mt_10_res">

                    <form action="{{ route('html_email') }}" method="POST">
                        @csrf
                        <div class="contact_us_form get_quote_form">
                            <div>
                                <h5 class="text-center mb-2 contact_us_fillup_text mb-2">Write a Quote</h5>
                                <hr class="fillup_form_hr">
                            </div>
                            <div class="form-group">
                                <label for="">Company:</label>
                                <input type="text" name="company" id="" class="form-control"
                                    placeholder="Enter Your Company Name">
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-lg-6">
                                    <label for="">Name:</label>
                                    <input type="text" name="name" id="" class="form-control"
                                        placeholder="Enter Your Name" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="">Designation:</label>
                                    <input type="text" name="designation" id="" class="form-control"
                                        placeholder="Enter Your Designation">
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="form-group col-lg-6">
                                    <label for="">Phone:</label>
                                    <input type="text" name="phone" id="" class="form-control"
                                        placeholder="Enter Your Phone Number" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="">Email:</label>
                                    <input type="email" name="email" id="" class="form-control"
                                        placeholder="Enter Your Email">
                                </div>

                            </div>


                            <div class="form-group mt-3">
                                <label for="">Message:</label>
                                <textarea name="message" id="" class="form-control" rows="3" placeholder="Enter Your Message"></textarea>
                            </div>
                            <button type="submit" class="submit_btn mt-3 w-100">Submit Now</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        {{-- <div class="row mt-4">
      <div class="map_area" id="map_area">
        @php
          $contact = $contact_us[0]->map;
        @endphp
        <iframe src="{{ $contact }}" width="100%" height="350px" frameborder="0" allowfullscreen="true"
          aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div> --}}

    </section>
@endsection
@push('script')
    <script>
        function showonmap(map_url) {
            addMap('map_area', map_url);
            addMap('map_area2', map_url);
        }

        function addMap(mapId, map_url) {
            document.getElementById(mapId).innerHTML = `<iframe
                      src="${map_url}"
                      width="100%" height="642px" frameborder="0" allowfullscreen="true" aria-hidden="false"
                      tabindex="0"></iframe>`;
        }
    </script>
@endpush
