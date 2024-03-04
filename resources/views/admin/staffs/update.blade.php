@extends('admin.include.master')
@section('title', 'Update Staff')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mb-0 pt-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="breadcrumb "><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard</a> / Staff</div>
                </div>
                <div class="col">
                    <a href="{{ url('admin/staffs') }}" class="btn btn-info float-right veiwbutton ">Back </a>
                </div>
            </div>
        </div>
        <hr>
        <hr>

        <div class="bg-white shadow p-3 rounded position-relative">
            <div class="tab-content profile-tab-cont mt-1">
                <div class="tab-pane fade active show" id="indian_cuisine">
                    <h6
                        class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                        Edit Staff Information</h6>
                        <form method="post" id="update-staff" action="#" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="row formtype">								<div class="col-md-12">									@if ($errors->any())										<div class="alert alert-danger">											<ul>												@foreach ($errors->all() as $error)													<li>{{ $error }}</li>												@endforeach											</ul>										</div>									@endif								</div>
								<input type="hidden" name="id" value="{{ $staff->id }}">
                                <div class="col-md-6">                                <div class="form-group">                                    <label>First Name <span class="text-danger">*</span>                                    </label>                                    <input type="text" value="{{ $staff->first_name }}" class="form-control" name="first_name">                                </div>                            </div>                            <div class="col-md-6">                                <div class="form-group">                                    <label>Last Name <span class="text-danger">*</span>                                    </label>                                    <input type="text" value="{{ $staff->last_name }}" class="form-control" name="last_name">                                </div>                            </div>                            <div class="col-md-6">                                <div class="form-group">                                    <label>Email <span class="text-danger">*</span>                                    </label>                                    <input type="text" value="{{ $staff->email }}" class="form-control" name="email">                                </div>                            </div>                            <div class="col-md-6">                                <div class="form-group">                                    <label>Phone <span class="text-danger">*</span>                                    </label>                                    <input type="number" value="{{ $staff->mobile }}" class="form-control" name="mobile">                                </div>                            </div>                            <div class="col-md-6">                                <div class="form-group">                                    <label>Password <span class="text-danger"></span>                                    </label>                                    <input type="text" value="{{ $staff->pass }}" class="form-control" name="password">                                </div>                            </div>                            <div class="col-md-6">                                <div class="form-group">                                    <label>User Type <span class="text-danger">*</span></label>                                    <select class=" form-control" name="user_type_id">                                        <option value="">Select User Type</option>                                        @foreach ($user_type_list as $key=> $value)                                        <option @if($staff->user_type_id == $value->id) selected @endif value="{{ $value->id }}">{{ $value->name }}</option>                                        @endforeach                                    </select>                                </div>                            </div>                            <div class="col-md-6">                                <div class="form-group">                                    <label>Role <span class="text-danger">*</span></label>                                    <select class=" form-control" name="user_designation_id">                                        <option value="">Select Role</option>                                        @foreach ($master_designation as $key=> $value)                                        <option @if($staff->user_designation_id == $value->id) selected @endif value="{{ $value->id }}">{{ $value->name }}</option>                                        @endforeach                                    </select>                                </div>                            </div>                            <div class="col-md-6">                                <div class="form-group">                                    <label>Status <span class="text-danger">*</span>                                    </label>                                     <select class=" form-control" name="status" required>										<option value="1" @if($staff->status == 1) selected @endif>Active</option>										<option value="2" @if($staff->status == 2) selected @endif>Inactive</option>									</select>                                </div>                            </div>							<div class="col-md-12">                                 <button type="submit" class="btn btn-primary edit_staff">Update</button>                            </div>


                                 

                            </div>
                           
                        </form>

                </div>
                 
            </div>
        </div>
    </div>
</div>
   <script type="text/javascript">	   $(document).on('click', '.edit_staff', function(e) {        e.preventDefault();        var formData = new FormData(document.getElementById("update-staff"));        $.ajaxSetup({            headers: {                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')            }        });		$.ajax({            type: "POST",			url: "{{ route('admin.updateStaffdetails') }}",			data: formData,			processData: false,			contentType: false,			dataType: "JSON",			success: function(data) {                // console.log('status ' + data.status);                if (data.status == true) {                    toastr.success('Updateed Successfully.');                    setTimeout(function() {                        window.location = "{{ url('admin/staffs') }}"                    }, 2000);                } else {                    toastr.error('Something went wrong.');                }            },            error: function(err) {                document.getElementById('show-form-error').style = "display: block";                let error = err.responseJSON;                $.each(error.errors, function(index, value) {                    $('.errorMsgntainer').append('<span class="text-danger">' + value + '<span>' + '<br>');                });            }        });    });	</script>
 

@endsection
