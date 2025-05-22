@extends('admin.frontend.partials.app')
@section('content')

  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
         @include('admin.frontend.partials.header')

      <!--  Header End -->
       <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Forms</h5>
            <div class="card">
              <div class="card-body">
       <form method="POST" action="{{ route('admin.banner-images.store') }}" enctype="multipart/form-data">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <!-- Title -->
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <!-- Sub Title -->
    <div class="mb-3">
        <label for="sub_title" class="form-label">Sub Title</label>
        <input type="text" name="sub_title" class="form-control">
    </div>

    <!-- Description -->
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
    </div>

    <!-- Dotted Dropzone Box with Preview -->
    <div class="mb-3">
        <label class="form-label">Upload Banner Image (JPG/PNG)</label>
        <div id="drop-area" class="border border-primary border-dashed rounded p-4 text-center" style="cursor: pointer;">
            <input type="file" name="image" id="image" class="d-none" accept="image/*">
            <div id="preview-container">
                <img id="preview" src="#" alt="Image Preview" style="display: none; max-height: 150px; margin-bottom: 10px;" class="img-fluid rounded">
            </div>
            <div>
                <i style="font-size: 4.125rem !important;" class="bi bi-cloud-arrow-up  text-primary"></i>
                <p class="text-muted">Click to Upload or drag & drop</p>
            </div>
        </div>
    </div>

    <!-- Button -->
    <div class="mb-3">
        <label for="button" class="form-label">Button Text</label>
        <input type="text" name="button" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Create Banner</button>
</form>


              </div>
            </div>
          
          </div>
        </div>
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">Elixore.com</a> Distributed by <a  target="_blank"
              class="pe-1 text-primary text-decoration-underline">Elixore</a></p>
        </div>
      </div>


 @endsection
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
    $(document).ready(function () {
        // Click on drop area triggers file input
        $('#drop-area').on('click', function (e) {
            e.stopPropagation(); // Prevent bubbling
            $('#image').click();
        });

        // Prevent file input click from bubbling up to drop area
        $('#image').on('click', function (e) {
            e.stopPropagation();
        });

        // Image preview logic
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
