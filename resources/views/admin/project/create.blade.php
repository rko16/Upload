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
                                <a href="{{ route('admin.project.index') }}">Project</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Project</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card card-body p-4">
                <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data" id="form">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="title"><b>Project image</b></label>
                            <input type="file" name="image" class="form-control" required>
                            <div class="errorTxt"></div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="title"><b>Project name</b></label>
                            <input type="text" name="name" placeholder="Enter the Description" class="form-control" required>
                            <div class="errorTxt"></div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="type"><b>Solar Type(power)</b></label>
                            <input type="text" name="power" class="form-control" placeholder="Enter the Description">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="title"><b>Address</b></label>
                            <input type="text" name="address" class="form-control">
                            <div class="errorTxt"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="title"><b>Project type</b></label>
                            <select name="type" required class="form-control">
                                <option value="">Select type</option>
                                <option value="1">Residential</option>
                                <option value="2">Commercial</option>
                            </select>
                            <div class="errorTxt"></div>
                        </div>
                    </div>
                    <div class="row my-3 mt-4">
                        <div class="col-sm-12 text-center">
                          <input type="submit" class="btn btn-primary py-2 px-3 ml-2 px-2 py-1 d-inline-block" value="Submit"/>
                          <a href="{{ route('admin.project.index') }}">
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
