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
         background-color: #f2f3f4;
         color: #000;
         }
      </style>
   </head>
   <body>
      <table class="order-details">
         <thead>
            <tr>
               <td width="15%" class="" style="border:none;">
                  <a href="#"><img src="http://localhost/engineer/public/uploads/logo/header-logo.png" alt="" style="width:auto; height:50px; width:150px;object-fit:contain;"></a>
               </td>
               <td width="55%" colspan="2" style="border:none;">
                  <h2 style="padding:5px 0; margin:0; font-size:18px;letter-spacing: 0.5px;">Engineersmine Pvt.Ltd</h2>
                  <span style="line-height: 1.6;  font-shark: always; font-weight:600; font-size:13px; color:#333">Company Id:U72900HR2019PTC080831<br>   
                  Unit No 304-305, Tower B4,<br> IT Spaze Park,
                  Sohna Road, Sector 49,<br> Gurgaon, Haryana, Pin
                  122018</pre><br>
                  <span>GSTIN: 06AAICC2249L1ZI </span>
               </td>
               <td style="border:none">
                  <p style="font-size:25px; padding-top:72px;position:relative;top:30px;">TAX INVOICE</p>
                  <span style="padding: 10px 0; display: inline-block;"><b>Invoice#</b> {{ $order->service_order_id }}</span>
               </td>
            </tr>
         </thead>
      </table>
      <table class="border-none">
         <tr>
            <td width="50%"style="border:none; padding:0;margin:0;">
               <table width="100%" style="border:none;">
                  <tr style="width:50%; display:inline-block;">
                     <td style="width:100%; border:none; display:inline-block; padding:0px 0px 0px 8px; margin:0;">
                        Invoice Date
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0px 0px 0px 8px; margin:0;">
                        Terms
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0px 0px 0px 8px; margin:0;">
                        Due Date
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0px 0px 0px 8px; margin:0;">
                        P.O.#
                     </td>
                  </tr>
                  <tr style="width:50%; display:inline-block;">
                     <td style="width:100%; border:none; display:inline-block; padding:0px 0px 0px 8px; margin:0;">
                        <b> : {{ date('d-M-Y') }}</b>
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0px 0px 0px 8px; margin:0;">
                        <b>:  Due on Receipt</b>
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0px 0px 0px 8px; margin:0;">
                        <b>: {{ date('d-M-Y') }}</b>
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0px 0px 0px 8px; margin:0;">
                        <b>: Mail</b>
                     </td>
                  </tr>
               </table>
            </td>
            <td width="50%" style="margin:0; padding:0;">
               <table width="100%" style="border:none;">
                  <tr style="width:50%; display:inline-block;">
                     <td style="width:100%; border:none; display:inline-block; padding:0px 0px 0px 8px; margin:0;">
                        Place Of Supply 
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0px 0px 0px 8px; margin:0;">
                        Advance Payment  
                     </td>
                     <td style="width:100%; border:none; display:inline-block;">
                        <!-- Estimate Date -->
                     </td>
                     <td style="width:100%; border:none; display:inline-block;">
                        <!-- Reference#  -->
                     </td>
                  </tr>
                  <tr style="width:50%; display:inline-block;">
                     <td style="width:100%; border:none; display:inline-block;padding: 0; margin: 0;">
                        <b>: Delhi (07)</b>
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding: 0; margin: 0;">
                        <b>: 0</b>
                     </td>
                    
                     <td style="width:100%; border:none; display:inline-block;">
                        <!-- <b>: 14/10/2023</b> -->
                     </td>
                     <td style="width:100%; border:none; display:inline-block;">
                        <!-- <b>: Mail</b> -->
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr>
            <td style="background-color:#f2f3f4;font-weight:bold;">Bill To</td>
            <td style="background-color:#f2f3f4;font-weight:bold;">Ship To</td>
         </tr>
         <tr>
            <td width="50%"style="border:none;">
               <table width="100%" style="border:none;">
                  <tr style="width:100%; display:inline-block;">
                     <td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        <b>{{ $user_details->first_name.' '.$user_details->last_name }}</b>
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        {{ $user_details->address }}
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        {{ $user_details->mobile }}
                     </td>
                     <!--<td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        New Delhi
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        delhi
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        110044 Delhi
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        India
                     </td>-->
                     <td style="width:100%;text-transform:uppercase; border:none; display:inline-block; padding:0;margin:0">
                        GSTIN  {{ $user_details->gst_number }}
                     </td>
                  </tr>
               </table>
            </td>
            <td width="50%" style=" ">
               <table width="100%" style="border:none; padding:0;margin:0">
                  <tr style="width:100%; display:inline-block;">
                     <td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        <b>{{ $user_details->first_name.' '.$user_details->last_name }}</b>
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        {{ $user_details->address }}
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        {{ $user_details->mobile }}
                     </td>
                     <!--<td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        New Delhi
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        delhi
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        110044 Delhi
                     </td>
                     <td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        India
                     </td>-->
                     <td style="width:100%; border:none; display:inline-block; padding:0;margin:0">
                        GSTIN  {{ $user_details->gst_number }}
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
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
      <table width="100%" style="padding:0; margin:0;">
         <tr>
            <th style="border: none; border-right:1px solid #9e9e9e; background-color:#f2f3f4">#</th>
            <th style="border:none; border-right:1px solid #9e9e9e; background-color:#f2f3f4; text-align:left;">Item & Description </th>
            <th style="border:none; border-right:1px solid #9e9e9e; background-color:#f2f3f4; text-align:left;">HSN/SAC </th>
            <th style="border:none; border-right:1px solid #9e9e9e; background-color:#f2f3f4; text-align:right;">Qty</th>
            <th style="border:none; border-right:1px solid #9e9e9e; background-color:#f2f3f4; text-align:right;">Rate</th>
            <th style="border:none; border-right:1px solid #9e9e9e; background-color:#f2f3f4; text-align:right;">Amount</th>
         </tr>
        @foreach($OrderDetails as $key => $item) 
		 <tr>
            <td style="text-align:center;">{{ $key+1 }}</td>
            <td>
                {{ $item->service_name }} </br> {{ $item->sub_service_name }}
            </td>
            <td>84714900</td>
            <td style="text-align:right">{{ $item->qty }}</td>
            <td style="text-align:right">{{ number_format($item->price, 2) }}</td>
            <td style="text-align:right">{{  number_format($item->total_price, 2) }}</td>
         </tr>
				@php
					$total_service_amount = $total_service_amount+$item->total_price;
				@endphp
		@endforeach
      </table>
	  @php  $gst_amount = (18 / 100) * $total_service_amount; @endphp
	  @php 
							$grand_total = $total_service_amount+$gst_amount;
						@endphp
       <table widt="100%">
            <thead>
               <tr>
                  <td class="text-start heading;" style="width: 50%;">
                     <p>Total In Words</p>
                     <p style="font-weight:bold; font-style:italic;">{{ getIndianCurrency($grand_total) }}</p>
                    </td>
                  <td class=" text-start heading;" style="width: 50%; margin:0; padding:0;">
                     <table id="table2" style="border:none;">
                        <tr>
                           <th style="color: #000; font-size:12px; border:none; text-align:right; width:80%;  padding:0px 20px 0px 20px; margin:0;">Sub Total </th>
                           <td style="border:none; width:10%; padding:0; margin:0;">Rs&nbsp;{{ number_format($total_service_amount, 2) }}</td>
                        </tr>
						
                        <tr>
                           <th style="color: #000; border:none; font-size:12px; text-align:right; padding:0px 20px 0px 20px; margin:0;">IGST (18%) :-</th>
                           <td style="border:none; padding:0; margin:0;">Rs&nbsp;{{ number_format($gst_amount, 2) }}</td>
                        </tr> 
						
                        <tr>
                           <th style="color: #000; border:none; font-size:12px; font-weight:bold; text-align:right; padding:0px 20px 0px 20px; margin:0;">Total</th>
                           <td style="border:none; padding:0; margin:0;"><b>Rs<b/>&nbsp;{{ number_format($grand_total, 2) }}</td>
                        </tr>
                        <!--<tr>
                            <th style="color: #000; border:none; border-bottom:1px solid #9e9e9e; font-size:12px; border-bottom:1px solid #9e9e9e; font-weight:bold; text-align:right; padding:0px 20px 0px 20px; margin:0;">Balance Due</th>
                            <td style="border:none; padding:0; border-bottom:1px solid #9e9e9e; margin:0; border-bottom:1px solid #9e9e9e;"><b>Rs<b/>&nbsp;200</td>
                         </tr>-->
                     </table>
                  </td>
               </tr>
            </thead>
         </table>
	@endif
         <table width="100%">
            <tr>
                <td>
                    <ul>
                        <li style="list-style: none;">ICICI Bank Limited
                        </li>
                        <li style="list-style: none;">A/C No :- 343005000448
                        </li>
                        <li style="list-style: none;">IFSC Code:- ICIC0003430
                        </li>
                    </ul>
                    <h5>Terms & Conditions</h5>
                    <ol style="">
                        <li>Payment will in 15 Days after Submission of Invoices</li>
                        <li>Interest rate of 18 % will be applicable if payment beyond to 30 days .</li>
                        <li>Items Once sold will not be return back</li>
                    </ol>
                </td>
            </tr>
         </table>
         <table width="100%">
            <tr>
                <td style="text-align: end;">
                
                </td>
            </tr>
         </table>
         <table width="100%">
            <tr>
                <td width="20%">
                    <img src="images/sqcin=.png" alt="">
                </td>
                <td width="80%">
                    <table id="table2" style="border:none;">
                        <tr>
                           <td style="color: #000; font-size:12px; border:none; width:20%;  padding:0px 20px 0px 20px; margin:0;">IRN : </td>
                           <td style="border:none; width:90%; padding:0; margin:0;">0930b3b2a7b42d0fcedab6598288f90a75e5a7f183c1432538c461247bf3e751
                        </td>
                        </tr>
                        <tr>
                           <td style="color: #000; border:none; font-size:12px; padding:0px 20px 0px 20px; margin:0;">Ack No. :</td>
                           <td style="border:none; padding:0; margin:0;">132417354398727</td>
                        </tr> 
                        <tr>
                           <td style="color: #000; border:none; font-size:12px; font-weight:bold; padding:0px 20px 0px 20px; margin:0;">Ack Date : </td>
                           <td style="border:none; padding:0; margin:0;">	024-02-08 15:22:00</td>
                        </tr>
                     </table>
                     <span style="padding: 10px 0; display: inline-block;">e-Invoicing detail(s) generated from the Government's e-Invoicing system.</span>
                </td>
            </tr>
         </table>
		@if(count($OrderDetails)>0)
         <table width="100%">
			@foreach($OrderDetails as $key => $val)
            <tr>
                <td>
                    <h2>Service Details - (Router Basic Installation) 1</h2>
                </td>
            </tr>
			@if($val->service_pre_requiste!=null)
            <tr>
                <td>
                    <h4>Service Pre requisite</h4>
                    {!! $val->service_pre_requiste !!}
                </td>
            </tr>
			@endif
			
			@if($val->service_scope_of_work!=null)
				<tr>
					<td>
						<h4>Service Scope of Work</h4>
						{!! $val->service_scope_of_work !!}
					</td>
				</tr>
			@endif
			
			@if($val->service_completion_criteria!=null)
				<tr>
					<td>
						<h4>Service Completion Criteria</h4>
						{!! $val->service_completion_criteria !!}
					</td>
				</tr>
			@endif
			
			@if($val->service_inclusion!=null)
				<tr>
					<td>
						<h4>Service Inclusion</h4>
						{!! $val->service_inclusion !!}
					</td>
				</tr>
			@endif
			
			@if($val->service_exclusion!=null)
				<tr>
					<td>
						<h4>Service Exclusion</h4>
						{!! $val->service_exclusion !!}
					</td>
				</tr>
			@endif
			
			@if($val->service_adons!=null)
				<tr>
					<td>
						<h4>Service Adons</h4>
						{!! $val->service_adons !!}
					</td>
				</tr>
			@endif
			
			@endforeach
         </table>
		@endif
      <br>
      <p class="text-center">
         Thank you for your business!
      </p>
      <p class="text-center">
         <small> Should you have any enquiries concerning this quotation, please contact us.</small>
      </p>
      </div>
   </body>
</html>