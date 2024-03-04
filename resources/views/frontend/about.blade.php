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

    <section class="breadcrumbs-custom bg-image context-dark"
        style="background-image: url({{ static_asset('assets/assets_web/img/about-banner2.jpg') }}); height:369px; background-position:right; background-repeat: no-repeat; background-size: cover; padding-top:239px"
        data-preset="{&quot;title&quot;:&quot;Breadcrumbs&quot;,&quot;category&quot;:&quot;header&quot;,&quot;reload&quot;:false,&quot;id&quot;:&quot;breadcrumbs&quot;}">
        <div class="container">
            <div>
                <h2 class="breadcrumbs-custom-title text-white">About Us</h2>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{ url('') }}">Home<i class="fa fa-arrow-right px-2" aria-hidden="true"></i></a></li>
                    <li class="active" style="color:#ff008a;">About Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!---------------------close section-------------------->
    <!-----------------About ------------------------------->
    @if (isset($section_lists))
        @foreach ($section_lists as $section)
            @if ($section->section_name == 'about_section_1')
                <section class="About-area py-5" data-padding-top="70" data-padding-bottom="140">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 margin-top-30">
                                <div class="about-thumb-content">
                                    <div class="about-shape">
                                        <img src="{{ static_asset('assets/assets_web/img/about-shape1644902293.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="about-thumb">
                                        <img src="{{ static_asset($section->image) }}" class="img-fluid" alt="img">
                                        <div class="about-experience">
                                            <h2 class="years-tiitle">8 Years </h2>
                                            <h4 class="experience-tiitle"> Experience </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 margin-top-30">
                                <div class="single-about">
                                    <div class="section-heading section-heading-six mb-0">

                                        <div class="reason-six server-photos">
                                            <img src="{{ static_asset('assets/assets_web/img/technology.png') }}"
                                                alt="tech-img" style="height: 50px;">
                                            <p>Best server mantinance service</p>
                                        </div>
                                        <h2><span>{{ $section->title }}</h2>

                                    </div>

                                    <div class="about-contents">
                                        {!! $section->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!----------------------close About Section----------------------->
                <!-------- Work Section --------------->
                <section class="work-section work-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="section-heading how-work-it">
                                    <h2>How It <span>Works</span></h2>
                                    <p>We are courteous with our client. We use doctrine of honesty & hassle-free service.
                                        We are best
                                        for our qualitative results. We are transparent & trustworthy. We like to create
                                        positive vibe &
                                        client friendly.</p>
                                </div>
                            </div>
                        </div>
                        @php
                            $about_sec_wise_data1 = get_section_wise_data($page->id, $section->id);
                            // dd($about_sec_wise_data1);
                        @endphp
                        <div class="row">
                            @foreach ($about_sec_wise_data1 as $key => $value)
                                <div class="col-md-4">
                                    <div class="work-box">
                                        <div class="work-icon">
                                            <span>
                                                <img src="{{ static_asset($value->img) }}" alt="img">
                                            </span>
                                        </div>
                                        <h5>{{ $value->title }}</h5>
                                        {!! $value->description !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
            <!----------------------- /Work Section----------------- -->
            <!---------------------- Choose Us Section-------------- -->
            @if ($section->section_name == 'about_section_3')
                @php
                    $about_sec_wise_data3 = get_section_wise_data($page->id, $section->id);
                @endphp
                <div class="chooseus-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="choose-content how-work-it">
                                    <h2><span>Reasons to choose</span> Engineers mine</h2>
                                    <p>Step in to look great! We have the best services and offers waiting for you!</p>
                                    @foreach ($about_sec_wise_data3 as $key => $value)
                                        <div class="support-card">
                                            <h4 class="support-title">
                                                <a class="collapsed" data-bs-toggle="collapse"
                                                    href="#aboutone{{ $key + 1 }}"
                                                    aria-expanded="false">{{ $value->title }}</a>
                                            </h4>
                                            <div id="aboutone{{ $key + 1 }}"
                                                class="card-collapse collapse @if ($key + 1 == 1) show @endif">
                                                {!! $value->description !!}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="chooseus-img choose-photos mt-5">
                                    <img src="{{ static_asset($section->image) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/assets_web/placeholder.jpg') }}';" class="img-fluid" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="choose-icon">
                                    <img src="{{ static_asset('assets/assets_web/img/icons/choose-icon.svg')}}" class="img-fluid" alt="img">
                                    <div class="choose-info">
                                        <h5>200+</h5>
                                        <p>Registered Engineer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="choose-icon">
                                    <img src="{{ static_asset('assets/assets_web/img/icons/choose-icon-01.svg')}}" class="img-fluid" alt="img">
                                    <div class="choose-info">
                                        <h5>2383+</h5>
                                        <p>Expert Team</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="choose-icon">
                                    <img src="{{ static_asset('assets/assets_web/img/icons/choose-icon.png')}}" class="img-fluid" alt="img">
                                    <div class="choose-info">
                                        <h5>150+</h5>
                                        <p>Registered Clients</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="choose-icon border-0">
                                    <img src="{{ static_asset('assets/assets_web/img/icons/choose-icon-03.svg')}}" class="img-fluid" alt="img">
                                    <div class="choose-info">
                                        <h5>600+</h5>
                                        <p>Successfully Jobs</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
    <!---------------------- /Choose Us Section-------------->
    <!----------------------- Providers Section ------------>
    @if ($section->section_name == 'about_section_4')
        @php
            $about_sec_wise_data4 = get_section_wise_data($page->id, $section->id);
        @endphp
        <section class="providers-section-two pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 how-work-it pb-3">
                        <h2 class="text-center text-white">{{ $section->title }}</h2>
                        <p class="text-center text-white">{!! $section->description !!}</p>
                    </div>
                </div>
                <div class="row aos aos-init aos-animate" data-aos="fade-up">
                    @foreach ($about_sec_wise_data4 as $key => $value)
                        <div class="col-lg-3 col-sm-6">
                            <div class="providerset provider-box">
                                <div class="providerset-img">
                                    <a href="javascript:void();">
                                        <img src="{{ static_asset($value->img) }}" alt="img">
                                    </a>
                                </div>
                                <div class="providerset-content">
                                    <div class="providerset-price d-block">
                                        <div class="providerset-name text-center">
                                            <h4><a href="javascript:void();">{{ $value->title }}</a></h4>
                                            <span>{!! $value->description !!}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @include('frontend.partials.testimonial-section')

    @if (false)
        <div class="banner-main position-relative py-5 h-470 z-index-99"
            Style="background-image:url({{ static_asset('assets/assets_web/img/bg-home1.webp') }});">
            <div class="container h-100">
                <nav aria-label="breadcrumb"
                    class=" h-100 w-100 d-flex align-items-center justify-content-start pt-5 mt-5">
                    <div class="w-100 d-flow-root ">
                        <h5 class="text-white d-block fs-2 w-100 mb-2">{{ $page->title }}</h5>
                        <span class="widget_title bg-white"></span>
                        <ol class="breadcrumb w-auto badge bg-light-transparent text-dark py-2 px-3 mt-2 mb-0">
                            <li class="breadcrumb-item text-white float-start d-inline-block py-1 fw-normal"><a
                                    href="{{ url('') }}" class="text-white fs-15">Home</a></li>
                            <li class="breadcrumb-item active text-white fs-15 float-start d-inline-block py-1 fw-normal"
                                aria-current="page">{{ $page->title }}</li>
                        </ol>
                    </div>
                </nav>
            </div>
        </div>
        @if (isset($section_lists))
            @foreach ($section_lists as $section)
                @if ($section->section_name == 'about_section_1')
                    <!-- about start -->
                    <section
                        class="about-wrapper py-5 bg-light-green dedocatopd bg-light-green position-relative overflow-hidden">
                        <div class="container position-relative z-index-99">
                            <div class="row flex-row-reverse align-items-center">
                                <div class="col-lg-5 mb-40 mb-lg-0">
                                    <div class="rounded overflow-hidden   mb-5 rounded animated" data-wow-delay="0.3s"
                                        style="visibility: visible; animation-delay: 0.3s;">
                                        <div class="about-img3 position-relative"><img
                                                src="{{ static_asset($section->image) }}" alt="About Image"
                                                class="w-100 h-450">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 align-self-center">
                                    <div class="about-content mb-0">

                                        <div class="base-header2 mb-0 pb-2">
                                            <h6 class=" pb-0 fs-25 fw-bold lsp-5 text-black text-capitalize text-start">
                                                {{ $section->title }}</h6>
                                            <div class="pt-2">

                                            </div>
                                        </div>
                                        {!! $section->description !!}
                                    </div>
                                </div>
                            </div>
                            @php
                                $about_sec_wise_data1 = get_section_wise_data($page->id, $section->id);
                                // dd($about_sec_wise_data1);
                            @endphp
                            <div class="row mt-3">
                                @foreach ($about_sec_wise_data1 as $key => $value)
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 pb-3">
                                        <div
                                            class="counter-block  bg-white shadow-5 rounded p-3 text-center bg-white h-250  transition pt-4">
                                            <div class="icon  rounded-circle   mx-auto ">
                                                <span>
                                                    <img src="{{ static_asset($value->img) }}" alt="Orrish"
                                                        class="w-50px h-50px filter1 mt-1 mt-2 p-1">
                                                </span>
                                            </div>
                                            <div class="info">
                                                <h6 class="fs-16 mt-3 mb-2 text-capitalize fw-bold  text-sky lsp-5px">
                                                    {{ $value->title }}</h6>
                                                {!! $value->description !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <!-- about end -->
                @endif
                @if ($section->section_name == 'about_section_2')
                    <section class="py-0 testimonials bg-img small banner company-core-value2 "
                        style="background-size:contain;background-image: url({{ static_asset('assets/assets_web/img/background-new.png') }});">
                        <div class="container py-5">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="cover py-2 ">
                                        <div class="header-content ps-0 pb-5 pt-5 ms-0">
                                            <h6 class="text-white fs-16  mb-3 text-uppercase lsp-3px ">
                                                {{ $section->title }} </h6>

                                            {!! $section->description !!}
                                            <ul class="nav  d-flex flex-wrap align-items-start justify-content-start">
                                                <li class="list-unstyled d-inline-block fs-13 me-3">
                                                    <a href="#"
                                                        class="btn bg-dark text-white fs-13 lsp-5  py-2 w-150">
                                                        View All
                                                        Product <i class="bi bi-arrow-right fw-bold"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="about-img3 position-relative pe-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif

                @if ($section->section_name == 'about_section_3')
                    @php
                        $about_sec_wise_data3 = get_section_wise_data($page->id, $section->id);
                    @endphp
                    <!-- why choose us -->
                    <section class="vs-accordion-wrapper1 space pt-5 pb-5 bg-light-green">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-5 col-lg-5">
                                    <div class="vs-accordion1 accordion" id="vsaccordion">
                                        @foreach ($about_sec_wise_data3 as $key => $value)
                                            <div class="accordion-item py-0 mb-0 bg-white border px-3 mb-1 rounded">
                                                <h2 class="accordion-header">
                                                    <button
                                                        class="accordion-button fs-16 fw-bold lsp-5 text-black  text-capitalize px-0 bg-transparent"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $key + 1 }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse{{ $key + 1 }}">{{ $value->title }}</button>
                                                </h2>
                                                <div id="collapse{{ $key + 1 }}"
                                                    class="accordion-collapse collapse @if ($key + 1 == 1) show @endif"
                                                    data-bs-parent="#vsaccordion" style="">
                                                    <div class="accordion-body px-0">

                                                        <div class="h-90px overflow-y scrollbar-width mb-0">
                                                            {!! $value->description !!}</div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                                <div class=" col-lg-7 col-xl-7 pb-10 pb-xl-0 mb-50 mb-xl-0">
                                    <div class="base-header2 mb-0 pb-2 pt-md-4 pt-4 pt-lg-0">
                                        <h6 class=" pb-0 fs-25 fw-bold lsp-5 text-black   text-capitalize text-start">
                                            {{ $section->title }}</h6>
                                        {!! $section->description !!}

                                    </div>

                                </div>

                            </div>
                        </div>
                    </section>
                @endif


                @if ($section->section_name == 'about_section_4')
                    <section class="py-5 bg-dark">
                        <div class="container ">
                            <div style="text-align:center;" class="base-header2 w-75 mx-auto mb-3">
                                <h6 class=" pb-0 fs-25 fw-bold lsp-5 text-white text-capitalize text-center">
                                    {{ $section->title }}</h6>
                                {!! $section->description !!}
                            </div>
                            <div
                                class="owl-carousel owl-theme agents-carousel position-relative w-100 z-index-0 px-3 rowfff">
                                @foreach ($team_list as $key => $value)
                                    <div class="item position-relative p-2">
                                        <div
                                            class="counter-block  rounded  text-center bg-light border h-auto transition p-1">
                                            <div class="overflow-hidden rounded imgage-img">
                                                <img src="{{ static_asset($value->profile_pic) }}" alt="Orrish"
                                                    class="w-auto mx-auto h-175px transition mt-3">
                                            </div>
                                            <div class="position-relative w-100 bg-dark rounded ">
                                                <div
                                                    class="social-shear position-absolute bg-muted py-1 z-index-9 w-100 top-0 start-50 translate-middle ">
                                                    <div class="team-info-icons w-100">
                                                        <ul
                                                            class="nav1 p-0 m-0 d-flex list-style-none justify-content-center">
                                                            <li class="nav-item mx-2"><a href="#"
                                                                    class="nav-link link-dark px-2 py-1  fs-13 lsp-5 rounded-3 text-center bg-facebook  "><i
                                                                        class="fab fa fa-facebook text-white"></i>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item mx-2"><a href="#"
                                                                    class="nav-link link-dark px-2 py-1  fs-13 lsp-5 rounded-3  text-center bg-twitter">
                                                                    <i class="fab fa fa-twitter text-white"></i>
                                                                </a></li>
                                                            <li class="nav-item mx-2"><a href="#"
                                                                    class="nav-link link-dark px-2 py-1  fs-13 lsp-5 rounded-3  text-center  bg-linkedin">
                                                                    <i class="fab fa fa-linkedin text-white"></i>
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="info pb-3 pt-2">
                                                    <h6
                                                        class="fs-15 mt-0 pt-4 mb-1 fw-bold text-capitalize text-sky lsp-1px">
                                                        {{ $value->name }}</h6>
                                                    <p class="text-white h-auto overflow-y scrollbar-width mb-0">
                                                        {{ $value->designation }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </section>
                @endif
            @endforeach
        @endif
        @include('frontend.partials.testimonial-sections')         		
        <div class="bg-dark">
            @include('frontend.partials.blog_section')
        </div>
        @if (isset($section_lists))
            @foreach ($section_lists as $section)
                @if ($section->section_name == 'about_section_5')
                    <!-- partners start -->
                    <section class="py-5 bg-light-green">
                        <div class="container">
                            <div style="text-align:center;" class="base-header2 w-75 mx-auto mb-3">
                                <h6 class=" pb-0 fs-25 fw-bold lsp-5 text-black text-capitalize text-center">
                                    {{ $section->title }}</h6>

                                {!! $section->description !!}
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row testi-big justify-content-center">
                                        @foreach ($partner_list as $row)
                                            <!-- item 1 -->
                                            <div class="col-sm-12 col-md-6 col-lg-2">
                                                <div class="bg-white shadow-5  m-2 rounded ">
                                                    <img class="w-100 h-auto px-3 mx-auto"
                                                        src="{{ static_asset($row->image) }}" alt="">
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- partners end -->
                @endif
            @endforeach
        @endif						<!-- Our Certified Engineer Sectin Start -->    <section class="certified-engineer py-5" style="background:#0c112a;">        <div class="container">            <div class="row">                <h2 class="text-center text-white mb-2">Our Clients</h2>                @foreach(getCertifiedEngineer() as $item)					<div class="col-12 col-sm-6 col-md-4 col-lg-2 my-2">						<img src="{{ static_asset('uploads/'.$item->logo) }}" alt="" class="img-fluid rounded d-block mx-auto">					</div>				@endforeach			</div>		</div>    </section>    <!-- /Our Certified Engineer Sectin End -->
    @endif
@endsection
