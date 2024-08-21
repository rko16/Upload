@extends('layouts.sub-admin.app')
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-primary mb-2">Total requests pending</h4>
            <h3 class="mb-0 font-weight-semibold">{{ $pending }}</h3>
            <!-- <a class="d-block mt-3" href="#">Show all</a> -->
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-primary mb-2">Total requests completed</h4>
            <h3 class="mb-0 font-weight-semibold">{{ $complete }}</h3>
            <!-- <a class="d-block mt-3" href="#">Show all</a> -->
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-primary mb-2">Total requests cancelled</h4>
            <h3 class="mb-0 font-weight-semibold">{{ $cancel }}</h3>
            <!-- <a class="d-block mt-3" href="#">Show all</a> -->
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-primary mb-2">Total requests received all now</h4>
            <h3 class="mb-0 font-weight-semibold">{{ $total }}</h3>
            <!-- <a class="d-block mt-3" href="#">Show all</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection