@extends('layouts.sub-admin.app')
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
                  <a href="{{ route('sub-admin.order.index') }}">Order</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Manage order</li>
              </ol>
            </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-lg-12">
      <div class="card card-body p-4">
        <form action="{{ route('sub-admin.order.store') }}" method="POST" enctype="multipart/form-data" id="form">
          @csrf
            <div class="row">
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Solar name</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="solar_id">
                  <option>---Select---</option>
                    @foreach($solars as $solar)
                      <option value="{{ $solar->id }}">{{ $solar->name }}</option>
                    @endforeach
                </select>
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>User name</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="user_id">
                  <option>---Select---</option>
                    @foreach($users as $user)
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Visite status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="is_visit">
                  <option value="">--Select--</option>
                    <option value="1">Visited</option>
                    <option value="0">Not visited</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Visit date</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="date" class="form-control" name="visited_date">
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Quotation</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="quotation_status">
                  <option value="">--Select--</option>
                    <option value="0">Wait</option>
                    <option value="1">Received</option>
                </select>
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Quotation date</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="date" class="form-control" name="quoted_date">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Design Image</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="file" class="form-control" name="design_img">
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Design plan</strong> </label>
                <input type="text" class="form-control" name="design_plan">
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Milestone plan</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="text" class="form-control" name="milestone_plan">
              </div>
            </div>

              <div class="row">
                <div class="col-sm-4 mb-3">
                  <label class="font-size-13"><strong>Information</strong> <sub class="text-danger font-size-16">*</sub></label>
                  <input type="text" class="form-control" name="Info">
                </div>

                <div class="col-sm-4 mb-3">
                  <label class="font-size-13"><strong>Status</strong> <sub class="text-danger font-size-16">*</sub></label>
                  <select class="form-control" name="status">
                    <option value="">--Select--</option>
                      <option value="0">Active</option>
                      <option value="1">Inctive</option>
                      <option value="2">Buy</option>
                      <option value="3">Cancel</option>
                  </select>
                </div>

                <div class="col-sm-4 mb-3">
                  <label class="font-size-13"><strong>Amount (Quotation)</strong> <sub class="text-danger font-size-16">*</sub></label>
                  <input type="number" name="" class="form-control" name="quotation">
                </div>
              </div>
            <div class="row my-3 mt-4">
              <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary py-2 px-3"><span class="px-2 py-1 d-inline-block">Submit</span></button>
                <button type="submit" class="btn btn-success py-2 px-3 ml-2"><span class="px-2 py-1 d-inline-block">Back</span></button>
              </div>
            </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection