@extends('layouts.backend.master')
@section('title', 'All Videos')
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
                                <h4 class="text-center">Active Dream With us</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Title</th>
                                                <th>Description</th>

                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>photo</th>

                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activedreamWithUs as $dreamWithUs)
                                                <tr>
                                                    <td>{{ $dreamWithUs->id }}</td>
                                                    <td>{{ $dreamWithUs->title }}</td>
                                                    <td>{!! \Illuminate\Support\Str::limit($dreamWithUs->description, 50) !!}</td>


                                                    <td>{{ $dreamWithUs->name }}</td>
                                                    <td>{{ $dreamWithUs->address }}</td>
                                                    <td>
                                                        <img src="{{ $dreamWithUs->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>

                                                    <td class="td_btn text-center">
                                                        <a href="{{ route('backend.dreamWithUs.edit', $dreamWithUs->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <!--<a href="{{ route('backend.dreamWithUs.status', $dreamWithUs->id) }}"-->
                                                        <!--    class="{{ $dreamWithUs->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">-->
                                                        <!--    <i-->
                                                        <!--        class="{{ $dreamWithUs->status == 'publish' ? 'fa fa-user-o' : 'fa fa-check' }}"></i>-->
                                                        <!--</a>-->
                                                        <!--<a href="{{ route('backend.dreamWithUs.trash', $dreamWithUs->id) }}"-->
                                                        <!--    class="btn btn-sm btn-danger">-->
                                                        <!--    <i class="fas fa-trash"></i>-->
                                                        <!--</a>-->
                                                    </td>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activedreamWithUs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft dreamWithUs</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Title</th>
                                                <th>Description</th>

                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>photo</th>

                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($draftdreamWithUs as $dreamWithUs)
                                                <tr>
                                                    <td>{{ $dreamWithUs->id }}</td>
                                                    <td>{{ $dreamWithUs->title }}</td>
                                                    <td>{!! \Illuminate\Support\Str::limit($dreamWithUs->description, 50) !!}</td>


                                                    <td>{{ $dreamWithUs->name }}</td>
                                                    <td>{{ $dreamWithUs->address }}</td>
                                                    <td>
                                                        <img src="{{ $dreamWithUs->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>

                                                    <td class="td_btn text-center">
                                                        <a href="{{ route('backend.dreamWithUs.edit', $dreamWithUs->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('backend.dreamWithUs.status', $dreamWithUs->id) }}"
                                                            class="{{ $dreamWithUs->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            <i
                                                                class="{{ $dreamWithUs->status == 'publish' ? 'fa fa-user-o' : 'fa fa-check' }}"></i>
                                                        </a>
                                                        <a href="{{ route('backend.dreamWithUs.trash', $dreamWithUs->id) }}"
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
                                        {{ $draftdreamWithUs->links() }}
                                    </div>
                                </div>
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
                                    <table class=" table">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Title</th>
                                                <th>Description</th>

                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>photo</th>

                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trasheddreamWithUs as $dreamWithUs)
                                                <tr>
                                                    <td>{{ $dreamWithUs->id }}</td>
                                                    <td>{{ $dreamWithUs->title }}</td>
                                                    <td>{!! \Illuminate\Support\Str::limit($dreamWithUs->description, 50) !!}</td>


                                                    <td>{{ $dreamWithUs->name }}</td>
                                                    <td>{{ $dreamWithUs->address }}</td>
                                                    <td>
                                                        <img src="{{ $dreamWithUs->photo }}" width="80px"
                                                            alt="" style="padding: 0!important">
                                                    </td>

                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.dreamWithUs.reStore', $dreamWithUs->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form
                                                            action="{{ route('backend.dreamWithUs.delete', $dreamWithUs->id) }}"
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
                                        {{ $trasheddreamWithUs->links() }}
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
