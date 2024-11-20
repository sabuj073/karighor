@extends('layouts.backend.master')
@section('title', 'Contact Us')
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
                                <h4 class="text-center">Active Contact Us</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Logo</th>
                                                <th>Phone</th>
                                                <th>Map Url</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($activePartner as $index => $partner)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ $partner->contact_image }}" width="80px"
                                                            alt="" style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $partner->phone }}</td>
                                                    <td>{{ Str::limit($partner->map, 100, '...') }}</td>
                                                    <td>{!! $partner->description !!}</td>
                                                    <td class="td_btn">

                                                        <a href="{{ route('backend.contactUs.edit', $partner->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>

                                                        <a href="{{ route('backend.contactUs.status', $partner->id) }}"
                                                            class=" btn {{ $partner->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($partner->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.contactUs.trash', $partner->id) }}"
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
                                        {{ $activePartner->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Contact Info</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Logo</th>
                                                <th>Phone</th>
                                                <th>Map Url</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($draftPartner as $index => $partner)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ $partner->contact_image }}" width="80px"
                                                            alt="" style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $partner->phone }}</td>
                                                    <td>{{ Str::limit($partner->map, 100, '...') }}</td>
                                                    <td>{!! $partner->description !!}</td>
                                                    <td class="td_btn d-flex">

                                                        <a href="{{ route('backend.contactUs.edit', $partner->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>

                                                        <a href="{{ route('backend.contactUs.status', $partner->id) }}"
                                                            class=" btn {{ $partner->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($partner->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.contactUs.trash', $partner->id) }}"
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
                                        {{ $draftPartner->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Contact Info</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Logo</th>
                                                <th>Phone</th>
                                                <th>Map Url</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($trashedPartner as $index => $partner)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ $partner->contact_image }}" width="80px"
                                                            alt="" style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $partner->phone }}</td>
                                                    <td>{{ Str::limit($partner->map, 100, '...') }}</td>
                                                    <td>{!! $partner->description !!}</td>
                                                    <td class="td_btn d-flex">
                                                        <a href="{{ route('backend.contactUs.reStore', $partner->id) }}"
                                                            class="btn btn-sm btn-success"
                                                            style="height: 22px;margin-top:8px;margin-right:5px">
                                                            <i class="fa-solid fa-box"></i>
                                                        </a>

                                                        <form
                                                            action="{{ route('backend.contactUs.delete', $partner->id) }}"
                                                            method="POST" class="delete_form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="mt-2 btn btn-sm btn-danger"
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
                                        {{ $trashedPartner->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            {{-- <div class="col-lg-4 m_top">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Slider Photos</h4>
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
                                            <a href="{{ route('backend.contactUs.slider', 6) }}"
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
@endsection
