@extends('admin.include.master')
@section('title', 'Add New Client')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mb-0 pt-3">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="breadcrumb "><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i>
                                Dashboard</a> / Client</div>
                    </div>
                    <div class="col">
                        <a href="{{ route('admin.client.index') }}" class="btn btn-info float-right veiwbutton ">Back</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body1">
                    <div class="bg-white shadow p-3 rounded position-relative">
                        <div class="profile-menu">
                            <ul class="nav nav-tabs nav-tabs-solid">
                                <li class="nav-item"> <a class="nav-link active border rounded-top" data-toggle="tab"
                                        href="#indian_cuisine">Add Client</a> </li>
                            </ul>
                        </div>
                        <div class="tab-content profile-tab-cont mt-1">
                            <div class="tab-pane fade active show" id="indian_cuisine">
                                <h6 class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                                    Add Client</h6>
                                     
							<form class="form-sample" id="add-client" enctype="multipart/form-data" action="" method="POST">
                                    @csrf
                                     
								<div class="row">
								
									<div class="col-md-12 mt-3">
										<div style="display:none;" id="show-form-error" class="alert alert-danger form-group">
											<ul>
												<div class="errorMsgntainer"></div>
											</ul>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Client Name</label>

											<div class="col-sm-9">
												<input type="text" class="form-control" name="client_name" placeholder="Client Name">
												<div class="error-msg" role="alert"></div>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<!-- <div class="form-group row">
											<label class="col-sm-3 col-form-label">Username</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="cus_username" value="coolnityapandey@gmail.com">
												<div class="error-msg" role="alert"></div>
											</div>
										</div> -->
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Description</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="description" placeholder="Client Description">
												<div class="error-msg" role="alert"></div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Logo</label>
											<div class="col-sm-9">
												<input type="file" onchange="loadFile(event)"  class="form-control" name="logo" value="">
												<img style="width:auto;height:100px;padding-top:5px;padding-bottom:2px;" class="img-fluid" id="picone"/>	  
												<script>
												  var loadFile = function(event) {
													var input = document.getElementById('picone');
													picone.src = URL.createObjectURL(event.target.files[0]);
												  };
												</script>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<!-- <div class="form-group row">
											<label class="col-sm-3 col-form-label">GST Number</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="cus_gst_number" value="XYZTYYYYY67YH">
												<div class="error-msg" role="alert"></div>
											</div>
										</div> -->
									</div>
									<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Status</label>
												<div class="col-sm-9">
												<select class="form-control" name="status" id="cus_city_id">
													<option value="1">Active</option>
													<option value="0">In-Active</option>
												</select>
													<div class="error-msg" role="alert"></div>
												</div>
											</div>
									</div>
									 <div class="col-md-6">
										 
									</div>
									<div class="col-md-6">
									<button type="button" class="btn btn-primary btn-icon-text add_client">
										<i class="ti-file btn-icon-prepend"></i>
										Save
									</button>
									</div>
                                </div>

                                    
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script type="text/javascript">
    $(document).on('click', '.add_client', function(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("add-client"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
			url: "{{ route('admin.saveClient') }}",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data) {
                if (data.status == true) {
                    toastr.success('Saved Successfully.');
                    setTimeout(function() {
                        window.location = "{{ route('admin.client.index') }}"
                    }, 1000);
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
