@extends('frontend.layouts.master')
@section('title') @if($page) {{$page->meta_title}} @endif @endsection

@section('meta_tags')
    @if($page)
        <meta name="title" content="{{$page->meta_title}}">
        <meta name="keywords" content="{{$page->meta_tag}}">
        <meta name="description" content="{{$page->meta_description}}">
    @endif
@endsection
 
@section('content')
  <!--header end -->
       
       <div class="banner-main position-relative py-5 h-470" Style="background-image:url({{ static_asset('assets/assets_web/img/bg-home1.webp') }});">
			<div class="container h-100">
			 <nav aria-label="breadcrumb" class=" h-100 w-100 d-flex align-items-center justify-content-start pt-5 mt-5">
			<div class="w-100 d-flow-root ">		
				  <h5 class="text-white d-block fs-2 w-100 mb-2">{{ $page->title }}</h5>
				  <span class="widget_title bg-white"></span>
				  <ol class="breadcrumb w-auto badge bg-light-transparent text-dark py-2 px-3 mt-2 mb-0">
					<li class="breadcrumb-item text-white float-start d-inline-block py-1 fw-normal"><a href="{{ url('') }}" class="text-white fs-15">Home</a></li>   
					<li class="breadcrumb-item active text-white fs-15 float-start d-inline-block py-1 fw-normal" aria-current="page">{{ $page->title }}</li>
				  </ol>
			</div>
			</nav>
         </div>
      </div>
     <section class="py-5 company-core-value2 position-relative" >
         <div class="container position-relative z-index-99">
            <div class="base-header2 w-75 mx-auto mb-3">
               <h6 class=" pb-0 fs-25 fw-bold lsp-5 text-black text-capitalize text-center">Our  <span class="text-sky   fs-25 ">Team</span></h6>
               <p class="fs-13 lsp-5  lh-base text-center mx-auto">
                  Our Experts have been helping businesses overcome their It challenges since 1995. </div>
            <div class="row w-100 z-index-0 px-3 rowfff">


			@foreach(ourTeamList() as $key => $value)        
               <div class="col-md-6 col-lg-3 mt-3">
                  <div class="counter-block border bg-white  shadow-5 rounded  text-center  h-auto transition p-1">
						<div class="overflow-hidden border border-bottom-0 border-light rounded imgage-img">
						       <img src="{{ static_asset($value->profile_pic) }}" alt="Orrish" class="w-auto mx-auto h-250 transition mt-3">
						</div>
							<div class="position-relative w-100 bg-dark rounded">
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
								<h6 class="fs-15 mt-0 pt-4 mb-1 fw-bold text-capitalize text-sky lsp-1px">{{ $value->name }}</h6>
								<p class="text-white h-auto overflow-y scrollbar-width mb-0">{{ $value->designation }}</p>
							 </div>
                            </div>
                        </div>
               </div>
			@endforeach
                
            </div>
         </div>
      </section>

@endsection
