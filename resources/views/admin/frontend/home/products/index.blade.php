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
            <h5 class="card-title fw-semibold mb-4">Products Image</h5>
            <div class="card">
              <div class="card-body">
                  <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">
    <i class="bi bi-plus-lg me-1"></i> Create Products
</a>
  <!-- Include DataTables CSS -->

<div class="table-responsive">
  <table id="productsTable" class="table text-nowrap align-middle mb-0">
    <thead>
      <tr class="border-2 border-bottom border-primary border-0"> 
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Discount Price</th>
        <th scope="col">Image</th>
        <th scope="col" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $index => $products)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $products->name }}</td>
        <td>${{ $products->price }}</td>
        <td>${{ $products->discount_price }}</td>
        <td>
          @if($products->image)
            <img src="{{ asset('storage/' . $products->image) }}" alt="products" width="80" class="rounded">
          @endif
        </td>
        <td class="text-center">
          <a href="{{ route('admin.products.edit', $products->id) }}" class="btn btn-sm btn-warning">Edit</a>
          <form action="{{ route('admin.products.destroy', $products->id) }}" method="POST" class="d-inline delete-form">
    @csrf
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">Elixore.com</a> Distributed by <a  target="_blank"
              class="pe-1 text-primary text-decoration-underline">Elixore</a></p>
        </div>
      </div>



 @endsection
 
<!-- Include jQuery + DataTables -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Initialize DataTable -->
<script>
  $(document).ready(function () {
    $('#productsTable').DataTable({
      responsive: true
    });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const deleteForms = document.querySelectorAll(".delete-form");

    deleteForms.forEach(form => {
      form.addEventListener("submit", function (e) {
        e.preventDefault(); // prevent default form submit

        Swal.fire({
          title: "Are you sure?",
          text: "This action cannot be undone.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Yes, delete it!",
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit(); // manually submit the form
          }
        });
      });
    });
  });
</script>
