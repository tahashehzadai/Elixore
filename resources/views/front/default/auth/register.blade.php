<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png" />
    <title>Elixore Perfume Brands</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/loader.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
</head>
<style>
  form {
    height: 710px !important;
  }
</style>
<body>
<div id="loader">
  <div class="circle-loader">
    <div class="arc arc1"></div>
    <div class="arc arc2"></div>
    <div class="arc arc3"></div>
    <div class="arc arc4"></div>
  </div>
</div>
  <div class="background">
    <div class="shapes"></div>
    <div class="shapes"></div>
  </div>
  <form id="registerForm">
    @csrf
    <h5 class="text-light">Register Form</h5>
    <p>Already have account go to <a href="{{route('user.login')}}">login</a></p>
    <label>Name</label>
    <input type="text" name="name" placeholder="Enter Name" required>

    <label>Email</label>
    <input type="email" name="email" placeholder="Enter Email" required>

   <!-- Password -->
<div style="position: relative; margin-bottom: 15px;">
  <label for="password">Password</label>
  <input type="password" id="password" name="password" placeholder="Enter Password" required style="padding-right: 40px;">
  <i class="bi bi-eye-slash toggle-password password-css"
   data-target="#password"
   ></i>

</div>

<!-- Confirm Password -->
<div style="position: relative;">
  <label for="password_confirmation">Confirm Password</label>
  <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required style="padding-right: 40px;">
  <i class="bi bi-eye-slash toggle-password passwoed-css1"
   data-target="#password_confirmation"
  ></i>


</div>


    <button type="submit">Register</button>
    <div class="social mb-2">
<a href="{{ route('google.login') }}" style="text-decoration: none;">
    <div class="gg">
        <i class="bi bi-google"></i> Google
    </div>
</a>
<a href="{{ route('facebook.login') }}" style="text-decoration: none;">
    <div class="fb">
        <i class="bi bi-facebook"></i> Facebook
    </div>
</a>
    </div>
    <div id="responseMsg"></div>
</form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/loader.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$('#registerForm').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: "{{ route('user.register') }}",
        data: $(this).serialize(),
        success: function(response) {
            if (response.status) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Registration completed successfully.',
                    icon: 'success',
                    iconColor: '#00ff9c',
                    background: '#1e1e2f',
                    color: '#ffffff',
                    confirmButtonColor: '#00ff9c',
                    confirmButtonText: 'Login Now',
                    customClass: {
                        popup: 'animated fadeInDown'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('user.login') }}";
                    }
                });

                $('#registerForm')[0].reset();
                $('#responseMsg').html('');
            }
        },
        error: function(xhr) {
            let errors = xhr.responseJSON.errors;
            let errorMsg = '<ul style="color:red;">';
            $.each(errors, function(key, value) {
                errorMsg += `<li>${value[0]}</li>`;
            });
            errorMsg += '</ul>';
            $('#responseMsg').html(errorMsg);
        }
    });
});
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $('.toggle-password').on('click', function () {
      const input = $($(this).data('target'));
      const type = input.attr('type') === 'password' ? 'text' : 'password';
      input.attr('type', type);
      $(this).toggleClass('bi-eye bi-eye-slash');
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>