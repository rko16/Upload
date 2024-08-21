@extends('app')
@section('content')
<section class="wrap user-dashboard bg-light">
    <div class="container mt-5 pt-5">
       <div class="account_dashboard">
           <div class="page-header text-center">
            <div class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-12">
                 <h2>My Dashboard <span class="text-warning">
                 	@if($orderdata){{$orderdata->solar_name}}@endif
                 	</span></h2>
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
               <!-- <div class="form-group">
				   <select class="form-ctrl form-control" onchange="location = this.value;">
				     <option value="">Select</option>
				     @foreach($orders as $order)
				          <option value="{{ route('getorderdesign', [$order->id]) }}">Project {{ $order->id }}</option>
				     @endforeach
				   </select>
				</div> -->
               </div>
               </div>
               </div>
           <div class="row">
           <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
               @include('user.sidebar')
               </div>
           <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
           	@if($orderIMG)
               <div class="form-box">
                   <form action="{{route('proposal', [$orderdata->id])}}">
               <div class="login-white-box">
                   <div class="page-header border-0 text-center">
                   <h3>Survey &amp; Design</h3>
                   </div>
                   <div class="row justify-content-center">
                   <div class="col-6 col-sm-5 col-md-4  col-lg-4 col-xl-3">
                   <div class="form-group text-center">
                    <h6>Survey Photos</h6>
                       <div class="servy-item m-auto">
                           <!-- <img src="{{asset('asset2/images/servy-img.jpg')}}"> -->
                           @if(isset($orderIMG->surveyphoto))
                       <div class="mb-2">
                           <img src="{{asset($orderIMG->surveyphoto)}}" style="height: 150px; width: 150px;">
                        </div>
                       <a class="btn btn-info d-block w-100 mt-1" href="{{route('loadsurveyphoto', [$orderIMG->id])}}">Download </a>
                           @else
                           <p>Not uploaded yet</p>
                           @endif
                            </div>
                            </div>
                   </div>
                       <div class="col-6 col-sm-5 col-md-4 col-lg-4 col-xl-3">
                   <div class="form-group text-center">
                    <h6>Design PDF</h6>
                       <div class="servy-item m-auto">
                            @if(isset($orderIMG->surveypdf))
                           <!-- <img src="{{asset($orderIMG->surveypdf)}}"> -->
                        <div class="mb-2">
                           <img src="{{asset('asset2/images/pdf.png')}}" style="height: 150px; width: 150px;">
                            </div>
                        <a class="btn btn-info d-block w-100 mt-1" href="{{route('loadsurveypdf', [$orderIMG->id])}}">Download PDF</a>
                           @else
                           <p>Not uploaded yet</p>
                           @endif
                            </div>
                            </div>
                   </div>
                   </div>
                    
                   
                   <div class="row justify-content-center pt-5">
                       <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                        <button type="submit" class="btn btn-warning btn-radius btn-submit btn-block" onclick="window.location.href='{{ route('proposal',[$orderdata->id]) }}'">Next</button>
                   </div> 
                   </div>
               </div>
                   </form>
               </div>
               @else
               		<p>Select project</p>
               @endif
               </div>
           </div>
      
      </div> 
		</div>
    </section>
@endsection