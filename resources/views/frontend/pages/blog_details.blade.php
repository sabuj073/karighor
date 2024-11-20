@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="page-title text-center"
            style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #ffe9e6">
            <div class="contact_tag1 text-center text-bold">{{ $blog->title }}</div>
            <hr class="hr_for_all">

        </div>
    </section>

    <section class="page_sec_pad_50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="block">
                        <img src="{{ $blog->photo }}" class="img-fluid" width="100%" alt="{{ $blog->alt_text }}">
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="journal_date">
                                Auther : {{ $blog->auther }}</span>
                            <span class="journal_date">
                                Published Date : {{ \Carbon\Carbon::parse($blog->date)->format('d M y') }}</span>
                        </div>
                        <h5 class="journal_title mt-2 mb-2">{{ $blog->title }}</h5>
                        <div class="journal_description">
                            {!! $blog->description !!}
                        </div>
                    </div>

                    {{-- <div class="mt-3 block">
                        <div id="disqus_thread"></div>
                    </div> --}}
                </div>
                <div class="col-lg-4">
                    <div class="block related_blog_res">
                        <h5 class="journal_title mb-4">Related News</h5>
                        @foreach ($related_blog as $blog)
                            <div class="set_card_padding mb-4" style="border-bottom: 0">
                                <a href="{{ route('blog_details', $blog->slug) }}">
                                    <div class="journal_card">
                                        <img width="100%" class="card-img-top" src="{{ $blog->photo }}"
                                            alt="Card image cap">
                                        <div class="card-body journal_des">
                                            <h5 class="journal_title mt-2">{{ $blog->title }}</h5>
                                            <p>{{ \Carbon\Carbon::parse($blog->date)->format('F d, Y') }}</p>
                                            <p class="card-text mt-2">{!! Illuminate\Support\Str::limit($blog->description, $limit = 200, $end = '...') !!}</p>

                                        </div>
                                        <div class="mt-3">
                                            <a href="{{ route('blog_details', $blog->slug) }}" class="theme_btn">Read
                                                More</a>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        // (function() { 
        //     var d = document,
        //         s = d.createElement('script');
        //     s.src = 'https://suma-group.disqus.com/embed.js';
        //     s.setAttribute('data-timestamp', +new Date());
        //     (d.head || d.body).appendChild(s);
        // })();
    </script>
    {{-- <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
            Disqus.</a></noscript> --}}
@endpush
