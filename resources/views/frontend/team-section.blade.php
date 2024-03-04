<section class="py-5 testimonials bg-img small banner  " style="background-image:url(img/bg-shape-5.jpg); ">
         <div class="container ">
            <div class="row gx-30 justify-content-center mt-5">
               <div class="col-md-9 col-lg-5 col-xl-5 wow fadeIn animated animated" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: a;">
                  <div class="section-title mb-xl-4 text-start text-lg-start mt-5">
                     <div class="base-header2 w-100 mb-3">
                        <h6 class=" pb-0 fs-25 fw-bold lsp-5 text-light text-capitalize text-start">Experts &amp; <span class="text-sky   fs-25 ">Team</span></h6>
                        <p class="fs-13 lsp-5  lh-base text-start mx-auto text-white">
                           Our Experts have been helping businesses overcome their It challenges since 1995.  Our Experts have been helping businesses overcome their It challenges since 1995.
                        </p>
                        <a class="btn bg-dark mt-0 fs-13 border border-white py-0 px-3 justify-content-between w-120  h-35px d-flex align-items-center lsp-5 text-white" href="javascript:void();">Read More <i class="bi bi-arrow-right fw-bold"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-1 col-lg-1"></div>
			@if(count(ourTeamList())>0)
				@foreach(ourTeamList() as $key => $row)
               <div class="col-xl-3 col-lg-3 col-md-6">
                  <div class="p-2">
                     <div class="counter-block  rounded  text-center bg-white h-auto transition p-1">
                        <div class="overflow-hidden border border-bottom-0 border-light rounded imgage-img">
                           <img src="{{ static_asset($row->profile_pic) }}" alt="Orrish" class="w-auto mx-auto h-175px transition mt-3">
                        </div>
                        <div class="position-relative w-100 bg-dark rounded ">
                           <div class="social-shear position-absolute bg-dark py-1 z-index-9 w-100 top-0 start-50 translate-middle ">
                              <div class="team-info-icons w-100">
                                 <ul class="nav1 p-0 m-0 d-flex list-style-none justify-content-center">
                                    <li class="nav-item mx-2"><a href="#" class="nav-link link-dark px-2 py-1  fs-13 lsp-5 rounded-3 text-center bg-facebook  "><i class="fab fa fa-facebook text-white"></i> </a></li>
                                    <li class="nav-item mx-2"><a href="#" class="nav-link link-dark px-2 py-1  fs-13 lsp-5 rounded-3  text-center bg-twitter"> <i class="fab fa fa-twitter text-white"></i> </a></li>
                                    <li class="nav-item mx-2"><a href="#" class="nav-link link-dark px-2 py-1  fs-13 lsp-5 rounded-3  text-center  bg-linkedin"> <i class="fab fa fa-linkedin text-white"></i> </a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="info pb-3 pt-2">
                              <h6 class="fs-15 mt-0 pt-4 mb-1 fw-bold text-capitalize text-sky lsp-1px">Mr. Rakesh Singh</h6>
                              <p class="text-white h-auto overflow-y scrollbar-width mb-0">CEO &amp; Co Founder</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
			   @endforeach
			@endif
			 
                
             
            </div>
         </div>
      </section>