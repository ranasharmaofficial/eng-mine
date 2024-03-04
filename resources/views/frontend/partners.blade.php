@extends('frontend.layouts.master');
@section('title') @if($page) {{$page->meta_title}} @endif @endsection

@section('meta_tags')
    @if($page)
    <meta name="title" content="{{$page->meta_title}}">
    <meta name="keywords" content="{{$page->meta_tag}}">
    <meta name="description" content="{{$page->meta_description}}">
    @endif
@endsection 

@section('content')
    <div class="text-center bg-overlay-dark-7 py-7" style="background:url(assets/assets_web/images/02.jpg) no-repeat; background-size:cover; background-position: top center;">
        <div class="container">
            <div class="row all-text-white">
                <div class="col-md-12 align-self-center">
                <h1 class="fw-bold">Partners</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item active"><a href="{{url('index')}}"><i class="ti-home"></i> Home</a></li>
                        <li class="breadcrumb-item">Partners</li>
                    </ol>
                </nav>
                </div>
            </div>
        </div>
    </div>

    @if(isset($section_lists))
        @foreach($section_lists as $section)
            @if($section->section_name == "partners_section_1")
                <section class="graybg">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-6 mx-auto">
                                <div class="title1 text-start">
                                    <h3 class="mb-0">{{$section->title}}</h3>
                                    <span class="ulines position-relative d-block mb-3 mt-0">&nbsp;</span>
                                    {!! $section->description !!}
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mx-auto">
                                <img class="rounded mt-4 shadow-hover up-on-hover w-100" src="{{$section->image}}" alt="">
                            </div>
                        </div>

                    </div>

                </section>
            @endif 

            @if($section->section_name == "partners_section_2")
                <section>
                    <div class="container">
                        <div class="row" data-aos="fade-up">
                            <div class="col-12 col-lg-12  mx-auto">
                                <div class="title text-center  ">
                                    <!--<span class="pre-title">Have any questions?</span>-->
                                    <h2>{{$section->title}}</h2>
                                    {!! $section->description !!}
                                </div>
                            </div>
                        </div>
                        @php 
                            $partners_sec_wise_data2 = get_section_wise_data('partners_sec_wise_data2', $section->id);
                        @endphp

                        @if($partners_sec_wise_data2->isNotEmpty())   
                            <div class="tiny-slider dots-dark arrow-large arrow-round arrow-bordered parterner-view mt-0">
                                <div class="tiny-slider-inner testi-full testi-big" data-gutter="9" data-arrow="true" data-dots="false"
                                    data-autoplay="false" data-items-xl="4" data-items-lg="4" data-items-md="2" data-items-sm="1"
                                    data-items="1">
                                    
                                    @foreach($partners_sec_wise_data2 as $key => $value)
                                        <div class="item">
                                            <div class="shadow m-2 rounded bg-white">
                                                <img class="w-auto h-50px mx-auto" src="{{$value->img}}" alt="{{$value->title}}">
                                                <h3 class="feature-box-title fs-18">{{$value->title}}</h3>
                                                {!! $value->description !!}
                                                <a href="{{$value->other}}" class="fw-bold fs-14 text-orange">Read More <i
                                                        class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endif

                    </div>
                </section>
            @endif 

            @if($section->section_name == "partners_section_3")
                <section class="graybg">
                    <div class="container">
                        <div class="row" data-aos="fade-up">
                            <div class="col-12 col-lg-12  mx-auto">
                                <div class="title text-center  ">
                                    <h2>{{$section->title}}</h2>
                                    {!! $section->description !!}
                                </div>
                            </div>
                        </div>

                        @php 
                            $partners_sec_wise_data3 = get_section_wise_data('partners_sec_wise_data3', $section->id);
                        @endphp

                        @if($partners_sec_wise_data3->isNotEmpty())
                        <div class="tiny-slider dots-dark arrow-large arrow-round arrow-bordered parterner-view mt-0">
                            <div class="tiny-slider-inner testi-full testi-big" data-gutter="9" data-arrow="true" data-dots="false"
                                data-autoplay="false" data-items-xl="4" data-items-lg="4" data-items-md="2" data-items-sm="1"
                                data-items="1">

                                @foreach($partners_sec_wise_data3 as $key => $value)
                                    <div class="item">
                                        <div class="shadow m-2 rounded bg-white">
                                            <img class="w-auto h-50px mx-auto" src="{{$value->img}}" alt="{{$value->title}}">
                                            <h3 class="feature-box-title fs-18">{{$value->title}}</h3>
                                            {!! $value->description !!}
                                            <a href="{{$value->other}}" class="fw-bold fs-14 text-orange">Read More <i
                                                    class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        @endif

                    </div>
                </section>
            @endif 

            @if($section->section_name == "partners_section_4")
                <section class=" pb-0">
                    <div class="container">
                        <div class="row" data-aos="fade-up">
                            <div class="col-12 col-lg-12  mx-auto">
                                <div class="title text-center  ">
                                    <h2>{{$section->title}}</h2>
                                    {!! $section->description !!}
                                </div>
                            </div>
                        </div>

                        @php 
                            $partners_sec_wise_data3 = get_section_wise_data('partners_sec_wise_data3', $section->id);
                        @endphp

                        @if($partners_sec_wise_data3->isNotEmpty())
                        <div class="tiny-slider dots-dark arrow-large arrow-round arrow-bordered parterner-view mt-0">
                            <div class="tiny-slider-inner testi-full testi-big" data-gutter="9" data-arrow="true" data-dots="false"
                                data-autoplay="false" data-items-xl="4" data-items-lg="4" data-items-md="2" data-items-sm="1"
                                data-items="1">

                                @foreach($partners_sec_wise_data3 as $key => $value)
                                <div class="item">
                                    <div class="shadow m-2 rounded bg-white">
                                        <img class="w-auto h-50px mx-auto" src="{{$value->img}}" alt="{{$value->title}}">
                                        <h3 class="feature-box-title fs-18">{{$value->title}}</h3>
                                        {!! $value->description !!}
                                        <a href="{{$value->other}}" class="fw-bold fs-14 text-orange">Read More <i
                                                class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                @endforeach 
                            </div>
                        </div>
                        @endif

                    </div>
                </section>
            @endif
        @endforeach
    @endif
 

@endsection 