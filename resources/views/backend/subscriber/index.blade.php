@extends('layouts.backend.master')
@section('title', 'All Subscriber')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard/</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Subscriber</li>
                    </ol>
                </nav>
                <h1 class="m-0">Subscriber</h1>
            </div>
        </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="text-center">All Subscriber</h4>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table">
                              <thead class="text-center">
                                  <tr>
                                      <th>SL</th>
                                      <th>Email</th>
                                   
                                      <th>
                                        <div class="">Action</div>
                                      </th>
                                  </tr>
                              </thead>
                              <tbody class="table text-center">

                                  @foreach ($subscribers as $index=>$data)
                                      <tr>
                                        <td>{{ $index + 1 + ($subscribers->currentPage() - 1) * $subscribers->perPage()}}</td>
                                          
                                          <td>{{ $data->email }}</td>
                                     
                                          <td class="td_btn">
                                              <form action="{{ route('backend.subscriber.delete', $data->id) }}"
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
                              {{ $subscribers->links() }}
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
