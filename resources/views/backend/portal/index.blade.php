@extends('layouts.backend.master')
@section('title', 'All Location')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
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
                                <h4 class="text-center">Customer Info</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="activeTable">
                                        <thead class="text-center">
                                            <tr>
                                                <th>SL</th>
                                                <th>Trade Licence</th>
                                                <th>Nid Card</th>
                                                <th>Visiting Card</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($activeportal_data as $index => $portal_info)
                                                @php
                                                    $portal = json_decode($portal_info->customer_info);

                                                @endphp
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <div class="gallery">
                                                            <a href="{{ @$portal->trade_licence }}" class="big">
                                                                <img src="{{ @$portal->trade_licence }}" width="80"
                                                                    alt="">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="gallery">
                                                            <a href="{{ @$portal->nid_card }}" class="big">
                                                                <img src="{{ @$portal->nid_card }}" width="80"
                                                                    alt="">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="gallery">
                                                            <a href="{{ @$portal->visiting_card }}" class="big">
                                                                <img src="{{ @$portal->visiting_card }}" width="80"
                                                                    alt="">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>{{ @$portal->name }}</td>
                                                    <td>{{ @$portal->phone }}</td>
                                                    <td>{{ @$portal->email }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Location</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>portal Name</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($draftportal as $portal)
                                                <tr>
                                                    <td>{{ $portal->id }}</td>
                                                    <td>{{ $portal->name }}</td>


                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $portal->id }}','{{ $portal->name }}','{{ $portal->parent_id }}','{{ $portal->featured_type }}')"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.location.status', $portal->id) }}"
                                                            class=" btn {{ $portal->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $portal->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.location.trash', $portal->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftportal->links() }}
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
                                                <th>Id</th>
                                                <th>portal name</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($trashedportal as $portal)
                                                <tr>
                                                    <td>{{ $portal->id }}</td>
                                                    <td>{{ $portal->name }}</td>

                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.location.reStore', $portal->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form action="{{ route('backend.location.delete', $portal->id) }}"
                                                            method="POST" class="delete_form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you Sure to Delete?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $trashedportal->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>

        </div>
    </div>
@endsection
