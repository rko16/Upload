@extends('app')
@section('content')
<div class="wrap bg-light">
    <div class="container mt-5 pt-4">
        <div class="form-box">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-md-6 col-lg-6">
                     <div class="login-white-box bg-white">
                        <div class="title">
                            <h3>Forgot Password</h3>
                            <p>Enter the password to secure the account.</p>
                        </div>
                        <form action="{{route('getforget')}}" method="POST" enctype="multipart/form-data">
                        	@csrf
                        	<div class="form-group">
                                <label>Number</label>
                                <input type="number" class="form-ctrl form-control" autocomplete="off" placeholder="Enter" name="number" />
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-ctrl form-control" autocomplete="off" placeholder="Enter" name="password" />
                            </div> 
                             <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-ctrl form-control" autocomplete="off" placeholder="Enter" name="password_confirmation" />
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
                            <div class="form-group">
                               <button type="submit" class="btn btn-warning btn-lg btn-submit btn-block">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection