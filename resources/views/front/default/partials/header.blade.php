  <!--================Header Menu Area =================-->
  <header class="header_area">
 
    <div class="main_menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="{{route('main')}}">
          <img class="logo_height" src="{{ asset('assets/img/logo.jpg') }}" alt="Logo">

          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
              <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home</a>
                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="category.html">Shop Category</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="single-product.html">Product Details</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="checkout.html">Product Checkout</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="cart.html">Shopping Cart</a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Blog</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="blog.html">Blog</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="single-blog.html">Blog Details</a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Pages</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="tracking.html">Tracking</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="elements.html">Elements</a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-search" aria-hidden="true"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                  
                  @if(Auth::check())
    <div class="user-dropdown dropdown">
        <div class="user-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person user-icon"></i>
            <div>
                <div class="text-muted" style="font-size: 12px;">Hello,</div>
                <div class="user-name text-primary">{{ Auth::user()->name }}</div> <!-- Dynamically display user name -->
            </div>
        </div>
        <ul class="dropdown-menu"   style="min-width: 8rem !important;">
        <li class="ms-0" style="margin-left: 0 !important;"><a class="dropdown-item" href="#">Dashboard</a></li>
            <li class="ms-0" style="margin-left: 0 !important;">
                <form action="{{ route('user.logout') }}" method="POST" id="logoutForm">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
    </div>
@else
    <a href="{{ route('user.login') }}" class="icons">
        <i class="ti-user" aria-hidden="true"></i>
    </a>
@endif

                  </li>

                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-heart" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!--================Header Menu Area =================-->


  