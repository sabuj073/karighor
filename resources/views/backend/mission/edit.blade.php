@extends('layouts.backend.master')
@section('title', 'Update')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><h5><a href="{{ route('admin') }}">Dashboard /</a></h5></li>
                        <li class="breadcrumb-item active" aria-current="page">Mision</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit Mission Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.mission.update', $missionVision->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row mt-3">
                                    <div class=" form-group col-lg-6">
                                        <label>Mission Photo(557x660):</label>
                                        <input type="file" name="mission_photo" class=" form-control" id="photoInput"
                                            value="{{ old('mission_photo') }}">
                                        <img src="{{ $missionVision->mission_photo }}" width="80px" class="mt-2"
                                            alt="">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="">Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control" placeholder="Enter Alter Text" id="" value="{{ $missionVision->alt_text }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-12">
                                        <label>Mission Content:</label>
                                        <textarea name="mission" id="editor" class="form-control " rows="7" placeholder="Enter Description">{{ $missionVision->mission }}</textarea>
                                    </div>
                                </div>
                                
                                {{-- <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Mission Icon:</label>
                                        <input type="text" name="mission_icon" class="form-control"
                                            value="{{ $missionVision->mission_icon }}">
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="form-group col-lg-12">
                                        <label>Vision:</label>
                                        <textarea name="vision" id="editor2" class="form-control " rows="7" placeholder="Enter vision">{{ $missionVision->vision }}</textarea>
                                    </div>




                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Vision Icon:</label>
                                        <input type="text" name="vision_icon" id="" class="form-control"
                                            value="{{ $missionVision->vision_icon }}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Vision Photo(89x58):</label>
                                        <input type="file" name="vision_photo" class=" form-control" id="photoInput"
                                            value="{{ old('vision_photo') }}">
                                        <img src="{{ $missionVision->vision_photo }}" width="80px" class="mt-2"
                                            alt="">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-12">
                                        <label>Values:</label>
                                        <textarea name="values" id="editor3" class="form-control " rows="7" placeholder="Enter Values">{{ $missionVision->values }}</textarea>
                                    </div>




                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Values Icon:</label>
                                        <input type="text" name="values_icon" class="form-control"
                                            value="{{ $missionVision->values_icon }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Values Photo(89x58):</label>
                                        <input type="file" name="values_photo" class=" form-control" id="photoInput"
                                            value="{{ old('values_photo') }}">
                                        <img src="{{ $missionVision->values_photo }}" width="80px" class="mt-2"
                                            alt="">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
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
            initializeSummernote('#editor');
            initializeSummernote('#editor2');
            initializeSummernote('#editor3');
        });
    </script>
@endpush
