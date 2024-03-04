@extends('frontend.layouts.master')

@section('title')

    Show Estimate

@endsection







@section('content')

<style>
.loading-spinner {
	display: none;
}

.loading-spinner.active {
	display: inline-block; // or whatever is appropriate to display it nicely
}
</style>

    <link rel="stylesheet" href="{{ static_asset('assets/assets_web/css/calendar.css')}}">

    @include('frontend.includes.header')



    <section class="breadcrumbs-custom bg-image context-dark"

        style="background-image: url({{ static_asset('assets/assets_web/img/server-sevice.png') }}); height:369px; background-repeat: no-repeat; background-size: cover; padding-top:239px">

        <div class="container">

            <div>

                <h2 class="breadcrumbs-custom-title text-dark">Booking</h2>

                <ul class="breadcrumbs-custom-path">

                    <li><a href="{{ url('') }}">Home<i class="fa fa-arrow-right px-2" aria-hidden="true"></i></a></li>

                    <li class="active" style="color:#ff008a;">Booking </li>

                </ul>

            </div>

        </div>

    </section>

    <div class="bg-img">

        <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png') }}" alt="img" class="bgimg1">

        <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png') }}" alt="img" class="bgimg2">

        <img src="{{ static_asset('assets/assets_web/img/bg/feature-bg-03.png') }}" alt="img" class="bgimg3 w-50">

    </div>

    <section id="service-details" class="py-5">



        <div class="content position-relative">

            <div class="container">

                <div class="row">



                    <!-- Booking -->

                    <div class="col-md-12">



                        <div class="login-back">

                            <a href="{{ url('show-estimate/'.$temp_order_id) }}"><i class="feather-arrow-left"></i> Back</a>

                        </div>



                        <!-- Booking Step -->

                        <ul class="step-register row  position-relative">

                            <li class="active col-md-4">

                                <div class="multi-step-icon">

                                    <img src="{{ static_asset('assets/assets_web/img/icons/calendar-icon.svg') }}"

                                        alt="img">

                                </div>

                                <div class="multi-step-info">

                                    <h6>Appointment</h6>

                                    <p>Choose time & date for the service</p>

                                </div>

                            </li>

                            <li class="col-md-4">

                                <div class="multi-step-icon">

                                    <img src="{{ static_asset('assets/assets_web/img/icons/wallet-icon.svg') }}"

                                        alt="img">

                                </div>

                                <div class="multi-step-info">

                                    <h6>Appointment time date</h6>

                                    <p>Select Payment Gateway</p>

                                </div>

                            </li>

                            <li class="col-md-4">

                                <div class="multi-step-icon">

                                    <img src="{{ static_asset('assets/assets_web/img/icons/book-done.svg') }}"

                                        alt="img">

                                </div>

                                <div class="multi-step-info">

                                    <h6>Done </h6>

                                    <p>Completion of Booking</p>

                                </div>

                            </li>

                        </ul>



                        <!-- /Booking Step -->



					@php

						//$temp_order_details = \App\Models\TempOrderDetail::groupBy('category_id')->where('temp_order_id', $temp_order_id)->get();



						// $temp_order_details = DB::table('temp_order_details')->select('*')->where('temp_order_id', $temp_order_id)->get();
						
						$temp_order_details = \App\Models\TempOrderDetail::select('temp_order_details.*', 'cat.name as category_name', 'subcat.name as subcategory_name', 's.name as service_name', 'sub.name as sub_service_name')
				->leftJoin('service_categories as cat', 'cat.id', '=', 'temp_order_details.category_id')
				->leftJoin('service_sub_categories as subcat', 'subcat.id', '=', 'temp_order_details.subcategory_id')
				->leftJoin('services as s', 's.id', '=', 'temp_order_details.service_id')
				->leftJoin('sub_services as sub', 'sub.id', '=', 'temp_order_details.subservice_id')
				->where('temp_order_id', $temp_order_id)
				->where('temp_order_details.status', 1)
				->latest()->get();

					@endphp



					@foreach($temp_order_details as $key => $item)



					@php

						$category = $item->category_id;

						$subcategory = $item->subcategory_id;

						$service_category = \App\Models\ServiceCategory::where('id', $category)->first();

						$service_subcategory = \App\Models\ServiceSubCategory::where('id', $subcategory)->first();

					@endphp

                        <!-- Appointment -->

                        <div class="booking-service">

                            <div class="row">

                                <div class="col-lg-6">

                                    <div class="service-book">

                                        <div class="service-book-img">

                                            <img src="{{ static_asset('assets/assets_web/img/booking.jpg') }}"

                                                alt="img">

                                        </div>

                                        <div class="serv-profile">

                                            <h2>{{ $item->category_name }}</h2>
											<span class="badge">{{ $item->subcategory_name }}</span>
											<span class="badge">{{ $item->service_name }} ({{ $item->sub_service_name }})</span>
											<span class="badge">@if($item->activity_type=='on_site') On Site @else Off Site @endif</span>

												 

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-6 d-none">

                                    <div>

                                        <h6 class="bg-info bg-opacity-10 p-2 rounded">

                                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>

                                            Order Including Services

                                        </h6>

                                    </div>

                                    <h6 class="text-black ps-4 fw-normal">

                                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>

                                        Operating System Windows Cluster Configuration

                                    </h6>

                                    <h6 class="text-black ps-4 fw-normal">

                                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>

                                        New Installation & Configuration

                                    </h6>

                                    <h6 class="text-black ps-4 fw-normal">

                                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>

                                        Windows Server Addition

                                    </h6>

                                    <h6 class="text-black ps-4 fw-normal">

                                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>

                                        New Operating System Installation

                                    </h6>

                                    <h6 class="text-black ps-4 fw-normal">

                                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>

                                        Linux Server Interanate Connection Set up

                                    </h6>

                                </div>

                            </div>

                        </div>

					@endforeach



                        <form action="#" id="book-appointment">

                            @csrf

                            <div class="book-form">



                                <div style="display:none;" id="show-form-error" class="alert alert-danger">

                                    <ul>

                                        <div class="errorMsgntainer"></div>

                                    </ul>

                                </div>





                                <div class="row">
 
                                     <div class="col-md-12">

                                        <div class="form-group">
											<label class="col-form-label">Location</label>
											<input type="text" value="{{ $tempOrderDetails->service_location }}" name="service_location" id="service_location" class="form-control">
										</div>

                                    </div>
									
									<div class="col-md-6">

                                        <div class="form-group">
											<label class="col-form-label">Service Date</label>
											<input type="date" value="{{ $tempOrderDetails->app_date }}" name="app_date" id="app_date" class="form-control">
										</div>

                                    </div>
									
									<div class="col-md-6">

                                        <div class="form-group">
											<label class="col-form-label">Service Time</label>
											<input type="time" value="{{ $tempOrderDetails->app_time }}" name="app_time" id="app_time" class="form-control">
										</div>

                                    </div>
									
								<input type="hidden" id="temp_order_id" name="temp_order_id" value="{{ $temp_order_id }}">
								
								@if(false)
                                    <div class="col-md-3">

                                        <div class="form-group">

                                            <label class="col-form-label">Location</label>

                                            <input type="hidden" id="temp_order_id" name="temp_order_id" value="{{ $temp_order_id }}">

                                            <input type="text" placeholder="Your Location" name="location" id="location"

                                                class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-3">

                                        <div class="form-group">

                                            <label class="col-form-label">Landmark</label>

                                            <input type="text" name="landmark" id="landmark"

                                                placeholder="Your Landmark" class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-2">

                                        <div class="form-group">

                                            <label class="col-form-label">Pincode</label>

                                            <input type="number" id="pincode" onchange="get_state_city()"

                                                name="pincode" placeholder="Your Pincode" class="form-control">

                                            <span class="text-warning form-text font-weight-bold"

                                                id="wrong_pincode"></span>

                                        </div>

                                    </div>



                                    <div class="col-md-2">

                                        <div class="form-group">

                                            <label class="col-form-label">City</label>

                                            <input type="text" name="city" id="city" placeholder="Your City"

                                                class="form-control">

                                        </div>

                                    </div>



                                    <div class="col-md-2">

                                        <div class="form-group">

                                            <label class="col-form-label">State</label>

                                            <input type="text" name="state" id="state" placeholder="Your State"

                                                class="form-control">

                                        </div>

                                    </div>

								@endif





                                </div>

                            </div>

                            <!-- /Appointment -->





                            <!-- Appointment Date & Time -->

                            <div class="row">

                                <div class="col-lg-4 d-none">

                                    {{-- <div class="book-title">

										<h5>Appointment Date</h5>

									</div>

									<div id="datetimepickershow"></div> --}}



                                    <header class="dhx_sample-header">

                                        <div class="dhx_sample-header__main">

                                            <nav class="dhx_sample-header__breadcrumbs">

                                                <ul class="dhx_sample-header-breadcrumbs">

                                                    <li class="dhx_sample-header-breadcrumbs__item">

                                                        <!-- <a href="./index.html" class="dhx_sample-header-breadcrumbs__link">Back to Calendar samples</a> -->

                                                    </li>

                                                </ul>

                                            </nav>

                                            <h1 class="dhx_sample-header__title">

                                                <div class="dhx_sample-header__content">

                                                    <h4>Appointment Date</h4>

                                                    <section class="dhx_sample-container">

                                                        <div id="calendar" style="padding: 20px; margin: auto; width:auto !important;"></div>

                                                    </section>

                                                </div>

                                            </h1>

                                        </div>

                                    </header>

                                </div>

                                <div class="col-lg-12">

                                    <div class="row d-none">

                                        <div class="col-md-12">

                                            <div class="book-title">

                                                <h5>Appointment Time</h5>

                                                 

                                            </div>

                                        </div>

                                    </div>



                                    <div class="token-slot mt-2 d-none">

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="09.00 AM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">09.00 AM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="09.30 AM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">09.30 AM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="10.00 AM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">10.00 AM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="10.30 AM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">10.30 AM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="11.00 AM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">11.00 AM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="11.30 AM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">11.30 AM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="12.00 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">12.00 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="12.30 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">12.30 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="01.00 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">01.00 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="01.30 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">01.30 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="02.00 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">02.00 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="02.30 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">02.30 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="03.00 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">03.00 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="03.30 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">03.30 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="04.00 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">04.00 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="04.30 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">04.30 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="05.00 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">05.00 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="05.30 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">05.30 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="06.00 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">06.00 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="06.30 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">06.30 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="07.00 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">07.00 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="07.30 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">07.30 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="08.00 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">08.00 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="08.30 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">08.30 PM</span>

                                            </label>

                                        </div>

                                        <div class="form-check-inline visits me-0">

                                            <label class="visit-btns">

                                                <input type="radio" class="form-check-input" value="09.00 PM"

                                                    id="app_time" name="app_time">

                                                <span class="visit-rsn">09.00 PM</span>

                                            </label>

                                        </div>

                                    </div>

                                    <div class="book-submit text-end">

                                        <a href="#" class="btn btn-secondary">Cancel</a>

                                        <button type="button" id="book_appointment" class="btn btn-primary book_appointment"><i class="fa fa-spinner loading-spinner" aria-hidden="true"></i> Book Appointment</button>

                                        <!--<a href="booking-payment.php" class="btn btn-primary">Book Appointment</a>-->

                                    </div>





                                </div>

                            </div>

                            <!-- /Appointment Date & Time -->

                        </form>

                    </div>

                    <!-- /Booking -->



                </div>

            </div>

        </div>

    </section>

    <!-- Cursor -->

    <div class="mouse-cursor cursor-outer"></div>

    <div class="mouse-cursor cursor-inner"></div>

    <!-- /Cursor -->

    <script src="{{ static_asset('assets/assets_web/js/moment.min.js') }}"></script>

    <script src="{{ static_asset('assets/assets_web/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script src="{{ static_asset('assets/assets_web/js/calendar.js')}}"></script>



    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>



    <script>

        $(document).on('click', '.book_appointment', function(e) {

            e.preventDefault();
			var clk_btn = $("#book_appointment");

            clk_btn.prop('disabled', true);
			$('.loading-spinner').toggleClass('active');
			// var formData = new FormData(this);

            var formData = new FormData(document.getElementById("book-appointment"));

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

                    console.log('status ' + data.status);
$('.loading-spinner').toggleClass('active');
                    if (data.status == true) {

                        //toastr.success('Login Successfull.');

                        setTimeout(function() {

                            window.location =

                                "{{ url('service-booking-second/' . $temp_order_id) }}"

                        }, 1000);

                    } else {

                        // toastr.error('Login Failed.');

                    }





                },

                error: function(err) {


				clk_btn.prop('disabled', false);
				$('.loading-spinner').removeClass('active');
                    document.getElementById('show-form-error').style = "display: block";

                    let error = err.responseJSON;

                    console.log(error);

                    $.each(error.errors, function(index, value) {

                        $('.errorMsgntainer').append('<span class="text-danger">' + value +

                            '<span>' + '<br>');

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



<script>

    const calendar = new dhx.Calendar("calendar", {

        timePicker: true,

        value: new Date(),

        css: "dhx_widget--bordered"

    });

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

