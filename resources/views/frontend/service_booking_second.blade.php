@extends('frontend.layouts.master')
@section('title') Show Estimate @endsection



@section('content')
<style>
.loading-spinner {
	display: none;
}

.loading-spinner.active {
	display: inline-block; // or whatever is appropriate to display it nicely
}
</style>

		@include('frontend.includes.header')

	<section class="breadcrumbs-custom bg-image context-dark"
				style="background-image: url({{ static_asset('assets/assets_web/img/server-sevice.png')}}); height:369px; background-repeat: no-repeat; background-size: cover; padding-top:239px">
				<div class="container">
					<div>
						<h2 class="breadcrumbs-custom-title text-dark">Service details</h2>
						<ul class="breadcrumbs-custom-path">
							<li><a href="{{ url('') }}">Home<i class="fa fa-arrow-right px-2" aria-hidden="true"></i></a></li>
							<li class="active" style="color:#ff008a;">Service details</li>
						</ul>
					</div>
				</div>
			</section>
			<div class="bg-img">
				<img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg1">
				<img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg2">
				<img src="{{ static_asset('assets/assets_web/img/bg/feature-bg-03.png')}}" alt="img" class="bgimg3 w-50">
			</div>
			<section id="service-details" class="py-5">
				<div class="container1">
					<div class="content book-content">
						<div class="container">
							<div class="row">
								<!-- Booking -->
								<div class="col-md-12">
									<div class="login-back">
										<a href="{{ url('service-booking-first/'.$temp_order_id) }}"><i class="feather-arrow-left"></i> Back</a>
									</div>
									<!-- Booking Step -->
									<ul class="step-register row">
										<li class="activate col-md-4">
											<div class="multi-step-icon">
												<span><img src="{{ static_asset('assets/assets_web/img/icons/calendar-icon.svg')}}" alt="img"></span>
											</div>
											<div class="multi-step-info">
												<h6>Appointment</h6>
												<p>Choose time & date for the service</p>
											</div>
										</li>
										<li class="active col-md-4">
											<div class="multi-step-icon">
												<span><img src="{{ static_asset('assets/assets_web/img/icons/wallet-icon.svg')}}" alt="img"></span>
											</div>
											<div class="multi-step-info">
												<h6>Appointment time date</h6>
												<p>Select Payment Gateway</p>
											</div>
										</li>
										<li class="col-md-4">
											<div class="multi-step-icon">
												<span><img src="{{ static_asset('assets/assets_web/img/icons/book-done.svg')}}" alt="img"></span>
											</div>
											<div class="multi-step-info">
												<h6>Done </h6>
												<p>Completion of Booking</p>
											</div>
										</li>
									</ul>
									<!-- /Booking Step -->

									<!-- Booking Payment -->
									<form id="book-order" action="#">
										@csrf
										<div class="row">
											<div class="col-lg-10 mx-auto">
												<div class="row">
													<div class="col-lg-6">
														<h5 class="pay-title">Payment Methods</h5>
														<div class="payment-card payment-bg">
															<div class="payment-head">
																<div class="payment-title">
																	<label class="custom_radio">
																		<input type="radio" name="payment_mode" value="pay_now" class="card-payment"
																			checked="">
																		<span class="checkmark"></span>
																	</label>
																	<h6>Pay Now</h6>
																</div>
															</div>
														</div>
														<div class="payment-card">
															<div class="payment-head">
																<div class="payment-title">
																	<label class="custom_radio">
																		<input type="radio" name="payment_mode" value="pay_later" class="card-payment">
																		<span class="checkmark"></span>
																	</label>
																	<h6>Pay Later</h6>
																</div>
															</div>
														</div>
														{{--<div class="payment-card">
															<div class="payment-head">
																<div class="payment-title">
																	<label class="custom_radio credit-card-option">
																		<input type="radio" name="payment_mode" value="credit_debit" class="card-payment">
																		<span class="checkmark"></span>
																	</label>
																	<h6>Credit / Debit Card</h6>
																</div>
															</div>
														</div>--}}
														<div class="payment-list" style="display:none">
															<div class="row align-items-center">
																<div class="col-md-12">
																	<div class="form-group">
																		<label class="col-form-label">Name on Card</label>
																		<input class="form-control" type="text"
																			placeholder="Enter Name on Card">
																	</div>
																</div>
																<div class="col-md-8">
																	<div class="form-group">
																		<label class="col-form-label">Card Number</label>
																		<input class="form-control"
																			placeholder="**** **** **** ****" type="text">
																	</div>
																</div>
																<div class="col-md-4 text-end">
																	<div class="form-group">
																		<label class="col-form-label">&nbsp;</label>
																		<img src="assets/img/payment-card.png" class="img-fluid"
																			alt="">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="col-form-label">Expiration date</label>
																		<input class="form-control" placeholder="MM/YY"
																			type="text">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="col-form-label">Security code</label>
																		<input class="form-control" placeholder="CVV"
																			type="text">
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<h5 class="pay-title">Booking Summary</h5>
														<div class="summary-box">
					@php
						$temp_order_details = DB::table('temp_order_details')->select('*')->where('temp_order_id', $temp_order_id)->get();
					@endphp

												@foreach($temp_order_details as $key => $item)

															@php
																$category = $item->category_id;
																$subcategory = $item->subcategory_id;
																$service_category = \App\Models\ServiceCategory::where('id', $category)->first();
																$service_subcategory = \App\Models\ServiceSubCategory::where('id', $subcategory)->first();
															@endphp
															<div class="booking-info">
																<div class="service-book">
																	<div class="service-book-img">
																		<img src="{{ static_asset('assets/assets_web/img/booking.jpg')}}" alt="img">
																	</div>
																	<div class="serv-profile">
																		<span class="badge">{{ $service_subcategory->name }}</span>
																		<h2>{{ $service_category->name }}</h2>
																			{{--<ul>
																			<li class="serv-pro">
																				<img src="{{ static_asset('assets/assets_web/img/profiles/avatar-01.jpg')}}"
																					alt="img">
																			</li>
																			<li class="serv-review"><i
																					class="fa-solid fa-star"></i> <span>4.9
																				</span>(255 reviews)</li>
																			<li class="service-map"><i
																					class="feather-map-pin"></i> Alabama, USA
																			</li>
																		</ul>--}}
																	</div>
																</div>
															</div>
												@endforeach
															<div class="booking-summary">
																<ul class="booking-date">
																	<li>Date <span>{{ date('d-M-Y',strtotime($tempOrderDetails->app_date))  }}</span></li>
																	<li>Time <span>{{ $tempOrderDetails->app_time }}</span></li>
																		{{--<li>Service Provider <span>Thomas Herzberg</span></li>--}}
																</ul>
																<input type="hidden" id="temp_order_id" name="temp_order_id" value="{{ $temp_order_id }}" >
																<ul class="booking-date">
																	<li>Subtotal <span>Rs&nbsp; {{ $temp_order_total_price }}</span></li>
																	<li>Coupoun Discount <span>Rs&nbsp;0.00</span></li>
																	<li>Services Charges <span>Rs&nbsp;0.00</span></li>
																</ul>
																<div class="booking-total">
																	<ul class="booking-total-list">
																		<li>
																			<span>Total</span>
																			<span class="total-cost">Rs&nbsp;{{ $temp_order_total_price }}.00</span>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="booking-coupon d-none">
															<div class="form-group w-100">
																<div class="coupon-icon">
																	<input type="text" class="form-control"
																		placeholder="Coupon Code">
																	<span><img src="assets/img/icons/coupon-icon.svg"
																			alt=""></span>
																</div>
															</div>
															<div class="form-group">
																<button class="btn btn-primary apply-btn">Apply</button>
															</div>
														</div>
														{{--<div class="save-offer">
															<p><i class="fa-solid fa-circle-check"></i> Your total saving on
																this order $5.00</p>
														</div>--}}
														<div class="booking-pay">
															<button type="button" id="book-service-order" class="btn btn-primary btn-pay w-100 book-service-order"><i class="fa fa-spinner loading-spinner" aria-hidden="true"></i> Proceed</button>

															<a href="{{ url('/') }}" class="btn btn-secondary btn-skip">Skip</a>

														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- /Booking Payment -->
									</form>

								</div>
								<!-- /Booking -->

							</div>
						</div>
					</div>

				</div>
			</section>







	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

	<script>



$(document).on('click','.book-service-order',function(e) {
	e.preventDefault();

  var clk_btn = $("#book-service-order");
      clk_btn.prop('disabled',true);
	$('.loading-spinner').toggleClass('active');
	// var formData = new FormData(this);
	var formData = new FormData(document.getElementById("book-order"));
	console.log(formData);
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  $.ajax({
    type: "POST",
    url: "{{ route('order.completeServiceBooking') }}",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "JSON",
    success: function(data) {
			// console.log('status '+data.status);
			if(data.status==true){
				toastr.success('Booked Successfully.');
				setTimeout(function(){
				window.location = "{{ url('service-booking-completed') }}" },1000);
			}else{
				toastr.error('Login Failed.');
			}


    },error:function(err){
		$('.loading-spinner').removeClass('active');
		document.getElementById('show-form-error').style="display: block";
		let error = err.responseJSON;
		console.log(error);
		$.each(error.errors, function (index, value) {
			$('.errorMsgntainer').append('<span class="text-danger">'+value+'<span>'+'<br>');
		});
	}

  });
});


		if ($('#datetimepickershow').length > 0) {
			$('#datetimepickershow').datetimepicker({

				inline: true,
				sideBySide: true,
				format: 'DD-MM-YYYY',
				icons: {
					up: "fas fa fab fa-angle-up",
					down: "fas fa fab fa-angle-down",
					next: 'fas fa fab fa-angle-right',
					previous: 'fas fa fab fa-angle-left'
				}

			});
		}
	</script>
	<!--<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<script>
		if ($('#datetimepickershow').length > 0) {
			$('#datetimepickershow').datetimepicker({

				inline: true,
				sideBySide: true,
				format: 'DD-MM-YYYY',
				icons: {
					up: "fas fa fab fa-angle-up",
					down: "fas fa fab fa-angle-down",
					next: 'fas fa fab fa-angle-right',
					previous: 'fas fa fab fa-angle-left'
				}

			});
		}
	</script>-->

@endsection

