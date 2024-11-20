@extends('layouts.backend.master')
@section('title', 'All Banner')
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
                                <h4 class="text-center">Active Banner</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Sub Title</th>
                                                <th>URL</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activeBanner as $index => $banner)
                                                <tr>
                                                    <td>{{ $index + 1 + ($activeBanner->currentPage() - 1) * $activeBanner->perPage() }}
                                                    </td>
                                                    <td>
                                                        @if ($banner->video)
                                                            <video autoplay muted loop auto width="200px" height="100px">
                                                                <source src="{{ $banner->video }}">
                                                            </video>
                                                        @else
                                                            <img src="{{ $banner->photo }}" width="80px" alt=""
                                                                style="padding: 0!important">
                                                        @endif

                                                    </td>

                                                    <td>{{ $banner->title }}</td>
                                                    <td>{{ $banner->sub_title }}</td>
                                                    <td>{{ $banner->url }}</td>

                                                    <td class="td_btn">

                                                        <a href="{{ route('backend.banner.edit', $banner->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="{{ route('backend.banner.status', $banner->id) }}"
                                                            class=" btn {{ $banner->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($banner->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.banner.trash', $banner->id) }}"
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
                                        {{ $activeBanner->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft banners</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Sub Title</th>
                                                <th>URL</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($draftBanners as $index => $banner)
                                                <tr>
                                                    <td>{{ $index + 1 + ($draftBanners->currentPage() - 1) * $draftBanners->perPage() }}
                                                    </td>
                                                    <td>
                                                        @if ($banner->video)
                                                            <video autoplay muted loop auto width="200px" height="100px">
                                                                <source src="{{ $banner->video }}">
                                                            </video>
                                                        @else
                                                            <img src="{{ $banner->photo }}" width="80px" alt=""
                                                                style="padding: 0!important">
                                                        @endif
                                                    </td>
                                                    <td>{{ $banner->title }}</td>
                                                    <td>{{ $banner->sub_title }}</td>
                                                    <td>{{ $banner->url }}</td>


                                                    <td class="td_btn">

                                                        <a href="{{ route('backend.banner.edit', $banner->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>

                                                        <a href="{{ route('backend.banner.status', $banner->id) }}"
                                                            class=" btn {{ $banner->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($banner->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.banner.trash', $banner->id) }}"
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
                                        {{ $draftBanners->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed banners</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Sub Title</th>
                                                <th>URL</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trashedBanners as $index => $banner)
                                                <tr>
                                                    <td>{{ $index + 1 + ($trashedBanners->currentPage() - 1) * $trashedBanners->perPage() }}
                                                    </td>
                                                    <td>
                                                        @if ($banner->video)
                                                            <video autoplay muted loop auto width="200px" height="100px">
                                                                <source src="{{ $banner->video }}">
                                                            </video>
                                                        @else
                                                            <img src="{{ $banner->photo }}" width="80px" alt=""
                                                                style="padding: 0!important">
                                                        @endif
                                                    </td>
                                                    <td>{{ $banner->title }}</td>
                                                    <td>{{ $banner->sub_title }}</td>
                                                    <td>{{ $banner->url }}</td>
                                                    <td class="td_btn d-flex justify-content-center">
                                                        <a href="{{ route('backend.banner.reStore', $banner->id) }}"
                                                            class="btn btn-sm btn-success"
                                                            style="height: 27px;margin-right:5px">
                                                            <i class="fa-solid fa-box"></i>
                                                        </a>

                                                        <form action="{{ route('backend.banner.delete', $banner->id) }}"
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
                                        {{ $trashedBanners->links() }}
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
