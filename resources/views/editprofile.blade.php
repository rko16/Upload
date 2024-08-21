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
       	<div class="account_dashboard">
            <div class="row">
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
               @include('sideheader')
            </div>
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="form-box">
                	<div class="login-white-box">
                    <div class="page-header border-0 text-center">
                    	<h3>Edit Profile</h3>
                    </div>
                    	<form action="{{ route('updateprofile') }}" enctype="multipart/form-data" method="POST">
                    		@csrf
		                   	<div class="row">
								<div class="col-12 col-sm-6 col-md-6">
		                    		<div class="form-group">
		                    			<label>Full Name</label>
		                				<input type="text" class="form-ctrl form-control" autocomplete="off" placeholder="Enter" value="{{ auth()->user()->name }}" name="name" />
		                            </div>
		                    	</div>
		                        <div class="col-12 col-sm-6 col-md-6">
		                    		<div class="form-group">
		                    			<label>Email ID</label>
		                       			<div class="input-group">
						                    <input type="text" class="form-control form-ctrl" placeholder="Enter" aria-label="" aria-describedby="basic-addon2" value="{{ auth()->user()->email }}" name="email">
		                                    <button type="button" data-bs-toggle="modal" data-bs-target="#VerifyOTPModal" class="input-group-text text-warning">Verify</button>
		                                </div>
		                            </div>
		                    	</div>
		                       	<div class="col-12 col-sm-6 col-md-6">
		                    		<div class="form-group">
		                    			<label>Mobile Number</label>
		                 				<div class="input-group">
		                    				<input type="text" class="form-control form-ctrl" placeholder="Enter" aria-label="" aria-describedby="basic-addon2" value="{{ auth()->user()->number }}" name="number">
		                                    <button type="button" data-bs-toggle="modal" data-bs-target="#VerifyOTPModal" class="input-group-text text-warning">Verify</button>
		                                </div>
		                        	</div>
		               			</div>
		                       	<div class="col-12 col-sm-6 col-md-6">
			                   		<div class="form-group">
			                    		<label>Gender</label>
										<select class="form-ctrl form-control" name="gender">
										    <option value="">Select</option>
										    <option value="1" {{ auth()->user()->gender == '1' ? 'selected' : '' }}>Male</option>
										    <option value="0" {{ auth()->user()->gender == '0' ? 'selected' : '' }}>Female</option>
										</select>
		                            </div>
			                    </div>
		                    </div>
							<div class="row justify-content-center">
							   <div class="col-6 col-sm-3 col-md-3 col-lg-3 col-xl-2">
							       <a href="{{ route('profile') }}" class="btn btn-outline-info btn-radius btn-submit btn-block">Back</a>
							   </div>
							   <div class="col-6 col-sm-3 col-md-3 col-lg-3 col-xl-2">
							       <button type="submit" class="btn btn-warning btn-radius btn-submit btn-block">Save</button>
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


<!-- Modal -->
<div class="modal fade" id="VerifyOTPModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!--<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verification Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>-->
      <div class="modal-body form-box otp-box p-0">
                   <div class="login-white-box shadow-none">
                        <div class="title">
                            <h3>Verification Code</h3>
                            <p>Enter the verification code sent on your register mobile number/E-mail</p>
                        </div>
                        <form action="edit-profile.php">
                            <div class="form-group">
                            <input type="number" class="form-ctrl form-control" onkeypress="if(this.value.length==1) return false; return event.keyCode === 8 || event.charCode >= 48 &amp;&amp; event.charCode <= 57;" placeholder="0">

                            <input type="number" class="form-ctrl form-control" onkeypress="if(this.value.length==1) return false; return event.keyCode === 8 || event.charCode >= 48 &amp;&amp; event.charCode <= 57;" placeholder="0">

                            <input type="number" class="form-ctrl form-control" onkeypress="if(this.value.length==1) return false; return event.keyCode === 8 || event.charCode >= 48 &amp;&amp; event.charCode <= 57;" placeholder="0">
                            <input type="number" class="form-ctrl form-control" onkeypress="if(this.value.length==1) return false; return event.keyCode === 8 || event.charCode >= 48 &amp;&amp; event.charCode <= 57;" placeholder="0">
                            <input type="number" class="form-ctrl form-control" onkeypress="if(this.value.length==1) return false; return event.keyCode === 8 || event.charCode >= 48 &amp;&amp; event.charCode <= 57;" placeholder="0">
                            <input type="number" class="form-ctrl form-control" onkeypress="if(this.value.length==1) return false; return event.keyCode === 8 || event.charCode >= 48 &amp;&amp; event.charCode <= 57;" placeholder="0">
                            </div>
                            <div class="form-group flex-wrap resend-otp text-center">
            <p class="w-100 mb-1">The new OTP send within <span id="timer"> </span> seconds </p>
            <p class="w-100"><a class="text-decoration-none" href="#">Resend OTP</a> </p>
            </div>
                             
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning  btn-lg btn-submit btn-block">Verify</button>
                            </div>
                        </form>
            </div>
      </div>
      
    </div>
  </div>
</div>

@endsection