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
@endsection

@section('content')

@include('frontend.includes.header')

    <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url({{ static_asset('assets/assets_web/img/about-banner2.jpg') }}); height:369px; background-position:right; background-repeat: no-repeat; background-size: cover; padding-top:239px"
        data-preset="{&quot;title&quot;:&quot;Breadcrumbs&quot;,&quot;category&quot;:&quot;header&quot;,&quot;reload&quot;:false,&quot;id&quot;:&quot;breadcrumbs&quot;}">
        <div class="container">			<div>				<h2 class="breadcrumbs-custom-title text-white">{{ $page->title }}</h2>				<ul class="breadcrumbs-custom-path">					<li><a href="{{ url('') }}">Home<i class="fa fa-arrow-right px-2" aria-hidden="true"></i></a></li>					<li class="active" style="color:#ff008a;">{{ $page->title }}</li>				</ul>			</div>		</div>	</section>
    <!---------------------close section-------------------->
    <!-----------------About ------------------------------->
    			 				<section class="About-area py-5" data-padding-top="70" data-padding-bottom="140">					<div class="container">						<div class="row">							<div class="col-lg-12 margin-top-30">								<div class="single-about">									<div class="section-heading section-heading-six mb-0">										<div class="reason-six server-photos">											<img src="{{ static_asset('assets/assets_web/img/technology.png') }}" alt="tech-img" style="height: 50px;">										</div>										<h2><span>{{ $section_lists->title }}</h2>									</div>									<div class="about-contents">										{!! $section_lists->description !!}									</div>								</div>							</div>						</div>					</div>				</section>			 	 	 @endsection
