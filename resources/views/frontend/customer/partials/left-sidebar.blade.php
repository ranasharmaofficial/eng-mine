<div class="settings-widget">
	<div class="settings-header">
		<div class="settings-img">
            @php
                $profile_details = \App\Models\User::findOrFail(Session('LoggedCustomer')->user_id);
            @endphp
            @if($profile_details->profile_pic!=null)
			    <img src="{{ static_asset('uploads/customer/'.$profile_details->profile_pic)}}" alt="user">
            @else
                <img src="{{ static_asset('assets/assets_web/img/profiles/avatar-02.jpg')}}" alt="user">
            @endif
		</div>
		<h6>{{ Session('LoggedCustomer')->first_name.' '.Session('LoggedCustomer')->last_name }}</h6>
		<p>Member Since {{ date('M'), strtotime($profile_details->created_at) }},&nbsp;{{ date('Y'), strtotime($profile_details->created_at) }}</p>
	</div>
	<div class="settings-menu">
		<ul>
			<li>
				<a href="{{ url('customer/customer-dashboard') }}" class="active">
					<i class="fa fa-th-large" aria-hidden="true"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ route('customer.profile') }}">
					<i class="fa fa-th-large" aria-hidden="true"></i>
					<span>My Profile</span>
				</a>
			</li>
			<li>
				<a href="{{ route('customer.change-password') }}">
					<i class="fa fa-th-large" aria-hidden="true"></i>
					<span> Change Password</span>
				</a>
			</li>
			@if($profile_details->user_type!='guest')
			<li>
				<div class="accordion bg-transparent border-none  border-0" id="accordionExample">
					<div class="accordion-item bg-transparent border-none  border-0">
						<h2 class="accordion-header bg-transparent" id="headingThree">
							<a href="#my-booking.php" class="collapsed dropdown-toggle" type="button" data-bs-toggle="collapse"
								data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<i class="fa fa-th-large" aria-hidden="true"></i> <span> My Bookings</span>
							</a>
						</h2>
						<div id="collapseThree" class="accordion-collapse collapse bg-transparent"
							aria-labelledby="headingThree" data-bs-parent="#accordionExample">
							<ul class="ps-4 py-3">
								<li>
									<a href="{{ route('customer.add_booking') }}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										<span>Book New Service</span>
									</a>
								</li>
								<li>
									<a href="{{ route('customer.index_booking') }}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										<span>All Booking</span>
									</a>
								</li>
								<li>
									<a href="{{ route('customer.upComing_booking') }}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										<span>Up-coming Booking</span>
									</a>
								</li>
								<li>
									<a href="{{ url('customer/ongoing-booking') }}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										<span>Ongoing Booking</span>
									</a>
								</li>
								<li>
									<a href="{{ url('customer/completed-booking') }}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										<span>Completed Booking</span>
									</a>
								</li>
								<li>
									<a href="{{ url('customer/pending-booking') }}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										<span>Pending Booking</span>
									</a>
								</li>
								<li>
									<a href="{{ url('customer/cancelled-booking') }}">
										<i class="fa fa-th-large" aria-hidden="true"></i>
										<span>Cancelled Booking</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</li>
			<li>
					<div class="accordion bg-transparent border-none  border-0" id="accordionExample1">
						<div class="accordion-item bg-transparent border-none  border-0">
							<h2 class="accordion-header bg-transparent" id="headingThree1">
								<a href="#my-booking.php" class="collapsed dropdown-toggle" type="button" data-bs-toggle="collapse"
									data-bs-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
									<i class="fa fa-th-large" aria-hidden="true"></i> <span> My Estimate</span>
								</a>
							</h2>
							<div id="collapseThree1" class="accordion-collapse collapse bg-transparent"
								aria-labelledby="headingThree1" data-bs-parent="#accordionExample1">
								<ul class="ps-4 py-3">
									<li>
										<a href="{{ route('customer.viewEstimate') }}">
											<i class="fa fa-th-large" aria-hidden="true"></i>
											<span>View Estimate</span>
										</a>
									</li>
									
								</ul>
							</div>
						</div>
					</div>
				</li>
			@else
				<li>
					<div class="accordion bg-transparent border-none  border-0" id="accordionExample1">
						<div class="accordion-item bg-transparent border-none  border-0">
							<h2 class="accordion-header bg-transparent" id="headingThree1">
								<a href="#my-booking.php" class="collapsed dropdown-toggle" type="button" data-bs-toggle="collapse"
									data-bs-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
									<i class="fa fa-th-large" aria-hidden="true"></i> <span> My Estimate</span>
								</a>
							</h2>
							<div id="collapseThree1" class="accordion-collapse collapse bg-transparent"
								aria-labelledby="headingThree1" data-bs-parent="#accordionExample1">
								<ul class="ps-4 py-3">
									<li>
										<a href="{{ route('customer.viewEstimate') }}">
											<i class="fa fa-th-large" aria-hidden="true"></i>
											<span>View Estimate</span>
										</a>
									</li>
									
								</ul>
							</div>
						</div>
					</div>
				</li>
			@endif
			
			@if($profile_details->user_type!='guest')
				<li>
					<a href="{{ route('customer.feedback') }}">
						<i class="fa fa-th-large" aria-hidden="true"></i>
						<span>Feedback</span>
					</a>
				</li>
				<li>
					<a href="{{ route('customer.complain') }}">
						<i class="fa fa-th-large" aria-hidden="true"></i>
						<span>Complain</span>
					</a>
				</li>
			@endif
			<li>
				<a href="{{ url('logout') }}">
					<i class="fa fa-th-large" aria-hidden="true"></i>
					<span>Logout</span>
				</a>
			</li>
		</ul>
	</div>
</div>
