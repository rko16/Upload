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
	                        <li class="breadcrumb-item"><a href="#">Home</a></li>
	                        <li class="breadcrumb-item active" aria-current="page">Why choose us</li>
	                    </ol>
	                </nav>
	            </div>
	        </div>
	    </div>
	</div>
    <div class="container-fluid">
    	<div class="card">
            <div class="card-body">
                <form action="{{ route('admin.testimonial.update', [$aboutdata->id]) }}" method="POST" enctype="multipart/form-data" id="form" >
					@csrf
					@method('PUT')
                    <div class="section-header">
                        <div class="d-flex justify-content-center mb-3">
	                        <div class="primary" style="border: 2px solid blue;height: 34px;width: 132px;padding: 3px 0px 0px 10px;color: blue;">
	                        	Why choose us
	                        </div>
	                    </div>
                        <div class="d-flex justify-content-center">
                            <input type="text" name="column1" class="form-control text-center" style="font-size: 2rem; font-weight: bold; margin-top: 1rem; color: #e98e63;" value="{{ $aboutdata->column1 }}">
                            <input type="text" name="column2" class="form-control text-center" style="font-size: 2rem; font-weight: bold; margin-top: 1rem;" value="{{ $aboutdata->column2 }}">
                            <input type="text" name="column3" class="form-control text-center" style="color: #e98e63; font-size: 2rem; font-weight: bold; margin-top: 1rem;" value="{{ $aboutdata->column3 }}">
                            <input type="text" name="column4" class="form-control" style="font-size: 2rem; font-weight: bold; margin-top: 1rem;" value="{{ $aboutdata->column4 }}">
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="text" name="column5" class="form-control text-center" value="{{ $aboutdata->column5 }}">
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="text" name="column6" class="form-control text-center" value="{{ $aboutdata->column6 }}">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="feature-icon d-flex justify-content-center">
                                <img src="https://img.icons8.com/ios-filled/50/000000/email.png" alt="Custom Design" style="height: 25px; width: 25px;">
                            </div>
                            <div class="feature-title d-flex justify-content-center font-weight-bold">
                                <input type="text" name="column7" class="form-control text-center" style="margin-top: 1rem;" value="{{ $aboutdata->column7 }}">
                            </div>
                            <textarea name="column8" rows="4" cols="30">{{ $aboutdata->column8 }}
                            </textarea>
                        </div>
                        <div class="col-md-3">
                            <div class="feature-icon d-flex justify-content-center">
                                <img src="https://img.icons8.com/ios-filled/50/000000/technical-support.png" alt="Full technical support" style="height: 25px; width: 25px;">
                            </div>
                            <input type="text" name="column9" class="form-control text-center" style="margin-top: 1rem;" value="{{ $aboutdata->column9 }}">
                            <textarea name="column10" rows="4" cols="30">{{ $aboutdata->column10 }}
                            </textarea>
                        </div>
                        <div class="col-md-3">
                            <div class="feature-icon d-flex justify-content-center">
                                <img src="https://img.icons8.com/ios-filled/50/000000/money.png" alt="Money back guarantee" style="height: 25px; width: 25px;">
                            </div>
                            <input type="text" name="column11" class="form-control text-center" style="margin-top: 1rem;" value="{{ $aboutdata->column11 }}">
                            <textarea name="column12" rows="4" cols="30">{{ $aboutdata->column12 }}
                            </textarea>
                        </div>
                        <div class="col-md-3">
                            <div class="feature-icon d-flex justify-content-center">
                                <img src="https://img.icons8.com/ios-filled/50/000000/money.png" alt="Money back guarantee" style="height: 25px; width: 25px;">
                            </div>
                            <input type="text" name="column13" class="form-control text-center" style="margin-top: 1rem;" value="{{ $aboutdata->column13 }}">
                            <textarea name="column14" rows="4" cols="30">{{ $aboutdata->column14 }}
                            </textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="feature-icon d-flex justify-content-center">
                                <img src="https://img.icons8.com/ios-filled/50/000000/email.png" alt="Custom Design" style="height: 25px; width: 25px;">
                            </div>
                            <div class="feature-title d-flex justify-content-center font-weight-bold">
                                <input type="text" name="column15" class="form-control text-center" style="margin-top: 1rem;" value="{{ $aboutdata->column15 }}">
                            </div>
                            <textarea name="column16" rows="4" cols="42">{{ $aboutdata->column16 }}
							</textarea>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-icon d-flex justify-content-center">
                                <img src="https://img.icons8.com/ios-filled/50/000000/technical-support.png" alt="Full technical support" style="height: 25px; width: 25px;">
                            </div>
                            <input type="text" name="column17" class="form-control text-center" style="margin-top: 1rem;" value="{{ $aboutdata->column17 }}">
                            <textarea name="column18" rows="4" cols="42">{{ $aboutdata->column18 }}
							</textarea>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-icon d-flex justify-content-center">
                                <img src="https://img.icons8.com/ios-filled/50/000000/money.png" alt="Money back guarantee" style="height: 25px; width: 25px;">
                            </div>
                            <input type="text" name="column19" class="form-control text-center" style="margin-top: 1rem;" value="{{ $aboutdata->column19 }}">
                            <textarea name="column20" rows="4" cols="42">{{ $aboutdata->column20 }}
							</textarea>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection