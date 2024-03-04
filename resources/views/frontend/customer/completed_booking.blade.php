@extends('frontend.layouts.master')
@section('title') Completed Booking  @endsection

@section('content')


<div class="main-wrapper">
@include('frontend.customer.partials.dash_header')

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
                  @include('frontend.customer.partials.left-sidebar')
                </div>
                <!-- /Customer Menu -->

                <div class="col-md-8 col-lg-9">
                    <div class="row">
                        <div class="widget-title d-flex align-items-center justify-content-between">
                            <h4 class="d-none d-lg-inline-block fw-bold">Completed Booking List</h4>
                            <div class="d-flex align-items-center w-50 justify-content-between ms-auto">
                                <h5 class="pt-2 me-2">Sort</h5>
                                <form>
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                                My Booking <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu mt-2">
                                                <li><a href="{{ url('customer/all_booking') }}">All Booking</a></li>
                                                <li><a href="{{ url('customer/upComing-booking') }}">Upcoming</a></li>
                                                <li><a href="{{ url('customer/ongoing-booking') }}">Ongoing</a></li>
                                                <li><a href="{{ url('customer/completed-booking') }}">Complete</a></li>
                                                <li><a href="{{ url('customer/pending-booking') }}">Pending</a></li>
                                                <li><a href="{{ url('customer/cancelled-booking') }}">Cancelled</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </form>
                                <a href="{{ route('customer.add_booking') }}"
                                    class="fs-14 py-1 bg-primary2 rounded-pill px-4 text-white text-center bt-hover">
                                    Book Service
                                </a>
                            </div>
                        </div>
                    </div>
	@php
	//	dd($service_booking);
	@endphp
				@if(count($service_booking)>0)
					@foreach($service_booking as $key => $val)
	
						@php
							if($val->engineer_id!=null){
								$engineer_details = \App\Models\User::where('id', $val->engineer_id)->first();	
							}else{
								$engineer_details = NULL;
							}
						@endphp

						<div class="row mt-4 border border-1 py-3 rounded">
							<!-- Details Section Start -->
							<div class="col-lg-3 position-relative">
								<img onerror="this.onerror=null;this.src='{{ static_asset('assets/assets_web/placeholder.jpg') }}';" src="{{ static_asset('assets/assets_web/img/gallery/hireL1engg.jpg')}}" alt="" class="img-fluid rounded h-100">
								<img src="{{ static_asset('assets/assets_web/img/gallery/heart-icon.svg')}}" alt=""
									class="img-fluid rounded position-absolute top-0 end-0 pe-3 pt-2 rounded-circle">
							</div>
							<div class="col-lg-9 mt-3 mt-lg-0">

								<div class="d-flex">
									<div>
										<span style="color:#fff;" class="book-item fw-bold me-5">Service Name</span>
										 
									</div>
									@if($val->status==0)
										<span class="badge bg-danger text-white fw-bold ms-2 px-3">Pending</span>
									@elseif($val->status==1)
										<span class="badge bg-warning text-white fw-bold ms-2 px-3">Assigned to Engineer</span>
									@elseif($val->status==2)
										<span class="badge bg-primary text-white fw-bold ms-2 px-3">Ongoing</span>
									@elseif($val->status==3)
										<span class="badge bg-success text-white fw-bold ms-2 px-3">Completed</span>
									@elseif($val->status==4)
										<span class="badge bg-danger text-white fw-bold ms-2 px-3">Declined</span>
									@elseif($val->status==5)
										<span class="badge bg-danger text-white fw-bold ms-2 px-3">Cancelled</span>
									@endif
								</div>
								@php
									$checkInvoiceGenerated = \App\Models\OrderInvoice::where('order_id', $val->id)->count();
								@endphp
								@if($checkInvoiceGenerated>0)
									@if($val->status==3)
									<div class="d-flex mt-2">
										<div>
											<span style="color:#fff;" class="book-item fw-bold me-5">Invoice</span>
										</div>
										<a href="{{ url('invoice/download-invoice/'.$val->id) }}">
											<span class="badge bg-danger text-white fw-bold ms-2 px-3">Download Invoice</span>
										</a>
									</div>
									@endif
								@endif
								<ul class="booking-details">
									<li>
										<span class="book-item fw-bold">Service ID</span> : {{ $val->service_order_id }}
										<a href="javascript:void();"
											class="bg-secondary bg-opacity-25 px-2 py-1 rounded text-primary2"
											data-bs-toggle="modal" data-bs-target="#add-wallet{{$key+1}}">
											View Service
										</a>
									</li>
									<li>
										<span class="book-item fw-bold">Service Order Date</span> : {{ date("d-M-Y", strtotime($val->created_at)) }}
									</li>
									
									<li>
										<span class="book-item fw-bold">Amount</span> : Rs {{ number_format($val->total_amount,2) }}
										<span class="float-end fw-bolder bg-primary2 p-1 rounded text-light d-none">
											<a href="javascript:void()" class="text-white">Reschedule</a>
										</span>
									</li>

									<li>
										<span class="book-item fw-bold">Order Date</span> : {{ date("d-M-Y", strtotime($val->created_at)) }}
									</li>
									<li>
										<span class="book-item fw-bold">Assigned Engineer</span> : 
										@if($val->engineer_id!=null)
											{{ $engineer_details->username }} - {{ $engineer_details->first_name. ''.$engineer_details->last_name }}
										@else
											Not Yet Assigned
										@endif
									</li>
									
												
									@if($val->status==0)		
										<li>
											<span class="book-item fw-bold">Action</span> :
											<a href="javascript:void();" class="bg-secondary bg-opacity-25 px-2 py-1 rounded text-primary2" data-bs-toggle="modal" data-bs-target="#cancel-service{{$key+1}}">Cancel</a>
										</li>
									@endif
								</ul>
							</div>
							<!-- Details Section End -->
						</div>





					@endforeach
				@endif

				
				
				
				@if(count($service_booking)>0)
					@foreach($service_booking as $key => $val_serv)

						 

				<div class="modal fade custom-modal" id="add-wallet{{$key+1}}">
							<div class="modal-dialog modal-dialog-centered modal-lg">
								<div class="modal-content">
									<div class="modal-header border-bottom-0 justify-content-between pb-0">
										<h5 class="modal-title ">Completed Service</h5>
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
														->where('order_details.status', 3)
														->latest()->get();
														
													if($val_serv->engineer_id!=null){
														$engineer_details = \App\Models\User::where('id', $val_serv->engineer_id)->first();	
													}else{
														$engineer_details = NULL;
													}
													
												@endphp
												
												@if(count($orderDetails)>0)
													@php
														$total_service_amount = 0;
													@endphp
													@foreach($orderDetails as $item)
														<tr>
															<td><strong>Service:</strong> {{ $item->category_name }}</td>
															 
															<td>{{ $item->subcategory_name }}, {{ $item->service_name }} , {{ $item->sub_service_name }}</td>
														</tr>
														@php
															$total_service_amount = $total_service_amount+$item->total_price;
														@endphp
													@endforeach
												@endif
												<tr>
													<td><strong>Service Date Time</strong></td>
													<td>{{ date("d-M-Y", strtotime($val_serv->app_date)) }} {{ $val_serv->app_time}}</td>
												</tr>
												<tr>
													<td><strong>Service location</strong></td>
													
													<td>{{ $val_serv->location }} {{ $val_serv->landmark }} {{ $val_serv->city }} {{ $val_serv->state }} {{ $val_serv->pincode }}</td>
												</tr>
												<tr>
													<td><strong>Action</strong></td>
													<td>
													@if($val_serv->status==0)
										<span class="badge bg-danger text-white fw-bold ms-2 px-3">Pending</span>
									@elseif($val_serv->status==1)
										<span class="badge bg-warning text-white fw-bold ms-2 px-3">Assigned to Engineer</span>
									@elseif($val_serv->status==2)
										<span class="badge bg-primary text-white fw-bold ms-2 px-3">Ongoing</span>
									@elseif($val_serv->status==3)
										<span class="badge bg-success text-white fw-bold ms-2 px-3">Completed</span>
									@elseif($val_serv->status==4)
										<span class="badge bg-danger text-white fw-bold ms-2 px-3">Declined</span>
									@elseif($val_serv->status==5)
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
				
		
	@if(count($service_booking)>0)
		@foreach($service_booking as $key => $item)		
				<!-- Cancel Service Modal Box Start -->

    <div class="modal fade custom-modal" id="cancel-service{{ $key+1 }}">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">

                <div class="modal-header border-bottom-0 justify-content-between pb-0">

                    <h4 class="modal-title">Service Cancellation</h4>

                    <button type="button" class="close-btn px-2 py-1 border-0 rounded-circle" data-bs-dismiss="modal"

                        aria-label="Close"><i class="fa fa-times"></i>

                    </button>

                </div>

                <hr>

                <div class="modal-body pt-0">

                    <form method="post" id="service-cancel-form" action="">
						@csrf
						<div style="display:none;" id="show-form-error" class="alert alert-danger">
							<ul>
								<div class="errorMsgntainer"></div>
							</ul>
						</div>
                        <div class="col-12">
							<label class=""><strong>Order ID: </strong>{{ $item->service_order_id }}</label>
						   <textarea rows="5" id="cancellation_reason" name="cancellation_reason" placeholder="Please Enter Reason for Cancellation" class="form-control mt-3"></textarea>

                        </div>
						<input type="hidden" name="order_id" value="{{ $item->id }}">
                        <div class="text-end mt-4">

                            <button type="button" class="btn btn-info service_cancel_button">Submit</button>

                        </div>
					</form>

                </div>

            </div>

        </div>

    </div>

    <!-- Cancel Service Modal Box End -->
	@endforeach
@endif
	
	
                </div>
            </div>
        </div>
    </div>

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
    $(document).on('click', '.service_cancel_button', function(e) {

        e.preventDefault();
        var formData = new FormData(document.getElementById("service-cancel-form"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
			url: "{{ route('customer.cancelServiceOrder') }}",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data) {
                if (data.status == true) {
                    toastr.success('Order Cancelled Successfully.');
                    setTimeout(function() {
                        window.location = "{{ url('customer/pending-booking') }}"
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

    

 

</script>
 @endsection