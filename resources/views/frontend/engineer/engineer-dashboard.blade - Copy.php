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
                                <a href="{{ url('engineer/ongoing-booking') }}" class="btn btn-light-danger border my-1 h-auto lh-base rounded-pill py-3 text-white me-3">
                                    View All <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="table-responsive recent-booking flex-fill scrollbar-width">
                                <table class="table mb-0">
                                    <tbody>
									@if(count($ongoingJobsList)>0)
										@foreach($ongoingJobsList as $key => $val)

												@php
													$total_service_order_amount = \App\Models\OrderDetail::where('engineer_id', $val->engineer_id)->where('order_id', $val->id)->sum('total_price');
													$total_service_order_amount = \App\Models\OrderDetail::where('engineer_id', $val->engineer_id)->where('order_id', $val->id)->sum('total_price');
													$service_order = \App\Models\Order::where('engineer_id', $val->engineer_id)->where('id', $val->order_id)->first();
												 
												$category = $val->category_id;
												$subcategory = $val->subcategory_id;
												$service = $val->service_id;
												$service_category = \App\Models\ServiceCategory::where('id', $category)->first();
												$service_subcategory = \App\Models\ServiceSubCategory::where('id', $subcategory)->first();
												$service_name = \App\Models\Service::where('id', $service)->first();
											@endphp
					
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar ps-0">
                                                    <a href="#" class="avatar avatar-m me-2">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#">{{ $service_category->name }}
                                                        <span><i class="feather-calendar"></i> {{ date("d-M-Y", strtotime($val->created_at)) }}</span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-center p-0">
                                                <a href="javascript:void();" class="btn btn-view btn-primary2 rounded-pill" data-bs-toggle="modal" data-bs-target="#add-wallet">
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
                                <a href="{{ url('engineer/upcoming-booking') }}"
                                    class="btn btn-view-all btn-primary2 rounded-pill lh-base py-3 text-white me-3">
                                    View All <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="table-responsive transaction-table flex-fill scrollbar-width">
                                <table class="table mb-0">
                                    <tbody>
                                       @if(count($UpcomingJobsList)>0)
										@foreach($UpcomingJobsList as $key => $val)

												@php
												
													$total_service_order_amount = \App\Models\OrderDetail::where('engineer_id', $val->engineer_id)->where('order_id', $val->id)->sum('total_price');
													$total_service_order_amount = \App\Models\OrderDetail::where('engineer_id', $val->engineer_id)->where('order_id', $val->id)->sum('total_price');
													
													$service_order = \App\Models\Order::where('engineer_id', $val->engineer_id)->where('id', $val->order_id)->first();
												 
												$category = $val->category_id;
												$subcategory = $val->subcategory_id;
												$service = $val->service_id;
												$service_category = \App\Models\ServiceCategory::where('id', $category)->first();
												$service_subcategory = \App\Models\ServiceSubCategory::where('id', $subcategory)->first();
												$service_name = \App\Models\Service::where('id', $service)->first();
											@endphp
					
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar ps-0">
                                                    <a href="#" class="avatar avatar-m me-2">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#">{{ $service_category->name }}
                                                        <span><i class="feather-calendar"></i> {{ date("d-M-Y", strtotime($val->created_at)) }}</span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-center p-0">
                                                <a href="javascript:void();" class="btn btn-view btn-primary2 rounded-pill" data-bs-toggle="modal" data-bs-target="#add-wallet">
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
		<?php 
            //include 'include/footer.php';
        ?>
		<!-- /Cursor -->
	</div>
	
	 
@endsection
