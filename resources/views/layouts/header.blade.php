<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
    <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Email Send') }}
                </a>
  <a href={{ url('home') }} class="logo d-flex align-items-center">
    <!-- <img src="{{ asset('/')}}assets/img/logo.png" alt=""> -->

  </a>

  

  <i class="bi bi-list toggle-sidebar-btn" id="toggle_btn" style="margin-left:-120px;"></i>
</div><!-- End Logo -->

<!-- <div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div> -->
<!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li>
    <!-- End Search Icon-->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" style="margin-top: 20px;">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number"></span>
      </a><!-- End Notification Icon -->&nbsp;

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-chat-left-text"></i>
        <span class="badge bg-success badge-number"></span>
      </a><!-- End Messages Icon -->
      

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="{{ asset('/')}}assets/img/dp.jpg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>{{ Auth::user()->name }}</h6>
        </li>
        <li>
        <a class="dropdown-item d-flex align-items-center" href={{ url('#') }}>
           <i class="bi bi-person"></i>
           <span>My Profile</span>
        </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

       

        <li>
          <a class="dropdown-item d-flex align-items-center" href={{ url('#') }}>
            <i class="bi bi-envelope"></i>
            <span>Contact</span>
          </a>
        </li><!-- End Contact Page Nav -->

        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
          </form>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->