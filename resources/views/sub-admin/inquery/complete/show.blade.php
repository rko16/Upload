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
                  @if( $orders->is_ordered == '0' )
                      Need to order
                  @else
                      Order
                  @endif
                </td>
              </tr>
              <tr>
                <td>Visite status</td>
                <td>
                  @if( $orders->is_visited == '0' )
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
              <tr>
                <td>Quotation status</td>
                <td>
                  @if( $orders->is_quotation == '0' )
                      Waiting
                  @else
                      Given
                  @endif
                </td>
              </tr>
              <tr>
                <td>Quotation date</td>
                <td>
                  @if( $orders->quotation_date == '' )
                    Not Available Yet !
                  @else
                    {{ $orders->quotation_date }}
                  @endif
                </td>
              </tr>
              <tr>
                <td>Design plan</td>
                <td>
                  @if( $orders->design_plan == '' )
                      Not Available Yet !
                    @else
                      {{ $orders->design_plan }}
                    @endif
                </td>
              </tr>
              <tr>
                <td>Milestone plan</td>
                <td>
                  @if( $orders->milestone_plan == '' )
                      Not Available Yet !
                    @else
                      {{ $orders->milestone_plan }}
                    @endif
                </td>
              </tr>
              <tr>
                <td>Information</td>
                <td>
                  @if( $orders->info == '' )
                      Not Available Yet !
                    @else
                      {{ $orders->info }}
                    @endif
                </td>
              </tr>
              <tr>
                <td>Quotation(Amount)</td>
                <td>
                  @if( $orders->quotation == '' )
                      Not Available Yet !
                    @else
                      {{ $orders->quotation }}
                    @endif
                </td>
              </tr>
              <tr>
                  <td>Design Image</td>
                  <td>
                      @if( $orders->design_img == '' )
                          Not Available Yet !
                      @else
                          <img src="{{ asset($orders->design_img) }}" style="height: auto; width: auto;">
                      @endif
                  </td>
              </tr>
            </tbody>
          </table>
          <div class="row my-3 mt-4">
            <div class="col-sm-12 text-center">
              <a href="{{ route('subadmin.complete.index') }}">
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