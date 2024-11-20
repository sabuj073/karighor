@extends('layouts.frontend.master')
@section('content')
    <section class="bradcrum_sec_pad">
        @php
            $video_bradcrumb = App\Models\Bradcrumb::first();
        @endphp
        <div class="page-title text-center"
            style=" background: url({{ $generalInfo->bradcrum_photo }}) no-repeat left center #ffe9e6; background-size:cover">
            <div class="contact_tag1 text-center text-bold">Video Gallery</div>
            <hr class="hr_for_all">
        </div>
    </section>
    <section class="video_gallery_section page_sec_pad_50 pad_bot_20">
        <div class="container">
            <div class="row">
                @foreach ($videos as $video)
                    <div class="col-lg-4 video-thumbnail mb-2 cursor-pointer" id="vimeo" onclick="popupvideo('{{ $video->video }}')">
                        <img src="{{ $video->photo }}" class="img-fluid" alt="video-gallery">
                    </div>
                    <div class="">
                        <h6>{{ $video->title }}</h6>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection

@push('script')
    <script>
        function popupvideo(url) {
            $.magnificPopup.open({
                items: {
                    src: url,
                    type: 'iframe'
                }
            });
        }
    </script>
@endpush
