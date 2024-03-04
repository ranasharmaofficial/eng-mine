@extends('frontend.layouts.master')
@section('title') Engineer Dashboard  @endsection
@section('content')

@include('frontend.engineer.partials.engineer_dash_header')
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
						<div class="widget-title">
							<h4>Welcome to Engineer Dashboard</h4>
						</div>

						<!-- Dashboard Widget -->
						<div class="row">
							<div class="col-md-6 col-lg-3">
								<div class="dash-widget">
									<div class="dash-img">
										<span class="dash-icon bg-yellow">
											<i class="fa fa-users" aria-hidden="true"></i>
										</span>
									</div>
									<div class="dash-info">
										<div class="dash-order">
											<h5>{{ $inProgressJobs }}</h5>
											<h6>Ongoing Jobs</h6>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-3">
								<div class="dash-widget">
									<div class="dash-img">
										<span class="dash-icon bg-yellow">
											<i class="fa fa-users" aria-hidden="true"></i>
										</span>
									</div>
									<div class="dash-info">
										<div class="dash-order">
											<h5>{{ $countUpcomingJobs }}</h5>
											<h6>Upcoming Jobs</h6>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-3">
								<div class="dash-widget">
									<div class="dash-img">
										<span class="dash-icon bg-yellow">
											<i class="fa fa-users" aria-hidden="true"></i>
										</span>
									</div>
									<div class="dash-info">
										<div class="dash-order">
											<h5>{{ $completedJobs }}</h5>
											<h6>Completed Jobs</h6>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-3">
								<div class="dash-widget">
									<div class="dash-img">
										<span class="dash-icon bg-yellow">
											<i class="fa fa-users" aria-hidden="true"></i>
										</span>
									</div>
									<div class="dash-info">
										<div class="dash-order">
											<h5>{{ $totalJobs }}</h5>
											<h6>Total Jobs</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Dashboard Widget -->

						<div class="row">
                        <!-- Recent Booking -->
                        <div class="col-lg-6 d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="user-title">Ongoing Services</h6>
                                <a href="{{ url('engineer/ongoing-job') }}" class="btn btn-light-danger border my-1 h-auto lh-base rounded-pill py-3 text-white me-3">
                                    View All <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="table-responsive recent-booking flex-fill scrollbar-width">
                                <table class="table mb-0">
                                    <tbody>
                                       @if(count($ongoingJobsList)>0)
										@foreach($ongoingJobsList as $key => $val)
											<tr>
												<td>
													<h2 class="table-avatar ps-0">
														<a href="#" class="avatar avatar-m me-2">
															<i class="fa fa-users" aria-hidden="true"></i>
														</a>
														<a href="#">{{ $val->service_order_id }}
															<span><i class="feather-calendar"></i> {{ date("d-M-Y", strtotime($val->order_date)) }}</span>
														</a>
													</h2>
													
													 
												</td>
												 
												<td class="text-center p-0">
													<a href="javascript:void();" class="btn btn-view btn-primary2 rounded-pill" data-bs-toggle="modal" data-bs-target="#ongoingModal{{$key+1}}">
														View More
													</a>
												</td>
											</tr>
										@endforeach
									@endif
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        <!-- /Recent Booking -->

                        <!-- Upcoming Services -->
                        <div class="col-lg-6 d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="user-title">Upcoming Services</h6>
                                <a href="{{ url('engineer/upcoming-job') }}"
                                    class="btn btn-view-all btn-primary2 rounded-pill lh-base py-3 text-white me-3">
                                    View All <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="table-responsive transaction-table flex-fill scrollbar-width">
                                <table class="table mb-0">
                                    <tbody>
                                       @if(count($UpcomingJobsList)>0)
										@foreach($UpcomingJobsList as $key => $val)
											<tr>
												<td>
													<h2 class="table-avatar ps-0">
														<a href="#" class="avatar avatar-m me-2">
															<i class="fa fa-users" aria-hidden="true"></i>
														</a>
														<a href="#">{{ $val->service_order_id }}
															<span><i class="feather-calendar"></i> {{ date("d-M-Y", strtotime($val->order_date)) }}</span>
														</a>
													</h2>
													
													 
												</td>
												 
												<td class="text-center p-0">
													<a href="javascript:void();" class="btn btn-view btn-primary2 rounded-pill" data-bs-toggle="modal" data-bs-target="#upcomingModal{{$key+1}}">
														View More
													</a>
												</td>
											</tr>
										@endforeach
									@endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /Recent Transaction -->
                    </div>
					</div>

				</div>

			</div>
		</div>
		
	@if(count($UpcomingJobsList)>0)
		@foreach($UpcomingJobsList as $key => $val)	 
			<!-- Add Wallet -->
			<div class="modal fade custom-modal" id="upcomingModal{{$key+1}}">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header border-bottom-0 justify-content-between pb-0">
							<h5 class="modal-title">Booked Service Detail</h5>
							<button type="button" class="close-btn px-2 border-0 rounded-circle" data-bs-dismiss="modal"
								aria-label="Close"><i class="fa fa-times"></i>
							</button>
						</div>
						<hr>
						<div class="modal-body pt-0">
							<table class="table w-100">
								<thead></thead>
								<tbody>
									<tr>
										<td><strong>Job ID</strong></td>
										<td>{{ $val->service_order_id }}</td>
									</tr>
									<tr>
										<td><strong>Customer Name</strong></td>
										<td>{{ $val->first_name }} {{ $val->last_name }}</td>
									</tr>
									<tr>
										<td><strong>Contact Number</strong></td>
										<td>+91-{{ $val->mobile }}</td>
									</tr>
									<tr>
										<td><strong>Email ID</strong></td>
										<td>{{ $val->email }}</td>
									</tr>
									<tr>
										<td><strong>Order Date</strong></td>
										<td>{{ date("d-M-Y", strtotime($val->order_date)) }}</td>
									</tr>
									 @php
										$orderDetails = \App\Models\OrderDetail::select('order_details.*', 'cat.name as category_name', 'subcat.name as subcategory_name', 's.name as service_name', 'sub.name as sub_service_name')
											->leftJoin('service_categories as cat', 'cat.id', '=', 'order_details.category_id')
											->leftJoin('service_sub_categories as subcat', 'subcat.id', '=', 'order_details.subcategory_id')
											->leftJoin('services as s', 's.id', '=', 'order_details.service_id')
											->leftJoin('sub_services as sub', 'sub.id', '=', 'order_details.subservice_id')
											->where('order_id', $val->id)
											->where('order_details.status', 2)
											->latest()->get();
									@endphp
												
												
												@if(count($orderDetails)>0)
													 
													@foreach($orderDetails as $item)
														<tr>
															<td><strong>Service:</strong> </br>{{ $item->category_name }}</td>
															 
															<td>{{ $item->subcategory_name }}, </br>{{ $item->service_name }} ,  </br>{{ $item->sub_service_name }}</td>
														</tr>
														 
													@endforeach
												@endif
												
									<tr>
										<td><strong>Service Location</strong></td>
										<td>{{ $val->location.', '.$val->landmark.', '.$val->city.', '.$val->state.' - '.$val->pincode}}</td>
									</tr>
									
									 
									
									<tr>
										<td><strong>Action Status</strong></td>
										<td style="text-transform:uppercase;font-weight-bold;">{{ $val->status }}</td>
									</tr>
									
								</tbody>
							</table>



						</div>
					</div>
				</div>
			</div>
			<!-- /Add Wallet -->
		@endforeach
	@endif
	
	@if(count($ongoingJobsList)>0)
		@foreach($ongoingJobsList as $key => $val)	 
			<!-- Add Wallet -->
			<div class="modal fade custom-modal" id="ongoingModal{{$key+1}}">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header border-bottom-0 justify-content-between pb-0">
							<h5 class="modal-title">Booked Service Detail</h5>
							<button type="button" class="close-btn px-2 border-0 rounded-circle" data-bs-dismiss="modal"
								aria-label="Close"><i class="fa fa-times"></i>
							</button>
						</div>
						<hr>
						<div class="modal-body pt-0">
							<table class="table w-100">
								<thead></thead>
								<tbody>
									<tr>
										<td><strong>Order ID</strong></td>
										<td>{{ $val->service_order_id }}</td>
									</tr>
									<tr>
										<td><strong>Customer Name</strong></td>
										<td>{{ $val->first_name }} {{ $val->last_name }}</td>
									</tr>
									<tr>
										<td><strong>Contact Number</strong></td>
										<td>+91-{{ $val->mobile }}</td>
									</tr>
									<tr>
										<td><strong>Email ID</strong></td>
										<td>{{ $val->email }}</td>
									</tr>
									 
									<tr>
										<td><strong>Order Date</strong></td>
										<td>{{ date("d-M-Y", strtotime($val->order_date)) }}</td>
									</tr>
									 
									@php
										$orderDetails = \App\Models\OrderDetail::select('order_details.*', 'cat.name as category_name', 'subcat.name as subcategory_name', 's.name as service_name', 'sub.name as sub_service_name')
											->leftJoin('service_categories as cat', 'cat.id', '=', 'order_details.category_id')
											->leftJoin('service_sub_categories as subcat', 'subcat.id', '=', 'order_details.subcategory_id')
											->leftJoin('services as s', 's.id', '=', 'order_details.service_id')
											->leftJoin('sub_services as sub', 'sub.id', '=', 'order_details.subservice_id')
											->where('order_id', $val->id)
											->where('order_details.status', 2)
											->latest()->get();
									@endphp
												
												
												@if(count($orderDetails)>0)
													 
													@foreach($orderDetails as $item)
														<tr>
															<td><strong>Service:</strong> </br>{{ $item->category_name }}</td>
															 
															<td>{{ $item->subcategory_name }}, </br>{{ $item->service_name }} ,  </br>{{ $item->sub_service_name }}</td>
														</tr>
														 
													@endforeach
												@endif
												
									<tr>
										<td><strong>Service Location</strong></td>
										<td>{{ $val->location.', '.$val->landmark.', '.$val->city.', '.$val->state.' - '.$val->pincode}}</td>
									</tr>
									
									<tr>
										<td><strong>Action Status</strong></td>
										<td style="text-transform:uppercase;font-weight-bold;">{{ $val->status }}</td>
									</tr>
									<tr>
										<td><strong>Job</strong></td>
										<td>Process</td>
									</tr>
								</tbody>
							</table>



						</div>
					</div>
				</div>
			</div>
			<!-- /Add Wallet -->
		@endforeach
	@endif
		<!-- /Cursor -->
	</div>
	
	 
@endsection
