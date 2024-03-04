@extends('frontend.layouts.master')
@section('title') News @endsection

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
				  <h5 class="text-white d-block fs-2 w-100 mb-2">News</h5>
				  <span class="widget_title bg-white"></span>
				  <ol class="breadcrumb w-auto badge bg-light-transparent text-dark py-2 px-3 mt-2 mb-0">
					<li class="breadcrumb-item text-white float-start d-inline-block py-1 fw-normal"><a href="{{ url('') }}" class="text-white fs-15">Home</a></li>  
					<li class="breadcrumb-item active text-white fs-15 float-start d-inline-block py-1 fw-normal" aria-current="page">News</li>
				  </ol>
			</div>
			</nav>
         </div>
      </div>
      <section class="blog-area py-5  company-core-value2 position-relative">
         <div class="container-fluid px-5 position-relative z-index-99 ">
            <div class="base-header2 w-75 mx-auto mb-3">
               <h6 class=" pb-0 fs-25 fw-bold lsp-5 text-black text-capitalize text-center">Latest  <span class="text-sky   fs-25 ">News</span></h6>
               <p class="fs-13 lsp-5 text-muted lh-base text-center mx-auto">
                  We want to be more than your hosting provider, we want to be your hosting partner.
                  Our team, the Most Helpful Humans in Hosting®, are here for you when you need it. Helping is part of our DNA.
               </p>
            </div>
            <div class="row">
               <div class="col-xl-9 col-lg-9 col-md-12">
                  <div class="row">
				  
				
					@foreach($news AS $key => $value)	
                     <div class="col-md-12 col-lg-6">
                        <div class="p-0 position-relative mb-3">
                          <div class="blog-section  bg-white  shadow-5 rounded overflow-hidden">
                              <div class="box-background px-3 py-1 my-4 w-150   bg-dark text-white d-flex rounded-pill rounded-start justify-content-between position-absolute start-0 top-0  w-40">
                                 <p class="mb-0 fs-13 lsp-5 text-white"><i class="bi bi-calendar3 text-white"></i>  {{ convert_datetime_to_date_format($value->created_at, 'd M, Y') }}</p>
                              </div>
                              <div class="d-flex justify-content-around">
                                 <img src="{{ static_asset($value->blog_image) }}" alt="{{ $value->title }}" class="w-40 h-200">
                                 <div class="w-70">
                                    <div class="headingkdk pt-3 pb-0 p-3">
                                       <h5 class="mb-1 fs-13 text-capitalize lsp-1px fw-bold text-sky w-100 white-space">{{$value->title}}</h5>
                                      {!! \Illuminate\Support\Str::limit($value->description ?? '',150,' ...') !!}
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                       <span class="text-black fw-bold fs-13 lsp-5"><i class="bi bi-person-circle text-sky ps-2"></i> ADMIN</span>
                                       <a class="btn bg-dark mt-0 fs-13 border border-white py-0 px-2 justify-content-between w-100px h-35px d-flex align-items-center lsp-5 text-white me-3" href="{{ route('news.detail',$value->slug) }}">Read More</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                    @endforeach 
                  </div>
               </div>
                <div class="col-xl-3 col-lg-3 col-md-12">
                  <div class="form-right-box text-center bg-white p-3 rounded-3 shadow-5 text-center mb-3">
                     <h6 class=" pb-0 fs-16 fw-bold lsp-5 text-black text-capitalize text-start"> Recent  <span class="text-sky   fs-16 ">News</span></h6>
                     <ul class="list-group mt-0 mb-2 text-start">
                       
					    
						@foreach($recent_posts as $key => $value)
							<li class="list-group-item border-0 px-0 d-flex align-items-center pb-0">
							   <img src="{{ static_asset($value->blog_image )}}" alt="{{ $value->title }}" class="w-70px h-70px mb-2  mx-1 border-skype p-1 shadow rounded"> 
							   <div class=" ps-2 w-75">
								  <span class="fs-13 lsp-5 text-black fw-bold d-block white-space  text-capitalize pb-0">{{ $value->title }}</span>
								  <p class="d-block justify-content-between mb-0 w-100 fs-11 fw-bold my-1"><i class="bi bi-calendar3 text-sky"></i> {{ convert_datetime_to_date_format($value->created_at, 'd M Y') }} <span class="fs-11"><i class="bi bi-person text-sky"></i> By Admin</span></p>
								  {!! \Illuminate\Support\Str::limit($value->description ?? '',50,' ...') !!}
							   </div>
							</li>
						@endforeach
                         
                     </ul>
                  </div>
                  <div class="form-right-box text-center  bg-white p-3   rounded-3 shadow-5 text-center    mb-3">
                     <h6 class=" pb-0 fs-16 fw-bold lsp-5 text-black text-capitalize text-start"> Popular  <span class="text-sky   fs-16 ">News</span></h6>
                     <ul class="list-group mt-0 mb-0 text-start">
                        @foreach($recent_posts as $key => $value)
							<li class="list-group-item border-0 border-bottom px-0">
							   <div class=" ps-2 w-100">
								  <span class="fs-13 lsp-5 text-black fw-bold d-block text-capitalize white-space">{{ $value->title }}</span>
								  <p class="d-flex justify-content-start mb-0 w-100 fs-11 fw-bold my-1 text-muted"><span class="fs-11 text-muted"><i class="bi bi-calendar3  text-sky"></i> 20 Jan 2023 </span> 
									 <span class="fs-11 ms-3 text-muted"> <i class="bi bi-person  text-sky"></i> By Admin</span>
								  </p>
								 {!! \Illuminate\Support\Str::limit($value->description ?? '',50,' ...') !!}
							   </div>
							</li>
						@endforeach
                         
                     </ul>
                  </div>
               
               </div>
            </div>
         </div>
      </section>
	  
	  

	
@endsection


