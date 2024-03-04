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

		@include('frontend.includes.header')

		<section class="blog-banner">
         <div class="container">
            <div class="blog-about">
               <h2 class="breadcrumbs-custom-title text-white">Testimonial</h2>
               <ul class="breadcrumbs-custom-path">
                  <li><a href="{{ url('') }}">Home<i class="fa fa-arrow-right px-2" aria-hidden="true"></i></a></li>
                  <li class="active" style="color:#ff008a;">Testimonial</li>
               </ul>
            </div>
         </div>
        </section>
      <!-- /Breadcrumb -->
      <div class="content mt-0 mb-3 testimonials-section">
         <div class="container">
            <div class="section-heading section-heading-six mb-3 text-center">
				<div class="reason-six server-photos text-center justify-content-center">
                  <img src="{{ static_asset('assets/assets_web/img/tester.png')}}" alt="img" style="height:50px;">
                  <p>Testimonial</p>
				</div>
               <h2 class=" text-center"><span>Client Are </span>Says</h2>
			</div>
			@if (count(testimonialList()) > 0)
				<div class="row">
				   <div class="col-12">
					  <div class="row">
						@foreach (testimonialList() as $key => $item)
						 <div class="col-md-4 d-flex">
							<div class="customer-review-main-six mb-0">
							   <div class="customer-review-top">
								  <img src="{{ static_asset($item->img) }}" alt="">
								  <h5>{{ $item->name }}</h5>
								 {!! $item->designation !!}
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
						@endforeach
						  

					  </div>
				   </div>
				</div>
			@endif
         </div>
      </div>
@endsection
