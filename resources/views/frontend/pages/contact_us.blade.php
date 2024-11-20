@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        @php
            $contact_bradcrumb = App\Models\Bradcrumb::first();

            $first_contact = $contact_us[0];

        @endphp
        <div class="page-title text-center"
            style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #ffe9e6">
            <div class="contact_tag1 text-center text-bold">Contact Us</div>
            <hr class="hr_for_all">

        </div>
    </section>
    <section class="page_sec_pad_50 bg_soft_green">
        <div class="container">
            <div class="row ">
                @foreach ($contact_us as $index => $contact)
                    <div class="col-lg-6 pb-mobile-20 mb-3">
                        <div class="card">
                            <div class="address_card"
                                onclick="showonmap('{{ $contact->phone }}','{{ $contact->description }}','{{ $contact->map }}')">
                                <h4>(0{{ $index + 1 }}) {{ $contact->title }}</h4>
                                <div class="mt-3 d-flex" style="gap: 10px">
                                    <img src="{{ $contact->contact_image }}" width="50" height="50" class="mt-2 mr-2" alt="contact-icon">
                                    <div>
                                        {!! $contact->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="page_sec_pad_50 pad_top_0">

        <div class="container">

            <div class="row">
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
                <div class="col-lg-6 order-1 order-sm-0">

                    <form action="{{ route('html_email') }}" method="POST">
                        @csrf
                        <div class="contact_us_form">
                            <div>
                                <h5 class="text-center mb-2 contact_us_fillup_text mb-2">Fill Up The Form</h5>
                                <hr class="fillup_form_hr">

                            </div>
                            <div class="form-group mt-3">
                                <label for="">Name:</label>
                                <input type="text" name="name" id="" class="form-control"
                                    placeholder="Enter Your Name" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Email:</label>
                                <input type="email" name="email" id="" class="form-control"
                                    placeholder="Enter Your Email">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Phone:</label>
                                <input type="text" name="phone" id="" class="form-control"
                                    placeholder="Enter Your Phone Number" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Message:</label>
                                <textarea name="message" id="" class="form-control" rows="5" placeholder="Enter Your Message"></textarea>
                            </div>
                            <button type="submit" class="submit_btn mt-3 w-100">Submit Now</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 order-0 order-sm-1">
                    <div class="contact_us_form">
                        <h4 class="mb-3">For Any Query Contact With Us</h4>
                       @if ($first_contact->phone)
                       <div class="d-flex align-items-center" id="phone">
                        <h5 class="mr-2 text-ceter">Phone:</h5>
                        <a href="tel:{{ $first_contact->phone }}">{{ $first_contact->phone }}</a>
                    </div>
                       @endif
                        <div class="d-flex" id="address">
                            <h5 class="mr-2">Address:</h5>
                            <span>{!! $first_contact->description !!}</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="map_area2" id="map_area2">

                            <iframe src="{{ $first_contact->map }}" width="100%" height="370px" frameborder="0"
                                allowfullscreen="true" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
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
        function showonmap(phone, address, map_url) {

            addMap('map_area2', map_url);
            addPhone('phone', phone);
            addAddress('address', address);
        }


        function addMap(mapId, map_url) {
            document.getElementById(mapId).innerHTML = `<iframe
                      src="${map_url}"
                      width="100%" height="370px" frameborder="0" allowfullscreen="true" aria-hidden="false"
                      tabindex="0"></iframe>`;
            
        }
        function addPhone(phone_id,phone) {
            document.getElementById(phone_id).innerHTML = `<h5 class="mr-2 text-ceter">Phone:</h5>
            <a href="tel:${phone }">${phone}</a>`;
            
        }
        function addAddress(address_id,address) {
            document.getElementById(address_id).innerHTML = 
            `<h5 class="mr-2">Address:</h5>
              <span>${address}</span>`;
            
        }
    </script>
@endpush
