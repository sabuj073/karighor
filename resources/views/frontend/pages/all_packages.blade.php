@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="page-title text-center"
            style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #ffe9e6">
            <div class="contact_tag1 text-center text-bold">Our All Packages</div>
            <hr class="hr_for_all">
        </div>
    </section>
    <section class="page_sec_pad_50 pad_bot_0 bg_soft_green">
        <div class="container">
            <div class="row text-center">
                <h3>Domestic and international ticket contact details Panel</h3>
                <div class="title_description">Dhiofor Provides All routes & All Major Airlines Competitive Pricing.Here
                    Domestic And International
                    Cheap Air Ticket From Bangladesh For all Over the World And All destinations.</div>
            </div>

            <div class="row pad_top_30">
                @foreach ($packages as $myPackage)
                    @php
                        $ratings = $myPackage->ratings;
                        $ratings = $ratings->where('approve', 1)->where('type', 'package');
                        $totalRating = 0;
                        $ratingsCount = count($ratings);

                        foreach ($ratings as $rating) {
                            $totalRating += $rating->rating;
                        }

                        $averageRating = $ratingsCount > 0 ? $totalRating / $ratingsCount : 0;
                    @endphp
                    <div class="col-md-4 set_pos  pad_bot_30">
                        <div class="bg-white">
                            {{-- <div class="package_uper">

                                <div class="text-dark"><i class="fa-solid fa-calendar-days"></i>
                                    {{ \Carbon\Carbon::parse($myPackage->start_date)->format('M d') }}-
                                    {{ \Carbon\Carbon::parse($myPackage->end_date)->format('M d') }}
                                </div>


                    </div> --}}
                            <img src="{{ $myPackage->package_photo }}" class="package_img" alt="package-image">
                            <div class="text-img">


                                <div class="package_footer">
                                    <div class="d-flex justify-content-between mt-3">
                                        <div>
                                            <div class="text1">Starts From BDT {{ $myPackage->package_price }}</div>
                                            <div class="text1">{{ $myPackage->package_limitation }}</div>
                                        </div>
                                        <span class="package_validity">Valid Till:
                                            {{ \Carbon\Carbon::parse($myPackage->end_date)->format('d M Y') }}</span>
                                    </div>

                                    <div class="text1 fw-bold mt-3 package_title">
                                        {{ $myPackage->package_title }}
                                    </div>

                                    <div class="d-flex justify-content-between mt-3 pb-4">
                                        <div class="d-flex">
                                            <span>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $averageRating)
                                                        <i class="fas fa-star" style="color: #DF9D34;"></i>
                                                    @elseif ($i - 0.5 <= $averageRating)
                                                        <i class="fas fa-star-half-alt" style="color: #DF9D34;"></i>
                                                    @else
                                                        <i class="far fa-star" style="color: gray;"></i>
                                                    @endif
                                                @endfor
                                            </span>
                                            <span>
                                                ({{ $ratingsCount }})
                                            </span>
                                        </div>
                                        <a href="{{ route('package-details', $myPackage->package_slug) }}"
                                            class="theme-btn18">Get Queries</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="mt-3 d-flex justify-content-center paginate_row">
                <div>
                    {{ $packages->links() }}
                </div>
            </div>



        </div>
    </section>
@endsection
