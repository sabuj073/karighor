@extends('layouts.backend.master')
@section('title', 'All Messages')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Active</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false" onclick="draft()">Draft</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false" onclick="trash()">Trash</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center"> All Messages </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="example">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Package Name</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <!--<th>Company Name</th>-->
                                                <!--<th>Visit Date</th>-->
                                                <!--<th>Project Type</th>-->
                                                <!--<th>Project Size</th>-->
                                                <th>Address</th>

                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table">


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Requirement</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="example_draft">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Package Name</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <!--<th>Company Name</th>-->
                                                <!--<th>Visit Date</th>-->
                                                <!--<th>Project Type</th>-->
                                                <!--<th>Project Size</th>-->
                                                <th>Address</th>

                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table">



                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Partners</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="example_trash">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Package Name</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <!--<th>Company Name</th>-->
                                                <!--<th>Visit Date</th>-->
                                                <!--<th>Project Type</th>-->
                                                <!--<th>Project Size</th>-->
                                                <th>Address</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">


                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>



@endsection
@push('script')
    {{-- exact good code --}}
    <script>
        const commonConfig = {
            processing: true,
            serverSide: true,
            order: [
                [0, 'desc']
            ], // Order by the first column (id) in descending order
            error: function(xhr, status, error) {
                console.log('An error occurred: ' + error);
            }
        };

        function setupDataTable(selector, status) {
            $(selector).DataTable({
                ...commonConfig,
                ajax: {
                    url: "{{ route('backend.message.index') }}",
                    data: function(d) {
                        d.status = status;
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'package_id',
                        name: 'package_id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    // {
                    //     data: 'company_name',
                    //     name: 'company_name'
                    // },
                    // {
                    //     data: 'visit_date',
                    //     name: 'visit_date'
                    // },
                    // {
                    //     data: 'project_type',
                    //     name: 'project_type'
                    // },
                    // {
                    //     data: 'project_size',
                    //     name: 'project_size'
                    // },
                    {
                        data: 'message',
                        name: 'message'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });
        }

        $(document).ready(function() {
            setupDataTable('#example', 'publish');
            setupDataTable('#example_draft', 'draft');
            setupDataTable('#example_trash', 'trash');
        });
    </script>

    {{-- exact good code --}}
@endpush
