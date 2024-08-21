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
                  <a href="{{ route('subadmin.order.index') }}">Order</a>
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
        <form action="{{ route('subadmin.order.update',[$orders->id]) }}" method="POST" enctype="multipart/form-data" id="form">
          @csrf
          @method('PUT')
            <div class="row">
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>User name</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="hidden" name="user_id" value="{{ $orders->userdata->id }}">
                <input type="text" value="{{ $orders->userdata->name }}" class="form-control" readonly>
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Capacity(KW)</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="number" name="capacity" class="form-control" value="{{ $orders->capacity }}">
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Space(sqft.)</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="number" name="space" class="form-control" value="{{ $orders->space }}">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Green Energy</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="number" name="greenEnergy" class="form-control" value="{{ $orders->greenEnergy }}">
              </div>
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Annual Savings</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="number" name="annualSavings" class="form-control" value="{{ $orders->annualSavings }}">
              </div>
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Price</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="number" name="price" class="form-control" value="{{ $orders->price }}">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Visite status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="is_visited">
                  <option value="">--Select--</option>
                    <option value="1" @selected($orders->is_visited == '1')>Visited</option>
                    <option value="0" @selected($orders->is_visited == '0')>Not visited</option>
                </select>
              </div>
            
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Visit date</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="date" class="form-control" name="visited_date" value="{{ $orders->visited_date }}">
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Quotation Status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="is_quotation">
                  <option value="">--Select--</option>
                    <option value="0" @selected($orders->is_quotation == '0')>Wait</option>
                    <option value="1" @selected($orders->is_quotation == '1')>Received</option>
                </select>
              </div>
            </div> 
            <div class="row">
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Quotation date</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="date" class="form-control" name="quotation_date" value="{{ $orders->quotation_date }}">
              </div>
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Design Image</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="file" class="form-control" name="design_img" >
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Design plan</strong> </label>
                <input type="text" class="form-control" name="design_plan" value="{{ $orders->design_plan }}">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Milestone plan</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="text" class="form-control" name="milestone_plan" value="{{ $orders->milestone_plan }}">
              </div>
                <div class="col-sm-4 mb-3">
                  <label class="font-size-13"><strong>Information</strong> <sub class="text-danger font-size-16">*</sub></label>
                  <input type="text" class="form-control" name="info" value="{{ $orders->info }}">
                </div>
                <div class="col-sm-4 mb-3">
                  <label class="font-size-13"><strong>Amount (Quotation)</strong> <sub class="text-danger font-size-16">*</sub></label>
                  <input type="number" name="quotation" class="form-control" value="{{ $orders->quotation }}">
                </div>
              </div>
            <div class="row my-3 mt-4">
            <div class="col-sm-12 text-center">
              <input type="submit" class="btn btn-primary py-2 px-3 ml-2 px-2 py-1 d-inline-block" value="Submit"/>
              <a href="{{ route('subadmin.order.index') }}">
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