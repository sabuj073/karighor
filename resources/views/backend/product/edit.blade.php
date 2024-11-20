@extends('layouts.backend.master')
@section('title', 'Edit Product')
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
                            <h5><a href="{{ route('backend.product.index') }}">All Product</a></h5>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="{{ route('backend.product.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Edit Product Info</h1>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" id="name" name="name" class=" form-control"
                                            placeholder="Enter Product Name" value="{{ $product->name }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Slug:</label>
                                        <input type="text" id="slug" name="slug" class="form-control"
                                            placeholder="If you don't want to create keep it blank"
                                            value="{{ $product->slug }}">
                                    </div>
                                </div>
                                {{-- <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <label for="category_id">Select Category:</label>
                                        <select name="category_id" id="category_id" class="form-control" required>
                                            <option value="">--Select--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="">Product Code</label>
                                        <input type="text" name="sku" id="" class="form-control"
                                            placeholder="Enter Code" value="{{ $product->sku }}">
                                    </div>
                                </div> --}}

                                <div class="row mt-3">
                                    <div class=" form-group col-lg-6">
                                        <label>Image(300x300):</label>
                                        <input type="file" name="thumbnail" class=" form-control"
                                            onchange="imagePreView(this,'photoInput')">
                                        <img src="{{ $product->thumbnail }}" class="mt-3" width="80" alt="">
                                        <img id="photoInput" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class=" form-group col-lg-6">
                                        <label>Order Number:</label>
                                        <input type="number" name="order_number" class=" form-control" placeholder="Enter Order Number" value="{{ $product->order_number }}">
                                        [Higher Number Get Priority]
                                    </div>
                                    {{-- <div class="form-group col-lg-6">
                                        <label>Banner(1700x500):</label>
                                        <input type="file" name="photo" class=" form-control"
                                            onchange="imagePreView(this,'banner_img')">
                                        <img src="{{ $product->photo }}" class="mt-3" width="80" alt="">
                                        <img id="banner_img" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div> --}}

                                </div>
                                {{-- <div class="row mt-3">
                                    <div class=" form-group col-lg-6">
                                        <label>PDF(Max 2mb):</label>
                                        <input type="file" name="pdf" class=" form-control">
                                        @if ($product->pdf != null)
                                        <a href="{{ url('storage/product') . '/' . $product->pdf }}" class="mt-2" target="_blank">Product PDF</a>
                                        @endif

                                    </div>
                                    

                                </div> --}}
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Short Description:</label>
                                        <textarea name="feature" id="" class="form-control" rows="3" placeholder="Enter Short Description">{{ $product->feature }}</textarea>
                                    </div>

                                </div>
                                {{-- <div class="mt-3">
                                    <label for="">Specification:</label>
                                    @php
                                        $specifications = json_decode($product->specification);
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
                                    
                                </div> --}}
                                <div class="form-group mt-3">
                                    <label>Description:</label>
                                    <textarea name="description" id="editor" class="form-control " rows="7"
                                        placeholder="Enter Product Description">{{ $product->description }}</textarea>
                                </div>


                            </div>

                        </div>

                    </div>
                    <div class="col-lg-4 mt_70">
                        <div class="card">
                            <div class="card-body">
                                <h4>Meta Info</h4>
                                <div class=" form-group mt-3">
                                    <label>Meta Photo:[16x9 Ratio Recomended]</label>
                                    <input type="file" name="m_photo" class=" form-control"
                                        onchange="imagePreView(this,'meta_img')">
                                    <img src="{{ $product->m_photo }}" class="mt-3" width="80" alt="">
                                    <img id="meta_img" class="mt-3" src="#" alt="Preview"
                                        style="display: none; max-width: 80px; max-height: 80px;">
                                </div>
                                <div class="form-group mt-3">
                                    <label>Meta Title:</label>
                                    <input type="text" name="m_title" class="form-control" placeholder="Enter Meta Title"
                                        value="{{ $product->m_title }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label>Meta Keyword:</label>
                                    <input type="text" name="m_keyword" class="form-control"
                                        placeholder="Enter Meta Keyword" value="{{ $product->m_keyword }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label>Meta Description:</label>
                                    <textarea name="m_description" class="form-control" placeholder="Enter Meta Description" rows="5">{{ $product->m_description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-lg-2 text-end">
                        <button type="submit" name="submit" class="btn btn-primary mb-3 w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
   
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $("#name").on("keyup", function(e) {
                $("#slug").val(convertToSlug($(this).val()));
            })
            initializeSummernote('#editor');
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
            newRow.innerHTML = `<div class="type_field row mt-3">
                                        
                <div class="form-group col-lg-5">
                                                <label for="">Name:</label>
                                                <input type="text" name="t_name_new[]" class="form-control"
                                                    placeholder="Enter Name" id="">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="">Value:</label>
                                                <input type="text" name="t_value_new[]" class="form-control"
                                                placeholder="Enter Value">
                                            </div>
                                            <div class="form-group col-lg-1">
                                            <img style="cursor:pointer;margin-top:28px" src="/backend/images/icon/close.png" alt="Remove" class="remove-btn" onclick="removeRow(this)">
                                        </div>
                                    </div>`;
            // Append the new row to the "multiple_field" class element
            var multipleField = document.querySelector('.type_field');
            multipleField.appendChild(newRow);
        }

        function removeRow(image) {
            // Get the parent row element and remove it
            var row = image.closest('.col-md-12');
            row.parentNode.removeChild(row);
        }
        $('#type').on('change', function() {
            let type = $('#type').val();
            if (type != '') {
                $('#type_field').removeClass('d-none');
            } else {
                $('#type_field').addClass('d-none');
            }
        });

        function removeNewRow(image) {
            var row = image.closest('.row');
            row.parentNode.removeChild(row);
        }
    </script>
@endpush
