@extends('layouts.backend.master')
@section('title', 'Update General Info')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">General Info</li>
                    </ol>
                </nav>
                <h1 class="m-0">General Info</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit General Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.general_info.update', $generalInfo->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <label>Logo(133x76):</label>
                                        <input type="file" name="logo" class="form-control mt-2" id="photoInput">
                                        <img src="{{ $generalInfo->logo }}" class="mt-2" width="60" alt="Logo">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Favicon logo(60x75):</label>
                                        <input type="file" name="favicon_logo" class="form-control mt-2"
                                            id="photoInput1">
                                        <img src="{{ $generalInfo->favicon_logo }}" class="mt-2" width="60"
                                            alt="favicon_logo">
                                        <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Footer Logo(133x76):</label>
                                        <input type="file" name="footer_logo" class="form-control mt-2" id="photoInput2">
                                        <img src="{{ $generalInfo->footer_logo }}" class="mt-2" width="60"
                                            alt="footer_logo">
                                        <img id="previewImage2" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>White Logo(133x76):</label>
                                        <input type="file" name="white_logo" class="form-control mt-2"
                                            onchange="imagePreView(this,'white_logo')">
                                        <img src="{{ $generalInfo->white_logo }}" class="mt-2" width="60"
                                            alt="White Logo">
                                        <img id="white_logo" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>


                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <label>Bradcrum Photo(1700x500):</label>
                                        <input type="file" name="bradcrum_photo" class="form-control mt-2"
                                            id="photoInput3">
                                        <img src="{{ $generalInfo->bradcrum_photo }}" class="mt-2" width="60"
                                            alt="">
                                        <img id="previewImage3" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Site Name:</label>
                                        <input type="text" name="site_name" class=" form-control mt-2"
                                            value="{{ $generalInfo->site_name }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Email:</label>
                                        <input type="text" name="email" class="form-control mt-2"
                                            value="{{ $generalInfo->email }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Phone:</label>
                                        <input type="text" name="phone" class=" form-control mt-2"
                                            value="{{ $generalInfo->phone }}">

                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <label>Qoute Photo(595x560):</label>
                                        <input type="file" name="call_center" class="form-control mt-2"
                                            id="photoInput2">
                                        @if ($generalInfo->call_center)
                                            <div class="property-image">
                                                <input type="hidden" name="hidden_call_center" id=""
                                                    value="{{ $generalInfo->call_center }}">
                                                <img src="{{ $generalInfo->call_center }}" class="mt-2" width="60"
                                                    alt="call_center">
                                                <img id="previewImage2" class="mt-3" src="#" alt="Preview"
                                                    style="display: none; max-width: 80px; max-height: 80px;">
                                                <img src="{{ asset('backend/images/icon/close.png') }}" width="30px"
                                                    height="30px"
                                                    style="padding-right: 5px; cursor: pointer;margin-top:2px"
                                                    alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>News Photo(800x500):</label>
                                        <input type="file" name="news_photo" class="form-control mt-2"
                                            id="photoInput2">
                                        <img src="{{ $generalInfo->news_photo }}" class="mt-2" width="60"
                                            alt="call_center">
                                        <img id="previewImage2" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <label>Facebook:</label>
                                        <input type="text" name="facebook" class=" form-control mt-2"
                                            value="{{ $generalInfo->facebook }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>LinkedIn:</label>
                                        <input type="text" name="linkedin" class=" form-control mt-2"
                                            value="{{ $generalInfo->linkedin }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Twitter:</label>
                                        <input type="text" name="twitter" class=" form-control mt-2"
                                            value="{{ $generalInfo->twitter }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Instagram:</label>
                                        <input type="text" name="instagram" class=" form-control mt-2"
                                            value="{{ $generalInfo->instagram }}">
                                    </div>
                                    {{-- <div class="form-group col-lg-3 mt-3">
                                        <label>Google Plus:</label>
                                        <input type="text" name="google_plus" class=" form-control mt-2"
                                            value="{{ $generalInfo->google_plus }}">
                                    </div> --}}
                                    <div class="form-group col-lg-3 mt-3">
                                        <label>Youtube:</label>
                                        <input type="text" name="youtube" class=" form-control mt-2"
                                            value="{{ $generalInfo->youtube }}">
                                    </div>
                                    <div class="form-group col-lg-3 mt-3">
                                        <label>Whatsapp:</label>
                                        <input type="text" name="whatsapp" class=" form-control mt-2"
                                            value="{{ $generalInfo->whatsapp }}">
                                        (Must Use Country Code)
                                    </div>
                                </div>
                                {{-- <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <b>Year of experience Title:</b>
                                        <input type="text" name="year_of_exp_title" class=" form-control mt-2"
                                            value="{{ $generalInfo->year_of_exp_title }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <b>Year of experience:</b>
                                        <input type="text" name="year_of_exp" class=" form-control mt-2"
                                            value="{{ $generalInfo->year_of_exp }}">
                                    </div>
                                    <div class="form-group col-lg-6 mt-3">
                                        <b>Happy Client Title:</b>
                                        <input type="text" name="happy_client_title" class=" form-control mt-2"
                                            value="{{ $generalInfo->happy_client_title }}">
                                    </div>
                                    <div class="form-group col-lg-6 mt-3">
                                        <b>Happy Client:</b>
                                        <input type="text" name="happy_client" class=" form-control mt-2"
                                            value="{{ $generalInfo->happy_client }}">
                                    </div>
                                    <div class="form-group col-lg-6 mt-3">
                                        <b>Corporet Client title:</b>
                                        <input type="text" name="corporate_client_title" class=" form-control mt-2"
                                            value="{{ $generalInfo->corporate_client_title }}">
                                    </div>
                                    <div class="form-group col-lg-6 mt-3">
                                        <b>Corporet Client:</b>
                                        <input type="text" name="corporate_client" class=" form-control mt-2"
                                            value="{{ $generalInfo->corporate_client }}">
                                    </div>
                                    <div class="form-group col-lg-6 mt-3">
                                        <b>Projects title:</b>
                                        <input type="text" name="projects_title" class=" form-control mt-2"
                                            value="{{ $generalInfo->projects_title }}">
                                    </div>
                                    <div class="form-group col-lg-6 mt-3">
                                        <b>Total Projects:</b>
                                        <input type="text" name="projects" class=" form-control mt-2"
                                            value="{{ $generalInfo->projects }}">
                                    </div>


                                </div> --}}

                                <div class="form-group mt-2">
                                    <label>Copyright Text:</label>
                                    <input type="text" name="copyright_text" class=" form-control mt-2"
                                        value="{{ $generalInfo->copyright_text }}">
                                </div>
                                <div class="form-group mt-2">
                                    <label>Address:</label>
                                    <textarea name="address" class="form-control " rows="7">{{ $generalInfo->address }}</textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Short Description:</label>
                                    <textarea name="footer_des" class="form-control" rows="7" placeholder="Enter Footer Description">{{ $generalInfo->footer_des }}</textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Address Map Link:</label>
                                    <textarea name="address_map_link" class="form-control" rows="7" placeholder="Enter Map link Here">{{ $generalInfo->address_map }}</textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Address Map:</label>
                                    <textarea name="address_map" class="form-control" rows="7" placeholder="Enter Map link Here">{{ $generalInfo->address_map }}</textarea>
                                </div>
                                {{-- <div class="form-group mt-2">
                                    <label>Short Description:</label>
                                    <textarea name="bullet_content" class="form-control" rows="7" placeholder="Enter Footer Description">{{ $generalInfo->bullet_content }}</textarea>
                                </div> --}}
                                <div class="form-group mt-2">
                                    <label>Googel Tag:</label>
                                    <textarea name="google_tag" class="form-control " rows="7" id="google_tag">{{ $generalInfo->google_tag }}</textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Facebook Pixel:</label>
                                    <textarea name="facebook_pixel" class="form-control " rows="7" id="facebook_pixel">{{ $generalInfo->facebook_pixel }}</textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Facebook Messenger:</label>
                                    <textarea name="facebook_messenger" class="form-control " rows="7" id="facebook_messenger">{{ $generalInfo->facebook_messenger }}</textarea>
                                </div>
                                {{-- <div class="form-group mt-2">
                                    <label for="">Bullet Text:</label>
                                    <input type="text" name="bullet_text" class="form-control"
                                        placeholder="Enter Bullet Text" value="{{ $generalInfo->bullet_text }}">
                                </div> --}}

                                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('script')
    <script>
        $(document).ready(function() {
            initializeSummernote('#google_tag');
            initializeSummernote('#facebook_pixel');
            initializeSummernote('#facebook_messenger');
            initializeSummernote('#bullet_content');
        });

        function removeRow(image) {
            var row = image.closest('.property-image');
            row.parentNode.removeChild(row);
            updateTotalAmount();
        }
    </script>
@endpush
