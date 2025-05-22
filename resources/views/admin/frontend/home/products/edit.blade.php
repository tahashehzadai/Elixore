@extends('admin.frontend.partials.app')

@section('content')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
    data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

    <div class="body-wrapper">
        @include('admin.frontend.partials.header')

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Edit Product</h5>

                    <div class="card">
                        <div class="card-body">

                            <form method="POST"
                                action="{{ route('admin.products.update', $products->id) }}"
                                enctype="multipart/form-data">

                                @csrf

                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" name="name" class="form-control" required
                                        value="{{ old('name', $products->name) }}">
                                </div>

                                <!-- Price -->
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" name="price" step="0.01" class="form-control" required
                                        value="{{ old('price', $products->price) }}">
                                </div>

                                <!-- Discount Price -->
                                <div class="mb-3">
                                    <label for="discount_price" class="form-label">Discount Price (optional)</label>
                                    <input type="number" name="discount_price" step="0.01" class="form-control"
                                        value="{{ old('discount_price', $products->discount_price) }}">
                                </div>

                             

                                <!-- Image Upload -->
                                <div class="mb-3">
                                    <label class="form-label">Product Image (JPG/PNG)</label>
                                    <div id="drop-area"
                                        class="border border-primary border-dashed rounded p-4 text-center d-flex flex-column align-items-center justify-content-center"
                                        style="cursor: pointer; min-height: 180px;">
                                        <input type="file" name="image" id="image" class="d-none" accept="image/*">
                                        <div id="preview-container" class="d-flex justify-content-center w-100">
                                            <img id="preview"
                                                src="{{ $products->image ? asset('storage/' . $products->image) : '#' }}"
                                                alt="Image Preview"
                                                style="{{ $products->image ? 'display: block; max-height: 150px;' : 'display: none;' }}"
                                                class="img-fluid rounded" />
                                        </div>
                                    </div>
                                </div>

                               

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Update Product</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

            <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">Design and Developed by
                    <a href="https://adminmart.com/" target="_blank"
                        class="pe-1 text-primary text-decoration-underline">Elixore.com</a>
                    Distributed by
                    <a target="_blank" class="pe-1 text-primary text-decoration-underline">Elixore</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function () {
    $('#drop-area, #preview').on('click', function (e) {
        e.stopPropagation();
        $('#image').click();
    });

    $('#image').on('click', function (e) {
        e.stopPropagation();
    });

    $('#image').on('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result).show();
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
