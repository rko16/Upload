@extends('app')
@section('content')
	<section class="login-wrap">
    	<div class="container">
        	<div class="form-box">
            	<div class="row pt-5">
                	<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 welcome-login flex-last">
                		<div class="title">
                    		<h2>Our Solar Story 
                    			<span class="text-warning">Powering</span> a Sustainable Future <span class="text-warning">Solution</span>
                    		</h2>
                    	</div>
                		<div class="login-testimonial">
        					<div class="owl-carousel owl-carousel-single">
        						@foreach($reviews as $review)
            					<div class="item">
            						<div class="client_message">
                						<p class="rating">
                							@if($review->rating == '1')
				                                <i class="fa fa-star me-1"></i>
				                                <i class="fa fa-star-o"></i>
				                                <i class="fa fa-star-o"></i>
				                                <i class="fa fa-star-o"></i>
				                                <i class="fa fa-star-o"></i>
				                                @elseif($review->rating == '2')
				                                <i class="fa fa-star me-1"></i>
				                                <i class="fa fa-star me-1"></i>
				                                <i class="fa fa-star-o"></i>
				                                <i class="fa fa-star-o"></i>
				                                <i class="fa fa-star-o"></i>
				                                @elseif($review->rating == '3')
				                                <i class="fa fa-star me-1"></i>
				                                <i class="fa fa-star me-1"></i>
				                                <i class="fa fa-star me-1"></i>
				                                <i class="fa fa-star-o"></i>
				                                <i class="fa fa-star-o"></i>
				                                @elseif($review->rating == '4')
				                                <i class="fa fa-star me-1"></i>
				                                <i class="fa fa-star me-1"></i>
				                                <i class="fa fa-star me-1"></i>
				                                <i class="fa fa-star me-1"></i>
				                                <i class="fa fa-star-o"></i>
				                                @elseif($review->rating == '5')
				                                <i class="fa fa-star me-1"></i>
				                                <i class="fa fa-star me-1"></i>
				                                <i class="fa fa-star me-1"></i>
				                                <i class="fa fa-star me-1"></i>
				                                <i class="fa fa-star me-1"></i>
				                            @endif
                						</p>
                						<p>
                							"{{$review->discription}}"
                						</p>
                						<div class="client_info media">
                    						<div class="media-left pe-0">
                    							<div class="testimonial_icon">
                									<img src="{{$review->image}}"/>
                								</div>
                							</div>
                    						<div class="media-body ps-0">
                								<div class="name">
                									<h5 class="mb-0">{{$review->name}}</h5>
                									<!-- <h6>Co-Founder, Design.co</h6> -->
                								</div>
                							</div>
                						</div>
                					</div>
            					</div>
            					@endforeach
            				</div>
       					</div>
                	</div>
                	<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                   		<div class="login-white-box shadow-none">
                        	<div class="title">
                            	<h3>Welcome back ! <span class="text-warning">Login</span></h3>
                            	<p>Lorem Ipsum has been the industry's standard dummy text</p>
                        	</div>
                        	<form  action="{{ route('userlogin') }}" method="POST" enctype="multipart/form-data" id="form">
                  				@csrf
                            	<div class="form-group">
                                	<label>Email Address</label>
                                	<input type="text" name="email" class="form-ctrl form-control" placeholder="Enter" autocomplete="off">
                            	</div>
                             	<div class="form-group">
                                	<label>Password</label>
                                	<input type="password" name="password" class="form-ctrl form-control" placeholder="Enter" autocomplete="off">
                            	</div>
                            	<div class="row">
                    				<div class="col-7 col-7 col-lg-7 pe-0">
                        				<div class="form-group">
                        					<div class="form-check">
              									<input class="form-check-input" type="checkbox" id="invalidCheck" name="rememberme">
              									<label class="form-check-label label-trms" for="invalidCheck">Remember me</label>
              									<div class="invalid-feedback">
                									You must agree before submitting.
              									</div>
            								</div>
            							</div>
                        			</div>
                    				<div class="col-5 col-5 col-lg-5">
                        				<div class="form-group forgot-txt text-end">
                							<p><a href="{{route('forgetpage')}}">Forgot Password?</a></p>
                						</div>
                        			</div>
                    			</div>
                            	<div class="form-group">
                               		<button type="submit" class="btn btn-warning btn-lg btn-submit btn-block">Login</button>
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
                            	<div class="form-group SignUp-txt text-center">
                					<p>
                						Don’t have an account?  <a href="{{ route('register') }}">Register</a>
                					</p>
            					</div>
                        	</form>
                    	</div>
                	</div>
            	</div>
        	</div>
    	</div>
	</section>
@endsection