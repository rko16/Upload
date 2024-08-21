@extends('app')
@section('content')
<section class="wrap user-dashboard bg-light">
	<div class="container mt-5 pt-4">
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
		<div class="page-header">
			<h2>My Account</h2>
		</div>
   		<div class="account_dashboard profile_dashboard">
       		<div class="row">
       			<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
           			@include('sideheader')
           		</div>
       			<div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
           			<div class="login-white-box">
               			<div class="page-header border-0 text-center">
               				<h3>My Addresses</h3>
               			</div>
                		<div class="row">
               				<div class="col-12 col-sm-12 col-md-6">
               					<div class="address-card">
              						<div class="address-header">
                   						<div class="row">
                   							<div class="col-7 col-sm-8 col-md-8 pe-0">
							                   	@if(auth()->user()->addtype == '1')
							                       <h4 class="text-warning">Home</h4>
							                    @elseif(auth()->user()->addtype == '2')
							                    	<h4 class="text-warning">Work</h4>
							                    @else(auth()->user()->addtype == '0')
							                    	<h4 class="text-warning">Unknown address type</h4>
							                    @endif
                       						</div>
                   							<div class="col-5 col-sm-4 col-md-4 text-end ps-0">
                       							<a class="btn btn-link p-0 me-1" href="{{ route('editaddress') }}"><img src="images/pencil-icon.svg"/></a>
                       							<a href="{{ route('deleteadd') }}" class="btn btn-link p-0"><img src="images/delete-icon.svg"/></a>
                       						</div>
                   						</div>
                   					</div>
									<p>
										@if(auth()->user()->add1 != '')
											{{ auth()->user()->add1 }}
										@endif
										@if(auth()->user()->add5 != '')
											, {{ auth()->user()->add5 }}
										@endif
										@if(auth()->user()->add6 != '')
											, {{ $area->name }}
										@endif
										@if(auth()->user()->add4 != '')
											, {{ $city->name }},
										@endif
										@if(auth()->user()->add3 != '')
											, {{ $state->name }}
										@endif
										@if(auth()->user()->add2 != '')
											@if(auth()->user()->add2 == '1')
												, India
											@else
												-----
											@endif
										@endif
										@if(auth()->user()->pincode != '')
											, {{ auth()->user()->pincode }}
										@endif
									</p>
                   				</div>
               				</div>
                   			<!-- <div class="col-12 col-sm-12 col-md-6">
               					<div class="address-card">
               						<div class="address-header">
                   						<div class="row">
                   							<div class="col-7 col-sm-8 col-md-8 pe-0">
                       							<h4 class="text-warning">Work</h4>
                      						</div>
                   							<div class="col-5 col-sm-4 col-md-4 text-end ps-0">
                       							<a class="btn btn-link p-0 me-1" href="add-and-edit-address.php"><img src="images/pencil-icon.svg"/></a>
                       							<button type="button" class="btn btn-link p-0"><img src="images/delete-icon.svg"/></button>
                       						</div>
                   						</div>
                   					</div>
                   					<p>Sr no 48/4, Lane no - 9, Ganeshnagar vadgoansheri Pune, Maharashtra, India - 411014 </p>
                   				</div>
               				</div> -->
                   		<!-- <div class="col-12 col-sm-12 col-md-6">
               				<div class="address-card">
               					<div class="address-header">
                   					<div class="row">
                   						<div class="col-7 col-sm-8 col-md-8 pe-0">
                       						<h4 class="text-warning">Home</h4>
                      					</div>
                   						<div class="col-5 col-sm-4 col-md-4 text-end ps-0">
                       						<a class="btn btn-link p-0 me-1" href="add-and-edit-address.php"><img src="images/pencil-icon.svg"/></a>
                       						<button type="button" class="btn btn-link p-0"><img src="images/delete-icon.svg"/></button>
                      					</div>
                   					</div>
                   				</div>
                   				<p>Sr no 48/4, Lane no - 9, Ganeshnagar vadgoansheri Pune, Maharashtra, India - 411014 </p>
                   			</div>
               			</div> -->
                   		<!-- <div class="col-12 col-sm-12 col-md-6">
               				<div class="address-card">
               					<div class="address-header">
                   					<div class="row">
                   						<div class="col-7 col-sm-8 col-md-8 pe-0">
                       						<h4 class="text-warning">Work</h4>
                       					</div>
                   						<div class="col-5 col-sm-4 col-md-4 text-end ps-0">
                       						<a class="btn btn-link p-0 me-1" href="add-and-edit-address.php"><img src="images/pencil-icon.svg"/></a>
                   							<button type="button" class="btn btn-link p-0"><img src="images/delete-icon.svg"/></button>
                       					</div>
                  					</div>
                   				</div>
                   				<p>Sr no 48/4, Lane no - 9, Ganeshnagar vadgoansheri Pune, Maharashtra, India - 411014 </p>
                   			</div>
               			</div> -->
               		</div>
           		</div>
           	</div>
       	</div>
  	</div> 
	</div>
</section>

@endsection