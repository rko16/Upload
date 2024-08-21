@extends('app')
@section('content')
<section class="wrap user-dashboard bg-light">
    <div class="container mt-5 pt-4">
        <div class="page-header">
           	<h2>My Account</h2>
      	</div>
       	<div class="account_dashboard">
           	<div class="row">
           		<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
               		@include('sideheader')
               	</div>
           		<div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
               		<div class="form-box">
               			<div class="login-white-box">
                   			<div class="page-header border-0 text-center">
                   				<h3>My Social Accounts</h3>
                   			</div>
                   			<form action="{{route('social.account')}}" method="POST" enctype="multipart/form-data">
                   				@csrf
	                   			<div class="row">
	                       			<div class="col-12 col-sm-6 col-md-6">
	                   					<div class="form-group">
	                    					<label>Facebook</label>
	                   						<div class="input-group">
	                							<input type="url" name="facebook" value="{{auth()->user()->facebook !== ''? auth()->user()->facebook: ''}}" class="form-control form-ctrl" placeholder="Enter" aria-label="" aria-describedby="basic-addon2">
	                                			<button type="button" class="input-group-text text-warning">
	                                				<img src="images/pencil-icon.svg"/>
	                                			</button>
	                                		</div>
	                        			</div>
	                   				</div>
	                       			<div class="col-12 col-sm-6 col-md-6">
	                   					<div class="form-group">
	                    					<label>LinkedIn</label>
	                 						<div class="input-group">
	                    						<input type="url" name="linkedin" value="{{auth()->user()->linkedIn !== ''? auth()->user()->linkedIn: ''}}" class="form-control form-ctrl" placeholder="Enter" aria-label="" aria-describedby="basic-addon2">
	                                    		<button type="button" class="input-group-text text-warning">
	                                    			<img src="images/pencil-icon.svg"/>
	                                    		</button>
	                                    	</div>
	                            		</div>
	                   				</div>
	                       			<div class="col-12 col-sm-6 col-md-6">
	                   					<div class="form-group">
	                    					<label>Instagram</label>
	                       					<div class="input-group">
	                    						<input type="url" name="instagram" value="{{auth()->user()->instagram !== ''? auth()->user()->instagram: ''}}" class="form-control form-ctrl" placeholder="Enter" aria-label="" aria-describedby="basic-addon2">
	                                    		<button type="button" class="input-group-text text-warning">
	                                    			<img src="images/pencil-icon.svg"/>
	                                    		</button>
	                                    	</div>
	                            		</div>
	                   				</div>
	                       			<div class="col-12 col-sm-6 col-md-6">
	                   					<div class="form-group">
	                    					<label>Twitter</label>
	                 						<div class="input-group">
	                    						<input type="url" name="twitter" value="{{auth()->user()->twitter !== ''? auth()->user()->twitter: ''}}" class="form-control form-ctrl" placeholder="Enter" aria-label="" aria-describedby="basic-addon2">
	                                    		<button type="button" class="input-group-text text-warning">
	                                    			<img src="images/pencil-icon.svg"/>
	                                    		</button>
	                                    	</div>
	                            		</div>
	                   				</div>
	                       			<div class="col-12 col-sm-6 col-md-6">
	                   					<div class="form-group">
	                    					<label>Youtube</label>
	                 						<div class="input-group">
	                    						<input type="url" name="utube" value="{{auth()->user()->utube !== ''? auth()->user()->utube: ''}}" class="form-control form-ctrl" placeholder="Enter" aria-label="" aria-describedby="basic-addon2">
	                                    		<button type="button" class="input-group-text text-warning">
	                                    			<img src="images/pencil-icon.svg"/>
	                                    		</button>
	                                    	</div>
	                            		</div>
	                   				</div>
	                   			</div>
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
	                   			<div class="row justify-content-center mt-4">
	                       			<div class="col-12 col-sm-4 col-md-4 col-lg-3">
	                           			<button type="submit" class="btn btn-warning btn-radius btn-submit btn-block">Update
	                           			</button>
	                   				</div>
	                   			</div>
                   			</form>
               			</div>
               		</div>
               	</div>
           	</div>
      	</div> 
	</div>
</section>

@endsection