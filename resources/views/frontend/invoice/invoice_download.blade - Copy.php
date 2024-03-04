<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Engineersmine Order Invoice #{{ $order_id }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
		ul{
			padding:0 !important;
		}
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Engineersmine Technologies <br> Private Limited</h2>
                </th>
				        <th width="50%" colspan="2">
                    <h2 class="text-start">Tax Invoice</h2>
                </th>
            </tr>
			<tr>
	                  <td width="50%%" colspan="2">
             <p>
			 Unit No 304-305, Tower B4, IT Spaze Park,<br>
			Sohna Road, Sector 49, Gurgaon, Haryana, Pin<br>
			122018
			 </p>
			 <ul style="pading:1px; margin:0;">
			 <li style="width:100%; list-style:none; margin:10px 0; display:inline-block;">
			 <div style="display:inline-block; width:20%">
			 <span><b>Phone</b></span>
			 </div>
			 <div style="display:inline; width:80%">
			 <sapn>734-697-2907</span>
			 </div>
			 </li>
			 		 <li style="width:100%; list-style:none; margin:10px 0; display:inline-block;">
			 <div style="display:inline-block; width:20%">
			 <span><b>Email</b></span>
			 </div>
			 <div style="display:inline; width:80%">
			 <sapn><a href="#">info@engineersmine.com
</a></span>
			 </div>
			 </li>
			 		 <li style="width:100%; list-style:none; margin:10px 0; display:inline-block;">
			 <div style="display:inline-block; width:20%">
			 <span><b>Website</b></span>
			 </div>
			 <div style="display:inline; width:80%">
			 <sapn><a href="#">https://www.engineersmine.com</a></span>
			 </div>
			 </li>
			 		 <li style="width:100%; list-style:none; margin:10px 0; display:inline-block;">
			 <div style="display:inline-block; width:20%">
			 <span><b>GSTIN</b></span>
			 </div>
			 <div style="display:inline; width:80%">
			 <sapn>06AAICC2249L1ZI</span>
			 </div>
			 </li>
			 </ul>
			  
                </td>
				<td width="50%" colspan="2">
					<table style="width:100%">
					<tr>
						<th>Quote Ref No.</th>
						<td>EGMNE-ORD-00{{$temp_order_id}}</td>
					  </tr>
					  <tr>
						<th>Invoice Date:</th>
						<td>{{ date('d-M-Y') }}</td>
					  </tr>
					  <tr>
						<th>Invoice  No.</th>
						<td>EGMNE-ORD-{{date('Y')}}-{{ $order_id }}</td>
					  </tr>
					  
					</table>
				</td>
			
            <tr class="bg-blue">
                <th width="50%" colspan="2">Billed To</th>
                <th width="50%" colspan="2">Service To</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><b>Client Name</b></td>
                <td>{{ $user_details->first_name.' '.$user_details->last_name }}</td>
                <td><b>Client Name</b></td>
                <td>{{ $user_details->first_name.' '.$user_details->last_name }}</td>
            </tr>
            <tr>
                <td><b>Address</b></td>
                <td>{{ $user_details->address }}</td>

                <td><b>Address</b></td>
                <td>{{ $user_details->address }}</td>
            </tr>
            <tr>
                <td><b>Phone:</b></td>
                <td>{{ $user_details->mobile }}</td>

                <td><b>Phone:</b></td>
                <td>{{ $user_details->mobile }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Service Category</th>
                <th>Service Sub Category</th>
                <th>Service Type</th>
                <th>Stie Type</th>
                <th>Model No.</th>
				<th>Unit Cost</th>
				<th>Qty</th>
				<th>Amount</th>
            </tr>
        </thead>
        <tbody>
		
		@php
			$OrderDetails = \App\Models\OrderDetail::select('order_details.*', 'cat.name as category_name', 'subcat.name as subcategory_name', 's.name as service_name', 's.service_pre_requiste', 's.service_scope_of_work', 's.service_completion_criteria',  's.service_inclusion', 's.service_exclusion', 's.service_adons', 'sub.name as sub_service_name')
				->leftJoin('service_categories as cat', 'cat.id', '=', 'order_details.category_id')
				->leftJoin('service_sub_categories as subcat', 'subcat.id', '=', 'order_details.subcategory_id')
				->leftJoin('services as s', 's.id', '=', 'order_details.service_id')
				->leftJoin('sub_services as sub', 'sub.id', '=', 'order_details.subservice_id')
				->where('order_id', $order_id)
				->latest()->get();
			//	dd($order_id);
		@endphp
		
		@if(count($OrderDetails)>0)
			@php
				$total_service_amount = 0;
			@endphp
			@foreach($OrderDetails as $item)
				<tr>
					<td width="10%">{{ $item->category_name }}</td>
					<td>{{ $item->subcategory_name }}</td>
					<td width="10%">{{ $item->service_name }} ({{ $item->sub_service_name }})</td>
					<td width="10%">@if($item->activity_type=='on_site') On Site @else Off Site @endif </td>
					<td width="15%" class="fw-bold">{{ $item->model }}</td>
					<td width="15%" class="fw-bold"><b>Rs<b/>&nbsp;{{ $item->price }}</td>
					<td width="10%">{{ $item->qty }}</td>
					<td width="10%"><b>Rs<b/>&nbsp;{{ $item->total_price }}</td>
			 
				</tr>
				@php
					$total_service_amount = $total_service_amount+$item->total_price;
				@endphp
			@endforeach
		@endif
			 <tr>

         
            </tr>
        </tbody>
    </table>
	
	<table>
        <thead>
            <tr>
                <td class="no-border text-start heading;" colspan="5" style="width: 75%;">
                    <ol>
                        <li>Deposite amount and payment method requirements here</li>
                        <li>Make all cheques payable to my company name</li>
                        <li>Warranty terms here</li>
                    </ol>
                </td>
                <td class="no-border text-start heading;" colspan="5" style="width: 75%;">
                    <table id="table2">
					{{--<tr>
                          <th style="background-color: blueviolet; color: #fff; border: 1px solid black;">Special Discount</th>
                          <td style="border: 1px solid black;">100%</td>
                        </tr>--}}
						<tr>
                          <th style="background-color: blueviolet; color: #fff; border: 1px solid black;">SUBTOTAL</th>
                          <td style="border: 1px solid black;"><b>Rs<b/>&nbsp;{{ $total_service_amount }}</td>
                        </tr>
                        <tr>
							@php  $gst_amount = (10 / 100) * $total_service_amount; @endphp
                          <th style="background-color: blueviolet; color: #fff; border: 1px solid black;">GST @ 10%</th>
                          <td style="border: 1px solid black;"><b>Rs<b/>&nbsp;{{$gst_amount}}</td>
                        </tr>
						@php 
							$grand_total = $total_service_amount+$gst_amount;
						@endphp 
                        <tr>
                            <th style="background-color: blueviolet; color: #fff; border: 1px solid black;">Total Amount</th>
                            <td style="border: 1px solid black;"><b>Rs<b/>&nbsp;{{ $grand_total }}</td>
                          </tr>
                      </table>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>


            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <td class="no-border text-start heading;" colspan="5" style="width: 75%; text-align: right;text-transform: capitalize;">
                    (In Words: {{ getIndianCurrency($grand_total) }})
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>


            </tr>
        </tbody>
    </table>
	
	<hr>
	@if(count($OrderDetails)>0)
		@foreach($OrderDetails as $key => $val)
			<table style="padding:10px;">
				<div class="text-start heading" style="width:100%;padding:10px;">
					<strong>Service Details - ({!! $val->service_name !!}) {{$key+1}}</strong>
				</div>
						 
				<div style="padding:10px;" width="100%">
					@if($val->service_pre_requiste!=null)
						<div style="width:66%">
							<strong>Service Pre requisite</strong>
								{!! $val->service_pre_requiste !!}
						</div>
					@endif
					<hr>
					<div style="width:66%">
						<strong>Service Scope of Work</strong>
						{!! $val->service_pre_requiste !!}
					</div>
					<div style="width:66%">
						<strong>Service Completion Criteria</strong>
						{!! $val->service_completion_criteria !!}
					</div>
					<div style="width:66%">
						<strong>Service Inclusion</strong>
						{!! $val->service_inclusion !!}
					</div>
					
					<div style="width:66%">
						<strong>Service Exclusion</strong>
						{!! $val->service_exclusion !!}
					</div>
					
					<div style="width:66%">
						<strong>Service Adons</strong>
						{!! $val->service_adons !!}
					</div>
				</div>
					
					 
					
					
				 
			</table>
		@endforeach
	@endif

    <br>
    <p class="text-center">
        Thank you for your business!
    </p>
	<p class="text-center">
       <small> Should you have any enquiries concerning this quotation, please contact us.</small>
	</p>

</body>
</html>