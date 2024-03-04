@extends('admin.include.master')

@section('title', 'Engineer Commission')

@section('content')


<div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header mb-0 pt-3">
        <div class="row align-items-center">
          <div class="col">
            <div class="breadcrumb ">
              <a href="{{ url('admin/dashboard') }}">
                <i class="fa fa-home" aria-hidden="true"></i> Dashboard </a> / Engineer Commission
            </div>
          </div>
          <div class="col">
            <a href="{{ url('admin/dashboard') }}" class="btn btn-info float-right veiwbutton">
              <i class="fa fa-back" aria-hidden="true"></i> Back </a>
          </div>
        </div>
      </div>
      <hr>
      <div class="main-panel card-header ">
        <div class="row gutters-5 align-items-center">
          <div class="col">
            <h5 class="mb-md-0 h6">Engineer Commission</h5>
          </div>
           
           
		   {{-- <div class="col-md-3">
            <div class="form-group mb-0">
              <input type="text" class="form-control form-control-sm h-35" id="search" name="search" placeholder="Type & Enter">
            </div>
          </div>
          <div class="col-md-1 pl-0 text-right">
            <button type="submit" class="btn btn-danger btn-icon-text h-35">
              <i class="ti-file btn-icon-prepend"></i> Submit </button>
          </div>--}}
        </div>
        <hr>
         
        <div class="table-responsive">
          <table class="table table-striped fs-13 lsp-5">
            <thead>
              <tr>
                <th> Order Id </th>
                <th> Customer Name </th>
                <th> Customer Mobile </th>
                <th> Enginner Details </th>
                <th> Eng Commission </th>
                <th> Service Date </th>
                <th> Action </th>
              </tr>
            </thead>
				<tbody> 
					@if(count($engineer_commission)>0)
						@foreach($engineer_commission as $key => $val)
							<tr>
								 <td class="text-light-success">{{ $val->service_order_id }}</td>
								 <td class="text-light-success">{{ $val->first_name.' '.$val->last_name }}</td>
								 <td class="text-light-success">{{ $val->mobile }}</td>
								 <td class="text-light-success">{{ $val->eng_first_name.' '.$val->eng_last_name }}-({{ $val->eng_username }})</td>
								 <td class="text-light-success">{{ $val->earned_revenue }}</td>
								 <td class="text-light-success">{{ date('d-M-Y', strtotime($val->service_date )) }}</td>
								  
								 <td>
									<a href="{{ url('admin/order/order-view/'.$val->order_id) }}">View Details</a>
								 </td>
							</tr>
						@endforeach
					@endif


			  
				</tbody>
          </table>
        </div>
		
 
        <div class="aiz-pagination mt-3 w-100">
			<div class="row justify-content-between">
				<div class="col-sm-6">
					<div class="dataTables_info fs-13 fw-bold" id="geniustable_info" role="status" aria-live="polite">Showing {{ $engineer_commission->currentPage() }} to {{ $engineer_commission->perPage() }} of {{ $engineer_commission->total() }} entries</div>
				</div>

				<div class="col-sm-6">
					{{ $engineer_commission->appends(request()->input())->links() }}
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

 

 
