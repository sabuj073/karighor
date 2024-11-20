@extends('layouts.backend.master')
@section('title', 'All Professional Excellence')
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
                                <h4 class="text-center">Active Professional Excellence</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activeFback as $index => $testimonial)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ $testimonial->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{!! Str::limit($testimonial->description, 100, '...') !!}</td>
                                                    <td>{{ $testimonial->status }}</td>
                                                    <td class="td_btn text-center">
                                                        <a href="#"
                                                            data-href="{{ route('backend.testimonial.update', $testimonial->id) }} "
                                                            data-item="{{ $testimonial }}"
                                                            class="btn btn-sm btn-info edit">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="{{ route('backend.testimonial.status', $testimonial->id) }}"
                                                            class=" btn {{ $testimonial->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($testimonial->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>

                                                        <a href="{{ route('backend.testimonial.trash', $testimonial->id) }}"
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
                                        {{ $activeFback->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Professional Excellence</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($draftFback as $index => $testimonial)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ $testimonial->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{!! Str::limit($testimonial->description, 100, '...') !!}</td>
                                                    <td>{{ $testimonial->status }}</td>

                                                    <a href="#"
                                                        data-href="{{ route('backend.testimonial.update', $testimonial->id) }} "
                                                        data-item="{{ $testimonial }}" class="btn btn-sm btn-info edit">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>

                                                    <a href="{{ route('backend.testimonial.status', $testimonial->id) }}"
                                                        class=" btn {{ $testimonial->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                        @if ($testimonial->status == 'publish')
                                                            <i class="fa-solid fa-pen-ruler"></i>
                                                        @else
                                                            <i class="fa-solid fa-upload"></i>
                                                        @endif
                                                    </a>

                                                    <a href="{{ route('backend.testimonial.trash', $testimonial->id) }}"
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
                                        {{ $draftFback->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Professional Excellence</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trashedFback as $index => $testimonial)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ $testimonial->photo }}" width="80px"
                                                            alt="" style="padding: 0!important">
                                                    </td>
                                                    <td>{!! Str::limit($testimonial->description, 100, '...') !!}</td>
                                                    <td>{{ $testimonial->status }}</td>
                                                    <td class="td_btn d-flex">
                                                        {{-- <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#trashModal"
                                                            class="btn btn-sm btn-success">View</a> --}}
                                                        <a href="{{ route('backend.testimonial.reStore', $testimonial->id) }}"
                                                            class="btn btn-sm btn-success"
                                                            style="height: 22px;margin-right:5px">
                                                            <i class="fa-solid fa-box"></i>
                                                        </a>

                                                        <form
                                                            action="{{ route('backend.testimonial.delete', $testimonial->id) }}"
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
                                        {{ $trashedFback->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- sample modal content -->
    <div id="edit" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Edit Professional Excellence Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" id="name" class=" form-control"
                                placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label>Designation:</label>
                            <input type="text" name="designation" id="designation" class=" form-control"
                                placeholder="Enter Designation">
                        </div> --}}
                        <div class="form-group">
                            <label>Photo(280x280):</label>
                            <input type="file" name="photo" class="form-control" id="photoInput">
                            <img src="" id="oldImg" class="mt-2" width="60" alt="">
                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                style="display: none; max-width: 80px; max-height: 80px;">
                        </div>
                        <div class="form-group mt-3">
                            <label>Alter Text:</label>
                            <input type="text" name="alt_text" id="alt_text" class=" form-control"
                                placeholder="Enter Alter Text">
                        </div>
                        <div class="row mt-3">
                            <div class="form-group">
                                <label for="">Description:</label>
                                <textarea name="description" id="description" class="form-control" rows="7">{{ $testimonial->description }}</textarea>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection

@push('script')
    <script>
        $(document).on('click', '.edit', function(e) {
            const modal = $('#edit');

            const item = $(this).data('item');

            $('#name').val(item.name);
            $('#designation').val(item.designation);
            $('#alt_text').val(item.alt_text);
            CKEDITOR.instances['description'].setData(item.description)
            $('#oldImg').attr("src", item.photo);

            modal.find('form').attr('action', $(this).data('href'));
            modal.modal('show');
        });
    </script>
@endpush
