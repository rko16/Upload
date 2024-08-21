@extends('app')
@section('content')
<section class="wrap user-dashboard bg-light">
    <div class="container mt-5 pt-5">
        <div class="account_dashboard">
            <div class="page-header text-center">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-10">
                        <h2>My Dashboard <span class="text-warning">@if($orderdata){{$orderdata->solar_name}}@endif</span></h2>
                    	<div class="page-header-btns">
            				@include('user.sec-header')
            				<a class="btn btn-sm btn-info ms-1" data-bs-toggle="modal" href="#AddProjectModal">Add A New Project</a>
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
           			@if($orderdata)
	                <div class="row">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
      	  	            <div class="col-6 col-sm-6 col-md-6 col-lg-3 text-center">
                     	    <div class="dashboard-card">
                   <p class="text-info mb-1 large">Project ID</p>
                       <h4 class="text-info mb-0">{{$orderdata->id}}</h4>
                   </div>
                   </div>
                   <div class="col-6 col-sm-6 col-md-6 col-lg-3 text-center">
                   <div class="dashboard-card">
                   <p class="text-info mb-1 large">Project Capacity</p>
                   @if(isset($orderdata->capacity))
                       <h4 class="text-info mb-0">{{$orderdata->capacity}} KW</h4>
                   @else
                        <h4 class="text-info mb-0">Not mentioned</h4>
                   @endif
                   </div>
                   </div>
                   <div class="col-6 col-sm-6 col-md-6 col-lg-3 text-center">
                   <div class="dashboard-card">
                   <p class="text-info mb-1 large">Project Current Status</p>
                      <h4 class="text-info mb-0">
                      	@if($orderdata->is_ordered== '1')
                            Ordered
                        @endif
                        @if($orderdata->is_ordered== '1' && $orderdata->is_visited== '1')
                            Visited
                        @endif
                        @if($orderdata->is_ordered== '1' && $orderdata->is_visited== '1'  && $orderdata->is_quotation== '1')
                            Quotation get
                        @endif
                        @if($orderdata->is_ordered== '1' && $orderdata->is_visited== '1'  && $orderdata->is_quotation== '1' && $orderdata->is_complete== '1')
                            Completed
                        @endif
                        @if($orderdata->is_ordered== '1' && $orderdata->is_visited== '1'  && $orderdata->is_quotation== '1' && $orderdata->is_complete== '0')
                            Cancel
                        @endif
                      	</h4>
                   </div>
                   </div>
                   <div class="col-6 col-sm-6 col-md-6 col-lg-3 text-center">
                   <div class="dashboard-card">
                   <p class="text-info mb-1 large">Payment Status</p>
                        <h4 class="text-info mb-0">
                            <!-- Shipped -->
                            @if($orderdata->paymentstatus1 == '1' && $orderdata->paymentstatus2 == '0' && $orderdata->paymentstatus3 == '0' && $orderdata->paymentstatus4 == '0')
                                Pay first payment
                            @endif
                            @if($orderdata->paymentstatus1 == '1' && $orderdata->paymentstatus2 == '1' && $orderdata->paymentstatus3 == '0' && $orderdata->paymentstatus4 == '0')
                                Pay second payment
                            @endif
                            @if($orderdata->paymentstatus1 == '1' && $orderdata->paymentstatus2 == '1' && $orderdata->paymentstatus3 == '1' && $orderdata->paymentstatus4 == '0')
                                Pay third payment
                            @endif
                            @if($orderdata->paymentstatus1 == '1' && $orderdata->paymentstatus2 == '1' && $orderdata->paymentstatus3 == '1' && $orderdata->paymentstatus4 == '1')
                                Pay fourth payment
                            @endif
                            @if($orderdata->paymentstatus1 == '0' && $orderdata->paymentstatus2 == '0' && $orderdata->paymentstatus3 == '0' && $orderdata->paymentstatus4 == '0')
                                Not payment yet
                            @endif
                        </h4>
                   </div>
                   </div>
                   <div class="col-6 col-sm-6 col-md-6 col-lg-3 text-center">
                   <div class="dashboard-card">
                   <p class="text-info mb-1 large">Electricity Generated</p>
                       <h4 class="text-info mb-0">
                        @if(isset($orderdata->generation))
                           <h4 class="text-info mb-0">{{$orderdata->generation}}</h4>
                        @else
                            <h4 class="text-info mb-0">Not mentioned</h4>
                       @endif
                        </h4>
                   </div>
                   </div>
                   <div class="col-6 col-sm-6 col-md-6 col-lg-3 text-center">
                   <div class="dashboard-card">
                   <p class="text-info mb-1 large">Financial Savings</p>
                        <h4 class="text-info mb-0">
                            @if(isset($orderdata->annualSavings))
                            <h4 class="text-info mb-0">{{$orderdata->annualSavings}}</h4>
                            @else
                            <h4 class="text-info mb-0">Not mentioned</h4>
                            @endif
                        </h4>
                   </div>
                   </div>
               </div>
               @else
			        <p>Select a project to see details.</p>
			    @endif
               </div>
               
           </div>
      
      </div> 
		</div>
    </section>
    <!-- model -->
    <div class="modal fade" id="AddProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-smm modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header justify-content-center border-0 text-center">
<h4 class="modal-title w-100">Add A New Project</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body form-box">
            <form method="POST" action="{{route('newcreateproject')}}">
                @csrf
                <div class="login-white-box shadow-none">
                    <div class="form-group">
                        <label>Project Name</label>
                        <input type="text" name="solar_name" class="form-ctrl form-control" placeholder="Enter Name" required/>
                    </div>
                    <div class="form-group">
                        <label>Remark</label>
                       <textarea rows="4" class="form-ctrl form-control" name="solarnameRemark" placeholder="Enter" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning btn-lg btn-submit btn-block">Save</button>
                </div>
            </form>
        </div>
          </div>
          </div>
          </div>
@endsection