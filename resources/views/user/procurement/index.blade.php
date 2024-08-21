@extends('app')
@section('content')
<section class="wrap user-dashboard bg-light">
    <div class="container mt-5 pt-5">
        <div class="account_dashboard">
            <div class="page-header text-center">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-9 col-lg-12">
                        <h2> My Dashboard -
                            <span class="text-warning">@if($orderdata){{$orderdata->solar_name}}@endif
                            </span>
                        </h2>
                        <div class="page-header-btns">
                            @include('user.sec-header')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="form-box">
                        @include('user.project')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    @include('user.sidebar')
                </div>
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                    <div class="form-box">
                        <form action="{{route('timeline', [$orderdata->id])}}" method="POST">
                    @csrf
                            <div class="login-white-box">
                  
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="page-header border-0 text-center">
                                            <h3>Procurement Timeline</h3>
                                        </div>
                   <!-- vertical-line -->
                                        <div class="no_of_steps ProcurementTimeline">
                                            <div class="vertical-line"></div>
                                                <div class="row">
                                                    <div class="col-6 col-sm-6 col-md-6">
                                                        <div class="timeline">
                                                            @if($orderdata->design_client_approve == '1')
                                                            <div class="timeline-dots bg-warning"></div>
                                                            @else
                                                            <div class="vertical-line"></div>
                                                            @endif
                                       <!-- <div class="timeline-dots bg-warning"></div> -->
                                                            <h6>Design Approval by client</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 col-sm-6 col-md-6">
                                                        <div class="timeline">
                                                            @if($orderdata->procurement == '1')
                                                            <div class="timeline-dots bg-warning"></div>
                                                            @else
                                                            <div class="vertical-line"></div>
                                                            @endif
                                                            <h6>Procurement</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 offset-6 col-sm-6 offset-sm-6 col-md-6 offset-md-6">
                                                        <div class="timeline timeline-rgt">
                                                            @if($orderdata->module == '1')<div class="timeline-dots"></div>
                                                            @else
                                                            <div class="vertical-line"></div>
                                                            @endif
                                       
                                                            <h6>Module</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 offset-6 col-sm-6 offset-sm-6 col-md-6 offset-md-6">
                                                        <div class="timeline timeline-rgt">
                                                            @if($orderdata->structure == '1')<div class="timeline-dots"></div>
                                                            @else
                                                            <div class="vertical-line"></div>
                                                            @endif
                                                            <h6>Structure</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 offset-6 col-sm-6 offset-sm-6 col-md-6 offset-md-6">
                                                        <div class="timeline timeline-rgt">
                                                            @if($orderdata->balancesupply == '1')<div class="timeline-dots"></div>
                                                            @else
                                                            <div class="vertical-line"></div>
                                                            @endif
                                                            <h6>Balance of Supply</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 col-sm-6 col-md-6">
                                                        <div class="timeline">
                                       <!-- <div class="timeline-dots bg-warning"></div> -->
                                                            @if($orderdata->material_ready_dis == '1')<div class="timeline-dots bg-warning"></div>
                                                            @else
                                                            <div class="vertical-line"></div>
                                                            @endif
                                                            <h6>Material Ready for Dispatch</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 offset-6 col-sm-6 offset-sm-6 col-md-6 offset-md-6">
                                                        <div class="timeline timeline-rgt">
                                       <!-- <div class="timeline-dots"></div> -->
                                                            @if($orderdata->is_payment == '1')<div class="timeline-dots"></div>
                                                            @else
                                                            <div class="vertical-line"></div>
                                                            @endif
                                                            <h6>Make Payment</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 col-sm-6 col-md-6">
                                                        <div class="timeline">
                                       <!-- <div class="timeline-dots bg-warning"></div> -->
                                                            @if($orderdata->material_dis == '1')<div class="timeline-dots bg-warning"></div>
                                                            @else
                                                            <div class="vertical-line"></div>
                                                            @endif
                                                            <h6>Material Dispatch</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 col-sm-6 col-md-6">
                                                        <div class="timeline">
                                       <!-- <div class="timeline-dots bg-warning"></div> -->
                                                            @if($orderdata->material_get == '1')<div class="timeline-dots bg-warning"></div>
                                                            @else
                                                            <div class="vertical-line"></div>
                                                            @endif
                                                            <h6>Material Received</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                            <div class="page-header border-0 text-center">
                                                <h3>Execution Timeline</h3>
                                            </div>
                                            <div class="no_of_steps">
                                                <div class="vertical-line"></div>
                                                    <div class="row">
                                                        <div class="col-6 col-sm-6 col-md-6">
                                                            <div class="timeline">
                                                   <!-- <div class="timeline-dots"></div> -->
                                                            @if($orderdata->mms == '1')<div class="timeline-dots"></div>
                                                            @else
                                                            <div class="vertical-line"></div>
                                                            @endif
                                                            <h6>Structure MMS Installation</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 col-sm-6 col-md-6">
                                                            <div class="timeline">
                                                                @if($orderdata->module_install == '1')<div class="timeline-dots"></div>
                                                                @else
                                                                <div class="vertical-line"></div>
                                                                @endif
                                                                <h6>Module Installation</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 col-sm-6 col-md-6">
                                                            <div class="timeline">
                                                                @if($orderdata->invert_install == '1')<div class="timeline-dots"></div>
                                                                @else
                                                                <div class="vertical-line"></div>
                                                                @endif
                                                                <h6>Inverter Installation</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 col-sm-6 col-md-6">
                                                            <div class="timeline">
                                                                @if($orderdata->dcdbacdb == '1')<div class="timeline-dots"></div>
                                                                @else
                                                                <div class="vertical-line"></div>
                                                                @endif
                                                                <h6>DCDB and ACDB Installation</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 col-sm-6 col-md-6">
                                                            <div class="timeline">
                                                                @if($orderdata->cabling == '1')<div class="timeline-dots"></div>
                                                                @else
                                                                <div class="vertical-line"></div>
                                                                @endif
                                                                <h6>Cabling</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 col-sm-6 col-md-6">
                                                            <div class="timeline">
                                                                @if($orderdata->earthLight == '1')<div class="timeline-dots"></div>
                                                                @else
                                                                <div class="vertical-line"></div>
                                                                @endif
                                                                <h6>Earthing and Lighting Arrestor</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 col-sm-6 col-md-6">
                                                            <div class="timeline">
                                                                @if($orderdata->qualityCheck == '1')<div class="timeline-dots"></div>
                                    @else
                                    <div class="vertical-line"></div>
                                    @endif
                                   <h6>Quality Check</h6>
                                   </div>
                                   </div>
                               </div>
                               <div class="row">
                               <div class="col-6 col-sm-6 col-md-6">
                                   <div class="timeline">
                                       @if($orderdata->chargingtest == '1')<div class="timeline-dots"></div>
                                    @else
                                    <div class="vertical-line"></div>
                                    @endif
                                   <h6>Test Charging</h6>
                                   </div>
                                   </div>
                               </div>
                               <div class="row">
                               <div class="col-6 col-sm-6 col-md-6">
                                   <div class="timeline">
                                       @if($orderdata->netmetering == '1')<div class="timeline-dots"></div>
                                    @else
                                    <div class="vertical-line"></div>
                                    @endif
                                   <h6>Net Metering</h6>
                                   </div>
                                   </div>
                               </div>
                               <div class="row">
                               <div class="col-6 col-sm-6 col-md-6">
                                   <div class="timeline">
                                       @if($orderdata->completecheck == '1')<div class="timeline-dots"></div>
                                    @else
                                    <div class="vertical-line"></div>
                                    @endif
                                   <h6>Completion Check</h6>
                                   </div>
                                   </div>
                               </div>
                               
                           </div>
                            </div>
                            </div>
                    
                 <div class="form-group">
               <label>Remark</label>
               @if(isset($orderdata->timelineRemark))
               <p>{{$orderdata->timelineRemark}}</p>
               @else
                   <textarea rows="6" class="form-ctrl form-control" placeholder="Enter" name="timelineRemark">{{$orderdata->timelineRemark}}</textarea>
                   @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                    @endif
               </div>
                   <div class="row justify-content-center mt-4">
                              <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                           <button type="submit" class="btn btn-warning btn-radius btn-submit btn-block">Submit</button>
                               </div>
                           </div>
               </div>
                   </form>
               </div>
               </div>
           </div>
      
      </div> 
		</div>
    </section>
@endsection