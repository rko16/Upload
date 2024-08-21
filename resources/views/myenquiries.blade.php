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
               <div class="login-white-box">
               	<div class="page-header border-0 text-center">
                   <h3>My Enquiries</h3>
                   </div>
               	@if ($errors->any())
				  <div class="alert alert-danger">
				      <ul>
				          @foreach ($errors->all() as $error)
				              <li>{{ $error }}</li>
				          @endforeach
				      </ul>
				  </div>
				@endif
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
                   
                    <div class="row">
                        @foreach($enquiries as $enquiry)
    						<div class="col-12 col-sm-12 col-md-6">
    							<div class="address-card">
    								<div class="address-header">
    									<h4 class="text-warning">{{ $enquiry->date }}</h4>
    								</div>
    								<p>{{$enquiry->message}}</p>
    							</div>
    						</div>
                        @endforeach
                   </div>
                   <div class="row justify-content-center mt-4">
                       <div class="col-12 col-sm-4 col-md-4 col-lg-3">
                           <a href="#AddNewEnquiryModal" data-bs-toggle="modal" class="btn btn-warning btn-radius btn-submit btn-block">Add New</a>
                   </div>
                   </div>
               </div>
               </div>
           </div>
      
      </div> 
		</div>
    </section>

<!-- Work Samples Modal -->
<div class="modal fade" id="AddNewEnquiryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <h4 class="modal-title" id="exampleModalLabel">Add New Enquiry</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body account_dashboard pt-0">
        <div class="form-box">
          	<form action="{{route('userenquiries')}}" method="POST" enctype="multipart/form-data">
          		@csrf
              	<div class="title">
              		<p>Enter the Message Below</p>
              	</div>
            
              	<div class="form-group">
                  	<textarea rows="6" class="form-ctrl form-control" autocomplete="off" placeholder="Description" name="message" required></textarea>
                </div>
                 
                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-warning btn-lg btn-submit btn-block">
              			Submit
                    </button>
                </div>

            </form>
                      
      	</div>
      </div>
    </div>
  </div>
</div>
@endsection