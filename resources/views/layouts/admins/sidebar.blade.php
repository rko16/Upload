<nav class="sidebar sidebar-offcanvas pt-3" id="sidebar">
    <ul class="nav">
        <li class="nav-item dashboard-icon {{ request()->is('admin/dashboard') || request()->is('admin/city/*/amount') ? 'active-class' : '' }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="menu-icon fa fa-desktop font-size-15" data-unicode="f108"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item users-icon {{ request()->is('admin/user/index') || request()->is('admin/userdetail/*') ? 'active-class' : '' }}">
            <a class="nav-link" href="{{ route('admin.pm.userindex')}}">
                <i class="menu-icon fa fa-users font-size-16" data-unicode="f0c0"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item clients-icon {{ request()->is('admin/pm') || request()->is('admin/pm/*') ? 'active-class' : '' }}">
            <a class="nav-link" href="{{ route('admin.pm.index') }}">
                <i class="menu-icon fa fa-user font-size-20" data-unicode="f007"></i>
                <span class="menu-title">Project Managers</span>
            </a>
        </li>
        <li class="nav-item clients-icon {{ request()->is('admin/quotationvisit') || request()->is('admin/quotationvisit/*') ? 'active-class' : '' }}">
            <a class="nav-link" href="{{ route('admin.quotationvisit.index')}}">
                <i class="menu-icon fa fa-search font-size-20" data-unicode="f007"></i>
                <span class="menu-title">Enquiries</span>
            </a>
        </li>
    <!-- <li class="nav-item clients-icon {{ request()->is('admin/inqueryAdmin') || request()->is('admin/inqueryAdmin/*') ? 'active-class' : '' }}">
      <a class="nav-link" href="{{ route('admin.inqueryAdmin.index')}}">
        <i class="menu-icon fa fa-user font-size-20" data-unicode="f007"></i>
        <span class="menu-title">Inquery</span>
      </a>
    </li> -->
    
    <!-- <li class="nav-item clients-icon {{ request()->is('admin/solar') || request()->is('admin/solar/*') ? 'active-class' : '' }}">
      <a class="nav-link" href="{{ route('admin.solar.index') }}">
        <i class="menu-icon fa fa-user font-size-20" data-unicode="f007"></i>
        <span class="menu-title">Solar</span>
      </a>
    </li> -->
    <!-- <li class="nav-item clients-icon {{ request()->is('admin/area') || request()->is('admin/area/*') ? 'active-class' : '' }}">
      <a class="nav-link" href="{{ route('admin.area.index') }}">
        <i class="menu-icon fa fa-area-chart font-size-20" data-unicode="f007"></i>
        <span class="menu-title">Area</span>
      </a>
    </li> -->
        <li class="nav-item products-icon">
            <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
                <i class="menu-icon fa fa-cubes font-size-14" data-unicode="f1b3"></i>
                <span class="menu-title">CMS</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse sub" id="products">
                <ul class="nav flex-column sub-menu">
              <!-- <li class="nav-item {{ request()->is('admin/about') || request()->is('admin/about/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.about.index') }}">
                 <i class="menu-icon fa fa-file-text-o" data-unicode="f0f6"></i> 
                 <span class="menu-title">About us Management</span>
                </a>
              </li> -->
                    <div class="btn-group dropdown">
                        <button type="button" class="dropdown-toggle font-size-14" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;color: #ffffff; border: 0;padding:5px 92px 5px 48px;background-color: #2d8e93;">
            <!-- <i class="fa fa-cubes" data-unicode="f1b3"></i> Location -->
                            <i class="menu-icon fa fa-cubes mr-3" data-unicode="f1c0"></i> 
                            <span class="menu-title"> Location</span>
                        </button>
                        <div class="dropdown-menu custom-dropdown">
                            <a class="dropdown-item" href="{{ route('admin.state.index') }}">State</a>
                            <a class="dropdown-item" href="{{ route('admin.city.index') }}">City</a>
                        </div>
                    </div>
                    <li class="nav-item {{ request()->is('admin/service') || request()->is('admin/service/create') || request()->is('admin/service/*/edit') || request()->is('admin/service/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.service.index') }}"> 
                            <i class="menu-icon fa fa-database" data-unicode="f1c0"></i> 
                            <span class="menu-title">Service Management</span> 
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/project') || request()->is('admin/project/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.project.index') }}">
                            <i class="menu-icon fa fa-database" data-unicode="f1c0"></i> 
                            <span class="menu-title">Project Management</span> 
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/review') || request()->is('admin/review/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.review.index') }}">
                            <i class="menu-icon fa fa-briefcase" data-unicode="f0b1"></i>  
                            <span class="menu-title">Testimonial (Review) Management</span> 
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/contact') || request()->is('admin/contact/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.contact.index') }}">
                            <i class="menu-icon fa fa-briefcase" data-unicode="f0b1"></i>  
                            <span class="menu-title">Contact us Management</span> 
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/finance') || request()->is('admin/finance/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.finance.index') }}">
                            <i class="menu-icon fa fa-briefcase" data-unicode="f0b1"></i>  
                            <span class="menu-title">Finance</span> 
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.settings.index') }}">
                            <i class="menu-icon fa fa-briefcase" data-unicode="f0b1"></i>  
                            <span class="menu-title">Settings</span> 
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/askquestion') || request()->is('admin/askquestion/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.askquestion.index') }}">
                            <i class="menu-icon fa fa-briefcase" data-unicode="f0b1"></i>  
                            <span class="menu-title">FAQ'S</span> 
                        </a>
                    </li>
                    <li class="nav-item clients-icon {{ request()->is('admin/banner') || request()->is('admin/banner/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.banner.index') }}">
                            <i class="menu-icon fa fa-picture-o font-size-20" data-unicode="f007"></i>
                            <span class="menu-title">Banners</span>
                        </a>
                    </li>
                    <li class="nav-item clients-icon {{ request()->is('admin/choose') || request()->is('admin/choose/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.choose.index') }}">
                            <i class="menu-icon fa fa-picture-o font-size-20" data-unicode="f007"></i>
                            <span class="menu-title">Why choose us</span>
                        </a>
                    </li>
                </ul>

            </div>
        </li>
        <li class="nav-item products-icon">
            <a class="nav-link" data-toggle="collapse" href="#secproducts" aria-expanded="false" aria-controls="secproducts">
                <i class="menu-icon fa fa-cubes font-size-14" data-unicode="f1b3"></i>
                <span class="menu-title">PP & TC</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse sub" id="secproducts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ request()->is('admin/privacy') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.privacy.index') }}"> 
                            <i class="menu-icon fa fa-database" data-unicode="f1c0"></i> 
                            <span class="menu-title">Privacy Policy </span> 
                        </a>
                    </li>
                    <li class="nav-item clients-icon {{ request()->is('admin/terms')? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.terms.create') }}">
                            <i class="menu-icon fa fa-picture-o font-size-20" data-unicode="f007"></i>
                            <span class="menu-title">Terms and Conditions</span>
                        </a>
                    </li>
                </ul>

            </div>
        </li>
    </ul>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
