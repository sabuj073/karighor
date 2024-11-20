@extends('layouts.backend.master')
@section('title', 'Edit Air Ticket')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('admin') }}">Dashboard / </a></h5>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Air Ticket</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="{{ route('backend.flag.update', $flag->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Edit Air Ticket/Flag Info</h1>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Select Service*</label>
                                        <select class="form-control" name="service_id" id="serviceTypeSelect">
                                            <option value="" selected disabled>Select Service</option>
                                            @foreach ($services as $service)
                                                <option @if ($service->id == $flag->service_id) selected @endif
                                                    value="{{ $service->id }}">{{ $service->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($flag->type != null)
                                        <div class="col-md-4">
                                            <label for="">Select Type*</label>
                                            <select class="form-control" name="type" id="serviceTypeSelect" required>
                                                <option value="" selected disabled>Select type</option>
                                                <option value="domestic" {{ $flag->type == 'domestic' ? 'selected' : '' }}>
                                                    Domestic</option>
                                                <option value="international"
                                                    {{ $flag->type == 'international' ? 'selected' : '' }}>International
                                                </option>
                                            </select>
                                        </div>
                                    @endif

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" name="name" class=" form-control" placeholder="Enter Title"
                                            value="{{ $flag->name }}">
                                    </div>
                                    
                                    {{-- <div class="form-group col-lg-6">
                                        <label>Phone:</label>
                                        <input type="number" name="phone" class="form-control" placeholder="Enter Phone"
                                            value="{{ $flag->phone }}">
                                    </div> --}}
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <label>Thumbnail(320x320):</label>
                                        <input type="file" name="thumbnail" class=" form-control" id="photoInput"
                                            value="">
                                            <img src="{{ $flag->thumbnail }}" class="mt-3" width="80" alt="">

                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Photo(550x250):</label>
                                        <input type="file" name="photo" class=" form-control" id="photoInput1">
                                        <img src="{{ $flag->photo }}" class="mt-3" width="80" alt="">

                                        <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label>Short Description:</label>
                                        <textarea name="short_description" id="editor2" class="form-control">{!! $flag->short_description !!}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Description:</label>
                                        <textarea name="description" id="editor" class="form-control" placeholder="Enter Description" rows="5">{!!  $flag->description !!}</textarea>
                                    </div>
                                </div>
                                {{-- @php
                                    $ticket_info_json = json_decode($flag->ticket_info);
                                    $count_des = 0;
                                    $count_des_sh = 0;
                                @endphp


                                @foreach ($ticket_info_json as $flag_json)
                                    <div class="row mt-3">
                                        <div class="form-group col-lg-3">
                                            <label>Name:</label>
                                            <input type="hidden" name="slug[]" id=""
                                                value="{{ @$flag_json->slug }}">
                                            <input type="text" name="name[]" value="{{ $flag_json->name }}"
                                                class=" form-control" placeholder="Enter Title">

                                        </div>
                                        @if (@$flag_json->phone != null)
                                            <div class="form-group col-lg-2">
                                                <label>Phone:</label>
                                                <input type="number" name="phone[]" value="{{ @$flag_json->phone }}"
                                                    class=" form-control" placeholder="Enter Phone">

                                            </div>
                                        @endif


                                        <div class="form-group col-lg-3">
                                            <label>Thumbnail(650x494):</label>
                                            <input type="hidden" name="hidden_thumbnail[]" id=""
                                                value="{{ @$flag_json->thumbnail }}">
                                            <input type="file" name="thumbnail[]" class=" form-control" id="photoInput">
                                            <img src="{{ @$flag_json->thumbnail }}" class="mt-3" width="60"
                                                alt="" id="">
                                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                                style="display: none; max-width: 80px; max-height: 80px;">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Photo(650x494):</label>
                                            <input type="hidden" name="photo_hidden[]" id=""
                                                value="{{ $flag_json->photo }}">
                                            <input type="file" name="photo[]" class=" form-control" id="photoInput">
                                            <img src="{{ $flag_json->photo }}" class="mt-3" width="60" alt=""
                                                id="">
                                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                                style="display: none; max-width: 80px; max-height: 80px;">
                                        </div>
                                        <div class="col-md-1">
                                            <img style="margin-top: 28px" onclick="removeRowfeature(this)"
                                                src="{{ asset('backend/images/icon/close.png') }}" alt=""
                                                style="cursor: pointer">
                                        </div>
                                        @if (@$flag_json->short_description != null)
                                            <div class="form-group col-lg-11">
                                                <label for="">Short Description:</label>
                                                <textarea name="short_description[]" id="editor_sh{{ $count_des_sh }}" class="form-control"
                                                    placeholder="Enter Description" rows="5">{{ @$flag_json->short_description }}</textarea>
                                            </div>
                                        @endif

                                        <div class="form-group col-lg-11 mt-3">
                                            <label for="">Description:</label>
                                            <textarea name="description[]" id="editor_{{ $count_des }}" class="form-control" placeholder="Enter Description"
                                                rows="5">{{ @$flag_json->description }}</textarea>
                                        </div>

                                    </div>
                                    <script>
                                        var count_des = '{{ $count_des }}';
                                        var count_des_sh = '{{ $count_des_sh }}';
                                        CKEDITOR.replace('editor_' + count_des);
                                        CKEDITOR.replace('editor_sh' + count_des_sh);
                                    </script>
                                    @php
                                        $count_des++;
                                        $count_des_sh++;
                                    @endphp
                                @endforeach


                                <span class="multiple_field"></span>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-success" onclick="addNewRow()">Add
                                            More</button>
                                    </div>
                                </div> --}}


                                {{-- <div class="form-group mt-3">
                                    <b>Description:</b>
                                    <textarea name="description" id="editor" class="form-control " rows="7" placeholder="Description">{{ $flag->description }}</textarea>

                                </div> --}}



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
                                        <input type="text" name="m_title" class="form-control mt-2"
                                            placeholder="Enter Meta Title" value="{{ $flag->m_title }}">

                                    </div>
                                    <div class=" form-group mt-3">
                                        <label>Meta Photo:(16x9 ratio recomended)</label>
                                        <input type="file" name="m_photo" class="form-control" id="photoInput">
                                        <img src="{{ $flag->m_photo }}" class="mt-3" width="80" alt="">
                                        
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Meta Keyword:</label>
                                        <input type="text" name="m_keyword" class="form-control"
                                            placeholder="Enter Meta Keyword" value="{{ $flag->m_keyword }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Meta Description:</label>
                                        <textarea name="m_description" class="form-control" placeholder="Enter Meta Description" rows="1">{{ $flag->m_description }}</textarea>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </section>
    <script>
        CKEDITOR.replace('editor');
        CKEDITOR.replace('editor2');
    </script>

@endsection
{{-- @push('script')
    <script>
        let count = 1;
        let count_s = 1;

        function addNewRow() {
            count++;
            count_s++;
            // Create a new row element
            var newRow = document.createElement('div');
            newRow.className = 'row mt-3';
            // Set the inner HTML of the new row
            newRow.innerHTML = `<div class="form-group col-lg-3">
                                            <label>Name:</label>
                                            <input type="text" name="name_new[]" class="form-control"
                                                placeholder="Enter Name" value="{{ old('name') }}">
                                                
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>Phone:</label>
                                            <input type="text" name="phone_new[]" class="form-control"
                                                placeholder="Enter Phone" value="{{ old('phone_new') }}">
                                                
                                        </div>
                                        <div class=" form-group col-lg-3">
                                            <label>Thumbnail(56x56px):</label>
                                            <input type="file" name="thumbnail_new[]" class=" form-control" id="photoInput"
                                                value="{{ old('photo') }}">

                                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                                style="display: none; max-width: 80px; max-height: 80px;">
                                        </div>
                                        <div class=" form-group col-lg-3">
                                            <label>Photo(56x56px):</label>
                                            <input type="file" name="photo_new[]" class=" form-control" id="photoInput"
                                                value="{{ old('photo') }}">

                                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                                style="display: none; max-width: 80px; max-height: 80px;">
                                        </div>
                                        <div class="form-group col-lg-1">
          <img style="cursor:pointer;margin-top:28px" src="/backend/images/icon/close.png" alt="Remove" class="remove-btn" onclick="removeRowfeature(this)">
       </div>
       <div class="form-group col-lg-11">
                                            <label for="">Short Description:</label>
                                            <textarea name="short_description_new[]" id="editor_des_sh_${count_s }" class="form-control" placeholder="Enter Description"
                                                rows="5">{{ old('short_description') }}</textarea>
                                        </div>
       <div class="form-group col-lg-11 mt-3">
                                        <label for="">Description:</label>
                                        <textarea name="description_new[]" id="editor_des_${count }" class="form-control" placeholder="Enter Description" rows="5">{{ old('description_new') }}</textarea>
                                    </div>
       `;
            // Append the new row to the "multiple_field" class element
            var multipleField = document.querySelector('.multiple_field');
            multipleField.appendChild(newRow);
            let count_id = `editor_des_${count}`
            let count_id_s = `editor_des_sh_${count_s}`
            CKEDITOR.replace(count_id);
            CKEDITOR.replace(count_id_s);
        }

        function removeRowfeature(image) {
            var row = image.closest('.row');
            row.parentNode.removeChild(row);
        }
    </script>
    <script>
        var count_des = `editor_{{ $count_des }}`;
        CKEDITOR.replace(count_des);
    </script>
@endpush --}}
