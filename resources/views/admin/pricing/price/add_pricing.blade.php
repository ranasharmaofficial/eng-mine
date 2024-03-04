@extends('admin.include.master')
@section('title', 'Add Pricing ')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-10">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Add Pricing</h4>
                    </div>
                </div>
				 <div class="col-2">
                    <div class="mt-2">
                        <a href="{{ url('admin/pricing/list') }}" class="btn btn-primary btn-sm">Pricing List</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.storePricings') }}" enctype="multipart/form-data">
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
                                        <label>Select Common <span class="text-danger">*</span> </label>
                                        <select type="text" placeholder="Enter Name" class="form-control" name="common">
											<option value="1">Yes</option>
											<option selected value="0">No</option>
										</select>
									</div>
                                </div>

								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Producuts <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="product_id" id="product_id">
											<option value="">Select Producut</option>
											@foreach($products as $val)
												<option value="{{ $val->id }}">{{ $val->title }}</option>
											@endforeach
										</select>
									</div>
                                </div>

								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Type <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="type_id" id="sub_product_id">
											<option value="">Select Type</option>
											
										</select>
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
                            </div>

                            <div class="row table_fields"> </div>


                                <div class="col-sm-12 mt-3 text-center">
                                    <button name="submit" type="submit" value="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> Submit</button>
                                </div>

                            <!-- </div>	 -->

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
        $(document).on('change', '#product_id', function () {
            var product_id = $(this).val();
            getSubProductList(product_id);
            getTableFields(product_id);
        });

        function getSubProductList(product_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type : 'get',
                url : '{{URL::to('admin/pricing/get_sub_products')}}',
                data:{'product_id':product_id},
                success:function(data){
                    $('#sub_product_id').html(data);
                }
            });
        }

        function getTableFields(product_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type : 'get',
                url : '{{URL::to('admin/pricing/get_table_fields')}}',
                data:{'product_id':product_id},
                success:function(data){
                    $('.table_fields').html(data);
                }
            });
        }

        tinymce.init({
            selector: 'textarea#answer',
        });
    </script>
@endsection
