<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>{{ env('APP_NAME') }}</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/assets_admin/img/favicon.png')}}">
	<link rel="stylesheet" href="{{ asset('public/assets/assets_admin/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('public/assets/assets_admin/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/assets_admin/asset/splugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{ asset('public/assets/assets_admin/assets/css/feathericon.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/assets_admin/assets/plugins/morris/morris.css')}}">
	<link rel="stylesheet" href="{{ asset('public/assets/assets_admin/assets/css/style.css')}}">
	<link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
 <style>
.loading-spinner {
	display: none;
}

.loading-spinner.active {
	display: inline-block; // or whatever is appropriate to display it nicely
}
</style>
 </head>


<body>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
            <div class="col-md-12 text-center mt-2">
                <!-- <h3 class="text-primary">Blog CMS</h3> -->
            <img class="img-fluid" src="{{ asset('public/assets/logo.png')}}" alt="Logo" style="height:50px;">
            </div>
				<div class="loginbox">
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Login</h1>
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if (Session::has('alert-' . $msg))
                                        <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                                            {{ Session::get('alert-' . $msg) }}
                                            <button type="button" class="btn btn-info btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <p class="account-subtitle">Access to our dashboard</p>
							
							<div style="display:none;" id="show-form-error" class="alert alert-danger">
                        <ul>
                            <div class="errorMsgntainer"></div>
                        </ul>
                    </div>
					
                            <form method="post" id="login-form" action="{{ route('adminAuthLogin') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <input class="form-control" name="username" type="text" placeholder="Email" id="text1"> </div>
                                    <small class="form-text text-danger">@error('username') {{ $message }} @enderror</small>
                                <div class="form-group">
                                    <input class="form-control" name="password" type="password" placeholder="Password" id="text2"> </div>
                                    <small class="form-text text-danger">@error('password') {{ $message }} @enderror</small>
                                <div class="form-group">
                                    <button class="btn btn-info btn-block admin_login" type="button"><i class="fa fa-spinner loading-spinner" aria-hidden="true"></i> Login</button>
                                </div>
                            </form>
                            @if(false)
                            <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a> </div>
                            <div class="login-or"> <span class="or-line"></span> <span class="span-or">or</span> </div>
                            {{-- <div class="social-login"> <span>Login with</span> <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a> </div> --}}
                            <div class="text-center dont-have">Don’t have an account? <a href="register.html">Register</a></div>
                            @endif
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
 $(document).on('click', '.admin_login', function(e) {
		e.preventDefault();
		 
		 var clk_btn = $(".admin_login");
      clk_btn.prop('disabled',true);
	  $('.loading-spinner').toggleClass('active');
        var formData = new FormData(document.getElementById("login-form"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
			url: "{{ route('adminAuthLogin') }}",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data) {
                if (data.status == true) {
                    toastr.success('Login Successfully.');
                    // setTimeout(function() {
                        // window.location = "{{ url('admin/dashboard') }}"
                    // }, 1000);
					window.location = "{{ url('admin/dashboard') }}"
                } else {
					clk_btn.prop('disabled',false);
                    toastr.error('Login Failed.');
                }
            },

            error: function(err) {
                document.getElementById('show-form-error').style = "display: block";
				clk_btn.prop('disabled',false);
				$('.loading-spinner').removeClass('active');
                let error = err.responseJSON;
                $.each(error.errors, function(index, value) {
                    $('.errorMsgntainer').append('<span class="text-danger">' + value + '<span>' + '<br>');

                });

            }



        });

    });
	
</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="{{ asset('public/assets/assets_admin/assets/js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{ asset('public/assets/assets_admin/assets/js/popper.min.js')}}"></script>
	<script src="{{ asset('public/assets/assets_admin/assets/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('public/assets/assets_admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{ asset('public/assets/assets_admin/assets/js/script.js')}}"></script>

</body>

</html>
