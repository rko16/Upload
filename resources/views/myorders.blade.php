@extends('app')
@section('content')

<section class="wrap user-dashboard bg-light">
    <div class="container mt-5 pt-4">
        <div class="page-header">
               <h2>My Account</h2>
          </div>
       <div class="account_dashboard profile_dashboard">
           <div class="row">
           <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
               @include('sideheader')
           </div>
           <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
               <div class="login-white-box">
                   <div class="page-header text-center">
                   <h3>My Orders</h3>
                   </div>
                   @foreach($orders as $order)
	                   <div class="order-card">
	                       <div class="row">
	                   <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
	                   <div class="row">
	                   <div class="col-6 col-sm-6 col-md-6 col-lg-3">
	                   <div class="profile-info">
	                       <p class="small mb-1"><strong>Order Id:</strong></p>
	                       <p>{{ $order->id }}</p>
	                       </div>
	                   </div>
	                    <div class="col-6 col-sm-6 col-md-6 col-lg-3">
	                   <div class="profile-info">
	                        <p class="small mb-1"><strong>Order Date:</strong></p>
	                        <p>
	                       		@if($order->order_date != '')
	                       		{{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}
	                       		@endif
	                       	</p>
	                       </div>
	                   </div>
	                    <div class="col-6 col-sm-6 col-md-6 col-lg-3">
	                   <div class="profile-info">
	                       <p class="small mb-1"><strong>Order placed on date:</strong></p>
	                       <p>{{ $order->place_date }}</p>
	                       </div>
	                   </div>
	                     <div class="col-6 col-sm-6 col-md-6 col-lg-3">
	                   <div class="profile-info">
	                       <p class="small mb-1"><strong>Order Status:</strong></p>
	                       <p><a class="text-warning" href="{{ route('plan',[$order->id]) }}"><strong>View plan</strong></a></p>
	                       </div>
	                   </div>
	                       <div class="col-12 col-sm-12 col-md-12 col-lg-12">
	                   <div class="profile-info mb-0">
	                       <p class="mb-0"><a class="text-warning" href="#"><strong>Download</strong></a> your Plan Is ready to view</p>
	                       </div>
	                   </div>
	                   </div>
	                   </div>
                           <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 order-btns">
                           	@if( $order->is_ordered == '0' )
		                        <a href="{{ route('order.inqury',[$order->id]) }}" class="btn btn-success mb-2 btn-radius btn-block">Accept</a>
		                    @else
		                        <p class="btn btn-danger btn-radius btn-block">Reject</p>
		                    @endif
                        	</div>
	                   </div>
	                   </div>
                   @endforeach
               </div>
               </div>
           </div>
      
      </div> 
		</div>
    </section>

@endsection