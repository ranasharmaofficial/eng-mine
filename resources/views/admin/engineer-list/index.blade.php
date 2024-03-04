@extends('admin.include.master')

@section('title', 'Engineer List')

@section('content')


<div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header mb-0 pt-3">
        <div class="row align-items-center">
          <div class="col">
            <div class="breadcrumb ">
              <a href="{{ url('admin/dashboard') }}">
                <i class="fa fa-home" aria-hidden="true"></i> Dashboard </a> / Engineer List
            </div>
          </div>
          <div class="col">
            <a href="{{ url('admin/engineer-list/create') }}" class="btn btn-info float-right veiwbutton">
              <i class="fa fa-plus" aria-hidden="true"></i> Add New Engineer List </a>
          </div>
        </div>
      </div>
      <hr>
      <div class="main-panel card-header ">
        <div class="row gutters-5 align-items-center">
          <div class="col">
            <h5 class="mb-md-0 h6">Engineer List</h5>
          </div>
          <div class="col text-right">
            <a href="{{ url('admin/engineer/engineer_export') }}" class="btn btn-circle btn-info h-35" download>
              <span>Export in Excel</span>
            </a>
          </div>
          <div class="col-md-3 ml-auto">
            <ul class="nav nav-tabs border h-35 d-block">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Select engineer list</a>
                <ul class="dropdown-menu  w-100">
                  <li>
                    <a class="dropdown-item" href="{{ url('admin/engineer-list') }}">Engineer List</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ url('admin/engineer/working-hour-list') }}">Engineer Working Hrs List</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          
        </div>
        <hr>
        <form method="get" action="">
          <div class="input-group mb-3 search-filter">
            <input type="text" name="username" class="form-control mr-1 rounded" placeholder="Engineer Id" value="{{ $request->username }}">
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
                <th> Engineer Id </th>
                <th> First Name </th>
                <th> last Name </th>
                <th> Email </th>
                <th> Mobile No. </th>
                <th> Status </th>
                <th> Employment Status </th>
                <th> Registration Date </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody> @foreach($engineerList as $key => $item) <tr>
                <td class="py-1">  {{ $item->username }} </td>
                <td class="py-1"> {{ $item->first_name }} </td>
                <td>{{ $item->last_name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->mobile }}</td>
                <td>
                  <select class="change_status bg-warning text-white" name="status" data-user_id="{{$item->id}}">
                    <option value="1" class="text-success" @if($item->status == 1) selected @endif>Active</option>
                    <option value="0" class="text-danger" @if($item->status == 0) selected @endif>Inactive</option>
                  </select>
                </td>
                <td>
                  <div class="d-flex align-items-center">
					  @if($item->employment_status == 0) 
						  <span class="badge badge-danger p-1 mr-1">Pending</span> 
					  @elseif($item->employment_status == 1)
						  <span class="badge badge-primary p-1 mr-1">Approved</span> 
					  @elseif($item->employment_status == 2)
						  <span class="badge badge-warning p-1 mr-1">Reject</span> 
					  @endif

					 
					@if($item->employment_status == 0)
						  <button class="btn btn-warning p-1 ml-1" style="cursor:pointer" data-toggle="modal" data-target="#exampleModal{{ $item->id }}" id="{{ $item->id }}">Pending</button>
					@elseif($item->employment_status == 1)
					   <button class="btn btn-success p-1 ml-1" style="cursor:pointer" data-toggle="modal" data-target="#exampleModal{{ $item->id }}" id="{{ $item->id }}">Approved</button>
					@else
						  <button class="btn btn-danger p-1 ml-1" style="cursor:pointer" data-toggle="modal" data-target="#exampleModal{{ $item->id }}" id="{{ $item->id }}">Reject</button> 
					@endif
				   </div>
                </td>
                <td>
                  {{ date('d-M-Y', strtotime($item->created_at)) }}
                </td>
                <td>
				<a class="btn btn-primary p-1 mx-1" href="{{ url('admin/engineer/edit-engineer/'.$item->id) }}">Edit</a>
				<a class="btn btn-danger p-1 mt-1" target="_blank" href="{{ url('admin/engineer/add-working-hour/'.$item->id) }}">Add Working Hour</a>
				<form id="engineer-delete" class="d-flex mt-1" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $item->id }}">
                    <button type="button" class="btn btn-danger p-1 delete_engineer">Delete</button>
                </form>
                </td>
              </tr> 


			  
			  @endforeach </tbody>
          </table>
        </div>
		
@foreach($engineerList as $key => $item) 		
<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Employment Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('admin.updateEmploymentStatus') }}" id="update-employement-status">
                @csrf
                <div class="modal-body">

                    <div style="display:none;" id="show-form-error" class="alert alert-danger">
                        <ul>
                            <div class="errorMsgntainer"></div>
                        </ul>
                    </div>

                    <select name="emp_employment_status" id="emp_employment_status" class="form-control" required="">
                        <option @if($item->employment_status == 0) selected @endif value="0"> Pending </option>
                        <option @if($item->employment_status == 1) selected @endif value="1"> Approve </option>
                        <option @if($item->employment_status == 2) selected @endif value="2"> Reject </option>
                    </select>
                </div>
                <div class="col-sm-12  my-3">
                    <input style="visibility:show !important;" type="text" name="employment_block_reason" id="editor" class="form-control" required="" placeholder="Please enter reason here." />
                </div>

                <div class="col-sm-offset-2 col-sm-10  my-3">
                    <input type="hidden" name="engId" value="{{ $item->id }}" id="engId">
                    <input type="hidden" id="adminId" value="{{ Session('LoggedUser')->user_id }}">
                    <button type="submit" class="btn btn-primary update_employment_status__">Update </button>
                </div>
        </form>
      </div>
      <div class="modal-footer d-none">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary ">Update</button>
      </div>
    </div>
  </div>
</div>


@endforeach
        <div class="aiz-pagination mt-3 w-100">
			<div class="row justify-content-between">
				<div class="col-sm-6">
					<div class="dataTables_info fs-13 fw-bold" id="geniustable_info" role="status" aria-live="polite">Showing {{ $engineerList->currentPage() }} to {{ $engineerList->perPage() }} of {{ $engineerList->total() }} entries</div>
				</div>

				<div class="col-sm-6">
					{{ $engineerList->appends(request()->input())->links() }}
				</div>
			</div>
			
			




		</div>
		
      </div>
    </div>
  </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">

	// function updateEmploymentStatus(updateEmploymentStatus) {
        // $('#exampleModal').modal();
        // let user_id = $(updateEmploymentStatus).attr('id');
        // $.ajax({
            // url: "{{ url('admin/engineer/engineer_details') }}",
            // type: 'get',
			// data: 'user_id=' + user_id,
			// success: function(response) {
                //toastr.success("Status Successfully Updated");
                // $('#engId').val(response.id);
            // }
        // })
    // }
	
	
$(document).on('click', '.delete_engineer', function(e) {
	// alert('button clicked');
        e.preventDefault();
        var formData = new FormData(document.getElementById("engineer-delete"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: "POST",
				url: "{{ route('admin.deleteEngineer') }}",
				data: formData,
				processData: false,
				contentType: false,
				dataType: "JSON",
				success: function(data) {
					// console.log('status ' + data.status);
					if (data.status == true) {
						toastr.error('Deleted Successfully.');
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
		}else{
			return false;
		}

    });
	
    $(document).on('click', '.update_employment_status', function(e) {
		alert('butt');
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

    
	
	


    $(".change_status").change(function(event) {
        event.preventDefault();
        var user_id = $(this).data("user_id");
        var status = $(this).val();
        changeStatus(user_id, status);
    });

    function changeStatus(user_id, status) {
        $.ajax({
            url: "{{url('admin/engineer/change_status')}}"
            , type: "GET",
			data: {
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

 

 
