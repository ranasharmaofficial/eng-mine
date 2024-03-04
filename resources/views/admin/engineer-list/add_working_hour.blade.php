@extends('admin.include.master')

@section('title', 'Add Working Hour')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mb-0 pt-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="breadcrumb">
                        <a href="index.php">
                            <i class="fa fa-home" aria-hidden="true"></i> Dashboard </a> / Engineer List
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
                        <a class="nav-link active border rounded-top" data-toggle="tab" href="#indian_cuisine">Add
                            Working Hour</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content profile-tab-cont mt-1">
                <div class="tab-pane fade active show" id="indian_cuisine">
                    <h6
                        class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                        Add Working Hour </h6>
                    <form class="form-sample" enctype="multipart/form-data" id="add-working-hour" action=""
                        method="post">
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
                                        <input type="text" class="form-control" readonly
                                            value="{{ $engineer_details->first_name }}">
                                        <input type="hidden" class="form-control" name="engineer_id"
                                            value="{{ $engineer_details->id }}">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Last Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" readonly
                                            value="{{ $engineer_details->last_name }}">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" readonly
                                            value="{{ $engineer_details->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Mobile No.</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" readonly
                                            value="{{ $engineer_details->mobile }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-2">
                                <label>Work Type:</label>
                                <select name="working_type" id="working_type" class="form-control">
                                    <option value="">Select Work Type</option>
                                    <option value="full_time">Full Time</option>
                                    <option value="part_time">Part Time</option>
                                </select>
                            </div>
                        </div>
                        <div style="display:none" class="row mb-3" id="wprking-hours">
                            <div class="col-sm-12 pt-3 pb-0 mb-0">
                                <label class="font-weight-bold">Start Working Hours:</label>
                            </div>

                            <div class="col-md-6">
                                <label for="start_work_date">Start Date</label>
                                <input name="start_date" id="start_date" type="date"
                                    placeholder="Please Enter Your Work Start Date"
                                    class="form-control ng-untouched ng-pristine ng-valid">
                            </div>
                            <div class="col-md-6">
                                <label for="start_time">Start Time</label>
                                <input name="start_time" id="start_time" type="time"
                                    placeholder="Please Enter Your Work Start Time"
                                    class="form-control ng-untouched ng-pristine ng-valid">
                            </div>

                            <div class="col-sm-12 pt-3 pb-0 mb-0">
                                <label class="font-weight-bold">End Working Hours:</label>
                            </div>

                            <div class="col-md-6">
                                <label for="work_end_date">End Date</label>
                                <input name="end_date" id="end_date" type="date"
                                    placeholder="Please Enter Your End Date"
                                    class="form-control ng-untouched ng-pristine ng-valid">
                            </div>
                            <div class="col-md-6">
                                <label for="work_end_time">End Time</label>
                                <input name="end_time" id="end_time" type="time"
                                    placeholder="Please Enter Your Work End Time"
                                    class="form-control ng-untouched ng-pristine ng-valid">
                            </div>
                        </div>

                </div>
                <button type="button" class="btn btn-primary btn-icon-text add_working_hour mt-3"> <i
                        class="ti-file btn-icon-prepend"></i> Submit </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
    $(document).on('click', '.add_working_hour', function(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("add-working-hour"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		$.ajax({
            type: "POST",
			url: "{{ route('admin.addEngineerWorkingHour') }}",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data) {
                // console.log('status ' + data.status);
                if (data.status == true) {
                    toastr.success('Added Successfully.');
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

	$(function() {
		$('#working_type').change(function(){
			if($('#working_type').val() == 'full_time') {
				$('#wprking-hours').hide();
			} else {
				$('#wprking-hours').show();
			}
		});

		$('#working_type').change(function(){
			if($('#working_type').val() == 'part_time') {
				$('#wprking-hours').show();
			} else {
				$('#wprking-hours').hide();
			}
		});


	});
</script>
@endsection
