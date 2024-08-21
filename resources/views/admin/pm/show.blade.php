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
	                <a href="{{ route('admin.pm.index') }}">Project manager</a>
	              </li>
	              <li class="breadcrumb-item active" aria-current="page">Manage Project manager</li>
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
	                <td>User name</td>
	                <td>@if( $users->name == '' )
						  Not Available Yet !
						@else
						  {{ $users->name }}
						@endif
	              	</td>
	              </tr>
	              <tr>
	                <td> Mobile number </td>
	                <td> @if( $users->number == '' || $users->number == '0' )
						  Not Available Yet !
						@else
						  {{ $users->number }}
						@endif
	                </td>
	              </tr>
	              <tr>
	                <td>Email ID</td>
	                <td> @if( $users->email == '' )
						  Not Available Yet !
						@else
						  {{ $users->email }}
						@endif
	                </td>
	              </tr>
	              <tr>
	                  <td>Image</td>
	                  <td>
	                      @if( $users->avatar == '' )
	                          Not Available Yet !
	                      @else
	                          <img src="{{ asset($users->avatar) }}" style="height: auto; width: auto;">
	                      @endif
	                  </td>
	              </tr>
	            </tbody>
          </table>
	      <div class="row my-3 mt-4">
            <div class="col-sm-12 text-center">
              <a href="{{ route('admin.pm.index') }}">
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