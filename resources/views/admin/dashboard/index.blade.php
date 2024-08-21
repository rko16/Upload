@extends('layouts.admins.app')
@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="d-flex">
                  <div class="wrapper">
                    <h4 class="card-title text-primary mb-2">Orders Converted</h4>
                    <h3 class="mb-0 font-weight-semibold">{{ $converted }}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 mt-md-0 mt-4">
                <div class="d-flex">
                  <div class="wrapper">
                    <h4 class="card-title text-primary mb-2">Proposal Rejected </h4>
                    <h3 class="mb-0 font-weight-semibold">{{ $rejected }}</h3>
                  </div>
                </div>
              </div>
              <!-- <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                <div class="d-flex">
                  <div class="wrapper">
                    <h3 class="mb-0 font-weight-semibold">{{$inactiveprojectmanager}}</h3>
                    <h5 class="mb-0 font-weight-medium text-primary">Inactive project manager</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                <div class="d-flex">
                  <div class="wrapper">
                    <h3 class="mb-0 font-weight-semibold">{{$activeprojectmanager}}</h3>
                    <h5 class="mb-0 font-weight-medium text-primary">Active project manager</h5>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="row">
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-primary mb-2">Total requests pending</h4>
            <h3 class="mb-0 font-weight-semibold">{{ $pending }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-primary mb-2">Total requests completed</h4>
            <h3 class="mb-0 font-weight-semibold">{{ $complete }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-primary mb-2">Total requests cancelled</h4>
            <h3 class="mb-0 font-weight-semibold">{{ $cancel }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-primary mb-2">Total requests received all now</h4>
            <h3 class="mb-0 font-weight-semibold">{{ $total }}</h3>
          </div>
        </div>
      </div>
    </div> -->
    <div class="row">

      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-primary mb-2">Total requests received all now</h4>
            <h3 class="mb-0 font-weight-semibold">{{ $total }}</h3>
            <!-- <a class="d-block mt-3" href="#">Show all</a> -->
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-primary mb-2">New Leads(Daily)</h4>
            <h3 class="mb-0 font-weight-semibold">{{ $daynumber }}</h3>
            <!-- <a class="d-block mt-3" href="#">Show all</a> -->
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-primary mb-2">New Leads(Weekly)</h4>
            <h3 class="mb-0 font-weight-semibold">{{ $weeknumber }}</h3>
            <!-- <a class="d-block mt-3" href="#">Show all</a> -->
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-primary mb-2">New Leads(Monthly)</h4>
            <h3 class="mb-0 font-weight-semibold">{{ $monthnumber }}</h3>
            <!-- <a class="d-block mt-3" href="#">Show all</a> -->
          </div>
        </div>
      </div>
    </div>
    <!-- citydata -->
    <!-- <div class="row">
    <div class="col-lg-6">
        <select class="form-ctrl form-control" onchange="location = this.value;">
            <option value="">Select</option>
            @foreach($citydata as $city)
                <option value="{{ route('admin.get.cityamount', [$city->id]) }}" 
                    {{ request()->segment(3) == $city->id ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>
    </div>
</div> -->


    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="row mb-2">
    <div class="col-lg-6">
        <select class="form-ctrl form-control" onchange="location = this.value;">
            <option value="{{ route('admin.dashboard')}}">Select</option>
            @foreach($citydata as $city)
                <option value="{{ route('admin.get.cityamount', [$city->id]) }}" 
                    {{ request()->segment(3) == $city->id ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="d-flex">
                  <div class="wrapper">
                    <h4 class="card-title text-primary mb-2">Total Project Cost </h4>
                    <h3 class="mb-0 font-weight-semibold">{{ $totalamountget }}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 mt-md-0 mt-4">
                <div class="d-flex">
                  <div class="wrapper">
                    <h4 class="card-title text-primary mb-2">Advance received </h4>
                    <h3 class="mb-0 font-weight-semibold">{{ $advancereceived }}</h3>
                  </div>
                </div>
              </div>
              <!-- <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                <div class="d-flex">
                  <div class="wrapper">
                    <h3 class="mb-0 font-weight-semibold">{{$inactiveprojectmanager}}</h3>
                    <h5 class="mb-0 font-weight-medium text-primary">Inactive project manager</h5>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
    </div>
  </div>
@endsection