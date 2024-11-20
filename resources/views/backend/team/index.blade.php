@extends('layouts.backend.master')
@section('title', 'All Teams')
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
                                <h4 class="text-center">Active Team Member</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Designation</th>
                                                <th>Order</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activeBlogs as $index => $teams)
                                                <tr>
                                                    <td>{{ $index + 1 + ($activeBlogs->currentPage() - 1) * $activeBlogs->perPage() }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ $teams->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $teams->name }}</td>
                                                    <td>{{ @$teams->type->name }}</td>
                                                    <td>{{ $teams->designation }}</td>
                                                    <td>{{ $teams->order_level }}</td>

                                                    <td class="td_btn text-center">


                                                        <a href="{{ route('backend.team.edit', $teams->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-pen-to-square"></i>

                                                        </a>
                                                        <a href="{{ route('backend.team.status', $teams->id) }}"
                                                            class=" btn {{ $teams->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($teams->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.team.trash', $teams->id) }}"
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
                                        {{ $activeBlogs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft teams</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Order</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($draftBlogs as $index => $teams)
                                                <tr>
                                                    <td>{{ $index + 1 + ($draftBlogs->currentPage() - 1) * $draftBlogs->perPage() }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ $teams->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $teams->name }}</td>

                                                    <td>{{ $teams->designation }}</td>
                                                    <td>{{ $teams->order_level }}</td>
                                                    <td class="td_btn">

                                                        <a href="{{ route('backend.team.edit', $teams->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>

                                                        <a href="{{ route('backend.team.status', $teams->id) }}"
                                                            class=" btn {{ $teams->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($teams->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.team.trash', $teams->id) }}"
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
                                        {{ $draftBlogs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Team</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Order</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trashedBlogs as $index => $teams)
                                                <tr>
                                                    <td>{{ $index + 1 + ($trashedBlogs->currentPage() - 1) * $trashedBlogs->perPage() }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ $teams->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $teams->name }}</td>
                                                    <td>{{ $teams->designation }}</td>
                                                    <td>{{ $teams->order_level }}</td>
                                                    <td class="td_btn d-flex">
                                                        <a href="{{ route('backend.team.reStore', $teams->id) }}"
                                                            class="btn btn-sm btn-success"
                                                            style="height: 22px;margin-top:8px;margin-right:5px">
                                                            <i class="fa-solid fa-box"></i>
                                                        </a>

                                                        <form action="{{ route('backend.team.delete', $teams->id) }}"
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
                                        {{ $trashedBlogs->links() }}
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
