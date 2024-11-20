@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
 
    <section class="bradcrum_sec_pad">
        @php
            $gallery_bradcrumb = App\Models\Bradcrumb::first();
        @endphp
        <div class="page-title text-center"
            style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #ffe9e6">
            <div class="contact_tag1 text-center text-bold">Photo Gallery</div>
            <hr class="hr_for_all">    
        </div>
    </section>


    <section class="page_sec_pad_50">
        <div class="container">
            @if($achievmentSecContent->header)
            <div class="row text-center">
                <div class="hadding9">
                    <span class="font-f-3 span" data-aos="fade-up"
                        data-aos-duration="700">{{ @$achievmentSecContent->header }}</span>
                    <div class="space16"></div>
                    <div>{{ @$achievmentSecContent->sub_header }}</div>
                </div>

            </div>
            @endif
            
            <div class="">
                <div class="loader_spinner d-none">
                    <center>
                        <div class="lds-spinner">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </center>
                </div>
                <div class="gallery">
                    <div class="photo_gallery">
                        <div class="row">
                            @if ($photoGallery->count() > 0)
                                @foreach ($photoGallery as $galleryItem)
                                    @if ($galleryItem->photo)
                                        @php
                                            $photoArray = explode(';', $galleryItem->photo);
                                        @endphp
                                        @foreach ($photoArray as $photoUrl)
                                            <div class="col-lg-3 photo_gallery_margin_bottom mt-4">
                                                <div class="">
                                                    <a href="{{ $photoUrl }}" class="big">
                                                        <img src="{{ $photoUrl }}" class="img-fluid gallery_img_res"
                                                            alt="" title="{{ @$galleryItem->photo_title }}">
                                                    </a>

                                                    <h5 class="mt-2">{{ @$galleryItem->photo_title }}</h5>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination_links">
                {{ $photoGallery->links() }}
            </div>
        </div>

    </section>
@endsection
@push('script')
    <script>
        $('#select_year').on('change', function() {

            $('.year_search_input').val('')
            var parent_id = $(this).val();
            $(".loader_spinner").removeClass('d-none');
            $(".lds-spinner").fadeIn(300);
            var url = "{{ route('getPhotos') }}";
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    parent_id: parent_id,
                    _token: '{{ csrf_token() }}',
                },
                success: (data) => {
                    $('.photo_gallery').html(data);

                    var gallery = $('.photo_gallery a').simpleLightbox({
                        sourceAttr: 'href',
                        nav: true,
                        overlay: true,
                        close: true,
                        closeText: 'X',
                        swipeClose: true,
                        showCounter: true,
                        fileExt: 'png|jpg|jpeg|gif|webp',


                    })
                },
                complete: function() {
                    // Hide loading spinner after the Ajax call is complete
                    $(".lds-spinner").fadeOut(300);
                    $(".loader_spinner").addClass('d-none');
                }
            });
        });

        function searchYear(value) {
            var year = value;
            // var selectYear_html = `
            // <div class="col-lg-6 col-sm-5 col-5 year_select_box">
            //         <select name="" id="select_year" class="bg_soft_green">
            //             <option selected disabled>Select Year</option>
            //             <option value="All">All</option>
            //             @foreach ($photoGallery_year as $pYear)
            //                 <option value="{{ $pYear->id }}">{{ $pYear->year }}</option>
            //             @endforeach
            //         </select>
            //     </div>`;
            // $('.year_select_box').html(selectYear_html);
            $(".loader_spinner").removeClass('d-none');
            $(".lds-spinner").fadeIn(300);
            var url = "{{ route('getPhotos') }}";
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    year: year,
                    _token: '{{ csrf_token() }}',
                },
                success: (data) => {
                    $('.photo_gallery').html(data);
                    $(".loader_spinner").addClass('d-none');
                    var gallery = $('.photo_gallery a').simpleLightbox({
                        sourceAttr: 'href',

                        nav: true,
                        overlay: true,
                        close: true,
                        closeText: 'X',
                        swipeClose: true,
                        showCounter: true,
                        fileExt: 'png|jpg|jpeg|gif|webp',


                    })
                },
                complete: function() {
                    // Hide loading spinner after the Ajax call is complete
                    $(".lds-spinner").fadeOut(300);

                }
            });
        }

        // function selectYear(year) {

        // }
    </script>
@endpush
