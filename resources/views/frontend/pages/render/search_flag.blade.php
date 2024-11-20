@foreach ($flags as $flag)
    <div class="col-lg-2">
        <div class="card set_box_shadow">
            <img class="card-img-top flag_img" src="{{ $flag->thumbnail }}" alt="flag-image">
            <div class="">
                <h6 class="card-title text-center">{{ $flag->name }}</h6>
            </div>
            <div>

            </div>
            <div class="d-flex justify-content-center">
                <a href="{{ route('country-details', ['slug' => $service->slug, 'json_slug' => $flag->slug]) }}"
                    class="theme-btn18 font-f-7 mb-4">Details</a>
            </div>
        </div>
    </div>
@endforeach
