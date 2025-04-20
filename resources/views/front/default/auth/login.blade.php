<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png" />
    <title>Elixore Perfume Brands</title>
    <link rel="stylesheet" href="{{ asset('assets/css/loader.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
</head>

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
  <form id="loginForm">
    @csrf
    <h3>Login Form</h3>
    <p>Create Account <a href="{{ route('user.register.get') }}">Register</a></p>

    <!-- Email Field -->
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Enter Email" autocomplete="email" required />

    <!-- Password Field with Eye Icon to Toggle Visibility -->
    <div style="position: relative; margin-bottom: 15px;">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter Password" required style="padding-right: 40px;">
        <i class="bi bi-eye-slash toggle-password password-css" data-target="#password"></i>
    </div>

    <!-- Submit Button -->
    <button type="submit">Login Now</button>

    <!-- Response Message -->
    <div id="loginResponseMsg"></div>

    <!-- Social Login Buttons -->
    <div class="social">
        <div class="gg"><i class="bi bi-google"></i> Google</div>
        <div class="fb"><i class="bi bi-facebook"></i> Facebook</div>
    </div>
</form>


</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function () {
    // Toggle password visibility on eye icon click
    $('.toggle-password').on('click', function () {
        const input = $($(this).data('target'));  // Get the input element targeted by the eye icon
        const type = input.attr('type') === 'password' ? 'text' : 'password';  // Toggle type
        input.attr('type', type);  // Change the input type
        $(this).toggleClass('bi-eye bi-eye-slash');  // Toggle the eye icon class
    });

    // Handle login form submission using AJAX
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();  // Prevent page refresh

        $.ajax({
            type: 'POST',
            url: "{{ route('user.login.store') }}",  // Laravel route for login
            data: $(this).serialize(),  // Send form data
            success: function(response) {
                if (response.status) {
                    Swal.fire({
                        title: 'Logged In!',
                        text: response.message,
                        icon: 'success',
                        background: '#2c2c2c', // Dark background
                        color: '#fff',  // White text
                        confirmButtonColor: '#48C9B0', // Button color
                        confirmButtonText: 'Go to Dashboard',
                    }).then(() => {
                        window.location.href = response.redirect;
                    });
                } else {
                    Swal.fire({
                        title: 'Oops!',
                        text: response.message,
                        icon: 'error',
                        background: '#2c2c2c', // Dark background
                        color: '#fff',  // White text
                        confirmButtonColor: '#e74c3c', // Button color
                        confirmButtonText: 'Try Again',
                    });
                }
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMsg = '';
                $.each(errors, function(key, value) {
                    errorMsg += `${value[0]}\n`;
                });

                Swal.fire({
                    title: 'Validation Error!',
                    text: errorMsg,
                    icon: 'warning',
                    background: '#2c2c2c', // Dark background
                    color: '#fff',  // White text
                    confirmButtonColor: '#f39c12', // Button color
                    confirmButtonText: 'Close',
                });
            }
        });
    });
});

</script>

<script src="{{ asset('assets/js/loader.js') }}"></script>
</html>