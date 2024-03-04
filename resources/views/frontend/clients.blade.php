@extends('frontend.layouts.master');
@section('title') Our Clients @endsection

@section('meta_tags')
   <meta name="title" content="">
   <meta name="keywords" content="">
   <meta name="description" content="">
@endsection

@section('content')
    
	<div class="banner-main position-relative py-5 h-470" Style="background-image:url({{ static_asset('assets/assets_web/img/bg-home1.webp') }});">
			<div class="container h-100">
			 <nav aria-label="breadcrumb" class=" h-100 w-100 d-flex align-items-center justify-content-start pt-5 mt-5">
			<div class="w-100 d-flow-root ">		
				  <h5 class="text-white d-block fs-2 w-100 mb-2">Our Prestigious Clientele </h5>
				  <span class="widget_title bg-white"></span>
				  <ol class="breadcrumb w-auto badge bg-light-transparent text-dark py-2 px-3 mt-2 mb-0">
					<li class="breadcrumb-item text-white float-start d-inline-block py-1 fw-normal"><a href="#" class="text-white fs-15">Home</a></li>   
					<li class="breadcrumb-item active text-white fs-15 float-start d-inline-block py-1 fw-normal" aria-current="page">Our Prestigious Clientele</li>
				  </ol>
			</div>
			</nav>
         </div>
      </div>
	  
        <section class="about-wrapper  py-5 dedocatopd bg-light-green position-relative overflow-hidden">
         <div class="container position-relative z-index-99">
            <div class="base-header2 mb-0 pb-2">
               <h6 class=" pb-0 fs-25 fw-bold lsp-5 text-black text-capitalize text-center">Our Prestigious   <span class="text-sky   fs-25 ">Clientele</span></h6>
               <p class="fs-13 lsp-5  lh-base text-center mx-auto">
                  They Trust Us. Now You Can Too. 
               </p>  
            </div>
            <div class="about-content  ">
               <ul class="nav about-tab-nav mb-0 w-40 mx-auto border py-1 justify-content-center rounded" id="myTab" role="tablist">
                  <li class="nav-item w-33" role="presentation">
                     <button class="nav-link w-100 text-center justify-content-center d-flex align-items-center btn rounded-top px-3 py-1 bg-dark  active text-white fs-13 lsp-5 border border-light" id="menu4-tab" data-bs-toggle="tab" data-bs-target="#menu4q" type="button" role="tab" aria-controls="menu4q" aria-selected="true"><img src="{{static_asset('images/partners.png')}}" alt="" class="filter w-30px me-2"> Partners</button>
                  </li>
                  <li class="nav-item w-33" role="presentation">
                     <button class="nav-link w-100 text-center justify-content-center d-flex align-items-center   btn rounded-top px-3 py-1 bg-dark text-white  fs-13 lsp-5 border border-light" id="menu5-tab" data-bs-toggle="tab" data-bs-target="#menu5q" type="button" role="tab" aria-controls="menu5q" aria-selected="false"><img src="{{static_asset('images/clients.png')}}"" alt="" class="filter w-30px me-2"> Clients</button>
                  </li>
                  <li class="nav-item w-33" role="presentation">
                     <button class="nav-link w-100 text-center justify-content-center  d-flex align-items-center   btn rounded-top px-3 py-1 bg-dark text-white  fs-13 lsp-5 border border-muted" id="menu6-tab" data-bs-toggle="tab" data-bs-target="#menu6q" type="button" role="tab" aria-controls="menu6q" aria-selected="false"><img src="{{static_asset('images/affiliate-marketing.png')}}" alt="" class="filter w-30px me-2"> Affiliations</button>
                  </li>
               </ul>
               <div class="tab-content bg-transparent border-top-0 pt-3" id="aboutTab">
                  <div class="tab-pane fade show active" id="menu4q" role="tabpanel" aria-labelledby="menu4q-tab">
                   
                     <div class="row">
                        <div class="col-md-12">
                           <div class="row testi-big justify-content-center">
                                 @foreach(get_img_partner__list() as $val)
                                 <div class="col-sm-12 col-md-6 col-lg-2">
                                 <div class="shadow-5 bg-white  mx-0 my-2  rounded ">
                                       <img class="w-100 h-auto px-3 mx-auto" src="{{ static_asset($val->image) }}" alt="">
                                    </div>
                                 </div>
							         @endforeach
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="menu5q" role="tabpanel" aria-labelledby="menu5q-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="row testi-big justify-content-center">
                               @foreach(get_img_client_list() as $val)
                              <div class="col-sm-12 col-md-6 col-lg-2">
                                <div class="shadow-5 bg-white  mx-0 my-2  rounded ">
                                    <img class="w-100 h-auto px-3 mx-auto" src="{{ static_asset($val->image) }}" alt="">
                                 </div>
                              </div>
							         @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="menu6q" role="tabpanel" aria-labelledby="menu6q-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="row testi-big justify-content-center">
                              <!-- item 1 -->
                               
							    @foreach(get_img_affiliations_list() as $val)
								  <!-- item 1 -->
								  <div class="col-sm-12 col-md-6 col-lg-2">
									<div class="shadow-5 bg-white  mx-0 my-2  rounded ">
										<img class="w-100 h-auto px-3 mx-auto" src="{{ static_asset($val->image) }}" alt="">
									 </div>
								  </div>
							  @endforeach
							  
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
	  
@endsection 