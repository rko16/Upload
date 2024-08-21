<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center logo-border">
    <a class="navbar-brand brand-logo" href="{{ route('subadmin.dashboard') }}">
      <img src="{{ asset('assets/images/newlogo.png') }}" alt="logo" /> </a>
    <a class="navbar-brand brand-logo-mini" href="index.html">
      <img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /> </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown ml-3">
        <a class="btn btn-danger" href="{{ route('subadmin.logout') }}" role="button">Logout</a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>