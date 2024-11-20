@extends('layouts.backend.master')
@section('title', 'All Packages Review')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Packages Review</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Hotel</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Comment</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($package_review as $index => $review)
                                                <tr>
                                                    <td>{{ $index + 1 + ($package_review->currentPage() - 1) * $package_review->perPage()}}</td>
                                                    <td>{{ $review->hotelbooking->title }}</td>
                                                    <td>{{ $review->name }}</td>
                                                    <td>{{ $review->email }}</td>
                                                    <td>{{ Str::limit($review->comment, 50, '...') }}</td>
                                                    <td class="td_btn">
                                                       
                                                        <a href="{{ route('backend.packages.review_approve',$review->id) }}"
                                                            class="btn {{ $review->approve == '1' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            {{ $review->approve == '1' ? 'Not Approved' : 'Approve' }}
                                                        </a>

                                                        {{-- <div class="ml-2">
                                                            <label class="switch">
                                                                <input type="checkbox" name="approve" id="approve"
                                                                    {{ $review->approve == 1 ? 'checked' : '' }}
                                                                    value="1"
                                                                    onchange="reviewApprove({{ $review->package_id }})">
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div> --}}
                                                    </td>




                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $package_review->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
@push('style')
    <style>
        .switch {
            margin-left: 5px;
            position: relative;
            display: inline-block;
            width: 50px;
            height: 23px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endpush
{{-- @push('script')
    <script>
        function reviewApprove(package_id) {
            var approve  = $('#approve').val();

            $.ajax({
                url: "{{ route('backend.packages.review_approve') }}",
                type: 'POST',
                data: {
                    package_id: package_id,
                    approve: approve,

                    _token: '{{ csrf_token() }}',
                },
                dataType: 'json',
                success: function(response) {
                    toastr.success('Review Approved!');

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
        }
    </script>
@endpush --}}
