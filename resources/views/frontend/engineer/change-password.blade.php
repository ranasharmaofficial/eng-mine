@extends('frontend.layouts.master')

@section('title') Change-Password @endsection

@section('content')

@include('frontend.engineer.partials.engineer_dash_header')

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

                    @include('frontend.engineer.partials.engineer-left-sidebar')

                </div>

                <!-- /Customer Menu -->



                <div class="col-md-8 col-lg-9">





                    <div class="section-heading aos aos-init aos-animate text-start mt-0 mb-0" data-aos="fade-up">

                        <h2>Change <span>Password</span> </h2>

                        <p>Please enter your current password to change your password</p>



                    </div>

                    <div class="contact-queries1 text-center">

                        <form id="update-engineer-password" action="#">
							@csrf
                            <div class="log-form pt-3">

								<div style="display:none;" id="show-form-error" class="alert alert-danger">
									<ul>
										<div class="errorMsgntainer"></div>
									</ul>
								</div>

                                <div class="form-group">

                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Current

                                        Password</label>

                                    <div class="pass-group">

                                        <input type="password" name="old_password" class="form-control  w-100" placeholder="*************" id="myInput">

                                        <span class="toggle-password feather-eye" onclick="myFunction()"><i id="eye" class="fa fab fas fa-eye"></i></span>



                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-form-label text-start d-block fs-14 fw-bold">New Password</label>

                                    <div class="pass-group">

                                        <input type="password" name="new_password" class="form-control  w-100" placeholder="*************" id="myInput1">

                                        <span class="toggle-password feather-eye " onclick="myFunction1()"><i id="eye1" class="fa fab fas fa-eye"></i></span>
                                    </div>

                                </div>

                                <div class="password-strength" id="passwordStrength">

                                    <span id="poor"></span>

                                    <span id="weak"></span>

                                    <span id="strong"></span>

                                    <span id="heavy"></span>

                                </div>

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="char-length text-start mt-3">

                                            <p class="fs-13">Use 8 or more characters with a mix of letters, numbers

                                                & symbols.

                                            </p>

                                        </div>

                                    </div>



                                </div>

                                <div class="form-group">

                                    <label class="col-form-label text-start d-block fs-14 fw-bold">Confirm New

                                        Password</label>

                                    <div class="pass-group">

                                        <input type="password" name="new_password_confirmation" class="form-control  w-100" placeholder="*************" id="myInput2">

                                        <span class="toggle-password feather-eye " onclick="myFunction2()"><i id="eye2" class="fa fab fas fa-eye"></i></span>



                                    </div>

                                </div>

                            </div>

                            <div class="d-flex justify-content-end">

                                <button class="btn btn-dark w-auto bg-dark  text-center text-white d-block border-0 mx-2 login-btn" type="submit">Cancel</button>

                                <button class="btn btn-success w-auto  text-center text-white d-block border-0 mx-2 login-btn bt-hover update_engineer_password" type="button">Update Password</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>



        </div>



    </div>



</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">


$(document).on('click','.update_engineer_password',function(e) {
	
	e.preventDefault();
		var formData = new FormData(document.getElementById("update-engineer-password"));
	console.log(formData);
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  $.ajax({
    type: "POST",
    url: "{{ route('engineer.update_engineer_password') }}",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "JSON",
    success: function(data) {
			console.log('status '+data.status);
			if(data.status==true){
				toastr.success('Updated Successfully.');
				setTimeout(function(){
				window.location = "{{ url('customer/customer-dashboard') }}" },1000);
			}else{
				toastr.error('Login Failed.');
			}


    },error:function(err){

		document.getElementById('show-form-error').style="display: block";
		let error = err.responseJSON;
		console.log(error);
		$.each(error.errors, function (index, value) {
			$('.errorMsgntainer').append('<span class="text-danger">'+value+'<span>'+'<br>');
		});
	}

  });
});

		document.getElementById("eye").addEventListener("click", function () {
            if (document.getElementById("myInput").type == "password") {
                document.getElementById("myInput").type = "text";
            } else {
                document.getElementById("myInput").type = "password";
            }
        });
		
		document.getElementById("eye1").addEventListener("click", function () {
            if (document.getElementById("myInput1").type == "password") {
                document.getElementById("myInput1").type = "text";
            } else {
                document.getElementById("myInput1").type = "password";
            }
        });
		
		document.getElementById("eye2").addEventListener("click", function () {
            if (document.getElementById("myInput2").type == "password") {
                document.getElementById("myInput2").type = "text";
            } else {
                document.getElementById("myInput2").type = "password";
            }
        });



</script>

@endsection
