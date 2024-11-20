@extends('layouts.backend.master')
@section('title', 'All partner')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
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
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Trash</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center"> Features </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Property Name</th>

                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($activeRequirement as $requirement)
                                                <tr>
                                                    <td>{{ $requirement->id }}</td>
                                                    <td>
                                                        <img src="{{ $requirement->photo ?? 'null' }}" width="80px"
                                                            alt="" style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $requirement->title ?? 'null' }}</td>
                                                    <td>{{ $requirement->description ?? 'null' }}</td>
                                                    <td>{{ $requirement->property->title ?? 'null' }}</td>





                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $requirement->id }}','{{ $requirement->photo }}','{{ $requirement->alt_text }}','{{ $requirement->title }}','{{ $requirement->description }}')"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.features.status', $requirement->id) }}"
                                                            class=" btn {{ $requirement->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $requirement->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.features.trash', $requirement->id) }}"
                                                            class=" btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activeRequirement->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Requirement</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Property Name</th>

                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($draftRequirement as $requirement)
                                                <tr>
                                                    <td>{{ $requirement->id }}</td>
                                                    <td>
                                                        <img src="{{ $requirement->photo ?? 'null' }}" width="80px"
                                                            alt="" style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $requirement->title ?? 'null' }}</td>
                                                    <td>{{ $requirement->description ?? 'null' }}</td>
                                                    <td>{{ $requirement->property->title ?? 'null' }}</td>




                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $requirement->id }}','{{ $requirement->photo }}','{{ $requirement->alt_text }}','{{ $requirement->title }}','{{ $requirement->description }}')"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.features.status', $requirement->id) }}"
                                                            class=" btn {{ $requirement->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $requirement->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.features.trash', $requirement->id) }}"
                                                            class=" btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftRequirement->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Partners</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Property Name</th>

                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($trashedRequirement as $requirement)
                                                <tr>
                                                    <td>{{ $requirement->id }}</td>
                                                    <td>
                                                        <img src="{{ $requirement->photo ?? 'null' }}" width="80px"
                                                            alt="" style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $requirement->title ?? 'null' }}</td>
                                                    <td>{{ $requirement->description ?? 'null' }}</td>
                                                    <td>{{ $requirement->property->title ?? 'null' }}</td>


                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.features.reStore', $requirement->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form
                                                            action="{{ route('backend.features.delete', $requirement->id) }}"
                                                            method="POST" class="delete_form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you Sure to Delete?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $trashedRequirement->links() }}
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
<script>
    function updatedata(id, photo, alt_text, title, description) {
        $("#id").val(id);
        $('#edit_image').attr('src', photo);
        $("#alt_text").val(alt_text);
        $("#title").val(title);
        $("#description").val(description);

    }
</script>
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Features Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.features.update') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group mt-3">
                        <b>Feature Photo:</b>
                        <input type="file" name="photo" class=" form-control" id="edit_image">
                        <img src="{{ $requirement->photo }}" class="mt-3" width="60" alt="">
                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                            style="display: none; max-width: 80px; max-height: 80px;">
                        <input type="hidden" name="id" id="id">
                    </div>
                    <div class="form-group">
                        <b>Alter Text:</b>
                        <input type="text" name="alt_text" id="alt_text" class=" form-control"
                            placeholder="Enter name">

                    </div>
                    <div class="form-group">
                        <b>Title:</b>
                        <input type="text" name="title" id="title" class=" form-control"
                            placeholder="Enter name">

                    </div>
                    <div class="form-group">
                        <b>Description:</b>
                        <input type="text" name="description" id="description" class=" form-control"
                            placeholder="Enter name">

                    </div>




                    <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div> --}}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
