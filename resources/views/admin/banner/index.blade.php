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
				      <li class="breadcrumb-item active" aria-current="page">Banner</li>
				    </ol>
				 </nav>
				<a href="{{ route('admin.banner.create') }}" class="btn btn-primary toolbar-item ml-auto">Add Banner</a>
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
					      <th> Banner Image </th>
					      <!-- <th> Text </th>
					      <th> Url </th> -->
					      <th> Active </th>
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
        ajax: "{{ route('admin.banner.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'image', name: 'image', orderable: false, searchable: false},
            // {data: 'text', name: 'text'},
            // {data: 'url', name: 'url'},
            {data: 'status', name: 'status', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('.data-table').on('click', '.status-toggle', function() {
        var userId = $(this).data('id');
        var newStatus = $(this).data('status');
        $.ajax({
            url: "{{ route('admin.banner.toggleStatus') }}",
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