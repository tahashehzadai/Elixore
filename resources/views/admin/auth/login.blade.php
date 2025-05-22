<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Elixore Admin Panel</title>
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png" />
<link rel="stylesheet" href="{{ asset('admin/assets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img style="height:100px;" src="{{ asset('assets/img/logo.jpg') }}" alt="">
                </a>
  <form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf             
    <div class="mb-3">
        <label for="email" class="form-label">Admin Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
    </div>

    <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="form-check">
            <input class="form-check-input primary" type="checkbox" name="remember" id="remember">
            <label class="form-check-label text-dark" for="remember">
                Remember this Device
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4">Sign In</button>

   
</form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>