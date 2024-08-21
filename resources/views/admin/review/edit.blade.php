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
                            <li class="breadcrumb-item"><a href="{{ route('admin.review.index') }}">    Testimonial management</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Update Testimonial</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card card-body p-4">
                <form action="{{ route('admin.review.update',[$projectdata->id]) }}" method="POST" enctype="multipart/form-data" id="form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="title"><b>User image</b></label>
                            <input type="file" name="upimage" class="form-control">
                            <div class="errorTxt"></div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="title"><b>User name</b></label>
                            <input type="text" name="name" placeholder="Enter the Description" class="form-control" value="{{ $projectdata->name }}">
                            <div class="errorTxt"></div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="type"><b>Rating</b></label>
                            <input type="number" name="rating" class="form-control" placeholder="Enter the Description" value="{{ $projectdata->rating }}" max="5" min="1">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="type"><b>Discription</b></label>
                            <input type="text" name="discription" class="form-control" placeholder="Enter the Description" value="{{ $projectdata->discription }}">
                        </div>
                    </div>
                    <div class="row my-3 mt-4">
                        <div class="col-sm-12 text-center">
                          <input type="submit" class="btn btn-primary py-2 px-3 ml-2 px-2 py-1 d-inline-block" value="Submit"/>
                          <a href="{{ route('admin.review.index') }}">
                            <button type="button" class="btn btn-success py-2 px-3 ml-2">
                              <span class="px-2 py-1 d-inline-block">Back</span>
                            </button>
                          </a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <img src="{{ asset($projectdata->image) }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
