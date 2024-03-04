@extends('admin.include.master')

@section('title', 'Certified Engineer')

@section('content')


<div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header mb-0 pt-3">
        <div class="row align-items-center">
          <div class="col">
            <div class="breadcrumb ">
              <a href="{{ route('admin.engineer-list.index') }}">
                <i class="fa fa-home" aria-hidden="true"></i> Dashboard </a> / Engineer List
            </div>
          </div>
            <div class="col">
				<a href="{{ route('admin.certifiedEngineer') }}" class="btn btn-info float-right veiwbutton ">Certified Engineer List</a>
			</div>
        </div>
      </div>
      <hr>
      <div class="main-panel card-header ">
         
        <div class="tab-pane fade active show" id="indian_cuisine">
                            <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item">
                                <a class="nav-link active border rounded-top" data-toggle="tab"
                                    href="#indian_cuisine">Add Certified Engineers
                                </a> 
                            </li>
                        </ul>
                    </div>
                            <form class="form-sample" id="add-certified-engineer" action="" method="post" enctype="multipart/form-data">
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
                                            <label class="col-sm-12  col-form-label">Title</label>
                                            <div class="col-sm-12">
                                                <input type="text" placeholder="Enter Title" class="form-control" name="title" value="">
                                                <div class="error-msg" role="alert"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-12  col-form-label">Description</label>
                                            <div class="col-sm-12">
                                                <input type="text"  placeholder="Enter Description" class="form-control" name="description" id="cr_description" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-12  col-form-label">Logo</label>
                                            <div class="col-sm-12">
                                                <input type="file" onchange="loadFile(event)" class="form-control" name="logo" id="cr_image_path">
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
                                        <div class="form-group row">
                                            <label class="col-sm-12  col-form-label">Status</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="cr_status">
                                                    <option value="1" selected>Active</option>
                                                    <option value="2">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
									
									
                                </div>
                                    
                                </div>
                                <button type="button" class="btn btn-primary btn-icon-text add_certified_engineer">
                                    <i class="ti-file btn-icon-prepend"></i>
                                    Submit
                                </button>
                            </form>
                        </div>
		
      </div>
    </div>
  </div>

 


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

 
<script type="text/javascript">
    $(document).on('click', '.add_certified_engineer', function(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("add-certified-engineer"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
			url: "{{ route('admin.saveCerifiedEngineer') }}",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data) {
                // console.log('status ' + data.status);
                if (data.status == true) {
                    toastr.success('Updated Successfully.');
                    setTimeout(function() {
                        window.location = "{{ url('admin/engineer/certified-engineer') }}"
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
