<!DOCTYPE html>
<html lang="en">

@include('front.default.partials.css')
@include('front.default.partials.header')

<body>
    <!-- Loader -->
    <div id="loader">
  <div class="circle-loader">
    <div class="arc arc1"></div>
    <div class="arc arc2"></div>
    <div class="arc arc3"></div>
    <div class="arc arc4"></div>
  </div>
</div>

    @yield('content')

    <!-- Page Content -->
</body>

@include('front.default.partials.footer')
@include('front.default.partials.js')


</html>