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
                <a href="{{ route('admin.contact.index') }}">Contact</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Add Contact</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-lg-12">
      <div class="card card-body p-4">
        <form action="{{ route('admin.contact.update',[$contacts->id]) }}" method="POST" enctype="multipart/form-data"   id="form">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-sm-4 mb-3">
              <label class="font-size-13">
                <strong>First Name</strong>
                <sub class="text-danger font-size-16">*</sub>
              </label>
              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name" value="{{ $contacts->first_name }}" readonly>
              <div class="errorTxt"></div>
            </div>
            <div class="col-sm-4 mb-3">
              <label class="font-size-13"><strong>Last Name</strong> <sub class="text-danger font-size-16">*</sub></label>
              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name" value="{{ $contacts->last_name }}" readonly>
              <div class="errorTxt"></div>
            </div>
            <div class="col-sm-4 mb-3">
              <label class="font-size-13"><strong>E-mail ID</strong> <sub class="text-danger font-size-16">*</sub></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter email ID" value="{{ $contacts->email }}" readonly>
              <div class="errorTxt"></div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-4 mb-3">
            <label class="font-size-13"><strong>Phone number</strong> <sub class="text-danger font-size-16">*</sub></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <select class="form-control" name="country_code" id="country_code" style="max-width: 25px;" value="{{ $contacts->country_code }}">
                  <option value="+1"> +1 </option>
                  <option value="+44"> +44 </option>
                  <option value="+91"> +91 </option>
                  <option value="+61"> +61 </option>
                  <option value="+81"> +81 </option>
                  <!-- Add more country codes as needed -->
                </select>
              </div>
              <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Enter phone number" value="{{ $contacts->phone_number }}">
            </div>
            <div class="errorTxt"></div>
          </div>
          <div class="col-sm-4 mb-3">
            <label class="font-size-13"><strong>Subject</strong> <sub class="text-danger font-size-16">*</sub></label>
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter subject" value="{{ $contacts->subject }}">
            <div class="errorTxt"></div>
          </div>
          <div class="col-sm-4 mb-3">
            <label class="font-size-13"><strong>Message</strong> <sub class="text-danger font-size-16">*</sub></label>
            <input type="text" class="form-control" name="message" id="message" placeholder="Enter message" value="{{ $contacts->message }}">
            <div class="errorTxt"></div>
          </div>
        </div>
        <div class="row my-3 mt-4">
        <div class="col-sm-12 text-center">
          <input type="submit" class="btn btn-primary py-2 px-3 ml-2 px-2 py-1 d-inline-block" value="Submit"/>
          <a href="{{ route('admin.contact.index') }}">
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