@extends('frontend.layouts.master')
@section('title') Ongoing  Booking  @endsection

@section('content')


<div class="main-wrapper">
@include('frontend.engineer.partials.engineer_dash_header')

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
                    <div class="row">
                        <div class="widget-title d-flex align-items-center justify-content-between">
                            <h4 class="d-none d-lg-inline-block fw-bold">Ongoing Booking List</h4>
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

				@if(count($service_booking)>0)
					@foreach($service_booking as $key => $val)

						@php

							$total_service_order_amount = \App\Models\OrderDetail::where('user_id', $val->user_id)->where('order_id', $val->id)->sum('total_price');
							$total_service_order_amount = \App\Models\OrderDetail::where('user_id', $val->user_id)->where('order_id', $val->id)->sum('total_price');

							$service_order = \App\Models\Order::where('user_id', $val->user_id)->where('id', $val->order_id)->first();

						$category = $val->category_id;
						$subcategory = $val->subcategory_id;
						$service = $val->service_id;
						$service_category = \App\Models\ServiceCategory::where('id', $category)->first();
						$service_subcategory = \App\Models\ServiceSubCategory::where('id', $subcategory)->first();
						$service_name = \App\Models\Service::where('id', $service)->first();
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
										<span class="book-item fw-bold me-5">Service Name -  {{ $category }}, {{ $subcategory }}</span>
										: {{ $service_category->name }}
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
										<span class="book-item fw-bold">Quantity</span> : {{ $val->qty }}
										<span class="float-end fw-bolder bg-primary2 p-1 rounded text-light d-none">
											<a href="javascript:void()" class="text-white">Reschedule</a>
										</span>
									</li>

									<li>
										<span class="book-item fw-bold">Amount</span> : {{ number_format($total_service_order_amount) }}
										<span class="float-end fw-bolder bg-primary2 p-1 rounded text-light d-none">
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





					@endforeach
				@endif

				@if(count($service_booking)>0)
					@foreach($service_booking as $key => $val)

						@php

							$total_service_order_amount = \App\Models\OrderDetail::where('user_id', $val->user_id)->where('order_id', $val->id)->sum('total_price');
							$total_service_order_amount = \App\Models\OrderDetail::where('user_id', $val->user_id)->where('order_id', $val->id)->sum('total_price');

							$service_order = \App\Models\Order::where('user_id', $val->user_id)->where('id', $val->order_id)->first();

						$category = $val->category_id;
						$subcategory = $val->subcategory_id;
						$service = $val->service_id;
						$service_category = \App\Models\ServiceCategory::where('id', $category)->first();
						$service_subcategory = \App\Models\ServiceSubCategory::where('id', $subcategory)->first();
						$service_name = \App\Models\Service::where('id', $service)->first();
					@endphp

				<div class="modal fade custom-modal" id="add-wallet{{$key+1}}">
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
													<td>{{ $service_order->service_order_id }}</td>
												</tr>
												<tr>
													<td><strong>Service</strong></td>
													<td>

													 {{ $service_subcategory->name }} , {{ $service_name->name }}


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
													<td>{{ $service_order->location }}, {{ $service_order->landmark }}, {{ $service_order->city }}, {{ $service_order->state }}-{{ $service_order->pincode }}</td>
												</tr>
												<tr>
													<td><strong>Action</strong></td>
													<td>
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
													</td>
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
