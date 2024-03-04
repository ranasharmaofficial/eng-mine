@extends('admin.include.master')
@section('title', 'Dashboard')
@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
			<div class="page-header mb-0 pt-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="breadcrumb "><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a> </div>
                        </div>
                        <div class="col"> </div>
                    </div>
                </div>
                <hr> 
				<div class="row">
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box  mt-1 card_border_12">
							<div class="small-box bg-info px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<div><h3 class="text-white">{{ $totalCustomer }}</h3></div>
									<div><i class="bi-people text-white fx-4"></i></div>
								</div>
									<p class="text-white">Registered Customer</p>
								</div>
							 

							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box  mt-1 card_border_12">
						<div class="small-box bg-warning  px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<div><h3 class="text-white">{{ $totalEngineer }}</h3></div>
									<div bg-light><i class="bi-box text-white fs-4"></i></div>

									</div>
									<p class="text-white">Registered Engineers</p>
								</div>
								 

							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box  mt-1">
								<div class="small-box bg-danger  px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<h3 class="text-white">3</h3>
									<i class="bi-briefcase-fill text-white fs-4"></i>
									</div>
									<p class="text-white">Current Jobs</p>
								</div>
								 

							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box  mt-1">
						<div class="small-box bg-success  px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<h3 class="text-white">{{ $countUpcomingServiceOrder }}</h3>
									<i class="bi-chevron-compact-right text-white fs-4"></i>
								</div>
									<p class="text-white">Upcoming Jobs</p>
								</div>
							 

							</div>
						</div>
					</div>
 
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box mt-1 ">
								<div class="small-box bg-danger  px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<h3 class="text-white">{{ $completedServiceOrder }}</h3>
									<i class="bi-award-fill text-white fs-4"></i>
								</div>
									<p class="text-white">Completed Jobs</p>
								</div>
							 

							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box mt-1  ">
						<div class="small-box bg-primary  px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<h3 class="text-white">{{ $totalServiceOrder }}</h3>
									<i class="bi-bag-fill text-white fs-4"></i>
								</div>
									<p class="text-white">Total Orders</p>
								</div>
								 

							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box  mt-1">
						<div class="small-box bg-info  px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<h3 class="text-white">{{ $pendingServiceOrder }}</h3>
									<i class="bi-bag-x-fill text-white fs-4"></i>
								</div>
									<p class="text-white">Total Pending Order</p>
								</div>
								 

							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats statistic-box  mt-1">
						<div class="small-box bg-warning  px-3 py-4 rounded">
								<div class="inner border-bottom">
								<div class="d-flex justify-content-between">
									<h3 class="text-white">{{ $completedServiceOrder }}</h3>
									<i class="bi-bag-plus-fill text-white fs-4"></i>
</div>
									<p class="text-white">Total Complete Order</p>
								</div>
								  
							</div>
						</div>
					</div>
				</div>

<!-- 
				<div class="row">
					<div class="col-md-12 col-lg-6">
						<div class="card card-chart">
							<div class="card-header">
							<h5 class="mb-md-0 h6">Visitors</h5> 
							</div>
							<div class="card-body">
								<div id="line-chart"></div>
							</div>
						</div>
					</div>

					<div class="col-md-12 col-lg-6">
						<div class="card card-chart">
							<div class="card-header">
							<h5 class="mb-md-0 h6">Service </h5> 
							</div>
							<div class="card-body">
								<div id="donut-chart"></div>
							</div>
						</div>
					</div>
				</div> --> 

				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card card-chart">
							<div class="card-header">
							<h5 class="mb-md-0 h6">Recently Customer Registered</h5> 
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-stripped table table-hover table-center mb-0">
										<thead class="thead-light">
										  <tr>
											 <th>Username </th>
											 <th>Customer Name </th>
											 <th>Contact No</th>
											 <th>Address</th>
											 <th>Registered At</th>
										  </tr>
										</thead>
									   <tbody>
								@if(count($recentlyCustomerAdded)>0)
									@foreach($recentlyCustomerAdded as $key => $val)
										<tr>
											 <td class="text-light-success">{{ $val->username }}</td>
											 <td class="text-light-success">{{ $val->first_name.' '.$val->last_name }}</td>
											 <td class="text-light-success">{{ $val->mobile }}</td>
											 <td class="text-light-success">{{ $val->address }}</td>
											 <td class="text-light-success">{{ date('d M, Y', strtotime($val->created_at)) }}</td>
										</tr>
									@endforeach
								@endif

									   
								   </tbody>
								</table>
									 
								</div>
							</div>
						</div>
					</div>

				</div>
				
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card card-chart">
							<div class="card-header">
							<h5 class="mb-md-0 h6">Recently Engineer Registered</h5> 
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-stripped table table-hover table-center mb-0">
										<thead class="thead-light">
										  <tr>
											 <th>Username </th>
											 <th>Engineer Name </th>
											 <th>Contact No</th>
											 <th>Address</th>
											 <th>Registered At</th>
										  </tr>
										</thead>
									   <tbody>
								@if(count($recentlyEngineerAdded)>0)
									@foreach($recentlyEngineerAdded as $key => $val)
										<tr>
											 <td class="text-light-success">{{ $val->username }}</td>
											 <td class="text-light-success">{{ $val->first_name.' '.$val->last_name }}</td>
											 <td class="text-light-success">{{ $val->mobile }}</td>
											 <td class="text-light-success">{{ $val->address }}</td>
											 <td class="text-light-success">{{ date('d M, Y', strtotime($val->created_at)) }}</td>
										</tr>
									@endforeach
								@endif

									   
								   </tbody>
								</table>
									 
								</div>
							</div>
						</div>
					</div>

				</div>
				
				
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card card-chart">
							<div class="card-header">
							<h5 class="mb-md-0 h6">Ongoing Jobs</h5> 
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-stripped table table-hover table-center mb-0">
										<thead class="thead-light">
										  <tr>
											 <th>Job Id </th>
											 <th>Customer Name </th>
											 <th>Contact No</th>
											 <th>Engineer Details</th>
											 <th>Service Date </th>
											 <th>Action Status </th>
											 <th>Job</th>
											 <th>Status</th>
										  </tr>
										</thead>
									   <tbody>
								@if(count($ongoingJobsList)>0)
									@foreach($ongoingJobsList as $key => $val)
										<tr>
											 <td class="text-light-success">{{ $val->service_order_id }}</td>
											 <td class="text-light-success">{{ $val->first_name.' '.$val->last_name }}</td>
											 <td class="text-light-success">{{ $val->mobile }}</td>
											 <td class="text-light-success">{{ $val->eng_first_name.' '.$val->eng_last_name }}-({{ $val->eng_username }})</td>
											 <td class="text-light-success">{{ date('d-M-Y', strtotime($val->service_date )) }}</td>
											 <td class="text-light-success">
												<p style="text-transform:uppercase">{{ $val->job_accept }}</p>
											</td>
											 <td class="text-light-success">
												@if($val->job_accept=='accept')
													<button onclick="updateStartJobStatus(this)" style="background-color:green !important;" id="{{ $val->id }}" class="btn btn-success">Complete</button>
												@endif
											 </td>
											 <td>
												<a href="{{ url('admin/order/order-view/'.$val->order_id) }}">View Details</a>
											 </td>
										</tr>
									@endforeach
								@endif

									   
								   </tbody>
								</table>
									 
								</div>
							</div>
						</div>
					</div>

				</div>
				
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card card-chart">
							<div class="card-header">
							<h5 class="mb-md-0 h6">Upcoming Jobs</h5> 
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-stripped table table-hover table-center mb-0">
										<thead class="thead-light">
										  <tr>
											 <th>Job Id </th>
											 <th>Customer Name </th>
											 <th>Contact No</th>
											 <th>Engineer Details</th>
											 <th>Service Date </th>
											 <th>Action Status </th>
											 <th>Job</th>
											 <th>Status</th>
										  </tr>
										</thead>
									   <tbody>
								@if(count($UpcomingJobsList)>0)
									@foreach($UpcomingJobsList as $key => $val)
										<tr>
											 <td class="text-light-success">{{ $val->service_order_id }}</td>
											 <td class="text-light-success">{{ $val->first_name.' '.$val->last_name }}</td>
											 <td class="text-light-success">{{ $val->mobile }}</td>
											 <td class="text-light-success">{{ $val->eng_first_name.' '.$val->eng_last_name }}-({{ $val->eng_username }})</td>
											 <td class="text-light-success">{{ date('d-M-Y', strtotime($val->service_date )) }}</td>
											 <td class="text-light-success">
												<p style="text-transform:uppercase">{{ $val->job_accept }}</p>
											</td>
											 <td class="text-light-success">
												@if($val->job_accept=='accept')
													<button onclick="updateStartJobStatus(this)" style="background-color:green !important;" id="{{ $val->id }}" class="btn btn-success">Complete</button>
												@endif
											 </td>
											 <td>
												<a href="{{ url('admin/order/order-view/'.$val->order_id) }}">View Details</a>
											 </td>
										</tr>
									@endforeach
								@endif

									   
								   </tbody>
								</table>
									 
								</div>
							</div>
						</div>
					</div>

				</div>
				
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card card-chart">
							<div class="card-header">
							<h5 class="mb-md-0 h6">Recently Completed Jobs</h5> 
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-stripped table table-hover table-center mb-0">
										<thead class="thead-light">
										  <tr>
											 <th>Job Id </th>
											 <th>Customer Name </th>
											 <th>Contact No</th>
											 <th>Engineer Details</th>
											 <th>Service Date </th>
											 <th>Action Status </th>
											 <th>Job</th>
											 <th>Status</th>
										  </tr>
										</thead>
									   <tbody>
								@if(count($recentlyCompletedJobsList)>0)
									@foreach($recentlyCompletedJobsList as $key => $val)
										<tr>
											 <td class="text-light-success">{{ $val->service_order_id }}</td>
											 <td class="text-light-success">{{ $val->first_name.' '.$val->last_name }}</td>
											 <td class="text-light-success">{{ $val->mobile }}</td>
											 <td class="text-light-success">{{ $val->eng_first_name.' '.$val->eng_last_name }}-({{ $val->eng_username }})</td>
											 <td class="text-light-success">{{ date('d-M-Y', strtotime($val->service_date )) }}</td>
											 <td class="text-light-success">
												<p style="text-transform:uppercase">{{ $val->job_accept }}</p>
											</td>
											 <td class="text-light-success">
												@if($val->job_accept=='accept')
													<button onclick="updateStartJobStatus(this)" style="background-color:green !important;" id="{{ $val->id }}" class="btn btn-success">Complete</button>
												@endif
											 </td>
											 <td>
												<a href="{{ url('admin/order/order-view/'.$val->order_id) }}">View Details</a>
											 </td>
										</tr>
									@endforeach
								@endif

									   
								   </tbody>
								</table>
									 
								</div>
							</div>
						</div>
					</div>

				</div>


	
				

				
				
				<?php // include('include/topfoot.php') ?>

			</div>
		</div>
		
		
	
	
	
@endsection
