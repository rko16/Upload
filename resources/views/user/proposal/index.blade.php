@extends('app')
@section('content')
<section class="wrap user-dashboard bg-light">
    <div class="container mt-5 pt-5">
        
       <div class="account_dashboard">
           <div class="page-header text-center">
            <div class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-12">
                 <h2>My Dashboard - <span class="text-warning">
                    @if($orderdata){{$orderdata->solar_name}}@endif
                    </span></h2>
                <div class="page-header-btns">
                @include('user.sec-header')
                </div>
                </div>
            
            </div>
          </div>
           <div class="row">
           <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
               @include('user.sidebar')
               </div>
           <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
               <div class="form-box">
                   <form action="{{route('proposalremark', [$orderdata->id])}}" method="POST">
                    @csrf
               <div class="login-white-box">
                   <div class="page-header border-0 text-center">
                   <h3>Proposal </h3>
                   </div>
                   <div class="form-group">
                    <p class="mb-0 fw-bold">Proposal Details:</p>
                  <p>{{$orderdata->proposal}}</p>
                            </div>
                   <div class="row justify-content-between">
                       <div class="col-6 col-sm-4 col-md-5 col-lg-4 col-xl-3">
                           <div class="hygge-man-img">
                            @if(isset($orderdata->proposal_img))
                   <img class="img-fluid m-auto rounded" src="{{asset($orderdata->proposal_img)}}"/>
                   @else
                   <p>Not upload yet</p>
                   @endif
                   </div>
                   @if(isset($orderdata->proposal_date))
                           <p class="small text-center mb-1">{{ optional($orderdata->proposal_date)->format('d M Y') }}</p>
                    @endif
                           <div class="form-group text-center">
                            @if(isset($orderdata->proposal_img))
                           <button type="button" class="btn btn-info btn-radius btn-submit" onclick="window.location.href='{{ route('downloadproposal', [$orderdata->id]) }}'">Download & View</button>
                   @endif
                           </div>
                   </div>
                       <div class="col-6 col-sm-5 col-md-6 col-lg-6 col-xl-5">
                       <div class="hygge-man-img">
                   <img class="img-fluid m-auto" src="{{asset('asset2/images/3d-hygge-man-measuring-img.png')}}"/>
                   </div>
                       </div>
                   </div>
                   <div class="page-header border-0 mt-5 text-center">
                   <h3>Order Status:  <span class="text-danger">
                    @if($orderdata->is_ordered == '1' && $orderdata->is_visited == '0' && $orderdata->is_quotation == '0' && $orderdata->is_complete == '0')
                                Ordered
                        @endif
                        @if($orderdata->is_ordered == '1' && $orderdata->is_complete == '0')
                                On process
                        @endif
                        <!-- @if($orderdata->is_ordered == '1' && $orderdata->is_visited == '1' && $orderdata->is_quotation == '1' && $orderdata->is_complete == '0')
                                On 2 process
                        @endif -->
                        @if($orderdata->is_ordered == '1' && $orderdata->is_visited == '1' && $orderdata->is_quotation == '1' && $orderdata->is_complete == '1')
                                Completed
                        @endif
                    </span> </h3>
                   </div>
                   <!-- <div class="form-group">
               <label>Remark</label>
                   <textarea rows="6" name="proposal_remark" class="form-ctrl form-control" placeholder="Enter">{{$orderdata->proposal_remark ? $orderdata->proposal_remark : 'Enter'}}</textarea>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                    @endif
               </div> -->
               <div class="form-group">
               <label>Remark</label>
               @if(isset($orderdata->proposal_remark))
               <p>{{$orderdata->proposal_remark}}</p>
               @else
                   <textarea rows="6" name="proposal_remark" class="form-ctrl form-control" placeholder="Enter">{{$orderdata->proposal_remark ? $orderdata->proposal_remark : 'Enter'}}</textarea>
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