@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="page_sec_pad_50 airline_det_pad">
        <div class="container">
            <div class="row block m-0">
                <div class="col-md-5 text-center">
                    <img src="{{ @$final_data->photo }}" alt="flag-image" style="width: 100%">
                </div>
                <div class="col-lg-7">
                    <div class="airline_des ">
                        {!! @$final_data->short_description !!}
                    </div>
                </div>
                
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">DESCRIPTION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="true">Review</a>
                        </li>

                    </ul> --}}
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="text-left airline_des block">
                                {!! @$final_data->description !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="review_title">Reviews</div>

                            <div class="review-message">
                                Be the first to review “Package Name”<br>
                                Your email address will not be published. Required fields are marked *
                            </div>
                            <div class="review-form">

                                <div class="container">
                                    <div class="rating_text">Your Rating*</div>
                                    <button class="star">&#9734;</button>
                                    <button class="star">&#9734;</button>
                                    <button class="star">&#9734;</button>
                                    <button class="star">&#9734;</button>
                                    <button class="star">&#9734;</button>

                                    <div class="rating_input">
                                        <div class="rating_title">Name</div>
                                        <input type="text" name="" class="form-control">
                                    </div>
                                    <div class="rating_input">
                                        <div class="rating_title">Email</div>
                                        <input type="text" name="" class="form-control">
                                    </div>
                                    <div class="rating_input">
                                        <div class="rating_title">Message</div>
                                        <input type="text" name="" class="form-control">
                                    </div>
                                    <div class="review-btn">
                                        <a href="#" class="btn btn-primary my-btn ">Submit</a>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
    <script>
        const stars = document.querySelectorAll('.star');


        stars.forEach((star, index) => {
            star.addEventListener('click', () => {

                let current_star = index + 1;
                stars.forEach((star, i) => {
                    if (current_star >= i + 1) {
                        star.innerHTML = '&#9733;';
                    } else {
                        star.innerHTML = '&#9734;';
                    }
                });

            });
        });
    </script>

    <style>
        .star {
            border: none;
            background-color: unset;
            color: goldenrod;
            font-size: 24px;
        }

        p {
            text-align: center;
        }
    </style>
@endsection
