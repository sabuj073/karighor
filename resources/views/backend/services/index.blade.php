@extends('layouts.backend.master')
@section('title', 'All Services')
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
                                <h4 class="text-center">Active Service Info</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="myTable">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Thumbnail</th>
                                                <th>Slider</th>
                                                <th>Order Level</th>
                                                <th>Title</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activeService as $index => $services)
                                                <tr>
                                                    <td>{{ $index + 1 + ($activeService->currentPage() - 1) * $activeService->perPage() }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ $services->thumbnail }}" width="80" alt="">
                                                    </td>

                                                    <td>
                                                        @if ($services->slider)
                                                            @php
                                                                $photoArray = explode(';', $services->slider);
                                                                $total_photo = count($photoArray);
                                                            @endphp

                                                            {{ $total_photo }} Photos
                                                        @else
                                                            No Photos
                                                        @endif
                                                    </td>
                                                    <td>{{ $services->order_level }}</td>
                                                    <td>{{ $services->title }}</td>


                                                    <td class="td_btn text-center">
                                                        <a href="{{ route('backend.services.edit', $services->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <a href="{{ route('backend.services.status', $services->id) }}"
                                                            class="{{ $services->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($services->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.services.trash', $services->id) }}"
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
                                        {{ $activeService->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Service Info</h4>
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

                                            @foreach ($draftService as $index => $services)
                                                <tr>
                                                    <td>{{ $index + 1 + ($draftService->currentPage() - 1) * $draftService->perPage() }}
                                                    </td>

                                                    <td>
                                                        @if ($services->slider)
                                                            @php
                                                                $photoArray = explode(';', $services->slider);
                                                                $total_photo = count($photoArray);
                                                            @endphp

                                                            {{ $total_photo }} Photos
                                                        @else
                                                            No Photos
                                                        @endif
                                                    </td>
                                                    <td>{{ $services->order_level }}</td>
                                                    <td>{{ $services->title }}</td>

                                                    <td>
                                                        {!! Str::limit($services->short_description, 50) !!}
                                                    </td>


                                                    <td class="td_btn text-center">
                                                        <a href="{{ route('backend.services.edit', $services->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <a href="{{ route('backend.services.status', $services->id) }}"
                                                            class="{{ $services->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($services->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.services.trash', $services->id) }}"
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
                                        {{ $draftService->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Service Info</h4>
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

                                            @foreach ($trashedService as $index => $services)
                                                <tr>
                                                    <td>{{ $index + 1 + ($trashedService->currentPage() - 1) * $trashedService->perPage() }}
                                                    </td>

                                                    <td>
                                                        @if ($services->slider)
                                                            @php
                                                                $photoArray = explode(';', $services->slider);
                                                                $total_photo = count($photoArray);
                                                            @endphp

                                                            {{ $total_photo }} Photos
                                                        @else
                                                            No Photos
                                                        @endif
                                                    </td>
                                                    <td>{{ $services->order_level }}</td>
                                                    <td>{{ $services->title }}</td>

                                                    <td>
                                                        {!! Str::limit($services->short_description, 50) !!}
                                                    </td>


                                                    <td class="td_btn d-flex text-center">

                                                        <a
                                                            href="{{ route('backend.services.reStore', $services->id) }}"class="btn btn-success" style="margin-right: 5px">
                                                            <i class="fa-solid fa-box"></i>
                                                        </a>
                                                        @if (!in_array($services->id, [3, 29]))
                                                            <form
                                                                action="{{ route('backend.services.delete', $services->id) }}"
                                                                method="POST" class="delete_form">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Are you Sure to Delete?')">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $trashedService->links() }}
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
