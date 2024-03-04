@extends('admin.include.master')

@section('title', 'Completed Order List')

@section('content')



<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="page-header mb-0 mt-3">

            <div class="row align-items-center justify-conent-between">

                <div class="col">

                    <div class="breadcrumb  "><a href="{{ url('admin/dashboard') }}">

                            <i class="fa fa-home" aria-hidden="true"></i> Dashboard</a> / Service

                    </div>

                </div>

                <div class=" col">

                    <a href="{{ route('admin.dashboard') }}" class="btn btn-info float-right veiwbutton"><i class="fa fa-plus" aria-hidden="true"></i> Back</a>

                </div>



            </div>

        </div>

        <hr>

        <div class="main-panel card-header ">

            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">



                                <div class="row gutters-5 align-items-center">

                                    <div class="col pr-0">

                                        <h5 class="mb-md-0 h6">Completed Order</h5>

                                    </div>

                                    <div class="col text-right">
                                        <a href="{{ route('admin.order.exportallOrder') }}" class="btn btn-circle btn-info h-35" download>
											<span>Export in Excel</span>
										</a>
                                        <a href="{{ url('admin/order/completed-order') }}" class="btn btn-circle btn-warning h-35">
											<span>Refresh</span>
										</a>

                                    </div>

                                </div>

                                <hr>




							<form method="get" action="">
							 @csrf
          <div class="input-group mb-3 search-filter">
            <input type="text" name="service_order_id" class="form-control mr-1 rounded" placeholder="Order Id" value="{{ $request->service_order_id }}">
            <input type="text" name="customer_mobile" class="form-control mx-1 rounded" placeholder="Customer Mobile" value="{{ $request->customer_mobile }}">
            <input type="text" name="customer_name" class="form-control mx-1 rounded" placeholder="Customer  Name" value="{{ $request->customer_name }}">
            <input type="text" name="eng_mobile" class="form-control mx-1 rounded" placeholder="Engineer Mobile" value="{{ $request->eng_mobile }}">
            <input type="text" name="date_from" class="form-control mx-1 rounded" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Start date" value="{{ $request->date_from }}">
            <input type="text" name="date_to" class="form-control mx-1 rounded" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="End date" value="{{ $request->date_to }}">
            <button type="submit" class="btn btn-primary btn-icon-text h-35">
              <i class="ti-file btn-icon-prepend"></i> Search </button>
          </div>
        </form>

                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Service Date</th>
                                            <th>Order Date</th>
                                            <th>Order Amount</th>
                                            <th>Payment Status</th>
                                            <th>Order Status</th>
                                            <th>Action</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                <tbody>

                                    @if(count($service_order_list)>0)
                                        @foreach($service_order_list as $key => $item)
                                            <tr>
                                                <td class="py-1" onclick="">{{ $item->service_order_id }}</td>

												@if($item->engineer_id!=null)
                                                @php
                                                    $engineer_details = \App\Models\User::where('id', $item->engineer_id)->first();
                                                @endphp
                                                <td class="py-1">
                                                    <b>Assigned to {{ $engineer_details->first_name.' '.$engineer_details->last_name}}</b>
                                                </td>

												@else

												<td class="py-1">Not Assigned Yet</td>

												@endif

												<td class="py-1">
                                                    {{ date("d-M-Y", strtotime($item->created_at)) }}
                                                </td>
												<td class="py-1">
                                                    {{ $item->total_amount }}
                                                </td>

												<td>

													<select name="payment_status" data-order="{{$item->id}}" id="cars" class="border-0 bg-danger text-white rounded-pill px-1 payment_status">
														<option @if($item->payment_status=='cancelled') selected @endif value="cancelled">Cancelled</option>
														<option @if($item->payment_status=='paid') selected @endif value="paid">Paid</option>
														<option @if($item->payment_status=='unpaid') selected @endif value="unpaid">Unpaid</option>

													</select>

												</td>

												<td>
														@if($item->status=='0')
															<p class="font-weight-bold text-danger">Pending</p>
														@elseif($item->status=='1')
															<p class="font-weight-bold text-primary">Assign to Engineer</p>
														@elseif($item->status=='2')
															<p class="font-weight-bold text-warning">Ongoing</p>
														@elseif($item->status=='3')
															<p class="font-weight-bold text-success">Completed</p>
														@elseif($item->status=='4')
															<p class="font-weight-bold text-danger">Declined</p>
														@elseif($item->status=='5')
															<p class="font-weight-bold text-danger">Cancelled</p>
														@elseif($item->status=='6')
															<p class="font-weight-bold text-info">Upcoming</p>
														@endif
													<select name="status" data-orderid="{{$item->id}}" class="border-0 bg-warning text-white rounded-pill px-1 change_status">



															<option @if($item->status=='0') selected @endif value="0">Pending</option>

															<option @if($item->status=='1') selected @endif value="1">Assign to Engineer</option>

															<option @if($item->status=='2') selected @endif value="2">Ongoing</option>

															<option @if($item->status=='3') selected @endif value="3">Completed</option>

															<option @if($item->status=='4') selected @endif value="4">Declined</option>

															<option @if($item->status=='5') selected @endif value="5">Cancelled</option>

															<option @if($item->status=='6') selected @endif value="6">Upcoming</option>


													</select>

												</td>

												<td>

													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $item->id }}" id="{{ $item->id }}">

														Assign Engineer

													</button>

												</td>

												<td class="text-center">

													<div class="dropdown dropdown-action">

														<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>

														<div class="dropdown-menu dropdown-menu-right">

															<a class="dropdown-item" href="{{ url('admin/order/order-view/'.$item->id) }}"><i class="fas fa-eye m-r-5"></i> View Order</a>

																{{--<a class="dropdown-item" href="{{ url('admin/order/download-invoice/'.$item->id) }}"><i class="fas fa-download m-r-5"></i> Download Invoice</a>

																<a class="dropdown-item" href="#" data-toggle="modal" data-target="#Inactive_asset"><i class="fas fa-trash m-r-5"></i> Delete Order</a>--}}

														</div>

													</div>

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
										<div class="dataTables_info fs-13 fw-bold" id="geniustable_info" role="status" aria-live="polite">Showing {{ $service_order_list->currentPage() }} to {{ $service_order_list->perPage() }} of {{ $service_order_list->total() }} entries</div>
									</div>

									<div class="col-sm-6">
										{{ $service_order_list->appends(request()->input())->links() }}
									</div>
								</div>
							</div>

                        </div>

                    </div>

                </div>

            </div>


@if(count($service_order_list)>0)
	@foreach($service_order_list as $key => $val)
		<!-- Modal -->
		<div class="modal fade" id="exampleModal{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">

			  <div class="modal-body">
				 <form method="post" id="assign-engineer-order" action="{{ route('admin.assignServicetoEngineer') }}">

                                                        @csrf

                                                        <div class="modal-header">

                                                            <h5 class="modal-title" id="staticBackdropLabel">Assign Engineer </h5>

                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                                <span aria-hidden="true">&times;</span>

                                                            </button>

                                                        </div>

                                                        <input type="hidden" value="{{ $val->id }}" name="order_id" id="order_id">

                                                        <div class="modal-body">

                                                            <div class="form-group">

                                                                <div class="row mt-3">
                                                                    <div class="col-md-12 mt-3">
                                                                        <div style="display:none;" id="show-form-error" class="alert alert-danger form-group">
                                                                            <ul>
                                                                                <div class="errorMsgntainer"></div>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label>Order ID</label>
                                                                        <input class="form-control" readonly value="{{ $val->service_order_id }}" name="service_order_id" id="service_order_id">

                                                                    </div>
                                                                </div>

                                                                <div class="row mt-3">
                                                                    <div class="col-md-12">
                                                                        <select class="form-control" name="subcategory_id" id="subcategory_id">
                                                                            <option value="">Select Domain</option>
                                                                            @if(count($service_subcategory_list)>0)
																				@foreach ($service_subcategory_list as $key => $item)
																				<option value="{{ $item->id }}"> {{ $item->name }}</option>
																				@endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-3">
                                                                    <div class="col-md-12">
                                                                        <select class="form-control" name="service_id" id="service_id">
                                                                            <option value="">Select Sub Domain</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-3">
                                                                    <div class="col-md-12">

                                                                        <select class="form-control" name="engineer_id" id="engineer_id">
                                                                            <option value="">Select Engineer</option>
                                                                        </select>


                                                                        {{--<select class="form-control" name="engineer_id" id="engineer_id">

                                                                            <option value="">Select Engineer</option>

                                                                            @foreach($engineer_list as $item)

                                                                            <option value="{{ $item->id }}">{{ $item->first_name.' '.$item->last_name }}
                                                                            </option>

                                                                            @endforeach



                                                                        </select>--}}

                                                                    </div>

                                                                </div>

                                                                <div class="row mt-3">
                                                                    <div class="col-md-12">
                                                                        <label>Select Service Date</label>
                                                                        <input class="form-control" type="date" name="service_date" id="service_date">
                                                                    </div>
                                                                </div>

																<div class="row mt-3">
                                                                    <div class="col-md-12">
                                                                        <label>Service Time</label>
                                                                        <input class="form-control" type="time" name="service_time" id="service_time">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-primary assign_enginer_to_order">Assign</button>

                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

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
@endif

<!-- Modal Start -->

                                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">

                                            <div class="modal-dialog">

                                                <div class="modal-content">

                                                    <form method="post" id="assign-engineer-order" action="{{ route('admin.assignServicetoEngineer') }}">

                                                        @csrf

                                                        <div class="modal-header">

                                                            <h5 class="modal-title" id="staticBackdropLabel">Assign Engineer </h5>

                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                                <span aria-hidden="true">&times;</span>

                                                            </button>

                                                        </div>

                                                        <input type="hidden" name="order_id" id="order_id">

                                                        <div class="modal-body">

                                                            <div class="form-group">

                                                                <div class="row mt-3">
                                                                    <div class="col-md-12 mt-3">
                                                                        <div style="display:none;" id="show-form-error" class="alert alert-danger form-group">
                                                                            <ul>
                                                                                <div class="errorMsgntainer"></div>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3">
                                                                    <div class="col-md-12">
                                                                        <label>Order ID</label>
                                                                        <input class="form-control" readonly name="service_order_id" id="service_order_id">

                                                                    </div>
                                                                </div>

                                                                <div class="row mt-3">
                                                                    <div class="col-md-12">
                                                                        <select class="form-control" name="subcategory_id" id="subcategory_id">
                                                                            <option value="">Select Domain</option>
                                                                            @if(count($service_subcategory_list)>0)
                                                                            @foreach ($service_subcategory_list as $key => $item)
                                                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-3">
                                                                    <div class="col-md-12">
                                                                        <select class="form-control" name="service_id" id="service_id">
                                                                            <option value="">Select Sub Domain</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-3">
                                                                    <div class="col-md-12">

                                                                        <select class="form-control" name="engineer_id" id="engineer_id">
                                                                            <option value="">Select Engineer</option>
                                                                        </select>


                                                                        {{--<select class="form-control" name="engineer_id" id="engineer_id">

                                                                            <option value="">Select Engineer</option>

                                                                            @foreach($engineer_list as $item)

                                                                            <option value="{{ $item->id }}">{{ $item->first_name.' '.$item->last_name }}
                                                                            </option>

                                                                            @endforeach



                                                                        </select>--}}

                                                                    </div>

                                                                </div>

                                                                <div class="row mt-3">
                                                                    <div class="col-md-12">
                                                                        <label>Select Service Date</label>
                                                                        <input class="form-control" type="date" name="service_date" id="service_date">
                                                                    </div>
                                                                </div>

																<div class="row mt-3">
                                                                    <div class="col-md-12">
                                                                        <label>Service Time</label>
                                                                        <input class="form-control" type="time" name="service_time" id="service_time">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-primary assign_enginer_to_order">Assign</button>

                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                                        <!-- Modal End -->



        </div>

    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
	$('#service_id').on('change', function() {
            var service_id = this.value;
           // $("#service_id").html('');
		   var subcategory_id = document.getElementById("subcategory_id").value;

            $.ajax({
                url: "{{ route('admin.getEngineerList') }}",
                type: "POST",
                data: {
                    subcategory_id: subcategory_id,
                    service_id: service_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#engineer_id').html('<option value="">Select Engineer</option>');
                    $.each(result.engineerList, function(key, value) {
                        $("#engineer_id").append('<option value="' + value.id + '">' + value.first_name + ' ' + value.last_name + '</option>');
                    });
                }
            });
        });

		$('#subcategory_id').on('change', function() {
            var subcategory_id = this.value;
          // $("#service_id").html('');
            $.ajax({
                url: "{{ route('admin.getServiceList') }}",
                type: "POST",
                data: {
                    subcategory_id: subcategory_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#service_id').html('<option value="">Select Service</option>');
                    $.each(result.serviceList, function(key, value) {
                        $("#service_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('#city-dropdown').html('<option value="">Select Subcategory</option>');
                }
            });
        });

	function assignEngineer(assignEngineer) {
        $('#staticBackdrop').modal("toggle");
        let order_id = $(assignEngineer).attr('id');
        $.ajax({
            url: "{{url('admin/order/order_details')}}",
			type: 'get',
			data: 'order_id=' + order_id,
			success: function(response) {
                // toastr.success("Status Successfully Updated");
                $('#order_id').val(response.id);
                $('#service_order_id').val(response.service_order_id);
            }
        })
    }


$(document).on('click','.assign_enginer_to_order',function(e) {
	e.preventDefault();
	var formData = new FormData(document.getElementById("assign-engineer-order"));
	console.log(formData);
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  $.ajax({
    type: "POST",
    url: "{{ route('admin.assignServicetoEngineer') }}",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "JSON",
    success: function(data) {
			console.log('status '+data.status);
			if(data.status==true){
				toastr.success('Assigned Successfully.');
				setTimeout(function(){
				window.location = "{{ url('admin/service-order') }}" },1000);
			}else{
				toastr.error('Login Failed.');
			}


    },error:function(err){

		document.getElementById('show-form-error').style="display: block";
		let error = err.responseJSON;
		console.log(error);
		$.each(error.errors, function (index, value) {
			$('.errorMsgntainer').append('<span class="text-danger">'+value+'<span>'+'<br>');
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
				url: "{{ route('admin.updateOrderStatus') }}",
				type: "GET",
				data: {
					id: orderid,
					status: status,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
					toastr.success("Status Successfully Updated");
				}
			});
		}

		$(".payment_status").change(function (event) {
			event.preventDefault();
			var order = $(this).data("order");
			var payment_status = $(this).val();
			paymentStatus(order, payment_status);
			// alert(orderid);
		});



        function paymentStatus(order, payment_status){
			$.ajax({
				url: "{{ route('admin.updatePaymentStatus') }}",
				type: "GET",
				data: {
					id: order,
					payment_status: payment_status,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
					toastr.success("Status Successfully Updated");
				}
			});
		}

    </script>


</script>


@endsection

