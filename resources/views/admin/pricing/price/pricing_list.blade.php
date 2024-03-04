@extends('admin.include.master')
@section('title', 'Pricing List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{ url('admin/pricing/add') }}">Add Pricing</a>
                    <div class="breadcrumb mt-3 border-bottom pb-2">
                        <a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>/Pricing
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body booking_card">

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title float-left mt-2">Pricing List</h4>
                            </div>
                        </div>

                        <form method="GET" class="form">
                            <div class="row">
                                <div class="col-md-3">
                                    <select class="form-control" name="common">
                                        <option value="" selected>Select Common</option>
                                        <option value="1" @if($request->common == 1) selected @endif>Yes</option>
                                        <option value="0" @if($request->common == 0) selected @endif>No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="product" id="product_id">
                                        <option value="">Select Product</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}" @if($request->product == $product->id) selected @endif>{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select class="form-control" name="price_type" id="sub_product_id">
                                        <option value="">Select Type</option>
                                        
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-danger"> Search </button>
                                    <a href="{{ url('admin/pricing/list') }}" class="btn btn-warning"> Reset </a>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table id="hotel_table" class="table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Common</th>
                                        <th>Product</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Created At</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pricing_list as $key => $value)
									@php
									$product_name = App\Models\MasterProduct::where('id', $value->product_id)->first();
									$type = App\Models\MasterProduct::where('id', $value->type_id)->first();
									@endphp

                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td>
										<div class="actions"> @if($value->common == 0) <a href="#" class="btn btn-sm bg-success-light mr-2">No</a> @else <a href="#" class="btn btn-sm bg-danger-light mr-2">Inactive</a> @endif </div>
										</td>
                                        <td>{{ $product_name->title }}</td>
                                        <td>{{ $type->title  }}</td>
                                        <td>{{ $value->price }}</td>


                                        <td>{{ convert_datetime_to_date_format($value->created_at, 'd M Y') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a class="text-primary" href="{{ route('admin.pricing.edit-pricing',$value->id) }}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                <a class="text-danger" onclick="return confirm('Are you sure, you want to delete this?')" href="{{route('admin.pricing.delete',$value->id)}}"><i class="fas fa-trash-alt m-r-5"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination">
                                {{ $pricing_list->appends(request()->input())->links() }}
                            </div>

                        </div>
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
    </script>
@endsection

