<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
                  <img style="height:100px; width:200px;" src="{{ asset('assets/img/logo.jpg') }}" alt="">
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
          
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Forms</span>
              </a>
            </li>
            
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:planet-3-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Alert</span>
              </a>
            </li>
          </ul>
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Pages</span>
            </li>
           <li class="sidebar-item">
    <a class="sidebar-link has-arrow" href="#homeSubmenu" data-bs-toggle="collapse" aria-expanded="false">
        <span>
            <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
        </span>
        <span class="hide-menu">Home</span>
    </a>
   <ul class="collapse list-unstyled {{ Request::routeIs('admin.banner-images.*', 'admin.products.*') ? 'show' : '' }}" id="homeSubmenu">
    <li class="sidebar-subitem">
        <a class="sidebar-link {{ Request::routeIs('admin.banner-images.*') ? 'active' : '' }}" 
           href="{{ route('admin.banner-images.index') }}">
            Banner Images
        </a>
    </li>
    <li class="sidebar-subitem">
        <a class="sidebar-link {{ Request::routeIs('admin.products.*') ? 'active' : '' }}" 
           href="{{ route('admin.products.index') }}">
            Products
        </a>
    </li>
</ul>

</li>

          
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Blog</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Shop</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">FAQ</span>
              </a>
            </li>
            
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:planet-3-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">About US</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:planet-3-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Contact US</span>
              </a>
            </li>
          </ul>
        
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>