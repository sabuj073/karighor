@extends('layouts.backend.master')
@section('title', 'Create Faq')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Faq</li>
                    </ol>
                </nav>
                <h1 class="m-0">Faq</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Faq</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.faq.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="">
                                    <div class="row mt-3">
                                        
                                        <div class="form-group">
                                            <label>Question:</label>
                                            <input type="text" name="question" class="form-control"
                                                placeholder="Enter Question" value="{{ old('question') }}">
                                        </div>



                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group col-lg-12 mt-3">
                                            <label>Answer:</label>
                                            <textarea name="answer" id="editor" class="form-control " rows="3" placeholder="Enter Blog Description">{{ old('answer') }}</textarea>
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

