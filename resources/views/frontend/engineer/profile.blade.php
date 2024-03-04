@extends('frontend.layouts.master')
@section('title') Engineer Profile  @endsection
@section('content')

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
                  <div class="widget-title d-flex align-items-center justify-content-between">
                     <h4>Engineer Profile</h4>
                     <a href="{{ url('engineer/edit-profile') }}" class="fs-14 py-1 bg-primary2 rounded-pill px-4 text-white bt-hover  ">Edit</a>
                  </div>
                  <hr>
                  <div class="fomr-news">
                     <h6 class="user-title">Profile Picture</h6>
                     <div class="pro-picture">
                        <div class="pro-img">
						@if($engineer_profile_details->profile_pic!=null)
                           <img src="{{ static_asset('uploads/customer/'.$engineer_profile_details->profile_pic)}}" alt="user">
						@else
							<img src="{{ static_asset('assets/assets_web/img/profiles/avatar-02.jpg')}}" alt="user">
						@endif
                        </div>
                        <div class="pro-info">
                           <div class="d-flex align-items-center justify-content-start">
                              <h6 class="mb-0">{{ Session('LoggedEngineer')->first_name.' '.Session('LoggedEngineer')->last_name }}</h6>
                           </div>
                           <p class="mt-0">Member Since {{ date('M'), strtotime($engineer_profile_details->created_at) }},&nbsp;{{ date('Y'), strtotime($engineer_profile_details->created_at) }}</p>
                        </div>
                     </div>
                  </div>
                  <div class="white_block mt-3">
                     <table class="table mb-0 border mb-3 custom-table rounded">
                        <thead class="thead-light ">
                           <tr>
                              <th class="w-50 ps-3 text-primary">General Information</th>
                              <th>&nbsp;</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="fw-bold ps-3">Engineer Id </td>
                              <td> {{ $profile->username }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Engineer Name </td>
                              <td>{{ $profile->first_name.' '.$profile->last_name }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Mobile Number </td>
                              <td>+91-{{ $profile->mobile }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Email/User Name</td>
                              <td>{{ $profile->email }}</td>
                           </tr>

                           <tr>
                              <td class="fw-bold ps-3">DOB</td>
                              <td>{{ $profile->dob }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Adhar Number</td>
                              <td>{{ $profile->aadhar }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Gender</td>
                              <td>{{ $profile->gender }} </td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Address</td>
                              <td>{{ $profile->address }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">City</td>
                              <td>{{ $profile->city }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">State</td>
                              <td>{{ $profile->state }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Zip Code</td>
                              <td>{{ $profile->pincode }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Address Proof</td>
                              <td>{{ $profile->address_proof }} <a href="{{ static_asset('uploads/customer/'.$profile->address_documents) }}" class="text-info fw-bold" download>Download</a></td>
                           </tr>
                        </tbody>
                     </table>
                     <table class="table mb-0 border mb-3 custom-table rounded">
                        <thead class="thead-light ">
                           <tr>
                              <th class="w-50 ps-3 text-primary">Education Information</th>
                              <th>&nbsp;</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="fw-bold ps-3">Graduation</td>
                              <td>{{ $profile->eng_graduation }} </td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Field of Study</td>
                              <td>{{ $profile->graduation_field_of_study }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Start Date</td>
                              <td>{{ $profile->graduation_start_date }} </td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">End Date</td>
                              <td>{{ $profile->engraduation_end_date }} </td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Download Document</td>
                              <td><a href="{{ static_asset('uploads/customer/'.$profile->graduation_support_doc) }}" class="text-info fw-bold" download>Download</a></td>
                           </tr>
                        </tbody>
                     </table>
                     <table class="table mb-0 border mb-3 custom-table rounded">
                        <thead class="thead-light ">
                           <tr>
                              <th class="w-50 ps-3 text-primary">Post Graduation</th>
                              <th>&nbsp;</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="fw-bold ps-3">Post Graduation</td>
                              <td>{{ $profile->pos_pgraduation }} </td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Field of Study</td>
                              <td>{{ $profile->pos_field_of_study }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Start Date</td>
                              <td>{{ $profile->pos_start_date }} </td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">End Date</td>
                              <td>{{ $profile->pos_end_date }} </td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Download Document</td>
                              <td><a href="{{ static_asset('uploads/customer/'.$profile->pos_support_doc) }}" class="text-info fw-bold" download>Download</a></td>
                           </tr>
                        </tbody>
                     </table>

                     <table class="table mb-0 border mb-3 custom-table rounded">
                        <thead class="thead-light ">
                           <tr>
                              <th class="w-50 ps-3 text-primary">Primary Skills</th>
                              <th>&nbsp;</th>
                           </tr>
                        </thead>
                        <tbody>
						@php
						
							if($profile->primary_skills1!=null){
								$primarySkill = App\Models\ServiceSubCategory::where('id', $profile->primary_skills1)->pluck('name')->first();
							}else{
								$primarySkill = '';
							}
							
							if($profile->primary_skills2!=null){
								$primarySkill2 = App\Models\ServiceSubCategory::where('id', $profile->primary_skills2)->pluck('name')->first();
							}else{
								$primarySkill2 = '';
							}
							
							if($profile->primary_subskills1!=null){
								$primarySubSkill = App\Models\Service::where('id', $profile->primary_subskills1)->pluck('name')->first();
							}else{
								$primarySubSkill = '';
							}
							
							if($profile->primary_subskills2!=null){
								$primarySubSkill2 = App\Models\Service::where('id', $profile->primary_subskills2)->pluck('name')->first();
							}else{
								$primarySubSkill2 = '';
							}
							
							
						
						@endphp
                           <tr>
                              <td class="fw-bold ps-3">Skills</td>
                              <td>{{ $primarySkill }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Sub Skill</td>
                              <td>{{ $primarySubSkill }}</td>
                           </tr>
						   
						   <tr>
                              <td class="fw-bold ps-3">Skills</td>
                              <td>{{ $primarySkill2 }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Sub Skill</td>
                              <td>{{ $primarySubSkill2 }}</td>
                           </tr>
						   
                           <tr>
                              <td class="fw-bold ps-3">Years of Experience</td>
                              <td>{{ $profile->primary_skill_exp1 }} yrs</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Download Document</td>
                              <td><a href="{{ static_asset('uploads/customer/'.$profile->pos_support_doc) }}" class="text-info fw-bold" download>Download</a></td>
                           </tr>
                        </tbody>
                     </table>
                     <table class="table mb-0 border mb-3 custom-table rounded">
                        <thead class="thead-light ">
                           <tr>
                              <th class="w-50 ps-3 text-primary">Secondary Skills</th>
                              <th>&nbsp;</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="fw-bold ps-3">Skills</td>
                              <td>{{ $profile->secondary_skill }}</td>
                           </tr>
                           {{--
						   <tr>
                              <td class="fw-bold ps-3">Sub Skill</td>
                              <td>{{ $profile->organization_exp }}</td>
                           </tr>--}}
                           <tr>
                              <td class="fw-bold ps-3">Years of Experience</td>
                              <td>{{ $profile->organization_exp }} yrs</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Download Document</td>
                              <td><a href="{{ static_asset('uploads/customer/'.$profile->secondary_skill_certificate) }}" class="text-info fw-bold" download>Download</a></td>
                           </tr>
                        </tbody>
                     </table>

                     <table class="table mb-0 border mb-3 custom-table rounded">
                        <thead class="thead-light ">
                           <tr>
                              <th class="w-50 ps-3 text-primary">Organization</th>
                              <th>&nbsp;</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="fw-bold ps-3">Organization Experience</td>
                              <td>{{ $profile->organization_exp }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Organization Name</td>
                              <td>{{ $profile->organization_name }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Designation </td>
                              <td>{{ $profile->organization_designation }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Start Date</td>
                              <td>{{ $profile->organization_start_date }} </td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">End Date</td>
                              <td>{{ $profile->organization_end_date }}</td>
                           </tr>
                           <tr>
                              <td class="fw-bold ps-3">Download Document</td>
                              <td><a href="{{ static_asset('uploads/customer/'.$profile->organization_certificate) }}" class="text-info fw-bold" download>Download</a></td>
                           </tr>
                        </tbody>
                     </table>
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


@endsection
