@extends('admin.include.master')

@section('title', 'Estimate List')

@section('content')
<style>
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
</style>
    <link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/css/app.css')}}">
<div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header mb-0 pt-3">
        <div class="row align-items-center">
          <div class="col">
            <div class="breadcrumb ">
              <a href="{{ url('admin/dashboard') }}">
                <i class="fa fa-home" aria-hidden="true"></i> Dashboard </a> / Estimate List
            </div>
          </div>
          {{--<div class="col">
            <a href="{{ url('admin/engineer-list/create') }}" class="btn btn-info float-right veiwbutton">
              <i class="fa fa-plus" aria-hidden="true"></i> Back </a>
          </div>--}}
        </div>
      </div>
      <hr>
      <div class="main-panel card-header ">
        <div class="row gutters-5 align-items-center">
          <div class="col">
            <h5 class="mb-md-0 h6">Showing estimate of</h5>
          </div>
          {{--<div class="col text-right">
            <a href="{{ route('admin.customerExport') }}" class="btn btn-circle btn-info h-35" download>
              <span>Export in Excel</span>
            </a>
          </div>--}}
           
           
        </div>
         
        <hr>
		
		<div class="row justify-content-center">
			<div class="col-sm-6">
						 
				<table class="table table-striped table-bordered fs-13 lsp-5">
					<thead>
						
					  <tr>
						<th> Name. </th>
						<th> {{ $guest_details->first_name.' '.$guest_details->last_name }} </th>
					  </tr>
					  <tr>
						<th> Mobile. </th>
						<th> {{ $guest_details->mobile }} </th>
					  </tr>
					  <tr>
						<th> Email. </th>
						<th> {{ $guest_details->email }} </th>
					  </tr>
					  <tr>
						<th> Address. </th>
						<th> {{ $guest_details->address }} </th>
					  </tr>
					</thead>
					
				</table>
			</div>
		</div>
        <div class="table-responsive">
         
		  
		   
		  
		  <article style="padding: 0rem 0;" class="example4">
                     
				@foreach($estimate_list as $key => $item) 
						 
					<div class="wrapBoxContent">
                        <div class="button cssCollapse-target cssCollapse-noScroll">
                            <span class="cssCollapse-collapseIcons cssCollapse-plus"></span>
                            <span class="cssCollapse-text">{{$key+1}}. Quotation Generated on {{ date('d-M-Y', strtotime($item->created_at)) }}</span>
                            
                        </div>

                        <div class="boxHidden cssCollapse-hiddenContent">
                            <div class="innerText">
							
								<div class="row">
										<div class="col-md-8">
											<p><b>Message:</b>&nbsp;{{ $item->message }}</p>
										</div>
										<div class="col-md-2">
											@if($item->files!=null)
												<a style="float:right;background-color:green;" target="_blank" href="{{ static_asset('uploads/cost_estimate/'.$item->files) }}" class="btn btn-primary btn-sm">View Attcahed Doc.</a>
											@else
												<a style="float:right;background-color:green;" onclick="return confirm('Files are not added.')" href="javascript:void(0)" class="btn btn-primary btn-sm">View Attcahed Doc.</a>
											@endif
										</div>
										<div class="col-md-2">
											<a style="float:right;" href="{{ url('estimate/download-estimate/'.$item->id) }}" class="btn btn-danger btn-sm">Download Quotation</a>
										</div>
										
									</div>
									@php
												$tempOrderDetails = \App\Models\TempOrderDetail::select('temp_order_details.*', 'cat.name as category_name', 'subcat.name as subcategory_name', 's.name as service_name', 'sub.name as sub_service_name')
													->leftJoin('service_categories as cat', 'cat.id', '=', 'temp_order_details.category_id')
													->leftJoin('service_sub_categories as subcat', 'subcat.id', '=', 'temp_order_details.subcategory_id')
													->leftJoin('services as s', 's.id', '=', 'temp_order_details.service_id')
													->leftJoin('sub_services as sub', 'sub.id', '=', 'temp_order_details.subservice_id')
													->where('temp_order_id', $item->id)
													->where('temp_order_details.status', 1)
													->latest()->get();
											@endphp
				@if(count($tempOrderDetails)>0)
								<div class="table-responsive mt-3">
									<table class="table">
										<thead>
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
													$total_service_amount = 0;
												@endphp
												@foreach($tempOrderDetails as $item)
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
											 
												 <tr>

											 
												</tr>
										</tbody>
									</table>
								</div>
								<table>
									<thead>
										<tr>
											 
											<td class="no-border text-start heading;" colspan="5" >
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
								@endif
                            </div>
                        </div>
                    </div>
					
					 
				@endforeach
                     
                </article>
				
				
        </div>
		
        <div class="aiz-pagination mt-3 w-100">
			<div class="row justify-content-between">
				<div class="col-sm-6">
					<div class="dataTables_info fs-13 fw-bold" id="geniustable_info" role="status" aria-live="polite">Showing {{ $estimate_list->currentPage() }} to {{ $estimate_list->perPage() }} of {{ $estimate_list->total() }} entries</div>
				</div>

				<div class="col-sm-6">
					{{ $estimate_list->appends(request()->input())->links() }}
				</div>
			</div>
		</div>
		
      </div>
    </div>
  </div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form method="" id="update-employement-status">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Employment Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="display:none;" id="show-form-error" class="alert alert-danger">
                        <ul>
                            <div class="errorMsgntainer"></div>
                        </ul>
                    </div>

                    <select name="emp_employment_status" id="emp_employment_status" class="form-control" required="">
                        <option value="1"> Approve </option>
                        <option value="0"> Reject </option>
                    </select>
                </div>
                <div class="col-sm-12  my-3">
                    <input style="visibility:show !important;" type="text" name="employment_block_reason" id="editor" class="form-control" required="" placeholder="Please enter reason here." />
                </div>

                <div class="col-sm-offset-2 col-sm-10  my-3">
                    <input type="hidden" name="engId" id="engId">
                    <input type="hidden" id="adminId" value="{{ Session('LoggedUser')->user_id }}">
                    <button type="button" class="btn btn-primary update_employment_status">Update </button>
                </div>
            </form>
        </div>

    </div>

</div>



@endsection

@section('script')

<script type="text/javascript">
            // Example 1
            $('.example1').cssCollapse({
                transition: {
                    behavior: 'ease-in-out',
                    duration: '800ms'
                }
            });

            // Example 2
            $('.example2').cssCollapse({
                transition: {
                    behavior: 'ease-in-out',
                    duration: '1s',
                    delay: '500ms',
                }
            });

            // Example 3
            $('.example3').cssCollapse({
                accordion: true,
                prefix: 'accordion-',
                iconClose: 'cssCollapse-chevron-down',
                iconOpen: 'cssCollapse-chevron-up'
            });

            // Example 4
            $('.example4').cssCollapse({
                iconClose: 'dash',
                iconOpen: 'plus'
            });

            // Example 5
            $('.example5').cssCollapse({
                changeText: {
                    changeTextClass: 'changeText',
                    open: 'Open',
                    close: 'Close'
                }
            });
        </script>
		
<script type="text/javascript">
    $(document).on('click', '.update_employment_status', function(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("update-employement-status"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
			url: "{{ route('admin.updateEmploymentStatus') }}",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data) {
                // console.log('status ' + data.status);
                if (data.status == true) {
                    toastr.success('Updated Successfully.');
                    setTimeout(function() {
                        window.location = "{{ url('admin/engineer-list') }}"
                    }, 2000);
                } else {
                    toastr.error('Something went wrong.');
                }
            },

            error: function(err) {
                document.getElementById('show-form-error').style = "display: block";

                let error = err.responseJSON;
                $.each(error.errors, function(index, value) {
                    $('.errorMsgntainer').append('<span class="text-danger">' + value + '<span>' + '<br>');

                });

            }



        });

    });

    function updateEmploymentStatus(updateEmploymentStatus) {
        $('#exampleModal').modal('show');
        let user_id = $(updateEmploymentStatus).attr('id');
        $.ajax({
            url: "{{url('admin/engineer/engineer_details')}}"
            , type: 'get'
            , data: 'user_id=' + user_id
            , success: function(response) {
                // toastr.success("Status Successfully Updated");
                $('#engId').val(response.id);
            }
        })
    }


    $(".change_status").change(function(event) {
        event.preventDefault();
        var user_id = $(this).data("user_id");
        var status = $(this).val();
        changeStatus(user_id, status);
    });

    function changeStatus(user_id, status) {
        $.ajax({
            url: "{{url('admin/user/change_status')}}"
            , type: "GET"
            , data: {
                id: user_id
                , status: status
                , _token: '{{csrf_token()}}'
            }
            , dataType: 'json'
            , success: function(result) {
                toastr.success("Status Successfully Updated");
            }
        });
    }

</script>
@endsection
