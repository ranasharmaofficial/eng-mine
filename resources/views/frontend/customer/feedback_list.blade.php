@extends('frontend.layouts.master')
@section('title') Feedback List  @endsection
@section('content')
@include('frontend.customer.partials.dash_header')

<div class="main-wrapper">

    <div class="bg-img">
        <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg1">
        <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg2">
        <img src="{{ static_asset('assets/assets_web/img/bg/feature-bg-03.png')}}" alt="img" class="bgimg3">
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <!-- Customer Menu -->
                <div class="col-md-4 col-lg-3 theiaStickySidebar">
                  @include('frontend.customer.partials.left-sidebar')
                </div>
                <!-- /Customer Menu -->
                <div class="col-md-8 col-lg-9">
                    <div class="widget-title d-flex align-items-center justify-content-between">
                        <h4>Feedback List</h4>
                        <a href="{{ url('customer/add-feedback') }}"
                            class="fs-14 py-1 bg-primary2 rounded-pill px-4 text-white bt-hover">Add Feedback</a>
                    </div>
                    <hr>
                    <div class="white_block mt-3">
                        <div class="table-responsive">
                            <table class="table mb-0 custom-table border">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Service Id </th>
                                        <th>Rating </th>
                                        <th>Feedback</th>
                                        <th>Status </th>
                                        <th>Created On</th>
                                        <th>&nbsp;</th>

                                    </tr>
                                </thead>
                                <tbody>
								@if(count($service_feedback_list)>0)
									@foreach($service_feedback_list as $key => $item)
										<tr>
											<td>{{ $item->serviceOrderId }} </td>
											<td>
												@if($item->rating==1)
													<p>Poor</p>
												@elseif($item->rating==2)
													<p>Below Average</p>
												@elseif($item->rating==3)
													<p>Average</p>
												@elseif($item->rating==4)
													<p>Above Average</p>
												@elseif($item->rating==5)
													<p>Excellent</p>
												@endif
											</td>
											<td>
											{{ $item->feedback }} 
												
											</td>
											<td class="text-body">
												@if($item->status==0)
													<span class="badge-danger">PENDING</span>
												@else
													<span class="badge-success">APPROVED</span>
												@endif
											</td>
											<td>{{ date('d-m-Y',strtotime($item->created_at)) }} </td>
											 
										</tr>
									@endforeach
								@endif
                                    


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

       <!-- Add Wallet -->
       <div class="modal fade custom-modal" id="add-wallet">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 justify-content-between pb-0">
                    <h5 class="modal-title">Complain Details</h5>
                    <button type="button" class="close-btn px-2 border-0 rounded-circle" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa fa-times"></i></button>
                </div>
                <hr>
                <div class="modal-body pt-0">
                    <table class="table w-100">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <td><strong>Service ID</strong></td>
                                <td>
                                    <span>EGMNE-ORD-00161</span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Subject</strong></td>
                                <td>Speed is very slow</td>
                            </tr>
                            <tr>
                                <td><strong>Complain</strong></td>
                                <td>Test</td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>Pending</td>
                            </tr>
                            <tr>
                                <td><strong>Remarks</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Created On</strong></td>
                                <td>SPE0003</td>
                            </tr>
                            <tr>
                                <td><strong>Engineer Adhar No.</strong></td>
                                <td>23333333323233</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Wallet -->
</div>

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>

    @endsection
