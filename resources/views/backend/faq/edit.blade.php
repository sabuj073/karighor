@extends('layouts.backend.master')
@section('title', 'Edit Faq')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><h5><a href="{{ route('index') }}">Dashboard /</a></h5></li>
                        <li class="breadcrumb-item active" aria-current="page"><h6><a href="{{ route('backend.faq.index') }}">All Faq</a></h6></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit Faq Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.faq.update',$faq->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="">
                                    <div class="row mt-3">

                                        <div class="form-group">
                                            <label>Question:</label>
                                            <input type="text" name="question" class="form-control"
                                                placeholder="Enter Question" value="{{ $faq->question }}">
                                        </div>



                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group col-lg-12 mt-3">
                                            <label>Answer:</label>
                                            <textarea name="answer" id="editor" class="form-control " rows="3" placeholder="Enter Blog Description">{{ $faq->answer }}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
