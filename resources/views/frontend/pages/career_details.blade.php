@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="page-title text-center"
            style="background: url('{{ $career->slider ?? '' }}') no-repeat left center #ffe9e6">

        </div>
    </section>

    <section class="team2 sp3 _relative">

        <div class="container about__us">
            <div class="row">

                <div class="col-lg-8 career_border">
                    <div class="career_d_title header_text make_all_title">Apply For {{ $career->title }}</div>
                    <div>
                        <img src="{{ $career->photo }}" class="career_details_img" alt="">
                    </div>
                    <div class="career_des">
                        {!! $career->description !!}
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="career_details_card">
                        <div class="card career_card">
                            <div class="card-title text-center career_card_title">
                                Job Type
                            </div>
                            <div class="career_card_text">
                                {{ $career->job_type }}
                            </div>
                            <div class="card-title text-center career_card_title">
                                Salary
                            </div>
                            <div class="career_card_text">
                                {{ $career->salary }}
                            </div>
                            <div class="card-title text-center career_card_title">
                                Job Location
                            </div>
                            <div class="career_card_text">
                                {{ $career->location }}
                            </div>
                            <div class="career_d_apply_btn">
                                <a href="{{ route('apply_now') }}">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
