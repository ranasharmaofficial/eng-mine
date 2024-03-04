@extends('frontend.layouts.master')
@section('title') All Booking  @endsection

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
                  @include('frontend.booking.partials.left-sidebar')
                </div>
                <!-- /Customer Menu -->

                <div class="col-md-8 col-lg-9">
                    <div class="row">
                        <div class="widget-title d-flex align-items-center justify-content-between">
                            <h4 class="d-none d-lg-inline-block fw-bold">All Booking List</h4>
                            <div class="d-flex align-items-center w-50 justify-content-between ms-auto">
                                <h5 class="pt-2 me-2">Sort</h5>
                                <form>
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                                My Booking <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu mt-2">
                                                <li><a href="javascript:void(0);">All Booking</a></li>
                                                <li><a href="javascript:void(0);">Upcoming</a></li>
                                                <li><a href="javascript:void(0);">Ongoing</a></li>
                                                <li><a href="javascript:void(0);">Complete</a></li>
                                                <!-- <li><a href="pending-booking.php">Pending</a></li> -->
                                                <li><a href="javascript:void(0);">Cancelled</a></li>
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

				@if(count($all_service_booking)>0)
					@foreach($all_service_booking as $val)

						@php
							$total_service_order_amount = \App\Models\OrderDetail::where('user_id', $val->user_id)->where('order_id', $val->id)->sum('total_price');

							$total_service_order_amount = \App\Models\OrderDetail::where('user_id', $val->user_id)->where('order_id', $val->id)->sum('total_price');

							$service_details = \App\Models\OrderDetail::where('user_id', $val->user_id)->where('order_id', $val->id)->get();


						@endphp

						<div class="row mt-4 border border-1 py-3 rounded">
							<!-- Details Section Start -->
							<div class="col-lg-3 position-relative">
								<img onerror="this.onerror=null;this.src='{{ static_asset('assets/assets_web/placeholder.jpg') }}';" src="assets/img/gallery/hireL1engg.jpg" alt="" class="img-fluid rounded h-100">
								<img src="assets/img/gallery/heart-icon.svg" alt=""
									class="img-fluid rounded position-absolute top-0 end-0 pe-3 pt-2 rounded-circle">
							</div>
							<div class="col-lg-9 mt-3 mt-lg-0">
								{{--
								<div class="d-flex">
									<div>
										<span class="book-item fw-bold me-5">Service Name</span>
										: Hire Onsite L1 Engineer
									</div>
									<span class="badge bg-danger text-white fw-bold ms-2 px-3">Cancelled</span>
								</div>--}}
								<ul class="booking-details">
									<li>
										<span class="book-item fw-bold">Service ID</span> : {{ $val->service_order_id }}
										<a href="javascript:void();"
											class="bg-secondary bg-opacity-25 px-2 py-1 rounded text-primary2"
											data-bs-toggle="modal" data-bs-target="#add-wallet">
											View Service
										</a>
									</li>
									<li>
										<span class="book-item fw-bold">Service Order Date</span> : {{ date("d-M-Y", strtotime($val->created_at)) }}
									</li>
									<li>
										<span class="book-item fw-bold">Amount</span> : {{ number_format($total_service_order_amount) }}
										<span class="float-end fw-bolder bg-primary2 p-1 rounded text-light">
											<a href="javascript:void()" class="text-white">Reschedule</a>
										</span>
									</li>
									<li>
										<span class="book-item fw-bold">Order Date</span> : {{ date("d-M-Y", strtotime($val->created_at)) }}
									</li>
									<li>
										<span class="book-item fw-bold">Assigned Engineer</span> : Not Yet Assigned
									</li>
									{{--<li>
										<span class="book-item fw-bold">Cancelled Date</span> : 28 Sept 2023
									</li>--}}
								</ul>
							</div>
							<!-- Details Section End -->
						</div>


						<div class="modal fade custom-modal" id="add-wallet">
							<div class="modal-dialog modal-dialog-centered modal-lg">
								<div class="modal-content">
									<div class="modal-header border-bottom-0 justify-content-between pb-0">
										<h5 class="modal-title ">Ongoing Service</h5>
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
													<td>EGMNE-ORD-00175</td>
												</tr>
												<tr>
													<td><strong>Service</strong></td>
													<td>
                                                        @foreach ($service_order_details as $items)

                                                        @endforeach
														New Installtion & Configuration, Operating System, <br>Windows Cluster Configuration, Windows Server Edition
													</td>
												</tr>
												<tr>
													<td><strong>Service Date</strong></td>
													<td>2023-02-09 13:25:00</td>
												</tr>
												<tr>
													<td><strong>Order Date</strong></td>
													<td>2023-08-23 11:25:54</td>
												</tr>
												<tr>
													<td><strong>Service location</strong></td>
													<td>Delhi, India</td>
												</tr>
												<tr>
													<td><strong>Action</strong></td>
													<td>Ongoing</td>
												</tr>
												<tr>
													<td><strong>Assigned Engineer</strong></td>
													<td>SPE0003</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>


					@endforeach
				@endif

                </div>
            </div>
        </div>
    </div>

</div>
