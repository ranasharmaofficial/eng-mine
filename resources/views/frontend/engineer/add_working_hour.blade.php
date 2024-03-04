@extends('frontend.layouts.master')
@section('title') Add Working Hour  @endsection
@section('content')

<style>
      .step_tab article {
         width: 18%;
         text-align: center;
         cursor: pointer;
      }

      .step_tab article i {
         background-color: #6c757d;
         padding: 14px;
         border-radius: 180px;
         color: #fff;
         font-size: 25px;
         margin: 0 auto 5px;
      }

      .step_tab article i.active {
         background: #0082F8;
      }

      .step_tab article p {
         margin: 0;
         font-weight: 600;
         font-size: 14px;
         text-align: center;
         line-height: 1.5;
         color: #212529;
      }

      .step_tab span {
         width: 21%;
         background-color: #ebebeb;
         border-radius: 100px;
         height: 15px;
         margin: 22px 1% 0;
      }

      .btn1:hover .abc {
         display: blcok;
      }
   </style>
   
   
@include('frontend.engineer.partials.engineer_dash_header')

@php
			$engineer_profile_details = \App\Models\User::findOrFail(Session('LoggedEngineer')->user_id);
        @endphp
		
	<div class="main-wrapper">
		<!-- /Header -->
		
		<div class="bg-img">
			<img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg1">
			<img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg2">
			<img src="{{ static_asset('assets/assets_web/img/bg/feature-bg-03.png')}}" alt="img" class="bgimg3">
		</div>
		<div class="content">
			<div class="container">
				<div class="row">

					<!-- Customer Menu -->
					<div class="col-md-4 col-lg-3 theiaStickySidebar">
						 
						 @include('frontend.engineer.partials.engineer-left-sidebar')
					</div>
					<!-- /Customer Menu -->

					<!-- /Customer Menu -->
               <div class="col-md-8 col-lg-9">
					@if(count($working_hour)>0)
					<div class="widget-title d-flex align-items-center justify-content-between">
						<h4>Work Time List</h4>
                    </div>
					<hr>
					<div class="white_block mt-3">
                     <div class="table-responsive">
                        <table class="table mb-0 custom-table border">
                           <thead class="thead-light">
                              <tr>
                                 <th>Work Type </th>
                                 <th>Start Date </th>
                                 <th>Start Time</th>
                                 <th>End Date </th>
                                 <th>End time </th>
                                 {{--<th>Work time </th>
                                 <th>Action</th>--}}
                              </tr>
                           </thead>
                           <tbody>
								@foreach($working_hour as $item)
                                <tr>
									 <td>
										@if($item->working_type=='part_time')
											Part Time
										@else
											Full Time
										@endif
									 </td>
									 <td class="text-light-success">{{ $item->start_date }} </td>
									 <td class="text-light-success">{{ $item->start_time }}</td>
									 <td class="text-light-success">{{ $item->end_date }}</td>
									 <td class="text-light-success">{{ $item->end_time }}</td>
										 {{--<td class="text-light-success">02:45:00</td>- 
									 <td>
										<a href="eng-work-edit.php" class="btn btn-primary2 rounded-pill">Edit</a>
										 </td>--}}
                                </tr>
							  @endforeach
                           </tbody>
                        </table>
                     </div>
					</div>
				  @endif
				  
					<div class="widget-title d-flex align-items-center justify-content-between mt-3">
                     <h4>Working Hour</h4>
                     
                    </div>
                  <hr>
                  
					<form class="form-sample" enctype="multipart/form-data" id="add-working-hour" action="" method="post">
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
                                            value="{{ $profile->first_name }}">
                                        <input type="hidden" class="form-control" name="engineer_id" value="{{ Session('LoggedEngineer')->user_id }}">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
							 
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Last Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" readonly
                                            value="{{ $profile->last_name }}">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" readonly
                                            value="{{ $profile->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Mobile No.</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" readonly
                                            value="{{ $profile->mobile }}">
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
                                <label class="font-weight-bold text-primary"><b>Start Working Hours:</b></label>
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
                                <label class="font-weight-bold text-primary"><b>End Working Hours:</b></label>
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

                
						<button type="button" class="btn btn-primary btn-icon-text add_working_hour mt-3"> <i class="ti-file btn-icon-prepend"></i> Submit </button>
					</form>
                </div>   
                   
               </div>

				</div>

			</div>
		</div>
		<?php 
            //include 'include/footer.php';
        ?>
		<!-- /Cursor -->
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
			url: "{{ route('engineer.addEngineerWorkingHour') }}",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data) {
                // console.log('status ' + data.status);
                if (data.status == true) {
                    toastr.success('Added Successfully.');
                    setTimeout(function() {
                        window.location = "{{ url('engineer/add-working-hour') }}"
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
