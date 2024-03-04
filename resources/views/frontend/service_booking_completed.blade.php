@extends('frontend.layouts.master')
@section('title') Show Estimate @endsection



@section('content')
    
	 
		@include('frontend.includes.header')
	
		<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url({{ static_asset('assets/assets_web/img/server-sevice.png')}}); height:369px; background-repeat: no-repeat; background-size: cover; padding-top:239px">
            <div class="container">
               <div>
                  <h2 class="breadcrumbs-custom-title text-dark">Service details</h2>
                  <ul class="breadcrumbs-custom-path">
                     <li><a href="{{ url('') }}">Home<i class="fa fa-arrow-right px-2" aria-hidden="true"></i></a></li>
                     <li class="active" style="color:#ff008a;">Booking Done</li>
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
           	<div class="content book-content">
				<div class="container">
					<div class="row">
						
						<!-- Booking -->
						<div class="col-md-12">
						
							<div class="login-back">
								<a href="booking-payment.php"><i class="feather-arrow-left"></i> Back</a>
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
								<li class="activate col-md-4">
									<div class="multi-step-icon">
										<span><img src="{{ static_asset('assets/assets_web/img/icons/wallet-icon.svg')}}" alt="img"></span>
									</div>
									<div class="multi-step-info">
										<h6>Appointment time date</h6>
										<p>Select Payment Gateway</p>
									</div>
								</li>
								<li class="active col-md-4">
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
							
							<!-- Booking Done -->
							<div class="row">
								<div class="col-md-10 mx-auto">
									<div class="row align-items-center">
										<div class="col-md-6">
											<div class="booking-done">
												<h6>Successfully Completed Payment</h6>
												<p>Your Booking has been Successfully Competed</p>					
												<div class="book-submit">
													<a href="{{ url('') }}" class="btn btn-primary"><i class="feather-arrow-left-circle"></i> Go to Home</a>
													<a href="{{ url('customer/all_booking') }}" class="btn btn-secondary border">Booking History</a>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="booking-done">
												<img src="{{ static_asset('assets/assets_web/img/booking-done.png')}}" class="img-fluid" alt="">
											</div>
										</div>
									</div>
								</div>						
							</div>						
							<!-- /Booking Done -->
							
						</div>
						<!-- /Booking -->
						
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
    url: "{{ route('order.saveBookingOrder') }}",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "JSON",
    success: function(data) {
			console.log('status '+data.status);
			if(data.status==true){
				toastr.success('Booked Successfully.');
				setTimeout(function(){
				window.location = "{{ url('customer/customer-dashboard') }}" },1000);
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

