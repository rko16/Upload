@extends('layouts.admins.app')
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
				      <li class="breadcrumb-item active" aria-current="page">Project manager</li>
				    </ol>
				 </nav>
				<a href="{{ route('admin.pm.create') }}" class="btn btn-primary toolbar-item ml-auto">Add Project manager</a>
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
					      <th> Name </th>
					      <th> Email id </th>
					      <th>Total Leads Assigned</th>
					      <th>Quotation Sent</th>
					      <th>Qualified / Closed</th>
					      <th>Total Project Cost</th>
					      <th>Advance Received</th>
					      <th> Status </th>
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
        ajax: "{{ route('admin.pm.getdata') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'solar_inquiry_count', name: 'solar_inquiry_count'},
            {data: 'quotation', name: 'quotation'},
            {data: 'is_complete', name: 'is_complete'},
            {data: 'total_finalamount', name: 'total_finalamount'},
            {data: 'amount1', name: 'amount1'},
            {data: 'status', name: 'status', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

	$('.data-table').on('click', '.status-toggle', function() {
        var userId = $(this).data('id');
        var newStatus = $(this).data('status');
        $.ajax({
            url: "{{ route('admin.users.toggleStatus') }}",
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: userId,
                status: newStatus
            },
            success: function(response) {
                table.ajax.reload();
            }
        });
    });

});
</script>
@endsection

