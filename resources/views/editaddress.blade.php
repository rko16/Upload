@extends('app')
@section('content')
<section class="wrap user-dashboard bg-light">
    <div class="container mt-5 pt-4">
        <div class="page-header">
			<h2>Add/Edit Address </h2>
		</div>
        <div class="account_dashboard">
            <div class="row">
            	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                	<div class="form-box">
	                    <form action="{{ route('addresses') }}" method="POST" enctype="multipart/form-data">
	                    	@csrf
	                		<div class="login-white-box">
								<div class="row">
									<div class="col-12 col-sm-6 col-md-4">
										<div class="form-group">
											<label>Address *</label>
											<input type="text" class="form-ctrl form-control" autocomplete="off" placeholder="Enter " name="add1" value="{{auth()->user()->add1}}" />
										</div>
									</div>
       								<div class="col-12 col-sm-6 col-md-4">
               							<div class="form-group">
                    						<label>Country *</label>
											<select class="form-ctrl form-control" name="add2">
												<option>Select</option>
												<option value="1" selected>India</option>
											</select>
                       
                    					</div>
                   					</div>
                       				<div class="col-12 col-sm-6 col-md-4">
                   						<div class="form-group">
                    						<label>State/Union Territory *  </label>
                       						<select class="form-ctrl form-control" name="add3">
                       							<option value="">Select</option>
												@foreach($states as $state)
												<option value="{{ $state->id }}" {{ auth()->user()->add3 == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
												@endforeach
                       						</select>
                       
                            			</div>
                   					</div>
                       				<div class="col-12 col-sm-6 col-md-4">
                   						<div class="form-group">
                    						<label>District * </label>
                       						<select class="form-ctrl form-control" name="add4">
												<option value="">Select</option>
												@foreach($cities as $city)
												<option value="{{ $city->id }}" {{ auth()->user()->add4 == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
												@endforeach
												<!-- <option>India</option> -->
											</select>
                    					</div>
                   					</div>
                       				<div class="col-12 col-sm-6 col-md-4">
                   						<div class="form-group">
                    						<label>Sub District</label>
											<select class="form-ctrl form-control" name="add6">
												<option value="">Select</option>
												@foreach($areas as $area)
											   	<option value="{{ $area->id }}" {{ auth()->user()->add6 == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
												@endforeach
											</select>
                            			</div>
                   					</div>
                       				<div class="col-12 col-sm-6 col-md-4">
               							<div class="form-group">
                    						<label>City/ Town/ Village</label>
                       						<input type="text" class="form-ctrl form-control" autocomplete="off" placeholder="Enter " name="add5" value="{{ auth()->user()->add5 }}" />
                            			</div>
                   					</div>
                       				<div class="col-12 col-sm-6 col-md-4">
                   						<div class="form-group">
                    						<label>Pin Code *</label>
                       						<input type="number" class="form-ctrl form-control" placeholder="Enter" name="pincode" value="{{ auth()->user()->pincode }}"/>
                            			</div>
                   					</div>
                       				<div class="col-12 col-sm-6 col-md-4">
                   						<div class="form-group">
                    						<label>Address Type</label>
											<select class="form-ctrl form-control" name="addtype">
											   <option value="">Select</option>
											   <option value="1" {{ auth()->user()->addtype == 1 ? 'selected' : '' }}>Home</option>
											   <option value="2" {{ auth()->user()->addtype == 2 ? 'selected' : '' }}>Work</option>
											</select>
                    					</div>
                   					</div>
                   				</div>
								<div class="row justify-content-center mt-5">
									<div class="col-6 col-sm-3 col-md-3 col-lg-2">
										<a href="{{ route('myaddresses') }}" class="btn btn-outline-info btn-radius btn-submit btn-block">Back</a>
									</div>
									<div class="col-6 col-sm-3 col-md-3 col-lg-2">
								      	<button type="submit" class="btn btn-warning btn-radius btn-submit btn-block">Save</button>
									</div>
								</div>
               				</div>
                   		</form>
               		</div>
               	</div>
           	</div>
      	</div> 
	</div>
</section>
@endsection