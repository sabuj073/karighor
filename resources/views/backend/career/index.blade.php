@extends('layouts.backend.master')
@section('title', 'All Careers')
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
                                <h4 class="text-center">Active Job Post</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Meta Photo</th>
                                                <th>Alter text</th>
                                                <th>Title</th>
                                                <th>Job Type</th>
                                                <th>Salary</th>
                                                <th>Location</th>
                                                <th>Deadline</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activeCareer as $career)
                                                <tr>
                                                    <td>{{ $index + 1 + ($activeCareer->currentPage() - 1) * $activeCareer->perPage() }}</td>
                                                    <td>
                                                        <img src="{{ $career->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>
                                                        <img src="{{ $career->meta_photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $career->alt_text }}</td>
                                                    <td>{{ $career->title }}</td>
                                                    <td>{{ $career->job_type }}</td>
                                                    <td>{{ $career->salary }}</td>
                                                    <td>{{ $career->location }}</td>
                                                    <td>{{ $career->deadline }}</td>
                                                    <td>{{ Str::limit($career->description, 50, '...') }}</td>
                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.career.edit', $career->id) }}"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('backend.career.status', $career->id) }}"
                                                            class=" btn {{ $career->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $career->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.career.trash', $career->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activeCareer->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft careers</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Meta Photo</th>
                                                <th>Alter text</th>
                                                <th>Title</th>
                                                <th>Job Type</th>
                                                <th>Salary</th>
                                                <th>Location</th>
                                                <th>Description</th>
                                                <th>Deadline</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($draftCareer as $career)
                                                <tr>
                                                    <td>{{ $index + 1 + ($draftCareer->currentPage() - 1) * $draftCareer->perPage() }}</td>
                                                    <td>
                                                        <img src="{{ $career->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>
                                                        <img src="{{ $career->meta_photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $career->alt_text }}</td>
                                                    <td>{{ $career->title }}</td>
                                                    <td>{{ $career->job_type }}</td>
                                                    <td>{{ $career->salary }}</td>
                                                    <td>{{ $career->location }}</td>
                                                    <td>{{ $career->deadline }}</td>
                                                    <td>{{ Str::limit($career->description, 20, '...') }}</td>
                                                    <td class="td_btn">

                                                        <a href="{{ route('backend.career.edit', $career->id) }}"
                                                            class="btn btn-sm btn-info">Edit</a>

                                                        <a href="{{ route('backend.career.status', $career->id) }}"
                                                            class=" btn {{ $career->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $career->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.career.trash', $career->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>



                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftCareer->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed careers</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Meta Photo</th>
                                                <th>Alter text</th>
                                                <th>Title</th>
                                                <th>Job Type</th>
                                                <th>Salary</th>
                                                <th>Location</th>
                                                <th>Description</th>
                                                <th>Deadline</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trashedCareer as $career)
                                                <tr>
                                                    <td>{{ $index + 1 + ($trashedCareer->currentPage() - 1) * $trashedCareer->perPage() }}</td>
                                                    <td>
                                                        <img src="{{ $career->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>
                                                        <img src="{{ $career->meta_photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $career->alt_text }}</td>
                                                    <td>{{ $career->title }}</td>
                                                    <td>{{ $career->job_type }}</td>
                                                    <td>{{ $career->salary }}</td>
                                                    <td>{{ $career->location }}</td>
                                                    <td>{{ $career->deadline }}</td>
                                                    <td>{{ Str::limit($career->description, 20, '...') }}</td>
                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.career.reStore', $career->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form action="{{ route('backend.career.delete', $career->id) }}"
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
                                        {{ $trashedCareer->links() }}
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

