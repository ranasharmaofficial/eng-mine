@extends('admin.include.master')

@section('title', 'Customer List')

@section('content')


<div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header mb-0 pt-3">
        <div class="row align-items-center">
          <div class="col">
            <div class="breadcrumb ">
              <a href="{{ url('admin/dashboard') }}">
                <i class="fa fa-home" aria-hidden="true"></i> Dashboard </a> / Customer List
            </div>
          </div>
          {{--<div class="col">
            <a href="{{ url('admin/engineer-list/create') }}" class="btn btn-info float-right veiwbutton">
              <i class="fa fa-plus" aria-hidden="true"></i> Add New Engineer List </a>
          </div>--}}
        </div>
      </div>
      <hr>
      <div class="main-panel card-header ">
        <div class="row gutters-5 align-items-center">
          <div class="col">
            <h5 class="mb-md-0 h6">Customer List</h5>
          </div>
          <div class="col text-right">
            <a href="{{ route('admin.customerExport') }}" class="btn btn-circle btn-info h-35" download>
              <span>Export in Excel</span>
            </a>
          </div>
           
           
        </div>
        <hr>
        <form method="get" action="">
          <div class="input-group mb-3 search-filter">
            <input type="text" name="username" class="form-control mr-1 rounded" placeholder="Customer Id" value="{{ $request->username }}">
            <input type="text" name="mobile" class="form-control mx-1 rounded" placeholder="Mobile Number" value="{{ $request->mobile }}">
            <input type="text" name="email" class="form-control mx-1 rounded" placeholder="  Email Id" value="{{ $request->email }}">
            <input type="text" name="name" class="form-control mx-1 rounded" placeholder="  Name" value="{{ $request->name }}">
            <input type="text" name="date_from" class="form-control mx-1 rounded" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Start date" value="{{ $request->date_from }}">
            <input type="text" name="date_to" class="form-control mx-1 rounded" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="End date" value="{{ $request->date_to }}">
            <button type="submit" class="btn btn-primary btn-icon-text h-35">
              <i class="ti-file btn-icon-prepend"></i> Search </button>
          </div>
        </form>
        <hr>
        <div class="table-responsive">
          <table class="table table-striped fs-13 lsp-5">
            <thead>
              <tr>
                <th> Customer Id </th>
                <th> First Name </th>
                <th> last Name </th>
                <th> Email </th>
                <th> Mobile No. </th>
                <th> No Of Booking </th>
                <th> State </th>
                <th> City </th>
                <th> Address </th>
                <th> Status </th>
                <th> Registration Date </th>
                 
              </tr>
            </thead>
            <tbody> 
		@foreach($customer_list as $key => $item) 
			@php
				$noOfBooking = \App\Models\Order::where('user_id', $item->id)->count();
			@endphp
			<tr>
                <td class="py-1">  {{ $item->username }} </td>
                <td class="py-1"> {{ $item->first_name }} </td>
                <td>{{ $item->last_name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->mobile }}</td>
                <td>{{ $noOfBooking }}</td>
                <td>{{ $item->stateName }}</td>
                <td>{{ $item->cityName }}</td>
                <td>{{ $item->address }}, {{ $item->cityName }}, {{ $item->stateName }}, {{ $item->countryName }}-{{ $item->pincode }}</td>
                <td>
                  <select class="change_status bg-warning text-white" name="status" data-user_id="{{$item->id}}">
                    <option value="1" class="text-success" @if($item->status == 1) selected @endif>Active</option>
                    <option value="0" class="text-danger" @if($item->status == 0) selected @endif>Inactive</option>
                  </select>
                </td>
                 
                <td>
                  {{ date('d-M-Y', strtotime($item->created_at)) }}
                </td>
                <td>
				{{--<a class="btn btn-primary p-1 mx-1" href="{{ url('admin/engineer/edit-engineer/'.$item->id) }}">Edit</a>
				 <a class="btn btn-danger p-1 mt-1" target="_blank" href="{{ url('admin/engineer/add-working-hour/'.$item->id) }}">Add Working Hour</a>
				 <form id="frm_2" class="d-flex" method="POST">
                    
                    <input type="hidden" name="_token" value="1">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-danger p-1">Delete</button>
                  </form>--}}
                </td>
            </tr>
		@endforeach 
			  </tbody>
          </table>
        </div>
		
        <div class="aiz-pagination mt-3 w-100">
			<div class="row justify-content-between">
				<div class="col-sm-6">
					<div class="dataTables_info fs-13 fw-bold" id="geniustable_info" role="status" aria-live="polite">Showing {{ $customer_list->currentPage() }} to {{ $customer_list->perPage() }} of {{ $customer_list->total() }} entries</div>
				</div>

				<div class="col-sm-6">
					{{ $customer_list->appends(request()->input())->links() }}
				</div>
			</div>
		</div>
		
      </div>
    </div>
  </div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form method="" id="update-employement-status">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Employment Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="display:none;" id="show-form-error" class="alert alert-danger">
                        <ul>
                            <div class="errorMsgntainer"></div>
                        </ul>
                    </div>

                    <select name="emp_employment_status" id="emp_employment_status" class="form-control" required="">
                        <option value="1"> Approve </option>
                        <option value="0"> Reject </option>
                    </select>
                </div>
                <div class="col-sm-12  my-3">
                    <input style="visibility:show !important;" type="text" name="employment_block_reason" id="editor" class="form-control" required="" placeholder="Please enter reason here." />
                </div>

                <div class="col-sm-offset-2 col-sm-10  my-3">
                    <input type="hidden" name="engId" id="engId">
                    <input type="hidden" id="adminId" value="{{ Session('LoggedUser')->user_id }}">
                    <button type="button" class="btn btn-primary update_employment_status">Update </button>
                </div>
            </form>
        </div>

    </div>

</div>



@endsection

@section('script')
<script type="text/javascript">
    $(document).on('click', '.update_employment_status', function(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("update-employement-status"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
			url: "{{ route('admin.updateEmploymentStatus') }}",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data) {
                // console.log('status ' + data.status);
                if (data.status == true) {
                    toastr.success('Updated Successfully.');
                    setTimeout(function() {
                        window.location = "{{ url('admin/engineer-list') }}"
                    }, 2000);
                } else {
                    toastr.error('Something went wrong.');
                }
            },

            error: function(err) {
                document.getElementById('show-form-error').style = "display: block";

                let error = err.responseJSON;
                $.each(error.errors, function(index, value) {
                    $('.errorMsgntainer').append('<span class="text-danger">' + value + '<span>' + '<br>');

                });

            }



        });

    });

    function updateEmploymentStatus(updateEmploymentStatus) {
        $('#exampleModal').modal('show');
        let user_id = $(updateEmploymentStatus).attr('id');
        $.ajax({
            url: "{{url('admin/engineer/engineer_details')}}"
            , type: 'get'
            , data: 'user_id=' + user_id
            , success: function(response) {
                // toastr.success("Status Successfully Updated");
                $('#engId').val(response.id);
            }
        })
    }


    $(".change_status").change(function(event) {
        event.preventDefault();
        var user_id = $(this).data("user_id");
        var status = $(this).val();
        changeStatus(user_id, status);
    });

    function changeStatus(user_id, status) {
        $.ajax({
            url: "{{url('admin/user/change_status')}}"
            , type: "GET"
            , data: {
                id: user_id
                , status: status
                , _token: '{{csrf_token()}}'
            }
            , dataType: 'json'
            , success: function(result) {
                toastr.success("Status Successfully Updated");
            }
        });
    }

</script>
@endsection
