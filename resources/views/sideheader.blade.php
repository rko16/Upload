<div class="dashbordlinks">
    <ul class="list-unstyled account-menu">
        <li class="{{ request()->is('profile') || request()->is('editprofile') ? 'active' : '' }}">
            <a href="{{ route('profile') }}">My Profile</a>
        </li>
        <li class="{{ request()->is('myorders') ? 'active' : '' }}">
            <a href="{{ route('myorders') }}">My Orders</a>
        </li>
        <li class="{{ request()->is('myaddresses') ? 'active' : '' }}">
            <a href="{{ route('myaddresses') }}">My Addresses</a>
        </li>
        <li class="{{ request()->is('mysocialaccounts') ? 'active' : '' }}">
            <a href="{{route('mysocialaccounts')}}">My Social Accounts</a>
        </li>
        <li class="{{ request()->is('myenquiries') ? 'active' : '' }}">
            <a href="{{route('myenquiries')}}">My Enquiries</a>
        </li>
        <li>
            <a href="{{ route('logout') }}">Logout</a>
        </li>
    </ul>
</div>