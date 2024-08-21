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
                    <a href="{{ route('admin.contact.index') }}">Contact</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Manage Contact</li>
                </ol>
              </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-4">
    <div class="col-lg-12">
        <div class="card card-body p-4">
            <h4 class="text-center mb-4">User details</h4>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>User name</th>
                        <td>{{ $contacts->first_name }}</td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td>{{ $contacts->last_name }}</td>
                    </tr>
                    <tr>
                        <th>E-mail ID</th>
                        <td>{{ $contacts->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone number</th>
                        <td>{{ $contacts->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Subject</th>
                        <td>{{ $contacts->subject }}</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>{{ $contacts->message }}</td>
                    </tr>
                  </tbody>
                </table>
            <div class="row my-3 mt-4">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('admin.contact.index') }}">
                        <button type="button" class="btn btn-success py-2 px-3 ml-2">
                            <span class="px-2 py-1 d-inline-block">Back</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection