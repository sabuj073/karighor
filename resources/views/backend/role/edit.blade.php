@extends('layouts.backend.master')
@section('title', 'Edit Role Permission')
@section('content')

    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h1 class="m-0">Edit Role</h1>
            </div>

        </div>
    </div>

    <div class="container-fluid page__container">


        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Role Edit</h4>
                    </div>
                    <div class="card-body">
                        <form></form>
                        <form action="{{ route('backend.role.update', $role->id) }}" method="POST">
                            @csrf

                            <div>
                                <input type="text" class="form-control mb-2" name="name" placeholder="Add Role"
                                    value="{{ $role->name }}">
                            </div>
                            <b>Select Permission:</b>
                            {{-- <div class="mb-2 mt-2">
                
                @foreach ($permissions as $permission)
                  <label class="pr-2 col-2 border-1">
                    <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                      {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                    {{ $permission->name }}
                  </label>
                @endforeach
              </div> --}}
                            <div class="mb-2 mt-2">

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>General Info</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [44]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Role Permission</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [5, 50, 6]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Banner</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [22, 23, 24]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>About</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [51]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Partner</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [30, 31, 32]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Why Choose</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [25, 26, 27]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Concern</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [10, 11, 12]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Testimonial</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [19, 20, 21]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Blog</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [13, 14, 15]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Client Section</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [62, 63, 64]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Service</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [7, 8, 9]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Package</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [16, 17, 18]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Package Details</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [65, 66, 67]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Affialiation</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [59, 60, 61]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Customer Review</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [68, 69, 70]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Flag</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [52, 53, 54]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Mission</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [33]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Photo Gallery</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [34, 35, 36]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Privacy Policy</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [48]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Terms and Condition</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [49]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>FAQ</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [40, 41, 42]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Contact Us</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [45, 46, 47]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Consultancy</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [37, 38, 39]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Meta</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [43]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-4">
                                      <div class="card">
                                          <div class="card-body">
                                              <h5>Hotel Booking</h5>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-8">
                                      <div class="row">
                                          @foreach ($permissions as $permission)
                                              @if (in_array($permission->id, [55,56,57]))
                                                  <div class="col-lg-4">
                                                      <div class="card">
                                                          <div class="card-body">
                                                              <label class="pr-2 border-1">
                                                                  <input type="checkbox" name="permission[]"
                                                                      class="text-capitalize"
                                                                      value="{{ $permission->id }}" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                  <span
                                                                      class="text-capitalize">{{ $permission->name }}</span>
                                                              </label>
                                                          </div>
                                                      </div>
                                                  </div>
                                              @endif
                                          @endforeach
                                      </div>
                                  </div>
                              </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>OTA Portal</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [29]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Section Content</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [28]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>User</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if (in_array($permission->id, [1, 2, 3]))
                                                    <div class="col-lg-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="pr-2 border-1">
                                                                    <input type="checkbox" name="permission[]"
                                                                        class="text-capitalize"
                                                                        value="{{ $permission->id }}"  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                    <span
                                                                        class="text-capitalize">{{ $permission->name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-4">
                                      <div class="card">
                                          <div class="card-body">
                                              <h5>Subscriber</h5>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-8">
                                      <div class="row">
                                          @foreach ($permissions as $permission)
                                              @if (in_array($permission->id, [58]))
                                                  <div class="col-lg-4">
                                                      <div class="card">
                                                          <div class="card-body">
                                                              <label class="pr-2 border-1">
                                                                  <input type="checkbox" name="permission[]"
                                                                      class="text-capitalize"
                                                                      value="{{ $permission->id }}" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                                  <span
                                                                      class="text-capitalize">{{ $permission->name }}</span>
                                                              </label>
                                                          </div>
                                                      </div>
                                                  </div>
                                              @endif
                                          @endforeach
                                      </div>
                                  </div>
                              </div>

                            </div>


                            <div>
                                <button type="submit" class="btn btn-primary btn-sm mt-3">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
