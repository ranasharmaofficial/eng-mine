@extends('admin.include.master')
@section('title', 'Customer Lead List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="breadcrumb mt-3 border-bottom pb-2">
                        <a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>/Customer Lead
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body booking_card">

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title float-left mt-2">Customer Lead List</h4>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Conatct</th>
                                        <th>Message</th>
                                        <th>Created At</th>                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leads as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->contact }}</td>
                                        <td>{{ $value->message }}</td>
                                        <td>{{ convert_datetime_to_date_format($value->created_at, 'd M Y') }}</td>                                        <td>											<form id="lead-delete" class="d-flex mt-1" method="POST">												@csrf												<input type="hidden" name="user_id" value="{{ $value->id }}">												<button type="button" class="btn btn-danger p-1 delete_lead">Delete</button>											</form>										</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination mt-3">
                                {{ $leads->appends(request()->input())->links() }}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> <script src="https://code.jquery.com/jquery-3.4.1.js"></script><script type="text/javascript">	$(document).on('click', '.delete_lead', function(e) {        e.preventDefault();        var formData = new FormData(document.getElementById("lead-delete"));        $.ajaxSetup({            headers: {                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')            }        });		if(confirm("Are you sure you want to delete this?")){			$.ajax({				type: "POST",				url: "{{ route('admin.deleteCustomerLead') }}",				data: formData,				processData: false,				contentType: false,				dataType: "JSON",				success: function(data) {					// console.log('status ' + data.status);					if (data.status == true) {						toastr.error('Deleted Successfully.');						setTimeout(function() {							window.location = "{{ url('admin/customer/leads') }}"						}, 2000);					} else {						toastr.error('Something went wrong.');					}				},				error: function(err) {					document.getElementById('show-form-error').style = "display: block";					let error = err.responseJSON;					$.each(error.errors, function(index, value) {						$('.errorMsgntainer').append('<span class="text-danger">' + value + '<span>' + '<br>');					});				}			});		}else{			return false;		}    });</script>
@endsection

