@extends('layouts.admins.app')
@section('content')
<div class="content-wrapper">
	<div class="row page-title-header">
		<div class="col-12">
			<div class="page-header border-0 pb-0 mb-0">
				<div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap bg-white p-2 border">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb bg-inverse-primary py-0 px-2 mb-0">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item">
								<a href="{{ route('admin.choose.index') }}">Why choose us</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Add Why choose us</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-lg-12">
			<div class="card card-body p-4">
				<form action="{{ route('admin.choose.store') }}" method="POST" enctype="multipart/form-data" id="form">
					@csrf
					<div class="row">
						<div class="col-sm-6 mb-3">
							<label class="font-size-13" for="name">
								<strong>Image</strong><sub class="text-danger font-size-16">*</sub>
							</label>
							<input type="file" class="form-control" name="image" id="image" placeholder="Image">
							<div class="errorTxt"></div>
							<p>Image should not be large it should be 102x102</p>
						</div>
						<div class="col-sm-6 mb-3">
							<label class="font-size-13" for="name">
								<strong>Text</strong><sub class="text-danger font-size-16">*</sub>
							</label>
							<input type="text" class="form-control" name="message" id="message" placeholder="Enter text message">
							<div class="errorTxt"></div>
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
					</div>
					<div class="row my-3 mt-4">
						<div class="col-sm-12 text-center">
							<!-- <input type="submit" class="btn btn-primary py-2 px-3 ml-2" value="Submit" /> -->
							<input type="submit" class="btn btn-primary py-2 px-3 ml-2 px-2 py-1 d-inline-block" value="Submit"/>
							<a href="{{ route('admin.choose.index') }}">
								<button type="button" class="btn btn-success py-2 px-3 ml-2">
									<span class="px-2 py-1 d-inline-block">Back</span>
								</button>
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
@endsection