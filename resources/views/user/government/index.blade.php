@extends('app')
@section('content')
<section class="wrap user-dashboard bg-light">
    <div class="container mt-5 pt-5">
       <div class="account_dashboard">
           <div class="page-header text-center">
            <div class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-12">
                 <h2>My Dashboard - <span class="text-warning">
                 	@if($orderdata){{$orderdata->solar_name}}@endif
                 	</span></h2>
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
               <div class="form-box">
               <div class="login-white-box">
                   <div class="page-header border-0 text-center">
                   <h3>Government Approvals Section</h3>
                   </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <p class="mb-0 fw-bold">Feasibility Approval:</p>
                                @if($orderdata->feasibility_gov == '0')
                                <p>Waiting Approval </p>
                                @else
                                <p>Approved</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <p class="mb-0 fw-bold">Net Metering:</p>
                                @if($orderdata->net_metering_gov == '0')
                                <p>Waiting Approval </p>
                                @else
                                <p>Approved</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <p class="mb-0 fw-bold">MRT:</p>
                                @if($orderdata->mrt_gov == '0')
                                <p>Waiting Approval </p>
                                @else
                                <p>Approved</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <p class="mb-0 fw-bold">CEIG:</p>
                                @if($orderdata->ceig_gov == '0')
                                <p>Waiting Approval </p>
                                @else
                                <p>Approved</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                            <button type="submit" class="btn btn-warning btn-radius btn-submit btn-block">Next</button>
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