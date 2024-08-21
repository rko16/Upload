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
                      <li class="breadcrumb-item"><a href="{{ route('subadmin.order.index') }}">Order</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Visit Order</li>
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
                            <th>S.no.</th>
                            <th>Date</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email id</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Project Capacity</th>
                            <th>Type of Installation</th>
                            <th>Type of Rooftop</th>
                            <th>Status</th>
                            <th>Project Cost</th>
                            <th>Payment Stage</th>
                            <th>Balance Amount Received</th>
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
            url: '{{ route('subadmin.visitorder.index') }}',
            type: 'GET'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            {
                data: 'created_at',
                name: 'created_at',
                render: function (data, type, row) {
                    if (data) {
                        var date = new Date(data);
                        return date.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
                    }
                    return '';
                }
            },
            { data: 'id', name: 'id' },
            { data: 'user_name', name: 'user_name' },
            { data: 'monumber', name: 'monumber' },
            { data: 'email', name: 'email' },
            {
                data: 'citydata.name',
                name: 'citydata.name',
                render: function (data, type, row) {
                    if (row.citydata && row.citydata.name) {
                        return row.citydata.name;
                    } else {
                        return '';
                    }
                }
            },
            {
                data: 'statedata.name',
                name: 'statedata.name',
                render: function (data, type, row) {
                    if (row.statedata && row.statedata.name) {
                        return row.statedata.name;
                    } else {
                        return '';
                    }
                }
            },
            { data: 'capacity', name: 'capacity' },
            {
                data: 'installation_type',
                name: 'installation_type',
                render: function (data, type, row) {
                    if (row.installation_type == '1') {
                        return "Home";
                    } else if (row.installation_type == '2') {
                        return "Office";
                    } else if (row.installation_type == '3') {
                        return "Housing society";
                    } else if (row.installation_type == '4') {
                        return "Industry";
                    } else {
                        return "";
                    }
                },
                orderable: false,
                searchable: false
            },
            {
                render: function (data, type, row) {
                    if (row.rooftop_type == '1') {
                        return "RCC";
                    } else if (row.rooftop_type == '2') {
                        return "Metal Sheet";
                    } else if (row.rooftop_type == '3') {
                        return "Other";
                    } else {
                        return "";
                    }
                },
                orderable: false,
                searchable: false
            },
            {
                render: function (data, type, row) {
                    if (row.is_surveyDone == '1' && row.is_designSent == '0' && row.is_proposalSent == '0' && row.is_procurementOngoing == '0' && row.is_executionOngoing == '0' && row.is_govApprov == '0' && row.is_commissioned == '0') {
                        return "Survey Done";
                    }else if (row.is_surveyDone == '1' && row.is_designSent == '1' && row.is_proposalSent == '0' && row.is_procurementOngoing == '0' && row.is_executionOngoing == '0' && row.is_govApprov == '0' && row.is_commissioned == '0') {
                        return "Design Sent";
                    }else if (row.is_surveyDone == '1' && row.is_designSent == '1' && row.is_proposalSent == '1' && row.is_procurementOngoing == '0' && row.is_executionOngoing == '0' && row.is_govApprov == '0' && row.is_commissioned == '0') {
                        return "Proposal Sent";
                    }else if (row.is_surveyDone == '1' && row.is_designSent == '1' && row.is_proposalSent == '1' && row.is_procurementOngoing == '1' && row.is_executionOngoing == '0' && row.is_govApprov == '0' && row.is_commissioned == '0') {
                        return "Procurement Ongoing";
                    }else if (row.is_surveyDone == '1' && row.is_designSent == '1' && row.is_proposalSent == '1' && row.is_procurementOngoing == '1' && row.is_executionOngoing == '1' && row.is_govApprov == '0' && row.is_commissioned == '0') {
                        return "Execution Ongoing";
                    }else if (row.is_surveyDone == '1' && row.is_designSent == '1' && row.is_proposalSent == '1' && row.is_procurementOngoing == '1' && row.is_executionOngoing == '1' && row.is_govApprov == '1' && row.is_commissioned == '0') {
                        return "Government Approval";
                    }else if (row.is_surveyDone == '1' && row.is_designSent == '1' && row.is_proposalSent == '1' && row.is_procurementOngoing == '1' && row.is_executionOngoing == '1' && row.is_govApprov == '1' && row.is_commissioned == '1') {
                        return "Commissioned";
                    }else{
                        return "";
                    }
                },
                orderable: false,
                searchable: false
            },
            { data: 'finalamount', name: 'finalamount' },
            {
                data: 'finalamount',
                name: 'finalamount',
                render: function (data, type, row) {
                    if (row.paymentstatus1 == '1' && row.paymentstatus2 == '0' && row.paymentstatus3 == '0' && row.paymentstatus4 == '0') {
                        return "1st Milestone";
                    }else if (row.paymentstatus1 == '1' && row.paymentstatus2 == '1' && row.paymentstatus3 == '0' && row.paymentstatus4 == '0') {
                        return "2nd Milestone";
                    }else if (row.paymentstatus1 == '1' && row.paymentstatus2 == '1' && row.paymentstatus3 == '1' && row.paymentstatus4 == '0') {
                        return "3rd Milestone";
                    }else if (row.paymentstatus1 == '1' && row.paymentstatus2 == '1' && row.paymentstatus3 == '1' && row.paymentstatus4 == '1') {
                        return "Full Payment";
                    }else{
                        return "";
                    }
                },
                orderable: false,
                searchable: false
            },
            {
                render: function (data, type, row) {
                    var amount1 = Number(row.amount1) || 0;
                    var amount2 = Number(row.amount2) || 0;
                    var amount3 = Number(row.amount3) || 0;
                    var amount4 = Number(row.amount4) || 0;
                    
                    var sum = amount1 + amount2 + amount3 + amount4;
                    return sum;
                },
                orderable: false,
                searchable: false
            },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        pageLength: 10, // Set default number of rows per page
                lengthMenu: [
                    [1, 5, 10, 25, 50, 100, -1],
                    [1, 5, 10, 25, 50, 100, "All"]
                ],
                dom: 'lBfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Visit Orders Export',
                        text: 'Export to Excel',
                        className: 'btn btn-danger',
                        exportOptions: {
                            modifier: {
                                page: 'all' // Export all pages
                            },
                            columns: ':visible:not(:last-child)' // Exclude the last column from export
                        }
                    }
                ]
    });

    $('.data-table').on('click', '.status-toggle', function() {
        var userId = $(this).data('id');
        var newStatus = $(this).data('status');
        $.ajax({
            url: "{{ route('subadmin.order.toggleStatus') }}",
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
