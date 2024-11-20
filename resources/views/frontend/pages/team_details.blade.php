@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp
@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="page-title text-center"
            style="background: url('{{ $team->slider ?? '' }}') no-repeat left center #ffe9e6">

        </div>
    </section>

    <section class="">
        <div class="team-details-box-all sp3">
            <div class="container">
                <div class="team-details-box">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="team-details-box-img img5 img100">
                                <img src="{{ $team->photo }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="team-details-hadding hadding2">
                                <h2>{{ $team->name }}</h2>
                                <div class="space16"></div>

                                <div class="space16"></div>
                                {!! $team->about !!}
                                <div class="space24"></div>
                                <ul class="team-details-list">
                                    <li>
                                        <h6>Position:</h6>
                                        <p>{{ $team->designation }}</p>
                                    </li>
                                    <li>
                                        <h6>experience:</h6>
                                        <p>{{ $team->experience }}</p>
                                    </li>
                                    <li>
                                        <h6>Address:</h6>
                                        <p>{{ $team->address }}</p>
                                    </li>
                                    <li>
                                        <h6>Phone:</h6>
                                        <p>{{ $team->phone }}</p>
                                    </li>
                                    <li>
                                        <h6>Email:</h6>
                                        <p>{{ $team->email }}</p>
                                    </li>
                                    <li>
                                        <h6>Website:</h6>
                                        <p><a href="{{ $team->website_link }}">{{ $team->website_link }}</a></p>
                                    </li>
                                    <li>
                                        <h6>Follow Me:</h6>
                                        <ul class="mini-icons">
                                            <li><a href="{{ $team->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                                            </li>
                                            <li><a href="{{ $team->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="{{ $team->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                                            </li>
                                        </ul>

                                    </li>
                                </ul>
                                <div class="qr">

                                    @php
                                    $removedXML = '<?xml version="1.0" encoding="UTF-8"?>';
                                    
                                    @endphp

                                    {!! str_replace($removedXML, '', QrCode::size(100)->generate(route('team-details', $team->slug))) !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </section>
@endsection
