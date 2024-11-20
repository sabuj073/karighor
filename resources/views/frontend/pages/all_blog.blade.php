@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        @php
            $blog_bradcrumb = App\Models\Bradcrumb::first();
        @endphp
        <div class="page-title text-center"
            style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #ffe9e6">
            <div class="contact_tag1 text-center text-bold">Our All News</div>
            <hr class="hr_for_all">

        </div>
    </section>

    <section class="page_sec_pad_50 @if (count($blogs) > 0) pad_bot_0 @endif">
        <div class="container">
            @if (count($blogs) > 0)
                <div class="mb-5">
                    <div class="hadding9 d-flex">
                        <span class="font-f-3 span m-auto" data-aos="fade-up" data-aos-duration="700">Latest News</span>
                    </div>
                </div>


                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-4 col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
                            <div class="set_card_padding card_pad_l_r_20 block">

                                <div class="journal_card">
                                    <a href="{{ route('blog_details', $blog->slug) }}">
                                        <img width="100%" class="card-img-top" src="{{ $blog->photo }}" alt="blog image">
                                    </a>
                                    <div class="card-body journal_des">
                                        <a href="{{ route('blog_details', $blog->slug) }}">
                                            <h5 class="journal_title mt-2">{{ $blog->title }}</h5>
                                        </a>
                                        <p>{{ \Carbon\Carbon::parse($blog->date)->format('F d, Y') }}</p>
                                        <p class="card-text mt-2">{!! Illuminate\Support\Str::limit($blog->description, $limit = 200, $end = '...') !!}</p>

                                    </div>
                                    <div class="mt-3 mb_10">
                                        <a href="{{ route('blog_details', $blog->slug) }}" class="theme_btn">Read More</a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    @endforeach

                </div>
                @if ($blogs)
                    <div class="mt-3 d-flex justify-content-center paginate_row">
                        <div>
                            {{ $blogs->links() }}
                        </div>
                    </div>
                @endif
                @else
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <img src="{{ $generalInfo->news_photo }}" class="w-100" alt="">
                    </div>
                </div>
            @endif

        </div>
    </section>
@endsection
