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
                    <a href="{{ route('subadmin.visitorder.index') }}">Order</a>
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
          <table class="table">
            <tbody>
              <tr>
                <td>User name</td>
                <td>{{ $orders->userdata->name }}</td>
              </tr>
              <tr>
                <td>Monthly Bill</td>
                <td>
                  @if( $orders->monthlyBill == '' )
                      Need to visit
                  @else
                      {{ $orders->monthlyBill }}
                  @endif
                </td>
              </tr>
              <tr>
                <td>Electricity Cost</td>
                <td>
                  @if( $orders->electricityCost == '' )
                      Need to visit
                  @else
                      {{  $orders->electricityCost }}
                  @endif
                </td>
              </tr><tr>
                <td>Generation</td>
                <td>
                  @if( $orders->generation == '' )
                      Need to visit
                  @else
                      {{ $orders->generation }}
                  @endif
                </td>
              </tr>
              <tr>
                <td>capacity</td>
                <td>
                  @if( $orders->capacity == '' )
                      Need to visit
                  @else
                      {{ $orders->capacity }}
                  @endif
                </td>
              </tr>
              <tr>
                <td>space</td>
                <td>
                  @if( $orders->space == '' )
                      Need to visit
                  @else
                      {{ $orders->space }}
                  @endif
                </td>
              </tr>
              <tr>
                <td>Green Energy</td>
                <td>
                  @if( $orders->greenEnergy == '' )
                      Need to visit
                  @else
                      {{ $orders->greenEnergy }}
                  @endif
                </td>
              </tr>
              <tr>
                <td>Annual Savings</td>
                <td>
                  @if( $orders->annualSavings == '' )
                      Need to visit
                  @else
                      {{ $orders->annualSavings }}
                  @endif
                </td>
              </tr>
              <tr>
                <td>price</td>
                <td>
                  @if( $orders->price == '' )
                      Need to visit
                  @else
                      {{ $orders->price }}
                  @endif
                </td>
              </tr>
              <tr>
                <td>is_ordered</td>
                <td>
                  @if( $orders->is_ordered == '' )
                      Need to order
                  @else
                      Order
                  @endif
                </td>
              </tr>
              <tr>
                <td>Visite status</td>
                <td>
                  @if( $orders->is_visited == '' )
                      Need to visit
                  @else
                      Visited
                  @endif
                </td>
              </tr>
              <tr>
                <td>Visit date</td>
                <td>
                  @if( $orders->visited_date == '' )
                    Not Available Yet !
                  @else
                    {{ $orders->visited_date }}
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
          <div class="row my-3 mt-4">
            <div class="col-sm-12 text-center">
              <a href="{{ route('subadmin.visitorder.index') }}">
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