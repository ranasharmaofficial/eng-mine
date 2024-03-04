@extends('admin.include.master')

@section('title', 'Certified Engineer')

@section('content')


<div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header mb-0 pt-3">
        <div class="row align-items-center">
          <div class="col">
            <div class="breadcrumb ">
              <a href="index.php">
                <i class="fa fa-home" aria-hidden="true"></i> Dashboard </a> / Engineer List
            </div>
          </div>
            <div class="col">
				<a href="{{ route('admin.addCertifiedEngineer') }}" class="btn btn-info float-right veiwbutton ">Add Certified Engineer</a>
			</div>
        </div>
      </div>
      <hr>
      <div class="main-panel card-header ">
        <form method="get" class="row gutters-5 align-items-center">
          <div class="col">
            <h5 class="mb-md-0 h6">Certified Engineer List </h5>
          </div>
          <div class="col text-right">
            <a href="image/incomplete_orders.xlsx" class="btn btn-circle btn-info h-35" download>
              <span>Export in Excel</span>
            </a>
          </div>
          <div class="col-md-3 ml-auto">
             
          </div>
          <div class="col-md-3">
            <div class="form-group mb-0">
              <input type="text" class="form-control form-control-sm h-35" value="{{ $request->title }}" id="search" name="title" placeholder="Search by title">
            </div>
          </div>
          <div class="col-md-1 pl-0 text-right">
            <button type="submit" class="btn btn-danger btn-icon-text h-35">
              <i class="ti-file btn-icon-prepend"></i> Submit </button>
          </div>
        </form>
        <hr>
         
        <div class="table-responsive">
          <table class="table table-striped fs-13 lsp-5">
            <thead>
              <tr>
                <th> Sl </th>
                <th> Title </th>
                <th> Description </th>
                <th> Logo </th>
                <th> Status </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
				@foreach($certifiedEngineerList as $key => $item) 
					<tr>
						<td class="py-1">  {{ $key+1 }} </td>
						<td class="py-1"> {{ $item->title }} </td>
						<td>{{ $item->description }}</td>
						<td><img src="{{ static_asset('uploads/'.$item->logo)}}" class="w-50px" title="{{ $item->title }}"></td>
						<td>
							@if($item->status==1)
								<p class="text-success font-weight-bold">Active</p>
							@else
								<p class="text-danger font-weight-bold">In Active</p>
							@endif
						</td>
						
						<td>
							 <a class="btn btn-primary" href="{{ url('admin/engineer/edit-certified-engineer/'.$item->id) }}">Edit</a>
							 <a class="btn btn-danger" onclick="return confirm('Are you sure, you want to remove certified engineer?')" href="{{route('admin.deleteCertifiedEngineer',$item->id)}}">Delete</a>
						</td>
					 
				    </tr>
				@endforeach 
			</tbody>
          </table>
        </div>
		
        <div class="aiz-pagination mt-3 w-100">
			<div class="row justify-content-between">
				<div class="col-sm-6">
					<div class="dataTables_info fs-13 fw-bold" id="geniustable_info" role="status" aria-live="polite">Showing {{ $certifiedEngineerList->currentPage() }} to {{ $certifiedEngineerList->perPage() }} of {{ $certifiedEngineerList->total() }} entries</div>
				</div>

				<div class="col-sm-6">
					{{ $certifiedEngineerList->appends(request()->input())->links() }}
				</div>
			</div>
		</div>
		
      </div>
    </div>
  </div>


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
            url: "{{url('admin/engineer/change_status')}}"
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

 


