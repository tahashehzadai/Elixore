@extends('admin.frontend.partials.app')

@section('content')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
    data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

    <div class="body-wrapper">
        @include('admin.frontend.partials.header')

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Edit Banner</h5>

                    <div class="card">
                        <div class="card-body">

                            <form method="POST"
                                action="{{ route('admin.banner-images.update', $banner->id) }}"
                                enctype="multipart/form-data">

                                @csrf

                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" required
                                        value="{{ old('name', $banner->name) }}">
                                </div>

                                <!-- Title -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" required
                                        value="{{ old('title', $banner->title) }}">
                                </div>

                                <!-- Sub Title -->
                                <div class="mb-3">
                                    <label for="sub_title" class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control"
                                        value="{{ old('sub_title', $banner->sub_title) }}">
                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" class="form-control"
                                        rows="3">{{ old('description', $banner->description) }}</textarea>
                                </div>

                                <!-- Image Upload -->
                             <div class="mb-3">
    <label class="form-label">Upload Banner Image (JPG/PNG)</label>
    <div id="drop-area" 
         class="border border-primary border-dashed rounded p-4 text-center d-flex flex-column align-items-center justify-content-center"
         style="cursor: pointer; min-height: 180px;">
        <input type="file" name="image" id="image" class="d-none" accept="image/*">
        <div id="preview-container" class="d-flex justify-content-center w-100">
            <img id="preview" src="{{ $banner->image ? asset('storage/' . $banner->image) : '#' }}" 
                 alt="Image Preview" 
                 style="{{ $banner->image ? 'display: block; max-height: 150px; margin: 0 auto;' : 'display: none;' }}" 
                 class="img-fluid rounded" />
        </div>
    </div>
</div>


                                <!-- Button Text -->
                                <div class="mb-3">
                                    <label for="button" class="form-label">Button Text</label>
                                    <input type="text" name="button" class="form-control"
                                        value="{{ old('button', $banner->button) }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Update Banner</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

            <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">Design and Developed by
                    <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">Elixore.com</a>
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
    // Clicking anywhere on drop area or on preview image opens file select
    $('#drop-area, #preview').on('click', function (e) {
        e.stopPropagation();
        $('#image').click();
    });

    // Prevent file input click from bubbling up
    $('#image').on('click', function (e) {
        e.stopPropagation();
    });

    // When user selects new image, update preview
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