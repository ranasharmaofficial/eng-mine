@extends('frontend.layouts.master');
@section('title') Hire A Team @endsection

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
                    <h5 class="text-white d-block fs-2 w-100 mb-2">Hire A Team</h5>
                    <span class="widget_title bg-white"></span>
                    <ol class="breadcrumb w-auto badge bg-light-transparent text-dark py-2 px-3 mt-2 mb-0">
                        <li class="breadcrumb-item text-white float-start d-inline-block py-1 fw-normal"><a href="#" class="text-white fs-15">Home</a></li>   
                        <li class="breadcrumb-item active text-white fs-15 float-start d-inline-block py-1 fw-normal" aria-current="page">Hire A Team</li>
                    </ol>
                </div>
            </nav>
        </div>
    </div>
	  
    <section class="py-5 company-core-value2 position-relative" >
        <div class="container position-relative z-index-99">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 col-md-12   ">
                    <div class="bg-white rounded text-center position-relative z-index-1 shadow-5">
                        <form enctype="multipart/form-data" method="post" class="rounded bg-white border border-sky-light mt-1 p-3" action="{{ route('home.storeHireTeam') }}" >
                            @csrf
                            <div class="base-header2 w-100 mt-3">
                                <h6 class=" pb-0 fs-25 fw-bold lsp-5 text-black text-capitalize text-center mt-3"> Hire A <span class="text-sky   fs-25 "> Team</span></h6>
                                <p class="fs-13 lsp-5  lh-base text-center">
                                    We recently helped a small business grow from break-even to over $1m profit in less than 2 years. Please find below contact details and contact us today!
                                </p>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-lg-12 mb10">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            <div class="col-md-6">
                                <div class="input-group has-validation mb-2 border-bottom">
                                <span class="input-group-text fs-20 bg-transparent text-black border-0 py-0"><i class="bi bi-person text-sky"></i></span>
                                <input type="text" class="form-control bg-transparent fs-13 text-black px-2 border-0 lsp-5 h-50px" id="validationCustom01" value="{{ old('name') }}" name="name" placeholder="Name" required="">
                                <div class="valid-feedback d-none">
                                    Looks good!
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group has-validation mb-2  border-bottom">
                                <span class="input-group-text fs-20  bg-transparent  text-black border-0  py-0 "><i class="bi bi-phone text-sky"></i></span>
                                <input type="number" class="form-control bg-transparent fs-13 text-black border-0  px-2 h-50px lsp-5" id="validationCustomUsername" value="{{ old('phone') }}" name="phone" placeholder="Phone No" required="">
                                <div class="invalid-feedback d-none">
                                    Please choose a username.
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group has-validation  mb-2  border-bottom">
                                <span class="input-group-text fs-20 bg-transparent  text-black border-0  py-0  "><i class="bi bi-envelope-at text-sky"></i></span>
                                <input type="email" class="form-control bg-transparent fs-13 text-black h-50px border-0 px-2 lsp-5" id="validationCustomUsername1" value="{{ old('email') }}" name="email" placeholder="Email Id" required="">
                                <div class="invalid-feedback d-none">
                                    Please choose a username.
                                </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="d-flex">
                                <label class="form-check-label fs-13 lsp-5 px-2  fw-bold  text-sky">Gender</label>
                                <div class="form-check form-check-inline fs-13 px-2">
                                    <input class="form-check-input mx-2" type="radio" checked name="gender" id="gander1" value="male">
                                    <label class="form-check-label text-muted">Male</label>
                                </div>
                                <div class="form-check form-check-inline fs-13 px-2">
                                    <input class="form-check-input mx-2" type="radio" name="gender" id="gander2" value="female">
                                    <label class="form-check-label text-muted">Female</label>
                                </div>
                                </div>
                            </div>
                            <div class="mb-3 fs-13 text-start">
                                <label for="formFile" class="px-2 text-muted">Upload Requirment sheet <small>(File accepted: .pdf, .doc/docx - Max file size: 150KB for demo limit)</small></label>
                            </div>
                            <div class="col-md-12">
                                <input class="form-control rounded  bg-transparent border border-gray fs-13 lsp-5 p-2" name="resume" type="file" id="formFile">
                            </div>
                            <div class="col-md-12">
                                <div class="input-group has-validation d-block  ">
                                <span class="input-group-text fs-13 d-flex align-items-center bg-transparent text-black border-0 text-start  py-0  mb-2"><i class="bi bi-layout-text-sidebar  text-sky fs-20 pe-3"></i> Massege</span> 
                                <textarea class="w-100 rounded h-100px fs-13  bg-transparent text-black d-block px-2 lsp-5 py-2 form-control border " name="message" placeholder=""></textarea>
                                <div class="invalid-feedback d-none">
                                    Please select a massege.
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0 m-0">
                                <div class="invalid-feedback d-none">
                                What Can we Do for you ?
                                </div>
                                <div class="row">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn bg-sky fs-13 border border-white px-3 h-40px lsp-5 text-white mb-3" type="submit">Submit form</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-12">
                    <div class="contact-information  p-4 rounded bg-white shadow-5">
                        <div class="base-header2 w-100 mt-0">
                            <h6 class=" pb-0 fs-25 fw-bold lsp-5 text-black text-capitalize text-center"> We Are <span class="text-sky   fs-25 "> Hiring</span></h6>
                            <p class="fs-13 lsp-5  lh-base text-center">
                                We recently helped a small business grow from break-even to over $1m profit in less than 2 years. Please find below contact details and contact us today!
                            </p>
                        </div>
                        <img src="{{ static_asset('assets/assets_web/img/blog1.png') }}" class="rounded h-500 w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>  
@endsection
        