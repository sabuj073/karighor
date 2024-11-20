@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        @php
            $career_bradcrumb = App\Models\Bradcrumb::first();
        @endphp
        <div class="page-title text-center"
            style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #ffe9e6">

        </div>
    </section>

    <section class="team2 sp3 _relative">

        <div class="container">
            <h1 class="our_team_title">Career</h1>
            <div class="space30"></div>
            <div class="row">
                @foreach ($careers as $career)
                    <div class="col-md-3 padd_bot_25">
                        <div class="card career_div" style="">
                            <a href="{{ route('career-details', $career->slug) }}"><img width="100%" class="card-img-top"
                                    src="{{ $career->photo }}" alt="{{ $career->title }}">
                                <div class="card-body">
                                    <h6 class="card-title"><i style="padding-right: 5px"
                                            class="fa-solid fa-briefcase"></i>{{ $career->title }}</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item dead_line">{{ $career->deadline }}</li>
                                </ul>
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection
