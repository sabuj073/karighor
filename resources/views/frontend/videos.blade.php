@if (count($videos) > 0)
    <section class="video_gallery_section pad_bot_20 ">
        <div class="container">
            <div class="hadding9 d-flex mb-4">
                <span class="font-f-3 span m-auto" data-aos="fade-up" data-aos-duration="700">Videos</span>
            </div>
            <div class="aiz-carousel gutters-10" data-items="3" data-xl-items="3" data-lg-items="3"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                @foreach ($videos as $video)
                    <div class="item">
                        <div class="video-thumbnail mb-4 cursor-pointer" id="vimeo"
                            onclick="popupvideo('{{ $video->video }}')">
                            <img src="{{ $video->photo }}" class="img-fluid" alt="video-gallery">
                        </div>
                        <div class="">
                            <h6>{{ $video->title }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endif
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
