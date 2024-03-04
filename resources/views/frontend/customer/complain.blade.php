@extends('frontend.layouts.master')
@section('title') Complain  @endsection
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
                        <h4>Complain</h4>
                        <a href="{{ route('customer.add_complain') }}"
                            class="fs-14 py-1 bg-primary2 rounded-pill px-4 text-white bt-hover">Add Complain</a>
                    </div>
                    <hr>
                    <div class="white_block mt-3">
                        <div class="table-responsive">
                            <table class="table mb-0 custom-table border">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Service Id </th>
                                        <th>Subject </th>
                                        <th>Complain</th>
                                        <th>Status </th>
                                        <th>Remarks </th>
                                        <th>Created On</th>
                                        <th>&nbsp;</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($service_complain_list)>0)
									@foreach($service_complain_list as $key => $item)
										<tr>
											<td>{{ $item->complainOrderId }} </td>
											<td>{{ $item->subject }} </td>
											<td>{{ $item->complain_details }} </td>
											<td class="text-body">
												@if($item->status==0)
													<span class="badge-danger">PENDING</span>
												@else
													<span class="badge-success">APPROVED</span>
												@endif
											</td>
											<td> fgnfg</td>
											<td>{{ date('d-m-Y',strtotime($item->created_at)) }} </td>
											 <td><a href="javascript:void();" class="btn btn-view-all btn-primary2 rounded-pill" data-bs-toggle="modal" data-bs-target="#add-wallet{{$key+1}}">View More</a></td>
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
@if(count($service_complain_list)>0)
	@foreach($service_complain_list as $key => $item)
       <!-- Add Wallet -->
       <div class="modal fade custom-modal" id="add-wallet{{ $key+1 }}">
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
                                    <span>{{ $item->complainOrderId }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Subject</strong></td>
                                <td>{{ $item->subject }}</td>
                            </tr>
                            <tr>
                                <td><strong>Complain</strong></td>
                                <td>{{ $item->complain_details }}</td>
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
	@endforeach
	@endif

</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>

	/*function showDetails(showdetails){
        $('.c-preloader').show();
        $('#coursedetailsshow').html(null);
        $('#imagedetails').modal('show'); 
		let datas = '';
        let imagereqid = $(showdetails).attr('id');
        $('#imagereqid').html(imagereqid);
        $.ajax({
            url: '{{url('getImageDetails')}}',
            type: 'post',
            data:'imagereqid='+imagereqid+'&_token={{csrf_token()}}',
            success:function(respons){                
				console.log(respons);
                if(respons == '')
                {
                    datas += '<div class="alert alert-danger">Image not found</div>';
                }
                else{
                    datas += '<img class="img-fluid" src="{{asset("uploads/proposal")}}/'+respons+'" alt="Proposal Image">';
                }
				$('#coursedetailsshow').html(datas);
                $('.c-preloader').hide();
			}
        })
    }*/
	
	
	function getComplainDetails(getComplainDetails){
        $('#updateAssignmentSubmissionModal').modal('show'); 
        let complain_id = $(getComplainDetails).attr('id');
		console.log(complain_id);
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
        $.ajax({
           url: {{ route('customer.getComplainDetails') }},
           type: 'post',
           data:'complain_id='+complain_id,
           success:function(response){
               // $('#assignment-submission-values').val(JSON.parse(response).assignment_submission);
               // $('#assignment-submission-marksheet_id').val(JSON.parse(response).id);
               // $('#assignment-submission-session_id').val(JSON.parse(response).session);
               // $('#assignment-submission-class_id').val(JSON.parse(response).class);
               // $('#assignment-submission-exam_id').val(JSON.parse(response).exam_type);
                
           }
       })
    }
	
	
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
