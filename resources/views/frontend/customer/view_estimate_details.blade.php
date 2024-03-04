@extends('frontend.layouts.master')
@section('title') View Estimate  @endsection
@section('content')
@include('frontend.customer.partials.dash_header')<style>table {            width: 100%;            border-collapse: collapse;            margin-bottom: 0px !important;        }        table thead th {            height: 28px;            text-align: left;            font-size: 16px;            font-family: sans-serif;        }        table, th, td {            border: 1px solid #ddd;            padding: 8px;            font-size: 14px;        }</style>
    <link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/css/app.csssss')}}">
<div class="main-wrapper">

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
                    <div class="widget-title d-flex align-items-center justify-content-between">						<h4>View Estimate</h4>						<a href="{{ route('customer.viewEstimate') }}" class="fs-14 py-1 bg-primary2 rounded-pill px-4 text-white bt-hover">Back</a>					</div>
                    <hr>
                    <div class="white_block mt-3">						<div class="accordion" id="accordionExample">						   							  <div class="accordion-item">								<h2 class="accordion-header">								  <button class="accordion-button text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">									Quotation Generated on {{ date('d-M-Y', strtotime($view_estimate->created_at)) }}									</button>								  								  								</h2>																<div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">								  <div class="accordion-body">																		<div class="row">										<div class="col-md-2">											<a style="float:right;background-color:green;" target="_blank" href="{{ static_asset('uploads/cost_estimate/'.$view_estimate->files) }}" class="btn btn-primary btn-sm">View Attcahed Doc.</a>										</div>										<div class="col-md-2">											<a style="float:right;" href="{{ url('estimate/download-estimate/'.$view_estimate->id) }}" class="btn btn-danger btn-sm">Download Quotation</a>										</div>										<div class="col-md-2">											<a style="float:right;" href="{{ url('customer/customer/view-estimate-details/'.$view_estimate->id) }}" class="btn btn-danger btn-sm">View Quotation Details</a>										</div>									</div>								  									<div class="table-responsive mt-5">										<table class="table">															<thead>																<tr class="bg-blue">																	<th>Service Category</th>																	<th>Service Sub Category</th>																	<th>Service Type</th>																	<th>Stie Type</th>																	<th>Model No.</th>																	<th>Unit Cost</th>																	<th>Qty</th>																	<th>Amount</th>																</tr>															</thead>															<tbody>																															@php																	$tempOrderDetails = \App\Models\TempOrderDetail::select('temp_order_details.*', 'cat.name as category_name', 'subcat.name as subcategory_name', 's.name as service_name', 'sub.name as sub_service_name')																		->leftJoin('service_categories as cat', 'cat.id', '=', 'temp_order_details.category_id')																		->leftJoin('service_sub_categories as subcat', 'subcat.id', '=', 'temp_order_details.subcategory_id')																		->leftJoin('services as s', 's.id', '=', 'temp_order_details.service_id')																		->leftJoin('sub_services as sub', 'sub.id', '=', 'temp_order_details.subservice_id')																		->where('temp_order_id', $view_estimate->id)																		->where('temp_order_details.status', 1)																		->latest()->get();																@endphp																																@if(count($tempOrderDetails)>0)																	@php																		$total_service_amount = 0;																	@endphp																	@foreach($tempOrderDetails as $item)																		<tr>																			<td width="10%">{{ $item->category_name }}</td>																			<td>{{ $item->subcategory_name }}</td>																			<td width="10%">{{ $item->service_name }} ({{ $item->sub_service_name }})</td>																			<td width="10%">@if($item->activity_type=='on_site') On Site @else Off Site @endif </td>																			<td width="15%" class="fw-bold">{{ $item->model }}</td>																			<td width="15%" class="fw-bold"><b>Rs<b/>&nbsp;{{ $item->price }}</td>																			<td width="10%">{{ $item->qty }}</td>																			<td width="10%"><b>Rs<b/>&nbsp;{{ $item->total_price }}</td>																	 																		</tr>																		@php																			$total_service_amount = $total_service_amount+$item->total_price;																		@endphp																	@endforeach																@endif																	 <tr>																 																	</tr>															</tbody>														</table>													</div>														<table>															<thead>																<tr>																	 																	<td class="no-border text-start heading;" colspan="5" >																		<table id="table2">																		{{--<tr>																			  <th style="background-color: blueviolet; color: #fff; border: 1px solid black;">Special Discount</th>																			  <td style="border: 1px solid black;">100%</td>																			</tr>--}}																			<tr>																			  <th style="background-color: blueviolet; color: #fff; border: 1px solid black;">SUBTOTAL</th>																			  <td style="border: 1px solid black;"><b>Rs<b/>&nbsp;{{ $total_service_amount }}</td>																			</tr>																			<tr>																				@php  $gst_amount = (10 / 100) * $total_service_amount; @endphp																			  <th style="background-color: blueviolet; color: #fff; border: 1px solid black;">GST @ 10%</th>																			  <td style="border: 1px solid black;"><b>Rs<b/>&nbsp;{{$gst_amount}}</td>																			</tr>																			@php 																				$grand_total = $total_service_amount+$gst_amount;																			@endphp 																			<tr>																				<th style="background-color: blueviolet; color: #fff; border: 1px solid black;">Total Amount</th>																				<td style="border: 1px solid black;"><b>Rs<b/>&nbsp;{{ $grand_total }}</td>																			  </tr>																		  </table>																	</td>																</tr>															</thead>															 														</table>														<table>															<thead>																<tr>																	<td class="no-border text-start heading;" colspan="5" style="width: 75%; text-align: right;text-transform: capitalize;">																		(In Words: {{ getIndianCurrency($grand_total) }})																	</td>																</tr>															</thead>															<tbody>																<tr style="float:right;">																	<td class="no-border text-start heading;" colspan="5" style="width: 75%; text-align: right;text-transform: capitalize;">																	@if($profile_details->gst_number!=null && $profile_details->company_name!=null)																		<a style="float:right;" target="_blank" class="btn btn-success" href="{{ url('show-estimate') }}/{{ $view_estimate->id }}">Book This Service</a>																	@else																		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Book This Service</button>																	@endif																	</td>																</tr>															</tbody>														</table>									 																	  </div>								</div>							  </div>						   						</div>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
 

</div>
<!-- Modal --><div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">  <div class="modal-dialog">    <div class="modal-content">      <div class="modal-header">        <h5 class="modal-title" id="exampleModalLabel">Update Profile Alert</h5>        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>      </div>      <div class="modal-body">        Please update your profile, then only you can book service.      </div>      <div class="modal-footer">        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>      </div>    </div>  </div></div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>

	 
	function getComplainDetails(getComplainDetails){
        $('#updateAssignmentSubmissionModal').modal('show'); 
        let complain_id = $(getComplainDetails).attr('id');
		console.log(complain_id);
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
        $.ajax({
           url: {{ route('customer.getComplainDetails') }},
           type: 'post',
           data:'complain_id='+complain_id,
           success:function(response){
               // $('#assignment-submission-values').val(JSON.parse(response).assignment_submission);
               // $('#assignment-submission-marksheet_id').val(JSON.parse(response).id);
               // $('#assignment-submission-session_id').val(JSON.parse(response).session);
               // $('#assignment-submission-class_id').val(JSON.parse(response).class);
               // $('#assignment-submission-exam_id').val(JSON.parse(response).exam_type);
                
           }
       })
    }
	
	
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>

    @endsection
