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
                    <h1 class="fw-bold">{{$page->title}}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item active"><a href="{{url('index')}}"><i class="ti-home"></i> Home</a></li>
                        <li class="breadcrumb-item">Company</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @if(isset($section_lists))
        <section class="">
            <div class="container">
                <div class="row">
                @foreach($section_lists as $section)
                    @if($section->section_name == "mission_section_1")
                        <!-- left -->
                        <div class="col-md-12 col-lg-6 pe-lg-5" data-aos="fade-up">
                            <!-- content -->
                            <div class="mt-5 mt-md-0">
                                <h3 class="h1 fw-bold">{{$section->title}}</h3>
                                <span class="ulines position-relative d-block mb-3 mt-0">&nbsp;</span>
                                <div class="d-flex mt-3">
                                    <h6 class="display-1 opacity-2 me-3 align-self-start fw-bold">01</h6>
                                    <div class="align-self-start">
                                    {!! $section->description !!}
                                    </div>
                                </div>
                            </div>
                            <!-- image -->
                            <img class="rounded my-4 shadow-hover up-on-hover" src="{{$section->image}}" alt="">
                        </div>
                    @endif

                    @if($section->section_name == "mission_section_2")
                        <!-- right -->
                        <div class="col-md-12 col-lg-6 ps-lg-5 mt-5 mt-md-0" data-aos="fade-up">
                            <!-- image -->
                            <img class="rounded my-4 shadow-hover up-on-hover" src="{{$section->image}}" alt="">
                            <!-- content -->
                            <div>
                                <h3 class="h1 fw-bold">{{$section->title}}</h3>
                                <span class="ulines position-relative d-block mb-3 mt-0">&nbsp;</span>
                                <div class="d-flex mt-3">
                                    <h6 class="display-1 opacity-2 me-3 align-self-start fw-bold">02</h6>
                                    <div class="align-self-start">
                                        {!! $section->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php 
                            $mission_sec_wise_data2 = get_section_wise_data('mission_sec_wise_data2', $section->id);
                        @endphp

                        <div class="row mt-4" data-aos="fade-up">
                            @if($mission_sec_wise_data2->isNotEmpty())
                                @foreach($mission_sec_wise_data2 as $key => $value)
                                <!-- feature 1 -->
                                <div class="col-md-12 col-lg-4 ">
                                    <div class="feature-box h-100 icon-primary my-2">
                                        <div class="feature-box-icon"><i class="{{$value->other}}"></i></div>
                                        <h3 class="feature-box-title">{{$value->title}}</h3>
                                        <p class="feature-box-desc">{!! $value->description !!}</p>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    @endif 
                @endforeach
                </div>
            </div>
        </section>
  
        @foreach($section_lists as $section)
            @if($section->section_name == "mission_section_3")
                <section class="process-advance graybg my-0">
                    <div class="container">
                        <div class="row mb-3 aos-init aos-animate" data-aos="fade-up">
                            <div class="col-12 col-lg-12 mx-auto">
                                <div class="title text-center  ">
                                    <h2>{{$section->title}}</h2>
                                    <p class="pb-0">{!! $section->description !!}</p>
                                </div>
                            </div>
                        </div>
                        
                        @php 
                            $mission_sec_wise_data3 = get_section_wise_data('mission_sec_wise_data3', $section->id);
                        @endphp
                        @if($mission_sec_wise_data3->isNotEmpty())
                            <div class="row">
                                @foreach($mission_sec_wise_data3 as $key => $value)
                                    <!-- process 1 -->
                                    <div class="col-sm-6 col-md-5c text-center mb-4">
                                        <div class="shadow rounded bg-white h-300px">
                                            <div class="process-border"><span class="process-number  bg-grad  p-0"><img src="{{$value->image}}" alt="" class="filter p-2"></span></div>
                                            <h5 class="my-3">{{$value->title}}</h5>
                                            <p class="overflow-y scrollbar-width h-135px"> {{$value->description}} </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </section>
            @endif

            @if($section->section_name == "mission_section_4")
                <div class="  pb-0 ">
                    <section class="sec-bg pb-0">
                        <div class="container">
                            <div class="row justify-content-between align-items-center">
                                <!--left-->
                                <div class="col-lg-6 col-md-12">
                                    <div class="title text-start pb-0">
                                        <span class="pre-title fs-14">Timeline Journey</span>
                                        <h3 class="mb-0">{{$section->title}}</h3>
                                        <span class="ulines position-relative d-block mb-3 mt-0">&nbsp;</span>
                                        {!! $section->description !!}
                                    </div>
                                </div>
                                <!--right-->
                                <div class="col-md-12 col-lg-6 ">
                                    <img class="rounded  my-2 mb-3" data-aos="fade-right" src="{{$section->image}}" alt="{{$section->title}}">
                                </div>
                            </div>
                            @php 
                                $mission_sec_wise_data4 = get_section_wise_data('mission_sec_wise_data4', $section->id);
                            @endphp
                            @if($mission_sec_wise_data4->isNotEmpty())
                                <div class="tiny-slider arrow-dark arrow-large arrow-transparent arrow-hover vission-mission-timeline">
                                    <div class="tiny-slider-inner" data-autoplay="true" data-autoplaytime="7000" data-gutter="3" data-arrow="true" data-dots="false"  data-items-xl="5"  data-items-lg="5" data-items-md="3" data-items-sm="2" data-items-xs="1">
                                        @foreach($mission_sec_wise_data4 as $key => $value)
                                            <div>
                                                <div class="process shadow rounded mx-2 h-200px my-2 bg-white">
                                                    <div class="process-number text-orange opacity-05 fs-22">{{$value->title}}</div>
                                                    <h3 class="process-title fs-18">{{$value->other}}</h3>
                                                    {!! $value->description !!}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </section>
                </div>

            @endif
        @endforeach
    @endif 

@endsection 