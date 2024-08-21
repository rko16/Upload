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
                  <a href="{{ route('admin.quotationvisit.index') }}">Order</a>
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
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
      <form action="{{ route('admin.quotationvisit.update',[$orders->id]) }}" method="POST" enctype="multipart/form-data" id="form">
          @csrf
          @method('PUT')
          <!-- assign project to project manager start -->
          <div class="container">
               <div class="row">
                    <div class="editheading">Assign project to project manager</div>
               </div>
          </div>
            <div class="row">
              <div class="col-sm-6 mb-3">
                <label class="font-size-13"><strong>Select project manager</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="pm_id">
                  <option value="">--Select--</option>
                    @foreach($projectmanagers as $projectmanager)
                        <option value="{{$projectmanager->id}}" {{ $projectmanager->id == $orders->pm_id ? 'selected' : '' }} >{{$projectmanager->name}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <!-- assign project to project manager end -->
          <div class="container">
               <div class="row">
                    <div class="editheading">Dashboard  Section</div>
               </div>
          </div>
          
            <div class="row">
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Project Capacity</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="number" value="{{ $orders->capacity }}" name="capacity" class="form-control" placeholder="Enter Capacity KWp">
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Electricity Generated</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="number" name="generation" class="form-control" value="{{ $orders->generation }}" placeholder="Enter Electricity">
              </div>
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Financial Savings</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="number" name="annualSavings" class="form-control" value="{{ $orders->annualSavings }}" placeholder="Enter Savings">
              </div>
            </div>
            <div class="container">
               <div class="row">
                    <div class="editheading">Survey & Design Section</div>
               </div>
          </div>
            <div class="row">
              <div class="col-sm-6 mb-3">
                <label class="font-size-13"><strong>Survey Photo</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="file" value="{{ $orders->surveyphoto }}" name="surveyphoto" class="form-control">
              </div>

              <div class="col-sm-6 mb-3">
                <label class="font-size-13"><strong>Design PDF</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="file" name="surveypdf" class="form-control" value="{{ $orders->surveypdf }}">
              </div>
            </div>
            <div class="container">
               <div class="row">
                    <div class="editheading">Proposal Section</div>
               </div>
          </div>
            <div class="row">
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Proposal</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="text" value="{{ $orders->proposal }}" name="proposal" class="form-control" placeholder="Enter Proposal">
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Proposal Image</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="file" name="proposal_img" class="form-control" value="{{ $orders->capacity }}">
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Proposal Date</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="date" name="proposal_date" class="form-control" value="{{ $orders->proposal_date }}">
              </div>
            </div>
            <div class="container">
               <div class="row">
                    <div class="editheading">Procurement Timeline Section</div>
               </div>
          </div>
            <div class="row">
                <div class="col-sm-4 mb-3">
                    <label class="font-size-13"><strong>Design Approval by client</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <!-- <input type="number" name="greenEnergy" class="form-control" value="{{ $orders->greenEnergy }}"> -->
                    <select class="form-control" name="design_client_approve">
                      <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->design_client_approve == '0')>Pending</option>
                        <option value="1" @selected($orders->design_client_approve == '1')>Received</option>
                    </select>
                </div>
                <div class="col-sm-4 mb-3">
                    <label class="font-size-13"><strong>Procurement</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="procurement">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->procurement == '0')>Pending</option>
                        <option value="1" @selected($orders->procurement == '1')>Received</option>
                    </select>
                </div>
                <div class="col-sm-4 mb-3">
                    <label class="font-size-13"><strong>Module</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="module">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->module == '0')>Pending</option>
                        <option value="1" @selected($orders->module == '1')>Received</option>
                    </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Structure</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="structure">
                  <!-- <option value="">--Select--</option> -->
                    <option value="1" @selected($orders->structure == '1')>Visited</option>
                    <option value="0" @selected($orders->structure == '0')>Not visited</option>
                </select>
              </div>
            
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Balance of Supply</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="balancesupply">
                  <!-- <option value="">--Select--</option> -->
                    <option value="1" @selected($orders->balancesupply == '1')>Visited</option>
                    <option value="0" @selected($orders->balancesupply == '0')>Not visited</option>
                </select>
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Material Ready for Dispatch</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="material_ready_dis">
                  <!-- <option value="">--Select--</option> -->
                    <option value="0" @selected($orders->material_ready_dis == '0')>Pending</option>
                    <option value="1" @selected($orders->material_ready_dis == '1')>Received</option>
                </select>
              </div>
            </div> 
            <div class="row">
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Make Payment</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="is_payment">
                  <!-- <option value="">--Select--</option> -->
                    <option value="0" @selected($orders->is_payment == '0')>Pending</option>
                    <option value="1" @selected($orders->is_payment == '1')>Received</option>
                </select>
              </div>
              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Material Dispatch</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="material_dis">
                  <!-- <option value="">--Select--</option> -->
                    <option value="0" @selected($orders->material_dis == '0')>Pending</option>
                    <option value="1" @selected($orders->material_dis == '1')>Received</option>
                </select>
              </div>

              <div class="col-sm-4 mb-3">
                <label class="font-size-13"><strong>Material Received</strong> </label>
                <select class="form-control" name="material_get">
                  <!-- <option value="">--Select--</option> -->
                    <option value="0" @selected($orders->material_get == '0')>Pending</option>
                    <option value="1" @selected($orders->material_get == '1')>Received</option>
                </select>
              </div>
            </div>
            <div class="container">
               <div class="row">
                    <div class="editheading">Execution Timeline Section</div>
               </div>
          </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label class="font-size-13"><strong>Structure MMS Installation</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="mms">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->mms == '0')>Pending</option>
                        <option value="1" @selected($orders->mms == '1')>Received</option>
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label class="font-size-13"><strong>Module Installation</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="module_install">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->module_install == '0')>Pending</option>
                        <option value="1" @selected($orders->module_install == '1')>Received</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label class="font-size-13"><strong>Inverter Installation</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="invert_install">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->invert_install == '0')>Pending</option>
                        <option value="1" @selected($orders->invert_install == '1')>Received</option>
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label class="font-size-13"><strong>DCDB and ACDB Installation</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="dcdbacdb">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->dcdbacdb == '0')>Pending</option>
                        <option value="1" @selected($orders->dcdbacdb == '1')>Received</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label class="font-size-13"><strong>Cabling</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="cabling">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->cabling == '0')>Pending</option>
                        <option value="1" @selected($orders->cabling == '1')>Received</option>
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label class="font-size-13"><strong>Earthing and Lighting Arrestor</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="earthLight">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->earthLight == '0')>Pending</option>
                        <option value="1" @selected($orders->earthLight == '1')>Received</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label class="font-size-13"><strong>Quality Check</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="qualityCheck">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->qualityCheck == '0')>Pending</option>
                        <option value="1" @selected($orders->qualityCheck == '1')>Received</option>
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label class="font-size-13"><strong>Test Charging</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="chargingtest">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->chargingtest == '0')>Pending</option>
                        <option value="1" @selected($orders->chargingtest == '1')>Received</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label class="font-size-13"><strong>Net Metering</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="netmetering">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->netmetering == '0')>Pending</option>
                        <option value="1" @selected($orders->netmetering == '1')>Received</option>
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label class="font-size-13"><strong>Completion Check</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="completecheck">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->completecheck == '0')>Pending</option>
                        <option value="1" @selected($orders->completecheck == '1')>Received</option>
                    </select>
                </div>
            </div>
            <div class="container">
               <div class="row">
                    <div class="editheading">Government Approvals Section</div>
               </div>
          </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label class="font-size-13"><strong>Feasibility Approval:</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="feasibility_gov">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->feasibility_gov == '0')>Pending</option>
                        <option value="1" @selected($orders->feasibility_gov == '1')>Received</option>
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label class="font-size-13"><strong>Net Metering:</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="net_metering_gov">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->net_metering_gov == '0')>Pending</option>
                        <option value="1" @selected($orders->net_metering_gov == '1')>Received</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label class="font-size-13"><strong>MRT:</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="mrt_gov">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->mrt_gov == '0')>Pending</option>
                        <option value="1" @selected($orders->mrt_gov == '1')>Received</option>
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label class="font-size-13"><strong>CEIG:</strong> <sub class="text-danger font-size-16">*</sub></label>
                    <select class="form-control" name="ceig_gov">
                        <!-- <option value="">--Select--</option> -->
                        <option value="0" @selected($orders->ceig_gov == '0')>Pending</option>
                        <option value="1" @selected($orders->ceig_gov == '1')>Received</option>
                    </select>
                </div>
            </div>
            <div class="container">
               <div class="row">
                    <div class="editheading">Status Section</div>
               </div>
          </div>
            <div class="row">
              <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Visite status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="is_visited">
                  <!-- <option value="">--Select--</option> -->
                    <option value="1" @selected($orders->is_visited == '1')>Visited</option>
                    <option value="0" @selected($orders->is_visited == '0')>Not visited</option>
                </select>
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Visit date</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="date" class="form-control" name="visited_date" value="{{ $orders->visited_date }}">
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Quotation Status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="is_quotation">
                  <!-- <option value="">--Select--</option> -->
                    <option value="0" @selected($orders->is_quotation == '0')>Not given</option>
                    <option value="1" @selected($orders->is_quotation == '1')>Given</option>
                </select>
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Quotation date</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="date" class="form-control" name="quotation_date" value="{{ $orders->quotation_date }}">
              </div>
            </div>


            <div class="row">
              <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Survey Done status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="is_surveyDone">
                  <!-- <option value="">--Select--</option> -->
                    <option value="1" @selected($orders->is_surveyDone == '1')>Done</option>
                    <option value="0" @selected($orders->is_surveyDone == '0')>Not Done</option>
                </select>
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Design Sent status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="is_designSent">
                  <!-- <option value="">--Select--</option> -->
                    <option value="1" @selected($orders->is_designSent == '1')>Done</option>
                    <option value="0" @selected($orders->is_designSent == '0')>Not Done</option>
                </select>
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Proposal Sent Status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="is_proposalSent">
                  <!-- <option value="">--Select--</option> -->
                    <option value="0" @selected($orders->is_proposalSent == '0')>Not Done</option>
                    <option value="1" @selected($orders->is_proposalSent == '1')>Done</option>
                </select>
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Procurement Ongoing Status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="is_procurementOngoing">
                  <!-- <option value="">--Select--</option> -->
                    <option value="0" @selected($orders->is_procurementOngoing == '0')>Not Done</option>
                    <option value="1" @selected($orders->is_procurementOngoing == '1')>Done</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Execution Ongoing status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="is_executionOngoing">
                  <!-- <option value="">--Select--</option> -->
                    <option value="1" @selected($orders->is_executionOngoing == '1')>Done</option>
                    <option value="0" @selected($orders->is_executionOngoing == '0')>Not Done</option>
                </select>
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Government Approval status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="is_govApprov">
                  <!-- <option value="">--Select--</option> -->
                    <option value="1" @selected($orders->is_govApprov == '1')>Done</option>
                    <option value="0" @selected($orders->is_govApprov == '0')>Not Done</option>
                </select>
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Commissioned Status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="is_commissioned">
                  <!-- <option value="">--Select--</option> -->
                    <option value="0" @selected($orders->is_commissioned == '0')>Not Done</option>
                    <option value="1" @selected($orders->is_commissioned == '1')>Done</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Order Status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select id="orderStatus" class="form-control" name="is_complete">
                  <option value="" @selected($orders->is_complete == '')>Select</option>
                  <option value="1" @selected($orders->is_complete == '1')>Complete</option>
                  <option value="0" @selected($orders->is_complete == '0')>Reject</option>
                </select>
              </div>
              <div class="col-sm-9 mb-3" id="rejectReasonContainer" style="display: none;">
                <label class="font-size-13"><strong>Reason for reject order</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="text" value="{{ $orders->rejectreason }}" name="rejectreason" class="form-control" placeholder="Enter Reason For Reject Order">
              </div>
            </div>

            <div class="container">
               <div class="row">
                    <div class="editheading">Payment Section</div>
               </div>
          </div>
          <h5>Final Payment</h5>
            <div class="row">
              <div class="col-sm-12 mb-3">
                <label class="font-size-13"><strong>Final Amount</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="number" value="{{ $orders->finalamount }}" name="finalamount" class="form-control" placeholder="Enter Final Amount">
              </div>
            </div>
            <h5>First Payment</h5>
            <div class="row">
              <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Milestone</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="text" value="{{ $orders->milestone1 }}" name="milestone1" class="form-control" placeholder="Enter Milestone">
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Amount</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="number" class="form-control" name="amount1" value="{{ $orders->amount1 }}" placeholder="Enter Amount">
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Payment Link</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="text" value="{{ $orders->paymentlink1 }}" name="paymentlink1" class="form-control" placeholder="Enter Link">
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="paymentstatus1">
                  <!-- <option value="">--Select--</option> -->
                    <option value="0" @selected($orders->paymentstatus1 == '0')>Pending</option>
                    <option value="1" @selected($orders->paymentstatus1 == '1')>Received</option>
                </select>
              </div>
            </div>
            <h5>Second Payment</h5>
            <div class="row">
              <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Milestone</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="text" value="{{ $orders->milestone2 }}" name="milestone2" class="form-control" placeholder="Enter Milestone">
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Amount</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="number" class="form-control" name="amount2" value="{{ $orders->amount2 }}" placeholder="Enter Amount">
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Payment Link</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="text" value="{{ $orders->paymentlink2 }}" name="paymentlink2" class="form-control" placeholder="Enter Link">
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="paymentstatus2">
                  <!-- <option value="">--Select--</option> -->
                    <option value="0" @selected($orders->paymentstatus2 == '0')>Pending</option>
                    <option value="1" @selected($orders->paymentstatus2 == '1')>Received</option>
                </select>
              </div>
            </div>
            <h5>Third Payment</h5>
            <div class="row">
              <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Milestone</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="text" value="{{ $orders->milestone3 }}" name="milestone3" class="form-control" placeholder="Enter Milestone">
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Amount</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="number" class="form-control" name="amount3" value="{{ $orders->amount3 }}" placeholder="Enter Amount">
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Payment Link</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="text" value="{{ $orders->paymentlink3 }}" name="paymentlink3" class="form-control" placeholder="Enter Link">
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="paymentstatus3">
                  <!-- <option value="">--Select--</option> -->
                    <option value="0" @selected($orders->paymentstatus3 == '0')>Pending</option>
                    <option value="1" @selected($orders->paymentstatus3 == '1')>Received</option>
                </select>
              </div>
            </div>
            <h5>Fourth Payment</h5>
            <div class="row">
              <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Milestone</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="text" value="{{ $orders->milestone4 }}" name="milestone4" class="form-control" placeholder="Enter Milestone">
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Amount</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="number" class="form-control" name="amount4" value="{{ $orders->amount4 }}" placeholder="Enter Amount">
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Payment Link</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="text" value="{{ $orders->paymentlink4 }}" name="paymentlink4" class="form-control" placeholder="Enter Link">
              </div>
               <div class="col-sm-3 mb-3">
                <label class="font-size-13"><strong>Status</strong> <sub class="text-danger font-size-16">*</sub></label>
                <select class="form-control" name="paymentstatus4">
                  <!-- <option value="">--Select--</option> -->
                    <option value="0" @selected($orders->paymentstatus4 == '0')>Pending</option>
                    <option value="1" @selected($orders->paymentstatus4 == '1')>Received</option>
                </select>
              </div>
            </div>
            <div class="container">
               <div class="row">
                    <div class="editheading">Operation and Maintenance Section</div>
               </div>
          </div>
            <div class="row">
              <div class="col-sm-6 mb-3">
                <label class="font-size-13"><strong>Maintenance start date</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="date" value="{{ $orders->maintenancestartdate }}" name="maintenancestartdate" class="form-control">
              </div>
               <div class="col-sm-6 mb-3">
                <label class="font-size-13"><strong>Maintenance close date</strong> <sub class="text-danger font-size-16">*</sub></label>
                <input type="date" class="form-control" name="mainclosedate" value="{{ $orders->mainclosedate }}">
              </div>
            </div>
            
            <div class="row my-3 mt-4">
            <div class="col-sm-12 text-center">
              <input type="submit" class="btn btn-primary py-2 px-3 ml-2 px-2 py-1 d-inline-block" value="Submit"/>
              <a href="{{ route('admin.quotationvisit.index') }}">
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
<style type="text/css">
     .editheading {
    border: 1px #339ea4 solid;
    padding: 5px 10px;
    color: #f6911b;
}
</style>

<script>
  document.getElementById('orderStatus').addEventListener('change', function () {
    var rejectReasonContainer = document.getElementById('rejectReasonContainer');
    if (this.value == '0') {
      rejectReasonContainer.style.display = 'block';
    } else {
      rejectReasonContainer.style.display = 'none';
    }
  });

  // Initial check to show/hide the input field based on the current selection
  window.addEventListener('DOMContentLoaded', function() {
    var orderStatus = document.getElementById('orderStatus');
    var rejectReasonContainer = document.getElementById('rejectReasonContainer');
    if (orderStatus.value == '0') {
      rejectReasonContainer.style.display = 'block';
    } else {
      rejectReasonContainer.style.display = 'none';
    }
  });
</script>

@endsection