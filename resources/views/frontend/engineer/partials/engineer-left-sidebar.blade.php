<div class="settings-widget">
		@php
			$engineer_profile_details = \App\Models\User::findOrFail(Session('LoggedEngineer')->user_id);
        @endphp
	<div class="settings-header">

            @if($engineer_profile_details->profile_pic!=null)
				<div class="settings-img">
					<img src="{{ static_asset('uploads/customer/'.$engineer_profile_details->profile_pic)}}" alt="user">
				</div>
			@else
				<div class="settings-img">
					<img src="{{ static_asset('assets/assets_web/img/profiles/avatar-02.jpg')}}" alt="user">
				</div>
			@endif

		<h6>{{ Session('LoggedEngineer')->first_name.' '.Session('LoggedEngineer')->last_name }}</h6>

		<p>Member Since {{ date('M'), strtotime($engineer_profile_details->created_at) }},&nbsp;{{ date('Y'), strtotime($engineer_profile_details->created_at) }}</p>

	</div>

	<div class="settings-menu">

		<ul>

			<li>
				<a href="{{ url('engineer/engineer-dashboard') }}" class="active">
					<i class="fa fa-th-large" aria-hidden="true"></i> <span>Dashboard</span>
				</a>
			</li>

			<li>
				<a href="{{ url('engineer/profile') }}">
					<i class="fa fa-th-large" aria-hidden="true"></i> <span> My Profile</span>
				</a>
			</li>

			<li>

				<a href="{{ url('engineer/change-password') }}">

					<i class="fa fa-th-large" aria-hidden="true"></i> <span> Change Password</span>

				</a>

			</li>

			<li>

				<a href="{{ url('engineer/add-working-hour') }}">

					<i class="fa fa-th-large" aria-hidden="true"></i> <span>Working Hour</span>

				</a>

			</li>

			<li>

				<div class="accordion bg-transparent border-none border-0" id="accordionExample">

					<div class="accordion-item bg-transparent border-none border-0">

						<h2 class="accordion-header bg-transparent" id="headingThree">

							<a href="javascript:void(0)" class="collapsed dropdown-toggle" type="button" data-bs-toggle="collapse"
	
								data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

								<i class="fa fa-th-large" aria-hidden="true"></i> <span> My Jobs</span>

							</a>

						</h2>

						<div id="collapseThree" class="accordion-collapse collapse bg-transparent"

							aria-labelledby="headingThree" data-bs-parent="#accordionExample">



							<ul class="ps-4 py-3">


								<li><a href="{{ url('engineer/all-jobs') }}"><i class="fa fa-th-large" aria-hidden="true"></i>

										<span> All Jobs</span>

									</a>

								</li>

								<li><a href="{{ url('engineer/upcoming-job') }}"><i class="fa fa-th-large" aria-hidden="true"></i>

										<span> Up-Coming Jobs</span>

									</a>

								</li>

								<li><a href="{{ url('engineer/ongoing-job') }}"><i class="fa fa-th-large" aria-hidden="true"></i>

										<span> On-going Jobs</span>

									</a>

								</li>

								<li><a href="{{ url('engineer/completed-job') }}"><i class="fa fa-th-large" aria-hidden="true"></i>

										<span> Completed Jobs</span>

									</a>

								</li>

								<li><a href="{{ url('engineer/cancelled-job') }}"><i class="fa fa-th-large" aria-hidden="true"></i>

										<span>Declined Jobs</span>

									</a>

								</li>

								<li><a href="{{ url('engineer/earned-revenue') }}"><i class="fa fa-th-large" aria-hidden="true"></i>

										<span> Earned Revenue</span>

									</a>

								</li>

							</ul>

						</div>

					</div>

				</div>

			</li>

			<li>

				<a href="{{ url('logout') }}">

					<i class="fa fa-th-large" aria-hidden="true"></i> <span>Logout</span>

				</a>

			</li>

		</ul>

	</div>

</div>
