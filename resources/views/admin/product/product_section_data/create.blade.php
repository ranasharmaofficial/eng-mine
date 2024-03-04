@extends('admin.include.master')
@section('title', 'Add Product Section Data')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Add Product Section Data</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.productsection_data.store') }}" enctype="multipart/form-data">
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Page <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="page_id" id="page_id">
                                            <option value="">Select Page</option>
                                            @foreach($cms_pages AS $menu)
                                                <option value="{{$menu->id}}">{{$menu->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Section <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="section_id" id="section_id">
                                            <option value="">Select Section</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description </label>
                                        <textarea class="form-control" name="description" id="description"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image <span class="text-danger"></span></label>
                                        <input type="file" class="form-control" name="img">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status <span class="text-danger">*</span></label>
                                        <select class=" form-control" name="status">
                                            <option value="1" selected>Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Other (Link/Icon) <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="other">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Order Number <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="order_number" value="1">
                                    </div>
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
    <script>
       // tinymce.init({
       //     selector: 'textarea#description',
       // });

        $(document).ready(function () {
            /** Get Sub category list on change on parent category */
            $('#page_id').on('change', function () {
                var idPage = this.value;
                $("#section_id").html('');

                $.ajax({
                    url: "{{url('admin/product_section_data/fetch_section')}}",
                    type: "POST",
                    data: {
                        page_id: idPage,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',

                    success: function (result) {
                        $('#section_id').html('<option value="">Choose Section</option>');
                        $.each(result.sections, function (key, value) {
                            $("#section_id").append('<option value="' + value
                                .id + '">' + value.section_name + '</option>');
                        });
                    }
                });
            });
        });

    </script>
@endsection
