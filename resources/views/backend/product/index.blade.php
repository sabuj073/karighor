@extends('layouts.backend.master')
@section('title', 'All Products')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Active</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Draft</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Trash</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Active Product</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="activeProduct">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Short Description</th>
                                                <th>Order Number</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table td_btn">
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activeBlogs->links() }}
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Product</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="draft_data">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Short Description</th>
                                                <th>Order Number</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table td_btn">
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftBlogs->links() }}
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Product</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="trash_data">
                                        <thead class="">
                                            <tr>
                                                <th>SL</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Short Description</th>
                                                <th>Order Number</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table td_btn">
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $trashedBlogs->links() }}
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $(document).ready(function() {


            $('#activeProduct').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ route('backend.product.index') }}",
                    "data": function(d) {
                        d.status = 'publish';
                    }
                },
                columns: [{
                        data: 'sl',
                        name: 'sl',
                    },
                    {
                        data: 'thumbnail',
                        name: 'thumbnail',
                        render: function(data, type, full, meta) {
                            var imageUrl;
                            imageUrl = full
                                .thumbnail;
                            return '<img src="' + imageUrl +
                                '" class="" width="60" alt="" style="padding: 0!important" onerror="this.onerror=null;this.src=\'{{ asset('backend/images/placeholder.jpg') }}\';">';
                        }
                    },
                    // {
                    //     data: 'photo',
                    //     name: 'photo',
                    //     render: function(data, type, full, meta) {
                    //         var imageUrl;                            
                    //             imageUrl = full
                    //                 .photo;
                    //         return '<img src="' + imageUrl +
                    //             '" class="" width="60" alt="" style="padding: 0!important" onerror="this.onerror=null;this.src=\'{{ asset('backend/images/placeholder.jpg') }}\';">';
                    //     }
                    // },                    
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'feature',
                        name: 'feature',
                        render: function(data, type, full, meta) {
                            // Check if the feature data exists and is not null or undefined
                            if (data && data.length > 0) {
                                // Limit the feature text to 50 characters
                                if (data.length > 50) {
                                    return data.substr(0, 50) + '...';
                                }
                                return data;
                            } else {
                                // Return a placeholder or an empty string if there's no feature data
                                return '';
                            }
                        }
                    },

                    {
                        data: 'order_number',
                        name: 'order_number',
                    },
                    {
                        data: 'action',
                        name: 'action',
                    }

                ]
            });

        });

        function draft() {
            $('#draft_data').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ route('backend.product.index') }}",
                    "data": function(d) {
                        d.status = 'draft';
                    }
                },
                columns: [{
                        data: 'sl',
                        name: 'sl',
                    },
                    {
                        data: 'thumbnail',
                        name: 'thumbnail',
                        render: function(data, type, full, meta) {
                            var imageUrl;
                            imageUrl = full
                                .thumbnail;
                            return '<img src="' + imageUrl +
                                '" class="" width="60" alt="" style="padding: 0!important" onerror="this.onerror=null;this.src=\'{{ asset('backend/images/placeholder.jpg') }}\';">';
                        }
                    },
                    // {
                    //     data: 'photo',
                    //     name: 'photo',
                    //     render: function(data, type, full, meta) {
                    //         var imageUrl;                            
                    //             imageUrl = full
                    //                 .photo;
                    //         return '<img src="' + imageUrl +
                    //             '" class="" width="60" alt="" style="padding: 0!important" onerror="this.onerror=null;this.src=\'{{ asset('backend/images/placeholder.jpg') }}\';">';
                    //     }
                    // },                    
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'feature',
                        name: 'feature',
                        render: function(data, type, full, meta) {
                            // Check if the feature data exists and is not null or undefined
                            if (data && data.length > 0) {
                                // Limit the feature text to 50 characters
                                if (data.length > 50) {
                                    return data.substr(0, 50) + '...';
                                }
                                return data;
                            } else {
                                // Return a placeholder or an empty string if there's no feature data
                                return '';
                            }
                        }
                    },
                    {
                        data: 'order_number',
                        name: 'order_number',
                    },

                    {
                        data: 'action',
                        name: 'action',
                    }

                ]
            });
        }

        function trash() {
            $('#trash_data').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ route('backend.product.index') }}",
                    "data": function(d) {
                        d.status = 'trash';
                    }

                },
                columns: [{
                        data: 'sl',
                        name: 'sl',
                    },
                    {
                        data: 'thumbnail',
                        name: 'thumbnail',
                        render: function(data, type, full, meta) {
                            var imageUrl;
                            imageUrl = full
                                .thumbnail;
                            return '<img src="' + imageUrl +
                                '" class="" width="60" alt="" style="padding: 0!important" onerror="this.onerror=null;this.src=\'{{ asset('backend/images/placeholder.jpg') }}\';">';
                        }
                    },
                    // {
                    //     data: 'photo',
                    //     name: 'photo',
                    //     render: function(data, type, full, meta) {
                    //         var imageUrl;                            
                    //             imageUrl = full
                    //                 .photo;
                    //         return '<img src="' + imageUrl +
                    //             '" class="" width="60" alt="" style="padding: 0!important" onerror="this.onerror=null;this.src=\'{{ asset('backend/images/placeholder.jpg') }}\';">';
                    //     }
                    // },                    
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'feature',
                        name: 'feature',
                        render: function(data, type, full, meta) {
                            // Check if the feature data exists and is not null or undefined
                            if (data && data.length > 0) {
                                // Limit the feature text to 50 characters
                                if (data.length > 50) {
                                    return data.substr(0, 50) + '...';
                                }
                                return data;
                            } else {
                                // Return a placeholder or an empty string if there's no feature data
                                return '';
                            }
                        }
                    },
                    {
                        data: 'order_number',
                        name: 'order_number',
                    },
                    {
                        data: 'action',
                        name: 'action',
                    }

                ]
            });
        }
        $(document).ready(function() {
            draft();
            trash();
        });
    </script>
@endpush
