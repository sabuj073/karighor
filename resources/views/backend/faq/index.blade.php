@extends('layouts.backend.master')
@section('title', 'All FAQS')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('admin') }}">Dashboard /</a></h5>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">FAQ</li>
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
                        <h4 class="text-center">All FAQS</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th>Id</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>
                                            <div class="action_btn">Action</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table text-center">

                                    @foreach ($faqs as $index => $faq)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $faq->question }}</td>
                                            <td>
                                              <div>{!! $faq->answer !!}</div>
                                            </td>
                                            <td class="td_btn d-flex">

                                                <a href="{{ route('backend.faq.edit', $faq->id) }}"
                                                    class="btn btn-sm btn-info" style="margin-right: 5px">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>

                                                <form action="{{ route('backend.faq.delete', $faq->id) }}" method="POST"
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
                        <div class="row justify-content-end">
                            <div class="mt-3">
                                {{ $faqs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
