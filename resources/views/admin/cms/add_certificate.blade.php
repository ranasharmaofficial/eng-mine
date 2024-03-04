@extends('admin.include.master')
@section('title', 'Add New Certificate')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
         <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
				<a class="btn btn-primary float-right" href="{{ url('admin/certificates') }}">Certificate List</a>
                    <div class="breadcrumb mt-3 border-bottom pb-2">
                        <a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>/Certificate
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.storeCertificate') }}" enctype="multipart/form-data">
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
                                        <label>Title <span class="text-danger">*</span> </label>
                                        <input type="text" class="@error('title') is-invalid @enderror form-control" name="title"> 
										{{-- @error('title')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror--}}
                                    </div>
                                </div>

                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image </label>
                                        <input id="certificates_img"  class="form-control" type="file" name="blog_image">
                                    </div>
                                </div>
								<div class="col-sm-3">
                                    <div class="certificates text-center"></div>
                                </div>

                                 

                            </div>	
                            <button type="submit" class="btn btn-primary buttonedit1">Add</button>
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
        
    $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img style="height:150px;width:auto;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
				reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#document_add_picture').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });

    $('#certificates_img').on('change', function() {
        imagesPreview(this, 'div.certificates');
    });

    $('#insurance_image').on('change', function() {
        imagesPreview(this, 'div.insurance');
    });
});

</script>
		
		tinymce.init({
            selector: 'textarea#description',
        });

        $(document).ready(function () {
            /** Get category list on change on type */
            $('#type').on('change', function () {
                var idType = this.value;
                $("#category_id").html('');

                $.ajax({
                    url: "{{url('admin/blogs/fetch_category')}}",
                    type: "POST",
                    data: {
                        type: idType,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',

                    success: function (result) {
                        $('#category_id').html('<option value="">Choose Catyegory</option>');

                        $.each(result.categories, function (key, value) {
                            $("#category_id").append('<option value="' + value
                                .id + '">' + value.title + '</option>');
                        });
                    }
                });
            });
        });

    </script>
@endsection
