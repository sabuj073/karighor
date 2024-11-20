@extends('layouts.backend.master')
@section('title', 'All Photos')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                {{--  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
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
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Gallery Photos</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Photos</th>
                                                        <!--<th>Year</th>-->
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">

                                                    @foreach ($activepGallery as $index => $childphotos)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>
                                                                @if ($childphotos->photo)
                                                                    @php
                                                                        $photoArray = explode(';', $childphotos->photo);
                                                                        $total_photo = count($photoArray);
                                                                    @endphp


                                                                    {{ $total_photo }} Photos
                                                                @endif
                                                            </td>

                                                            <!--<td>{{ getPhotoname($childphotos->parent_id) }}</td>-->


                                                            <td class="td_btn d-flex justify-content-center">
                                                                <a href="{{ route('backend.photoGallery.edit', $childphotos->id) }}"
                                                                    class="btn btn-sm btn-info" style="margin-right:5px">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                                {{--  <a href="{{ route('backend.photoGallery.status', $childphotos->id) }}"
                                                                    class=" btn {{ $childphotos->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $childphotos->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                                <a href="{{ route('backend.photoGallery.trash', $childphotos->id) }}"
                                                                    class="btn btn-sm btn-danger">Trash</a> --}}

                                                                <form
                                                                    action="{{ route('backend.photoGallery.delete', $childphotos->id) }}"
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
                                                {{ $activepGallery->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-lg-3">-->
                            <!--    <div class="card">-->
                            <!--        <div class="card-header">-->
                            <!--            <h4 class="text-center">Gallery Year</h4>-->
                            <!--        </div>-->
                            <!--        <div class="card-body">-->
                            <!--            <div class="table-responsive">-->
                            <!--                <table class="table">-->
                            <!--                    <thead class="">-->
                            <!--                        <tr>-->
                            <!--                            <th>SL</th>-->
                            <!--                            <th>Year</th>-->
                            <!--                            <th class="text-center">Action</th>-->
                            <!--                        </tr>-->
                            <!--                    </thead>-->
                            <!--                    <tbody class="table">-->

                            <!--                        @foreach ($activeParent as $index => $parentphotos)-->
                            <!--                            <tr>-->
                            <!--                                <td>{{ $index + 1 }}</td>-->
                            <!--                                <td>{{ $parentphotos->year }}</td>-->


                            <!--                                <td class="td_btn d-flex justify-content-center">-->
                            <!--                                    <a href="#"-->
                            <!--                                        data-href="{{ route('backend.photoGallery.update', $parentphotos->id) }} "-->
                            <!--                                        data-item="{{ $parentphotos }}"-->
                            <!--                                        class="btn btn-sm btn-info edit">-->
                            <!--                                        <i class="fa-solid fa-pen-to-square"></i>-->
                            <!--                                    </a>-->
                            <!--                                    {{-- <a href="{{ route('backend.photoGallery.status', $parentphotos->id) }}"-->
                            <!--      class=" btn {{ $parentphotos->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $parentphotos->status == 'publish' ? 'Draft' : 'Publish' }}</a>-->
                            <!--    <a href="{{ route('backend.photoGallery.trash', $parentphotos->id) }}"-->
                            <!--      class="btn btn-sm btn-danger">Trash</a> --}}-->

                            <!--                                    <form-->
                            <!--                                        action="{{ route('backend.photoGallery.delete', $parentphotos->id) }}"-->
                            <!--                                        method="POST" class="delete_form">-->
                            <!--                                        @csrf-->
                            <!--                                        @method('DELETE')-->
                            <!--                                        <button type="submit" class="btn btn-sm btn-danger"-->
                            <!--                                            onclick="return confirm('Are you Sure to Delete?')">-->
                            <!--                                            <i class="fa-solid fa-trash-can"></i>-->
                            <!--                                        </button>-->
                            <!--                                    </form>-->
                            <!--                                </td>-->
                            <!--                            </tr>-->
                            <!--                        @endforeach-->
                            <!--                    </tbody>-->
                            <!--                </table>-->
                            <!--            </div>-->
                            <!--            <div class="row justify-content-end">-->
                            <!--                <div class="mt-3">-->
                            <!--                    {{ $activeParent->links() }}-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            {{-- <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Bradcrumb Photos</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>SL</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    <tr>
                                                        <td>1</td>
                                                        <td>

                                                            @if ($slider->slider)
                                                                @php
                                                                    $photoArray = explode(';', $slider->slider);
                                                                    $total_photo = count($photoArray);
                                                                @endphp


                                                                {{ $total_photo }} Photos
                                                            @endif
                                                        </td>


                                                        <td class="td_btn d-flex justify-content-center">
                                                            <a href="{{ route('backend.photoGallery.slider',8) }}"
                                                                class="btn btn-sm btn-info edit">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>


                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Draft Child Gallery</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Photos</th>
                                                        <th>Parent name</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">

                                                    @foreach ($draftpGallery as $childphotos)
                                                        <tr>
                                                            <td>{{ $childphotos->id }}</td>
                                                            <td>
                                                                @if ($childphotos->photo)
                                                                    @php
                                                                        $photoArray = explode(';', $childphotos->photo);
                                                                        $total_photo = count($photoArray);
                                                                    @endphp


                                                                    {{ $total_photo }} Photos
                                                                @endif
                                                            </td>

                                                            <td>{{ getPhotoname($childphotos->parent_id) }}</td>


                                                            <td class="td_btn text-center">
                                                                <a href="{{ route('backend.photoGallery.edit', $childphotos->id) }}"
                                                                    class="btn btn-sm btn-info">Edit</a>
                                                                <a href="{{ route('backend.photoGallery.status', $childphotos->id) }}"
                                                                    class=" btn {{ $childphotos->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $childphotos->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                                <a href="{{ route('backend.photoGallery.trash', $childphotos->id) }}"
                                                                    class="btn btn-sm btn-danger">Trash</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="mt-3">
                                                {{ $draftpGallery->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Draft Parent Gallery</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Photos</th>
                                                        <th>Title</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">

                                                    @foreach ($draftParent as $parentphotos)
                                                        <tr>
                                                            <td>{{ $parentphotos->id }}</td>
                                                            <td>
                                                                <img width="60"
                                                                    src="{{ $parentphotos->thumb_photo }}"
                                                                    alt="">
                                                            </td>

                                                            <td>{{ $parentphotos->title }}</td>


                                                            <td class="td_btn text-center">
                                                                <a href="{{ route('backend.photoGallery.edit', $parentphotos->id) }}"
                                                                    class="btn btn-sm btn-info">Edit</a>
                                                                <a href="{{ route('backend.photoGallery.status', $parentphotos->id) }}"
                                                                    class=" btn {{ $parentphotos->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $parentphotos->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                                <a href="{{ route('backend.photoGallery.trash', $parentphotos->id) }}"
                                                                    class="btn btn-sm btn-danger">Trash</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="mt-3">
                                                {{ $activepGallery->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Trashed Child Gallery</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Photos</th>
                                                        <th>Parent name</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">

                                                    @foreach ($trashedpGallery as $childphotos)
                                                        <tr>
                                                            <td>{{ $childphotos->id }}</td>
                                                            <td>
                                                                @if ($childphotos->photo)
                                                                    @php
                                                                        $photoArray = explode(';', $childphotos->photo);
                                                                        $total_photo = count($photoArray);
                                                                    @endphp


                                                                    {{ $total_photo }} Photos
                                                                @endif
                                                            </td>

                                                            {{--  <td>{{ getPhotoname($childphotos->parent_id) }}</td> --}}


                                                            <td class="td_btn text-center">

                                                                <<a href="{{ route('backend.photoGallery.reStore', $childphotos->id) }}"
                                                                    class="btn btn-sm btn-success">Restore</a>
                                                                    <a href="{{ route('backend.photoGallery.delete', $childphotos->id) }}"
                                                                        class="btn btn-sm btn-danger">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="mt-3">
                                                {{ $trashedpGallery->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Trashed Parent Gallery</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Photos</th>
                                                        <th>Title</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">

                                                    @foreach ($trashedParent as $parentphotos)
                                                        <tr>
                                                            <td>{{ $parentphotos->id }}</td>
                                                            <td>
                                                                <img width="60"
                                                                    src="{{ $parentphotos->thumb_photo }}"
                                                                    alt="">
                                                            </td>

                                                            <td>{{ $parentphotos->title }}</td>


                                                            <td class="td_btn text-center">
                                                                <<a href="{{ route('backend.photoGallery.reStore', $parentphotos->id) }}"
                                                                    class="btn btn-sm btn-success">Restore</a>

                                                                    <a href="{{ route('backend.photoGallery.delete', $childphotos->id) }}"
                                                                        class="btn btn-sm btn-danger">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="mt-3">
                                                {{ $trashedParent->links() }}
                                            </div>
                                        </div>
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
                    <h5 class="modal-title" id="myModalLabel">Edit Year</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Year:</label>
                                <input type="hidden" name="id" id="id">
                                <input type="text" name="year" id="year" class="form-control"
                                    placeholder="Enter Year">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        $(document).on('click', '.edit', function(e) {
            const modal = $('#edit');

            const item = $(this).data('item');

            $('#year').val(item.year);

            modal.find('form').attr('action', $(this).data('href'));
            modal.modal('show');
        });
    </script>
@endpush
