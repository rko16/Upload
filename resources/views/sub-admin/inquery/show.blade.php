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
                    <a href="{{ route('subadmin.inquery.index') }}">inquery</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">inquery</li>
                </ol>
              </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-lg-12">
        <div class="card card-body p-4">
          <table class="table">
            <tbody>
              <tr>
                <td>Customer name</td>
                <td>{{ $solarInqurydata->userdata->name }}</td>
              </tr>
              <tr>
                <td>Customer phone number</td>
                <td>{{ $solarInqurydata->userdata->number }}</td>
              </tr>
              <tr>
                <td>Customer email</td>
                <td>{{ $solarInqurydata->userdata->email }}</td>     
              </tr>
              <tr>
                <td>Monthly Bill</td>
                <td>{{ $solarInqurydata->monthlyBill }} Rs. </td>
              </tr>
              <tr>
                <td>Electicity cost per unit</td>
                <td>{{ $solarInqurydata->electricityCost }}</td>
              </tr>
              <tr>
                <td>Location</td>
                <td>{{ $solarInqurydata->statename->name }}</td>
              </tr>
              <tr>
                <td>Capacity</td>
                <td>{{ $solarInqurydata->capacity }}</td>
              </tr>
              <tr>
                <td>Space</td>
                <td>{{ $solarInqurydata->space }}</td>
              </tr>
              <tr>
                <td>Green Energy</td>
                <td>{{ $solarInqurydata->greenEnergy }}</td>
              </tr>
              <tr>
                <td>Annual Savings</td>
                <td>{{ $solarInqurydata->annualSavings }}</td>
              </tr>
              <tr>
                <td>Price</td>
                <td>{{ $solarInqurydata-> price }}</td>
              </tr>
            </tbody>
          </table>
          <div class="row my-3 mt-4">
            <div class="col-sm-12 text-center">
              <button type="submit" class="btn btn-success py-2 px-3 ml-2"><span class="px-2 py-1 d-inline-block"><a href="{{ route('subadmin.inquery.index') }}">Back</a></span></button>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection