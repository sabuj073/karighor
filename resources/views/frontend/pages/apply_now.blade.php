@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="bradcrum_sec_pad">
        <div class="page-title text-center"
            style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #ffe9e6">

        </div>
    </section>
    <section class="team2 sp3 _relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card contact_border">
                        <div class="card-header apply_head">
                            <div class="text-center header_text pb-0 make_all_title">Write Here</div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group mb-3">
                                            <label for="f_name" class="font-weight-bold">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter First Name*" required>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group mb-3">
                                            <label for="email" class="font-weight-bold">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter Your Email*" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="phone" class="font-weight-bold">Phone:</label>
                                            <input type="tel" class="form-control" id="phone" name="phone"
                                                placeholder="Enter Your Phone*" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold level_pad" for="cv">CV:(Upload Your updated Cv)</label>
                                        <div class="custom-file">
                                            <input type="file" class="form-control custom-file-input" id="cv" name="cv">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn theme-btn18 apply_btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
