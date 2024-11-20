@extends('layouts.backend.master')
@section('title', 'All Section Content')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="About-tab" data-bs-toggle="pill" data-bs-target="#About" type="button"
                            role="tab" aria-controls="About" aria-selected="false">About</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Gallery</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-product-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-product" type="button" role="tab" aria-controls="pills-news"
                            aria-selected="false">Product</button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Research</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="navSection-tab" data-bs-toggle="pill" data-bs-target="#navSection"
                            type="button" role="tab" aria-controls="navSection" aria-selected="false">Nav</button>
                    </li> --}}
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="serviceSection-tab" data-bs-toggle="pill"
                            data-bs-target="#serviceSection" type="button" role="tab" aria-controls="serviceSection"
                            aria-selected="false">Service</button>
                    </li> --}}
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="blogSection-tab" data-bs-toggle="pill" data-bs-target="#blogSection"
                            type="button" role="tab" aria-controls="blogSection" aria-selected="false">Blog</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="SipSection-tab" data-bs-toggle="pill" data-bs-target="#SipSection"
                            type="button" role="tab" aria-controls="SipSection" aria-selected="false">Sip</button>
                    </li> --}}
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Home Page Section Content</h4>
                                <div>Image Size:Glance(1600x375)</div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>Section Name</th>
                                                <th>Header</th>
                                                <th>Sub Header</th>
                                                <th>Photo</th>
                                                <th>Content</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">
                                            @foreach ($home as $content)
                                                <tr>
                                                    <td class="">{{ $content->sec_name }}</td>
                                                    <td>{{ $content->header }}</td>
                                                    <td>{{ $content->sub_header }}</td>
                                                    <td>
                                                        @if ($content->photo)
                                                            <img src="{{ $content->photo }}" width="60" alt="">
                                                        @else
                                                            No Photos
                                                        @endif
                                                    </td>
                                                    <td>{!! $content->content !!}</td>
                                                    <td class="td_btn">
                                                        <a href="#"
                                                            data-href="{{ route('backend.sectionContent.update', $content->id) }}"
                                                            data-item="{{ $content }}"
                                                            class="btn btn-sm btn-info new_edit">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $home->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="About" role="tabpanel" aria-labelledby="About-tab" tabindex="0">
                        <div class="row">
                            {{-- <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">About Page Bradcrumb Photo</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Photo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    <tr>
                                                        <td>
                                                            <img src="{{ $aboutPhoto->photo }}" width="200px"
                                                                alt="">
                                                        </td>
                                                        <td class="td_btn">
                                                            <a href="#"
                                                                data-href="{{ route('backend.sectionContent.update', $aboutPhoto->id) }}"
                                                                data-item="{{ $aboutPhoto }}"
                                                                class="btn btn-sm btn-info edit">Edit</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">About Page Section Content</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Section Name</th>
                                                        <th>Header</th>
                                                        <th>Sub Header</th>
                                                        <th>Content</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    @foreach ($about as $content)
                                                        <tr>
                                                            <td class="">{{ $content->sec_name }}</td>
                                                            <td>{{ $content->header }}</td>
                                                            <td>{{ $content->sub_header }}</td>
                                                            <td>{!! $content->content !!}</td>
                                                            <td class="td_btn">
                                                                <a href="#"
                                                                    data-href="{{ route('backend.sectionContent.update', $content->id) }}"
                                                                    data-item="{{ $content }}"
                                                                    class="btn btn-sm btn-info new_edit">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="mt-3">
                                                {{ $about->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="row">
                            {{-- <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Fund Page Bradcrumb Photo</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Photo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    <tr>
                                                        <td>
                                                            <img src="{{ $fundPhoto->photo }}" width="200px"
                                                                alt="">
                                                        </td>
                                                        <td class="td_btn">
                                                            <a href="#"
                                                                data-href="{{ route('backend.sectionContent.update', $fundPhoto->id) }}"
                                                                data-item="{{ $fundPhoto }}"
                                                                class="btn btn-sm btn-info edit">Edit</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Gallery Page Section Content</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Section Name</th>
                                                        <th>Header</th>
                                                        <th>Sub Header</th>
                                                        <th>Content</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    @foreach ($fund as $content)
                                                        <tr>
                                                            <td class="">{{ $content->sec_name }}</td>
                                                            <td>{{ $content->header }}</td>
                                                            <td>{{ $content->sub_header }}</td>
                                                            <td>{!! $content->content !!}</td>
                                                            <td class="td_btn">
                                                                <a href="#"
                                                                    data-href="{{ route('backend.sectionContent.update', $content->id) }}"
                                                                    data-item="{{ $content }}"
                                                                    class="btn btn-sm btn-info new_edit">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="mt-3">
                                                {{ $fund->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-product" role="tabpanel" aria-labelledby="pills-product-tab"
                        tabindex="0">
                        <div class="row">
                            {{-- <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">News Page Photo</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Photo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    <tr>
                                                        <td>
                                                            <img src="{{ $newsPhoto->photo }}" width="200px"
                                                                alt="">
                                                        </td>
                                                        <td class="td_btn">
                                                            <a href="#"
                                                                data-href="{{ route('backend.sectionContent.update', $newsPhoto->id) }}"
                                                                data-item="{{ $newsPhoto }}"
                                                                class="btn btn-sm btn-info edit">Edit</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Product Page Section Content</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Section Name</th>
                                                        <th>Header</th>
                                                        <th>Sub Header</th>
                                                        <th>Content</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    @foreach ($product_content as $content)
                                                        <tr>
                                                            <td class="">{{ $content->sec_name }}</td>
                                                            <td>{{ $content->header }}</td>
                                                            <td>{{ $content->sub_header }}</td>
                                                            <td>{!! $content->content !!}</td>
                                                            <td class="td_btn">
                                                                <a href="#"
                                                                    data-href="{{ route('backend.sectionContent.update', $content->id) }}"
                                                                    data-item="{{ $content }}"
                                                                    class="btn btn-sm btn-info new_edit">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="mt-3">
                                                {{ $fund->links() }}
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
                            {{-- <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Research Page Bradcrumb Photo</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Photo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    <tr>
                                                        <td>
                                                            <img src="{{ @$researchPhoto->photo }}" width="200px"
                                                                alt="">
                                                        </td>
                                                        <td class="td_btn">
                                                            <a href="#"
                                                                data-href="{{ route('backend.sectionContent.update', $researchPhoto->id) }}"
                                                                data-item="{{ @$researchPhoto }}"
                                                                class="btn btn-sm btn-info edit">Edit</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Research Page Section Content</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Section Name</th>
                                                        <th>Header</th>
                                                        <th>Sub Header</th>
                                                        <th>Content</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    @foreach ($research as $content)
                                                        <tr>
                                                            <td class="">{{ $content->sec_name }}</td>
                                                            <td>{{ $content->header }}</td>
                                                            <td>{{ $content->sub_header }}</td>
                                                            <td>{!! $content->content !!}</td>
                                                            <td class="td_btn">
                                                                <a href="#"
                                                                    data-href="{{ route('backend.sectionContent.update', $content->id) }}"
                                                                    data-item="{{ $content }}"
                                                                    class="btn btn-sm btn-info new_edit">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="mt-3">
                                                {{ $research->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="navSection" role="tabpanel" aria-labelledby="navSection-tab"
                        tabindex="0">
                        <div class="row">
                            {{-- <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Nav Page Bradcrumb Photo</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Photo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    <tr>
                                                        <td>
                                                            <img src="{{ $navPhoto->photo }}" width="200px"
                                                                alt="">
                                                        </td>
                                                        <td class="td_btn">
                                                            <a href="#"
                                                                data-href="{{ route('backend.sectionContent.update', $navPhoto->id) }}"
                                                                data-item="{{ $navPhoto }}"
                                                                class="btn btn-sm btn-info edit">Edit</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Nav Page Section Content</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Section Name</th>
                                                        <th>Header</th>
                                                        <th>Sub Header</th>
                                                        <th>Content</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    @foreach ($navsection_content as $content)
                                                        <tr>
                                                            <td class="">{{ $content->sec_name }}</td>
                                                            <td>{{ $content->header }}</td>
                                                            <td>{{ $content->sub_header }}</td>
                                                            <td>{!! $content->content !!}</td>
                                                            <td class="td_btn">
                                                                <a href="#"
                                                                    data-href="{{ route('backend.sectionContent.update', $content->id) }}"
                                                                    data-item="{{ $content }}"
                                                                    class="btn btn-sm btn-info new_edit">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="mt-3">
                                                {{ $navsection_content->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="serviceSection" role="tabpanel" aria-labelledby="serviceSection-tab"
                        tabindex="0">
                        <div class="row">
                            {{-- <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Service Page Bradcrumb Photo</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Photo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    <tr>
                                                        <td>
                                                            <img src="{{ $servicePhoto->photo }}" width="200px"
                                                                alt="">
                                                        </td>
                                                        <td class="td_btn">
                                                            <a href="#"
                                                                data-href="{{ route('backend.sectionContent.update', $servicePhoto->id) }}"
                                                                data-item="{{ $servicePhoto }}"
                                                                class="btn btn-sm btn-info edit">Edit</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Service Page Section Content</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Section Name</th>
                                                        <th>Header</th>
                                                        <th>Sub Header</th>
                                                        <th>Content</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    @foreach ($service_content as $content)
                                                        <tr>
                                                            <td class="">{{ $content->sec_name }}</td>
                                                            <td>{{ $content->header }}</td>
                                                            <td>{{ $content->sub_header }}</td>
                                                            <td>{!! $content->content !!}</td>
                                                            <td class="td_btn">
                                                                <a href="#"
                                                                    data-href="{{ route('backend.sectionContent.update', $content->id) }}"
                                                                    data-item="{{ $content }}"
                                                                    class="btn btn-sm btn-info new_edit">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="mt-3">
                                                {{ $service_content->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="blogSection" role="tabpanel" aria-labelledby="blogSection-tab"
                        tabindex="0">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Blog Page Bradcrumb Photo</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Photo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    <tr>
                                                        <td>
                                                            <img src="{{ $blogPhoto->photo }}" width="200px"
                                                                alt="">
                                                        </td>
                                                        <td class="td_btn">
                                                            <a href="#"
                                                                data-href="{{ route('backend.sectionContent.update', $blogPhoto->id) }}"
                                                                data-item="{{ $blogPhoto }}"
                                                                class="btn btn-sm btn-info edit">Edit</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 d-none">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Blog Page Section Content</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Section Name</th>
                                                        <th>Header</th>
                                                        <th>Sub Header</th>
                                                        <th>Content</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    @foreach ($blog_content as $content)
                                                        <tr>
                                                            <td class="">{{ $content->sec_name }}</td>
                                                            <td>{{ $content->header }}</td>
                                                            <td>{{ $content->sub_header }}</td>
                                                            <td>{!! $content->content !!}</td>
                                                            <td class="td_btn">
                                                                <a href="#"
                                                                    data-href="{{ route('backend.sectionContent.update', $content->id) }}"
                                                                    data-item="{{ $content }}"
                                                                    class="btn btn-sm btn-info new_edit">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="mt-3">
                                                {{ $navsection_content->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="SipSection" role="tabpanel" aria-labelledby="SipSection-tab"
                        tabindex="0">
                        <div class="row justify-content-center">

                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-center">Sip Page Section Content</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th>Section Name</th>
                                                        <th>Header</th>
                                                        <th>Sub Header</th>
                                                        <th>Content</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table">
                                                    @foreach ($sipsection_content as $content)
                                                        <tr>
                                                            <td class="">{{ $content->sec_name }}</td>
                                                            <td>{{ $content->header }}</td>
                                                            <td>{{ $content->sub_header }}</td>
                                                            <td>{!! $content->content !!}</td>
                                                            <td class="td_btn">
                                                                <a href="#"
                                                                    data-href="{{ route('backend.sectionContent.update', $content->id) }}"
                                                                    data-item="{{ $content }}"
                                                                    class="btn btn-sm btn-info new_edit">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="mt-3">
                                                {{ $sipsection_content->links() }}
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
                    <h5 class="modal-title" id="myModalLabel">Edit Bradcrumb Photo Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3">
                            <label>BradcrumbPhoto(1725x600):</label>
                            <input type="file" name="photo" class=" form-control" id="photoInput">
                            <img class="mt-2" id="oldImg" width="60" alt="bradcrumb photo">
                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                style="display: none; max-width: 80px; max-height: 80px;">
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
        $(document).ready(function() {
            initializeSummernote('#editor');
        });
        $(document).on('click', '.edit', function(e) {
            const modal = $('#edit');
            const item = $(this).data('item');
            $('#oldImg').attr("src", item.photo);

            modal.find('form').attr('action', $(this).data('href'));
            modal.modal('show');
        });
    </script>


    <script>
        $(document).on('click', '.new_edit', function(e) {
            const modal = $('#new_edit');
            const item = $(this).data('item');

            $('#header').val(item.header);
            $('#sub_header').val(item.sub_header);
            

            $('#edit_image').attr("src", item.photo);

            modal.find('form').attr('action', $(this).data('href'));
            modal.modal('show');
        });
    </script>
@endpush
{{-- <script>
    function updatedata(id, header, sub_header, photo, content) {
        $("#id").val(id);
        $("#header").val(header);
        $("#sub_header").val(sub_header);
        $('#edit_image').attr('src', photo);
        CKEDITOR.instances['editor'].setData(content)
    }
</script> --}}
<div id="new_edit" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Section Content Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class=" form-group">
                        <label for="">Header:</label>
                        <input type="text" name="header" id="header" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Sub Header:</label>
                        {{-- <input type="text" name="sub_header" id="sub_header" class="form-control"> --}}
                        <textarea name="sub_header" id="sub_header" class="form-control"rows="5"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Photo:</label>
                        <input type="file" name="photo" class="form-control" id="photoInput">
                        <img src="" id="edit_image" class="mt-2" width="80" alt="">
                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                            style="display: none; max-width: 80px; max-height: 80px;">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Content:</label>
                        <textarea name="content" id="editor" class="form-control" rows="5"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
