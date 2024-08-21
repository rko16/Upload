@extends('app')
@section('content')
<section class="wrap user-dashboard bg-light">
    <div class="container mt-5 pt-5">
        <div class="account_dashboard">
            <div class="page-header text-center">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-9 col-lg-12">
                        <h2>My Dashboard <span class="text-warning">@if($orderdata){{$orderdata->solar_name}}@endif</span></h2>
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
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="login-white-box">
                        <div class="page-header border-0 mb-2 text-center">
                            <h3 class="mb-0">Payment</h3>
                        </div>
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Milestone</th>
                                    <th>Amount</th>
                                    <th>Payment Link</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @if($orderdata->paymentstatus1 == '1')
        	                    <tr>
        	                        <td>{{ ++$i }}</td>
                                    <td>{{$orderdata->milestone1}}</td>
          	                        <td><b class="text-success">{{$orderdata->amount1}}</b></td>
          	                        <td>{{$orderdata->paymentlink1}}</td>
          	                        <td><b class="text-success">Received</b></td>
          	                    </tr>
                                @endif
                                @if($orderdata->paymentstatus2 == '1')
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$orderdata->milestone2}}</td>
                                    <td><b class="text-success">{{$orderdata->amount2}}</b></td>
                                    <td>{{$orderdata->paymentlink2}}</td>
                                    <td><b class="text-success">Received</b></td>
                                </tr>
                                @endif
                                @if($orderdata->paymentstatus3 == '1')
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$orderdata->milestone3}}</td>
                                    <td><b class="text-success">{{$orderdata->amount3}}</b></td>
                                    <td>{{$orderdata->paymentlink3}}</td>
                                    <td><b class="text-success">Received</b></td>
                                </tr>
                                @endif
                                @if($orderdata->paymentstatus4 == '1')
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$orderdata->milestone4}}</td>
                                    <td><b class="text-success">{{$orderdata->amount4}}</b></td>
                                    <td>{{$orderdata->paymentlink4}}</td>
                                    <td><b class="text-success">Received</b></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>  
                        <div class="page-header border-0 mt-2 text-end">
                            @if(isset($orderdata->finalamount))
                            <h3 class="mb-0">Final Payment:{{$orderdata->finalamount}}</h3>
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
        </div> 
	</div>
</section>
@endsection