@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="page-title text-center"
            style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #ffe9e6">
            <div class="contact_tag1 text-center text-bold">Our FAQs</div>
            <hr class="hr_for_all">
        </div>
    </section>
    <!-- faq start -->
    <section class="page_sec_pad_50">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="xb-faq">
                        <ul class="accordion_box clearfix">
                            @foreach ($faqQuestion as $index => $faq)
                                {{-- @if ($index == 0)
                                    <li class="accordion block active-block">
                                        <div class="acc-btn">
                                            {{ $faq->question }}
                                            <span class=""> <i class="fa-solid fa-plus"></i> </span>
                                        </div>
                                        <div class="acc_body current">
                                            <div class="content faq_content">
                                                {!! $faq->answer !!}
                                            </div>
                                        </div>
                                    </li>
                                @else --}}
                                <li class="accordion block">
                                    <div class="acc-btn d-flex justify-content-between">
                                       <span class="faq_qsn"> {{ $faq->question }}</span>
                                        <div><span class="toggle-icon plus faq_toggle_icon"> <i class="fa-solid fa-plus"></i> </span>
                                            <span class="toggle-icon minus faq_toggle_icon" style="display:none;"> <i class="fa-solid fa-minus"></i> </span>
                                        </div>
                                    </div>
                                    <div class="acc_body">
                                        <div class="content faq_content">
                                            {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq end -->
@endsection
@push('script')
    <script>
         $(document).ready(function () {
        $('.accordion').on('click', '.acc-btn', function () {
            // Toggle visibility of plus and minus icons within the clicked item
            var icons = $(this).find('.toggle-icon');
            icons.toggle();
        });
    });
    </script>
@endpush
