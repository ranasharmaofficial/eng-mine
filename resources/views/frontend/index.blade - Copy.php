@extends('frontend.layouts.master')
@section('title')
    @if ($page)
        {{ $page->meta_title }}
    @endif
@endsection

@section('meta_tags')
    @if ($page)
        <meta name="title" content="{{ $page->meta_title }}">
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
    @endif
    <meta name="google-site-verification" content="" />
    <meta name="msvalidate.01" content="" />
@endsection

@section('content')
    @php
        $skype_id = get_business_single_cache_value('skype', 'footer_setup', 'skype');
        $contact_email = get_business_single_cache_value('contact_email', 'footer_setup', 'contact_email');
        $telegram_id = get_business_single_cache_value('telegram', 'footer_setup', 'telegram');
        $whatsapp_id = get_business_single_cache_value('whatsapp', 'footer_setup', 'whatsapp');
		$social_medias = get_business_multiple_cache_value('social_medias', 'social_media');
    @endphp


	   <style>
      /*Banner section start*/
      .banner-image {
         background: url({{ static_asset('assets/assets_web/img/home-lineart.svg')}}) no-repeat, #0054a5;
         background-size: cover;
         background-position: center bottom;
         width: 100%;
         height: 700px;
      }
      /*Banner section end*/
   </style>
	<div class="homes">
    @include('frontend.includes.header')
   </div>
	<!-- Banner Image section start -->
      <ul class="list-unstyled banner-icons position-absolute ps-5" style="top:13rem; margin-left:5rem; z-index: 100;">
          @if(!empty($social_medias))
            @foreach($social_medias as $media)
			 <li>
				<a target="_blank" href="{{$media->value}}" class="  d-block">
				   <i class="fa fa-{{$media->field_name}} text-white bg-icon bg-{{$media->field_name}} my-3" aria-hidden="true"></i>
				</a>
			 </li>
			@endforeach
		 @endif

      </ul>

    <!-- Banner Image section start -->
    <ul class="list-unstyled banner-icons position-absolute ps-5" style="top:13rem; margin-left:5rem; z-index: 100;">
         @if(!empty($social_medias))
            @foreach($social_medias as $media)
			 <li>
				<a target="_blank" href="{{$media->value}}" class="  d-block">
				   <i class="fa fa-{{$media->field_name}} text-white bg-icon bg-{{$media->field_name}} my-3" aria-hidden="true"></i>
				</a>
			 </li>
			@endforeach
		 @endif

        <li>
            <a href="javascript:void(0)" class="  d-block">
                <i class="fa fa-whatsapp text-white bg-icon bg-whatsapp my-3" aria-hidden="true"></i>
            </a>
        </li>
    </ul>

    <div class="banner-image w-100 d-flex justify-content-center align-items-center" id="banner-image">
        <div class="content text-center" style="z-index: 100;">
            <h1 class="fw-bold text-light banner-eng-text" style="font-size:6rem;">Field Engineers</h1>
            <h1 class="text-light fw-bold banner-on-text" style="font-size: 4rem;">On-Demand</h1>
            <p class="text-secondary2 fw-bold fs-5 banner-p-text">"Hire Skilled and certified Enginners"</p>
            <p class="row text-secondary2 fw-bold mx-auto justify-content-between">
                <span class="col-sm-3 col-md-4">
                    <i class="fa fa-check" style="color: #d5d9e0;"></i> <span>On Demand</span>
                </span>
                <span class="col-sm-3 col-md-4">
                    <i class="fa fa-check" style="color: #d5d9e0;"></i> On Your Schedule
                </span>
                <span class="col-sm-3 col-md-4">
                    <i class="fa fa-check" style="color: #d5d9e0;"></i> On Your Team
                </span>
            </p>
            <!-- Banner form start -->
            <div class="row d-none d-lg-block d-xl-block">
                <div class="col-sm-11 mx-auto">
                    <form class="row bg-white bg-opacity-50 px-4 py-2 mx-md-5 rounded-pill">
                        <div class="col-sm-5 px-0">
                            <div class="input-group">
                                <div class="input-group-text bg-transparent border-0 fs-5">
                                    <i class="fa fa-map-marker fs-5" aria-hidden="true"></i>
                                </div>
                                {{-- <select class="form-select form-control bg-transparent border-0 fs-5">
                                    <option value="">
                                        <img src="{{ static_asset('assets/assets_web/img/location-pin.png') }}"
                                            alt="location-img">
                                        Location
                                    </option>
                                    <option value="">Delhi</option>
                                    <option value="">Mumbai</option>
                                    <option value="">Bangkok, Thailand</option>
                                    <option value="">Rajiv Gandhi International Airport</option>
                                    <option value="">Dubai, United Arab Emirates</option>
                                    <option value="">Goa - Dabolim Airport, India</option>
                                    <option value="">Hyderabad, India</option>
                                </select> --}}
                                <input id="autocomplete_ranas" type="text" class="form-select form-control bg-transparent border-0 fs-5">
                            </div>
                        </div>
						{{-- <div class="col-sm-2 px-0">
                            <input type="text" class="form-control bg-transparent border-0 fs-5" placeholder="Landmark">
                        </div>--}}
                        <div class="col-sm-3 px-0">
                            <input type="date" class="form-control bg-transparent border-0 fs-5">
                        </div>
                        <div class="col-sm-4 px-0">
                            <div class="row">
                                <div class="col-6 px-0">
                                    <input type="time" class="form-control bg-transparent border-0 fs-5">
                                </div>
                                <div class="col-6 px-0 my-auto">
                                    <a href="check-sloat.php" class="btn border-0 rounded-pill">
                                        Check&nbsp;Slot
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mx-2 d-lg-none d-xl-none d-xxl-none d-block banner-form mt-5">
                <div class="col-md-9 mx-auto bg-light bg-gradient bg-opacity-50 rounded-4">
                    <form class="row g-3 py-2">
                        <div class="col-md-6">
                            <div class="input-group input-group-sm">
                                <div class="input-group-text bg-transparent border-0">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <select class="form-select form-control bg-transparent border-0">
                                    <option value="">
                                        <img src="{{ static_asset('assets/assets_web/img/location-pin.png') }}"
                                            alt="location-img">
                                        Location
                                    </option>
                                    <option value="">Delhi</option>
                                    <option value="">Mumbai</option>
                                    <option value="">Bangkok, Thailand</option>
                                    <option value="">Rajiv Gandhi International Airport</option>
                                    <option value="">Dubai, United Arab Emirates</option>
                                    <option value="">Goa - Dabolim Airport, India</option>
                                    <option value="">Hyderabad, India</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control form-sm-control bg-transparent border-0"
                                placeholder="Landmark">
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control form-sm-control bg-transparent border-0">
                        </div>
                        <div class="col-md-6">
                            <input type="time" class="form-control form-sm-control bg-transparent border-0">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn">Check Slot</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Banner form start -->
        </div>
    </div>
    <!-- Banner Image section end -->

    <!--tab-bar section start-->
    <section class="providers-section-two">
        <div class="container">
            <div class="row">
                <div class="col-md-6 aos aos-init aos-animate" data-aos="fade-up">
                    <div class="section-heading-two white-text">
                        <h2 class="text-white">Cost Estimator</h2>
                        <p class="text-white d-none">Sed ut perspiciatis unde omnis iste natus error</p>
                    </div>
                </div>
                <div class="col-md-6 text-md-end aos aos-init aos-animate" data-aos="fade-up">
                    <!-- <a href="javascript:void();" class="btn btn-pink btn-viewall" data-bs-toggle="modal" data-bs-target="#cost-estimator">
                             Cost Estimator details <i class="bi bi-arrow-right-circle"></i>
                          </a> -->
                </div>
            </div>
        </div>
    </section>
    <!--/tab-bar section end-->

    <!--tab of engineering mine section start-->
    <section class="offsite-support">
        <div class="container position-relative">

                <div class="col-md-12">
                    <div class="toggle-tab">
					@if(count($service_categories)>0)
                        <ul class="nav nav-tabs border-0 ms-5 justify-content-center">
                            @foreach($service_categories as $key => $item)
								<li class="nav-item tab-nav-item text-center rounded">
									<a class="nav-link text-dark @if($key+1==1) active @endif" data-bs-toggle="tab" href="#menu{{$key+1}}">{{ $item->name }}</a>
								</li>
							@endforeach
                        </ul>
					@endif

					@if(count($service_categories)>0)
                        <!-- Tab panes -->
                        <div class="tab-content field py-5">
							@foreach($service_categories as $key => $item)
								@php
									$domainList = App\Models\ServiceSubCategory::where('category_id', $item->id)->where('status', 1)->get();
								@endphp
								<div class="tab-pane container @if($key+1==1) active @endif justifly-content-round" id="menu{{$key+1}}">
									<table name="{{$key+1}}" id="myTable{{$key+1}}"
										class="input-group rounded-3 d-block w-100 border-0 fs-13 overflow-hidden">
										<tbody class="d-block w-100">
											<tr>
												<td>
													<div class="position-relative col-1ine1 align-items-center pe-0">
														<div class="d-flex justify-content-around">
															<div class="tab-domain me-2">
																<span><i class="fa fa-globe" aria-hidden="true"></i></span>
																<label>Select Domain</label>
															</div>
															<select name="subcategory_id[]" class="subcategory_choose service_subcategory form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
																id="subcategory_id" >
																<option value="" selected="">Select Domain</option>
																@foreach($domainList as $row)
																<option value="{{ $row->id }}"> {{ $row->name }} </option>
																@endforeach
															</select>
															<div class="valid-feedback">Looks good!</div>
														</div>
													</div>
												</td>
												<td>
													<div class="position-relative col-1ine1  align-items-center pe-0">
														<div class="d-flex justify-content-around">
															<div class="tab-domain me-2">
																<span><i class="fa fa-globe" aria-hidden="true"></i></span>
																<label>Sub Domain</label>
															</div>

															<select name="service_id[]" class="choose_service  form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
																id="service_id" >
																<option value="" selected="">Select Sub Domain
																</option>

															</select>

														</div>
													</div>
												</td>

												<td>
													<div class="position-relative col-1ine1 align-items-center pe-0">
														<div class="d-flex justify-content-around">
															<div class="tab-domain me-2">
																<span><i class="fa fa-globe" aria-hidden="true"></i></span>
																<label>Select Activity</label>
															</div>

															<select name="subservice_id[]" class="service_subservice_id form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
																id="subservice_id" >
																<option value="" selected=""> Select Activity</option>

															</select>

														</div>
													</div>
												</td>

												<td>
													<div class="position-relative col-1ine1 align-items-center pe-0">
														<div class="d-flex justify-content-around">
															<div class="tab-domain me-2">
																<span><i class="fa fa-globe" aria-hidden="true"></i></span>
																<label>Activity Type</label>
															</div>
															<select name="activity_type[]"
																class="activity_type form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
																>
																<option value="" selected=""> Activity Type</option>
																<option value="on_site"> On-Site </option>
																<option value="off_site"> Off-Site </option>
															</select>

														</div>
													</div>
												</td>

												<td>
													<div class="position-relative col-1ine1 d-flex align-items-center pe-0">
														<div class="d-flex justify-content-around">
															<div class="tab-domain me-2">
																<span><i class="fa fa-globe" aria-hidden="true"></i></span>
																<label>Model</label>
															</div>
															<input type="text" name="model[]" class="service_model form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" placeholder="Model/Version ">
														</div>
													</div>
												</td>

												<td>
													<div class="position-relative col-1ine1 d-flex align-items-center pe-0">
														<div class="d-flex justify-content-around">
															<div class="tab-domain me-2">
																<span><i class="fa fa-globe" aria-hidden="true"></i></span>
																<label>Qty</label>
															</div>
															<input type="number" min="1" name="qty[]" class="service_quantity form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" placeholder="Qty" style="width:60px;">
															<div class="valid-feedback">Looks good!</div>
														</div>
													</div>
												</td>

												<td>
													<div class="d-flex w-160 justify-content-end">
														<button
															class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button>
														<button
															class="btn border-1 border-danger w-auto delete_button rounded-pill px-3 fs-14 bg-danger mx-1">Delete</button>
														<button
															class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<div class="position-relative justify-content-center d-flex w-50 mx-auto my-2 pt-3">
										@if(Session('LoggedCustomer') != null)
											<button class="btn btn-primary border-1 border-danger w-150 rounded px-3 fs-14 bg-danger show-my-estimate1"
												type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
												<i class="fa fa-sign-in pe-2" aria-hidden="true"></i> Show My Estimate
											</button>
										@else
											<button class="btn btn-primary border-1 border-danger w-150 rounded px-3 fs-14 bg-danger show-my-estimate1"
												type="button" data-bs-toggle="modal" data-bs-target="#loginAlertModal">
												<i class="fa fa-sign-in pe-2" aria-hidden="true"></i> Show My Estimate
											</button>
										@endif
										<button class="btn btn-primary border-1 border-success w-150 rounded px-3 fs-14 bg-success mx-2 addown"
											onclick="addRow{{$key+1}}()"><i class="fa fa-sign-in pe-2" aria-hidden="true"></i> Add
											Service
										</button>
									</div>

								</div>
							@endforeach




                       </div>

					@endif
                    </div>


                    <!-- Modal Box Start -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-body box-type-estimate box-type-estimate4 bg-white shadow p-4 z-index-999 position-absolute top-100 w-100 rounded-3 start-0 mt-3">
                                    <button type="button" class="btn-close fs-3 bg-transparent ms-auto mt-2 mb-5 d-block text-end"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                    <form method="post" action="{{ route('saveQuoteEnquiry') }}" enctype="multipart/form-data" class="row g-3 needs-validation py-2">
										@csrf
									{{--<div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center  justify-content-end">
                                                <div class="tab-domain me-2 position-static">
                                                    <span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> First Name</label>
                                                </div>
                                                <input type="text" class="form-control px-0 shadow-none ps-2 ps-2 bg-white" name="first_name" placeholder="First Name" required="">

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center justify-content-end">
                                                <div class="tab-domain me-2 position-static">
                                                    <span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> Last Name</label>
                                                </div>
                                                <input type="text" name="last_name" class="form-control shadow-none  px-0 ps-2 ps-2 bg-white" id="validationCustom01" placeholder="Last Name" required="">

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center  ">
                                                <div class="tab-domain me-2 position-static">
                                                    <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> Email Id</label>
                                                </div>
                                                <input type="email" name="email" class="form-control px-3 shadow-none  bg-white" placeholder="Email Id" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center ">
                                                <div class="tab-domain me-2 position-static">
                                                    <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> Phone</label>
                                                </div>
                                                <input type="text" class="form-control shadow-none px-3 border border-muted bg-white"
                                                    name="phone" placeholder="Phone" required="">
                                            </div>
                                        </div>--}}
                                        <div class="col-md-12">
                                            <div class="mb-3 fs-13 text-start">
                                                <label for="formFile" class="px-2 text-muted">Upload Docoment <small>(File
                                                        accepted: .pdf, .doc/docx - Max file size: 150KB for demo
                                                        limit)</small></label>
                                            </div>
                                            <div class="position-relative d-flex align-items-center ">
                                                <div class="tab-domain me-2            position-static w-auto">
                                                    <span><i class="fa fa-file" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> file</label>
                                                </div>
                                                <input name="files" class="form-control shadow-none px-3 border border-muted bg-white py-2"
                                                    type="file" id="formFile" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center ">
                                                <div class="tab-domain me-2 position-static w-auto">
                                                    <span><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> Message</label>
                                                </div>
                                                <textarea name="message" class="form-control shadow-none fs-13 lsp-5" placeholder="Please elaborate your requirement"></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-primary border-0 w-150 float-none d-block vs-btn fs-13 lsp-5  mx-auto rounded bg-danger" type="submit">Send Message </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- \Modal Box End -->

					<!-- Modal Box Start -->
                    <div class="modal fade" id="loginAlertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-body box-type-estimate box-type-estimate4 bg-white shadow p-4 z-index-999 position-absolute top-100 w-100 rounded-3 start-0 mt-3">
                                    <button type="button" class="btn-close fs-3 bg-transparent ms-auto mt-2 mb-5 d-block text-end"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="row g-3 needs-validation py-2">
											<div class="col-md-12">
												<h5 class="text-primary"> You are not logged in. Please Login in first.</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <a href="{{ url('login') }}" class="btn btn-primary border-0 w-150 float-none d-block vs-btn fs-13 lsp-5  mx-auto rounded bg-danger" type="submit">Login </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- \Modal Box End -->




            </div>
        </div>
    </section>
    <!--/tab of engineering mind section end-->
    <div class="empty"></div>
@if(isset($section_lists))
	@foreach($section_lists as $section)
		




		@if($section->section_name == "reason_to_choose_us")
			@php
				$reason_to_choose_section_datas = get_section_wise_data($page->id, $section->id);
			@endphp
			<!--choose-us Section Start-->
			<section class="reason-choose-us">
				<div class="container">
					<div class="section-heading section-heading-six">
						<div class="row align-items-center">
							<div class="col-md-6 col-12 aos" data-aos="fade-up">
								<div class="reason-six">
									<img src="{{ static_asset('assets/assets_web/img/clock.png') }}" alt="clock"
										style="height: 60px;">
									<h5>{{ $section->title }}</h5>
								</div>
								{{--<h2 class="mb-4">Reasons to <span class="choose-us">Choose Us</span></h2>--}}
								{!! $section->description !!}
							</div>
							<div class="col-md-6 col-12 aos" data-aos="fade-up">
								<div class="row">
									<div class="col-md-12">
										<div class="total-client-all">
											<ul class="total-client-half mb-0 align-items-end justifly-content-end">
												<li class="total-client-mini">
													<div class="total-experts-main">
														<h3>540</h3>
														<p>Total<span class="d-block">Experts</span></p>
													</div>
												</li>
												<li class="total-client-mini">
													<div class="total-experts-main">
														<h3>540</h3>
														<p>Total<span class="d-block">Experts</span></p>
													</div>
												</li>
												<li>
													<ul class="total-client-avatar">
														<li>
															<a href="#">
																<img src="{{ static_asset('assets/assets_web/img/profiles/avatar-06.jpg') }}"
																	alt="">
															</a>
														</li>
														<li>
															<a href="#">
																<img src="{{ static_asset('assets/assets_web/img/profiles/avatar-07.jpg') }}"
																	alt="">
															</a>
														</li>
														<li>
															<a href="#">
																<img src="{{ static_asset('assets/assets_web/img/profiles/avatar-08.jpg') }}"
																	alt="">
															</a>
														</li>
														<li>
															<a href="#">
																<img src="{{ static_asset('assets/assets_web/img/profiles/avatar-09.jpg') }}"
																	alt="">
															</a>
														</li>
														<li class="more-set rounded-circle">
															<a href="#">
																<i class="fa fa-plus text-white " aria-hidden="true"></i>
															</a>
														</li>
													</ul>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row justify-content-center align-items-end">
						@if(count($reason_to_choose_section_datas)>0)
							@foreach($reason_to_choose_section_datas as $item)
								<div class="col-lg-4 col-sm-4 col-12">
									<div class="professional-cleaning-main">
										<img src="{{ static_asset($item->img) }}" alt="clock" class="me-2">
										<h4 class="d-inline">{{ $item->title }} </h4>
										<p class="text-secondary mt-4 fs-6">{!! $item->description !!}<br>&nbsp;</p>
									</div>
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</section>
		<!-- /Choose Us Section End -->
		@endif
		
		
		
		@if($section->section_name == "section_4")
	@php
		$reason_to_choose_section_datas = get_section_wise_data($page->id, $section->id);
	@endphp

    <!-- About Our Company Section Start -->
    <section class="about-our-company about-company mt-3">
        <div class="container">
            <div class="section-heading section-heading-six">
                <div class="row">
                    <div class="col-md-6 col-12 aos" data-aos="fade-up">
                        <div class="reason-six server-photos">
                            <img src="{{ static_asset('assets/assets_web/img/technology.png') }}" alt="tech-img"
                                style="height: 60px;">
                            <h5 class="pb-3">Best server mantinance service</h5>
                        </div>
                        {{--<h2>About <span>Our Company</span></h2>--}}
						<h2>{{ $section->title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-12">
                    <div class="our-company-six">
                        {!! $section->description !!}

                    </div>
                    <a href="{{ url('about-us') }}" class="btn btn-pink btn-viewall mb-5">About Us<i
                            class="bi bi-arrow-right-circle"></i></a>
                    <div class="aboutus-companyimg">
                        <a href="">
                            <img src="{{ static_asset('assets/assets_web/img/server-vedio.jpeg') }}" alt="img"
                                style="height: 200px; width: 400px;">
                        </a>
                        <a href="https://youtu.be/XZmGGAbHqa0?si=cCZnWZh4O3G3_N5k" target="_blank">
                            <div class="playicon">
                                <span>
                                    <i class="bi bi-play"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-12">
                    <div class="our-company-ryt">
                        <div class="our-company-img">
                            <img src="{{ static_asset($section->image) }}" alt="image" class="img-fluid">
                        </div>
                        <div class="our-company-first-content">
                            <div class="company-top-content">
                                <p>Call us Today!</p>
                                <h3>+91 9870407840</h3>
                            </div>
                            <a href="#">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="our-company-two-content">
                            <div class="company-two-top-content">
                                <h4>12+</h4>
                                <img src="{{ static_asset('assets/assets_web/img/icons/trophy.svg') }}" alt="">
                            </div>
                            <p>Years Experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /About Our Company Section End-->
	@endif
		
		
		
	@if($section->section_name == "affordable_and_reliable")
	@php
		$affordable_and_reliable_datas = get_section_wise_data($page->id, $section->id);
	@endphp
    <!-- Get Satisfied with the services Explore All -->
    <section class="satisfied-service-section">
        <div class="container">
            <div class="section-heading section-heading-six">
                <div class="row align-items-end">
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <div class="reason-six server-photos">
                            <img src="{{ static_asset('assets/assets_web/img/services.png') }}" alt="service-img" style="height: 50px;">
                            <h5>Affordable & reliable</h5>
                        </div>
                        <h2>Get Satisfied with the <span>services</span></h2>
                    </div>
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <a href="javascript:void(0)" class="afford-btn">Explore All</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($affordable_and_reliable_datas as $item)
				<div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="get-service-main">
                        <span>
                            <img src="{{ static_asset('assets/assets_web/img/data.png') }}" alt="data">
                        </span>
                        <div class="get-service-content">
                            <a href="#">
                                <h5 class="mt-4 mb-3">{{ $item->title }}</h5>
                            </a>
							{{-- <p class="fs-6">

                            </p>--}}
							{!! $item->description !!}
                            <a href="#" class="fw-bold d-none"> View More <i class="fa fa-angle-right p-1"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
				@endforeach

            </div>
        </div>
    </section>
    <!-- /Get Satisfied with the services Explore All -->
	@endif
@endforeach
@endif

    <!-- Our Certified Engineer Sectin Start -->
    <section class="certified-engineer py-5" style="background:#0c112a;">
        <div class="container">
            <div class="row">
                <h2 class="text-center text-white mb-2">Our Certified Engineer</h2>
                <p class="text-center text-white pb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 my-2">
                    <img src="{{ static_asset('assets/assets_web/img/certified/ccnalogo.png') }}" alt=""
                        class="img-fluid rounded d-block mx-auto">
                </div>

            </div>

        </div>
    </section>
    <!-- /Our Certified Engineer Sectin End -->

    <!-- Price Section Start -->

    {{-- @include('frontend.partials.price-section') --}}
    <!-- Price Section End -->

    <!--start customer review -->
    @include('frontend.partials.testimonial-section')
    {{-- <section class="customer-reviews-six-section">
         <div class="container">
            <div class="section-heading section-heading-six">
               <div class="row align-items-end">
                  <div class="col-md-6 aos aos-init aos-animate" data-aos="fade-up">
                     <div class="reason-six">
                        <img src="{{ static_asset('assets/assets_web/img/icons/affordable.png')}}" alt="img" style="height: 50px;">
                        <h5>Affordable &amp; Reliable</h5>
                     </div>
                     <h2>Customer <span>Reviews</span></h2>
                  </div>
                  <div class="col-md-6 aos aos-init aos-animate" data-aos="fade-up">
                     <a href="testimonials.php" class="afford-btn">Explore All</a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-4 col-md-6 col-12">
                  <div class="customer-review-main-six">
                     <div class="customer-review-top">
                        <img src="{{ static_asset('assets/assets_web/img/profiles/avatar-20.jpg')}}" alt="">
                        <h5>Maria Williams</h5>
                        <p class="fs-6">
                           These websites provide easy access to pools of engineering knowledge. Rather than pore through books and libraries, engineering professionals and students alike can maintain sharp minds through the click of a button.
                        </p>
                     </div>
                     <div class="customer-review-bottom">
                        <div class="rating">
                           <i class="fa fa-star text-warning" aria-hidden="true"></i>
                           <i class="fa fa-star text-warning" aria-hidden="true"></i>
                           <i class="fa fa-star text-warning" aria-hidden="true"></i>
                           <i class="fa fa-star text-warning" aria-hidden="true"></i>
                           <i class="fa fa-star star-space" aria-hidden="true"></i>
                        </div>
                     </div>
                     <div class="customer-review-quote">
                        <img src="{{ static_asset('assets/assets_web/img/icons/reviews-quote.svg')}}" alt="">
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-12">
                  <div class="customer-review-main-six">
                     <div class="customer-review-top">
                        <img src="{{ static_asset('assets/assets_web/img/profiles/avatar-18.jpg')}}" alt="">
                        <h5>Bella Williams</h5>
                        <p class="fs-6">
                           Engineeringmine websites may as well have additional features you ought to be knowledgeable about to ensure your online presence makes an impact and gets discovered. It also help me to my project to build it perfect.
                        </p>
                     </div>
                     <div class="customer-review-bottom">
                        <div class="rating">
                           <i class="fa fa-star text-warning" aria-hidden="true"></i>
                           <i class="fa fa-star text-warning" aria-hidden="true"></i>
                           <i class="fa fa-star star-space" aria-hidden="true"></i>
                           <i class="fa fa-star star-space" aria-hidden="true"></i>
                           <i class="fa fa-star star-space" aria-hidden="true"></i>
                        </div>
                     </div>
                     <div class="customer-review-quote">
                        <img src="{{ static_asset('assets/assets_web/img/icons/reviews-quote.svg')}}" alt="">
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-12">
                  <div class="customer-review-main-six">
                     <div class="customer-review-top">
                        <img src="{{ static_asset('assets/assets_web/img/profiles/avatar-11.jpg')}}" alt="">
                        <h5>Cristina Williams</h5>
                        <p class="fs-6">
                           Enginnermine creates custom software solutions, embedded systems design and produces new devices for the global market by taking a client’s product from the stage of an idea to the final launch and mass production.
                        </p>
                     </div>
                     <div class="customer-review-bottom">
                        <div class="rating">
                           <i class="fa fa-star text-warning" aria-hidden="true"></i>
                           <i class="fa fa-star text-warning" aria-hidden="true"></i>
                           <i class="fa fa-star text-warning" aria-hidden="true"></i>
                           <i class="fa fa-star star-space" aria-hidden="true"></i>
                           <i class="fa fa-star star-space" aria-hidden="true"></i>
                        </div>
                     </div>
                     <div class="customer-review-quote">
                        <img src="{{ static_asset('assets/assets_web/img/icons/reviews-quote.svg')}}" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section> --}}
    <!--end customer review -->

    <!-- Faq Section start -->
    <section class="faq py-5 mt-2">
        <div class="container">
            <div class="section-heading section-heading-six">
                <div class="row align-items-end pb-5">
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <div class="reason-six">
                            <img src="{{ static_asset('assets/assets_web/img/icons/affordable.png') }}" alt="img"
                                style="height: 50px;">
                            <h5>Frequently Asked Questions</h5>
                        </div>
                        <h2><span>FAQ</span></h2>
                    </div>
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <a href="{{ url('faqs') }}" class="afford-btn">Explore All</a>
                    </div>
                </div>
            </div>
            <div class="faq-section mb-3">
                @foreach($faqList as $key => $item)
                     <div class="faq-card">
                        <h4 class="faq-title">
                           <a class="collapsed" data-bs-toggle="collapse" href="#faqOne{{$key+1}}" aria-expanded="false"> {{ $item->question }} <i class="bi bi-plus-circle-fill fs-5"></i></a>
                        </h4>
                        <div id="faqOne{{$key+1}}" class="card-collapse collapse">
                           {!! $item->answer !!}
                        </div>
                     </div>
				@endforeach
            </div>
        </div>
    </section>
    <!-- /Faq Section End --->

    <!-- Latest Blog Section Start -->
    @include('frontend.partials.blog_section')

    <!-- /Latest Blog Section End-->

    <!--offer-blog section start-->
    <section class="section-offer">
        <div class="container">
            <div class="row aos aos-init aos-animate" data-aos="fade-up">
                <div class="col-md-12">
                    <div class="offer-paths offer-sec">
                        <div class="offer-path-content">
                            <div class="section-heading-two">
                                <p>Our Best Offer for Server Mantinance</p>
                                <h3 class="mb-0">We Are Offering Best Free trial Offer</h3>
                            </div>
                            <p class="specify-text">
                                Specify the duration of the free trial. For field engineer services,
                                it's common to offer a trial period of a few days or a week, depending on the complexity of
                                the tasks..
                            </p>
                        </div>
                        <div class="offer-pathimg">
                            <img src="{{ static_asset('assets/assets_web/img/offer-path.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--offer-blog section end-->

    <!-- Check Sloat Section Start -->
    <div class="modal fade custom-modal" id="check-sloat">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 justify-content-between pb-0">
                    <h4 class="modal-title">Select Your Service & Get Available Sloat</h4>
                    <button type="button" class="close-btn px-2 py-1 border-0 rounded-circle" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa fa-times fs-5"></i>
                    </button>
                </div>
                <hr>
                <div class="modal-body pt-0">
                    <form action="#">
                        <div class="log-form pt-3">
                            <div class="form-group">
                                <select
                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 px-2 fs-13 lsp-5"
                                    id="validationCustom04" required="">
                                    <option value="" selected="">Select Service</option>
                                    <option value="Rack Mounting"> Hire L1 Engineer</option>
                                    <option value="Operating System"> Installation & Configuration </option>
                                    <option value="Database"> Upgrade & Migration </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select
                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 px-2 fs-13 lsp-5"
                                    id="validationCustom04" required="">
                                    <option value="" selected="">Select Domain</option>
                                    <option value="Rack Mounting"> Rack Mounting </option>
                                    <option value="Operating System"> Operating System </option>
                                    <option value="Database"> Database </option>
                                    <option value="Virtualization"> Virtualization </option>
                                    <option value="Router"> Router </option>
                                    <option value="Switch"> Switch </option>
                                    <option value="Firewall"> Firewall </option>
                                    <option value="Backup"> Backup </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select
                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 px-2 fs-13 lsp-5"
                                    id="validationCustom04" required="">
                                    <option value="" selected="">Select Sub Domain</option>
                                    <option value="Windows Server Edition">Windows Server Edition</option>
                                    <option value="Oracle Solaris"> Oracle Solaris</option>
                                    <option value="Oracle Solaris"> MS SQL</option>
                                    <option value="Oracle Solaris"> Mari DB</option>
                                    <option value="Oracle Solaris"> Post Gress</option>
                                    <option value="Oracle Solaris"> VMware</option>
                                    <option value="Oracle Solaris"> RedHat RHEV</option>
                                    <option value="Oracle Solaris"> Microsoft Hyper-V</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 mx-auto text-center text-white d-block border-0"
                            type="button" onclick="sloatAvail()">Submit
                        </button>
                        <div id="sloat-avail d-none">
                            <div class="my-2">sloat is Available</div>
                            <a href="service-booking.php" class="btn btn-primary w-100 text-white border-0">Book Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Check Sloat Section End -->
    <!-- Cost Estimator Details Section Start -->
    <div class="modal fade custom-modal" id="cost-estimator">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 justify-content-between pb-0">
                    <h4 class="modal-title">Cost Estimator Details</h4>
                    <button type="button" class="close-btn px-2 py-1 border-0 rounded-circle" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa fa-times fs-5"></i>
                    </button>
                </div>
                <hr>
                <div class="modal-body pt-0">
                    Cost Estimator
                </div>
            </div>
        </div>
    </div>
    <!-- /Cost Estimator Details Section End-->


<script src="https://code.jquery.com/jquery-3.4.1.js"></script>


<script>

var switchStatus = false;
$("#price_id").on('change', function() {
    if ($(this).is(':checked')) {
        switchStatus = $(this).is(':checked');
      // alert(switchStatus);// To verify
        //alert("on");
        $('#monthly_plan').hide();
      $('#annually_plan').show();
    }
    else {
      switchStatus = $(this).is(':checked');
      //alert(switchStatus);// To verify
      //alert("off");
      $('#monthly_plan').show();
      $('#annually_plan').hide();
    }
});

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}




////////////////////////////////////////////////////
 function BindEvents(){
  $('#myTable2').on('click', '.delete_button2', function(e){
    $(this).closest('tr').remove()
  });
}

$('table#myTable2').on('click', '.edit_button', function(e){
   $(this).closest('tr').addClass('active');
});
function BindEvents(){
  $('#myTable3').on('click', '.delete_button3', function(e){
    $(this).closest('tr').remove()
  });
}

$('table#myTable3').on('click', '.edit_button', function(e){
   $(this).closest('tr').addClass('active');
});

function addRow2() {
    var table = document.getElementById("myTable2");
	  addClassToTr(table, "name");

      var row = table.insertRow(-1);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4);
      var cell6 = row.insertCell(5);
      var cell7 = row.insertCell(6);
      cell1.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
							<div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span><i class="fa fa-globe" aria-hidden="true"></i></span>
										<label for="">Domain</label>
								</div>
								@php
								  $secondCategory = \App\Models\ServiceSubCategory::where('category_id', 2)->where('status', 1)->get();
								@endphp
								<select name="subcategory_id[]" class="form-control service_subcategory subcategory_choose ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04">
									<option value="" selected="">Select Domain</option>
									@foreach($secondCategory as $item)
										<option value="{{ $item->id }}"> {{ $item->name }} </option>
									@endforeach
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>
						</div>`;
      cell2.innerHTML = `<div class="position-relative col-1ine1  align-items-center pe-0">
							<div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span><i class="fa fa-globe" aria-hidden="true"></i></span>
									<label for="">Domain</label>
								</div>
								<select id="service_id" name="service_id[]" class="form-control choose_service ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04" required="">
									<option value="" selected="">Select Sub Domain</option>
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>
						</div>`;
      cell3.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
                             <div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span><i class="fa fa-globe" aria-hidden="true"></i></span>
									<label>Select Activity</label>
								</div>

								<select name="subservice_id[]" class="service_subservice_id form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
									id="subservice_id" >
									<option value="" selected=""> Select Activity</option>

								</select>

							</div>
                          </div>`;
      cell4.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
                              <div class="d-flex justify-content-around">
                                  <div class="tab-domain me-2">
                                      <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                                      <label for="">Activity Type</label>
                                  </div>
                                  <select name="activity_type[]" class="activity_type form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5">
									<option value="" selected=""> Activity Type</option>
									<option value="on_site"> On-Site </option>
									<option value="off_site"> Off-Site </option>
								</select>
                                  <div class="valid-feedback">Looks good!</div>
                              </div>
                          </div>`;
      cell5.innerHTML = '<div class="abc position-relative col-1ine1 d-flex align-items-center pe-0"> <div class="d-flex justify-content-around"> <div class="tab-domain me-2"> <span><i class="fa fa-globe" aria-hidden="true"></i></span> <label for="">Domain</label> </div> <input type="text" class="form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="" placeholder="Model/Version" required=""> <div class="valid-feedback">Looks good!</div> </div> </div>';
      cell6.innerHTML = `<div class="position-relative col-1ine1 d-flex align-items-center pe-0">
                              <div class="d-flex justify-content-around">
                                  <div class="tab-domain me-2">
                                      <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                                      <label for="">Qty</label>
                                  </div>
                                  <input type="number" class="service_quantity form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="qty" placeholder="Qty" required="" style="width:60px;">
                                  <div class="valid-feedback">Looks good!</div>
                              </div>
                         </div>`;
      cell7.innerHTML = '<div class="d-flex w-160 justify-content-end"><button class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button><input type="button" class="delete_button btn btn-primary border-1 border-danger w-auto rounded-pill px-3 fs-14 bg-danger mx-1" value="Delete"><button class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button> </div>';
};

function addRow3() {
    var table = document.getElementById("myTable3");
	  addClassToTr(table, "name");

      var row = table.insertRow(-1);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4);
      var cell6 = row.insertCell(5);
      var cell7 = row.insertCell(6);
      cell1.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
							<div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span><i class="fa fa-globe" aria-hidden="true"></i></span>
									<label for="">Domain</label>
								</div>
								@php
								  $thirdCategory = \App\Models\ServiceSubCategory::where('category_id', 2)->where('status', 1)->get();
								@endphp
								<select name="subcategory_id[]" class="form-control service_subcategory subcategory_choose ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04">
									<option value="" selected="">Select Domain</option>
									@foreach($thirdCategory as $item)
										<option value="{{ $item->id }}"> {{ $item->name }} </option>
									@endforeach
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>
						</div>`;
      cell2.innerHTML = `<div class="position-relative col-1ine1  align-items-center pe-0">
							<div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span><i class="fa fa-globe" aria-hidden="true"></i></span>
									<label for="">Domain</label>
								</div>
								<select id="service_id" name="service_id[]" class="form-control choose_service ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04" required="">
									<option value="" selected="">Select Sub Domain</option>
								</select>
								<div class="valid-feedback">Looks good!</div>
							</div>
						</div>`;
      cell3.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
                              <div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span><i class="fa fa-globe" aria-hidden="true"></i></span>
									<label>Select Activity</label>
								</div>

								<select name="subservice_id[]" class="service_subservice_id form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
									id="subservice_id" >
									<option value="" selected=""> Select Activity</option>

								</select>

							</div>
                          </div>`;
      cell4.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
                              <div class="d-flex justify-content-around">
                                  <div class="tab-domain me-2">
                                      <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                                      <label for="">Activity Type</label>
                                  </div>
                                  <select name="activity_type[]" class="activity_type form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5">
									<option value="" selected=""> Activity Type</option>
									<option value="on_site"> On-Site </option>
									<option value="off_site"> Off-Site </option>
								</select>
                                  <div class="valid-feedback">Looks good!</div>
                              </div>
                          </div>`;
      cell5.innerHTML = '<div class="abc position-relative col-1ine1 d-flex align-items-center pe-0"> <div class="d-flex justify-content-around"> <div class="tab-domain me-2"> <span><i class="fa fa-globe" aria-hidden="true"></i></span> <label for="">Domain</label> </div> <input type="text" class="form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="" placeholder="Model/Version" required=""> <div class="valid-feedback">Looks good!</div> </div> </div>';
      cell6.innerHTML = `<div class="position-relative col-1ine1 d-flex align-items-center pe-0">
                              <div class="d-flex justify-content-around">
                                  <div class="tab-domain me-2">
                                      <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                                      <label for="">Qty</label>
                                  </div>
                                  <input type="number" class="service_quantity form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="qty" placeholder="Qty" required="" style="width:60px;">
                                  <div class="valid-feedback">Looks good!</div>
                              </div>
                         </div>`;
      cell7.innerHTML = '<div class="d-flex w-160 justify-content-end"><button class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button><input type="button" class="delete_button btn btn-primary border-1 border-danger w-auto rounded-pill px-3 fs-14 bg-danger mx-1" value="Delete"><button class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button> </div>';
};

// Get all the "Delete" buttons
const deleteButtons = document.querySelectorAll('.btn-delete');

// Add event listener to each button
function BindEvents(){
  $('#myTable2').on('click', '.delete_button', function(e){
    $(this).closest('tr').remove()
  });
}

$('table#myTable2').on('click', '.edit_button', function(e){
   $(this).closest('tr').addClass('active');
});

$('table#myTable2').on('click', '.update_button', function(e){
   $(this).closest('tr').removeClass('active');
});
//////
function BindEvents(){
  $('#myTable3').on('click', '.delete_button', function(e){
    $(this).closest('tr').remove()
  });
}

$('table#myTable3').on('click', '.edit_button', function(e){
   $(this).closest('tr').addClass('active');
});

$('table#myTable3').on('click', '.update_button', function(e){
   $(this).closest('tr').removeClass('active');
});
//////
$('table').on('click', 'input[type="button"]', function(e){
   $(this).closest('tr').remove()
});
$('table').on('click', '.removes-row', function(e){
   $(this).closest('tr').remove()
});

$(".cast_est_btn").on("click", function(){
  $(this).addClass('active');
  RefreshTable();
});
function RefreshTable() {
  $( "#load_tables" ).load( "index.php #table_content" );
}

function BindEvents(){
  $('#myTable').on('click', '.delete_button', function(e){
    $(this).closest('tr').remove()
  });
}

$('table#myTable').on('click', '.edit_button', function(e){
   $(this).closest('tr').addClass('active');
});

$('table#myTable').on('click', '.update_button', function(e){
   $(this).closest('tr').removeClass('active');
});
//
const addClassToTr = (table, className="added")=>{
	const trs = table.querySelectorAll("tr");
	trs.forEach(tr=>{
		tr.classList.add(className);
	})
}
//




function addRow1() {
    var table = document.getElementById("myTable1");
	  addClassToTr(table, "name");
    @php
      $firstCategory = \App\Models\ServiceSubCategory::where('category_id', 1)->where('status', 1)->get();
    @endphp
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);

    cell1.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
							<div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span><i class="fa fa-globe" aria-hidden="true"></i></span>
									<label for="">Domain</label>
								</div>
								<select name="subcategory_id[]" class="form-control subcategory_choose service_subcategory ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04">
									<option value="" selected="">Select Domain</option>
									@foreach($firstCategory as $item)
										<option value="{{ $item->id }}"> {{ $item->name }} </option>
									@endforeach
								</select>
							</div>
						</div>`;
    cell2.innerHTML = `<div class="position-relative col-1ine1  align-items-center pe-0">
							<div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span><i class="fa fa-globe" aria-hidden="true"></i></span>
									<label for="">Domain</label>
								</div>
								<select id="service_id" name="service_id[]" class="form-control choose_service ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04" required="">
									<option value="" selected="">Select Sub Domain</option>
								</select>
							</div>
						</div>`;
    cell3.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
							<div class="d-flex justify-content-around">
								<div class="tab-domain me-2">
									<span><i class="fa fa-globe" aria-hidden="true"></i></span>
									<label>Select Activity</label>
								</div>

								<select name="subservice_id[]" class="service_subservice_id form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
									id="subservice_id" >
									<option value="" selected=""> Select Activity</option>

								</select>

							</div>
						</div>`;
    cell4.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
                            <div class="d-flex justify-content-around">
                                <div class="tab-domain me-2">
                                    <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                                    <label for="">Activity Type</label>
                                </div>
                                <select name="activity_type[]" class="activity_type form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5">
									<option value="" selected=""> Activity Type</option>
									<option value="on_site"> On-Site </option>
									<option value="off_site"> Off-Site </option>
								</select>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>`;
    cell5.innerHTML = '<div class="abc position-relative col-1ine1 d-flex align-items-center pe-0"> <div class="d-flex justify-content-around"> <div class="tab-domain me-2"> <span><i class="fa fa-globe" aria-hidden="true"></i></span> <label for="">Domain</label> </div> <input type="text" class="form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="" placeholder="Model/Version" required=""> <div class="valid-feedback">Looks good!</div> </div> </div>';
    cell6.innerHTML = `<div class="position-relative col-1ine1 d-flex align-items-center pe-0">
                            <div class="d-flex justify-content-around">
                                <div class="tab-domain me-2">
                                    <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                                    <label for="">Qty</label>
                                </div>
                                <input type="number" class="service_quantity form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"  placeholder="Qty" required="" style="width:60px;">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                       </div>`;
    cell7.innerHTML = '<div class="d-flex w-160 justify-content-end"><button class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button><input type="button" class="delete_button btn btn-primary border-1 border-danger w-auto rounded-pill px-3 fs-14 bg-danger mx-1" value="Delete"><button class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button> </div>';

};

$(".show-my-estimate1").click(function(){
  $(".box-type-estimate4").toggle();
});






		/** get service list from here */
        $(document).on('change', '.subcategory_choose', function() {
			let subcategory_id = $(this).val();
            let row = $(this).closest('tr');
            row.find('.choose_service').empty();
            row.find('.choose_service').append('<option value="" selected disabled>Select Service</option>');
			// console.log(subcategory_id);
			// console.log('subcategory onchange');
			$.ajax({
                url: "{{ url('get-service-list') }}",
                 type: "POST",
                 data: {
                     subcategory_id: subcategory_id,
                     _token: '{{ csrf_token() }}'
                 },
                 dataType: 'json',
                 success: function(result) {
					// console.log(result);
				    $.each(result.subcategories, function(key, value) {
                        // $(this).closest('tr').find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');
                        row.find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
               },
               error: function(jqXHR, textStatus, errorThrown) {
                    console.log('AJAX Error:', textStatus, errorThrown);
                }
             });
        });

		/** get sub service list from here */

        $(document).on('change', '.choose_service', function() {
			let service_id = $(this).val();
            let row = $(this).closest('tr');
            row.find('.service_subservice_id ').empty();
            row.find('.service_subservice_id ').append('<option value="" selected disabled>Select Sub Service</option>');
			// console.log(subcategory_id);
			// console.log('subcategory onchange');
			$.ajax({
                url: "{{ url('get-subservice-list') }}",
                 type: "POST",
                 data: {
                    service_id: service_id,
                     _token: '{{ csrf_token() }}'
                 },
                 dataType: 'json',
                 success: function(result) {
					// console.log(result);
				    $.each(result.subcategories, function(key, value) {
                        // $(this).closest('tr').find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');
                        row.find('.service_subservice_id ').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
               },
               error: function(jqXHR, textStatus, errorThrown) {
                    console.log('AJAX Error:', textStatus, errorThrown);
                }
             });
        });


        /*$('#service_id').on('change', function() {
            var service_id = this.value;
            $.ajax({
                url: "{{ url('get-subservice-list') }}",
                type: "POST",
                data: {
                    service_id: service_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#subservice_id').html('<option value="">Select Service</option>');
                    $.each(result.subcategories, function(key, value) {
                        $("#subservice_id").append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                    });
                }
            });
        });
        */

        /* Store service data in session */

        $(document).on('change', '.service_quantity', function() {

            let row = $(this).closest('tr');

            let service_subcategory = row.find('.service_subcategory').val();
            let choose_service = row.find('.choose_service').val();
            let service_subservice_id = row.find('.service_subservice_id').val();
            // let 'subcategory : '+activity_type = row.find('.activity_type').val();
            let service_model = row.find('.service_model').val();
            let service_quantity = row.find('.service_quantity').val();
            let activity_type = row.find('.activity_type').val();

            // console.log(service_subcategory);

            console.log('subcategory : '+service_subcategory);
            console.log('service : '+choose_service);
            console.log('sub service : '+service_subservice_id);
            console.log('activity type : '+activity_type);
            console.log('model : '+service_model);
            console.log('quantity : '+service_quantity);


			$.ajax({
                url: "{{ url('store-service-categories') }}",
                 type: "POST",
                 data: {
                    subcategory_id: service_subcategory,
                    service_id: choose_service,
                    subservice_id: service_subservice_id,
                    activity_type: activity_type,
                    model: service_model,
                    qty: service_quantity,
                     _token: '{{ csrf_token() }}'
                 },
                 dataType: 'json',
                 success: function(result) {
					// console.log(result);
				    $.each(result.subcategories, function(key, value) {
                        // $(this).closest('tr').find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');
                        row.find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
               },
               error: function(jqXHR, textStatus, errorThrown) {
                    console.log('AJAX Error:', textStatus, errorThrown);
                }
             });

        });



    </script>
@endsection

