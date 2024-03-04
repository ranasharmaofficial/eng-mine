@extends('admin.include.master')
@section('title', 'Update Pricing ')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-10">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Update Pricing</h4>
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
                        <form method="post" action="{{ route('admin.updatePricings',$pricing->id) }}" enctype="multipart/form-data">
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
                                        @if($pricing->common==1)
                                            <input type="text" readonly value="Yes" class="form-control">
                                        @else
                                            <input type="text" readonly value="No" class="form-control">
                                        @endif
                                    </div>
                                </div>

								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Products <span class="text-danger">*</span> </label>

											@foreach($products as $val)
                                                @if($pricing->product_id==$val->id)
                                                    <input type="text" readonly value="{{ $val->title }}" class="form-control">
                                                @endif
											@endforeach
										</select>

									</div>
                                </div>

								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Type <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="type_id">
											<option value="">Select Type</option>
											@foreach($priceTypeList as $val)
												<option @if($pricing->type_id==$val->id) selected @endif value="{{ $val->id }}">{{ $val->title }}</option>
											@endforeach
										</select>
									</div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status <span class="text-danger">*</span></label>
                                        <select class=" form-control" name="status">
                                            <option  @if($pricing->status==1) selected @endif value="1" selected>Active</option>
                                            <option  @if($pricing->status==0) selected @endif value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                @foreach (json_decode($pricing->fields) as $key => $table_fields)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{  json_decode(get_table_field_lists($pricing->product_id)->table_fields) [$key]}} <span class="text-danger">*</span></label>
                                            <input type="text" name="table_fields[]" class="form-control" value="{{ $table_fields}}">
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price <span class="text-danger">*</span></label>
                                        <input type="text" name="price" class="form-control" value="{{ $pricing->price}}">
                                    </div>
                                </div> 

                                <div class="col-sm-12 mt-3 text-center">
                                    <button name="submit" type="submit" value="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> Submit</button>
                                </div>

                             </div>

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
        // $(document).on('change', '#product_id', function () {
        //     var product_id = $(this).val();
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         type : 'get',
        //         url : '{{URL::to('admin/pricing/get_table_fields')}}',
        //         data:{'product_id':product_id},
        //         success:function(data){
        //             $('.table_fields').html(data);
        //         }
        //     });
        // });

        tinymce.init({
            selector: 'textarea#answer',
        });
    </script>
@endsection
