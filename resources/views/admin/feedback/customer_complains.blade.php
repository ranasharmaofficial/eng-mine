@extends('admin.include.master')

@section('title', 'Customer Complains')

@section('content')


<div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header mb-0 pt-3">
        <div class="row align-items-center">
          <div class="col">
            <div class="breadcrumb ">
              <a href="index.php">
                <i class="fa fa-home" aria-hidden="true"></i> Dashboard </a> / Customer Complains
            </div>
          </div>
          <div class="col">
            <a href="{{ url('admin/dashboard') }}" class="btn btn-info float-right veiwbutton">
              <i class="fa fa-plus" aria-hidden="true"></i> Back </a>
          </div>
        </div>
      </div>
      <hr>
      <div class="main-panel card-header ">
        <div class="row gutters-5 align-items-center">
          <div class="col">
            <h5 class="mb-md-0 h6">Customer Complains</h5>
          </div>
          <div class="col text-right">
            <a href="{{ route('admin.exportCustomerFeedback') }}" class="btn btn-circle btn-info h-35" download>
              <span>Export in Excel</span>
            </a>
          </div>
          
          <hr>
		    <form method="get" action="">
				<div class="input-group mb-3 search-filter">
					@csrf
					<input type="text" value="{{ $request->name }}" name="name" class="form-control mr-1" placeholder="Customer Name" value="">
					<input type="text" value="{{ $request->order_id }}"name="order_id" class="form-control mx-1" placeholder="Order Id" value="">
					<input type="text" value="{{ $request->complain_status }}" name="complain_status" class="form-control mx-1" placeholder="Status" value="">
					<button class="btn btn-primary" type="submit" value="submit">Search</button>
					<a href="{{ route('admin.customerComplain') }}" class="btn btn-danger" >Refresh</a>
				</div>
			</form>
        </div>
        <hr>
         
        <div class="table-responsive">
          <table class="table table-striped fs-13 lsp-5">
            <thead>
              <tr>
                <th> Sl. </th>
                <th> Customer Name </th>
                <th> Order Id </th>
                <th> Rating </th>
                <th> Feedback </th>
                <th> Approved By </th>
                <th> Status </th>
                <th> Date </th>
                
              </tr>
            </thead>
            <tbody> 
			@foreach($customer_complains as $key => $item) 
				<tr>
					<td class="py-3">{{ $key+1 }}</td>
					<td class="py-3">{{ $item->first_name.' '.$item->last_name }}</td>
					<td class="py-3">{{ $item->service_order_id }}</td>
					<td class="py-3">{{ $item->subject }}</td>
					<td class="py-3">{{ $item->complain_details }} </td>
					<td style="text-transform:uppercase" class="py-3">{{ $item->complain_status }}</td>
					<td style="" class="py-3">{{ $item->cmplain_status_remarks }}</td>
					<td class="py-3">{{ date('d-M-Y', strtotime($item->created_at)) }}</td>
					<td class="py-3">
						<button type="button" class="btn btn-primary" data-toggle="modal"
							data-target="#staticBackdrop">
							Change Status
						</button>
					</td>
				</tr>
			@endforeach 
			  
			  
			  
			  </tbody>
          </table>
        </div>
		
        <div class="aiz-pagination mt-3 w-100">
			<div class="row justify-content-between">
				<div class="col-sm-6">
					<div class="dataTables_info fs-13 fw-bold" id="geniustable_info" role="status" aria-live="polite">Showing {{ $customer_complains->currentPage() }} to {{ $customer_complains->perPage() }} of {{ $customer_complains->total() }} entries</div>
				</div>

				<div class="col-sm-6">
					{{ $customer_complains->appends(request()->input())->links() }}
				</div>
			</div>
		</div>
		
      </div>
    </div>
  </div>



 



@endsection

@section('script')
<script type="text/javascript">
     


    $(".approved_status").change(function(event) {
        event.preventDefault();
        var feedback_id = $(this).data("feedback_id");
        var status = $(this).val();
        approveStatus(feedback_id, status);
    });

    function approveStatus(feedback_id, status) {
        $.ajax({
            url: "{{url('admin/feedback/approve_status')}}",
			type: "GET",
			data: {
                id: feedback_id,
				status: status,
				_token: '{{csrf_token()}}'
            },
			dataType: 'json',
			success: function(result) {
                toastr.success("Status Successfully Updated");
            }
        });
    }

</script>
@endsection
