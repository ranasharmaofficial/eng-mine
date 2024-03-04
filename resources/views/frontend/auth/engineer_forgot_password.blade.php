@extends('frontend.layouts.master')
@section('title') Engineer Password Recovery @endsection



@section('content')
@include('frontend.includes.header')
    <div class="bg-img">
         <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg1">
         <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg2">
         <img src="{{ static_asset('assets/assets_web/img/bg/feature-bg-03.png')}}" alt="img" class="bgimg3">
    </div>
      <div class="section-heading aos aos-init aos-animate text-center mt-5 pt-5 mb-0" data-aos="fade-up">
         <h2>Password <span>Recovery</span> </h2>
         {{--<p>Enter your email and we will send you a link to reset your password.</p>--}}
      </div>
      <div class="content pt-3 pb-5 mb-3">
         <div class="container">

            <div class="row">
               <div class="col-md-5 mx-auto text-center">

                  <div class="contact-queries1 text-center">

                     <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                           aria-labelledby="ex1-tab-1">
                            <form id="password-recover-form" action="#">
						   
								<div class="form-group phone-form-group mb-1">
									<label class="col-form-label text-start d-block fs-14 fw-bold">Phone</label>
									<input type="tel" id="mobile" class="form-control rounded-0" value="" placeholder="Enter Mobile No." name="mobile" autocomplete="off">
								</div>

                                <div class="form-group email-form-group mb-1 d-none">
									<label class="col-form-label text-start d-block fs-14 fw-bold">Email</label>
									<input type="email" class="form-control rounded-0 " value="" placeholder="Enter You Email" name="email" id="email" autocomplete="off">
								</div>
								
								<div class="form-group text-right">
									<span style="float:right;" class="p-0 text-primary" type="button" onclick="toggleEmailPhone(this)"><i>*Use Email Instead</i></span>
								</div>
								
								<div class="form-group text-right">
									<button class="btn btn-primary rounded-pill" type="button" id="button-addon2" style="width:100px; margin-top:0.5%;" onclick="getEngineerOTP()">Send OTP</button>
                                </div>     
								
								<div class="form-group">
									<span class="otp_sent_process text-success"></span>
									<span class="otp_sent_message text-success"></span>
								</div>

								<div class="form-group">
									<span class="mobile_not_found_message text-danger"></span>
								</div>
								
								
												
                                <div id="otp_input_box" style="display: none;" class="form-group pt-3">
									<label class="col-form-label text-start d-block fs-14 fw-bold">Enter Otp</label>
									<div class="input-group">
										<input type="tel" class="form-control" id="mobile_otp" name="mobile_otp" placeholder="Enter Otp" autocomplete="off" data-intl-tel-input-id="0">
									</div>
									<button style="margin-top:1.5%;" class="btn btn-success rounded-pill" type="button" id="check-mobile-otp-button" onclick="checkEngineerMobileOtp()">Check OTP</button>
							    </div>
								
								<div class="form-group col-md-12" id="mobile-otp-verify" style="display: none;">
									<span class="form-text text-success" id="mobile_otp_verify"></span>
									<span class="form-text text-danger" id="mobile_otp_verify_error"></span>
								</div>
								
								
							    
								<div style="display: none;" id="new_password_box" class="form-group pt-3">
									<label class="col-form-label text-start d-block fs-14 fw-bold">Enter New Password</label>
									<div class="input-group">
										<input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password" autocomplete="off" data-intl-tel-input-id="0">
									</div>
								</div>
								
								<div style="display: none;" id="confirm_password_box" class="form-group pt-3">
									<label class="col-form-label text-start d-block fs-14 fw-bold">Confirm Password</label>
									<div class="input-group">
										<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" autocomplete="off" data-intl-tel-input-id="0">
									</div>
								</div>
                               
								<button id="show-submit-button" class="d-none btn btn-primary w-100 mx-auto text-center text-white d-block border-0 change-password"
                                 type="submit">Submit</button>
                              <hr>
                              <p class="no-acc fs-16 mb-0"> <a href="{{ url('login') }}"
                                 class="text-danger fw-bold w-100 d-block btn-light border  text-white btn"> Back</a>
                              </p>
                            </form>
                        </div>

                     </div>
                     <!-- Tabs content -->
                  </div>
               </div>
            </div>
            <!-- /Get In Touch -->
         </div>
      </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">

	function getEngineerOTP(){
        let mobile = document.getElementById('mobile').value;
        let email = document.getElementById('email').value;
		$('.otp_sent_process').text('Processing...');
        $.ajax({
            url: '{{ url('get-engineer-otp-forgot-password' )}}',
            method: 'POST',
            data: 'email='+email+'&mobile='+mobile+'&_token={{csrf_token()}}',
            success:function(response){
				console.log(response.message);
				if(response.status==200){
					$('.otp_sent_message').text(response.message);
					$('.otp_sent_process').text('');
					$('.mobile_not_found_message').text('');
					document.getElementById('otp_input_box').style="display: block";
					var clk_btn = $("#button-addon2");
						clk_btn.prop('disabled',true);
				}
				if(response.status==404){
					$('.mobile_not_found_message').text(response.message);
					$('.otp_sent_process').text('');
				}
				
            },error:function(err){
				// document.getElementById('mobiletakent').style="display: block";
				// let error = err.responseJSON;
				// console.log(error);
				// $.each(error.errors, function (index, value) {
					// $('.customer_mobile_errorMsgntainer').append('<span class="text-danger">'+value+'<span>'+'<br>');
				// });
			}
        });
    }
	
	function checkEngineerMobileOtp(){
		let mobile_otp = document.getElementById('mobile_otp').value;
		let mobile_number = document.getElementById('mobile').value;
		let email = document.getElementById('email').value;
        $.ajax({
            url: '{{ url('check-engineer-forgot-mobile-otp' )}}',
            method: 'POST',
            data: 'email='+email+'&mobile_number='+mobile_number+'&mobile_otp='+mobile_otp+'&_token={{csrf_token()}}',
            success:function(response){
                console.log('message '+response.message);
                if(response.status=='success')
				{
					document.getElementById('mobile-otp-verify').style="display: block";
					document.getElementById('new_password_box').style="display: block";
					document.getElementById('confirm_password_box').style="display: block";
					 $('#show-submit-button').removeClass('d-none');
					
					document.getElementById('mobile_otp_verify').innerHTML=response.message;
					document.getElementById('mobile_otp_verify_error').style="display: none";
					document.getElementById('mobile-otp-check-button').style="display: none";
					document.getElementById('otp_input_box').addClass="d-none";
					document.getElementById('button-addon2').addClass="d-none";
					document.getElementById('send-mobile-otp').style="display: none";
					
					
					var save_btn = $("#customer-save");
					save_btn.prop('disabled',false);
				}else{
					document.getElementById('mobile-otp-verify').style="display: block";
					document.getElementById('mobile_otp_verify_error').innerHTML=response.message;
					document.getElementById('customer-save').removeAttr('disabled');
					// $("#customer-save").removeAttr('disabled');
				}
            },
            error:function(errlog){

			}
        });
	}
	
	
$(document).on('click','.change-password',function(e) {
	e.preventDefault();

  var clk_btn = $("#customer-save");
      clk_btn.prop('disabled', true);

	// var formData = new FormData(this);
	var formData = new FormData(document.getElementById("password-recover-form"));
	console.log(formData);
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  $.ajax({
    type: "POST",
    url: "{{ route('resetPassword') }}",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "JSON",
    success: function(data) {
		 toastr.success('Updated Successfully.');
		
		if(data.status==200){
			toastr.success(data.message);
			setTimeout(function(){
			window.location = "{{ url('login') }}" },1000);
		}else{
			toastr.success(data.message);
		}

    },error:function(err){
		let error = err.responseJSON;
		console.log(error);
		$.each(error.errors, function (index, value) {
			$('.errorMsgntainer').append('<span class="text-danger">'+value+'<span>'+'<br>');
		});
	}

  });
});


</script>
	<script>
	 // Country Code
        var isPhoneShown = true,
            countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone-code");

        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            if (country.iso2 == 'bd') {
                country.dialCode = '88';
            }
        }

        
	function toggleEmailPhone(el) {
		 
            if (isPhoneShown) {
                $('.phone-form-group').addClass('d-none');
                $('.email-form-group').removeClass('d-none');
                $('input[name=phone]').val(null);
                isPhoneShown = false;
                $(el).html('*Use Phone Number Instead');
            } else {
                $('.phone-form-group').removeClass('d-none');
                $('.email-form-group').addClass('d-none');
                $('input[name=email]').val(null);
                isPhoneShown = true;
                $(el).html('<i>*Use Email Instead</i>');
            }
        }
        document.getElementById("eye").addEventListener("click", function () {
            if (document.getElementById("myInput1ss").type == "password") {
                document.getElementById("myInput1ss").type = "text";
            } else {
                document.getElementById("myInput1ss").type = "password";
            }
        });
		
		 document.getElementById("eyes").addEventListener("click", function () {
            if (document.getElementById("myInput").type == "password") {
                document.getElementById("myInput").type = "text";
            } else {
                document.getElementById("myInput").type = "password";
            }
        });
    </script>
@endsection
