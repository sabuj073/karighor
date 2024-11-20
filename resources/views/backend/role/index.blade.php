@extends('layouts.backend.master')
@section('title', 'All Role Permission')
@section('content')

    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('admin') }}">Dashboard</a></h5>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"></li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <div class="container-fluid page__container">


        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Roles</h4>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($roles as $index => $role)
                                    <tr>
                                        <td>{{ $index + 1 + ($roles->currentPage() - 1) * $roles->perPage() }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->permissions as $permission)
                                                <span class="btn btn-sm btn-primary">{{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('backend.role.edit', $role->id) }}"
                                                class="btn btn-sm btn-success mr-2" style="margin-right: 5px">
                                                <i class="fas fa-edit"></i>
                                              </a>
                                                @can('delete role')
                                                <form action="{{ route('backend.role.delete', $role->id) }}"
                                                  method="POST" class="delete_form">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-sm btn-danger"
                                                      onclick="return confirm('Are you Sure to Delete?')">
                                                      <i class="fa-solid fa-trash-can"></i>
                                                  </button>
                                              </form>
                                              @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
