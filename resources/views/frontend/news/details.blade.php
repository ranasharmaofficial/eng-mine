@extends('frontend.layouts.master');
@section('title') {{$post->meta_title}} @endsection

@section('meta_tags')
  <meta name="title" content="{{$post->meta_title}}">
  <meta name="keywords" content="{{$post->meta_tag}}">
  <meta name="description" content="{{$post->meta_description}}">
@endsection 

@section('content')

<div class="banner-main position-relative py-5 h-470" Style="background-image:url({{ static_asset('assets/assets_web/img/bg-home1.webp')}});">
			<div class="container h-100">
			 <nav aria-label="breadcrumb" class=" h-100 w-100 d-flex align-items-center justify-content-start pt-5 mt-5">
			<div class="w-100 d-flow-root ">		
				  <h5 class="text-white d-block fs-2 w-100 mb-2">News</h5>
				  <span class="widget_title bg-white"></span>
				  <ol class="breadcrumb w-auto badge bg-light-transparent text-dark py-2 px-3 mt-2 mb-0">
					<li class="breadcrumb-item text-white float-start d-inline-block py-1 fw-normal"><a href="{{ url('') }}" class="text-white fs-15">Home</a></li>  
					<li class="breadcrumb-item text-white float-start d-inline-block py-1 fw-normal"><a href="{{ url('news') }}" class="text-white fs-15">News</a></li>  
					<li class="breadcrumb-item active text-white fs-15 float-start d-inline-block py-1 fw-normal" aria-current="page">News Detail</li>
				  </ol>
			</div>
			</nav>
         </div>
      </div>
      <section class="blog-area py-5  company-core-value2 position-relative">
         <div class="container-fluid px-5 position-relative z-index-99">
            <div class="row">
               <div class="col-xl-9 col-lg-9 col-md-12">
                  <div class="blog-inners">
                     <h6 class=" pb-0 fs-25 fw-bold lsp-5 text-black text-capitalize text-start">{{ $post->title }}</h6>
                     <div class="single-post-header fl-wrap mt-0 d-flex justify-content-between align-items-center  pb-3 border-top pt-3 mb-3">
                        <div class="author-link d-inline-flex align-items-center">
                           <a href="javascript:void(0);">
                           <img src="{{ static_asset('assets/assets_web/img/contact-us.webp')}}" alt="Orrish" class=" w-30px h-30px rounded-circle"> <span class="fs-13 pb-2 text-black mb-0 fw-normal ms-1">Posted by : admin</span></a>
                           <span class="post-date  mx-2  fs-13 d-inline-block align-items-center text-black mb-0 fw-normal"><i class="bi bi-clock fs-18 text-skype"></i> Updated 09-Jul-2022</span>
                        </div>
                        <ul class="post-opt d-flex align-items-center list-group-horizontal list-group">
                           <li class="list-group-item fs-13 lsp-5 text-sky"><i class="bi bi-chat-left-text"></i> 4 </li>
                           <li class="list-group-item fs-13 lsp-5 text-sky"><i class="bi bi-eye"></i> 980 </li>
                        </ul>
                     </div>
                     <img class="blog-img w-100 h-400 rounded bg-light border-sky-light border p-1" src="{{ static_asset($post->blog_image)}}" alt="img1">
                     <div class="base-header2 mb-4 mt-4">
						{!! $post->description !!}
                     </div>
                     <div>
                         
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-12">
                  <div class="form-right-box text-center bg-white p-3 rounded-3 shadow-5 text-center mb-3">
                     <h6 class=" pb-0 fs-16 fw-bold lsp-5 text-black text-capitalize text-start"> Recent  <span class="text-sky   fs-16 ">News</span></h6>
                     <ul class="list-group mt-0 mb-2 text-start">
                         
						@foreach($recent_posts as $key => $value)
						<li class="list-group-item border-0 px-0 d-flex align-items-center pb-0">
                           <img src="{{ static_asset($value->blog_image)}}" alt="{{$value->title}}" class="w-70px h-70px mb-2  mx-1 border-skype p-1 shadow rounded"> 
                           <div class=" ps-2 w-75">
                              <span class="fs-13 lsp-5 text-black fw-bold d-block white-space  text-capitalize pb-0">{{$value->title}}</span>
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
                              <span class="fs-13 lsp-5 text-black fw-bold d-block text-capitalize white-space">{{$value->title}}</span>
                              <p class="d-flex justify-content-start mb-0 w-100 fs-11 fw-bold my-1 text-muted"><span class="fs-11 text-muted"><i class="bi bi-calendar3  text-sky"></i> {{ convert_datetime_to_date_format($value->created_at, 'd M Y') }} </span> 
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