@extends('admin.include.master')
@section('title', 'Reset Password')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Reset Password</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.updateAdminPassword') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row formtype">
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

								 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Old Password <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Enter Old Password" name="old_password"> 
                                    </div>
                                </div>
								
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label>New Password <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Enter New Password" name="new_password"> 
                                    </div>
                                </div>
								
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label>Confirm Password <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" placeholder="Enter Confirm Password"  name="new_password_confirmation"> 
                                    </div>
                                </div>

                                 

                            </div>	
                            <button type="submit" class="btn btn-primary buttonedit1">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#answer',
        });
		
		$(document).ready(function () {
            /** Get Sub category list on change on parent category */
            $('#faq_type').on('change', function () {
                var idPage = this.value;
				// alert(idPage);
                $("#faq_category").html('');
                $.ajax({
                    url: "{{ route('admin.fetch_faq_category')}}",
                    type: "POST",
                    data: {
                        faq_type: idPage,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',

                    success: function (result) {
						console.log(result);
                        $('#faq_category').html('<option value="">Choose Section</option>');
                        $.each(result.categories, function (key, value) {
                            $("#faq_category").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
        
    </script>
@endsection
