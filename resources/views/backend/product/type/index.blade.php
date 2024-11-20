@extends('layouts.backend.master')
@section('title', 'All type')
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
                                <h4 class="text-center">Active type</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($activetype as $index => $type)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $type->name }}</td>
                                                    <td class="td_btn d-flex justify-content-center" style="gap: 10px">

                                                        <a href="#" data-href="{{ route('backend.type.update', $type->id) }}"
                                                            data-item="{{ $type }}"
                                                            class="btn btn-sm btn-info edit">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                       
                                                        
                                                        <form action="{{ route('backend.type.delete', $type->id) }}"
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
                                        {{ $activetype->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft types</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($drafttype as $type)
                                                <tr>
                                                    <td>{{ $type->id }}</td>
                                                    <td>
                                                        <img src="{{ $type->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $type->status }}</td>
                                                    <td class="td_btn">

                                                        <a href="#" data-href="{{ route('backend.type.update', $type->id) }}"
                                                            data-item="{{ $type }}"
                                                            class="btn btn-sm btn-info edit">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="{{ route('backend.type.status', $type->id) }}"
                                                            class=" btn {{ $type->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($type->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.type.trash', $type->id) }}"
                                                            class="btn btn-sm btn-danger">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $drafttype->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed types</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($trashedtype as $type)
                                                <tr>
                                                    <td>{{ $type->id }}</td>
                                                    <td>
                                                        <img src="{{ $type->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $type->status }}</td>
                                                    <td class="td_btn d-flex justify-content-center">
                                                        <a href="{{ route('backend.type.reStore', $type->id) }}"
                                                            class="btn btn-sm btn-success"
                                                            style="height: 22px;margin-right:5px">
                                                            <i class="fa-solid fa-box"></i>
                                                        </a>

                                                        <form action="{{ route('backend.type.delete', $type->id) }}"
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
                                        {{ $trashedtype->links() }}
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
                        <h4>Add type</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('backend.type.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" required>
                            <button type="submit" class=" btn btn-sm btn-primary my-3">Add+</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="edit" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Edit factSheet Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mt-3">
                            <label>Name:</label>
                            <input type="text" name="name" id="name" class=" form-control" >
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
@endsection
@push('script')
    <script>
        $(document).on('click', '.edit', function(e) {
            const modal = $('#edit');
            const item = $(this).data('item');


            $('#name').val(item.name);
            $('#oldImg').attr("src", item.photo);

            modal.find('form').attr('action', $(this).data('href'));
            modal.modal('show');
        });
    </script>
@endpush

