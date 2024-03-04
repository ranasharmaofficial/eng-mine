@extends('admin.include.master') @section('title', 'Update Engineer Details') @section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mb-0 pt-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="breadcrumb">
                        <a href="index.php">
                            <i class="fa fa-home" aria-hidden="true"></i> Dashboard </a> / Service List
                    </div>
                </div>
                <div class="col">
                    <a href="{{ url('admin/engineer-list') }}" class="btn btn-info float-right veiwbutton">Back</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="bg-white shadow p-3 rounded position-relative">
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active border rounded-top" data-toggle="tab" href="#indian_cuisine">Edit Engineer's Profile</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content profile-tab-cont mt-1">
                <div class="tab-pane fade active show" id="indian_cuisine">
                    <h6 class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3"> Edit Engineer's Profile </h6>
                    <form class="form-sample" enctype="multipart/form-data" id="update-employee-details" action="" method="post">
                        @csrf

                        <p class="card-description"></p>
                        <div class="row">

                            <div class="col-md-12">
                                <div style="display:none;" id="show-form-error" class="alert alert-danger form-group">
                                    <ul>
                                        <div class="errorMsgntainer"></div>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">First Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="first_name" value="{{ $engineer_details->first_name }}">
                                        <input type="hidden" class="form-control" name="engineer_id" value="{{ $engineer_details->id }}">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Last Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="last_name" value="{{ $engineer_details->last_name }}">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="email" value="{{ $engineer_details->email }}">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Mobile No.</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="mobile" value="{{ $engineer_details->mobile }}">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
							@php
								$check_engineer_skill = \App\Models\EngineerSkill::where('user_id',  $engineer_details->id)->first();
							@endphp
							@if($check_engineer_skill)
								<div class="col-md-6">
									 <label for="subcategory_id">Skills dd</label>
									 <select name="primary_skills1" class="select form-control" id="primary_skills1">
										<option>Select Skills</option>
										@if(count($service_subcategory_list)>0)
											@foreach ($service_subcategory_list as $key => $item)
												<option @if($check_engineer_skill->primary_skills1==$item->id) selected @endif value="{{ $item->id }}"> {{ $item->name }}</option>
											@endforeach
										@endif
									 </select>
								</div>
							@else
								<div class="col-md-6">
									 <label for="subcategory_id">Skills</label>
									 <select name="primary_skills1" class="select form-control" id="primary_skills1">
										<option>Select Skills</option>
										@if(count($service_subcategory_list)>0)
											@foreach ($service_subcategory_list as $key => $item)
												<option  value="{{ $item->id }}"> {{ $item->name }}</option>
											@endforeach
										@endif
									 </select>
								</div>

							@endif
							
							@if($check_engineer_skill)
								<div class="col-md-6">
									<label for="eng_sub_skill">Sub Skills</label>
									<select name="primary_subskills1" class="select form-control" id="primary_subskills1">
									   @if(count(getServiceList())>0)
											@foreach (getServiceList() as $key => $item)
												<option @if($check_engineer_skill->primary_subskills1==$item->id) selected @endif value="{{ $item->id }}"> {{ $item->name }}</option>
											@endforeach
										@endif
										 
									</select>
								</div>
							@else
								<div class="col-md-6">
									<label for="eng_sub_skill">Sub Skills</label>
									<select name="primary_subskills1" class="select form-control" id="primary_subskills1">
									   @if(count(getServiceList())>0)
											@foreach (getServiceList() as $key => $item)
												<option value="{{ $item->id }}"> {{ $item->name }}</option>
											@endforeach
										@endif
										 
									</select>
								</div>

							@endif
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="emp_status">
                                            <option @if($engineer_details->status == 1) selected @endif value="1">Active</option>
                                            <option @if($engineer_details->status == 1) selected @endif value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary btn-icon-text update_employee_details"> <i class="ti-file btn-icon-prepend"></i> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).on('click', '.update_employee_details', function(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("update-employee-details"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
			url: "{{ route('admin.updateEmployeeDetails') }}",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data) {
                if(data.status == true) {
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
	
	
	$('#primary_skills1').on('change', function() {
		var primary_skills1 = this.value;
	   $("#primary_subskills1").html('');
		$.ajax({
			url: "{{ route('getServiceList') }}",
			type: "POST",
			data: {
				subcategory_id: primary_skills1,
				_token: '{{ csrf_token() }}'
			},
			dataType: 'json',
			success: function(result) {
				$('#primary_subskills1').html('<option value="">Select Sub Skill</option>');
				$.each(result.subcategories, function(key, value) {
					$("#primary_subskills1").append('<option value="' + value.id + '">' + value.name + '</option>');
				});
			}
		});
	});

</script>
@endsection
