@extends('frontend.layouts.master')
@section('title') View Estimate  @endsection
@section('content')
@include('frontend.customer.partials.dash_header')
    <link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/css/app.csssss')}}">
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
                    <hr>
                    <div class="white_block mt-3">
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
 

</div>
<!-- Modal -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>

	 
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