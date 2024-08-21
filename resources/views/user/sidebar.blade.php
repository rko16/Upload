@if($orderdata)
<div class="dashbordlinks">
   <!--<h4 class="d-flex justify-content-between align-items-center">Dashboard Menu <span id="account-btn"><i class="fa fa-navicon"></i></span></h4>-->
    <ul class="list-unstyled account-menu">
        <li class="menufixcolor">
            <a href="{{route('dashboard')}}">
                Dashboard
            </a>
        </li>

        <li class="{{ request()->is('userprofile/*') ? 'active' : '' }}">
            <a href="{{route('userprofile', [$orderdata->id])}}">
                <span class="me-1">1</span>
                Profile Details
            </a>
        </li>

        <li class="{{ request()->is('survey-design') || request()->is('getorderdesign/*') || request()->is('survey-design/*') ? 'active' : '' }}">
            <a href="{{route('survey-design', [$orderdata->id])}}">
                <span class="me-1">2</span>
                Survey &amp; Design
            </a>
        </li>

        <li class="{{ request()->is('proposal/*') ? 'active' : '' }}">
            <a href="{{route('proposal', [$orderdata->id])}}">
                <span class="me-1">3</span>
                Proposal &amp; Order Status
            </a>
        </li>

        <li class="{{ request()->is('procurement/*') ? 'active' : '' }}">
            <a href="{{route('procurement', [$orderdata->id])}}">
                <span class="me-1">4</span>
                Procurement &amp; Execution
            </a>
        </li>

        <li class="{{ request()->is('governmentapproval/*') ? 'active' : '' }}">
            <a href="{{route('governmentapproval', [$orderdata->id])}}">
                <span class="me-1">5</span>
                Government Approvals
            </a>
        </li>

        <li>
            <a href="#">
                <span class="me-1">6</span>
                Tracking & Monitoring
            </a>
        </li>
    </ul>
</div>
@endif