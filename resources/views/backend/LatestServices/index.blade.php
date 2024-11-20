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
                                <h4 class="text-center"> Latest Services </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Services Name</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($activeRequirement as $requirement)
                                                <tr>
                                                    <td>{{ $requirement->id }}</td>
                                                    <td>{{ getServicesName($requirement->services_id) }}</td>
                                                    <td>
                                                        <img src="{{ $requirement->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $requirement->title ?? 'null' }}</td>
                                                    <td>{!! \Illuminate\Support\Str::limit($requirement->description, 50) !!}</td>
                                                    <td class="td_btn">

                                                        <a href="{{ route('backend.LatestServices.edit', $requirement->id) }}"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.LatestServices.status', $requirement->id) }}"
                                                            class=" btn {{ $requirement->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $requirement->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.LatestServices.trash', $requirement->id) }}"
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
                                                <th>Services Name</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($draftRequirement as $requirement)
                                                <tr>

                                                    <td>{{ $requirement->id }}</td>
                                                    <td>{{ getServicesName($requirement->services_id) }}</td>
                                                    <td>
                                                        <img src="{{ $requirement->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $requirement->title ?? 'null' }}</td>
                                                    <td>{!! \Illuminate\Support\Str::limit($requirement->description, 50) !!}</td>



                                                    <td class="td_btn">

                                                        <a href="{{ route('backend.LatestServices.edit', $requirement->id) }}"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.LatestServices.status', $requirement->id) }}"
                                                            class=" btn {{ $requirement->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $requirement->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.LatestServices.trash', $requirement->id) }}"
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
                                                <th>Services Name</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($trashedRequirement as $requirement)
                                                <tr>

                                                    <td>{{ $requirement->id }}</td>
                                                    <td>{{ getServicesName($requirement->services_id) }}</td>
                                                    <td>
                                                        <img src="{{ $requirement->photo }}" width="80px"
                                                            alt="" style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $requirement->title ?? 'null' }}</td>
                                                    <td>{!! \Illuminate\Support\Str::limit($requirement->description, 50) !!}</td>


                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.LatestServices.reStore', $requirement->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form
                                                            action="{{ route('backend.LatestServices.delete', $requirement->id) }}"
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
    function updatedata(id, category, property_type) {
        $("#id").val(id);
        $("#category").val(category);
        $("#property_type").val(property_type);

    }
</script>
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Category Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.category.update') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <b>Category Name:</b>
                        <input type="text" name="category" id="category" class=" form-control"
                            placeholder="Enter name">
                        <input type="hidden" name="id" id="id" class=" form-control">
                    </div>
                    <div class="form-group">
                        <b>Category Name:</b>
                        <input type="text" name="property_type" id="property_type" class=" form-control"
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
