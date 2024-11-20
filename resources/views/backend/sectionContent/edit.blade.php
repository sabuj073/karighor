@extends('layouts.backend.master')
@section('title', 'Update Section Content')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Section Content</li>
                    </ol>
                </nav>
                <h1 class="m-0">Section Content</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit Section Content</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.sectionContent.edit', $sectionContent->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf                                
                                <div class="row">
                                    <div class="form-group">
                                        <label>Header:</label>
                                        <input type="text" name="header" class="form-control" value="{{ $sectionContent->header }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Header:</label>
                                        <textarea name="sub_header" class="form-control" rows="5">{{ $sectionContent->sub_header }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Content:</label>
                                        <input type="text" name="content" class="form-control" value="{{ $sectionContent->content }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Bradcrumb Photo:</label>
                                        <input type="file" name="photo" class="form-control" value="{{ $sectionContent->photo }}">
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
