@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->m_description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="page-title text-center"
            style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #ffe9e6; background-size:cover !important">
            <div class="contact_tag1 text-center text-bold">{{ $package_details->package_title }}</div>
            <hr class="hr_for_all">
        </div>
    </section>
    <section class="page_sec_pad_50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <div>
                        <img src="{{ $package_details->package_photo }}" width="100%" alt="">
                    </div>
                    <div class="mt-4">
                        <form action="">
                            @csrf
                            <div class="block">
                                <div>
                                    <h5 class="text-center mb-2 contact_us_fillup_text">Fill Up The Form</h5>
                                    <hr class="fillup_form_hr">
                                    <p class="text-center mt-2 mb-2">Whether You Have any question about our package</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Name:</label>
                                    <input type="text" name="name" id="" class="form-control"
                                        placeholder="Enter Your Name" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Email:</label>
                                    <input type="email" name="email" id="" class="form-control"
                                        placeholder="Enter Your Email">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Phone:</label>
                                    <input type="text" name="phone" id="" class="form-control"
                                        placeholder="Enter Your Phone Number" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Message:</label>
                                    <textarea name="message" id="" class="form-control" rows="5" placeholder="Enter Your Message"></textarea>
                                </div>
                                <button type="submit" class="theme-btn18 mt-3 w-100">Submit Now</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 package_details_tab_pane">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">DESCRIPTION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false" onclick="getProductId({{ @$package_details->id }})">REVIEW</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="mt-3">
                                {!! $package_details->tour_description !!}
                            </div>
                            <div class="mt-3 text-center">
                                @php
                                    $ratings = $package_details->ratings;
                                    $ratings = $ratings->where('approve', 1);
                                    $totalRating = 0;
                                    $ratingsCount = count($ratings);
        
                                    foreach ($ratings as $rating) {
                                        $totalRating += $rating->rating;
                                    }
        
                                    $averageRating = $ratingsCount > 0 ? $totalRating / $ratingsCount : 0;
                                @endphp
                                <div class="d-flex justify-content-center">
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
                                    <span class="ml-2">
                                       ( {{ $ratingsCount }})
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            

                            <div class="review-message pl-3 mt-3">
                                Be the first to review “{{ $package_details->package_title }}”<br>
                                Your email address will not be published. Required fields are marked *
                            </div>
                            <div class="review-form">

                                <div class="container review_form">
                                    <h4 class="reviews_tab_title">Your Rating</h4>
                                    <div id="rateYo"></div>
                                    <h4 class="reviews_tab_title mt-3">Add a Review</h4>
                                    <input type="hidden" name="productId" class="form-control" id="productId">
                                    <input type="hidden" name="rating" class="form-control" id="rating">
                                    <div class="rating_input">
                                        <div class="rating_title">Name</div>
                                        <input type="text" name="" id="name" placeholder="Enter Name"
                                            class="form-control">
                                    </div>
                                    <div class="rating_input">
                                        <div class="rating_title">Email</div>
                                        <input type="text" name="" id="email" placeholder="Enter Email"
                                            class="form-control">
                                    </div>

                                    <div class="rating_input">
                                        <div class="rating_title">Comment</div>
                                        <textarea name="rating_review" class="rating_title form-control" id="rating_review" cols="40" rows="4"
                                            placeholder="Your Review"></textarea>
                                    </div>
                                    <div class="product_p_by_frame">
                                        <div class="buy_frame">
                                            <button class="buy_frame_btn" id="rating_submit" type="submit"
                                                style="background: transparent;border: none">
                                                <div class="theme-btn18 col-md-12">
                                                    Submit
                                                </div>
                                            </button>
                                        </div>
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

@push('script')
    <script>
        $(function() {

            $("#rateYo").rateYo({
                rating: 1.5,
                halfStar: true,
                onChange: function(rating, rateYoInstance) {
                    $("#rating").val(rating);
                },
            });
        });

        function getProductId(productId) {

            var package_id = $('#productId').val(productId);
        }
        $(function() {

            $('#rating_submit').on('click', function() {

                var productId = $('#productId').val();
                var name = $('#name').val();
                var email = $('#email').val();
                var rating = $('#rating').val();
                var rating_reviewText = $('#rating_review').val();
                $('.lds-spinner').show();

                $.ajax({
                    url: "{{ route('user.rating.store') }}",
                    type: 'POST',
                    data: {
                        product_id: productId,
                        type: 'package',
                        name: name,
                        email: email,
                        rating: rating,
                        comment: rating_reviewText,
                        _token: '{{ csrf_token() }}',
                    },
                    dataType: 'json',
                    success: function(response) {
                        $("#rateYo").rateYo("option", "rating", 1.5);
                        toastr.success('You successfully Rated Our Package.Thanks!');

                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        // Handle the error response here, if needed
                    },
                    complete: function() {
                        // Hide loader when the request is complete (success or error)
                        $('.lds-spinner').hide();
                    }
                });
            });
        });
    </script>
@endpush
