<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ env('APP_NAME') }}</title>
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/assets_admin/img/favicon.png')}}">
	<link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/plugins/datatables/datatables.min.css')}}">
	<link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/assets/css/feathericon.min.css')}}">
	<link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/plugins/morris/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ static_asset('assets/assets_admin/assets/css/bootstrap-datetimepicker.min.css')}}"> --}}

    <link rel="shortcut icon" type="image/x-icon" href="{{ static_asset('assets/assets_admin/assets/img/favicon.png')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/css/feathericon.min.css')}}">
    <link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/css/style.css')}}">
    {{-- <link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/css/cost_estimation.css')}}"> --}}

    <link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
    <link rel="stylesheet" href="{{ static_asset('assets/assets_admin/assets/plugins/morris/morris.css')}}">

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
        rel="stylesheet" />
    <!-- Sweet Alert Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>
	<!-- Used for Tiny Text Editor -->
	<!--<script src="https://cdn.tiny.cloud/1/idhc3eu5xqredw5w170x7bl771ac2zy9rbggh7mm04xrps7q/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>-->
    <style>
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #ffffff;
            background: #2196f3;
            padding: 3px 7px;
            border-radius: 3px;
        }
        .bootstrap-tagsinput {
            width: 100%;
        }
    </style>

</head>
<body>
	<div class="main-wrapper">
		@include('admin.include.header');

		@include('admin.include.left_sidebar');

		@yield('content')

	</div>

	<script>
        $(document).ready(function() {

            toastr.options.timeOut = 5000;
            @if (Session::has('alert-danger'))
                alert('Danger Toastr Message');
                toastr.error('{{ Session::get('alert-danger') }}');
            @elseif(Session::has('alert-success'))
                alert('Success Toastr Message');
                toastr.success('{{ Session::get('alert-success') }}');
            @elseif(Session::has('alert-warning'))
                alert('Warning Toastr Message');
                toastr.success('{{ Session::get('alert-warning') }}');
            @endif
        });
    </script>

	<script src="{{ static_asset('assets/assets_admin/assets/js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{ static_asset('assets/assets_admin/assets/js/popper.min.js')}}"></script>
	<script src="{{ static_asset('assets/assets_admin/assets/js/bootstrap.min.js')}}"></script>
	<script src="{{ static_asset('assets/assets_admin/assets/js/moment.min.js')}}"></script>
	<script src="{{ static_asset('assets/assets_admin/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
	<script src="{{ static_asset('assets/assets_admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{ static_asset('assets/assets_admin/assets/plugins/raphael/raphael.min.js')}}"></script>
	<script src="{{ static_asset('assets/assets_admin/assets/js/script.js')}}"></script>
	<script src="{{ static_asset('assets/assets_admin/assets/js/app.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.22.1/ckeditor.js"></script>
	<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

	<script type="text/javascript">
		$textarea = $('textarea');
		$(document).ready(function() {
			$(function() {
				$.each($textarea, function(index, value) {
					let id = $(this).attr('id');
					let ckeditor = CKEDITOR.replace(id);
					CKEDITOR.config.extraPlugins = 'colorbutton';
				});
			});
		});
	</script>

	@yield('script')
</body>

</html>
