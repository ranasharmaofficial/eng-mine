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
         <li>
            <a target="_blank" href="javascript:void(0)" class="  d-block">
               <i class="fa fa-instagram text-white bg-icon bg-instagram my-3" aria-hidden="true"></i>
            </a>
         </li>
         <li>
            <a target="_blank" href="javascript:void(0)" class="  d-block">
               <i class="fa fa-facebook text-white  bg-icon bg-facebook my-3" aria-hidden="true"></i>
            </a>
         </li>
         <li>
            <a target="_blank" href="javascript:void(0)" class="  d-block">
               <i class="fa fa-linkedin text-white bg-linkedin bg-icon my-3" aria-hidden="true"></i>
            </a>
         </li>
         <li>
            <a target="_blank" href="javascript:void(0)" class="  d-block">
               <i class="fa fa-twitter text-white bg-icon bg-twitter my-3" aria-hidden="true"></i>
            </a>
         </li>
         <li>
            <a target="_blank" href="javascript:void(0)" class="  d-block">
               <i class="fa fa-whatsapp text-white bg-icon bg-whatsapp my-3" aria-hidden="true"></i>
            </a>
         </li>
      </ul>

    <!-- Banner Image section start -->
    <ul class="list-unstyled banner-icons position-absolute ps-5" style="top:13rem; margin-left:5rem; z-index: 100;">
        <li>
            <a target="_blank" href="javascript:void(0)" class="  d-block">
                <i class="fa fa-instagram text-white bg-icon bg-instagram my-3" aria-hidden="true"></i>
            </a>
        </li>
        <li>
            <a target="_blank" href="javascript:void(0)" class="  d-block">
                <i class="fa fa-facebook text-white  bg-icon bg-facebook my-3" aria-hidden="true"></i>
            </a>
        </li>
        <li>
            <a target="_blank" href="javascript:void(0)" class="  d-block">
                <i class="fa fa-linkedin text-white bg-linkedin bg-icon my-3" aria-hidden="true"></i>
            </a>
        </li>
        <li>
            <a target="_blank" href="javascript:void(0)" class="  d-block">
                <i class="fa fa-twitter text-white bg-icon bg-twitter my-3" aria-hidden="true"></i>
            </a>
        </li>
        <li>
            <a target="_blank" href="javascript:void(0)" class="  d-block">
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
                        <div class="col-sm-3 px-0">
                            <div class="input-group">
                                <div class="input-group-text bg-transparent border-0 fs-5">
                                    <i class="fa fa-map-marker fs-5" aria-hidden="true"></i>
                                </div>
                                <select class="form-select form-control bg-transparent border-0 fs-5">
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
                        <div class="col-sm-2 px-0">
                            <input type="text" class="form-control bg-transparent border-0 fs-5" placeholder="Landmark">
                        </div>
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
                        <p class="text-white">Sed ut perspiciatis unde omnis iste natus error</p>
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
            <form method="post" action="{{ route('saveQuoteEnquiry') }}"  class="row">
				@csrf
                <div class="col-md-12">
                    <div class="toggle-tab">
					@if(count($service_categories)>0)
                        <ul class="nav nav-tabs border-0 ms-5 justify-content-center">
                            @foreach($service_categories as $key => $item)
								<li class="nav-item tab-nav-item text-center rounded">
									<a onclick="showPriceQuoteDetails({{ $item->id }})" class="nav-link text-dark @if($key+1==1) active @endif" data-bs-toggle="tab" href="#menu{{$key+1}}">{{ $item->name }}</a>
								</li>
							@endforeach
                            {{--
							<li class="nav-item tab-nav-item text-center rounded">
                                <a class="nav-link text-dark" data-bs-toggle="tab" href="#menu{{$key+1}}">Installation &
                                    Configuration
                                    @ 5000</a>
							</li>
                            <li class="nav-item tab-nav-item text-center rounded">
                                <a class="nav-link text-dark" data-bs-toggle="tab" href="#menu{{$key+1}}">Upgrade & Migration @
                                    7500</a>
                            </li>--}}
                        </ul>
					@endif


                        <!-- Tab panes -->
                        <div id="show-Cost-Table" class="tab-content field py-5 show-service-category-table">


						</div>


                    </div>

                    <!-- Modal Box Start -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div
                                    class="modal-body box-type-estimate box-type-estimate4 bg-white shadow p-4 z-index-999 position-absolute top-100 w-100 rounded-3 start-0 mt-3">
                                    <button type="button" class="btn-close fs-3 bg-transparent ms-auto mt-2 mb-5 d-block text-end"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="row g-3 needs-validation py-2">
                                        <div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center  justify-content-end">
                                                <div class="tab-domain me-2 position-static">
                                                    <span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> First Name</label>
                                                </div>
                                                <input type="text"
                                                    class="form-control px-0 shadow-none ps-2 ps-2 bg-white "
                                                    id="validationCustom01" placeholder="First Name" required="">
                                                <div class="invalid-feedback">
                                                    Please select a valid state.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center justify-content-end">
                                                <div class="tab-domain me-2 position-static">
                                                    <span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> Last Name</label>
                                                </div>
                                                <input type="text"
                                                    class="form-control shadow-none  px-0 ps-2 ps-2 bg-white"
                                                    id="validationCustom01" placeholder="Last Name" required="">
                                                <div class="invalid-feedback">
                                                    Please select a valid state.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center  ">
                                                <div class="tab-domain me-2 position-static">
                                                    <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> Email Id</label>
                                                </div>
                                                <input type="text" class="form-control px-3 shadow-none  bg-white"
                                                    id="validationCustom02" placeholder="Email Id" required="">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center ">
                                                <div class="tab-domain me-2 position-static">
                                                    <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> Phone</label>
                                                </div>
                                                <input type="text"
                                                    class="form-control shadow-none px-3 border border-muted bg-white"
                                                    id="validationCustom03" placeholder="Phone" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
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
                                                <input
                                                    class="form-control shadow-none px-3 border border-muted bg-white py-2"
                                                    type="file" id="formFile" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center ">
                                                <div class="tab-domain me-2            position-static w-auto">
                                                    <span><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> Message</label>
                                                </div>
                                                <textarea class="form-control shadow-none fs-13 lsp-5" placeholder="Please elaborate your requirement"></textarea>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-primary border-0 w-150 float-none d-block vs-btn fs-13 lsp-5  mx-auto rounded bg-danger" type="submit">Send Message </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- \Modal Box End -->
                </form>
            </div>
        </div>
    </section>
    <!--/tab of engineering mind section end-->
    <div class="empty"></div>

    <!--choose-us Section Start-->
    <section class="reason-choose-us">
        <div class="container">
            <div class="section-heading section-heading-six">
                <div class="row align-items-center">
                    <div class="col-md-6 col-12 aos" data-aos="fade-up">
                        <div class="reason-six">
                            <img src="{{ static_asset('assets/assets_web/img/clock.png') }}" alt="clock"
                                style="height: 60px;">
                            <h5>Why Engineer Mine</h5>
                        </div>
                        <h2 class="mb-4">Reasons to <span class="choose-us">Choose Us</span></h2>
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
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="professional-cleaning-main">
                        <img src="{{ static_asset('assets/assets_web/img/clock.png') }}" alt="clock" class="me-2">
                        <h4 class="d-inline">Professional Support 24/7 </h4>
                        <p class="text-secondary mt-4 fs-6">Expert technical support available all day everyday by phone or
                            live chat. <br>&nbsp;</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="professional-cleaning-main">
                        <img src="{{ static_asset('assets/assets_web/img/perform.png') }}" alt="clock"
                            class="me-2">
                        <h4 class="d-inline">Safe and Secured </h4>
                        <p class="text-secondary mt-4 fs-6">Worried you won't get help when you most need it? You shouldn't
                            be. Our professional and hands-on support <br>&nbsp;</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="professional-cleaning-main">
                        <img src="{{ static_asset('assets/assets_web/img/30-day.png') }}" alt="clock" class="me-2">
                        <h4 class="d-inline">30 Day Money Back </h4>
                        <p class="text-secondary mt-4 fs-6">Your money back if you change your mind. No quibble, just
                            simple and fair.<br>&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Choose Us Section End -->

    <!-- About Our Company Section Start -->
    <section class="about-our-company about-company">
        <div class="container">
            <div class="section-heading section-heading-six">
                <div class="row">
                    <div class="col-md-6 col-12 aos" data-aos="fade-up">
                        <div class="reason-six server-photos">
                            <img src="{{ static_asset('assets/assets_web/img/technology.png') }}" alt="tech-img"
                                style="height: 60px;">
                            <h5 class="pb-3">Best server mantinance service</h5>
                        </div>
                        <h2>About <span>Our Company</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-12">
                    <div class="our-company-six">
                        <p>Launched in 2019, Engineers Mine is a B2B platform that offers field engineers and IT
                            infrastructure professionals to customers in India, both off-site and on-site. Customers can
                            book reliable, skilled, certified, competent field engineers and IT specialists and field
                            engineers on an as-need basis..
                        </p>
                        <p>The mission of Engineers Mine is to enable millions of IT specialists and field engineers to
                            provide customers with IT services like never before. The purpose of Engineers Mine is to offer
                            our customers a centralized support system that is frictionless, affordable, results-oriented,
                            and available around the clock. Customers are not required to fill their own roles with highly
                            paid professionals. The customer can use our services whenever it suits their schedule,
                            depending on the time and day they choose.</p>

                    </div>
                    <a href="about-us.php" class="btn btn-pink btn-viewall mb-5">About Us<i
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
                            <img src="{{ static_asset('assets/assets_web/img/about.png') }}" alt="image"
                                class="img-fluid">
                        </div>
                        <div class="our-company-first-content">
                            <div class="company-top-content">
                                <p>Call us Today!</p>
                                <h3>+911244286901</h3>
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

    <!-- Get Satisfied with the services Explore All -->
    <section class="satisfied-service-section">
        <div class="container">
            <div class="section-heading section-heading-six">
                <div class="row align-items-end">
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <div class="reason-six server-photos">
                            <img src="{{ static_asset('assets/assets_web/img/services.png') }}" alt="service-img"
                                style="height: 50px;">
                            <h5>Affordable & reliable</h5>
                        </div>
                        <h2>Get Satisfied with the <span>services</span></h2>
                    </div>
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <a href="service.php" class="afford-btn">Explore All</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="get-service-main">
                        <span>
                            <img src="{{ static_asset('assets/assets_web/img/data.png') }}" alt="data">
                        </span>
                        <div class="get-service-content">
                            <a href="#">
                                <h5 class="mt-4 mb-3">Data Base Services</h5>
                            </a>
                            <p class="fs-6">
                                Enginnermine database services and products offer customers cost-optimized and
                                high-performance versions of Enginnermine Database, the world's leading converged,
                                multi-model database management system, as well as in-memory, NoSQL and MySQL databases.
                            </p>
                            <a href="#" class="fw-bold"> View More <i class="fa fa-angle-right p-1"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                  <div class="get-service-main">
                     <span>
                        <img src="{{ static_asset('assets/assets_web/img/icons/windows.png')}}" alt="data">
                     </span>
                     <div class="get-service-content">
                        <a href="#"><h5 class="mt-4 mb-3">Linux Server Support</h5></a>
                        <p class="fs-6">
                           Facing a DDoS attack, server crash, or want to install an SSL certificate? We can help. On-demand server assistance by Nocinit means our experienced server pros will be at the ready for all upgrades, malware removal, optimization, and other server tasks.
                        </p>
                        <a href="#" class="fw-bold"> View More <i class="fa fa-angle-right p-1" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                  <div class="get-service-main">
                     <span>
                        <img src="{{ static_asset('assets/assets_web/img/icons/windows.png')}}" alt="data">
                     </span>
                     <div class="get-service-content">
                        <a href="#"><h5 class="mt-4 mb-3">Windows Server Support</h5></a>
                        <p class="fs-6">
                           Windows Server 2023 introduces advanced multi-layer security, hybrid capabilities with Azure, and a flexible application platform. As part of this release, we are bringing secured-core capabilities to help protect hardware, firmware, and Windows Server OS capabilities against advanced security threats.
                        </p>
                        <a href="#" class="fw-bold"> View More <i class="fa fa-angle-right p-1" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                  <div class="get-service-main">
                     <span>
                        <img src="{{ static_asset('assets/assets_web/img/icons/security.png')}}" alt="data">
                     </span>
                     <div class="get-service-content">
                        <a href="#"><h5 class="mt-4 mb-3">Network & Security</h5></a>
                        <p class="fs-6">
                           A computer network provides communication and enables the sharing of information to multiple users within a network. Network security technologies work within several layers to protect your network as a whole against any potential threats.
                           Networking and security include three main areas: physical, technical, and administrative.
                        </p>
                        <a href="#" class="fw-bold"> View More <i class="fa fa-angle-right p-1" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                  <div class="get-service-main">
                     <span>
                        <img src="{{ static_asset('assets/assets_web/img/icons/server.png')}}" alt="data">
                     </span>
                     <div class="get-service-content">
                        <a href="#"><h5 class="mt-4 mb-3">Backup Services</h5></a>
                        <p class="fs-6">
                           Some contacts on your phone or tablet may not be saved as Google contacts. For example, some apps save contacts in device storage, which means they can only be managed on that device. Changes you make to these contacts don’t sync across Google services or to other signed-in devices.
                        </p>
                        <a href="#" class="fw-bold"> View More <i class="fa fa-angle-right p-1" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                  <div class="get-service-main">
                     <span>
                        <img src="{{ static_asset('assets/assets_web/img/icons/storage.png')}}" alt="data">
                     </span>
                     <div class="get-service-content">
                        <a href="#"><h5 class="mt-4 mb-3">Storage Services</h5></a>
                        <p class="fs-6">
                           Below is a list of all the best free online storage services I've used. Cloud storage services are great for sharing files with friends and families, keeping documents in sync between all of your devices, and so much more. Free cloud storage is even better!
                        </p>
                        <a href="#" class="fw-bold"> View More <i class="fa fa-angle-right p-1" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                  <div class="get-service-main">
                     <span>
                        <img src="{{ static_asset('assets/assets_web/img/icons/cloud.png')}}" alt="data" style="height: 60px;">
                     </span>
                     <div class="get-service-content">
                        <a href="#"><h5 class="mt-4 mb-3">Cloud Services</h5></a>
                        <p class="fs-6">
                           The term "cloud services" refers to a wide range of services delivered on demand to companies and customers over the internet. These services are designed to provide easy, affordable access to applications and resources, without the need for internal infrastructure or hardware.
                        </p>
                        <a href="#" class="fw-bold"> View More <i class="fa fa-angle-right p-1" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                  <div class="get-service-main">
                     <span>
                        <img src="{{ static_asset('assets/assets_web/img/data.png')}}" alt="data">
                     </span>
                     <div class="get-service-content">
                        <a href="#"><h5 class="mt-4 mb-3">Middleware Services</h5></a>
                        <p class="fs-6">
                           Middleware is defined as a layer of software that enables interaction and transmission of information between assorted applications and services that make up a complex system, providing a uniform user experience for clients. This article introduces you to middleware, its benefits, architecture, and the best practices for implementing and managing middleware.
                        </p>
                        <a href="#" class="fw-bold"> View More <i class="fa fa-angle-right p-1" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div> --}}
            </div>
        </div>
    </section>
    <!-- /Get Satisfied with the services Explore All -->



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
                {{-- <div class="col-12 col-sm-6 col-md-4 col-lg-2 my-2">
                  <img src="{{ static_asset('assets/assets_web/img/certified/ccnplogo.png')}}" alt="" class="img-fluid rounded d-block mx-auto">
               </div>
               <div class="col-12 col-sm-6 col-md-4 col-lg-2 my-2">
                  <img src="{{ static_asset('assets/assets_web/img/certified/redhat-logo.png')}}" alt="" class="img-fluid rounded d-block mx-auto">
               </div>
               <div class="col-12 col-sm-6 col-md-4 col-lg-2 my-2">
                  <img src="{{ static_asset('assets/assets_web/img/certified/microsfot-certified.png')}}" alt="" class="img-fluid rounded d-block mx-auto">
               </div>
               <div class="col-12 col-sm-6 col-md-4 col-lg-2 my-2">
                  <img src="{{ static_asset('assets/assets_web/img/certified/compt.png')}}" alt="" class="img-fluid rounded d-block mx-auto">
               </div>
               <div class="col-12 col-sm-6 col-md-4 col-lg-2 my-2">
                  <img src="{{ static_asset('assets/assets_web/img/certified/compt-security.png')}}" alt="" class="img-fluid rounded d-block mx-auto">
               </div> --}}
            </div>
            {{-- <div class="row justify-content-evenly justify-content-lg-center">
               <div class="col-12 col-sm-6 col-md-4 col-lg-2 my-2">
                  <img src="{{ static_asset('assets/assets_web/img/certified/compta.png')}}" alt="" class="img-fluid rounded d-block mx-auto">
               </div>
               <div class="col-12 col-sm-6 col-md-4 col-lg-2 my-2">
                  <img src="{{ static_asset('assets/assets_web/img/certified/aws-logo.png')}}" alt="" class="img-fluid rounded d-block mx-auto">
               </div>
               <div class="col-12 col-sm-6 col-md-4 col-lg-2 my-2">
                  <img src="{{ static_asset('assets/assets_web/img/certified/Google-Cloud.png')}}" alt="" class="img-fluid rounded d-block mx-auto">
               </div>
               <div class="col-12 col-sm-6 col-md-4 col-lg-2 my-2">
                  <img src="{{ static_asset('assets/assets_web/img/certified/microsoft-logo.png')}}" alt="" class="img-fluid rounded d-block mx-auto">
               </div>
            </div> --}}
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
                        <a href="faq.php" class="afford-btn">Explore All</a>
                    </div>
                </div>
            </div>
            <div class="faq-section mb-3">
                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faqOne" aria-expanded="false">
                            Abhishek Parmar? <i class="bi bi-plus-circle-fill fs-5"></i>
                        </a>
                    </h4>
                    <div id="faqOne" class="card-collapse collapse">
                        <p>
                            Web Developer
                        </p>
                    </div>
                </div>
                {{-- <div class="faq-card">
                  <h4 class="faq-title">
                     <a class="collapsed" data-bs-toggle="collapse" href="#faqTwo" aria-expanded="false">Sed ut
                        perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium?<i class="bi bi-plus-circle-fill fs-5"></i></a>
                  </h4>
                  <div id="faqTwo" class="card-collapse collapse">
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Nemo enim ipsam voluptatem quia
                        voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui
                        ratione voluptatem sequi nesciunt.</p>
                  </div>
               </div>
               <div class="faq-card">
                  <h4 class="faq-title">
                     <a class="collapsed" data-bs-toggle="collapse" href="#faqThree" aria-expanded="false">Nemo
                        enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia?<i
                           class="bi bi-plus-circle-fill fs-5"></i></a>
                  </h4>
                  <div id="faqThree" class="card-collapse collapse">
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Nemo enim ipsam voluptatem quia
                        voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui
                        ratione voluptatem sequi nesciunt.</p>
                  </div>
               </div>
               <div class="faq-card">
                  <h4 class="faq-title">
                     <a class="collapsed" data-bs-toggle="collapse" href="#faqFour" aria-expanded="false">Lorem
                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor?<i
                           class="bi bi-plus-circle-fill fs-5"></i></a>
                  </h4>
                  <div id="faqFour" class="card-collapse collapse">
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Nemo enim ipsam voluptatem quia
                        voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui
                        ratione voluptatem sequi nesciunt.</p>
                  </div>
               </div> --}}
            </div>
        </div>
    </section>
    <!-- /Faq Section End -->

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



 



@endsection

