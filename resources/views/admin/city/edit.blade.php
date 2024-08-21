@extends('layouts.admins.app')
@section('content')
<div class="content-wrapper">
<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header border-0 pb-0 mb-0">
      <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap bg-white p-2 border">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-inverse-primary py-0 px-2 mb-0">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('admin.city.index') }}">City</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Add City</li>
            </ol>
          </nav>
      </div>
    </div>
  </div>
</div>
<div class="row mb-4">
  <div class="col-lg-12">
    <div class="card card-body p-4">
    <form action="{{ route('admin.city.update', [$data->id]) }}" method="POST" enctype="multipart/form-data" id="form" >
      @csrf
      @method('PUT')
      <div class="row">
            <div class="col-sm-4 mb-3">
              <label class="font-size-13"><strong>City Name</strong> <sub class="text-danger font-size-16">*</sub></label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter city name" value="{{$data->name}}">
              <div class="errorTxt"></div>
            </div>
            <div class="col-sm-4 mb-3">
              <label class="font-size-13"><strong>State Name</strong> <sub class="text-danger font-size-16">*</sub></label>
              <select class="form-control"  name="state_id" id="state_id">
                <option value="">--Select--</option>
                  @foreach($states as $state)
                    @if($data->state_id == $state->id)
                      <option value="{{ $state->id }}" selected>{{ $state->name }}</option>
                    @else
                      <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endif
                  @endforeach
              </select>
              <div class="errorTxt"></div>
            </div>
          </div>
      <div class="row my-3 mt-4">
        <div class="col-sm-12 text-center">
          <!-- <input type="submit" class="btn btn-primary py-2 px-3 ml-2" value="Submit" /> -->
          <input type="submit" class="btn btn-primary py-2 px-3 ml-2 px-2 py-1 d-inline-block" value="Submit"/>
          <a href="{{ route('admin.city.index') }}">
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