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
            <h4 class="text-center mb-4">User details</h4>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>User name</th>
                        <td>
                            @if(isset($orders->userdata->name))
                            {{ $orders->userdata->name }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        @if(isset($orders->userdata->email))
                        <td>{{ $orders->userdata->email }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>Phone number</th>
                        @if(isset($orders->userdata->number))
                        <td>{{ $orders->userdata->number }}</td>
                        @endif
                    </tr>
                  </tbody>
                </table>
                <h4 class="text-center mt-4">User's project profile details</h4>
                <table class="table table-bordered table-striped">
                  <tbody>
                    <tr>
                        <th>Name</th>
                        <td>
                        @if(isset($orders->user_name))
                            {{ $orders->user_name }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            @if(isset($orders->email))
                            {{ $orders->email }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Phone number</th>
                        <td>
                            @if(isset($orders->monumber))
                            {{ $orders->monumber }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                          @if(isset($orders->address))
                            {{ $orders->address }},
                          @endif
                          @if(isset($cities->name))
                            {{ $cities->name }},
                          @endif
                          @if(isset($states->name))
                            {{ $states->name }},
                          @endif
                          @if(isset($orders->pincode))
                            {{ $orders->pincode }},
                          @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Type of Installation required</th>
                        <td>
                            @if($orders->installation_type == '1')
                            Home
                            @elseif($orders->installation_type == '2')
                            Office
                            @elseif($orders->installation_type == '3')
                            Housing society
                            @elseif($orders->installation_type == '4')
                            Industry
                            @elseif($orders->installation_type == '')
                            Not mentioned
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Type of Rooftop</th>
                        <td>
                            @if($orders->rooftop_type == '1')
                            RCC
                            @elseif($orders->rooftop_type == '2')
                            Metal
                            @elseif($orders->rooftop_type == '3')
                            Other
                            @elseif($orders->rooftop_type == '')
                            Not mentioned
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Average Monthly Electricity Consumption</th>
                        <td>
                            @if(isset($orders->monthly_bill))
                            {{$orders->monthly_bill}}
                            @else
                            Not mentioned
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
              <div class="col-lg-6">
                <p class="m-4">Electricity Bill Image</p>
                @if(isset($orders->monthly_bill_img))
                <img src="{{asset($orders->monthly_bill_img)}}" width="100%">
                @else
                Not uploaded yet
                @endif
              </div>
              <div class="col-lg-6">
                <p class="m-4">Rooftop Image</p>
                @if(isset($orders->monthly_bill_img))
                <img src="{{asset($orders->rooftop_img)}}" width="100%">
                @else
                Not uploaded yet
                @endif
              </div>
            </div>
            <div class="row">
              <div class="container">
                <div class="col-lg-12">
                  <h3>User location</h3>
                  @if(isset($orders->location))
                    <div class="map-sec">
                              {!! $orders->location !!}
                              <!-- {{ $orders->location }}                              -->
                    </div>
                  @else
                  Not getting Location
                  @endif
                </div>
              </div>
            </div>
            <h4 class="text-center mt-4">Dashboard </h4>
                <table class="table table-bordered table-striped">
                  <tbody>
                    <tr>
                        <th>Project ID</th>
                        <td>
                            {{ $orders->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>Project Capacity</th>
                        <td>
                            {{ $orders->capacity }}
                        </td>
                    </tr>
                    <tr>
                        <th>Project Current Status</th>
                        <td>
                          @if($orders->is_ordered == '1' && $orders->is_visited == '0' && $orders->is_quotation == '0' && $orders->is_complete == '0')
                              Ordered
                        @endif
                        @if($orders->is_ordered == '1' && $orders->is_complete == '0')
                                On process
                        @endif
                        <!-- @if($orders->is_ordered == '1' && $orders->is_visited == '1' && $orders->is_quotation == '1' && $orders->is_complete == '0')
                                On 2 process
                        @endif -->
                        @if($orders->is_ordered == '1' && $orders->is_visited == '1' && $orders->is_quotation == '1' && $orders->is_complete == '1')
                                Completed
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Payment Status</th>
                        <td>
                            @if($orders->paymentstatus1 == '1' && $orders->paymentstatus2 == '0' && $orders->paymentstatus3 == '0' && $orders->paymentstatus4 == '0')
                                Pay first payment
                            @endif
                            @if($orders->paymentstatus1 == '1' && $orders->paymentstatus2 == '1' && $orders->paymentstatus3 == '0' && $orders->paymentstatus4 == '0')
                                Pay second payment
                            @endif
                            @if($orders->paymentstatus1 == '1' && $orders->paymentstatus2 == '1' && $orders->paymentstatus3 == '1' && $orders->paymentstatus4 == '0')
                                Pay third payment
                            @endif
                            @if($orders->paymentstatus1 == '1' && $orders->paymentstatus2 == '1' && $orders->paymentstatus3 == '1' && $orders->paymentstatus4 == '1')
                                Pay fourth payment
                            @endif
                            @if($orders->paymentstatus1 == '0' && $orders->paymentstatus2 == '0' && $orders->paymentstatus3 == '0' && $orders->paymentstatus4 == '0')
                                Not payment yet
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Electricity Generated</th>
                        <td>
                            {{ $orders->generation }}
                        </td>
                    </tr>
                    <tr>
                        <th>Financial Savings</th>
                        <td>
                            {{ $orders->annualSavings }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <h4 class="text-center mt-4">Survey & Design </h4>
                <div class="row">
              <div class="col-lg-6">
                <p class="m-4">Survey Photo</p>
                @if(isset($orders->surveyphoto))
                <a href="{{route('loadsurveyphoto', [$orders->id])}}">Download Photo</a>
                <!-- <img src="{{asset($orders->surveyphoto)}}" width="100%"> -->
                @else
                Not uploaded yet
                @endif
                <!-- <img src="{{asset($orders->surveyphoto)}}" width="100%"> -->
              </div>
              <div class="col-lg-6">
                <p class="m-4">Design PDF</p>
                 @if(isset($orders->surveypdf))
                 <a href="{{route('loadsurveypdf', [$orders->id])}}">Download PDF</a>
                    <!-- <object data="{{ asset($orders->surveypdf) }}" type="application/pdf" width="100%">
                        <p>This browser does not support PDFs. Please download the PDF to view it: 
                            <a href="{{ asset($orders->surveypdf) }}">Download PDF</a>.
                        </p>
                    </object> -->
                @else
                Not uploaded yet
                @endif
                <!-- <img src="{{asset($orders->surveypdf)}}" width="100%"> -->
              </div>
            </div>
            <h4 class="text-center mt-4">Proposal </h4>
                <table class="table table-bordered table-striped">
                  <tbody>
                    <tr>
                        <th>Proposal Details:</th>
                        <td>
                            {{ $orders->proposal }}
                        </td>
                    </tr>
                    <tr>
                        <th>Proposal date</th>
                        <td>
                            {{ $orders->proposal_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>Remark</th>
                        <td>
                            {{ $orders->proposal_remark }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
              <div class="col-lg-12">
                <p class="m-4">Proposal Image</p>
                @if(isset($orders->proposal_img))
                <img src="{{asset($orders->proposal_img)}}" width="100%">
                @else
                Not uploaded yet
                @endif
              </div>
            </div>
            <h4 class="text-center mt-4">Procurement & Execution Timeline </h4>
            <div class="row">
              <div class="col-lg-6">
                <table class="table table-bordered table-striped">
                  <tbody>
                    <tr>
                        <th>Design Approval by client</th>
                        <td>
                            @if($orders->design_client_approve == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Procurement</th>
                        <td>
                            @if($orders->procurement == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Module</th>
                        <td>
                            @if($orders->module == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Structure</th>
                        <td>
                            @if($orders->structure == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Balance of Supply</th>
                        <td>
                            @if($orders->balancesupply == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Material Ready for Dispatch</th>
                        <td>
                            @if($orders->material_ready_dis == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Make Payment</th>
                        <td>
                            @if($orders->is_payment == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Material Dispatch</th>
                        <td>
                            @if($orders->material_dis == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Material Received</th>
                        <td>
                            @if($orders->material_get == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
              </div>
              <div class="col-lg-6">
                <table class="table table-bordered table-striped">
                  <tbody>
                    <tr>
                        <th>Structure MMS Installation</th>
                        <td>
                            @if($orders->mms == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Module Installation</th>
                        <td>
                            @if($orders->module_install == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Inverter Installation</th>
                        <td>
                            @if($orders->invert_install == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>DCDB and ACDB Installation</th>
                        <td>
                            @if($orders->dcdbacdb == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Cabling</th>
                        <td>
                            @if($orders->cabling == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Earthing and Lighting Arrestor</th>
                        <td>
                            @if($orders->earthLight == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Quality Check</th>
                        <td>
                            @if($orders->qualityCheck == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Test Charging</th>
                        <td>
                            @if($orders->chargingtest == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Net Metering</th>
                        <td>
                            @if($orders->netmetering == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Completion Check</th>
                        <td>
                            @if($orders->completecheck == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
              </div>
            </div>
            <h4 class="text-center mt-4">Government Approvals Section </h4>
                <table class="table table-bordered table-striped">
                  <tbody>
                    <tr>
                        <th>Feasibility Approval</th>
                        <td>
                            @if($orders->feasibility_gov == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Net Metering</th>
                        <td>
                            @if($orders->net_metering_gov == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>MRT</th>
                        <td>
                            @if($orders->mrt_gov == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>CEIG</th>
                        <td>
                            @if($orders->ceig_gov == '1')
                            Done
                            @else
                            Pending
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
                
            <div class="row my-3 mt-4">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('subadmin.order.index') }}">
                        <button type="button" class="btn btn-success py-2 px-3 ml-2">
                            <span class="px-2 py-1 d-inline-block">Back</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection