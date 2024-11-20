@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        @php
            $team_bradcrumb = App\Models\Bradcrumb::first();
        @endphp
        <div class="page-title text-center"
            style="background: url('{{ $team_bradcrumb->team_photo }}') no-repeat left center #ffe9e6">
            <div class="contact_tag1 text-center text-bold">Our Talented Teams</div>
            <hr class="hr_for_all">

        </div>
    </section>

    <section class="">
        <div class="team2 page_sec_pad_50 _relative">
            <div class="container">
                <h1 class="our_team_title">Our Team</h1>
                <div class="row">
                    @php
                        $teams = \App\Models\Team::orderBy('order_level', 'asc')->paginate(20);
                    @endphp

                    @foreach ($teams as $team)
                        <div class="col-lg-3 col-sm-6">

                            <div class="team2-box">

                                <div class="team2-box-img img100 img5">
                                    <img src="{{ $team->photo }}" alt="">
                                </div>

                                <div class="team2-box-hover">
                                    <div class="team2-hadding">
                                        <h4> <a href="{{ route('team-details', $team->slug) }}">{{ $team->name }}</a></h4>
                                        <div class="space6"></div>
                                        <p>{{ $team->designation }}</p>
                                    </div>
                                    <div class="space16"></div>
                                    <div class="team2-icon">
                                        <ul>
                                            <li><a href="{{ $team->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                                            </li>
                                            <li><a href="{{ $team->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="{{ $team->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>

                <div class="mt-3 d-flex justify-content-center paginate_row">
                    <div>
                        {{ $teams->links() }}
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
