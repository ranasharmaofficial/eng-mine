@php
$header_logo = get_business_single_cache_value('header_logo', 'header_setup', 'header_logo');
  $social_medias = get_business_multiple_cache_value('social_medias', 'social_media');
  $corporate_address = get_business_single_cache_value('corporate_address', 'footer_setup', 'corporate_address');

  $contact_working_hr = get_business_single_cache_value('contact_working_hr', 'footer_setup', 'contact_working_hr');
  $contact_email = get_business_single_cache_value('contact_email', 'footer_setup', 'contact_email');
  $contact_phone = get_business_single_cache_value('contact_phone', 'footer_setup', 'contact_phone');
  $contact_address = get_business_single_cache_value('contact_address', 'footer_setup', 'contact_address');

  $header_phone = get_business_single_cache_value('header_phone', 'header_setup', 'header_phone');
  $header_email = get_business_single_cache_value('header_email', 'header_setup', 'header_email');

  $header_whatsapp = get_business_single_cache_value('whatsapp', 'header_setup', 'whatsapp');
  $header_skype = get_business_single_cache_value('skype', 'header_setup', 'skype');
  $header_address = get_business_single_cache_value('header_address', 'header_setup', 'header_address');
  $header_website = get_business_single_cache_value('header_website', 'header_setup', 'header_website');
  $header_hr = get_business_single_cache_value('header_hr', 'header_setup', 'header_hr');

  @endphp



<nav class="navbar nav1 fixed-top navbar-expand-lg py-3">
  <div class="container">
    <!-- <a class="navbar-brand" id="front_logo" href="#"><img src="assests/img/header-logo.png"
        class="logo img-fluid"></a> -->
    <a class="navbar-brand" href="{{ url('') }}">
      <img src="{{ static_asset($header_logo) }}" height="45px" width="100%">
    </a>
    <button class="navbar-toggler bg-light1" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse w-100 px-2" id="navbarSupportedContent">
      <ul class="navbar-nav justify-content-evenly w-100">
        <li class="nav-item">
          <a class="nav-link text-white2" aria-current="page" href="{{ url('') }}">HOME</a>
          <!-- <a class="nav-link text-light fw-semibold fs-14 active" aria-current="page" href="#">Home</a> -->
        </li>
        <li class="nav-item">
          <a class="nav-link text-white2" aria-current="page" href="{{route('about')}}">ABOUT US</a>
          <!-- <a class="nav-link text-light fw-semibold fs-14" href="#">About Us</a> -->
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-white2" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            SERVICES <i class="fa fa-angle-down" aria-hidden="true"></i>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('service') }}"><i class="fa fa-sitemap me-2 fa-lg" aria-hidden="true"></i>SERVICE ALL</a></li>
            <li><a class="dropdown-item" href="{{ route('hire_onsite') }}"><i class="fa fa-wrench me-2 fa-lg" aria-hidden="true"></i>Hire Onsite L1 Engineer</a></li>
            <li><a class="dropdown-item" href="{{ route('installation_configuration') }}"><i class="fa fa-cogs me-2 fa-lg" aria-hidden="true"></i>Installation & Configuration</a></li>
            <li><a class="dropdown-item" href="{{ route('upgrade_migration') }}"><i class="fa fa-upload me-2 fa-lg" aria-hidden="true"></i>Upgrade & Migration</a></li>
          </ul>
          <!-- <a class="nav-link text-light fw-semibold fs-14 dropdown-toggle" href="#" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item fs-14" href="#">Action</a></li>
            <li><a class="dropdown-item fs-14" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item fs-14" href="#">Something else here</a></li>
          </ul> -->
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link text-white2" aria-current="page" href="pricing.php">SUBSCRIPTION PLAN</a>
            <!-- <a class="nav-link text-light fw-semibold fs-14" href="#">Subscription Plan</a> -->
        </li> --}}
     
        <li class="nav-item">
          <a class="nav-link text-white2" aria-current="page" href="{{route('contact')}}">CONTACT</a>
            <!-- <a class="nav-link text-light fw-semibold fs-14" href="#">Contact</a> -->
        </li>
        <li class="nav-item me-1">
          <a class="btn btn-outline-white rounded-pill fs-14 text-white ragister-user" href="{{ url('register') }}" type="submit"><i
              class="bi bi-person-plus pe-1 fa-xs my-auto"></i><span> Register as Professional</span></a>
          <!-- <a class="btn btn-outline-white me-2 rounded-pill py-2 px-2 fs-14  text-white ragister-user" href="engineer-signup.php">
            <i class="bi bi-person-plus pe-2 px-3 "></i> REGISTER AS PROFESSIONAL -->
          </a>
        </li>
		@if(Session::has('LoggedCustomer'))
			<li class="nav-item me-1 loginpad">
			  <a class="btn btn-outline-white btn-primary rounded-pill fs-14 align-items-center text-white ragister-user" href="{{ url('customer/customer-dashboard') }}"><i
				  class="fa fa-sign-in pe-1 fa-xs my-auto" aria-hidden="true"></i><span>My Account</span></a>
			  <!-- <a class="btn btn-outline-white rounded-pill py-2 px-2  fs-14 text-white ragister-user" href="login.php">
				<i class="fa fa-sign-in pe-2" aria-hidden="true"></i> LOGIN
			  </a> -->
			</li>
		@else
			 <li class="nav-item me-1 loginpad">
			  <a class="btn btn-outline-white btn-primary rounded-pill fs-14 align-items-center text-white ragister-user" href="{{ url('login') }}"><i
				  class="fa fa-sign-in pe-1 fa-xs my-auto" aria-hidden="true"></i><span>Login</span></a>
			  <!-- <a class="btn btn-outline-white rounded-pill py-2 px-2  fs-14 text-white ragister-user" href="login.php">
				<i class="fa fa-sign-in pe-2" aria-hidden="true"></i> LOGIN
			  </a> -->
			</li>

		@endif
      </ul>
    </div>
  </div>
</nav>


  @if(false)
  <header class="position-absolute top-0 left-0 w-100 z-index-999 bg-dark-transparent">
         <nav class="border-bottom border-muted-light py-2 d-none d-md-none d-lg-block">
            <div class="container  ">
               <div class="d-flex flex-wrap align-items-center justify-content-between top-line row">
                  <ul class="list-group list-group-horizontal p-0 bg-transparent col-md-7 pe-0">
                     @if($header_email!=null)
					 <li class="list-group-item p-0 bg-transparent fs-13 d-flex align-items-center">
                        <span class="material-symbols-outlined _icon-fs align-middle lh-base text-muted-light me-1">
                        <i class="bi bi-envelope text-sky fs-15"></i>
                        </span>
                        <a href="mailto:{{$header_email}}" class="text-decoration-none _link-fs text-muted-light">
						{{ $header_email }}
                        </a>
                     </li>
					 @endif
					 @if($header_phone!=null)
					 <li class="list-group-item p-0 bg-transparent fs-13 d-flex align-items-center">
                        <span class="material-symbols-outlined _icon-fs align-middle lh-base text-muted-light me-1">
                        <i class="bi bi-phone text-sky fs-15"></i>
                        </span>
                        <a href="tel:{{$header_phone}}" class="text-decoration-none _link-fs text-muted-light">
                        {{$header_phone}}
                        </a>
                     </li>
					 @endif

                     <!--<li class="list-group-item  p-0 bg-transparent d-flex align-items-center ms-lg-1 ms-xl-3 ms-md-1 fs-13">
                        <span class="material-symbols-outlined _icon-fs align-middle lh-base text-muted-light ">
                        <i class="bi bi-geo-alt text-sky fs-15"></i>
                        </span>
                        <a href="javascript:void();" class="text-decoration-none _link-fs text-muted-light " title="{{ $corporate_address }}"  >
							{{ $corporate_address }}
                        </a>
                     </li>-->
                  </ul>
                  <div class="d-flex align-items-center col-md-5 justify-content-end">
                     <ul class="list-group list-group-horizontal p-0 bg-transparent">
                    @if(!empty($social_medias))

                        @foreach($social_medias as $media)
                           @if($media->value!=null)
                              <li class="list-group-item mx-1 p-0 bg-transparent"><a target="_blank" href="{{$media->value}}" class="nav-link link-dark px-2 py-1  fs-13 lsp-5 rounded-3 text-center bg-{{$media->field_name}}  "><i class="fab fa fa-{{$media->field_name}} text-white"></i> </a></li>
                           @endif
                        @endforeach


                    @endif
                     </ul>
                     <ul class="list-group list-group-horizontal  p-0 bg-transparent d-flex flex-wrap align-items-center ms-2">
                        <li class="list-group-item p-0 bg-transparent d-inline-block fs-13 ">
                           <a href="{{ url('get-quote') }}" class="btn border border-muted  text-white bg-transparent fs-13 lsp-5  py-1 w-110"> Get A Quote</a>
                        </li>
                        <li class="list-group-item p-0 bg-transparent d-inline-block fs-13 px-1">
                           <a href="{{ url('schedule-meeting') }}" class="btn bg-skype text-white fs-13 lsp-5  py-1 px-1"> Schedule Meeting</a>
                        </li>
                        <li class="list-group-item p-0 bg-transparent nav-item dropdown dropdown-hover position-relative  ">
                           <a class="nav-link dropdown-toggle  text-white position-relative px-2 py-0 fs-13 lsp-5" href="javascript:void();" id="dropdownMenuButton1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <img src="{{ static_asset('assets/assets_web/img/header-new-icondetal.webp')}}" alt="" class="w-30px h-30px">
                           </a>
                           <!-- Dropdown menu -->
                           <div class="dropdown-menu pb-0 mt-0 w-100 pt-0 rounded bg-white end--30px top-30px mt-0 z-index-999 subdropdown12" aria-labelledby="dropdownMenuButton1">
                              <div class="contact-widget px-2">
                                 <h4 class="fs-16 fw-bold mb-3 mt-3 text-black">Cloud Ware Contact  </h4>
                                 <hr class="border-black bg-black">
                                 <h6 class="text-black fs-14 lsp-5">For Sales Inquiry</h6>
                                 <ul class="p-0 m-0 list-items-group navbar-nav d-block">
                                    <li class="sub-menu-list-hover1 mb-1 d-flex align-items-start "><i class="bi bi-whatsapp text-sky pt-0 pe-3"></i> <span class="text-black"> {{ $header_whatsapp }}</span></li>
                                    <li class="sub-menu-list-hover1 mb-1 d-flex align-items-start "><i class="bi bi-phone text-sky pt-0 pe-3"></i> <span class="text-black"> {{ $header_phone }} </span></li>
                                    <li class="sub-menu-list-hover1 mb-1 d-flex align-items-start "><i class="bi bi-envelope text-sky pt-0 pe-3"></i> <span class="text-black"> {{ $header_email  }}</span></li>
                                    <li class="sub-menu-list-hover1 mb-1 d-flex align-items-start "><i class="bi bi-skype text-sky pt-0 pe-3"></i> <span class="text-black"> {{ $header_skype }} </span></li>
                                 </ul>
                                 <p class="mb-0 text-black fs-13 lsp-5">(If we don’t pick up, drop inquiry.)</p>
                                 <hr class="border-black bg-black">
                                 <h6 class="text-black fs-14 lsp-5">For HR Inquiry</h6>
                                 <ul class="p-0 m-0 list-items-group navbar-nav d-block">
                                    <li class="sub-menu-list-hover1 mb-1 d-flex align-items-start "><i class="bi bi-phone text-sky pt-0 pe-3"></i> <span class="text-black"> {{ $header_hr }}</span></li>
                                 </ul>
                                 <p class="mb-0 text-black fs-13 lsp-5">(If we don’t pick up, drop inquiry.)</p>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </nav>
         <div class="sticky-top top-0 start-0">
            <nav class="navbar navbar-expand-lg navbar-light">
               <div class="container   position-relative">
                  <a class="navbar-brand" href="{{ url('') }}">  <img src="{{ static_asset($header_logo)}}" class="w-150" alt="" /></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse align-items-center" id="navbarSupportedContent1">
                     <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                           <a class="nav-link active text-muted-light px-3   py-xl-4  py-lg-4  py-2 fs-13 fw-bold lsp-5" aria-current="page" href="{{ url('') }}"><i class="bi   bi-house-door-fill"></i></a>
                        </li>
                        <li class="nav-item dropdown dropdown-hover position-static">
                           <a class="nav-link dropdown-toggle position-relative text-muted-light  px-2 px-lg-4 py-xl-4 px-md-2 py-lg-4  py-2 fs-13 lsp-5" href="#" id="navbarDropdown010" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                              Products
                              <div class="menu-triangle d-none position-absolute end-0 bottom-0"></div>
                           </a>
                           <div class="dropdown-menu pt-0 pb-0 mt-0 overflow-hidden w-90 rounded border-bottom-0 bg-white mt-0   start-10" aria-labelledby="navbarDropdown010">
                              <div class="submenu submenu3 d-flex">
                                 <div class="menuright menuright3 w-70 p-3">
                                    <ul class="p-0">

									@if(count(master_product_list())>0)
										@foreach(master_product_list() as $val)
											@php
												$sub_product_list = \App\Models\MasterProduct::orderBy('order_no', 'ASC')->where('parent_id', $val->id)->where('status', 1)->get();
												//dd($sub_product_list);
											@endphp
										   <li class="float-start align-items-center w-33  pt-0 pb-0 mb-2">
												@if($val->slug!=null)
													<a class="text-decoration-none d-block  fs-13 lsp-5 py-0 text-black2 text-capitalize px-1" href="{{ route('productDetail.slug', $val->slug) }}">
														<p class="mb-0 fs-13 lsp-5 "><strong class="fw-bold lsp-5  fs-14 text-black">  {!! $val->other_icon !!} {{ $val->title }} </strong></p>
													</a>
											  @else
												<a class="text-decoration-none d-block  fs-13 lsp-5 py-0 text-black2 text-capitalize px-1" href="">
													<p class="mb-0 fs-13 lsp-5 "><strong class="fw-bold lsp-5  fs-14 text-black">  {!! $val->other_icon !!} {{ $val->title }} </strong></p>
												</a>
											  @endif
											  <ul class=" dropdown-menu d-block mt-2 w-100 position-relative h-120 border-0 px-0-mx-0 rounded-0 py-0 overflow-y scrollbar-width" aria-labelledby="navbarDropdownMenuLink01">
												 @if(count($sub_product_list)>0)
													@foreach($sub_product_list as $val)
														@if($val->slug!=null)
														 <li class="sub-menu-list-hover1 ">
															<a href="{{ route('productDetail.slug', $val->slug) }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
															<img src="{{ static_asset($val->icon)}}" class="  w-20px pt-0">&nbsp; {{ $val->title }}  </a>
														 </li>
														 @else
															 <li class="sub-menu-list-hover1 ">
															<a href="" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
															<img src="{{ static_asset($val->icon)}}" class="  w-20px pt-0">&nbsp; {{ $val->title }}  </a>
														 </li>
														 @endif
													@endforeach
												 @endif


											  </ul>
										   </li>
										@endforeach
									@endif


                                    </ul>
                                 </div>
                                 <div class="menuleft menuleft3 w-30 p-4 bg-light text-center">
                                    <h6 class="pb-0 fs-5 fw-bold lsp-5 text-dark text-capitalize text-center">Hire <span class="text-sky   fs-5 ">Remote Team</span></h6>
                                    <p class="lsp-5 text-muted">Hire our dedicated team who will prove to be the biggest sources to help your businesses with cost-effective method.</p>
                                    <img class="lazyloaded " src="{{ static_asset('assets/assets_web/img/service-banner-1.png')}}" data-src="{{ static_asset('assets/assets_web/img/service-banner-1.png')}}" alt="Team Photos">
                                    <a class="btn bg-sky mt-3 fs-13 border border-white w-120  mx-auto px-3 text-center justify-content-center h-35px d-flex  lsp-5 text-white" href="{{URL::to('hire-team')}}">Hire Team</a>
                                 </div>
                              </div>
                           </div>
                        </li>

                        <li class="nav-item dropdown dropdown-hover position-position">
                           <a class="nav-link dropdown-toggle  text-white position-relative text-muted-light px-2  py-xl-4  py-lg-4  py-2 fs-13 lsp-5" href="javascript:void();" id="navbarDropdown010" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                              Services
                              <div class="menu-triangle d-none position-absolute end-0 bottom-0"></div>
                           </a>
                           <!-- Dropdown menu -->
                           <div class="dropdown-menu pb-0 mt-0 w-100 pt-0 rounded bg-white start-0 mt-0  subdropdown12" aria-labelledby="navbarDropdown010">
                              <div class="submenu submenu3 d-flow-root pb-0 pt-0">
                                 <ul class="navbar-nav industries-ancker d-flow-root overflow-y scrollbar-width position-relative d-flow-root">
                                    @if(count(master_service_list())>0)
										@foreach(master_service_list() as $val)
										<li class="sub-menu-list-hover1">
										   <a href="{{ route('serviceDetails.slug', $val->slug) }}" class="text-decoration-none  d-flex align-items-center dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
										   <img src="{{ static_asset($val->icon)}}" class="2 w-20px pt-0">&nbsp;   {{ $val->title }}</a>
										</li>
										@endforeach
									@endif

                                 </ul>
                              </div>
                           </div>
                        </li>
						    <li class="nav-item dropdown dropdown-hover position-position">
                           <a class="nav-link dropdown-toggle  text-white position-relative px-2  py-xl-4  py-lg-4  py-2 fs-13 lsp-5" href="javascript:void();" id="dropdownMenuButton1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Solutions
                              <div class="menu-triangle d-none position-absolute end-0 bottom-0"></div>
                           </a>
                           <!-- Dropdown menu -->
                           <div class="dropdown-menu pb-0 mt-0 w-100 pt-0 rounded bg-white start-0 mt-0  subdropdown12" aria-labelledby="dropdownMenuButton1">
                              <ul class="navbar-nav industries-ancker d-block   overflow-y scrollbar-width position-relative d-flow-root ">
                                @if(count(master_solution_list())>0)
									@foreach(master_solution_list() as $val)
                                        <li class="sub-menu-list-hover1 ">
                                            <a href="{{ route('solution.slug', $val->page_url) }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                            <img src="{{ static_asset($val->icon)}}" class="2 w-20px pt-0">&nbsp; {{ $val->title }} </a>
                                        </li>
                                     @endforeach
                                @endif

                              </ul>
                           </div>
                        </li>
                        <li class="nav-item   dropdown-hover position-position">
                           <a class="nav-link  text-white position-relative px-2  py-xl-4  py-lg-4  py-2 fs-13 lsp-5" href="{{URL::to('prices')}}">
                              Pricing
                           </a>
                        </li>


						 <li class="nav-item dropdown dropdown-hover position-position">
                           <a class="nav-link dropdown-toggle  text-white position-relative px-2  py-xl-4  py-lg-4  py-2 fs-13 lsp-5" href="javascript:void();" id="dropdownMenuButton1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Company
                              <div class="menu-triangle d-none position-absolute end-0 bottom-0"></div>
                           </a>
                           <!-- Dropdown menu -->
                           <div class="dropdown-menu pb-0 mt-0 w-100 pt-0 rounded bg-white start-0 mt-0  subdropdown12" aria-labelledby="dropdownMenuButton1">
                              <ul class="navbar-nav industries-ancker d-block   overflow-y scrollbar-width position-relative d-flow-root ">
                                 <li class="sub-menu-list-hover1 ">
                                    <a href="{{ url('about') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                    <img src="{{ static_asset('assets/assets_web/img/High-Performance-Solutions.png')}}" class="2 w-20px pt-0">&nbsp; About Company</a>
                                 </li>
                                {{-- <li class="sub-menu-list-hover1 ">
                                    <a href="{{ url('clients') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                    <img src="{{ static_asset('assets/assets_web/img/High-ailability-solutions.png')}}" class="2 w-20px pt-0">&nbsp; Clients & Partners </a>
                                 </li>--}}

                                 <li class="sub-menu-list-hover1 ">
                                    <a href="{{ url('awards') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                    <img src="{{ static_asset('assets/assets_web/img/Reseller-Hosting.png')}}" class="2 w-20px pt-0">&nbsp; Awards & Certifications</a>
                                 </li>
                                 <li class="sub-menu-list-hover1 ">
                                    <a href="{{ url('contact-us') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                    <img src="{{ static_asset('assets/assets_web/img/PCI-Compliance.png')}}" class="2 w-20px pt-0">&nbsp; Contact Us </a>
                                 </li>
                                 <li class="sub-menu-list-hover1 ">
                                    <a href="profile" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                    <img src="{{ static_asset('assets/assets_web/img/PCI-Compliance.png')}}" class="2 w-20px pt-0">&nbsp; Company Profle </a>
                                 </li>
                              </ul>
                           </div>
                        </li>
                        <li class="nav-item dropdown dropdown-hover position-position">
                           <a class="nav-link dropdown-toggle  text-white position-relative px-2  py-xl-4  py-lg-4  py-2 fs-13 lsp-5" href="javascript:void();" id="dropdownMenuButton1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Insights
                              <div class="menu-triangle d-none position-absolute end-0 bottom-0"></div>
                           </a>
                           <div class="dropdown-menu pb-0 mt-0 w-100 pt-0 rounded bg-white start-0 mt-0  subdropdown12" aria-labelledby="dropdownMenuButton1">
                              <ul class="navbar-nav industries-ancker d-block   overflow-y scrollbar-width position-relative d-flow-root ">

                                @if(count(master_industry_page())>0)
									@foreach(master_industry_page() as $val)
                                        @if($val->page_url!=null)
                                        <li class="sub-menu-list-hover1 ">
                                            <a href="{{ route('industry.slug', $val->page_url) }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                            <img src="{{ static_asset('assets/assets_web/img/Industry-Best-Support.png')}}" class="2 w-20px pt-0">&nbsp; {{ $val->title }}   </a>
                                        </li>
                                         @else
                                        <li class="sub-menu-list-hover1 ">
                                            <a href="" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                            <img src="{{ static_asset('assets/assets_web/img/Industry-Best-Support.png')}}" class="2 w-20px pt-0">&nbsp; {{ $val->title }}   </a>
                                        </li>
                                        @endif
                                    @endforeach
                                @endif
                                 <li class="sub-menu-list-hover1 ">
                                    <a href="{{ url('case-study') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                    <img src="{{ static_asset('assets/assets_web/img/white-glove-migrations.png')}}" class="2 w-20px pt-0">&nbsp; Case Study  </a>
                                 </li>
                                 <li class="sub-menu-list-hover1 ">
                                    <a href="{{ url('news') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                    <img src="{{ static_asset('assets/assets_web/img/global-data-centers.png')}}" class="2 w-20px pt-0">&nbsp; News   </a>
                                 </li>
                                 <li class="sub-menu-list-hover1 ">
                                    <a href="{{ url('testimonial') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                    <img src="{{ static_asset('assets/assets_web/img/our-brands.png')}}" class="2 w-20px pt-0">&nbsp;  Testimonial</a>
                                 </li>
                                 <li class="sub-menu-list-hover1 ">
                                    <a href="{{ url('blogs') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                    <img src="{{ static_asset('assets/assets_web/img/our-brands.png')}}" class="2 w-20px pt-0">&nbsp;  Blog</a>
                                 </li>
                                 <li class="sub-menu-list-hover1 ">
                                    <a href="{{URL::to('faqs')}}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                    <img src="{{ static_asset('assets/assets_web/img/our-brands.png')}}" class="2 w-20px pt-0">&nbsp;  Faq</a>
                                 </li>
                                 <li class="sub-menu-list-hover1 ">
                                    <a href="{{ url('our-team') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                    <img src="{{ static_asset('assets/assets_web/img/our-brands.png')}}" class="2 w-20px pt-0">&nbsp;  Team</a>
                                 </li>
                              </ul>
                           </div>
                        </li>
                        <li class="nav-item dropdown dropdown-hover position-position">
                           <a class="nav-link dropdown-toggle  text-white position-relative px-2  py-xl-4  py-lg-4  py-2 fs-13 lsp-5" href="javascript:void();" id="dropdownMenuButton1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Partner & Business
                              <div class="menu-triangle d-none position-absolute end-0 bottom-0"></div>
                           </a>
                           <!-- Dropdown menu -->
                           <div class="dropdown-menu pb-0 mt-0 w-100 pt-0 rounded bg-white start-0 mt-0  subdropdown12" aria-labelledby="dropdownMenuButton1">
                              <ul class="navbar-nav industries-ancker d-block   overflow-y scrollbar-width position-relative d-flow-root ">
                                @if(count(master_partner_list())>0)
									@foreach(master_partner_list() as $val)
                                        <li class="sub-menu-list-hover1 ">
                                            <a href="{{ route('partnerDetails.slug', $val->slug) }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                                            <img src="{{ static_asset($val->icon)}}" class="2 w-20px pt-0">&nbsp; {{ $val->title }}</a>
                                        </li>
                                    @endforeach
                                 @endif

                              </ul>
                           </div>
                        </li>
                        <!--<li class="nav-item"><a href="#" class="nav-link text-white link-dark px-3 py-4 fs-13 lsp-5">Contact us</a></li>-->
                     </ul>
                     <div class="right-menu  d-md-none d-none d-lg-block">
                        <ul class="d-flex align-items-center list-style-none mb-0  px-0 mx-0 ">
                           {{-- <li class="flot-right getquote mx-3 position-relative h-40px bg-sky rounded-circle w-40px">
                              <div id="sb-search" class="transition sb-search position-absolute end-0 h-40px overflow-hidden rounded-pill bg-white  w-40px top-0">
                                 <form class="d-flex align-items-center justify-content-between position-relative">
                                    <input class="sb-search-input bg-sky fs-13 lsp-5 border-0 rounded-pill w-100 h-40px ps-3 pe-5" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
                                    <button class="sb-search-submit   w-40px h-40px lh-40px border-0 position-absolute top-0 end-0 bg-white rounded-circle text-white d-flex align-items-center justify-content-center" type="submit" value=""> <i class="fas fa-search  text-skype"></i></button>
                                    <button class="sb-search-submit1 w-40px h-40px lh-40px border-0 position-absolute top-0 end-0 bg-white rounded-circle text-white d-flex align-items-center justify-content-center" type="button" value=""> <i class="fas fa-search text-sky"></i></button>
                                 </form>
                              </div>
                           </li> --}}
                           <li class="border-zero flot-right">
                              <a href="javascript:void();" id="imgrotate" class="imgrotate menubar-button"><img src="{{ static_asset('assets/assets_web/img/services-arrow2.png')}}" alt="" class=" w-30px h-30px"></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class=" bg-dark overflow-y scrollbar-width position-fixed megamenu imgrotate transition">
                  <div class="pb-0 mt-0 w-100 pt-0 right-0 mt-0 ">
                     <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fs-16 text-light fw-bold mb-0">Quick Link</h5>
                        <i class="bi bi-x-circle-fill fs-30 lh-base text-sky crossbutton"></i>
                     </div>
                     <ul class="navbar-nav industries-ancker d-block position-relative d-flow-root">
                        <li class="sub-menu-list-hover1 ">
                           <a href="{{ url('about') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                           <img src="{{ static_asset('assets/assets_web/img/about.png')}}" class="2 w-20px pt-0">&nbsp; About Us</a>
                        </li>
                        <li class="sub-menu-list-hover1 ">
                           <a href="{{ url('contact-us') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                           <img src="{{ static_asset('assets/assets_web/img/phone-contact.png')}}" class="2 w-20px pt-0">&nbsp; Contact Us</a>
                        </li>
                        <li class="sub-menu-list-hover1 ">
                           <a href="{{ url('blogs') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                           <img src="{{ static_asset('assets/assets_web/img/blog.png')}}" class="2 w-20px pt-0">&nbsp; Blog</a>
                        </li>
                        <li class="sub-menu-list-hover1 ">
                           <a href="{{ url('news') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                           <img src="{{ static_asset('assets/assets_web/img/news.png')}}" class="2 w-20px pt-0">&nbsp; News</a>
                        </li>
                        <li class="sub-menu-list-hover1 ">
                           <a href="{{ url('testimonial') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                           <img src="{{ static_asset('assets/assets_web/img/testimonials2.png')}}" class="2 w-20px pt-0">&nbsp; Testimonials</a>
                        </li>
                        @if(false)
                            <li class="sub-menu-list-hover1 ">
                               <a href="{{URL::to('faqs')}}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                               <img src="{{ static_asset('assets/assets_web/img/faq.png')}}" class="2 w-20px pt-0">&nbsp; Faq</a>
                            </li>
                        @endif
                        <li class="sub-menu-list-hover1 ">
                           <a href="{{URL::to('our-team')}}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                           <img src="{{ static_asset('assets/assets_web/img/team.png')}}" class="2 w-20px pt-0">&nbsp; Team</a>
                        </li>
                        <li class="sub-menu-list-hover1 ">
                           <a href="{{ url('career') }}" class="text-decoration-none dropdown-item fs-13 lsp-5 text-black2 text-capitalize px-1">
                           <img src="{{ static_asset('assets/assets_web/img/career.png')}}" class="2 w-20px pt-0">&nbsp; Career</a>
                        </li>
                     </ul>
                     <div class="contact-widget">
                        <h4 class="fs-16 fw-bold mb-3 mt-3 text-light">Contact Us</h4>
                        <ul class="p-0 m-0 list-items-group navbar-nav d-block">
                           <li class="sub-menu-list-hover1 mb-1 d-flex align-items-start "><i class="bi bi-pin-map text-sky pt-0 pe-3"></i> <span class="text-muted"> {{ $header_address }}</span></li>
                           <li class="sub-menu-list-hover1 mb-1 d-flex align-items-start "><i class="bi bi-phone text-sky pt-0 pe-3"></i> <span class="text-muted"> {{ $header_phone }}</span></li>
                           <li class="sub-menu-list-hover1 mb-1 d-flex align-items-start "><i class="bi bi-envelope text-sky pt-0 pe-3"></i> <span class="text-muted"> {{ $header_email }}</span></li>
                           <li class="sub-menu-list-hover1 mb-1 d-flex align-items-start "><i class="fa fa-globe text-sky pt-1 pe-3"></i> <span class="text-muted"> {{ $header_website }}</span></li>
                        </ul>
                     </div>
                     <div class="contact-widget">
                        <h4 class="fs-16 fw-bold mb-3 mt-3 text-light">Social Media</h4>
                        <ul class="nav">
						@if(!empty($social_medias))
							@foreach($social_medias as $media)
								@if($media->value!=null)
									<li class="nav-item me-2"><a href="{{$media->value}}" class="nav-link link-dark px-2 py-1  fs-13 lsp-5 rounded-3 text-center bg-{{$media->field_name}}  "><i class="fab fa fa-{{$media->field_name}} text-white"></i> </a></li>
								@endif
							@endforeach
						@endif
                        </ul>
                     </div>
                  </div>
               </div>
            </nav>
         </div>
      </header>

	  @endif
