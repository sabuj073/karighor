@extends('layouts.backend.master')
@section('title', 'All partner')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                {{-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
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
                </ul> --}}
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">All Team Type</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th class="text-left">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($activeRequirement as $index => $requirement)
                                                <tr>
                                                    <td>{{ $index + 1 + ($activeRequirement->currentPage() - 1) * $activeRequirement->perPage() }}
                                                    </td>
                                                    <td>{{ $requirement->name }}</td>

                                                    <td class="td_btn d-flex justify-content-center">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $requirement->id }}','{{ $requirement->name }}','{{ $requirement->slug }}','{{ $requirement->parent_id }}','{{ $requirement->featured_type }}')"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        {{-- <a href="{{ route('backend.requirementType.status', $requirement->id) }}"
                                                            class=" btn {{ $requirement->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $requirement->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.requirementType.trash', $requirement->id) }}"
                                                            class=" btn btn-sm btn-danger">Trash</a> --}}
                                                        <form
                                                            action="{{ route('backend.requirementType.delete', $requirement->id) }}"
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
                                        {{ $activeRequirement->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
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
                                                <th>Requirement Name</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($draftRequirement as $requirement)
                                                <tr>
                                                    <td>{{ $requirement->id }}</td>
                                                    <td>{{ $requirement->name }}</td>


                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $requirement->id }}','{{ $requirement->name }}','{{ $requirement->parent_id }}','{{ $requirement->featured_type }}')"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.requirementType.status', $requirement->id) }}"
                                                            class=" btn {{ $requirement->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $requirement->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.requirementType.trash', $requirement->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>
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
                                                <th>Requirement name</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($trashedRequirement as $requirement)
                                                <tr>
                                                    <td>{{ $requirement->id }}</td>
                                                    <td>{{ $requirement->name }}</td>

                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.requirementType.reStore', $requirement->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form
                                                            action="{{ route('backend.requirementType.delete', $requirement->id) }}"
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
                    </div> --}}
                </div>

            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Type</h4>
                    </div>
                    <div class="card-body">
                        <form></form>
                        <form action="{{ route('backend.requirementType.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class=" form-group">
                                <label>Team Type:</label>
                                <input type="text" name="name" class=" form-control" placeholder="Add Team type"
                                    value="{{ old('name') }}">
                            </div>



                            <button type="submit" class=" btn btn-sm btn-primary my-3">Add+</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function updatedata(id, name, slug) {
        $("#id").val(id);
        $("#name").val(name);
        $("#slug").val(slug);

    }
</script>
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Requirement type Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.requirementType.update', $requirement->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <b>Name:</b>
                        <input type="text" name="name" id="name" class=" form-control"
                            placeholder="Enter name">
                        <input type="hidden" name="id" id="id" class=" form-control">
                    </div>

                    {{-- <div class="mt-3 form-group">
                        <b>Slug:</b>
                        <input class="form-control" type="text" name="slug" id="slug">
                    </div> --}}




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
