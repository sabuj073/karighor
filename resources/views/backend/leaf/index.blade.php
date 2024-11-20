@extends('layouts.backend.master')
@section('title', 'All Leafs')
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
                                <h4 class="text-center">Change Leaf</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <td>Section Name</td>
                                                <th>Alter Text</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($activePartner as $index=>$partner)
                                                <tr>
                                                    <td>{{ $index + 1 + ($activePartner->currentPage() - 1) * $activePartner->perPage() }}</td>

                                                    <td style="background: #beaeae">
                                                        <img src="{{ $partner->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $partner->section_name ?? 'null' }}</td>

                                                    <td>{{ $partner->alt_text }}</td>
                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $partner->id }}','{{ $partner->photo }}','{{ $partner->section_name }}','{{ $partner->alt_text }}')"
                                                            class="btn btn-sm btn-info">Edit</a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activePartner->links() }}
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
    function updatedata(id, photo, section_name, alt_text) {
        $("#id").val(id);
        $('#edit_image').attr('src', photo);
        $("#section_name").val(section_name);
        $("#alt_text").val(alt_text);
    }
</script>
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Contact Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.leaf.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class=" form-group">
                        <input type="hidden" name="id" id="id" class="form-control">
                    </div>

                    <div class=" form-group">
                        <label>Photo(200x200):</label>
                        <input type="file"  name="photo" class=" form-control" id="photoInput">
                        <img src="" id="edit_image" class="mt-2" width="60" alt="partner">
                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                            style="display: none; max-width: 80px; max-height: 80px;">
                    </div>
                    <div class=" form-group">
                        <label>Section Name:</label>
                        <input type="text" id="section_name" name="section_name" class="form-control"
                            id="photoInput" readonly>

                    </div>
                    <div class=" form-group">
                        <label>Alter Text:</label>
                        <input type="text" id="alt_text" name="alt_text" class="form-control">

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
