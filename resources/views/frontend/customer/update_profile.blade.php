@extends('frontend.layouts.master')
@section('title') Profile  @endsection
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

                    <div class="fomr-news">

                        <h6 class="user-title">Profile Picture</h6>

                        <div class="pro-picture">

                            <div class="pro-img">

                                <img src="{{ static_asset('assets/assets_web/img/profiles/avatar-02.jpg')}}" alt="user">

                            </div>

                            <div class="pro-info">

                                <div class="d-flex align-items-center justify-content-start">
                                    <form method="POST" id="update-profile-picture" action="#" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="profile" id="updateImage">
										<input type="hidden" name="user_id" value="{{ session('LoggedCustomer')->user_id }}">
                                        {{-- <button class="btn btn-primary mt-3"><label for="updateImage">Update Image</label></button> --}}
                                        <button type="submit" class="btn btn-primary mt-3 update-profile-pic">Update Image</button>
                                    </form>




								{{-- <div class="img-upload w-50">

                                        <i class="fa fa-cloud-upload me-1"></i>Upload

                                        <input type="file" hidden id="updateImage" name="profile_pic">
                                       

                                    </div>

									 <button class="btn btn-primary mt-3"><label for="updateImage">Update

                                                Image</label></button> --}}

                                    <a href="#" class="btn-remove btn-light fs-14 px-3 border py-1 rounded">Remove</a>

                                </div>

                                <p class="mt-2">

                                    *image size should be at least 320px big,and less then 500kb. Allowed files .png and .jpg.

                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="white_block fs-14 ">

                        <div class="widget-title">

                            <h4>General Information</h4>

                        </div>

                        <form action="{{ route('customer.updateProfileDetails') }}" id="myform" method="post" class="ng-untouched forms-new">

							@csrf

                            <div class="row">



								<div class="col-md-12">

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

                                    <label for="cus_cname">Company Name</label>

                                    <input name="company_name" type="text" value="{{ $profile->company_name }}"

                                        placeholder="Please enter your company name"

                                        class="form-control ng-untouched ng-pristine ng-valid">

                                </div>



								<div class="col-md-6">

                                    <label for="email">Email</label>

                                    <input name="email" type="email" value="{{ $profile->email }}"

                                        class="form-control ng-untouched ng-pristine ng-valid">

                                </div>

                                <div class="col-md-6">

                                    <label for="cus_gst">GST number</label>

                                    <input name="gst" value="" id="input-gst" type="text" value="{{ $profile->gst_number }}" class="form-control ng-untouched ng-pristine ng-valid">
									<span class="form-text text-danger" id="gst_number_error"></span>

                                </div>

                                {{--<div class="col-md-6">

                                    <label for="cus_alt_email">Alternate Email</label>

                                    <input name="alt_email" type="email" value="{{ $profile->email }}" class="form-control">

                                </div>--}}

                                <div class="col-md-6">

                                    <label for="cus_address">Address:</label>

                                    <input name="address" value="{{ $profile->address }}" class="form-control">

									<small class="form-text text-danger">@error('address') {{ $message }} @enderror </small>

                                </div>

                                <div class="col-md-6">

                                    <label for="cus_phone">Phone Number</label>

                                    <input readonly type="number" value="{{ $profile->mobile }}" class="form-control">

                                </div>

                                <div class="col-md-6">

                                    <label for="cus_alt_phone">Alternate Phone Number</label>

                                    <input name="alt_phone" type="number" value="{{ $profile->alt_phone }}" pattern="[6789][0-9]{9}" class="form-control">

                                </div>

                                <div class="col-md-6">

                                    <label for="cus_country">Country:</label>

                                    <select name="country" id="country_id" class="form-control">

                                        <option value="">Select Country</option>

										@foreach(getCountryList() as $item)

											<option value="{{ $item->id }}"> {{ $item->name }} </option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-md-6">

                                    <label for="cus_state">State</label>

                                    <select name="state" id="state_id" class="select form-control ">

                                        <option value="">Select State</option>



                                    </select>

                                </div>

                                <div class="col-md-6">

                                    <label for="cus_city">City</label>

                                    <select name="city" id="city-dropdown" class="select form-control ">

                                        <option value="">Select City</option>



                                    </select>

                                </div>

                                <div class="col-md-6">

                                    <label for="cus_zipcode">Pin Code</label>

                                    <input name="pincode"  type="number" value="{{ $profile->pincode }}" class="form-control">

                                </div>

                            </div>

                            <div class="col-sm-12 mt-2">

                                <p>

                                    By submitting you agree to our <a href="#olicy" target="_blank">Privacy Policy</a> and <a href="#terms-and-conditions" target="_blank">T&amp;C </a>.

                                </p>

                            </div>



                            <div class="col-sm-12 d-flex justify-content-end">

                                <button type="submit"

                                    class="btn login-butto1n btn-dark bg-dark text-white px-3 py-2 mx-2">Cancel</button>

                                <button type="submit" class="btn login-button btn-danger text-white px-3 py-2">Save

                                    Change</button>

                            </div>

                        </form>

                    </div>



                </div>

            </div>



        </div>



    </div>



</div>


<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>


<script type="text/javascript">


$(document).on('click','.update-profile-pic',function(e) {
	// alert('button clicked!');
	e.preventDefault();

  // var clk_btn = $("#engineer-login");
      // clk_btn.prop('disabled',true);

	// var formData = new FormData(this);
	var formData = new FormData(document.getElementById("update-profile-picture"));
	console.log(formData);
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  $.ajax({
    type: "POST",
    url: "{{ route('customer.update_profile_picture') }}",
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

		document.getElementById('show-engineer-form-error').style="display: block";
		let error = err.responseJSON;
		console.log(error);
		$.each(error.errors, function (index, value) {
			$('.enginnererrorMsgntainer').append('<span class="text-danger">'+value+'<span>'+'<br>');
		});
	}

  });
});


$(document).ready(function() {
  $.validator.addMethod("gst", function(value3, element3) {
    var gst_value = value3.toUpperCase();
    var reg = /^([0-9]{2}[a-zA-Z]{4}([a-zA-Z]{1}|[0-9]{1})[0-9]{4}[a-zA-Z]{1}([a-zA-Z]|[0-9]){3}){0,15}$/;
    if (this.optional(element3)) {
      return true;
    }
    if (gst_value.match(reg)) {
      return true;
    } else {
      return false;
    }

  }, "Please specify a valid GSTTIN Number");

  $('#myform').validate({ // initialize the plugin
    rules: {
      gst: {
        required: true,
        gst: true
      }

    },
    submitHandler: function(form) {
      alert('valid form submitted');
      return false;
    }
  });
});

		/** GST **/
		/*
		$('#gstNumber').on('change', function () {
            var statecode = $(this).val().substring(0, 2);
            var pancarno = $(this).val().substring(2, 12);
            var entityNumber = $(this).val().substring(12, 13);
            var defaultZvalue = $(this).val().substring(13, 14);
            var checksumdigit = $(this).val().substring(14, 15);
			console.log(checksumdigit);
            if ($(this).val().length != 15) {
                // alert('GST Number is invalid');
				document.getElementById('gst_number_error').innerHTML='GST Number is invalid';
                $(this).focus();
                return false;
            }
            if (pancarno.length != 10) {
                // alert('GST number is invalid ');
				document.getElementById('gst_number_error').innerHTML='GST number is invalid';
                $(this).focus();
                return false;
            }
            if (defaultZvalue !== 'Z') {
                // alert('GST Number is invalid Z not in Entered Gst Number');
				document.getElementById('gst_number_error').innerHTML='GST Number is invalid Z not Entered in Gst Number';
                $(this).focus();
            }

            if ($.isNumeric(statecode)) {
                $('#gst_state_code').val(statecode).trigger('change');
            } else {
                // alert('Please Enter Valid State Code');
				document.getElementById('gst_number_error').innerHTML='Please Enter Valid State Code';
                $(this).focus();
            }

            if ($.isNumeric(checksumdigit)) {
                return true;
				document.getElementById('gst_number_error').style="display: none";
            } 
			// else {
                // alert('GST number is invalid last character must be digit');
				//document.getElementById('gst_number_error').innerHTML='GST number is invalid last character must be digit';
                $(this).focus();

            // }

        });
		*/



</script>

 @endsection