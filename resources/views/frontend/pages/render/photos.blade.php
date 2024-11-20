
<div class="row">
    @if ($photoGallery->count() > 0)
        @foreach ($photoGallery as $galleryItem)
            @if ($galleryItem->photo)
                @php
                    $photoArray = explode(';', $galleryItem->photo);
                @endphp
                @foreach ($photoArray as $photoUrl)
                    <div class="col-lg-3 photo_gallery_margin_bottom mt-4">
                        <a href="{{ $photoUrl }}" class="big">
                            <img src="{{ $photoUrl }}" class="img-fluid" alt="" title="">
                        </a>
                    </div>
                @endforeach
            @endif
        @endforeach
    @endif
</div>
