@extends('admin.include.master')
@section('title', 'Gallery List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{ url('admin/galleries/create') }}">Add New Gallery</a>

                    <div class="breadcrumb mt-3 border-bottom pb-2">
                        <a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>/Gallery
                    </div>
                    <!-- <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Blogs</h4>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body booking_card">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title float-left mt-2">Gallery List</h4>
                            </div>
                        </div>

                        <form method="GET" class="form">
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" name="category_id">
                                        <option value="">Select Type</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" @if($request->category_id == $category->id) selected @endif>{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="search" placeholder="Search Title" value="@isset($request->search){{$request->search}}@endisset">
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-danger"> Search </button>
                                    <a href="{{ url('admin/galleries') }}" class="btn btn-warning"> Reset </a>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galleries as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->parent_name }}</td>
                                        <td class="text-black">{!! $value->description !!}</td>
                                        <td class="text-black"><img height="60" src="{{ static_asset($value->image) }}"></td>
                                        <td>
                                            <div class="actions"> @if($value->status == 1) <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a> @else <a href="#" class="btn btn-sm bg-danger-light mr-2">Inactive</a> @endif </div>
                                        </td>
                                        <td>{{ convert_datetime_to_date_format($value->created_at, 'd M Y') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a class="text-primary" href="{{ route('admin.galleries.edit',$value->id) }}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                <a class="text-danger" onclick="return confirm('Are you sure, you want to delete this?')" href="{{route('admin.galleries.delete',$value->id)}}"><i class="fas fa-trash-alt m-r-5"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination">
                                {{ $galleries->appends(request()->input())->links() }}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

