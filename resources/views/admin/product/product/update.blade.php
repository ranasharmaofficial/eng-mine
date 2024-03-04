@extends('admin.include.master')
@section('title', 'Update Product')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
						<a style="float:right;" class="btn btn-warning" href="{{ route('admin.product.index') }}">Product List</a>
                        <h4 class="card-title float-left mt-2">Update Product</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.product.update',$page->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
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
                                        <label>Select Parent </label>
                                        <select class="form-control" name="parent_id" required>
                                            <option value="0">No Parent</option>
                                            @foreach($menus AS $menu)
                                                <option value="{{$menu->id}}" @if($menu->id == $page->parent_id) selected @endif>{{$menu->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status </label>
                                        <select class=" form-control" name="status" required>
                                            <option value="1" @if($page->status == 1) selected @endif>Active</option>
                                            <option value="2" @if($page->status == 2) selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title </label>
                                        <input type="text" class="form-control" name="title" value="{{$page->title}}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Slug <span class="text-danger">*(Use - insted of space)</span> </label>
                                        <input type="text" class="form-control" name="slug" value="{{$page->slug}}" required>
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Order No <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="order_no" value="{{$page->order_no}}" required>
                                    </div>
                                </div>

                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mega Menu Icon <span class="text-danger"></span></label>
                                        <input type="file" class="form-control" name="icon">
										<img class="mt-3" src="{{ static_asset($page->icon) }}" style="height:100px;">
                                    </div>
                                </div>
								 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Page Header Banner <span class="text-danger"></span></label>
                                        <input type="file" class="form-control" name="banner">
										<img class="mt-3" src="{{ static_asset($page->banner) }}" style="height:100px;">
                                    </div>
                                </div>
								 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Home Page Image <span class="text-danger"></span></label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
									<img class="mt-3" src="{{ static_asset($page->image) }}" style="height:100px;">
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label>Other Icons </label>
                                        <input type="text" class="form-control" name="other_icon" value="{{$page->other_icon }}">
                                    </div>
                                </div>
								 <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Description </label>
                                        <textarea class="form-control" name="short_description" id="description" rows="5">
										{!! $page->short_description !!}
										</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Table Fields </label>
                                    </div>
                                    
                                    @foreach(json_decode($page->table_fields) AS $key => $value)
                                        <div class="row w-100 my-2" id="row">
                                            <div class="col-md-6 d-flex">
                                                <input type="text" class="form-control mx-1" name="table_fields[]" placeholder="Table Field Name" value="{{$value}}">
                                                @if($key > 0)
                                                    <button class="btn btn-danger" id="DeleteRow" type="button">
                                                    <i class="fa fa-trash"></i> </button>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                                    <div id="new_widget_one_input" class="w-100"></div>

                                    <div class="w-100 d-block text-start">
                                        <button id="widget_one_row_adder" type="button"
                                            class="btn btn-success">
                                            <span class="fa fa-plus-square"></span>
                                            Add Widget
                                        </button>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Title </label>
                                        <input type="text" class="form-control" name="meta_title" value="{{$page->meta_title}}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Tag </label>
                                        <input type="text" class="form-control" name="meta_tag" value="{{$page->meta_tag}}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description </label>
                                        <textarea class="form-control" id="myeditorinstance" name="meta_description">{!! $page->meta_description !!}</textarea>
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
    <script>
        tinymce.init({
            selector: 'textarea#description',
        });
    </script>

    <script type="text/javascript">
        function addNewRow(append_id){
            newRowAdd =
                '<div class="row my-2 w-100" id="row"><div class="col-md-6 d-flex">'+
                '<input type="text" class="form-control mx-1" name="table_fields[]" placeholder="Table Field Name">'+
                '<div class="input-group-prepend mx-1">'+
                '<button class="btn btn-danger" id="DeleteRow" type="button">'+
                '<i class="fa fa-trash"></i> </button>'+
                '</div></div></div>';

            $(append_id).append(newRowAdd);
        }

        $("#widget_one_row_adder").click(function () {
            addNewRow("#new_widget_one_input");
        });

        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
    </script>
@endsection
