@extends('app')
@section('content')
<section class="wrap user-dashboard bg-light">
    <div class="container mt-5 pt-5">
       <div class="account_dashboard">
           <div class="page-header text-center">
            <div class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-12">
                 <h2>My Dashboard <span class="text-warning">@if($orderdata){{$orderdata->solar_name}}@endif</span></h2>
                <div class="page-header-btns">
                @include('user.sec-header')
                </div>
                </div>
            
            </div>
          </div>
           <div class="row">
           <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
               <div class="form-box">
               @include('user.project')
               </div>
               </div>
               </div>
           <div class="row">
           <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
               @include('user.sidebar')
               </div>
           <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
               <div class="login-white-box">
                   <div class="page-header border-0 text-center">
                    <h3>Operation and Maintenance</h3>
                    @if(isset($orderdata->maintenancestartdate) && isset($orderdata->mainclosedate))
                        <h3 class="text-info">
                            Maintenance Support<br/>
                            Start on {{ optional($orderdata->maintenancestartdate)->format('d M Y') }} to 
                            End at {{ optional($orderdata->mainclosedate)->format('d M Y') }}
                        </h3>
                    @endif
                </div>
                   <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <div class="single-pricing-box">
                    <div class="pricing-header">
                   <h3>$50<sub>/month</sub></h3>
                    </div>
                    <h4 class="mb-1">Base</h4>
                <p>For most businesses that want to otpimize web queries</p>
                   
                    <div class="pricing-features">
                        <ul class="list-unstyled">
                        <li><img src="{{asset('asset2/images/check-tick-o.svg')}}"> All limited links</li>
                        <li><img src="{{asset('asset2/images/check-tick-o.svg')}}"> Own analytics platform</li>
                        <li><img src="{{asset('asset2/images/check-tick-o.svg')}}"> Chat support</li>
                        <li><img src="{{asset('asset2/images/check-tick-o.svg')}}"> Optimize hashtags</li>
                        <li><img src="{{asset('asset2/images/check-tick-o.svg')}}"> Unlimited users</li>
                        </ul>
                </div>
                     <a href="#" class="btn btn-lg btn-block btn-light-info">Choose plan</a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <div class="single-pricing-box active">
                    <div class="most-plan d-flex text-center justify-content-end">
                    <h6 class="mb-0 d-inline-block">MOST POPULAR</h6>
                    </div>
                    <div class="pricing-header">
                   <h3>$100<sub>/month</sub></h3>
                    </div>
                    <h4 class="mb-1">Pro</h4>
                <p>For most businesses that want to otpimize web queries</p>
                   
                    <div class="pricing-features">
                        <ul class="list-unstyled">
                        <li><img src="{{asset('asset2/images/check-tick-white.svg')}}"> All limited links</li>
                        <li><img src="{{asset('asset2/images/check-tick-white.svg')}}"> Own analytics platform</li>
                        <li><img src="{{asset('asset2/images/check-tick-white.svg')}}"> Chat support</li>
                        <li><img src="{{asset('asset2/images/check-tick-white.svg')}}"> Optimize hashtags</li>
                        <li><img src="{{asset('asset2/images/check-tick-white.svg')}}"> Unlimited users</li>
                        </ul>
                </div>
                     <a href="#" class="btn btn-lg btn-block btn-info">Choose plan</a>
                </div>
            </div>
                       <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <div class="single-pricing-box">
                    <div class="pricing-header">
                   <h3>$200<sub>/month</sub></h3>
                    </div>
                    <h4 class="mb-1">Enterprise</h4>
                <p>For most businesses that want to otpimize web queries</p>
                   
                    <div class="pricing-features">
                        <ul class="list-unstyled">
                        <li><img src="{{asset('asset2/images/check-tick-o.svg')}}"> All limited links</li>
                        <li><img src="{{asset('asset2/images/check-tick-o.svg')}}"> Own analytics platform</li>
                        <li><img src="{{asset('asset2/images/check-tick-o.svg')}}"> Chat support</li>
                        <li><img src="{{asset('asset2/images/check-tick-o.svg')}}"> Optimize hashtags</li>
                        <li><img src="{{asset('asset2/images/check-tick-o.svg')}}"> Unlimited users</li>
                        </ul>
                </div>
                     <a href="#" class="btn btn-lg btn-block btn-light-info">Choose plan</a>
                </div>
            </div>
        </div>
                   
               </div>
               </div>
           </div>
      
      </div> 
		</div>
    </section>
@endsection