@extends('admin.include.master')
@section('title', 'Update Service Section Data')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Update Service Section Data</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.productsection_data.update',$section_data->id) }}" enctype="multipart/form-data">
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
                                        <label>Select Service <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="page_id" id="page_id">
                                            <option value="">Select Service</option>
                                            @foreach($cms_pages AS $page)
                                                <option value="{{$page->id}}" @if($page->id == $section_data->page_id) selected @endif>{{$page->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Section <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="section_id" id="section_id">
                                            <option value="">Select Section</option>
                                            @foreach($page_sections AS $section)
                                                <option value="{{$section->id}}" @if($section->id == $section_data->section_id) selected @endif>{{$section->section_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="title" value="{{$section_data->title}}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description </label>
                                        <textarea class="form-control" name="description" id="description">{{$section_data->description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image <span class="text-danger"></span></label>
                                        <input type="file" class="form-control" name="img">
                                        @if($section_data   ->img)
                                            <img src="{{asset('public/'.$section_data->img)}}" height="100" width="100">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status </label>
                                        <select class=" form-control" name="status" required>
                                            <option value="1" @if($section_data->status == 1) selected @endif>Active</option>
                                            <option value="2" @if($section_data->status == 2) selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                 
								
								 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Other (Link/Icon) <span class="text-danger"></span></label>
                                        <input type="file" class="form-control" name="other">
                                        @if($section_data->other)
                                            <img src="{{asset('public/'.$section_data->other)}}" height="100" width="100">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Order Number <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="order_number" value="{{$section_data->order_number}}">
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
@endsection
