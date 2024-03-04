@extends('frontend.layouts.master')
@section('title') Faq  @endsection

 

@section('content')

		@include('frontend.includes.header')

		<section class="breadcrumbs-custom bg-image context-dark"
         style="background-image: url({{ static_asset('assets/assets_web/img/about-banner2.jpg')}}); height:369px; background-position:right; background-repeat: no-repeat; background-size: cover; padding-top:239px"
         data-preset="{&quot;title&quot;:&quot;Breadcrumbs&quot;,&quot;category&quot;:&quot;header&quot;,&quot;reload&quot;:false,&quot;id&quot;:&quot;breadcrumbs&quot;}">
         <div class="container">
            <div>
               <h2 class="breadcrumbs-custom-title text-white">Faq</h2>
               <ul class="breadcrumbs-custom-path">
                  <li><a href="{{ url('') }}">Home<i class="fa fa-arrow-right px-2" aria-hidden="true"></i></a></li>
                  <li class="active" style="color:#ff008a;">Faq</li>
               </ul>
            </div>
         </div>
      </section>
      <!-- /Breadcrumb -->
      <div class="content">
         <div class="container">
            <div class="col-md-6 mx-auto">
               <div class="section-heading section-heading-six mb-3 text-center">

                  <div class="reason-six server-photos text-center justify-content-center">
                     <!-- <img src="assets/img/technology.png" alt="" height="50px"> -->
                     <!-- <i class="fa fa-question-circle me-2 fa-xl text-primary2" aria-hidden="true"></i>
                           <p>Faq</p> -->
                  </div>
                  <h2 class=" text-center mb-3"><span>Frequently asked </span>questions</h2>
                  <p>If you cannot find answer to your question in our FAQ, you can always contact us. We wil answer to
                     you shortly!</p>

               </div>

            </div>
            <div class="row">
               <!-- Faq List -->
               <div class="col-md-11 mx-auto">
                  <div class="faq-section mb-3">
					@foreach($faqList as $key => $item)
                     <div class="faq-card">
                        <h4 class="faq-title">
                           <a class="collapsed" data-bs-toggle="collapse" href="#faqOne{{$key+1}}" aria-expanded="false"> {{ $item->question }} <i class="bi bi-plus-circle-fill fs-5"></i></a>
                        </h4>
                        <div id="faqOne{{$key+1}}" class="card-collapse collapse">
                           {!! $item->answer !!}
                        </div>
                     </div>
					@endforeach
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
@endsection
