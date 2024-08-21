<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h2>Welcome to the Home Page</h2>
    <div class="navbar-menu-wrapper d-flex align-items-center">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown ml-3">
        <a class="btn btn-danger" href="{{ route('subadmin.logout') }}" role="button">Logout</a>
      </li>
      <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown ml-3">
        <a class="btn btn-danger" href="{{ route('calculator') }}" role="button">Calculator</a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</body>
</html>
