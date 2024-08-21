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
                <a href="{{ route('admin.state.index') }}">State</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Add State</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-lg-12">
      <div class="card card-body p-4">
        <form action="{{ route('admin.state.store') }}" method="POST" enctype="multipart/form-data" id="form">
          @csrf
          <div class="row">
            <div class="col-sm-4 mb-3">
              <label class="font-size-13" for="name">
                <strong>State</strong><sub class="text-danger font-size-16">*</sub>
              </label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter state name">
              <div class="errorTxt"></div>
            </div>
            <div class="col-sm-4 mb-3">
              <label class="font-size-13" for="name">
                <strong>Generation per KWp</strong><sub class="text-danger font-size-16">*</sub>
              </label>
              <input type="number" class="form-control" name="generation" id="generation" placeholder="Enter state generation">
              <div class="errorTxt"></div>
            </div>
          </div>
          <div class="row my-3 mt-4">
            <div class="col-sm-12 text-center">
              <!-- <input type="submit" class="btn btn-primary py-2 px-3 ml-2" value="Submit" /> -->
              <input type="submit" class="btn btn-primary py-2 px-3 ml-2 px-2 py-1 d-inline-block" value="Submit"/>
              <a href="{{ route('admin.state.index') }}">
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
@endsection