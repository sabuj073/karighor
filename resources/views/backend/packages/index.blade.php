@extends('layouts.backend.master')
@section('title', 'All packages')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
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
                                <h4 class="text-center"> Packages </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Title</th>
                                                <th>Service name</th>
                                                <th>Price</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($activeRequirement as $index=>$requirement)
                                                <tr>
                                                    <td>{{ $index + 1 + ($activeRequirement->currentPage() - 1) * $activeRequirement->perPage()}}</td>
                                                    <td>{{ $requirement->package_title ?? 'null' }}</td>
                                                    <td>{{ getServicesName($requirement->service_id) }}</td>
                                                    <td>{{ $requirement->package_price ?? 'null' }}</td>
                                                    <td>{{ $requirement->phone ?? 'null' }}</td>
                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.packages.edit', $requirement->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('backend.packages.status', $requirement->id) }}"
                                                            class="btn {{ $requirement->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            <i
                                                                class="{{ $requirement->status == 'publish' ? 'far fa-file' : 'fas fa-check' }}"></i>
                                                        </a>
                                                        <a href="{{ route('backend.packages.trash', $requirement->id) }}"
                                                            class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
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
                                                <th>SL</th>
                                                <th>Title</th>
                                                <th>Service Name</th>
                                                <th>Price</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($draftRequirement as $index=>$requirement)
                                                <tr>
                                                    <td>{{ $index + 1 + ($draftRequirement->currentPage() - 1) * $draftRequirement->perPage()}}</td>
                                                    <td>{{ $requirement->package_title ?? 'null' }}</td>
                                                    <td>{{ getServicesName($requirement->service_id) }}</td>
                                                    <td>{{ $requirement->phone ?? 'null' }}</td>

                                                    <td class="td_btn text-center">
                                                        <a href="{{ route('backend.packages.edit', $requirement->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <a href="{{ route('backend.packages.status', $requirement->id) }}"
                                                            class="{{ $requirement->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($requirement->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.packages.trash', $requirement->id) }}"
                                                            class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
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
                                                <th>Sl</th>
                                                <th>Title</th>
                                                <th>Service Name</th>
                                                <th>Price</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($trashedRequirement as $index=>$requirement)
                                                <tr>
                                                    <td>{{ $index + 1 + ($trashedRequirement->currentPage() - 1) * $trashedRequirement->perPage()}}</td>
                                                    <td>{{ $requirement->package_title ?? 'null' }}</td>
                                                    <td>{{ getServicesName($requirement->service_id) }}</td>
                                                    <td>{{ $requirement->phone ?? 'null' }}</td>

                                                    <td class="td_btn d-flex text-center">
                                                        <a href="{{ route('backend.packages.reStore', $requirement->id) }}"
                                                            class="btn btn-success mr-2">
                                                            <i class="fa-solid fa-box mr-1"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('backend.packages.delete', $requirement->id) }}"
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
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
<script>
    function updatedata(id, service_id, package_title, package_slug, package_photo, package_limitation, package_price,
        total_day, start_date, tour_description) {
        $("#id").val(id);
        $("#service_id").val(service_id);
        $("#package_title").val(package_title);
        $("#package_slug").val(package_slug);
        $('#edit_image2').attr('src', package_photo);


        $("#package_limitation").val(package_limitation);
        $("#package_price").val(package_price);
        $("#total_day").val(total_day);
        $("#start_date").val(start_date);
        CKEDITOR.instances['editor'].setData(tour_description)



    }
</script>
<!-- sample modal content -->
