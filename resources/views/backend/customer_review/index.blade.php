@extends('layouts.backend.master')
@section('title', 'All Customer Review')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard/</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">All Customer Review</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="activeTable">
                                <thead class="text-center">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Rating</th>
                                        <th>
                                            <div class="action_btn">Action</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table">

                                    @foreach ($customer_reviews as $customerReview)
                                        <tr>
                                            <td>{{ $customerReview->id }}</td>
                                            <td>{{ $customerReview->name }}</td>
                                            <td>{{ $customerReview->title }}</td>
                                            <td>{{ $customerReview->rating }}</td>
                                            <td class="td_btn d-flex">

                                                <a href="{{ route('backend.customerReview.edit', $customerReview->id) }}"
                                                    class="btn btn-sm btn-info" style="margin-right: 5px"><i class="fas fa-edit"></i></a>

                                                <form action="{{ route('backend.customerReview.delete', $customerReview->id) }}" method="POST"
                                                    class="delete_form">
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
                        {{-- <div class="row justify-content-end">
                            <div class="mt-3">
                                {{ $customer_reviews->links() }}
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
