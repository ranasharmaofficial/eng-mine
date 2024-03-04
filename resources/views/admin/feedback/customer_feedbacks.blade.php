@extends('admin.include.master')

@section('title', 'Customer Feedback')

@section('content')


<div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header mb-0 pt-3">
        <div class="row align-items-center">
          <div class="col">
            <div class="breadcrumb ">
              <a href="index.php">
                <i class="fa fa-home" aria-hidden="true"></i> Dashboard </a> / Customer Feedback
            </div>
          </div>
          {{--<div class="col">
            <a href="{{ url('admin/engineer-list/create') }}" class="btn btn-info float-right veiwbutton">
              <i class="fa fa-plus" aria-hidden="true"></i> Add New Engineer List </a>
          </div>--}}
        </div>
      </div>
      <hr>
      <div class="main-panel card-header ">
        <div class="row gutters-5 align-items-center">
          <div class="col">
            <h5 class="mb-md-0 h6">Customer Feedback</h5>
          </div>
          <div class="col text-right">
            <a href="{{ route('admin.exportCustomerFeedback') }}" class="btn btn-circle btn-info h-35" download>
              <span>Export in Excel</span>
            </a>
          </div>
          
          <div class="col-md-3">
            <div class="form-group mb-0">
              <input type="text" class="form-control form-control-sm h-35" id="search" name="search" placeholder="Type & Enter">
            </div>
          </div>
          <div class="col-md-1 pl-0 text-right">
            <button type="submit" class="btn btn-danger btn-icon-text h-35">
              <i class="ti-file btn-icon-prepend"></i> Submit </button>
          </div>
        </div>
        <hr>
         
        <div class="table-responsive">
          <table class="table table-striped fs-13 lsp-5">
            <thead>
              <tr>
                <th> Customer Name </th>
                <th> Order Id </th>
                <th> Rating </th>
                <th> Feedback </th>
                <th> Approved By </th>
                <th> Status </th>
                <th> Date </th>
                
              </tr>
            </thead>
            <tbody> @foreach($customer_feedbacks as $key => $item) <tr>
                <td class="py-1">  {{ $item->first_name.' '.$item->last_name }} </td>
                <td class="py-1"> {{ $item-> service_order_id }} </td>
                <td>{{ $item->rating }}</td>
                <td>{{ $item->feedback }}</td>
                <td>
					@if($item->rating_approved_by!=null)
						@php $getApprovedByName = \App\Models\User::where('id', $item->rating_approved_by)->first(); @endphp
						{{ $getApprovedByName->first_name.' '.$getApprovedByName->last_name }}
					@endif
				</td>
                <td>
                  <select class="approved_status bg-warning text-white" name="status" data-feedback_id="{{$item->id}}">
                    <option value="0" class="text-success" @if($item->status == 0) selected @endif>Pending</option>
                    <option value="1" class="text-danger" @if($item->status == 1) selected @endif>Approved</option>
                  </select>
                </td>
                <td>
                  {{ date('d-M-Y', strtotime($item->created_at)) }}
                </td>
                 
              </tr> @endforeach </tbody>
          </table>
        </div>
		
        <div class="aiz-pagination mt-3 w-100">
			<div class="row justify-content-between">
				<div class="col-sm-6">
					<div class="dataTables_info fs-13 fw-bold" id="geniustable_info" role="status" aria-live="polite">Showing {{ $customer_feedbacks->currentPage() }} to {{ $customer_feedbacks->perPage() }} of {{ $customer_feedbacks->total() }} entries</div>
				</div>

				<div class="col-sm-6">
					{{ $customer_feedbacks->appends(request()->input())->links() }}
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
