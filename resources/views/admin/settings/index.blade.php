@extends('layouts.admins.app')
@section('content')
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
<div class="content-wrapper">
	<div class="row page-title-header">
	    <div class="col-12">
	        <div class="page-header border-0 pb-0 mb-0">
	            <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap bg-white p-2 border">
	                <nav aria-label="breadcrumb">
	                    <ol class="breadcrumb bg-inverse-primary py-0 px-2 mb-0">
	                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
	                        <li class="breadcrumb-item active" aria-current="page">Settings</li>
	                    </ol>
	                </nav>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="container-fluid">
    	<div class="card">
            <div class="card-body">
                <form action="{{route('admin.settings.update',[$data->id])}}" method="POST" enctype="multipart/form-data" id="form" >
					@csrf
					@method('PUT')
					<div class="row">
			            <div class="col-sm-3 mb-3">
			              	<label class="font-size-13" for="name">
			                	<strong>Admin Email</strong>
			              	</label>
			              	<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{$data->email}}">
			              	<div class="errorTxt"></div>
			            </div>
			            <div class="col-sm-3 mb-3">
			              	<label class="font-size-13" for="name">
			                	<strong>SMTP. Host</strong>
			              	</label>
			              	<input type="text" class="form-control" name="host" id="host" placeholder="Enter SMTP host" value="{{$data->host}}">
			              	<div class="errorTxt"></div>
			            </div>
			            <div class="col-sm-3 mb-3">
			              	<label class="font-size-13" for="name">
			                	<strong>SMTP. Username</strong>
			              	</label>
			              	<input type="text" class="form-control" name="username" id="username" placeholder="Enter SMTP Username" value="{{$data->username}}">
			              	<div class="errorTxt"></div>
			            </div>
			            <div class="col-sm-3 mb-3">
			              	<label class="font-size-13" for="name">
			                	<strong>SMTP. Password</strong>
			              	</label>
			              	<input type="text" class="form-control" name="smtp_pswd" id="smtp_pswd" placeholder="Enter SMTP Password" value="{{$data->smtp_pswd}}">
			              	<div class="errorTxt"></div>
			            </div>
		          	</div>
		          	<div class="row">
			            <div class="col-sm-3 mb-3">
			              	<label class="font-size-13" for="name">
			                	<strong>Linkedin</strong>
			              	</label>
			              	<input type="text" class="form-control" name="lndlink" placeholder="Enter Linkedin link here." value="{{$data->lndlink}}">
			              	<div class="errorTxt"></div>
			            </div>
			            <div class="col-sm-3 mb-3">
			              	<label class="font-size-13" for="name">
			                	<strong>Facebook</strong>
			              	</label>
			              	<input type="text" class="form-control" name="fblink" placeholder="Enter facebook here." value="{{$data->fblink}}">
			              	<div class="errorTxt"></div>
			            </div>
			            <div class="col-sm-3 mb-3">
			              	<label class="font-size-13" for="name">
			                	<strong>Instagram</strong>
			              	</label>
			              	<input type="text" class="form-control" name="instalink" placeholder="Enter instagram link here." value="{{$data->instalink}}">
			              	<div class="errorTxt"></div>
			            </div>
			            <div class="col-sm-3 mb-3">
			              	<label class="font-size-13" for="name">
			                	<strong>YouTube</strong>
			              	</label>
			              	<input type="text" class="form-control" name="ytlink" placeholder="Enter youtube channel link" value="{{$data->ytlink}}">
			              	<div class="errorTxt"></div>
			            </div>
		          	</div>
		          	<div class="row">
		          		<div class="col-sm-4 mb-3">
		          			<label class="font-size-13" for="name">
			                	<strong>Measurement ID</strong>
			              	</label>
			              	<input type="text" class="form-control" name="measurementId" id="measurementId" placeholder="Enter Measurement ID" value="{{$data->measurementId}}">
			              	<div class="errorTxt"></div>
		          		</div>
		          		<div class="col-sm-4 mb-3">
			              	<label class="font-size-13" for="name">
			                	<strong>Number</strong>
			              	</label>
			              	<input type="number" class="form-control" name="number" placeholder="Enter Contact number" value="{{$data->number}}">
			              	<div class="errorTxt"></div>
			            </div>
			            <div class="col-sm-4 mb-3">
			              	<label class="font-size-13" for="name">
			                	<strong>Careers e-mail</strong>
			              	</label>
			              	<input type="email" class="form-control" name="hremail" placeholder="Enter careers email here'" value="{{$data->hremail}}">
			              	<div class="errorTxt"></div>
			            </div>
		          	</div>
			          @if ($errors->any())
						  <div class="errorTxt">
						      <ul>
						          @foreach ($errors->all() as $error)
						              <li>{{ $error }}</li>
						          @endforeach
						      </ul>
						  </div>
						@endif
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection