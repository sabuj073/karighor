@extends('layouts.backend.master')
@section('title', 'Create packagesDetails')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('admin') }}">Dashboard / </a></h5>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <h6><a href="{{ route('backend.package_details.index') }}">All packagesDetails</a></h6>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="{{ route('backend.package_details.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Create PackagesDetails Info</h1>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    {{-- <div class="col-md-6">
                                        <label for="">Select Package*</label>
                                        <select class="form-control" name="service_id" id="serviceTypeSelect" required>
                                            <option value="" selected disabled>--Select--</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <label for="">Select Package*</label>
                                        <select class="form-control" name="package_id" id="serviceTypeSelect" required>
                                            <option value="" selected disabled>--Select--</option>
                                            @foreach ($packages as $package)
                                                <option value="{{ $package->id }}">{{ $package->package_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Phone:</label>
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{ old('phone') }}">
                                            [use(,) for multiple]
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <label>Bradcrumb Title:</label>
                                        <input type="text" name="brad_title" value="{{ old('brad_title') }}"
                                            class=" form-control" placeholder="Enter Brad Title">

                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Bradcrumb Sub Title:</label>
                                        <input type="text" name="brad_subtitle" value="{{ old('brad_subtitle') }}"
                                            class="form-control" placeholder="Enter BradCrum Sub Title">

                                    </div>


                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-6">
                                        <label>Brad Photo(470x235):</label>
                                        <input type="file" name="brad_photo" class=" form-control" id="photoInput">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class=" form-group col-lg-6">
                                        <label>Customer Review Photo(470x235):</label>
                                        <input type="file" name="c_review" class=" form-control" id="photoInput1">
                                        <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-4">
                                        <label>Duration:</label>
                                        <input type="text" name="duration" class="form-control"
                                            placeholder="Enter duration" value="{{ old('duration') }}">

                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Package Type:</label>
                                        <input type="text" name="package_type" class="form-control"
                                            placeholder="Enter duration" value="{{ old('package_type') }}">

                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Airline:</label>
                                        <input type="text" name="airline" class="form-control"
                                            placeholder="Enter Airline" value="{{ old('airline') }}">

                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-4">
                                        <label>Makkah:</label>
                                        <input type="text" name="makkah" class="form-control" placeholder="Enter Text"
                                            value="{{ old('makkah') }}">

                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Madinah:</label>
                                        <input type="text" name="madinah" class="form-control"
                                            placeholder="Enter duration" value="{{ old('madinah') }}">

                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Price:</label>
                                        <input type="text" name="price" class="form-control" placeholder="Enter Price"
                                            value="{{ old('price') }}">

                                    </div>
                                </div>
                                {{-- <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <label>Schedule Flight:</label>
                                        <textarea name="sh_flight" id="sh_flight" class="form-control">

                                      <table class="table text-center" style="width: 100%">
                                        <thead>
                                          <tr>
                                            <th scope="col">Departure</th>
                                            <th scope="col">Return</th>
                                          </tr>
                                        </thead>
                                        <tbody  class="text-center" >
                                          <tr>
                                            <td>GF 13 JAN DAC BAH JED,12:00-T 2:35</td>
                                            <td>GF 27 FEB MED BAH DAC, 19:40-T 05:00</td>
                                          </tr>
                                        </tbody>
                                      </table>

                                    </textarea>

                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Upcoming Travel:</label>
                                        <textarea name="up_flight" id="up_flight" class="form-control">
                                          <table class="table text-center" style="width: 100%">
                                            <thead>
                                              <tr>
                                                <th scope="col">SL</th>
                                                <th scope="col">Month</th>
                                                <th scope="col">Date</th>
                                              </tr>
                                            </thead>
                                            <tbody  class="text-center" >
                                              <tr>
                                                <td>1</td>
                                                <td>FEBRUARY-24</td>
                                                <td>3,13 & 24</td>
                                              </tr>
                                            </tbody>
                                          </table>

                                        </textarea>

                                    </div>

                                </div> --}}
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Hajj Rergistration Info:</label>
                                        <textarea name="registration" id="registration" class="form-control">
                                            {{ old('registration') }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Package Includes:</label>
                                        <textarea name="package_include" id="package_include"  class="form-control">
                                            {{ old('package_include') }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group">
                                        <label>Hotel Makkah(470x235):</label>
                                        <input type="file" name="h_makkah[]" class=" form-control" multiple>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label>Hotel Madinah(470x235):</label>
                                        <input type="file" name="h_madinah[]" class=" form-control" multiple>
                                    </div>
                                </div>


                                <div class="form-group mt-3">
                                    <label>Hotel Makkah Description:</label>
                                    <textarea name="description" id="editor" class="form-control " rows="7" placeholder="Enter Description">{{ old('description') }}</textarea>

                                </div>
                                <div class="form-group mt-3">
                                    <label>Hotel Madinah Description:</label>
                                    <textarea name="mad_description" id="mad_description" class="form-control " rows="7" placeholder="Enter Description">{{ old('mad_description') }}</textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Edit Meta Info</h1>
                            </div>
                            <div class="card-body">
                                {{-- meta info --}}
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label>Meta Title:</label>
                                        <input type="text" name="m_title" class="form-control"
                                            placeholder="Enter Meta Title" value="{{ old('m_title') }}">

                                    </div>
                                    <div class=" form-group mt-3">
                                        <label>Meta Photo(16x9 ratio recomended):</label>
                                        <input type="file" name="m_photo" class="form-control" id="photoInput">

                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Meta Keyword:</label>
                                        <input type="text" name="m_keyword" class="form-control"
                                            placeholder="Enter Meta Keyword" value="{{ old('m_keyword') }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Meta Description:</label>
                                        <textarea name="m_description" class="form-control" placeholder="Enter Meta Description" rows="5">{{ old('m_description') }}</textarea>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script>
        CKEDITOR.replace('editor');
        CKEDITOR.replace('up_flight');
        CKEDITOR.replace('sh_flight');
        CKEDITOR.replace('package_include');
        CKEDITOR.replace('mad_description');
    </script>
@endsection
