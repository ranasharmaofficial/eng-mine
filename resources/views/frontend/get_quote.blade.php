@extends('frontend.layouts.master')
@section('title') Refund Policy @endsection
 
 
@section('content')
  
     <div class="banner-main position-relative py-5 h-470 z-index-99" Style="background-image:url({{ static_asset('assets/assets_web/img/bg-home1.webp') }});">
         <div class="container h-100">
            <nav aria-label="breadcrumb" class=" h-100 w-100 d-flex align-items-center justify-content-start pt-5 mt-5">
               <div class="w-100 d-flow-root ">
                  <h5 class="text-white d-block fs-2 w-100 mb-2">Get In Quote</h5>
                  <span class="widget_title bg-white"></span>
                  <ol class="breadcrumb w-auto badge bg-light-transparent text-dark py-2 px-3 mt-2 mb-0">
                     <li class="breadcrumb-item text-white float-start d-inline-block py-1 fw-normal"><a href="{{ url('') }}" class="text-white fs-15">Home</a></li> 
                     <li class="breadcrumb-item active text-white fs-15 float-start d-inline-block py-1 fw-normal" aria-current="page">Get In Quote</li>
                  </ol>
               </div>
            </nav>
         </div>
      </div>
	<section class="py-5 company-core-value2 position-relative" >
         <div class="container position-relative z-index-99">
         <div class="row align-items-center">
            <div class="col-xl-9 col-lg-9 col-md-12  mx-auto ">
               <div class="bg-white rounded text-center position-relative z-index-1 shadow-5 get-in-quote">
                  <form action="{{ route('postQuoteData') }}" method="post" enctype="multipart/form-data" class="rounded  needs-validation bg-white border border-sky-light mt-1 p-3 " novalidate="">
				  @csrf
						<div class="base-header2 w-100 mt-3">
                           <h6 class=" pb-0 fs-25 fw-bold lsp-5 text-black text-capitalize text-center mt-3"> Get  <span class="text-sky   fs-25 "> In Quote</span></h6>
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
                           <input type="text" class="form-control bg-transparent fs-13 text-black px-2 border-0 lsp-5 h-50px" id="validationCustom01" name="name" value="{{ old('name') }}" placeholder="Name">
                           <div class="valid-feedback d-none">
                              Looks good!
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="input-group has-validation mb-2  border-bottom">
                           <span class="input-group-text fs-20  bg-transparent  text-black border-0  py-0 "><i class="bi bi-phone text-sky"></i></span>
                           <input type="number" class="form-control bg-transparent fs-13 text-black border-0  px-2 h-50px lsp-5" id="validationCustomUsername" value="{{ old('phone') }}" name="phone" placeholder="Phone No">
                           <div class="invalid-feedback d-none">
                              Please choose a username.
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="input-group has-validation  mb-2  border-bottom">
                           <span class="input-group-text fs-20 bg-transparent  text-black border-0  py-0  "><i class="bi bi-envelope-at text-sky"></i></span>
                           <input type="email" class="form-control bg-transparent fs-13 text-black h-50px border-0 px-2 lsp-5" id="validationCustomUsername1" value="{{ old('email') }}" name="email" placeholder="Email Id">
                           <div class="invalid-feedback d-none">
                              Please choose a username.
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="input-group has-validation mb-2  border-bottom">
                           <span class="input-group-text fs-20  bg-transparent text-black border-0   py-0  "><i class="bi bi-envelope-at text-sky"></i></span>
                           <input type="email" class="form-control  bg-transparent fs-13 text-black h-50px border-0  px-2 lsp-5" id="validationCustomUsername1" value="{{ old('skype') }}" name="skype" placeholder="Skype ID / Whatsapp No.">
                           <div class="invalid-feedback d-none">
                              Please choose a username.
                           </div>
                        </div>
                     </div>
                     
                     <div class="col-md-12">
                        <div class="input-group has-validation d-block  ">
                           <span class="input-group-text fs-13 d-flex align-items-center bg-transparent text-black border-0 text-start  py-0  mb-2"><i class="bi bi-layout-text-sidebar  text-sky fs-20 pe-3"></i> Massege</span> 
                           <textarea name="message" class="w-100 rounded h-100px fs-13  bg-transparent text-black d-block px-2 lsp-5 py-2 form-control border " placeholder=""></textarea>
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
			 
         </div>
      </div>
      </section>
	
@endsection
