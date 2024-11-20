@extends('layouts.backend.master')
@section('title', 'All whyChoose')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Active</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Draft</button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Trash</button>
                    </li> --}}
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Active Why Choose Info</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Icon</th>
                                                <th>Name</th>
                                                <th>Counter</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th class="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activewhychoose as $index => $whyChoose)
                                                <tr>
                                                    <td>{{ $index + 1 + ($activewhychoose->currentPage() - 1) * $activewhychoose->perPage()}}</td>
                                                    <td>
                                                        <img src="{{ $whyChoose->icon }}" width="80px" height="60px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $whyChoose->title }}</td>
                                                    <td>{{ $whyChoose->counter }}</td>
                                                    <td>{!! Str::limit($whyChoose->description, 50, '...') !!}</td>
                                                    <td>{{ $whyChoose->status }}</td>
                                                    <td class="td_btn">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $whyChoose->id }}','{{ $whyChoose->title }}','{{ $whyChoose->slug }}','{{ $whyChoose->icon }}','{{ $whyChoose->alt_text }}','{{ $whyChoose->counter }}','{{ mysql_escape($whyChoose->description) }}')"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="{{ route('backend.whyChoose.status', $whyChoose->id) }}"
                                                            class=" btn {{ $whyChoose->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($whyChoose->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        {{-- <a href="{{ route('backend.whyChoose.trash', $whyChoose->id) }}"
                                                            class="btn btn-sm btn-danger">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activewhychoose->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft WhyChoose</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Icon</th>
                                                <th>Name</th>
                                                <th>Counter</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($draftwhychoose as $index => $whyChoose)
                                                <tr>
                                                    <td>{{ $index + 1 + ($draftwhychoose->currentPage() - 1) * $draftwhychoose->perPage()}}</td>
                                                    <td>
                                                        <img src="{{ $whyChoose->icon }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $whyChoose->title }}</td>
                                                    <td>{{ $whyChoose->counter }}</td>
                                                    <td>{{ Str::limit($whyChoose->description, 50, '...') }}</td>
                                                    <td>{{ $whyChoose->status }}</td>
                                                    <td class="td_btn">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $whyChoose->id }}','{{ $whyChoose->title }}','{{ $whyChoose->slug }}','{{ $whyChoose->alt_text }}','{{ $whyChoose->counter }}','{{ mysql_escape($whyChoose->description) }}')"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="{{ route('backend.whyChoose.status', $whyChoose->id) }}"
                                                            class=" btn {{ $whyChoose->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($whyChoose->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        {{-- <a href="{{ route('backend.whyChoose.trash', $whyChoose->id) }}"
                                                            class="btn btn-sm btn-danger">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftwhychoose->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed whyChoose</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Icon</th>
                                                <th>Name</th>
                                                <th>Counter</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trashedwhychoose as $index => $whyChoose)
                                                <tr>
                                                    <td>{{ $index + 1 + ($trashedwhychoose->currentPage() - 1) * $trashedwhychoose->perPage()}}</td>
                                                    <td>
                                                        <img src="{{ $whyChoose->icon }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $whyChoose->title }}</td>
                                                    <td>{{ $whyChoose->counter }}</td>
                                                    <td>{{ Str::limit($whyChoose->description, 50, '...') }}</td>
                                                    <td>{{ $whyChoose->status }}</td>
                                                    <td class="td_btn d-flex justify-content-center">
                                                        <a href="{{ route('backend.whyChoose.reStore', $whyChoose->id) }}"
                                                            class="btn btn-sm btn-success">
                                                            <i class="fa-solid fa-box"></i>
                                                        </a>

                                                        <form
                                                            action="{{ route('backend.whyChoose.delete', $whyChoose->id) }}"
                                                            method="POST" class="delete_form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you Sure to Delete?')">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $trashedwhychoose->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
<script>
    function updatedata(id, title, slug,icon, alt_text, counter, description) {
        $("#id").val(id);
        $("#title").val(title);
        $("#slug").val(slug);
        $("#slug").val(slug);
        $('#icon').attr('src', icon);
        $("#counter").val(counter);
        CKEDITOR.instances['editor'].setData(description)
    }
</script>
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit WhyChoose Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('backend.whyChoose.update', $whyChoose->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Name:</label>
                        <input type="hidden" name="id" id="id" class="form-control">
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ $whyChoose->title }}">
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Counter:</label>
                        <input type="text" name="counter" id="counter" class="form-control"
                            value="{{ $whyChoose->counter }}">
                    </div> --}}
                    <div class="row mt-3">
                        {{-- <div class="form-group col-lg-4">
                            <label for="">Slug:</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ $whyChoose->slug }}">
                        </div> --}}
                        <div class=" form-group">
                            <b>Icon(50x50):</b>
                            <input type="file" name="icon" class=" form-control" id="photoInput">
                            <img src="" id="icon" class="mt-2" width="60" alt="Why Choose Icon">
                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                style="display: none; max-width: 80px; max-height: 80px;">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">Alter Text:</label>
                            <input type="text" name="alt_text" id="alt_text" class="form-control"
                                value="{{ $whyChoose->alt_text }}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Description:</label>
                            <textarea name="description" id="editor" class="form-control" rows="7"></textarea>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@foreach ($whychooseModaldata as $whyChoose)
    <div id="viewModal{{ $whyChoose->id }}" class="modal custom_modal fade" tabindex="-1"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title text-center" id="myModalLabel">WhyChoose Info</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-3">
                            <label for="">Icon:</label>
                            <br>
                            <img src="{{ $whyChoose->icon }}" width="100" height="80" alt="">
                        </div>
                        <div class="col-lg-3">
                            <label for="">Title:</label>
                            <br>
                            {{ $whyChoose->title }}
                        </div>
                        <div class="col-lg-3">
                            <label for="">Slug:</label>
                            <br>
                            {{ $whyChoose->slug }}
                        </div>
                        <div class="col-lg-3">
                            <label for="">Alter Text:</label>
                            <br>
                            {{ $whyChoose->alt_text }}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label for="">Description:</label>
                            <br>
                            {!! $whyChoose->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
