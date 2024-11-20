@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        @php
            $client_bradcrumb = App\Models\Bradcrumb::first();
        @endphp
        <div class="page-title text-center"
            style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #ffe9e6">
            <div class="contact_tag1 text-center text-bold">Our Sister Concern</div>
            <hr class="hr_for_all">

        </div>
    </section>

    <section class="page_sec_pad_50">
        <div class="container">
            <div class="mb-5">
                <div class="hadding9 d-flex">
                    <span class="font-f-3 span m-auto" data-aos="fade-up" data-aos-duration="700">Our All Sister
                        Concern</span>
                </div>
            </div>
            <div class="row">
                <div class="grid-container">
                    @foreach ($partners as $partner)
                        <div class="grid-item">
                            <div class="mobile_margin">
                                <div style="margin: 10px; background: white" class="partner_block">
                                    <img src="{{ $partner->photo }}" class="img-fluid" alt="partner image">
                                    <h6 class="text-center pb-3 brand_name">{{ Str::limit($partner->name, 18, '...') }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if (count($partners) > 24)
                <div class="mt-3 d-flex justify-content-center paginate_row">
                    <div>
                        {{ $partners->links() }}
                    </div>
                </div>
            @endif

        </div>
    </section>
@endsection
