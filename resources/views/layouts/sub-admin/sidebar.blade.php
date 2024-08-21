<nav class="sidebar sidebar-offcanvas pt-3" id="sidebar">

  <ul class="nav">

    <li class="nav-item dashboard-icon {{ request()->is('subadmin/dashboard') || request()->is('subadmin/dashboard/*') ? 'active-class' : '' }}">

      <a class="nav-link" href="{{ route('subadmin.dashboard') }}">

        <i class="menu-icon fa fa-desktop font-size-15" data-unicode="f108"></i>

        <span class="menu-title">Dashboard</span>

      </a>

    </li>
    <li class="nav-item products-icon">

      <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">

        <i class="menu-icon fa fa-cubes font-size-14" data-unicode="f1b3"></i>

        <span class="menu-title">Order Management</span>

        <i class="menu-arrow"></i>

      </a>

      <div class="collapse sub" id="products">

        <ul class="nav flex-column sub-menu">

          <li class="nav-item {{ request()->is('subadmin/order') ? 'active' : '' }}">

            <a class="nav-link" href="{{ route('subadmin.order.index') }}">

             <i class="menu-icon fa fa-file-text-o" data-unicode="f0f6"></i> 

             <span class="menu-title">Order</span>

            </a>

          </li>

          <li class="nav-item {{ request()->is('subadmin/visitorder') ? 'active' : '' }}">

            <a class="nav-link" href="{{ route('subadmin.visitorder.index') }}">

            <i class="menu-icon fa fa-file-text" data-unicode="f15c"></i> 

            <span class="menu-title">Pending requests (Need to visit)</span> 

            </a>

          </li>

          <li class="nav-item {{ request()->is('subadmin/quotationorder') || request()->is('subadmin/quotationorder/*') ? 'active' : '' }}">

            <a class="nav-link" href="{{ route('subadmin.quotationorder.index') }}"> 

            <i class="menu-icon fa fa-database" data-unicode="f1c0"></i> 

              <span class="menu-title">Pending requests (Need to give quote)</span> 

            </a>

          </li>

          <li class="nav-item {{ request()->is('subadmin/cancel') || request()->is('subadmin/cancel/*') ? 'active' : '' }}">

            <a class="nav-link" href="{{ route('subadmin.cancel.index') }}">

            <i class="menu-icon fa fa-briefcase" data-unicode="f0b1"></i>  

            <span class="menu-title">Cancelled requests</span> 

            </a>

          </li>

          <li class="nav-item {{ request()->is('subadmin/complete') || request()->is('subadmin/complete/*') ? 'active' : '' }}">

            <a class="nav-link" href="{{ route('subadmin.complete.index') }}">

            <i class="menu-icon fa fa-database" data-unicode="f1c0"></i> 

            <span class="menu-title">Completed requests</span> 

            </a>

          </li>

          
          <!-- <li class="nav-item {{ request()->is('subadmin/inquery') || request()->is('subadmin/inquery/*') ? 'active' : '' }}">

            <a class="nav-link" href="{{ route('subadmin.inquery.index') }}">

            <i class="menu-icon fa fa-briefcase" data-unicode="f0b1"></i>  

            <span class="menu-title">Inquery</span> 

            </a>

          </li> -->


        </ul>

      </div>

    </li>

  </ul>

</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>