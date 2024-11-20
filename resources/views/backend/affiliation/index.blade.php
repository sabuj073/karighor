@extends('layouts.backend.master')
@section('title', 'All Affiliation')
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
                                    <table class="table" id="activeTable">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activeData as $index => $affiliation)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ $affiliation->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>

                                                    <td>
                                                        {{ $affiliation->name }}
                                                    </td>
                                                    <td>{{ $affiliation->type }}</td>
                                                    <td class="td_btn text-center">
                                                        <a href="{{ route('backend.affiliation.edit', $affiliation->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <a href="{{ route('backend.affiliation.status', $affiliation->id) }}"
                                                            class="{{ $affiliation->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($affiliation->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.affiliation.trash', $affiliation->id) }}"
                                                            class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activeaffiliation->links() }}
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft affiliation</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="draftTable">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($draftData as $index => $affiliation)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ $affiliation->icon }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>
                                                        <img src="{{ $affiliation->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>

                                                    <td>
                                                        {{ $affiliation->name }}
                                                    </td>
                                                    <td>{{ $affiliation->type }}</td>
                                                    <td class="td_btn text-center">
                                                        <a href="{{ route('backend.affiliation.edit', $affiliation->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <a href="{{ route('backend.affiliation.status', $affiliation->id) }}"
                                                            class="{{ $affiliation->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($affiliation->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.affiliation.trash', $affiliation->id) }}"
                                                            class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftaffiliation->links() }}
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed video</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="trashTable">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trashedData as $index => $affiliation)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ $affiliation->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>

                                                    <td>
                                                        {{ $affiliation->name }}
                                                    </td>
                                                    <td>{{ $affiliation->type }}</td>
                                                    <td class="td_btn d-flex">
                                                        <a href="{{ route('backend.affiliation.reStore', $affiliation->id) }}"
                                                            class="btn btn-sm btn-success"
                                                            style="height: 22px;margin-top:8px;margin-right:5px">
                                                            <i class="fa-solid fa-box"></i>
                                                        </a>

                                                        <form action="{{ route('backend.affiliation.delete', $affiliation->id) }}"
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
                                {{-- <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $trashedaffiliation->links() }}
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
