@extends('layouts.backend.master')
@section('title', 'All Package Details')
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
                                <h4 class="text-center">Active Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="myTable">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Service</th>
                                                <th>Package</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activeData as $index=>$packagesDetails)
                                                <tr>
                                                    <td>{{ $index + 1 + ($activeData->currentPage() - 1) * $activeData->perPage()}}</td>

                                                    <td>{{ $packagesDetails->package->service->title }}</td>
                                                    <td>{{ $packagesDetails->package->package_title }}</td>  
                                                    <td class="td_btn text-center">
                                                        <a href="{{ route('backend.package_details.edit', $packagesDetails->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <a href="{{ route('backend.package_details.status', $packagesDetails->id) }}"
                                                            class="{{ $packagesDetails->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($packagesDetails->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.package_details.trash', $packagesDetails->id) }}"
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
                                      {{ $activeData->links() }}
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
                                    <table class="table" id="myTable">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Slider</th>
                                                <th>Order Level</th>
                                                <th>Title</th>
                                                <th>Short Description</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trashedData as $index=>$packagesDetails)
                                                <tr>
                                                    <td>{{ $index + 1 + ($draftData->currentPage() - 1) * $draftData->perPage()}}</td>

                                                    <td>
                                                        @if ($packagesDetails->slider)
                                                            @php
                                                                $photoArray = explode(';', $packagesDetails->slider);
                                                                $total_photo = count($photoArray);
                                                            @endphp

                                                            {{ $total_photo }} Photos
                                                        @else
                                                            No Photos
                                                        @endif
                                                    </td>
                                                    <td>{{ $packagesDetails->order_level }}</td>
                                                    <td>{{ $packagesDetails->title }}</td>

                                                    <td>
                                                        {!! Str::limit($packagesDetails->short_description, 50) !!}
                                                    </td>


                                                    <td class="td_btn text-center">
                                                        <a href="{{ route('backend.package_details.edit', $packagesDetails->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <a href="{{ route('backend.package_details.status', $packagesDetails->id) }}"
                                                            class="{{ $packagesDetails->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($packagesDetails->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.packages_details.trash', $packagesDetails->id) }}"
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
                                        {{ $draftData->links() }}
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
                                    <table class="table" id="myTable">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Slider</th>
                                                <th>Order Level</th>
                                                <th>Title</th>
                                                <th>Short Description</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trashedData as $index=>$packagesDetails)
                                                <tr>
                                                    <td>{{ $index + 1 + ($trashedData->currentPage() - 1) * $trashedData->perPage()}}</td>

                                                    <td>
                                                        @if ($packagesDetails->slider)
                                                            @php
                                                                $photoArray = explode(';', $packagesDetails->slider);
                                                                $total_photo = count($photoArray);
                                                            @endphp

                                                            {{ $total_photo }} Photos
                                                        @else
                                                            No Photos
                                                        @endif
                                                    </td>
                                                    <td>{{ $packagesDetails->order_level }}</td>
                                                    <td>{{ $packagesDetails->title }}</td>

                                                    <td>
                                                        {!! Str::limit($packagesDetails->short_description, 50) !!}
                                                    </td>


                                                    <td class="td_btn text-center">

                                                        <a
                                                            href="{{ route('backend.package_details.reStore', $packagesDetails->id) }}"class="btn btn-success">
                                                            <i class="fa-solid fa-box"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('backend.package_details.delete', $packagesDetails->id) }}"
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
                                        {{ $trashedData->links() }}
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
