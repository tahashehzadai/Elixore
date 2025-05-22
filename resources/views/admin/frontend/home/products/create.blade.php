@extends('admin.frontend.partials.app')

@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">

  <div class="body-wrapper">
    @include('admin.frontend.partials.header')

    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Create Product</h5>
          <div class="card">
            <div class="card-body">

              <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                  <label for="name" class="form-label">Product Name</label>
                  <input type="text" name="name" class="form-control" required>
                </div>

                <!-- Price -->
                <div class="mb-3">
                  <label for="price" class="form-label">Price</label>
                  <input type="number" name="price" step="0.01" class="form-control" required>
                </div>

                <!-- Discount Price -->
                <div class="mb-3">
                  <label for="discount_price" class="form-label">Discount Price (optional)</label>
                  <input type="number" name="discount_price" step="0.01" class="form-control">
                </div>

                <!-- Image Upload with Preview -->
                <div class="mb-3">
                  <label class="form-label">Upload Product Image (JPG/PNG)</label>
                  <div id="drop-area" class="border border-primary border-dashed rounded p-4 text-center" style="cursor: pointer;">
                    <input type="file" name="image" id="image" class="d-none" accept="image/*">
                    <div id="preview-container">
                      <img id="preview" src="#" alt="Image Preview" style="display: none; max-height: 150px;" class="img-fluid rounded">
                    </div>
                    <div>
                      <i style="font-size: 4.125rem !important;" class="bi bi-cloud-arrow-up text-primary"></i>
                      <p class="text-muted">Click to Upload or drag & drop</p>
                    </div>
                  </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Create Product</button>
              </form>

            </div>
          </div>
        </div>
      </div>

      <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
            class="pe-1 text-primary text-decoration-underline">Elixore.com</a> Distributed by <a target="_blank"
            class="pe-1 text-primary text-decoration-underline">Elixore</a></p>
      </div>
    </div>
  </div>
</div>
@endsection

<!-- jQuery for preview -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
  $(document).ready(function () {
    $('#drop-area').on('click', function (e) {
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
