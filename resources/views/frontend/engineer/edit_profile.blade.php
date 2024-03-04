@extends('frontend.layouts.master')
@section('title') Engineer Profile  @endsection
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

                  <div class="fomr-news">
                     <h6 class="user-title">Profile Picture</h6>
						<div class="pro-picture">
                       
						@if($engineer_profile_details->profile_pic!=null)
							<div class="pro-img">
								<img src="{{ static_asset('uploads/customer/'.$engineer_profile_details->profile_pic)}}" alt="user">
							</div>
						@else
							<div class="pro-img">
								<img src="{{ static_asset('assets/assets_web/img/profiles/avatar-02.jpg')}}" alt="user">
							</div>
						@endif
			
			
                        <div class="pro-info">
                            <div class="d-flex align-items-center justify-content-start">
								<form method="POST" id="update-engineer-profile-picture" action="#" enctype="multipart/form-data">
									@csrf
									<input type="file" name="profile" id="updateImage">
									<input type="hidden" name="user_id" value="{{ session('LoggedEngineer')->user_id }}">
									<button type="submit" class="btn btn-primary mt-3 update-profile-pic">Update Image</button>
								</form>
                            </div>
                           <p class="mt-2">*image size should be at least 320px big,and less then 500kb. Allowed files .png and .jpg.</p>
                        </div>
                     </div>
                  </div>
                  <div class="step_tab d-flex pb-4">
                     <article>
                        <i class="fa fa-user-o px-3 personal active" aria-hidden="true"></i>
                        <p>Personal</p>
                     </article><span></span>
                     <article>
                        <i class="fa fa-graduation-cap py-3 fs-5 edu" aria-hidden="true"></i>
                        <p>Education</p>
                     </article><span></span>
                     <article>
                        <i class="fa fa-briefcase skills" aria-hidden="true"></i>
                        <p>Experience/ Skills</p>
                     </article>
                  </div>

                  <div class="white_block fs-14 ">
                     <form id="update-engineer-profile-details" enctype="multipart/form-data" class="ng-untouched forms-new">
						@csrf
                        <div class="personalbox">
                           <div class="widget-title">
                              <h4>General Information</h4>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <label for="first_name">First Name</label>
                                 <input name="first_name" id="first_name" value="{{ $profile->first_name }}" type="text"  placeholder="Please enter your first name" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-md-6">
                                 <label for="last_name">Last Name</label>
                                 <input name="last_name" id="last_name" value="{{ $profile->last_name }}" type="text" placeholder="Please enter your last name" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-md-6">
                                 <label for="eng_phone_number">Mobile</label>
                                 <input name="eng_phone_number" id="eng_phone_number" readonly value="{{ $profile->mobile }}" type="number" placeholder="Please enter your phone number" class="form-control">
                              </div>
                              <div class="col-md-6">
                                 <label for="eng_email">Email</label>
                                 <input name="eng_email" id="eng_email" value="{{ $profile->email }}" type="email" placeholder="Please enter your email." class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
							  
							  <div class="col-md-6">
                                 <label for="eng_email">Username</label>
                                 <input id="eng_email" value="{{ $profile->username }}" readonly type="email" placeholder="Please enter your email." class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
							  
							  
                              <div class="col-md-6">
                                 <label for="dob">Date of Birth</label>
                                 <input name="dob" id="dob" value="{{ $profile->dob }}" type="date" placeholder="Please enter your DOB" class="form-control ng-untouched ng-pristine ng-valid"> 
                              </div>

                              <div class="col-md-6">
                                 <label for="eng_aadhar_number">Aadhar Number</label>
                                 <input name="eng_aadhar_number" value="{{ $profile->aadhar }}" id="eng_aadhar_number" type="number" placeholder="Please enter your Aadhar number" class="form-control">
                              </div>
                                <div class="col-md-6">
                                 <label for="eng_phone_number">Gender</label>
                                 <select name="gender" class="select form-control ">
                                    <option value="">Select Gender</option>
                                    <option @if($profile->gender=='Male') selected @endif value="Male">Male</option>
                                    <option @if($profile->gender=='Female') selected @endif value="Female">Female</option>
                                 </select>
							    </div>
								
								<div class="col-md-6">
									<label for="eng_city_id">Country:</label>
									<select name="country" id="country_id" class="form-control">
										<option value="">Select Country</option>
										@foreach(getCountryList() as $item)
											<option  @if($profile->country==$item->id) selected @endif value="{{ $item->id }}"> {{ $item->name }} </option>
										@endforeach
									</select>
								</div>
								
								
								<div class="col-md-6">
									<label for="eng_city_id">State:</label>
									<select name="state" id="state_id" class="form-control">
										<option value="">Select State</option>
										@foreach(getStateList() as $item)
											<option @if($profile->state==$item->id) selected @endif value="{{ $item->id }}"> {{ $item->name }} </option>
										@endforeach
									</select>
								</div>
								
								@php
									$city_list = \App\Models\City::where('state_id', $profile->state)->get();
								@endphp
								 
								  <div class="col-md-6">
									<label for="eng_state_id">City:</label>
                                 <select name="city" id="city-dropdown" class="form-control">
                                    <option value="">Select City</option>
										@foreach($city_list as $item)
											<option @if($profile->city==$item->id) selected @endif value="{{ $item->id }}"> {{ $item->name }} </option>
										@endforeach
                                 </select>
								 </div>
							  
							 
									
									
							  
							 
							  
                              <div class="col-md-6">
                                 <label for="eng_address">Address:</label>
                                 <textarea rows="5" placeholder="Please enter your Address" name="address" class="form-control" id="eng_address">{{ $profile->address }}</textarea>
                              </div>

                              

                              <div class="col-md-6">
                                 <label for="eng_zipno">Zipcode:</label>
                                 <input name="pincode" value="{{ $profile->pincode }}" id="eng_zipno" type="text" placeholder="Please enter zipcode" class="form-control">
                              </div>

                              <!-- <div class="col-md-6">
                                 <label for="eng_gst_number">Your Bio <span class="brief-bio float-end">Brief description
                                       for your profile.</span></label>
                                 <textarea class="form-control" rows="5" placeholder="Add a Short Bio....."></textarea>
                              </div> -->

                              <div class="col-md-6">
                                 <label for="add_proof">Address Proof</label>
                                 <select class="select form-control" name="address_proof" id="add_proof">
                                    <option @if($profile->address_proof=='aadhar') selected @endif value="aadhar">Aadhar Card</option>
                                    <option @if($profile->address_proof=='voter') selected @endif value="voter">Voter ID</option>
                                    <option @if($profile->address_proof=='pan_card') selected @endif value="pan_card">Pan Card</option>
                                    <option @if($profile->address_proof=='dl') selected @endif value="dl">Driving License</option>
                                    <option @if($profile->address_proof=='passport') selected @endif value="passport">Passport</option>
                                 </select>
                              </div>

                              <div class="col-md-6">
                                 <label for="upload_add_proof">Upload Address Proof</label>
                                 <input type="file" name="address_document" id="upload_add_proof" class="form-control">
                                 <a href="javascript:void()" class="text-info fs-6 fw-bold">Download file</a>
                              </div>
                              
                           </div>

                           <div class="col-sm-12 my-2 pb-5 mb-5">
                              <button type="button" class="btn btn-danger text-white d-block mx-auto"
                                 style="width:100px" id="personal">Next</button>
                           </div>
                        </div>

                        <div class="edubox" style="display:none;">
                           <div class="widget-title ps-2">
                              <h4>Education Information</h4>
                           </div>
                           <div class="row m-2 p-3 border border-1 border-info rounded-3">
                              <div class="col-sm-12">
                                 <label for="eng_graduation">Graduation</label>
                                 <input name="eng_graduation" value="{{ $profile->eng_graduation }}" id="eng_graduation" type="text" placeholder="Please enter Honor's subject name" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-sm-12">
                                 <label for="eng_study">Field of Study</label>
                                 <input name="graduation_field_of_study" value="{{ $profile->eng_graduation }}" id="eng_study" type="text" placeholder="Please enter Study Field name" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-md-6">
                                 <label for="eng_start_date">Start Date</label>
                                 <input name="graduation_start_date" value="{{ $profile->graduation_start_date }}" id="eng_start_date" type="date" placeholder="Please Enter Your Start Date" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-md-6">
                                 <label for="eng_end_date">End Date</label>
                                 <input name="engraduation_end_date" value="{{ $profile->engraduation_end_date }}" id="eng_end_date" type="date" placeholder="Please Enter Your End Date"                                     class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-sm-12">
                                 <label for="upload_support_doc">Upload Supporting Document</label>
                                 <input type="file" name="graduation_support_doc" id="upload_support_doc" class="form-control">
                              </div>
                           </div>

                           <div class="row m-2 p-3 border border-1 border-info rounded-3">
                              <div class="col-sm-12">
                                 <label for="eng_pgraduation">Post Graduation</label>
                                 <input name="pos_pgraduation" value="{{ $profile->pos_pgraduation }}" id="eng_pgraduation" type="text" placeholder="Please enter Honor's subject name" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-sm-12">
                                 <label for="eng_pstudy">Field of Study</label>
                                 <input name="pos_field_of_study" value="{{ $profile->pos_field_of_study }}" id="eng_pstudy" type="text" placeholder="Please enter Study Field name" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-md-6">
                                 <label for="eng_start_date">Start Date</label>
                                 <input name="pos_start_date" value="{{ $profile->pos_start_date }}" id="eng_start_date" type="date" placeholder="Please Enter Your Start Date" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-md-6">
                                 <label for="eng_end_date">End Date</label>
                                 <input name="pos_end_date" value="{{ $profile->pos_end_date }}" id="eng_end_date" type="date" placeholder="Please Enter Your End Date" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-sm-12">
                                 <label for="upload_support_doc">Upload Supporting Document</label>
                                 <input type="file" name="pos_support_doc" id="upload_support_doc" class="form-control"> 
                              </div>
                           </div>
                           <div class="col-sm-12 my-3 d-flex justify-content-center">
                              <button type="button" class="btn btn-dark bg-dark text-white px-3 py-2 mx-2"
                                 id="perBack">Back</button>
                              <button type="button" class="btn btn-danger text-white d-block" style="width:100px"
                                 id="eduNext">Next</button>
                           </div>
                        </div>

                        <div class="skillbox" style="display:none;">
                           <div class="widget-title ps-2">
                              <h4>Experience/ Skills</h4>
                           </div>
                           <div class="row m-2 p-3 border border-1 border-info rounded-3">
                              <h4 class="text-info">Primary Skills</h4>
                              <div class="col-md-5">
                                 <label for="subcategory_id">Skills</label>
                                 <select name="primary_skills1" class="select form-control" id="primary_skills1">
                                    <option>Select Skills</option>
                                    @if(count($service_subcategory_list)>0)
										@foreach ($service_subcategory_list as $key => $item)
											<option @if($profile->primary_skills1==$item->id) selected @endif value="{{ $item->id }}"> {{ $item->name }}</option>
										@endforeach
									@endif
                                 </select>
                              </div>
                              <div class="col-md-5">
                                 <label for="eng_sub_skill">Sub Skills</label>
                                 <select name="primary_subskills1" class="select form-control" id="primary_subskills1">
                                   @if(count(getServiceList())>0)
										@foreach (getServiceList() as $key => $item)
											<option @if($profile->primary_subskills1==$item->id) selected @endif value="{{ $item->id }}"> {{ $item->name }}</option>
										@endforeach
									@endif
                                     
                                 </select>
                              </div>
                              <div class="col-md-2">
                                 <label for="eng_exp">Yrs of Exps</label>
                                 <input value="{{ $profile->primary_skill_exp1 }}" name="primary_skill_exp1" id="eng_exp" type="text" placeholder="Exp"
                                    class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-sm-12">
                                 <label for="upload_certification">Upload Certification</label>
                                 <input type="file" name="primary_skill_certificate1" id="upload_certification" class="form-control">
                              </div>
                           </div>
                           <div class="row m-2 p-3 border border-1 border-info rounded-3">
                              <div class="col-md-5">
                                 <label for="eng_skill">Skills</label>
                                 <select name="primary_skills2" class="select form-control" id="primary_skills2">
                                    <option>Select Skills</option>
                                    @if(count($service_subcategory_list)>0)
										@foreach ($service_subcategory_list as $key => $item)
											<option @if($profile->primary_skills2==$item->id) selected @endif value="{{ $item->id }}"> {{ $item->name }}</option>
										@endforeach
									@endif
                                 </select>
                              </div>
                              <div class="col-md-5">
                                 <label for="eng_sub_skill">Sub Skills</label>
                                 <select name="primary_subskills2" class="select form-control" id="primary_subskills2">
                                    <option>Select Sub Skills</option>
                                     @if(count(getServiceList())>0)
										@foreach (getServiceList() as $key => $item)
											<option @if($profile->primary_subskills2==$item->id) selected @endif value="{{ $item->id }}"> {{ $item->name }}</option>
										@endforeach
									@endif
                                 </select>
                              </div>
                              <div class="col-md-2">
                                 <label for="eng_exp">Yrs of Exps</label>
                                 <input name="primary_skill_exp2" value="{{ $profile->primary_skill_exp2 }}" id="eng_exp" type="text" placeholder="Exp" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-sm-12">
                                 <label for="upload_certification">Upload Certification</label>
                                 <input type="file" name="primary_skill_certificate2" id="upload_certification" class="form-control">
                              </div>
                           </div>

                           <div class="row m-2 p-3 border border-1 border-info rounded-3">
                              <h4 class="text-info">Secondary Skills</h4>
                              <div class="col-md-6">
                                 <label for="eng_sec_skill">Please Enter Secondary Skills</label>
                                 <input name="secondary_skill" value="{{ $profile->secondary_skill }}" id="eng_sec_skill" type="text" placeholder="Please Enter Secondary Skills" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-md-6">
                                 <label for="eng_exp">Years of Experience</label>
                                 <input name="secondary_skill_exp" value="{{ $profile->secondary_skill_exp }}" id="eng_exp" type="text" placeholder="Please Enter Experience" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-sm-12">
                                 <label for="upload_certification">Upload Certification</label>
                                 <input type="file" name="secondary_skill_certificate" id="upload_certification" class="form-control">
                              </div>
                           </div>

                           <div class="row m-2 p-3 border border-1 border-info rounded-3">
                              <h4 class="text-info">Organization</h4>
                              <div class="col-sm-12">
                                 <label for="eng_org_exp">Organization Experience</label>
                                 <input name="organization_exp" value="{{ $profile->organization_exp }}" id="eng_org_exp" type="text" placeholder="Please Enter Your Organization Experience" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-sm-12">
                                 <label for="eng_prev_org_name">Organization Name</label>
                                 <input name="organization_name" value="{{ $profile->organization_name }}" id="eng_prev_org_name" type="text" placeholder="Please Enter Your Previous Organization Name" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-sm-12">
                                 <label for="eng_prev_org_desgn">Designation</label>
                                 <input name="organization_designation" value="{{ $profile->organization_designation }}" id="eng_prev_org_desgn" type="text"  placeholder="Please Enter Your Previous Organization Designation" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-md-6">
                                 <label for="eng_wstart_date">Start Date</label>
                                 <input name="organization_start_date" value="{{ $profile->organization_start_date }}" id="eng_wstart_date" type="date" placeholder="Please Enter Secondary Skills" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-md-6">
                                 <label for="eng_exp">End Date</label>
                                 <input name="organization_end_date" value="{{ $profile->organization_end_date }}"  id="eng_exp" type="date" placeholder="Please Enter Experience" class="form-control ng-untouched ng-pristine ng-valid">
                              </div>
                              <div class="col-sm-12">
                                 <label for="upload_certification">Upload Certification</label>
                                 <input type="file" name="organization_certificate" id="upload_certification" class="form-control">
                              </div>
                           </div>
                           <div class="col-sm-12 mt-2 ms-2">
                              <p>By submitting you agree to our <a href="#olicy" target="_blank">Privacy Policy</a> and
                                 <a href="#terms-and-conditions" target="_blank">T&amp;C</a>.</p>
                           </div>

                           <div class="col-sm-12 my-3 d-flex justify-content-center">
                              <button type="button" class="btn btn-dark bg-dark text-white px-3 py-2 mx-2 eduback" id="eduback">Back</button>
                              <button type="submit" class="update_engineer_profile_details btn btn-danger text-white d-block" style="width:100px">Submit</button>
                           </div>
                        </div>
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


$(document).on('click','.update_engineer_profile_details',function(e) {
	e.preventDefault();
	var formData = new FormData(document.getElementById("update-engineer-profile-details"));
	console.log(formData);
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  $.ajax({
    type: "POST",
    url: "{{ route('engineer.update_enginner_profile_details') }}",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "JSON",
    success: function(data) {
			console.log('status '+data.status);
			if(data.status==true){
				toastr.success('Updated Successfully.');
				setTimeout(function(){
				window.location = "{{ url('engineer/engineer-dashboard') }}" },1000);
			}else{
				toastr.error('Login Failed.');
			}


    },error:function(err){

		document.getElementById('show-engineer-form-error').style="display: block";
		let error = err.responseJSON;
		console.log(error);
		$.each(error.errors, function (index, value) {
			$('.enginnererrorMsgntainer').append('<span class="text-danger">'+value+'<span>'+'<br>');
		});
	}

  });
});


$(document).on('click','.update-profile-pic',function(e) {
	e.preventDefault();
	var formData = new FormData(document.getElementById("update-engineer-profile-picture"));
	console.log(formData);
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  $.ajax({
    type: "POST",
    url: "{{ route('engineer.update_profile_picture') }}",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "JSON",
    success: function(data) {
			console.log('status '+data.status);
			if(data.status==true){
				toastr.success('Updated Successfully.');
				setTimeout(function(){
				window.location = "{{ url('engineer/engineer-dashboard') }}" },1000);
			}else{
				toastr.error('Login Failed.');
			}


    },error:function(err){

		document.getElementById('show-engineer-form-error').style="display: block";
		let error = err.responseJSON;
		console.log(error);
		$.each(error.errors, function (index, value) {
			$('.enginnererrorMsgntainer').append('<span class="text-danger">'+value+'<span>'+'<br>');
		});
	}

  });
});





</script>

	<script>
      function myFunction() {
         var x = document.getElementById("myInput");
         if (x.type === "password") {
            x.type = "text";
         } else {
            x.type = "password";
         }
      }


      $(document).ready(function () {
         $("#personal").click(function () {
            $(".edubox").show();
            $(".personalbox").hide();

            $(".edu").addClass("active");
            $(".personal").removeClass("active");
            $(".skills").removeClass("active");
         })

         $("#eduNext").click(function () {
            $(".edubox").hide();
            $(".skillbox").show();

            $(".edu").removeClass("active");
            $(".personal").removeClass("active");
            $(".skills").addClass("active");
         })

         $("#perBack").click(function () {
            $(".personalbox").show();
            $(".edubox").hide();

            $(".edu").removeClass("active");
            $(".personal").addClass("active");
            $(".skills").removeClass("active");
         })

         $(".eduback").click(function () {
            $(".skillbox").hide();
            $(".edubox").show();

            $(".edu").addClass("active");
            $(".personal").removeClass("active");
            $(".skills").removeClass("active");
         })
      })
	  
	  	$('#primary_skills1').on('change', function() {
            var primary_skills1 = this.value;
           $("#primary_subskills1").html('');
            $.ajax({
                url: "{{ route('engineer.getServiceList') }}",
                type: "POST",
                data: {
                    subcategory_id: primary_skills1,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#primary_subskills1').html('<option value="">Select Sub Skill</option>');
                    $.each(result.serviceList, function(key, value) {
                        $("#primary_subskills1").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    // $('#city-dropdown').html('<option value="">Select Subcategory</option>');
                }
            });
        });
		
		$('#primary_skills2').on('change', function() {
            var primary_skills2 = this.value;
           $("#primary_subskills2").html('');
            $.ajax({
                url: "{{ route('engineer.getServiceList') }}",
                type: "POST",
                data: {
                    subcategory_id: primary_skills2,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#primary_subskills2').html('<option value="">Select Sub Skill</option>');
                    $.each(result.serviceList, function(key, value) {
                        $("#primary_subskills2").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    //$('#city-dropdown').html('<option value="">Select Subcategory</option>');
                }
            });
        });
		
		
   </script> 
@endsection
