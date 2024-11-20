@extends('layouts.backend.master')
@section('title', 'Edit Specification')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <h5><a href="{{ route('index') }}">Dashboard /</a></h5>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <h5><a href="{{ route('backend.specification.index') }}">All Specifications</a></h5>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="{{ route('backend.specification.update', $specification->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Edit Specification Info</h1>
                            </div>
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <label for="">Select Product:</label>
                                        <select name="product_id" class="form-control" required>
                                            <option value="">--Select--</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" {{ $specification->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="">Select Type:</label>
                                        <select name="type_id" class="form-control" required>
                                            <option value="">--Select--</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}" {{ $specification->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label for="">Specification:</label>
                                    @php
                                        $specifications = json_decode($specification->data);
                                        $t_specifications = json_decode($product->type_specification);
                                    @endphp
                                    @if ($specifications)
                                        @foreach ($specifications as $specification)
                                            <div class="row">
                                                <div class="form-group col-lg-5">
                                                    <label for="">Name:</label>
                                                    <input type="text" name="s_name[]" class="form-control"
                                                        placeholder="Enter Name" id=""
                                                        value="{{ $specification->name }}">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="">Value:</label>
                                                    <input type="text" name="s_value[]" class="form-control"
                                                        placeholder="Enter Value" value="{{ $specification->value }}">
                                                </div>
                                                <div class="form-group col-lg-1">
                                                    <img style="cursor:pointer;margin-top:28px"
                                                        src="/backend/images/icon/close.png" alt="Remove"
                                                        class="remove-btn" onclick="removeNewRow(this)">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <span class="contact_field"></span>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-success" onclick="addContactRow()">Add
                                                More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mb-3 text-right">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </section>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $("#name").on("keyup", function(e) {
                $("#slug").val(convertToSlug($(this).val()));
            })
        });

        function convertToSlug(Text) {
            return Text
                .toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
        }

        function addContactRow() {
            // Create a new row element
            var newRow = document.createElement('div');
            newRow.className = 'col-md-12';
            // Set the inner HTML of the new row
            newRow.innerHTML = `<div class="contact_field row mt-3">
                                        
                <div class="form-group col-lg-5">
                                                <label for="">Name:</label>
                                                <input type="text" name="s_name_new[]" class="form-control"
                                                    placeholder="Enter Name" id="">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="">Value:</label>
                                                <input type="text" name="s_value_new[]" class="form-control"
                                                placeholder="Enter Value">
                                            </div>
                                            <div class="form-group col-lg-1">
                                            <img style="cursor:pointer;margin-top:28px" src="/backend/images/icon/close.png" alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                        </div>
                                    </div>`;
            // Append the new row to the "multiple_field" class element
            var multipleField = document.querySelector('.contact_field');
            multipleField.appendChild(newRow);
        }

        function addTypeRow() {
            // Create a new row element
            var newRow = document.createElement('div');
            newRow.className = 'col-md-12';
            // Set the inner HTML of the new row
            newRow.innerHTML = `<div class="type_field_input row mt-3">
                                        
                <div class="form-group col-lg-5">
                                                <label for="">Name:</label>
                                                <input type="text" name="t_name[]" class="form-control"
                                                    placeholder="Enter Name" id="">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="">Value:</label>
                                                <input type="text" name="t_value[]" class="form-control"
                                                placeholder="Enter Value">
                                            </div>
                                            <div class="form-group col-lg-1">
                                            <img style="cursor:pointer;margin-top:28px" src="/backend/images/icon/close.png" alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                        </div>
                                    </div>`;
            // Append the new row to the "multiple_field" class element
            var multipleField = document.querySelector('.type_field_input');
            multipleField.appendChild(newRow);
        }

        function addTypeRowOutput() {
            // Create a new row element
            var newRow = document.createElement('div');
            newRow.className = 'col-md-12';
            // Set the inner HTML of the new row
            newRow.innerHTML = `<div class="type_field_output row mt-3">
                                        
                <div class="form-group col-lg-5">
                                                <label for="">Name:</label>
                                                <input type="text" name="t_name[]" class="form-control"
                                                    placeholder="Enter Name" id="">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="">Value:</label>
                                                <input type="text" name="t_value[]" class="form-control"
                                                placeholder="Enter Value">
                                            </div>
                                            <div class="form-group col-lg-1">
                                            <img style="cursor:pointer;margin-top:28px" src="/backend/images/icon/close.png" alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                        </div>
                                    </div>`;
            // Append the new row to the "multiple_field" class element
            var multipleField = document.querySelector('.type_field_output');
            multipleField.appendChild(newRow);
        }

        function removeRow(image) {
            // Get the parent row element and remove it
            var row = image.closest('.col-md-12');
            row.parentNode.removeChild(row);
        }

        function removeNewRow(image) {
            var row = image.closest('.row');
            row.parentNode.removeChild(row);
        }
        $('#input').on('change', function() {
            if ($(this).is(':checked')) {
                let type = $(this).val();
                console.log(type);
                if (type == 'input') {
                    $('#type_field_input').removeClass('d-none');
                } else {
                    $('#type_field_input').addClass('d-none');
                }
            } else {
                $('#type_field_input').addClass('d-none');
            }
        });
        $('#output').on('change', function() {
            if ($(this).is(':checked')) {
                let type = $(this).val();
                console.log(type);
                if (type == 'output') {
                    $('#type_field_output').removeClass('d-none');
                } else {
                    $('#type_field_output').addClass('d-none');
                }
            } else {
                $('#type_field_output').addClass('d-none');
            }
        });
    </script>
@endpush
