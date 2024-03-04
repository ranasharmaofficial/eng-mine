@extends('frontend.layouts.master')
@section('title') Ongoing Job  @endsection
@section('content')

@include('frontend.engineer.partials.engineer_dash_header')


<style>
.loading-spinner {
	display: none;
}

.loading-spinner.active {
	display: inline-block; // or whatever is appropriate to display it nicely
}
</style>


@php
			$engineer_profile_details = \App\Models\User::findOrFail(Session('LoggedEngineer')->user_id);
        @endphp

	<div class="main-wrapper">
		<!-- /Header -->

		<div class="bg-img">
			<img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg1">
			<img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg2">
			<img src="{{ static_asset('assets/assets_web/img/bg/feature-bg-03.png')}}" alt="img" class="bgimg3">
		</div>
		<div class="content">
			<div class="container">
				<div class="row">

					<!-- Customer Menu -->
					<div class="col-md-4 col-lg-3 theiaStickySidebar">

						 @include('frontend.engineer.partials.engineer-left-sidebar')
					</div>
					<!-- /Customer Menu -->
					
					<div class="col-md-8 col-lg-9">
                  <div class="widget-title d-flex align-items-center justify-content-between">
                     <h4 class="fw-bold">Ongoing Job</h4>
                  </div>
                  <hr>
                  <div class="white_block mt-3">
                     <div class="table-responsive">
                        <table class="table mb-0 custom-table border">
                           <thead class="thead-light">
                              <tr>
                                 <th>Job Id </th>
                                 <th>Customer Name </th>
                                 <th>Contact No</th>
                                 <th>Service Date </th>
                                 <th>Action Status </th>
                                 <th>Job</th>
                              </tr>
                           </thead>
                           <tbody>
						   
						@if(count($service_booking)>0)
							@foreach($service_booking as $key => $val)

								
					
					
								<tr>
									 <td class="text-light-success">
										<a href="javascript:void();" data-bs-toggle="modal" data-bs-target="#add-wallet{{$key+1}}">
										   {{ $val->service_order_id }}
										</a>
									 </td>
									 <td class="text-light-success">{{ $val->first_name.' '.$val->last_name }}</td>
									 <td class="text-light-success">{{ $val->mobile }}</td>
									 <td class="text-light-success">{{ date('d-M-Y', strtotime($val->service_date )) }}</td>
									 <td class="text-light-success">
										<p style="text-transform:uppercase">{{ $val->job_accept }}</p>
									</td>
									 <td class="text-light-success">
										@if($val->job_accept=='accept')
											<button onclick="updateStartJobStatus(this)" style="background-color:green !important;" id="{{ $val->id }}" class="btn btn-success">Complete</button>
										@endif
									 </td>
								</tr>
							@endforeach
						@endif

                               
                           </tbody>
                        </table>
                        <nav aria-label="Page navigation">
                           <ul class="pagination fs-13 mt-3">
                              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">Next</a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>

					 
                

				</div>

			</div>
		</div>
		 
	</div>
	
	@if(count($service_booking)>0)
		@foreach($service_booking as $key => $val_serv)
			<div class="modal fade custom-modal" id="add-wallet{{$key+1}}">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
						<div class="modal-header border-bottom-0 justify-content-between pb-0">
							<h5 class="modal-title ">Job Details</h5>
							<button type="button" class="close-btn px-2 py-1 border-0 rounded-circle" data-bs-dismiss="modal"
								aria-label="Close"><i class="fa fa-times"></i>
							</button>
						</div>
						<hr>
						<div class="modal-body pt-0">
							<table class="table w-100">
								<thead></thead>
								<tbody>
									<tr>
										<td><strong>Service ID</strong></td>
										<td>{{ $val_serv->service_order_id }}</td>
									</tr>
									
									@php
										$orderDetails = \App\Models\OrderDetail::select('order_details.*', 'cat.name as category_name', 'subcat.name as subcategory_name', 's.name as service_name', 'sub.name as sub_service_name')
											->leftJoin('service_categories as cat', 'cat.id', '=', 'order_details.category_id')
											->leftJoin('service_sub_categories as subcat', 'subcat.id', '=', 'order_details.subcategory_id')
											->leftJoin('services as s', 's.id', '=', 'order_details.service_id')
											->leftJoin('sub_services as sub', 'sub.id', '=', 'order_details.subservice_id')
											->where('order_id', $val_serv->id)
											->where('order_details.status', 2)
											->latest()->get();
											
										if($val_serv->engineer_id!=null){
											$engineer_details = \App\Models\User::where('id', $val_serv->engineer_id)->first();	
										}else{
											$engineer_details = NULL;
										}
										
									@endphp
									
									@if(count($orderDetails)>0)
										 
										@foreach($orderDetails as $item)
											<tr>
												<td><strong>Service:</strong> {{ $item->category_name }}</td>
												 
												<td>{{ $item->subcategory_name }},</br> {{ $item->service_name }} , </br>{{ $item->sub_service_name }}</td>
											</tr>
											 
										@endforeach
									@endif
									<tr>
										<td><strong>Service Date Time</strong></td>
										<td>{{ date("d-M-Y", strtotime($val_serv->app_date)) }} {{ $val_serv->app_time}}</td>
									</tr>
									<tr>
										<td><strong>Service location</strong></td>
										<td>{{ $val_serv->location }}, {{ $val_serv->landmark }}, {{ $val_serv->city }}, {{ $val_serv->state }}-{{ $val_serv->pincode }}</td>
									</tr>
									<tr>
										<td><strong>Action</strong></td>
										<td>
										@if($val_serv->orderStatus==0)
							<span class="badge bg-danger text-white fw-bold ms-2 px-3">Pending</span>
						@elseif($val_serv->orderStatus==1)
							<span class="badge bg-warning text-white fw-bold ms-2 px-3">Assigned to Engineer</span>
						@elseif($val_serv->orderStatus==2)
							<span class="badge bg-primary text-white fw-bold ms-2 px-3">Ongoing</span>
						@elseif($val_serv->orderStatus==3)
							<span class="badge bg-success text-white fw-bold ms-2 px-3">Completed</span>
						@elseif($val_serv->orderStatus==4)
							<span class="badge bg-danger text-white fw-bold ms-2 px-3">Declined</span>
						@elseif($val_serv->orderStatus==5)
							<span class="badge bg-danger text-white fw-bold ms-2 px-3">Cancelled</span>
						@endif
										</td>
									</tr>
									<tr>
										<td><strong>Assigned Engineer</strong></td>
										@if($val_serv->engineer_id!=null)
											<td style="color:blue;">{{ $engineer_details->username }} - {{ $engineer_details->first_name. ''.$engineer_details->last_name }}</td>
										@else
											<td style="color:red;">Not yet assigned</td>
										@endif
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	@endif
	
<div class="modal fade" id="engJobStartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form method="" enctype="multipart/form-data" id="start-job-form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Job Status</h5>
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
					
					
					<div class="col-sm-12  my-3">
						<label style="font-weight:bold;">Select Status</label>
						<select required name="status" id="status" class="form-control mt-1">
							<option value="">Select Status</option>
							<option value="partially_completed">Partially Completed</option>
							<option value="rescheduled">Rescheduled</option>
							<option value="completed">Completed</option>
							<option value="cancelled">Cancelled</option>
						</select>
					</div>
					
					<div class="col-sm-12  my-3">
						<label style="font-weight:bold;">Enter Remarks</label>
						<input type="text" name="completion_remarks" required id="completion_remarks" class="form-control mt-1">
					</div>
					
					<div class="col-sm-12  my-3">
						<label style="font-weight:bold;">Select Files</label>
						<input type="file" name="documents" required id="documents" class="form-control mt-1">
							 
					</div>

					<div class="col-sm-offset-2 col-sm-12  my-3">
						<input type="hidden" name="engId" id="engId">
						<input type="hidden" name="id" id="jobId" >
						<input type="hidden" name="order_id" id="orderId" >
						<button style="float:right;" type="button" class="btn btn-primary mb-3 start_job_button"><i class="fa fa-spinner loading-spinner" aria-hidden="true"></i>  Submit</button>
						
					</div>
				</div>
			</form>
        </div>

    </div>

</div>

<div class="modal fade" id="engineerJobActionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form method="" id="update-engineer-job-status">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Job Status</h5>
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
					
					<div class="col-sm-12  my-3">
						<label style="font-weight:bold;">Select Action</label>
						<select name="job_accept" id="job_accept" class="form-control" required="">
							<option value="accept"> Accept </option>
							<option value="decline"> Decline </option>
						</select>
					</div>
					<div class="col-sm-12  my-3">
						<label style="font-weight:bold;">Enter Remarks</label>
						<input style="visibility:show !important;" type="text" required name="remarks" id="editor" class="form-control" required="" placeholder="Please enter reason here." />
					</div>

					<div class="col-sm-offset-2 col-sm-10  my-3">
						<input type="hidden" name="engId" id="engId">
						<input type="hidden" name="id" id="jobId" >
						 
						<button type="button" class="btn btn-primary update_job_status_status">Update </button>
					</div>
				</div>
			</form>
        </div>

    </div>

</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
 $(document).on('click', '.start_job_button', function(e) {
		e.preventDefault();
		 
		 var clk_btn = $(".start_job_button");
      clk_btn.prop('disabled',true);
	  $('.loading-spinner').toggleClass('active');
        var formData = new FormData(document.getElementById("start-job-form"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
			url: "{{ route('engineer.completedEngineerJob') }}",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data) {
                if (data.status == true) {
                    toastr.success('Job Completed Successfully.');
                    setTimeout(function() {
                        window.location = "{{ url('engineer/engineer-dashboard') }}"
                    }, 2000);
                } else {
                    toastr.error('Something went wrong.');
                }
            },

            error: function(err) {
                document.getElementById('show-form-error').style = "display: block";
				clk_btn.prop('disabled',false);
				$('.loading-spinner').removeClass('active');
                let error = err.responseJSON;
                $.each(error.errors, function(index, value) {
                    $('.errorMsgntainer').append('<span class="text-danger">' + value + '<span>' + '<br>');

                });

            }



        });

    });

	function updateStartJobStatus(updateStartJobStatus) {
        $('#engJobStartModal').modal('show');
        let job_id = $(updateStartJobStatus).attr('id');
        $.ajax({
            url: "{{ url('engineer/engineer/engineer_job_details') }}",
			type: 'get',
			data: 'job_id=' + job_id,
			success: function(response) {
                // toastr.success("Status Successfully Updated");
                $('#engId').val(response.engineer_id);
                $('#jobId').val(response.id);
                $('#orderId').val(response.order_id);
            }
        })
    }
	
	function updateEngineerJobStatus(updateEngineerJobStatus) {
        $('#engineerJobActionModal').modal('show');
        let job_id = $(updateEngineerJobStatus).attr('id');
        $.ajax({
            url: "{{ url('engineer/engineer/engineer_job_details') }}",
			type: 'get',
			data: 'job_id=' + job_id,
			success: function(response) {
                // toastr.success("Status Successfully Updated");
                $('#engId').val(response.engineer_id);
                $('#jobId').val(response.id);
            }
        })
    }
	
	
 $(document).on('click', '.update_job_status_status', function(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("update-engineer-job-status"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
			url: "{{ route('engineer.updateEngineerJobStatus') }}",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data) {
                // console.log('status ' + data.status);
                if (data.status == true) {
                    toastr.success('Updated Successfully.');
                    setTimeout(function() {
                        window.location = "{{ url('engineer/upcoming-job') }}"
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
	
	
	
		$(".change_status").change(function (event) {
			event.preventDefault();
			var orderId = $(this).data("orderid");
			var status = $(this).val();
			changeStatus(orderId, status);
			// alert(orderid);
		});



        function changeStatus(orderid, status){
			$.ajax({
				url: "{{ route('engineer.updateOrderStatus') }}",
				type: "GET",
				data: {
					id: orderid,
					status: status,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
					toastr.success("Status Updated Successfully.");
				}
			});
		}

</script>

@endsection
