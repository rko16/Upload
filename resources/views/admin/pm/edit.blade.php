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
                  <li class="breadcrumb-item"><a href="{{ route('admin.pm.index') }}">Project Managers</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Update Project Managers</li>
                </ol>
              </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-lg-12">
        <div class="card card-body p-4">
          <form form action="{{ route('admin.pm.update', [$users->id]) }}" method="POST" enctype="multipart/form-data" id="form">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-sm-6 mb-3">
                <label class="font-size-13"><strong>Name</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="text" class="form-control" name="name" value="{{ $users->name }}">
                <div class="errorTxt"></div>
              </div>
              <div class="col-sm-6 mb-3">
                <label class="font-size-13"><strong>Email Address</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="email" class="form-control" name="email" value="{{ $users->email }}">
                <div class="errorTxt"></div>
              </div>
            </div>
            <div class="row">
              <!-- <div class="col-sm-6 mb-3">
                <label class="font-size-13"><strong>Password</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="text" class="form-control" name="pswd" value="{{ $users->password }}">
                <div class="errorTxt"></div>
              </div> -->
              <div class="col-sm-6 mb-3">
                  <label class="font-size-13"><strong>User Type</strong> <sub class="text-danger font-size-16">*</sub></label>
                  <select class="form-control" name="type" id="userType">
                      <option value="">--Select--</option>
                      <option value="1" @selected($users->type == '1')>Admin</option>
                      <option value="2" @selected($users->type == '2')>Sub admin</option>
                  </select>
                  <div class="errorText"></div>
              </div>
            </div>
            <div class="row my-3 mt-4">
              <div class="col-sm-12 text-center">
                <!-- <input type="submit" class="btn btn-primary py-2 px-3 ml-2" value="Submit" /> -->
                <input type="submit" class="btn btn-primary py-2 px-3 ml-2 px-2 py-1 d-inline-block" value="Submit"/>
                <a href="{{ route('admin.pm.index') }}">
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
<script>
  document.addEventListener('DOMContentLoaded', function() {
      const form = document.querySelector('form'); // Assuming you have a form element wrapping your inputs
      const userTypeSelect = document.getElementById('userType');
      const errorText = document.querySelector('.errorText');

      form.addEventListener('submit', function(event) {
          if (userTypeSelect.value === "") {
              event.preventDefault(); // Prevent form submission
              errorText.textContent = "Please select a user type.";
              errorText.style.color = "red";
          } else {
              errorText.textContent = ""; // Clear any previous error messages
          }
      });
  });
</script>
@endsection