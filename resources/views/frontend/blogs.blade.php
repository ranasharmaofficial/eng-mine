@extends('frontend.layouts.master')
@section('title') Blogs @endsection

@section('meta_tags')
   <meta name="title" content="">
   <meta name="keywords" content="">
   <meta name="description" content="">
@endsection



@section('content')

@include('frontend.includes.header')
		<section class="blog-banner">
            <div class="container">
               <div class="blog-about">
                  <h2 class="breadcrumbs-custom-title text-white">Blog</h2>
                  <ul class="breadcrumbs-custom-path">
                     <li><a href="{{ url('') }}">Home<i class="fa fa-arrow-right px-2" aria-hidden="true"></i></a></li>
                     <li class="active" style="color:#ff008a;">Blog</li>
                  </ul>
               </div>
            </div>
         </section>
         <!-- /Breadcrumb -->
         <div class="content mt-0 ">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="row">
						@if(count($blogs)>0)
							@foreach($blogs as $key => $item)
								<div class="col-md-4 d-flex">
								   <!-- Blog Post -->
								   <div class="blog grid-blog flex-fill">
									  <div class="blog-image">
										 <a href="{{ route('blog.detail',$item->slug) }}">
											<img class="img-fluid" src="{{ static_asset($item->blog_image) }}" alt="Post Image">
										 </a>
									  </div>
									  <div class="blog-content">
										 <div class="blog-category">
											<ul>
											   <li><span class="cat-blog">Computer</span></li>
											   <li><i class="feather-calendar me-2"></i>28 Sep 2022</li>
											</ul>
										 </div>
										 <h3 class="blog-title">
											<a href="{{ route('blog.detail',$item->slug) }}">{{ $item->title }}</a>
										 </h3>
										 {!! \Illuminate\Support\Str::limit($item->description ?? '',150,' ...') !!}
										 <a href="{{ route('blog.detail',$item->slug) }}" class="btn btn-pink text-dark">Read More..</a>
									  </div>
								   </div>
								   <!-- /Blog Post -->
								</div>
							@endforeach
						@endif
                        
                     </div>
                  </div>
				  
				  <div class="col-md-12">
                           <div class="blog-pagination">
                              {{ $blogs->appends(request()->input())->links() }}
                           </div>
                        </div>
						
						
               </div>
            </div>
             	
         </div>
		 
	 
		 
   
@endsection


