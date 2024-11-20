<section class="page_sec_pad_50">
    <div class="container">
        <div class="mb-5">
            <div class="hadding9 d-flex">
                <span class="font-f-3 span m-auto" data-aos="fade-up" data-aos-duration="700">Latest News</span>
            </div>
        </div>
        <div class="row">
            <div class="blog_slider">
                @foreach ($blogs as $blog)
                    <div class="set_card_padding card_pad_l_r_20" style="border-bottom: 0">

                        <div class="journal_card">
                            <a href="{{ route('blog_details', $blog->slug) }}">
                                <img width="100%" class="card-img-top" src="{{ $blog->photo }}" alt="blog image">
                            </a>
                            <div class="card-body journal_des">
                                <a href="{{ route('blog_details', $blog->slug) }}">
                                    <h5 class="journal_title mt-2 blog_title" >{{ $blog->title }}</h5>
                                </a>
                                <p>{{ \Carbon\Carbon::parse($blog->date)->format('F d, Y') }}</p>
                                <p class="card-text mt-2">{!! Illuminate\Support\Str::limit($blog->description, $limit = 200, $end = '...') !!}</p>

                            </div>
                            <div class="mt-3 mb_10">
                                <a href="{{ route('blog_details', $blog->slug) }}" class="theme-btn18">Read More</a>
                            </div>
                        </div>


                    </div>
                @endforeach
            </div>

        </div>
        <div class="mt-4 d-flex justify-content-center paginate_row mt_10_res">
            <div>
                <a href="{{ route('all_blog') }}" class="theme-btn18">View All</a>
            </div>
        </div>

    </div>
</section>
