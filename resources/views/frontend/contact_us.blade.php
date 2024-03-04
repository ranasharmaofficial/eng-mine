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

@php

    $contact_working_hr = get_business_single_cache_value('contact_working_hr', 'footer_setup', 'contact_working_hr');
    $contact_email = get_business_single_cache_value('contact_email', 'footer_setup', 'contact_email');
    $contact_phone = get_business_single_cache_value('contact_phone', 'footer_setup', 'contact_phone');
    $contact_address = get_business_single_cache_value('contact_address', 'footer_setup', 'contact_address');

    $corporate_address = get_business_single_cache_value('corporate_address', 'footer_setup', 'corporate_address');
    $corporate_address_phone = get_business_single_cache_value('corporate_address_phone', 'footer_setup', 'corporate_address_phone');
    $corporate_address_email = get_business_single_cache_value('corporate_address_email', 'footer_setup', 'corporate_address_email');

    $registered_address = get_business_single_cache_value('registered_address', 'footer_setup', 'registered_address');
    $registered_address_phone = get_business_single_cache_value('registered_address_phone', 'footer_setup', 'registered_address_phone');
    $registered_address_email = get_business_single_cache_value('registered_address_email', 'footer_setup', 'registered_address_email');

    $leads_uk_address = get_business_single_cache_value('leads_uk_address', 'footer_setup', 'leads_uk_address');
    $leads_uk_address_phone = get_business_single_cache_value('leads_uk_address_phone', 'footer_setup', 'leads_uk_address_phone');

@endphp

@section('content')

@include('frontend.includes.header')

    <div class="bg-img">
        <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png') }}" alt="img" class="bgimg1">
        <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png') }}" alt="img" class="bgimg2">
        <img src="{{ static_asset('assets/assets_web/img/bg/feature-bg-03.png') }}" alt="img" class="bgimg3">
    </div>
    <!-- Breadcrumb -->
    <section class="contact-banner">
        <div class="container">
            <div class="blog-about">
                <h2 class="breadcrumbs-custom-title text-white">Contact</h2>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{ url('') }}">Home<i class="fa fa-arrow-right px-2" aria-hidden="true"></i></a></li>
                    <li class="active" style="color:#ff008a;">{{ $page->title }} </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- /Breadcrumb -->
    @if (isset($section_lists))
        @foreach ($section_lists as $section)
            @if ($section->section_name == 'contact_us_section1')
                <div class="section-heading aos aos-init aos-animate text-center mt-5 mb-0" data-aos="fade-up">
                    <h2>Get In <span>Touch</span></h2>
                    {!! $section->description !!}
                </div>

                <div class="content">
                    <div class="container">
                        <!-- Contact Details -->
                        <div class="contact-details">
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-4 d-flex">
                                    <div class="contact-info flex-fill">
                                        <span class="bg-primary bg-opacity-25"><i
                                                class="bi bi-telephone-inbound"></i></span>
                                        <div class="contact-data">
                                            <h4>Phone Number</h4>
                                            <p>{{ $contact_phone }}</p>
                                            {{-- <p>+91-9874563201</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 d-flex">
                                    <div class="contact-info flex-fill">
                                        <span class="bg-primary bg-opacity-25"><i class="fa fa-envelope"></i></span>
                                        <div class="contact-data">
                                            <h4>Email Address</h4>
                                            <p>{!! $contact_email !!}</p>
                                            {{-- <p>info@gmail.com</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 d-flex">
                                    <div class="contact-info flex-fill">
                                        <span class="bg-primary bg-opacity-25"><i class="fa fa-map-marker"></i></span>
                                        <div class="contact-data">
                                            <h4>Address</h4>
                                            <p>{{ $corporate_address }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Contact Details -->
                        <!-- Get In Touch -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="contact-img">
                                    <img src="{{ static_asset('assets/assets_web/img/new/calling.png') }}"
                                        class="img-fluid ms-1" alt="img">
                                </div>
                            </div>
                            <div class="col-md-6">																
                                <div class="contact-queries">
                                    <h2>Send Us A Massage</h2>
                                    <form method="post" action="{{ route('contact.enquiry') }}" enctype="multipart/form-data" class="contact-form">
                                        @csrf								@if ($errors->any())								@php									dd($errors->all());								@endphp                                <div class="alert alert-danger">                                    <ul>                                        @foreach ($errors->all() as $error)                                            <li>{{ $error }}</li>                                        @endforeach                                    </ul>                                </div>								@endif								
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="name" placeholder="Enter Name*">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="email" name="email"
                                                        placeholder="Enter Email Address*">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="contact"
                                                        placeholder="Enter Phone Number">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="4" name="message" placeholder="Type Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 ">
                                                <button class="btn btn-primary text-white bt-hover" type="submit">Send
                                                    Message
                                                    &nbsp; &nbsp; <i class="bi bi-arrow-right-short"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Get In Touch -->
                    </div>
                </div>
            @endif
        @endforeach
    @endif
    <!-- Map -->
    <div class="map-grid contact-map ">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d448193.95104007213!2d76.76356507761483!3d28.644287351205126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347eb62d%3A0x37205b715389640!2sDelhi!5e0!3m2!1sen!2sin!4v1692863117814!5m2!1sen!2sin"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
 
@endsection
