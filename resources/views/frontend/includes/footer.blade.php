@php
  $social_medias = get_business_multiple_cache_value('social_medias', 'social_media');
  $footer_logo = get_business_single_cache_value('footer_logo', 'footer_setup', 'footer_logo');
  $footer_description = get_business_single_cache_value('footer_description', 'footer_setup', 'footer_description');
  $copyright_widget = get_business_single_cache_value('copyright_widget', 'footer_setup', 'copyright_widget');

  $contact_working_hr = get_business_single_cache_value('contact_working_hr', 'footer_setup', 'contact_working_hr');
  $contact_email = get_business_single_cache_value('contact_email', 'footer_setup', 'contact_email');
  $contact_phone = get_business_single_cache_value('contact_phone', 'footer_setup', 'contact_phone');
  $contact_address = get_business_single_cache_value('contact_address', 'footer_setup', 'contact_address');

  $corporate_address = get_business_single_cache_value('corporate_address', 'footer_setup', 'corporate_address');
  $corporate_address_phone = get_business_single_cache_value('corporate_address_phone', 'footer_setup', 'corporate_address_phone');

  $registered_address = get_business_single_cache_value('registered_address', 'footer_setup', 'registered_address');
  $registered_address_phone = get_business_single_cache_value('registered_address_phone', 'footer_setup', 'registered_address_phone');

  $leads_uk_address = get_business_single_cache_value('leads_uk_address', 'footer_setup', 'leads_uk_address');
  $leads_uk_address_phone = get_business_single_cache_value('leads_uk_address_phone', 'footer_setup', 'leads_uk_address_phone');

@endphp

@if(false)
 <footer class="pt-5 pb-0 position-relative footer z-index-99" style="background-image:url({{ static_asset('assets/assets_web/img/main-footer-bg.jpg')}});">
         <div class="container position-relative z-index-1">

            <div class="row ">
               <div class="col-md-12 px-35">
                  <div class="   w-100  rounded-5  px-4 py-4 bg-sky d-block  mb-5">
                     <div class="triangle-up position-absolute start-0"></div>
                     <div class="row py-0">
                        <div class="col-md-7">
                           <h3 class="mb-0 text-white fw-normal fs-20 lsp-5">
                              Stay up to date with the latest
                           </h3>
                           <p class="mb-0 text-white lsp-5 fs-13 mt-2">
                              <span class="text-white fs-13">Subscribe with Email and loads of interesting!</span>
                              <i class="bi bi-hand-thumbs-up-fill align-middle ps-1 text-white"></i>
                           </p>
                        </div>
                        <div class="col-md-5">
                           <form id="emailSubscribe" class="input-group rounded-pill w-100 bg-white border-0 py-0  ps-1 pe-0 fs-13 overflow-hidden">

                                @csrf
                              <input type="text" class="form-control w-90 outline-0 h-50px border-0 fs-13 rounded-pill" id="email_subscribe" name="email" placeholder="Enter Your Email" aria-label="Subscribe" aria-describedby="button-addon2">
                              <button class="btn bg-dark-green border-2 w-120 h-50px border-white text-muted2 shadow fs-13 rounded-pill p-0 text-capitalize SubscribeBtn" type="button" id="button-addon2">
                              Subscribe
                              </button>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="container ">
            <div class="row ">
               <div class="col-md-6 col-lg-3">
                  <h6 class=" pb-2 fs-16 fw-bold lsp-5 text-gray-light text-capitalize">Our  <span class="text-sky   fs-16 "> Services</span></h6>
                  <ul class="text-secondary list-unstyled border-right  lh-22 fs-13 lsp-5 text-muted2 ">
                        @foreach (footer_master_service() as $item)
                            <li class="pb-1"><a href="{{ route('serviceDetails.slug', $item->slug) }}" class="link-secondary d-flex align-items-start"><i class="fa-sharp fa-solid fa-angles-right text-sky pe-2 pt-1 mt-02px"></i>  {{ $item->title }}  </a></li>
                        @endforeach
                  </ul>
               </div>
               <div class="col-md-6 col-lg-5 border-start border-end  border-light-gray">
                  <h6 class=" pb-2 fs-16 fw-bold lsp-5 text-gray-light text-capitalize">Our <span class="text-sky   fs-16 ">Products</span></h6>
                  <ul class="text-secondary list-unstyled fs-13 lsp-5 text-muted2 lh-22 d-flow-root w-100">
                    @foreach (footer_master_products() as $item)
                        <li class="pb-1 float-start w-48">
                            <a href="{{ URL::to('product', $item->slug) }}" class="link-secondary d-flex align-items-start"><i class="fa-sharp fa-solid fa-angles-right text-sky pe-2 pt-1 mt-02px"></i>  {{ $item->title }}</a></li>
                    @endforeach
                    </ul>
                  <hr class="border-white bg-white">
                  <div class="social-media mb-md-3">
                     <h3 class=" pb-2 fs-16 fw-bold lsp-5 text-gray-light text-capitalize">Follow<span class="text-sky   fs-16 "> Us</span></h3>
                     <ul class="list-inline social-link-foot d-flex align-items-center  mb-0 pb-0">
                        @if(!empty($social_medias))
                        @foreach($social_medias as $media)
                           <li class="{{$media->field_name}} me-2">
                              <a target="_blank" href="{{$media->value}}" title="Facebook" class="bg-{{$media->field_name}} transition text-white rounded-5 w-40px h-40px d-flex align-items-center justify-content-center">
                                 <i class="fab fa-{{$media->field_name}}"></i>
                              </a>
                           </li>
                        @endforeach
						@endif

                     </ul>
                  </div>
               </div>
               <div class="col-md-6 col-lg-2 pe-md-0">
                  <h6 class=" pb-2 fs-16 fw-bold lsp-5 text-gray-light text-capitalize">Solu<span class="text-sky   fs-16 ">tions</span></h6>
                  <ul class="text-secondary list-unstyled fs-13 lsp-5 text-muted2 ">
                    @if(count(master_solution_list())>0)
                        @foreach(master_solution_list() as $val)
                        <li class="pb-1"><a href="{{ route('solution.slug', $val->page_url) }}" class="link-secondary d-flex align-items-start white-space"><i class="fa-sharp fa-solid fa-angles-right text-sky pe-2 pt-1 mt-02px"></i> {{ $val->title }} </a></li>
                        @endforeach
                    @endif

                  </ul>
               </div>
               <div class="col-md-6 col-lg-2">
                  <h6 class=" pb-2 fs-16 fw-bold lsp-5 text-gray-light text-capitalize">Partner & <span class="text-sky   fs-16 ">Business</span></h6>
                  <ul class="text-secondary list-unstyled fs-13 lh-22 lsp-5 text-muted2 ">
                    @if(count(master_partner_list())>0)
						@foreach(master_partner_list() as $val)
                            <li class="pb-1"><a href="{{ route('partnerDetails.slug', $val->slug) }}" class="link-secondary d-flex align-items-start white-space"><i class="fa-sharp fa-solid fa-angles-right text-sky pe-2 pt-1 mt-02px"></i> {{ $val->title }}  </a></li>
                        @endforeach
                    @endif
                  </ul>
               </div>
            </div>
            <hr class="border-white bg-white">
            <div class="col-md-12  ps-0">
               <h6 class=" pb-2 fs-16 fw-bold lsp-5 text-gray-light text-capitalize">Company & <span class="text-sky   fs-16 ">Insights</span></h6>
               <ul class="text-secondary list-unstyled fs-13 lsp-5 lh-22 text-muted2 d-flow-root w-100">
                  <li class="pb-1 float-start mx-1"><a href="{{ url('about') }}" class="link-secondary">   About Company   </a></li>
                  <li class="list-group-item bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-0 float-start text-sky   lh-20">|</li>
                  <li class="pb-1 float-start mx-1"><a href="{{ url('clients') }}" class="link-secondary">  Clients & Partners   </a></li>
                  <li class="list-group-item bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-0 float-start text-sky  lh-20 ">|</li>
                  <li class="pb-1 float-start mx-1 "><a href="{{ url('awards') }}" class="link-secondary"> Awards & Certifications  </a></li>
                  <li class="list-group-item bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-0 float-start text-sky  lh-20 ">|</li>
                  <li class="pb-1 float-start mx-1"><a href="{{ url('contact-us') }}" class="link-secondary">Contact Us   </a></li>
                  <li class="list-group-item bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-0 float-start text-sky   lh-20">|</li>

                  @if(count(master_industry_page())>0)
									@foreach(master_industry_page() as $val)
                                        @if($val->page_url!=null)
                                        <li class="pb-1 float-start mx-1 ">
                                            <a href="{{ route('industry.slug', $val->page_url) }}" class="link-secondary">&nbsp; {{ $val->title }}   </a>
                                        </li>
                                         @else
                                        <li class="pb-1 float-start mx-1 ">
                                            <a href="" class="link-secondary">&nbsp; {{ $val->title }}   </a>
                                        </li>
                                        @endif
                                    @endforeach
                                @endif

                  <li class="list-group-item bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-0 float-start text-sky  lh-20 ">|</li>
                  <li class="pb-1 float-start mx-1"><a href="{{ url('case-study') }}" class="link-secondary"> Case Study  </a></li>
                  <li class="list-group-item bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-0 float-start text-sky  lh-20 ">|</li>
                  <li class="pb-1 float-start mx-1"><a href="{{ url('news') }}" class="link-secondary"> News  </a></li>
                  <li class="list-group-item bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-0 float-start text-sky  lh-20 ">|</li>
                  <li class="pb-1 float-start mx-1"><a href="{{ url('blog') }}" class="link-secondary">  Blog </a></li>
                  <li class="list-group-item bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-0 float-start text-sky  lh-20 ">|</li>
                  <li class="pb-1 float-start mx-1"><a href="javascript:void(0)" class="link-secondary">  Faq </a></li>
                  <li class="list-group-item bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-0 float-start text-sky  lh-20 ">|</li>
                  <li class="pb-1 float-start mx-1"><a href="{{ url('our-team') }}" class="link-secondary">    Team   </a></li>
                  <li class="list-group-item bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-0 float-start text-sky  lh-20 ">|</li>
                  <li class="pb-1 float-start mx-1 "><a href="{{ url('testimonial') }}" class="link-secondary"> Testimonial  </a></li>
                  <li class="list-group-item bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-0 float-start text-sky  lh-20 ">|</li>
                  <li class="pb-1 float-start mx-1 "><a href="" class="link-secondary"> Company Profile  </a></li>
               </ul>
            </div>
            <div class=" bg-black-transparent">
               <div class="row justify-content-center">
                  <div class="col-auto col-lg-6 col-12  ">
                     <div class="col-content d-flex px-3 py-3 rounded">
                        <div class="icon">
                           <img src="{{ static_asset('assets/assets_web/img/map1.png')}}" alt="">
                        </div>
                        <div class="content text-white ms-3">
                           <h6 class=" pb-2 fs-16 fw-bold lsp-5 text-gray-light text-capitalize">Corporate <span class="text-sky   fs-16 "> Address</span></h6>
                           <p class="link-secondary lsp-5 mb-0 d-flex align-items-start "> <i class="bi bi-pin-map me-2 pt-1 text-sky"></i> {{ $corporate_address }}</p>
                           <!--<p class="link-secondary lsp-5"> <i class="bi bi-telephone text-sky"></i> +91-0124 4286 901 </p>-->
                        </div>
                     </div>
                  </div>
                  {{-- <div class="col-auto col-lg-4 col-12  ">
                     <div class="col-content d-flex px-3 py-3 rounded">
                        <div class="icon">
                           <img src="{{ static_asset('assets/assets_web/img/map2.png')}}" alt="">
                        </div>
                        <div class="content text-white ms-3">
                           <h6 class=" pb-2 fs-16 fw-bold lsp-5 text-gray-light text-capitalize">Leads, <span class="text-sky   fs-16 ">UK</span></h6>
                           <p class="link-secondary lsp-5 mb-0 d-flex align-items-start "> <i class="bi bi-pin-map me-2 pt-1 text-sky"></i>  {{ $leads_uk_address }}</p>
                           <p class="link-secondary lsp-5  lh-22"> <i class="bi bi-telephone text-sky"></i> {{ $leads_uk_address_phone }} </p>
                        </div>
                     </div>
                  </div> --}}
                  <div class="col-auto col-lg-6 col-12  ">
                     <div class="col-content d-flex px-3 py-3 rounded">
                        <div class="icon">
                           <img src="{{ static_asset('assets/assets_web/img/map1.png')}}" alt="">
                        </div>
                        <div class="content text-white ms-3">
                           <h6 class=" pb-2 fs-16 fw-bold lsp-5 text-gray-light text-capitalize">Registered <span class="text-sky   fs-16 "> Address </span></h6>
                           <p class="link-secondary lsp-5 mb-0 d-flex align-items-start  lh-22"> <i class="bi bi-pin-map me-2 pt-1 text-sky"></i> {{ $registered_address }}
                           </p>
                           <p class="link-secondary lsp-5"> <i class="bi bi-telephone text-sky"></i> {{ $registered_address_phone }} </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <hr class="border-white bg-white mt-0 mb-0 ">
         </div>
         @if(false)<div class="footer-shadow position-relative z-index-1 py-3">
            <div class="container">
               <div class="row justify-content-between">
                  <div class="col-md-12 col-lg-12 footer-member-club">
                     <div class="footer-corporatelogo-container">
                        <h6 class=" pb-2 fs-16 fw-bold lsp-5 text-gray-light text-capitalize">Our <span class="text-sky   fs-16 ">Certification</span></h6>
                        <div class="owl-carousel-marquee2 owl-carousel owl-theme">
                            @if(count(certificate_list())>0)
                                @foreach (certificate_list() as $val)
                                    <div class="elitelogo list-group me-3"><a href="#">
                                        <img class="img-fluid h-80px" src="{{ asset('public/'.$val->image)}}" alt="{{ $val->title }}">
                                        </a>
                                    </div>
                                @endforeach
                            @endif


                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>@endif
         <div class="position-relative z-index-1">
            <div class="container  pt-0  ">
               <div class="   d-block d-lg-flex justify-content-between align-items-center mb-0 mt-0 py-md-2 pb-0 pt-0">
                  <ul class="list-group1 d-lg-flex d-flex justify-content-center list-group-horizontal fs-13 lsp-5 p-0  mb-0">
                     <li class="list-group-item bg-transparent border-0 text-muted2  px-0 "> <a href="{{ url('privacy-policy') }}" class="link-secondary fs-13 lsp-5">Privacy &amp; Policy </a> </li>
                     <li class="list-group-item bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-2 float-start text-sky  ">|</li>
                     <li class="list-group-item bg-transparent border-0 text-muted2 px-0  "><a href="{{ url('terms-condition') }}" class="link-secondary fs-13 lsp-5">Terms &amp; Conditions.</a></li>
                     <li class="list-group-item bg-transparent border-0 text-muted2 px-1 bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-2 float-start text-sky  ">|</li>
                     <li class="list-group-item bg-transparent border-0 text-muted2 px-0 "><a href="{{ url('disclaimer') }}" class="link-secondary fs-13 lsp-5">Disclamer</a></li>
                     <li class="list-group-item bg-transparent border-0 text-muted2 px-1 bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-2 float-start text-sky  ">|</li>
                     <li class="list-group-item bg-transparent border-0 text-muted2 px-0 "><a href="{{ url('refund-policy') }}" class="link-secondary fs-13 lsp-5">Refund Policy</a></li>
                     <li class="list-group-item bg-transparent border-0 text-muted2 px-1 bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-2 float-start text-sky  ">|</li>
					 <li class="list-group-item bg-transparent border-0 text-muted2 px-0 "><a href="{{ url('') }}" class="link-secondary fs-13 lsp-5">Cancellation Policy</a></li>
                     <li class="list-group-item bg-transparent border-0 text-muted2 px-1 bg-transparent border-0 my-0 text-muted2 px-1 fw-bold py-2 float-start text-sky  ">|</li>
                     <li class="list-group-item bg-transparent border-0 text-muted2 px-0 "><a href="{{ url('faqs') }}" class="link-secondary fs-13 lsp-5">FAQs</a></li>
                  </ul>
                  <p class="link-secondary1 mb-lg-0 mb-3 lsp-5 fs-13 text-lg-end text-center">{!! $copyright_widget !!}</p>
               </div>
               <div class="border-bottom border-3  border-sky w-100 rounded-pill "></div>
            </div>
         </div>
      </footer>

	@endif

	<footer>
   <div class="container">
      <div class="row pt-5">
         <div class="col-lg-3 col-md-6">
            <div class="py-2 pt-0">
               <a class="navbar-brand" href="#"><img src="assets/img/footer-logo1.png" class="" alt="" height="45px" width="aut"></a>
            </div>
            <div class="footer-six-main pt-4">
               <div class="footer-six-left">
                  <div class="mx-3">
                     <i class="fa fa-phone text-white fa-lg fs-3" aria-hidden="true"></i>
                  </div>
                  <div class="footer-six-ryt text-white">
                     <span>Phone Number</span>
                     <h6>{{$contact_phone}}</h6>
                  </div>
               </div>
               <div class="footer-six-left">
                  <div class="mx-3">
                     <i class="fa fa-envelope fa-xl text-white fs-4" aria-hidden="true"></i>
                  </div>
                  <div class="footer-six-ryt">
                     <span>Mail Address</span>
                     <h6>{!! $contact_email !!}</h6>
                  </div>
               </div>
               <div class="footer-six-left ">
                  <div class="mx-3">
                     <i class="fa fa-map-marker text-white fa-lg fs-3" aria-hidden="true"></i>
                  </div>
                  <div class="footer-six-ryt">
                     <span>Address</span>
                     <h6>{{$contact_address}}</h6>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-2 col-md-6 my-3 ps-4 md-sm-0">
            <h6 class="text-uppercase fw-bold mb-4 fs-5 text-light">
               Location
            </h6>
            <p>
               <a href="#!" class="text-white"> Mumbai</a>
            </p>
            <p>
               <a href="#!" class="text-white">Kolkata</a>
            </p>
            <p>
               <a href="#!" class="text-white">Ahemdabad</a>
            </p>
            <p>
               <a href="#!" class="text-white">Bengaluru</a>
            </p>
            <p>
               <a href="#!" class="text-white">Delhi/NCR</a>
            </p>
            <p>
               <a href="#!" class="text-white">Hyerabad</a>
            </p>
         </div>
         <div class="col-lg-2 col-md-6 my-3 ps-4 md-sm-0">
            <h6 class="text-uppercase fw-bold mb-4 fs-5 text-light">
                  Quick Links
            </h6>
            <p>
               <a href="{{ url('faqs') }}" class="text-white"> FAQs</a>
            </p>
            <p>
               <a href="{{ url('testimonial') }}" class="text-white">Testimonial</a>
            </p>
            <p>
               <a href="{{ url('') }}" class="text-white">Cancellation Policy</a>
            </p>
            <p>
               <a href="{{ url('contact-us') }}" class="text-white">   Contact Us</a>
            </p>
            <p>
               <a href="{{ url('blogs') }}" class="text-white">    Blogs</a>
            </p>
            <p>
               <a href="{{ url('about') }}" class="text-white">  About Us</a>
            </p>
         </div>
         <div class="col-lg-2 px-lg-0 col-md-6 my-3 ps-4 md-sm-0">
            <h6 class="text-uppercase fw-bold mb-4 fs-5 text-light">
                  Services
            </h6>
            <p>
               <a href="{{ url('') }}" class="text-white"> All Services</a>
            </p>
            <p>
               <a href="javascript:void(0)" class="text-white">Hire Onsite L1 Engineer
</a>
            </p>
            <p>
               <a href="javascript:void(0)" class="text-white">Installation & Configuration
</a>
            </p>
            <p>
               <a href="javascript:void(0)" class="text-white">   Upgrade & Migration</a>
            </p>


         </div>
         <div class="col-lg-3 my-3">
            <div class="inner-footer">
               <h3>Subscribe Now to Receive Latest Offer News &amp; Updates</h3>
               <form id="emailSubscribe" method="post" class="widget widget-subscribe newsletters">
			    @csrf
                  <div class="mb-3"><input id="email_subscribe" name="email" type="text" placeholder="Your@email.com" class="text-white border-0 bg-secondary bg-opacity-25"></div>
                  <button class="btn w-100 mt-2 text-white SubscribeBtn" type="button" style="background: #0082F8 !important;">Subscribe</button>
               </form>
               <div class="mt-3">
                  <ul class="d-flex justify-content-around">
                    @if(!empty($social_medias))
						@foreach($social_medias as $media)
						    @if($media->value!=null)
                                <li>
                                <a target="_blank" href="{{$media->value}}" class="  d-block">
                                    <i class="fa fa-{{$media->field_name}} text-white bg-icon bg-{{$media->field_name}} " aria-hidden="true"></i>
                                </a>
                                </li>
                            @endif
						@endforeach
					@endif

                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <hr class="my-0 border border-light">
   <div class="container">
      <div class="row py-4 text-white ps-2">
         <div class="col-md-6 my-2">
            <span>Copyright {{ date('Y') }} &copy; Engineersmine. All rights reserved.</span>
         </div>
         <div class="col-md-6 my-2">
            <div class="float-end">
			<ul class="list-group1 d-flex justify-content-end border-0 bg-transparent">
				<li class="list-group-item border-0 bg-transparent mx-1"><a class="text-white" href="{{ url('page/refund-and-cancellation-policy') }}">Refund & Cancellation Policy    </a></li>
				<li class="list-group-item border-0 bg-transparent mx-1 text-white">|</li>
				<li class="list-group-item border-0 bg-transparent mx-1"><a class="text-white" href="{{ url('page/terms-and-conditions') }}">Terms & Condition</a></li>
				<li class="list-group-item border-0 bg-transparent mx-1 text-white">|</li>
				<li class="list-group-item border-0 bg-transparent mx-1"><a class="text-white"  href="{{ url('page/privacy-policy') }}">Privacy Policy  </a></li>
				<!--<li class="list-group-item border-0 bg-transparent mx-1 text-white">|</li>
				<li class="list-group-item border-0 bg-transparent mx-1"><a class="text-white"  href="{{ url('page/pricing') }}">Pricing</a></li>-->
			</ul>

            </div>
         </div>
      </div>
   </div>
</footer>
