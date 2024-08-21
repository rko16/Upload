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
                   <div class="page-header border-0 text-center">
                   <h3>My Profile</h3>
                   </div>
                   
                   <div class="row">
                   <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                   <div class="profile-info">
                       <p class="mb-1">User ID:</p>
                       <h5>{{ auth()->user()->id }}</h5>
                       </div>
                   </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                   <div class="profile-info">
                       <p class="mb-1">Name:</p>
                       <h5>{{ auth()->user()->name }}</h5>
                       </div>
                   </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                   <div class="profile-info">
                       <p class="mb-1">Gender: </p>
                       @if(auth()->user()->gender == '1')
                       <h5>Male</h5>
                       @elseif(auth()->user()->gender == '0')
                       <h5>Female</h5>
                       @else(auth()->user()->gender == '')
                       <h5></h5>
                       @endif
                       </div>
                   </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                   <div class="profile-info">
                       <p class="mb-1">Mobile No:</p>
                       <h5>{{ auth()->user()->number }}</h5>
                       </div>
                   </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                   <div class="profile-info">
                       <p class="mb-1">Email Id:</p>
                       <h5>{{ auth()->user()->email }}</h5>
                       </div>
                   </div>
                       <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                   <div class="profile-info">
                       <a href="{{ route('editprofile') }}" class="btn btn-warning btn-radius btn-submit btn-block">Edit Profile</a>
                       </div>
                   </div>
                   </div>
               </div>
               </div>
           </div>
      
      </div> 
		</div>
    </section>
@endsection