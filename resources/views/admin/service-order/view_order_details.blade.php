@extends('admin.include.master')

@section('title', 'View Order Details')

@section('content')

<style>
.justify-content-center {
    justify-content: center !important;
}

.toggle-tab ul li {
    width: 26%;
    position: relative;
}
/*practice new */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
  }

  /* Style the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #ddd;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #ccc;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    background-color: #f4f4f4;
    border: 1px solid #ccc;
    border-top: none;
  }

  .tab-btn  p{
  max-width: 220px;
  }
  .tab-btn h1{
    border-bottom: 2px solid transparent;
  }
.field {
    background: #fff;
    border-radius: 0px 0px 20px 20px;
    box-shadow: 0px 3px 5px 1px #ccc;
    margin: 0px;
    position: relative;
    z-index:1;
}
.toggle-tab ul li{
    width: 26%;    position: relative;
}
.nav-tabs .nav-link {
    margin-bottom: -1px;
    background: 0 0;
    border: 1px solid transparent;
    border-radius: 10px 10px 0px 0px;
}

.tab-nav-item {
    width: 32.33%;
    background-color: #300064;
    margin-right: 5px;
    border-radius: 10px 10px 0px 0px;
}
.tab-content.field.py-3 h3.pt-5.fw-lighter {
    font-size: 16px;
    font-weight: 400 !important;
    padding-top: 20px !important;
    margin-bottom: 0px !important;
}
.service-test.pt-4 ul.border-none li.ps-5 {
    padding-left: 20px !important;
   font-size: 16px;
}
.toggle-tab ul li a{
    padding: 27px 0;
    border-radius: 10px 10px 0px 0px;
}
.tab-content select{
width: 100%;
border: none;
background-color: transparent;
}

.tab-content select option:focus{
    border: none !important;
}
.tab-domain{
    position: relative;
}
.tab-domain label{
    position: absolute;
    top: -18px;
    left: 50px;
    background: #fff;
    padding: 0 10px;
    width: auto;    display: none;
}

.tab-domain span .fa{
font-size: 20px;
    padding-top: 0px;
    padding-right: 5px;
    color: #300064;
}
option:focus{
    border: 0;
}
</style>

<div class="page-wrapper">
      <div class="content container-fluid">
        <div class="page-header mb-0 pt-3">
          <div class="row align-items-center">
            <div class="col">
              <div class="breadcrumb "><a href="{{ url('admin/service-order') }}"><i class="fa fa-home" aria-hidden="true"></i> Order</a>/ Order Details</div>
            </div>
            <div class="col">
              <a href="{{ url('admin/service-order') }}" class="btn btn-info float-right veiwbutton ">Back</a>
            </div>
          </div>
        </div>
        <hr>
        <div class="card">
          <div class="card-body">
            <div class="card1">
              <div class="row gutters-5 align-items-center">
                <div class="col pr-0">
                  <h5 class="mb-md-0 h6">Order Detail</h5>
                </div>

                <div class="col">
                </div>
              </div>
            </div>
            <hr>
				@php
					if($service_order_details->country!=null)
					{
						$cust_country_name = \App\Models\Country::where('id', $service_order_details->country)->pluck('name')->first();
					}else{
						$cust_country_name = '';
					}

					if($service_order_details->state!=null)
					{
						$cust_state_name = \App\Models\State::where('id', $service_order_details->state)->pluck('name')->first();
					}else{
						$cust_state_name = '';
					}

					if($service_order_details->city!=null)
					{
						$cust_city_name = \App\Models\City::where('id', $service_order_details->city)->pluck('name')->first();
					}else{
						$cust_city_name = '';
					}

				@endphp





            <div class="card1">

              <div class="row mb-4">
				
				<?php if(isset($_GET['cart_empty'])) { ?>
					<div class="col-md-12 alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Add Order first then only you can update customer order</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					</div>
				<?php } ?>
				
				<?php if(isset($_GET['update'])) { ?>
					<div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Customer order updated successfully</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					</div>
				<?php } ?>
				
                <div class="col-md-6 ">
                  <div class="img-header mb-3">
                    <h6>Order Info</h6>
                  </div>
                  <div class="table-responsive show-table">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th>Service</th>
                          <td>new installation and configuration</td>
                        </tr>
                        <tr>
                          <th>Service Date</th>
                          <td>{{ date('d-M-Y', strtotime($service_order_details->service_date )) }}</td>
                        </tr>

                        <tr>
                          <th>Order Date</th>
                          <td>{{ date('d-M-Y', strtotime($service_order_details->created_at)) }}</td>
                        </tr>
                        <tr>
                          <th>Service Location</th>
                          <td>{{ $service_order_details->address.', '.$cust_city_name.', '.$cust_state_name.', '.$cust_country_name.'-'.$service_order_details->pincode }}</td>
                        </tr>

                        <tr>
                          <th>Service Status</th>
                          <td>
								@if($service_order_details->status=='0')
									<p class="font-weight-bold text-danger">Pending</p>
								@elseif($service_order_details->status=='1')
									<p class="font-weight-bold text-primary">Assign to Engineer</p>
								@elseif($service_order_details->status=='2')
									<p class="font-weight-bold text-warning">Ongoing</p>
								@elseif($service_order_details->status=='3')
									<p class="font-weight-bold text-success">Completed</p>
								@elseif($service_order_details->status=='4')
									<p class="font-weight-bold text-danger">Declined</p>
								@elseif($service_order_details->status=='5')
									<p class="font-weight-bold text-danger">Cancelled</p>
								@elseif($service_order_details->status=='6')
									<p class="font-weight-bold text-info">Upcoming</p>
								@endif
						  </td>
                        </tr>
						<tr>
                          <th>Payment Status</th>
                          <td>{{ $service_order_details->payment_status }}</td>
                        </tr>
                        <tr>
                          <th>Payment reference No.</th>
                          <td></td>
                        </tr>
                        <tr>
                          <th>Payment Source</th>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="img-header mb-3">
                    <h6>Order Including Services</h6>
                  </div>
				@php
					$service_details_list = \App\Models\OrderDetail::where('order_id', $service_order_details->id)->get();
					// dd($service_details_list);
				@endphp
                  <ul class="list-unstyled fs-13">
					@if(count($service_details_list)>0)
						@foreach($service_details_list as $val)

					@php

							// $total_service_order_amount = \App\Models\OrderDetail::where('user_id', $val->user_id)->where('order_id', $val->id)->sum('total_price');
							// $total_service_order_amount = \App\Models\OrderDetail::where('user_id', $val->user_id)->where('order_id', $val->id)->sum('total_price');


						$category = $val->category_id;
						$subcategory = $val->subcategory_id;
						$service = $val->service_id;
						$service_category = \App\Models\ServiceCategory::where('id', $category)->first();
						$service_subcategory = \App\Models\ServiceSubCategory::where('id', $subcategory)->first();
						$service_name = \App\Models\Service::where('id', $service)->first();
					@endphp


							<li class="mb-2">
							  <i class="fas fa-check"></i> {{ $service_subcategory->name }} , {{ $service_name->name }}
							</li>
						@endforeach
					@endif

                  </ul>
                </div>
              </div>



              <div class="row d-flex justify-content-between mt-5">
                <div class="col-md-6 ">
                  <h6 class="text-left">Customer Information</h6>
                  <div class="row d-flex justify-content-between">
                    <div class="col-md-4">
                      <div class="user-image">
                        <img class="mb-3" height="110" src="{{ static_asset('uploads/customer/'.$service_order_details->profile_pic) }}" onerror="this.onerror=null;this.src='https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg';"
                          alt="No Image">
                        <a class="mybtn1 btn btn-primary" data-email="seller@gmail.com" data-toggle="modal"
                          data-target="#vendorform" href="">Send Message</a>
                      </div>
                    </div>
                    <div class="col-md-8 ">
                      <div class="table-responsive show-table">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th>User Id</th>
                              <td>{{ $service_order_details->user_id }}</td>
                            </tr>
                            <tr>
                              <th>Username</th>
                              <td>{{ $service_order_details->username }}</td>
                            </tr>
                            <tr>
                              <th>User Contact</th>
                              <td>{{ $service_order_details->mobile }}</td>
                            </tr>
                            <tr>
                              <th>Email</th>
                              <td>{{ $service_order_details->email }}</td>
                            </tr>
                            <tr>
                              <th>Address</th>
                              <td>{{ $service_order_details->address }}</td>
                            </tr>

                            <tr>
                              <th>Country</th>
                              <td>{{ $cust_country_name }}</td>
                            </tr>

							<tr>
                              <th>State</th>
                              <td>{{ $cust_state_name }}</td>
                            </tr>

							<tr>
                              <th>City</th>
                              <td>{{ $cust_city_name }}</td>
                            </tr>

                            <tr>
                              <th>Pin Code</th>
                              <td>{{ $service_order_details->pincode }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <h6 class="text-left">Engineer Information</h6>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="user-image">
                        <img class="mb-3" style="height:130px;" src="{{ static_asset('uploads/customer/'.$service_order_details->eng_profile_pic) }}" onerror="this.onerror=null;this.src='https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg';" alt="No Image">
                        <a class="mybtn1 btn btn-primary" data-email="buyer@gmail.com" data-toggle="modal"
                          data-target="#vendorform" href="">Send Message</a>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="table-responsive show-table">
                        <table class="table">
							@php
								if($service_order_details->eng_country!=null)
								{
									$eng_country_name = \App\Models\Country::where('id', $service_order_details->eng_country)->pluck('name')->first();
								}else{
									$eng_country_name = '';
								}

								if($service_order_details->eng_state!=null)
								{
									$eng_state_name = \App\Models\State::where('id', $service_order_details->eng_state)->pluck('name')->first();
								}else{
									$eng_state_name = '';
								}

								if($service_order_details->eng_city!=null)
								{
									$eng_city_name = \App\Models\City::where('id', $service_order_details->eng_city)->pluck('name')->first();
								}else{
									$eng_city_name = '';
								}

							@endphp
                          <tbody>
                            <tr>
                              <th>Engineer Id</th>
                              <td>{{ $service_order_details->eng_username }}</td>
                            </tr>
                            <tr>
                              <th>Engineer Name</th>
                              <td>{{ $service_order_details->eng_first_name }} {{ $service_order_details->eng_last_name }}</td>
                            </tr>
                            <tr>
                              <th>Engineer Contact</th>
                              <td>{{ $service_order_details->eng_mobile }}</td>
                            </tr>
                            <tr>
                              <th>Email</th>
                              <td>{{ $service_order_details->eng_email }}</td>
                            </tr>
                            <tr>
                              <th>Engineer Adhar No.</th>
                              <td>{{ $service_order_details->eng_aadhar }}</td>
                            </tr>
                            <tr>
                              <th>Address</th>
                              <td>{{ $service_order_details->eng_address }}</td>
                            </tr>

                            <tr>
                              <th>Country</th>
                              <td>{{ $eng_country_name }}</td>
                            </tr>
							<tr>
                              <th>State</th>
                              <td>{{ $eng_state_name }}</td>
                            </tr>
							<tr>
                              <th>City</th>
                              <td>{{ $eng_city_name }}</td>
                            </tr>

                            <tr>
                              <th>Pin Code</th>
                              <td>{{ $service_order_details->eng_pincode }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

@php
	$eng_job_count = \App\Models\EngineerJob::where('order_id', $order_id)->count();
@endphp
		@if($eng_job_count>0)
			<div class="row d-flex justify-content-between mt-5">
                <div class="col-md-8 ">
					<div class="card">
						<div class="card-header bg-secondary">
							<h6 class="text-left text-white">View Order Status</h6>
						</div>
						<div class="card-body">
								<div class="row d-flex justify-content-between">

									 @php
										$eng_job_details = \App\Models\EngineerJob::where('order_id', $order_id)->first();
									 @endphp
									<div class="col-md-12">
									  <div class="table-responsive show-table">
										<table class="table">
										  <tbody>
											<tr>
											  <th>Service Order Date</th>
											  <td>{{ date('d-M-Y', strtotime($eng_job_details->service_date)) }}</td>
											</tr>
											<tr>
											  <th>Service Order Date</th>
											  <td>{{ $eng_job_details->service_time }}</td>
											</tr>
											<tr>
											  <th>Status</th>
											  <td>{{ $eng_job_details->status }}</td>
											</tr>
											<tr>
											  <th>Completed Date</th>
											  <td>{{ date('d-M-Y', strtotime($eng_job_details->completed_date)) }}</td>
											</tr>
											<tr>
											  <th>Completed Time</th>
											  <td>{{ $eng_job_details->completed_time }}</td>
											</tr>
											<tr>
											  <th>Completion Remarks</th>
											  <td>{{ $eng_job_details->completion_remarks }}</td>
											</tr>

											<tr>
											  <th>Remakrs During Accepting Job</th>
											  <td>{{ $eng_job_details->remarks }}</td>
											</tr>

											<tr>
											  <th>View Documents</th>
											  <td><a class="text-primary font-weight-bold" target="_blank" href="{{ static_asset('uploads/customer/'.$eng_job_details->documents) }}">View Documents by Engineer</a></td>
											</tr>
											@php

												$checkInvoiceGenerated = \App\Models\OrderInvoice::where('order_id', $order_id)->count();
											@endphp
											<tr>
											  <th>Invoice</th>
												<td>
													@if($checkInvoiceGenerated==0)
														<form method="post" action="{{ route('admin.generateInvoice') }}">
															@csrf
															<input type="hidden" name="order_id" value="{{ $order_id }}">
															<input type="hidden" name="invoice_date" value="{{ date('Y-m-d') }}">
															<input type="hidden" name="created_by" value="{{ Session('LoggedUser')->user_id }}">
															<button type="submit" onclick="return confirm('Are you sure, you want to Generate Invoice?')" class="btn btn-primary" name="generate_invoice">GENERATE INVOICE</button>
														</form>
													@else
														<a href="{{ url('invoice/download-invoice/'.$order_id) }}" class="btn btn-success">Download Invoice</a>
													@endif
												</td>
											</tr>


										  </tbody>
										</table>
									  </div>
									</div>
								  </div>
						</div>
					</div>
                </div>

              </div>
			@endif

			  <div class="row d-flex justify-content-between mt-5">
                <div class="col-md-12">
                  <h6 class="text-left">Update Customer Order</h6>
                  <div class="row d-flex justify-content-between">

                    <div class="col-md-12">
                       <!-- cost section start -->
							<!--tab of engineering mine section start-->
								<section class="offsite-support">
									<div class="container position-relative">

											<div class="col-md-12">


</br>
</br>

@if(count($service_categories)>0)
	
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		@foreach($service_categories as $key => $item)
		  <li class="nav-item" role="presentation">
			<button class="nav-link @if($key+1==1) active @endif" id="home-tab" data-toggle="tab" data-target="#menu{{$key+1}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{ $item->name }}</button>
		  </li>
		@endforeach
	 <!-- <li class="nav-item" role="presentation">
		<button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
	  </li>
	  <li class="nav-item" role="presentation">
		<button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
	  </li>-->
	</ul>
	
@endif

@if(count($service_categories)>0)
	<div class="tab-content" id="myTabContent">
		@foreach($service_categories as $key => $item)
			@php
				$domainList = App\Models\ServiceSubCategory::where('category_id', $item->id)->where('status', 1)->get();
			@endphp
		<div class="tab-pane fade  @if($key+1==1) show active @endif" id="menu{{$key+1}}" role="tabpanel" aria-labelledby="home-tab">
			 
			 <!-- domain subdomain -->
			 <table name="{{$key+1}}" id="myTable{{$key+1}}"
																	class="input-group rounded-3 d-block w-100 border-0 fs-13 overflow-hidden">
																	<tbody class="d-block w-100">
																		<tr>
																			<td>
																				<div class="position-relative col-1ine1 align-items-center pe-0">
																					<div class="d-flex justify-content-around random">
																						<div class="tab-domain me-2">
																							<span></span>
																							<label>Select Domain</label>
																						</div>
																						<select name="subcategory_id[]" required class="subcategory_choose service_subcategory form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
																							id="subcategory_id" >
																							<option value="" selected="">Select Domain</option>
																							@foreach($domainList as $row)
																							<option value="{{ $row->id }}"> {{ $row->name }} </option>
																							@endforeach
																						</select>
																						<div class="valid-feedback">Looks good!</div>
																					</div>
																				</div>
																			</td>
																			<td>
																				<div class="position-relative col-1ine1  align-items-center pe-0">
																					<div class="d-flex justify-content-around">
																						<div class="tab-domain me-2">
																							<span></span>
																							<label>Sub Domain</label>
																						</div>

																						<select name="service_id[]" required  class="choose_service  form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
																							id="service_id" >
																							<option value="" selected="">Select Sub Domain
																							</option>

																						</select>

																					</div>
																				</div>
																			</td>

																			<td>
																				<div class="position-relative col-1ine1 align-items-center pe-0">
																					<div class="d-flex justify-content-around">
																						<div class="tab-domain me-2">
																							<span></span>
																							<label>Select Activity</label>
																						</div>

																						<select name="subservice_id[]" required class="service_subservice_id form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
																							id="subservice_id" >
																							<option value="" selected=""> Select Activity</option>

																						</select>

																					</div>
																				</div>
																			</td>

																			<td>
																				<div class="position-relative col-1ine1 align-items-center pe-0">
																					<div class="d-flex justify-content-around">
																						<div class="tab-domain me-2">
																							<span></span>
																							<label>Activity Type</label>
																						</div>
																						<select required name="activity_type[]"
																							class="activity_type form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
																							>
																							<option value="" selected=""> Activity Type</option>
																							<option value="on_site"> On-Site </option>
																							<option value="off_site"> Off-Site </option>
																						</select>

																					</div>
																				</div>
																			</td>

																			<td>
																				<div class="position-relative col-1ine1 d-flex align-items-center pe-0">
																					<div class="d-flex justify-content-around">
																						<div class="tab-domain me-2">
																							<span></span>
																							<label>Model</label>
																						</div>
																						<input required type="text" name="model[]" class="service_model form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" placeholder="Model/Version ">
																					</div>
																				</div>
																			</td>

																			<td>
																				<div class="position-relative col-1ine1 d-flex align-items-center pe-0">
																					<div class="d-flex justify-content-around">
																						<div class="tab-domain me-2">
																							<span></span>
																							<label>Qty</label>
																						</div>
																						<input required type="number" min="1" name="qty[]" class="service_quantity form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" placeholder="Qty" style="width:60px;">
																						<div class="valid-feedback">Looks good!</div>
																					</div>
																				</div>
																			</td>

																			<td>
																				<div class="d-flex w-160 justify-content-end">
																					<button
																						class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button>
																					<button
																						class="btn border-1 border-danger w-auto delete_button rounded-pill px-3 fs-14 bg-danger mx-1">Delete</button>
																					<button
																						class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button>
																				</div>
																			</td>
																		</tr>
																	</tbody>
																</table>
																<div class="position-relative justify-content-center mx-auto my-2 pt-3">
																	<div class="row">
																		<div class="col-sm-6">
																			@if($service_order_details->user_id!=null)
																				<form method="post" action="{{ route('admin.updateCustomerOrder') }}" enctype="multipart/form-data">
																					@csrf
																					<input type="hidden" name="added_by" value="admin">
																					<input type="hidden" name="user_id" value="{{ $service_order_details->user_id }}">
																					<input type="hidden" name="order_id" value="{{ $service_order_details->id }}">
																					<button class="btn btn-primary border-1 border-danger w-150 rounded px-3 fs-14 bg-danger" type="submit">
																						Update Order Details
																					</button>
																				</form>
																			@endif
																		</div>
																		<div class="col-sm-6">
																			<button class="btn btn-primary border-1 border-success w-150 rounded px-3 fs-14 bg-success mx-2 addown"
																				onclick="addRow{{$key+1}}()"><i class="fa fa-sign-in pe-2" aria-hidden="true"></i> Add
																				Service
																			</button>
																		</div>
																	</div>
																</div>
			 
			 
		</div>
		@endforeach
	  <!--<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">profile</div>
	  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">contact</div>-->
	</div>
@endif
   
											</div> 

								<?php if(false) { ?>			
											<div class="col-md-12">
												<div id="rana" class="toggle-tab">
												@if(count($service_categories)>0)
													<ul class="nav nav-tabs border-0 ms-5 justify-content-center">
														@foreach($service_categories as $key => $item)
															<li class="nav-item tab-nav-item text-center rounded">
																<a class="nav-link text-dark @if($key+1==1) active @endif" data-bs-toggle="tab" href="#menu{{$key+1}}">{{ $item->name }}</a>
															</li>
														@endforeach
													</ul>
												@endif

												@if(count($service_categories)>0)
													<!-- Tab panes -->
													<div class="tab-content field py-5">
														 
														@foreach($service_categories as $key => $item)
															@php
																$domainList = App\Models\ServiceSubCategory::where('category_id', $item->id)->where('status', 1)->get();
															@endphp
															<div class="tab-pane container @if($key+1==1) active @endif justifly-content-round" id="menu{{$key+1}}">
																
																<table name="{{$key+1}}" id="myTable{{$key+1}}" class="input-group rounded-3 d-block w-100 border-0 fs-13 overflow-hidden">
																	<tbody class="d-block w-100">
																		<tr>
																			<td>
																				<div class="position-relative col-1ine1 align-items-center pe-0">
																					<div class="d-flex justify-content-around random">
																						<div class="tab-domain me-2">
																							<span></span>
																							<label>Select Domain</label>
																						</div>
																						<select name="subcategory_id[]" required class="subcategory_choose service_subcategory form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
																							id="subcategory_id" >
																							<option value="" selected="">Select Domain</option>
																							@foreach($domainList as $row)
																							<option value="{{ $row->id }}"> {{ $row->name }} </option>
																							@endforeach
																						</select>
																						<div class="valid-feedback">Looks good!</div>
																					</div>
																				</div>
																			</td>
																			<td>
																				<div class="position-relative col-1ine1  align-items-center pe-0">
																					<div class="d-flex justify-content-around">
																						<div class="tab-domain me-2">
																							<span></span>
																							<label>Sub Domain</label>
																						</div>

																						<select name="service_id[]" required  class="choose_service  form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
																							id="service_id" >
																							<option value="" selected="">Select Sub Domain
																							</option>

																						</select>

																					</div>
																				</div>
																			</td>

																			<td>
																				<div class="position-relative col-1ine1 align-items-center pe-0">
																					<div class="d-flex justify-content-around">
																						<div class="tab-domain me-2">
																							<span></span>
																							<label>Select Activity</label>
																						</div>

																						<select name="subservice_id[]" required class="service_subservice_id form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
																							id="subservice_id" >
																							<option value="" selected=""> Select Activity</option>

																						</select>

																					</div>
																				</div>
																			</td>

																			<td>
																				<div class="position-relative col-1ine1 align-items-center pe-0">
																					<div class="d-flex justify-content-around">
																						<div class="tab-domain me-2">
																							<span></span>
																							<label>Activity Type</label>
																						</div>
																						<select required name="activity_type[]"
																							class="activity_type form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
																							>
																							<option value="" selected=""> Activity Type</option>
																							<option value="on_site"> On-Site </option>
																							<option value="off_site"> Off-Site </option>
																						</select>

																					</div>
																				</div>
																			</td>

																			<td>
																				<div class="position-relative col-1ine1 d-flex align-items-center pe-0">
																					<div class="d-flex justify-content-around">
																						<div class="tab-domain me-2">
																							<span></span>
																							<label>Model</label>
																						</div>
																						<input required type="text" name="model[]" class="service_model form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" placeholder="Model/Version ">
																					</div>
																				</div>
																			</td>

																			<td>
																				<div class="position-relative col-1ine1 d-flex align-items-center pe-0">
																					<div class="d-flex justify-content-around">
																						<div class="tab-domain me-2">
																							<span></span>
																							<label>Qty</label>
																						</div>
																						<input required type="number" min="1" name="qty[]" class="service_quantity form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" placeholder="Qty" style="width:60px;">
																						<div class="valid-feedback">Looks good!</div>
																					</div>
																				</div>
																			</td>

																			<td>
																				<div class="d-flex w-160 justify-content-end">
																					<button
																						class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button>
																					<button
																						class="btn border-1 border-danger w-auto delete_button rounded-pill px-3 fs-14 bg-danger mx-1">Delete</button>
																					<button
																						class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button>
																				</div>
																			</td>
																		</tr>
																	</tbody>
																</table>
																<div class="position-relative justify-content-center d-flex w-50 mx-auto my-2 pt-3">
																	
																	
																	<button class="btn btn-primary border-1 border-success w-150 rounded px-3 fs-14 bg-success mx-2 addown"
																		onclick="addRow{{$key+1}}()"><i class="fa fa-sign-in pe-2" aria-hidden="true"></i> Add
																		Service {{ $service_order_details->user_id }}
																	</button>
																</div>
															</div>
														@endforeach




												   </div>

												@endif
												</div>


<script>
// $('#rana li a').on('click', function(){
    // $(this).addClass('active');
    // $(this).parent().siblings().find('a').removeClass('active');
// });

$(document).ready(function() {
            $('#menu1').click(function() {
                $('#GFG_IMAGE').addClass('flip');
            });
            $('#btnremove').click(function() {
                $('#GFG_IMAGE').removeClass('flip');
            });
        });


</script>
												<!-- Modal Box Start -->
												<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-xl">
														<div class="modal-content">
															<div class="modal-body box-type-estimate box-type-estimate4 bg-white shadow p-4 z-index-999 position-absolute top-100 w-100 rounded-3 start-0 mt-3">
																<button type="button" class="btn-close fs-3 bg-transparent ms-auto mt-2 mb-5 d-block text-end"
																	data-bs-dismiss="modal" aria-label="Close"></button>
																<form method="post" action="{{ route('saveQuoteEnquiry') }}" enctype="multipart/form-data" class="row g-3 needs-validation py-2">
																	@csrf
																{{--<div class="col-md-12">
																		<div class="position-relative d-flex align-items-center  justify-content-end">
																			<div class="tab-domain me-2 position-static">
																				<span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
																				<label class="w-auto fs-13"> First Name</label>
																			</div>
																			<input type="text" class="form-control px-0 shadow-none ps-2 ps-2 bg-white" name="first_name" placeholder="First Name" required="">

																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="position-relative d-flex align-items-center justify-content-end">
																			<div class="tab-domain me-2 position-static">
																				<span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
																				<label class="w-auto fs-13"> Last Name</label>
																			</div>
																			<input type="text" name="last_name" class="form-control shadow-none  px-0 ps-2 ps-2 bg-white" id="validationCustom01" placeholder="Last Name" required="">

																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="position-relative d-flex align-items-center  ">
																			<div class="tab-domain me-2 position-static">
																				<span><i class="fa fa-envelope" aria-hidden="true"></i></span>
																				<label class="w-auto fs-13"> Email Id</label>
																			</div>
																			<input type="email" name="email" class="form-control px-3 shadow-none  bg-white" placeholder="Email Id" required="">
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="position-relative d-flex align-items-center ">
																			<div class="tab-domain me-2 position-static">
																				<span><i class="fa fa-phone" aria-hidden="true"></i></span>
																				<label class="w-auto fs-13"> Phone</label>
																			</div>
																			<input type="text" class="form-control shadow-none px-3 border border-muted bg-white"
																				name="phone" placeholder="Phone" required="">
																		</div>
																	</div>--}}
																	<div class="col-md-12">
																		<div class="mb-3 fs-13 text-start">
																			<label for="formFile" class="px-2 text-muted">Upload Docoment <small>(File
																					accepted: .pdf, .doc/docx - Max file size: 150KB for demo
																					limit)</small></label>
																		</div>
																		<div class="position-relative d-flex align-items-center ">
																			<div class="tab-domain me-2            position-static w-auto">
																				<span><i class="fa fa-file" aria-hidden="true"></i></span>
																				<label class="w-auto fs-13"> file</label>
																			</div>
																			<input name="files" class="form-control shadow-none px-3 border border-muted bg-white py-2"
																				type="file" id="formFiles" required="">
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="position-relative d-flex align-items-center ">
																			<div class="tab-domain me-2 position-static w-auto">
																				<span><i class="fa fa-pencil" aria-hidden="true"></i></span>
																				<label class="w-auto fs-13"> Message</label>
																			</div>
																			<textarea name="message" class="form-control shadow-none fs-13 lsp-5" placeholder="Please elaborate your requirement"></textarea>

																		</div>
																	</div>
																	<div class="col-md-12 text-center">
																		<button class="btn btn-primary border-0 w-150 float-none d-block vs-btn fs-13 lsp-5  mx-auto rounded bg-danger" type="submit">Send Message </button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
												<!-- \Modal Box End -->

												<!-- Modal Box Start -->
												<div class="modal fade" id="loginAlertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-xl">
														<div class="modal-content">
															<div class="modal-body box-type-estimate box-type-estimate4 bg-white shadow p-4 z-index-999 position-absolute top-100 w-100 rounded-3 start-0 mt-3">
																<button type="button" class="btn-close fs-3 bg-transparent ms-auto mt-2 mb-5 d-block text-end"
																	data-bs-dismiss="modal" aria-label="Close"></button>
																	{{--<div class="row g-3 needs-validation py-2">
																		<div class="col-md-12">
																			<h5 class="text-primary"> You are not logged in. Please Login in first.</h5>
																		</div>
																	</div>

																	<div class="col-md-12 text-center">
																		<a href="{{ url('login') }}" class="btn btn-primary border-0 w-150 float-none d-block vs-btn fs-13 lsp-5  mx-auto rounded bg-danger" type="submit">Login </a>
																	</div>--}}

																	<form method="post" action="{{ route('saveQuoteEnquiry') }}" enctype="multipart/form-data" class="row g-3 needs-validation py-2">
																		@csrf
																		<div class="col-md-12">
																			<span class="form-text text-danger" id="service_fields_are_required"></span>
																		</div>
																	<div class="col-md-12">
																			<div class="position-relative d-flex align-items-center  justify-content-end">
																				<div class="tab-domain me-2 position-static">
																					<span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
																					<label class="w-auto fs-13"> First Name</label>
																				</div>
																				<input type="text" class="form-control px-0 shadow-none ps-2 ps-2 bg-white" name="first_name" id="first_name" placeholder="First Name" required="">

																			</div>
																		</div>
																		<div class="col-md-12">
																			<div class="position-relative d-flex align-items-center justify-content-end">
																				<div class="tab-domain me-2 position-static">
																					<span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
																					<label class="w-auto fs-13"> Last Name</label>
																				</div>
																				<input type="text" id="last_name" name="last_name" class="form-control shadow-none  px-0 ps-2 ps-2 bg-white" id="validationCustom01" placeholder="Last Name" required="">

																			</div>
																		</div>
																		<div class="col-md-12">
																			<div class="position-relative d-flex align-items-center  ">
																				<div class="tab-domain me-2 position-static">
																					<span><i class="fa fa-envelope" aria-hidden="true"></i></span>
																					<label class="w-auto fs-13"> Email Id</label>
																				</div>
																				<input type="email" id="email" name="email" class="form-control px-3 shadow-none  bg-white" placeholder="Email Id" required="">
																			</div>
																		</div>
																		<div class="col-md-12">
																			<div class="position-relative d-flex align-items-center ">
																				<div class="tab-domain me-2 position-static">
																					<span><i class="fa fa-phone" aria-hidden="true"></i></span>
																					<label class="w-auto fs-13"> Phone</label>
																				</div>
																				<input type="text"  pattern="[6789][0-9]{9}" class="form-control shadow-none px-3 border border-muted bg-white"
																					name="mobile" id="mobile" placeholder="Phone" required="">
																			</div>
																		</div>
																		<div class="col-md-12">
																			<div class="mb-3 fs-13 text-start">
																				<label for="formFile" class="px-2 text-muted">Upload Docoment <small>(File
																						accepted: .pdf, .doc/docx - Max file size: 150KB for demo
																						limit)</small></label>
																			</div>
																			<div class="position-relative d-flex align-items-center ">
																				<div class="tab-domain me-2            position-static w-auto">
																					<span><i class="fa fa-file" aria-hidden="true"></i></span>
																					<label class="w-auto fs-13"> file</label>
																				</div>
																				<input name="files" class="form-control shadow-none px-3 border border-muted bg-white py-2"
																					type="file" id="formFiles" required="">
																			</div>
																		</div>
																		<div class="col-md-12">
																			<div class="position-relative d-flex align-items-center ">
																				<div class="tab-domain me-2 position-static w-auto">
																					<span><i class="fa fa-pencil" aria-hidden="true"></i></span>
																					<label class="w-auto fs-13"> Message</label>
																				</div>
																				<textarea name="message" id="message" class="form-control shadow-none fs-13 lsp-5" placeholder="Please elaborate your requirement"></textarea>

																			</div>
																		</div>
																		<div class="col-md-12 text-center">
																			<button class="btn btn-primary border-0 w-150 float-none d-block vs-btn fs-13 lsp-5  mx-auto rounded bg-danger save-guest-user" type="submit">Send Message </button>
																		</div>
																	</form>


																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- \Modal Box End -->
<?php } ?>



										</div>
									</div>
								</section>
								<!--/tab of engineering mind section end-->
                       <!-- cost section end -->
                    </div>
                  </div>
                </div>

              </div>



            </div>
          </div>
        </div>

		@include('admin.include.topfoot')
      </div>
    </div>

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>


<script>

/* check sloat start here*/

		$(".check-domain-subdomain").click(function(e){
			e.preventDefault();

			var service_location =  $('#autocomplete_ranas').val();
            var service_date = $('#service_date').val();
            var service_time = $('#service_time').val();
			var service_subcategory = $('#subcategory_id').val();

			if(service_subcategory==''){
				toastr.error('Please select domain and service');

			}else{
				console.log('Location: '+service_location);
				console.log('Date: '+service_date);
				console.log('Time: '+service_time);

				if(service_date=='' && service_time==''){
					document.getElementById('service_fields_are_required').innerHTML='Service Location, Date and Time are not selected.';
				}else{
					document.getElementById('service_fields_are_required').innerHTML='';
				}
				$('#loginAlertModal').modal('show');

			}
			//console.log(service_subcategory);

		});



		$(".save-guest-user").click(function(e){
                e.preventDefault();
                var service_location =  $('#autocomplete_ranas').val();
                var service_date = $('#service_date').val();
                var service_time = $('#service_time').val();
                var first_name = $('#first_name').val();
                var last_name = $('#last_name').val();
                var mobile = $('#mobile').val();
                var email = $('#email').val();
                var message = $('#message').val();
                var formFiles = $('#formFiles').val();

				console.log(message);

            $.ajax({
                url: "{{ route('saveGuestUser') }}",
                 type: "POST",
                 data: {
                    service_location: service_location,
                    service_date: service_date,
                    service_time: service_time,
                    first_name: first_name,
                    last_name: last_name,
                    mobile: mobile,
                    email: email,
                    formFiles: formFiles,
                    message: message,
                     _token: '{{ csrf_token() }}'
                 },
                 dataType: 'json',
                 success: function(data) {
					 console.log(data);
					 toastr.success('Estimation Generated Successfully.');
					 setTimeout(function(){
					 window.location = "{{ url('show-estimate/') }}"+'/'+data.temp_id },2000);

				}
				// ,error:function(err){

					// document.getElementById('show-form-error').style="display: block";
					// let error = err.responseJSON;
					// console.log(error);
					// $.each(error.errors, function (index, value) {
						// $('.errorMsgntainer').append('<span class="text-danger">'+value+'<span>'+'<br>');
					// });
				// }
            });

		});

		$(".check_web_sloat").click(function(e){
                e.preventDefault();
                var service_location =  $('#autocomplete_ranas').val();
                // var mobile = $("input[name=mobile]").val();
                var service_date = $('#service_date').val();
                var service_time = $('#service_time').val();

                if(service_location!=='' && service_date!=='' && service_time!==''){
                    document.getElementById('web_sloats_found_available').innerHTML='Sloats are availabe at your preferred location.';
                    toastr.success('Sloats are availabe at your preferred location.');
					document.getElementById('fields_are_required').innerHTML='';

						// $('html, body').animate({ scrollTop: errors.offset().top - 50 }, 500);

						$('.check-sloat-form-data').animate({scrollTop:$('.check-sloat-form #check-sloat-form-data').height()}, 600);

                }else{
					document.getElementById('fields_are_required').innerHTML='All fields are required.';
					document.getElementById('web_sloats_found_available').innerHTML='';
				}

			});


/* check sloat end */


var switchStatus = false;
$("#price_id").on('change', function() {
    if ($(this).is(':checked')) {
        switchStatus = $(this).is(':checked');
      // alert(switchStatus);// To verify
        //alert("on");
        $('#monthly_plan').hide();
      $('#annually_plan').show();
    }
    else {
      switchStatus = $(this).is(':checked');
      //alert(switchStatus);// To verify
      //alert("off");
      $('#monthly_plan').show();
      $('#annually_plan').hide();
    }
});

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}




////////////////////////////////////////////////////
 function BindEvents(){
  $('#myTable2').on('click', '.delete_button2', function(e){
    $(this).closest('tr').remove()
  });
}

$('table#myTable2').on('click', '.edit_button', function(e){
   $(this).closest('tr').addClass('active');
});
function BindEvents(){
  $('#myTable3').on('click', '.delete_button3', function(e){
    $(this).closest('tr').remove()
  });
}

$('table#myTable3').on('click', '.edit_button', function(e){
   $(this).closest('tr').addClass('active');
});

function addRow2() {
    var table = document.getElementById("myTable2");
	  addClassToTr(table, "name");

      var row = table.insertRow(-1);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4);
      var cell6 = row.insertCell(5);
      var cell7 = row.insertCell(6);
      cell1.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
							<div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span></span>
										<label for="">Domain</label>
								</div>
								@php
								  $secondCategory = \App\Models\ServiceSubCategory::where('category_id', 2)->where('status', 1)->get();
								@endphp
								<select name="subcategory_id[]" class="form-control service_subcategory subcategory_choose ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04">
									<option value="" selected="">Select Domain</option>
									@foreach($secondCategory as $item)
										<option value="{{ $item->id }}"> {{ $item->name }} </option>
									@endforeach
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>
						</div>`;
      cell2.innerHTML = `<div class="position-relative col-1ine1  align-items-center pe-0">
							<div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span></span>
									<label for="">Domain</label>
								</div>
								<select id="service_id" name="service_id[]" class="form-control choose_service ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04" required="">
									<option value="" selected="">Select Sub Domain</option>
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>
						</div>`;
      cell3.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
                             <div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span></span>
									<label>Select Activity</label>
								</div>

								<select name="subservice_id[]" class="service_subservice_id form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
									id="subservice_id" >
									<option value="" selected=""> Select Activity</option>

								</select>

							</div>
                          </div>`;
      cell4.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
                              <div class="d-flex justify-content-around">
                                  <div class="tab-domain me-2">
                                      <span></span>
                                      <label for="">Activity Type</label>
                                  </div>
                                  <select name="activity_type[]" class="activity_type form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5">
									<option value="" selected=""> Activity Type</option>
									<option value="on_site"> On-Site </option>
									<option value="off_site"> Off-Site </option>
								</select>
                                  <div class="valid-feedback">Looks good!</div>
                              </div>
                          </div>`;
      cell5.innerHTML = '<div class="abc position-relative col-1ine1 d-flex align-items-center pe-0"> <div class="d-flex justify-content-around"> <div class="tab-domain me-2"> <span></span> <label for="">Domain</label> </div> <input type="text" class="form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="" placeholder="Model/Version" required=""> <div class="valid-feedback">Looks good!</div> </div> </div>';
      cell6.innerHTML = `<div class="position-relative col-1ine1 d-flex align-items-center pe-0">
                              <div class="d-flex justify-content-around">
                                  <div class="tab-domain me-2">
                                      <span></span>
                                      <label for="">Qty</label>
                                  </div>
                                  <input type="number" class="service_quantity form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="qty" placeholder="Qty" required="" style="width:60px;">
                                  <div class="valid-feedback">Looks good!</div>
                              </div>
                         </div>`;
      cell7.innerHTML = '<div class="d-flex w-160 justify-content-end"><button class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button><input type="button" class="delete_button btn btn-primary border-1 border-danger w-auto rounded-pill px-3 fs-14 bg-danger mx-1" value="Delete"><button class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button> </div>';
};

function addRow3() {
    var table = document.getElementById("myTable3");
	  addClassToTr(table, "name");

      var row = table.insertRow(-1);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4);
      var cell6 = row.insertCell(5);
      var cell7 = row.insertCell(6);
      cell1.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
							<div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span></span>
									<label for="">Domain</label>
								</div>
								@php
								  $thirdCategory = \App\Models\ServiceSubCategory::where('category_id', 2)->where('status', 1)->get();
								@endphp
								<select name="subcategory_id[]" class="form-control service_subcategory subcategory_choose ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04">
									<option value="" selected="">Select Domain</option>
									@foreach($thirdCategory as $item)
										<option value="{{ $item->id }}"> {{ $item->name }} </option>
									@endforeach
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>
						</div>`;
      cell2.innerHTML = `<div class="position-relative col-1ine1  align-items-center pe-0">
							<div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span></span>
									<label for="">Domain</label>
								</div>
								<select id="service_id" name="service_id[]" class="form-control choose_service ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04" required="">
									<option value="" selected="">Select Sub Domain</option>
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>
						</div>`;
      cell3.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
                              <div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span></span>
									<label>Select Activity</label>
								</div>

								<select name="subservice_id[]" class="service_subservice_id form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
									id="subservice_id" >
									<option value="" selected=""> Select Activity</option>

								</select>

							</div>
                          </div>`;
      cell4.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
                              <div class="d-flex justify-content-around">
                                  <div class="tab-domain me-2">
                                      <span></span>
                                      <label for="">Activity Type</label>
                                  </div>
                                  <select name="activity_type[]" class="activity_type form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5">
									<option value="" selected=""> Activity Type</option>
									<option value="on_site"> On-Site </option>
									<option value="off_site"> Off-Site </option>
								</select>
                                  <div class="valid-feedback">Looks good!</div>
                              </div>
                          </div>`;
      cell5.innerHTML = '<div class="abc position-relative col-1ine1 d-flex align-items-center pe-0"> <div class="d-flex justify-content-around"> <div class="tab-domain me-2"> <span></span> <label for="">Domain</label> </div> <input type="text" class="form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="" placeholder="Model/Version" required=""> <div class="valid-feedback">Looks good!</div> </div> </div>';
      cell6.innerHTML = `<div class="position-relative col-1ine1 d-flex align-items-center pe-0">
                              <div class="d-flex justify-content-around">
                                  <div class="tab-domain me-2">
                                      <span></span>
                                      <label for="">Qty</label>
                                  </div>
                                  <input type="number" class="service_quantity form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="qty" placeholder="Qty" required="" style="width:60px;">
                                  <div class="valid-feedback">Looks good!</div>
                              </div>
                         </div>`;
      cell7.innerHTML = '<div class="d-flex w-160 justify-content-end"><button class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button><input type="button" class="delete_button btn btn-primary border-1 border-danger w-auto rounded-pill px-3 fs-14 bg-danger mx-1" value="Delete"><button class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button> </div>';
};

// Get all the "Delete" buttons
const deleteButtons = document.querySelectorAll('.btn-delete');

// Add event listener to each button
function BindEvents(){
  $('#myTable2').on('click', '.delete_button', function(e){
    $(this).closest('tr').remove()
  });
}

$('table#myTable2').on('click', '.edit_button', function(e){
   $(this).closest('tr').addClass('active');
});

$('table#myTable2').on('click', '.update_button', function(e){
   $(this).closest('tr').removeClass('active');
});
//////
function BindEvents(){
  $('#myTable3').on('click', '.delete_button', function(e){
    $(this).closest('tr').remove()
  });
}

$('table#myTable3').on('click', '.edit_button', function(e){
   $(this).closest('tr').addClass('active');
});

$('table#myTable3').on('click', '.update_button', function(e){
   $(this).closest('tr').removeClass('active');
});
//////
$('table').on('click', 'input[type="button"]', function(e){
   $(this).closest('tr').remove()
});
$('table').on('click', '.removes-row', function(e){
   $(this).closest('tr').remove()
});

$(".cast_est_btn").on("click", function(){
  $(this).addClass('active');
  RefreshTable();
});
function RefreshTable() {
  $( "#load_tables" ).load( "index.php #table_content" );
}

function BindEvents(){
  $('#myTable').on('click', '.delete_button', function(e){
    $(this).closest('tr').remove()
  });
}

$('table#myTable').on('click', '.edit_button', function(e){
   $(this).closest('tr').addClass('active');
});

$('table#myTable').on('click', '.update_button', function(e){
   $(this).closest('tr').removeClass('active');
});
//
const addClassToTr = (table, className="added")=>{
	const trs = table.querySelectorAll("tr");
	trs.forEach(tr=>{
		tr.classList.add(className);
	})
}
//




function addRow1() {
    var table = document.getElementById("myTable1");
	  addClassToTr(table, "name");
    @php
      $firstCategory = \App\Models\ServiceSubCategory::where('category_id', 1)->where('status', 1)->get();
    @endphp
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);

    cell1.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
							<div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span></span>
									<label for="">Domain</label>
								</div>
								<select name="subcategory_id[]" class="form-control subcategory_choose service_subcategory ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04">
									<option value="" selected="">Select Domain</option>
									@foreach($firstCategory as $item)
										<option value="{{ $item->id }}"> {{ $item->name }} </option>
									@endforeach
								</select>
							</div>
						</div>`;
    cell2.innerHTML = `<div class="position-relative col-1ine1  align-items-center pe-0">
							<div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span></span>
									<label for="">Domain</label>
								</div>
								<select id="service_id" name="service_id[]" class="form-control choose_service ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04" required="">
									<option value="" selected="">Select Sub Domain</option>
								</select>
							</div>
						</div>`;
    cell3.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
							<div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span></span>
									<label>Select Activity</label>
								</div>

								<select name="subservice_id[]" class="service_subservice_id form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
									id="subservice_id" >
									<option value="" selected=""> Select Activity</option>

								</select>

							</div>
						</div>`;
    cell4.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
                            <div class="d-flex justify-content-around">
                                <div class="tab-domain me-2">
                                    <span></span>
                                    <label for="">Activity Type</label>
                                </div>
                                <select name="activity_type[]" class="activity_type form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5">
									<option value="" selected=""> Activity Type</option>
									<option value="on_site"> On-Site </option>
									<option value="off_site"> Off-Site </option>
								</select>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>`;
    cell5.innerHTML = '<div class="abc position-relative col-1ine1 d-flex align-items-center pe-0"> <div class="d-flex justify-content-around"> <div class="tab-domain me-2"> <span></span> <label for="">Domain</label> </div> <input type="text" class="form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="" placeholder="Model/Version" required=""> <div class="valid-feedback">Looks good!</div> </div> </div>';
    cell6.innerHTML = `<div class="position-relative col-1ine1 d-flex align-items-center pe-0">
                            <div class="d-flex justify-content-around">
                                <div class="tab-domain me-2">
                                    <span></span>
                                    <label for="">Qty</label>
                                </div>
                                <input type="number" class="service_quantity form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"  placeholder="Qty" required="" style="width:60px;">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                       </div>`;
    cell7.innerHTML = '<div class="d-flex w-160 justify-content-end"><button class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button><input type="button" class="delete_button btn btn-primary border-1 border-danger w-auto rounded-pill px-3 fs-14 bg-danger mx-1" value="Delete"><button class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button> </div>';

};

$(".show-my-estimate1").click(function(){
  $(".box-type-estimate4").toggle();
});






		/** get service list from here */
        $(document).on('change', '.subcategory_choose', function() {
			let subcategory_id = $(this).val();
            let row = $(this).closest('tr');
            row.find('.choose_service').empty();
            row.find('.choose_service').append('<option value="" selected disabled>Select Service</option>');
			// console.log(subcategory_id);
			// console.log('subcategory onchange');
			$.ajax({
                url: "{{ url('get-service-list') }}",
                 type: "POST",
                 data: {
                     subcategory_id: subcategory_id,
                     _token: '{{ csrf_token() }}'
                 },
                 dataType: 'json',
                 success: function(result) {
					// console.log(result);
				    $.each(result.subcategories, function(key, value) {
                        // $(this).closest('tr').find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');
                        row.find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
               },
               error: function(jqXHR, textStatus, errorThrown) {
                    console.log('AJAX Error:', textStatus, errorThrown);
                }
             });
        });

		/** get sub service list from here */

        $(document).on('change', '.choose_service', function() {
			let service_id = $(this).val();
            let row = $(this).closest('tr');
            row.find('.service_subservice_id ').empty();
            row.find('.service_subservice_id ').append('<option value="" selected disabled>Select Sub Service</option>');
			// console.log(subcategory_id);
			// console.log('subcategory onchange');
			$.ajax({
                url: "{{ url('get-subservice-list') }}",
                 type: "POST",
                 data: {
                    service_id: service_id,
                     _token: '{{ csrf_token() }}'
                 },
                 dataType: 'json',
                 success: function(result) {
					// console.log(result);
				    $.each(result.subcategories, function(key, value) {
                        // $(this).closest('tr').find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');
                        row.find('.service_subservice_id ').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
               },
               error: function(jqXHR, textStatus, errorThrown) {
                    console.log('AJAX Error:', textStatus, errorThrown);
                }
             });
        });


        /*$('#service_id').on('change', function() {
            var service_id = this.value;
            $.ajax({
                url: "{{ url('get-subservice-list') }}",
                type: "POST",
                data: {
                    service_id: service_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#subservice_id').html('<option value="">Select Service</option>');
                    $.each(result.subcategories, function(key, value) {
                        $("#subservice_id").append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                    });
                }
            });
        });
        */

        /* Store service data in session */

        $(document).on('change', '.service_quantity', function() {

            let row = $(this).closest('tr');

            let service_subcategory = row.find('.service_subcategory').val();
            let choose_service = row.find('.choose_service').val();
            let service_subservice_id = row.find('.service_subservice_id').val();
            // let 'subcategory : '+activity_type = row.find('.activity_type').val();
            let service_model = row.find('.service_model').val();
            let service_quantity = row.find('.service_quantity').val();
            let activity_type = row.find('.activity_type').val();
            let user_id = {{ $service_order_details->user_id }};
            let o_id = {{ $service_order_details->id }};

            // console.log(service_subcategory);

            console.log('subcategory : '+service_subcategory);
            console.log('service : '+choose_service);
            console.log('sub service : '+service_subservice_id);
            console.log('activity type : '+activity_type);
            console.log('model : '+service_model);
            console.log('quantity : '+service_quantity);


			$.ajax({
                url: "{{ url('store-service-categories-admin') }}",
                 type: "POST",
                 data: {
                    subcategory_id: service_subcategory,
                    service_id: choose_service,
                    subservice_id: service_subservice_id,
                    activity_type: activity_type,
                    model: service_model,
                    user_id: user_id,
                    o_id: o_id,
                    qty: service_quantity,
                     _token: '{{ csrf_token() }}'
                 },
                 dataType: 'json',
                 success: function(result) {
					// console.log(result);
				    $.each(result.subcategories, function(key, value) {
                        // $(this).closest('tr').find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');
                        row.find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
               },
               error: function(jqXHR, textStatus, errorThrown) {
                    console.log('AJAX Error:', textStatus, errorThrown);
                }
             });

        });



    </script>



@endsection

