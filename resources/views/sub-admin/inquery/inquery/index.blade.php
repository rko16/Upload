@extends('layouts.sub-admin.app')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="content-wrapper">
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header border-0 pb-0 mb-0">
                <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap bg-white p-2 border">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-inverse-primary py-0 px-2 mb-0">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Inquery</li>
                    </ol>
                 </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body p-3">
                    <table class="table table-bordered table-hover data-table">
					  <thead class="thead-dark">
					    <tr>
                          <th> ID </th>
                          <th> User Name </th>
                          <th> Number </th>
                          <th> Bill </th>
                          <th> Unit Cost </th>
                          <th> State </th>
                          <th> Price </th>
                          <th> Capacity(kwp) </th>
                          <th> Space(sqft) </th>
                          <th class="action"> Action </th>
                        </tr>
					  </thead>
					  <tbody>
					  </tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('subadmin.inquery.index') }}',
            type: 'GET'
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'userdata.name', name: 'userdata.name'},
            {data: 'userdata.number', name: 'userdata.number'},
            {data: 'monthlyBill', name: 'monthlyBill'},
            {data: 'electricityCost', name: 'electricityCost'},
            {data: 'statename.name', name: 'statename.name'},
            {data: 'price', name: 'price'},
            {data: 'capacity', name: 'capacity'},
            {data: 'space', name: 'space'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>
@endsection
