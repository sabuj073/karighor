@extends('layouts.backend.master')
@section('title', 'All Glance')
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
                                <h4 class="text-center">Active Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Sub Title</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($activeClient as $index => $client)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td >
                                                        <img src="{{ $client->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $client->title }}</td>
                                                    <td>{{ $client->number }}</td>
                                                    <td class="td_btn">

              <a href="#" data-href="{{ route('backend.client.update', $client->id) }}"
                data-item="{{ $client }}"
                                                            class="btn btn-sm btn-info edit">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="{{ route('backend.client.status', $client->id) }}"
                                                            class=" btn {{ $client->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($client->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.client.trash', $client->id) }}"
                                                            class=" btn btn-sm btn-danger">
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
                                        {{ $activeClient->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Sub Title</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($draftClient as $client)
                                                <tr>
                                                    <td>{{ $client->id }}</td>
                                                    <td >
                                                        <img src="{{ $client->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $client->title }}</td>
                                                    <td>{{ $client->number }}</td>
                                                    <td class="td_btn">

                                                        <a data-href="{{ route('backend.client.update', $client->id) }}"
                                                            data-item="{{ $client }}"
                                                            class="btn btn-sm btn-info edit">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="{{ route('backend.client.status', $client->id) }}"
                                                            class=" btn {{ $client->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($client->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.client.trash', $client->id) }}"
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
                                        {{ $draftClient->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Sub Title</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($trashedClient as $client)
                                                <tr>
                                                    <td>{{ $client->id }}</td>
                                                    <td >
                                                        <img src="{{ $client->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $client->title }}</td>
                                                    <td>{{ $client->number }}</td>
                                                    <td class="td_btn d-flex justify-content-center">
                                                        <a href="{{ route('backend.client.reStore', $client->id) }}"
                                                            class="btn btn-sm btn-success"
                                                            style="height: 22px;margin-right:5px">
                                                            <i class="fa-solid fa-box"></i>
                                                        </a>

                                                        <form action="{{ route('backend.client.delete', $client->id) }}"
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
                                        {{ $trashedClient->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card m_top">
                    <div class="card-header">
                        <h4>Add Glance</h4>
                    </div>
                    <div class="card-body">
                        <form></form>
                        <form action="{{ route('backend.client.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Photo(50x50):</label>
                                <input type="file" name="photo" class="form-control" onchange="imagePreView(this,'glance_img')">
                                <img id="glance_img" class="mt-3" src="#" alt="Preview"
                                    style="display: none; max-width: 80px; max-height: 80px;">
                            </div>
                            
                            <div class="form-group mt-3">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter title">
                            </div>
                            <div class="form-group mt-3">
                                <label>Sub Title:</label>
                                <input type="text" name="number" class="form-control " placeholder="Enter Number"
                                    id="">
                            </div>
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
                    <h5 class="modal-title" id="myModalLabel">Edit client Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class=" form-group">
                            <b>Photo(50x50):</b>
                            <input type="file" name="photo" class=" form-control" onchange="imagePreView(this,'glance_imgedit')">
                            <img src="" id="oldImg" class="mt-2" width="60" alt="client">
                            <img id="glance_imgedit" class="mt-3" src="#" alt="Preview"
                                style="display: none; max-width: 80px; max-height: 80px;">
                        </div>
                        
                        <div class="form-group mt-3">
                            <label>Title:</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                        </div>
                        <div class="form-group mt-3">
                            <label>Sub Title:</label>
                            <input type="text" name="number" id="number" class="form-control" placeholder="Enter Number">
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

            $('#title').val(item.title);
            $('#number').val(item.number);

            $('#oldImg').attr("src", item.photo);

            modal.find('form').attr('action', $(this).data('href'));
            modal.modal('show');
        });
    </script>
@endpush

<!-- sample modal content -->

