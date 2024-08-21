@extends('app')
@section('content')
<section class="wrap user-dashboard bg-light">
    <div class="container mt-5 pt-5">
        <div class="account_dashboard">
            <div class="page-header text-center">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-9 col-lg-12">
                        <h2>My Dashboard <span class="text-warning">
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
                    @if($orderdata)
                    <form action="{{ route('updateprofile', [$orderdata->id]) }}" enctype="multipart/form-data" method="POST">
                    	@csrf
                		<div class="login-white-box">
                   			<div class="page-header border-0 text-center">
                   				<h3>Profile Details</h3>
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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                   			<div class="row rowOdd">
                   				<div class="col-12 col-sm-6">
                   					<div class="form-group">
                    					<label for="name">Name</label>
                  						<input type="text" value="{{$orderdata->user_name}}" name="user_name" class="form-ctrl form-control" autocomplete="off" placeholder="Enter" required/>
                            		</div>
                   				</div>
                       			<div class="col-12 col-sm-12 col-md-6">
                   					<div class="form-group">
                    					<label>Project name</label>
                       					<input type="text" name="solar_name" value="{{$orderdata->solar_name}}" class="form-ctrl form-control" autocomplete="off" placeholder="Enter" required/>
                            		</div>
                   				</div>
                       			<div class="col-12 col-sm-12 col-md-6">
                       				<div class="form-group">
                                		<label for="email">Email address</label>
                                		<input type="text" value="{{$orderdata->email}}" name="email" class="form-ctrl form-control" autocomplete="off" placeholder="Enter">
                            		</div>
                       			</div>
                       			<div class="col-12 col-sm-12 col-md-6">
                  					<div class="form-group">
                                		<label for="number">Mobile Number</label>
                            			<div class="input-group">
                							<input type="text" value="{{$orderdata->monumber}}" name="monumber" class="form-control form-ctrl" placeholder="Enter" aria-label="" aria-describedby="basic-addon2">
                                			<!-- <button type="button" data-bs-toggle="modal" data-bs-target="#VerifyOTPModal" class="input-group-text text-warning">Verify OTP</button> -->
                                		</div>
                            		</div>
                   				</div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="add3">State</label>
                                        <select class="form-ctrl form-control" name="state_id">
                                            <option value="">Select</option>
                                                @foreach($states as $state)
                                                <option value="{{ $state->id }}" {{ $orderdata->state_id == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                       			<div class="col-12 col-sm-12 col-md-6">
                   					<div class="form-group">
                    					<label for="add4">City</label>
                       					<select class="form-ctrl form-control" name="city_id">
                       						<option value="">Select</option>
												@foreach($cities as $city)
												<option value="{{ $city->id }}" {{ $orderdata->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
												@endforeach
												<!-- <option>India</option> -->
                       					</select>
                            		</div>
                   				</div>
                       			<div class="col-12 col-sm-12 col-md-6">
                   					<div class="form-group">
                    					<label for="pincode">Pincode</label>
                  						<input type="number" value="{{ $orderdata->pincode }}" name="pincode" class="form-ctrl form-control" autocomplete="off" placeholder="Enter " min="100000" max="999999"/>
                            		</div>
                   				</div>
                       			<div class="col-12 col-sm-12 col-md-6">
                   					<div class="form-group">
                    					<label for="add1">Address</label>
                  						<input type="text"  value="{{$orderdata->address}}" name="address" class="form-ctrl form-control" autocomplete="off" placeholder="Enter "/>
                            		</div>
                   				</div>
                       			<div class="col-12 col-sm-12 col-md-6">
                   					<div class="form-group">
                    					<label for="project_type">Type of Installation required</label>
                       					<select class="form-ctrl form-control" name="installation_type">
                       						<option value="">Select</option>
                       						<option value="1" {{ $orderdata->installation_type == '1' ? 'selected' : '' }}>Home</option>
					                       	<option value="2" {{ $orderdata->installation_type == '2' ? 'selected' : '' }}>Office</option>
					                       	<option value="3" {{ $orderdata->installation_type == '3' ? 'selected' : '' }}>Housing Society</option>
					                       	<option value="4" {{ $orderdata->installation_type == '4' ? 'selected' : '' }}>Industry</option>
                       					</select>
                        			</div>
                   				</div>
                       			<div class="col-12 col-sm-12 col-md-6">
                   					<div class="form-group">
                    					<label for="roof_type">Type of Rooftop</label>
                   						<select class="form-ctrl form-control" name="rooftop_type">
                   							<option value="">Select</option>
                   							<option value="1" {{$orderdata->rooftop_type == '1'? 'selected' : ''}}>RCC</option>
                   							<option value="2" {{$orderdata->rooftop_type == '2'? 'selected' : ''}}>Metal Sheet</option>
                   							<option value="3" {{$orderdata->rooftop_type == '3'? 'selected' : ''}}>Others</option>
                   						</select>
                            		</div>
                   				</div>
                       
                       			<div class="col-12 col-sm-12 col-md-6">
                   					<div class="form-group">
                    					<label for="monthlyBill">Average Monthly Electricity &shy; &shy; &shy; &shy;    Consumption</label>
                  						<input type="text" name="monthly_bill" value="{{$orderdata->monthly_bill}}" class="form-ctrl form-control" autocomplete="off" placeholder="Enter "/>
                            		</div>
                   				</div>
                       			<!-- <div class="col-12 col-sm-12 col-md-6">
                   					<div class="form-group">
                    					<label for="electic_bill">Upload Electricity Bill</label>
              							<div class="file-form-control mb-1">
                      						<div class="upload-doc-item">
                          						<div class="image-upload">
                                                    <input type="file" name="monthly_bill_img" id="monthly_bill_img" onchange="fileValue(this)">
                                                    <label for="monthly_bill_img" class="upload-field" id="file-label">
                                                        <div class="file-thumbnail">
                                                            <h6 id="filename">{{ $orderdata->monthly_bill_img ? 'File Uploaded' : 'No File' }}</h6>
                                                            <div class="Upload-btn btn btn-warning">{{ $orderdata->monthly_bill_img ? 'File Uploaded' : 'No File' }}</div>
                                                        </div>
                                                    </label>
                                                </div>
											</div>
                       					</div>
                   						<p class="small">Max Allowed File Size 5 MB Formats: PDF,PNG,JPEG,JPG </p>
                        			</div>
                   				</div> -->
                                <div class="col-12 col-sm-12 col-md-6">
    <div class="form-group">
        <label for="electric_bill">Upload Electricity Bill</label>
        <div class="file-form-control mb-1">
            <div class="upload-doc-item">
                <div class="image-upload">
                    <input type="file" name="monthly_bill_img" id="monthly_bill_img" onchange="fileValue(this, 'monthly_bill_filename', 'monthly_bill_upload_btn')">
                    <label for="monthly_bill_img" class="upload-field" id="file-label">
                        <div class="file-thumbnail">
                            <h6 id="monthly_bill_filename">{{ $orderdata->monthly_bill_img ? 'File Uploaded' : 'Please upload the file' }}</h6>
                            <div class="Upload-btn btn btn-warning">{{ $orderdata->monthly_bill_img ? 'File Uploaded' : 'Upload File' }}</div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <p class="small">Max Allowed File Size 5 MB Formats: PDF,PNG,JPEG,JPG</p>
    </div>
</div>

                            </div>




               				<!-- <div class="form-group">
                                <label>Photo of Rooftop and upload option to upload photos</label>
                                <div class="file-form-control mb-1">
                                    <div class="upload-doc-item">
                                        <div class="image-upload">
                                            <input type="file" name="rooftop_img" onchange="fileValue(this)" id="rooftop_img">
                                            <label class="upload-field" for="rooftop_img">
                                                <div class="file-thumbnail">
                                                    <h6 id="filename">{{ $orderdata->rooftop_img ? 'File Uploaded' : 'No File' }}</h6>
                                                    <div class="Upload-btn btn btn-warning">{{ $orderdata->rooftop_img ? 'File Uploaded' : 'No File' }}</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <p class="small">Max Allowed File Size 5 MB Formats: PDF, PNG, JPEG, JPG</p>
                            </div> -->

                            <div class="form-group">
    <label>Photo of Rooftop and upload option to upload photos</label>
    <div class="file-form-control mb-1">
        <div class="upload-doc-item">
            <div class="image-upload">
                <input type="file" name="rooftop_img" id="rooftop_img" onchange="fileValue(this, 'rooftop_filename', 'rooftop_upload_btn')">
                <label for="rooftop_img" class="upload-field">
                    <div class="file-thumbnail">
                        <h6 id="rooftop_filename">{{ $orderdata->rooftop_img ? 'File Uploaded' : 'Please upload the file' }}</h6>
                        <div class="Upload-btn btn btn-warning">{{ $orderdata->rooftop_img ? 'File Uploaded' : 'Upload File' }}</div>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <p class="small">Max Allowed File Size 5 MB Formats: PDF, PNG, JPEG, JPG</p>
</div>
                            <div class="form-group">
                                <label>Do you need a battery backup</label>
                                <div class="form-group mb-1">
                                    <select class="form-ctrl form-control">
                                        <option>Select</option>
                                        <option selected>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                                <p class="small text-danger">You are not eligible for Central and State Government Subsidy</p>
                            </div>
                   
                            <div class="row">
                                <div class="col-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Battery backup </label>
                                        <select class="form-ctrl form-control">
                                            <option>Select</option>
                                            <option>2 hours</option>
                                            <option>4 hours</option>
                                            <option>8 hours</option>
                                            <option>12 hours</option>
                                            <option selected>24 hours</option>
                                            <option>248 hours</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6">
                                    <div class="form-group">
                                        <label>No of the appliance </label>
                                        <input type="text" class="form-ctrl form-control" autocomplete="off" placeholder="Enter "/>
                                    </div>
                                </div>
                            </div>
           					<div class="form-group">
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Share live Location</label>
                                        <input type="text" name="location" class="form-ctrl form-control" autocomplete="off" placeholder="Enter"/>
                                    </div>
                                    <p class="small text-danger">Go to google map and put Embed map link here to share your live location</p>
                                </div>
                                @if(isset($orderdata->location))
                   				<div class="map-sec">
                                    {!! $orderdata->location !!}
                                    <!-- {{ $orderdata->location }}                   					 -->
                   				</div>
                                @endif
               				</div>
               				<div class="row justify-content-center mt-4">
                   				<div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                       				<button type="submit" class="btn btn-warning btn-radius btn-submit btn-block">Save & Submit</button>
               					</div>
               				</div>
           				</div>
               		</form>
                    @endif
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
                            <p>Enter the verification code sent on your register mobile number</p>
                        </div>
                        <form action="profile-details.php">
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
<script>
    function fileValue(input, filenameId, uploadBtnId) {
        var file = input.files[0];
        if (file) {
            document.getElementById(filenameId).innerText = file.name;
            document.getElementById(uploadBtnId).innerText = 'File Uploaded';
        } else {
            document.getElementById(filenameId).innerText = 'No File';
            document.getElementById(uploadBtnId).innerText = 'No File';
        }
    }
</script>
@endsection