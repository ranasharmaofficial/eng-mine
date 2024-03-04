@extends('admin.include.master')
@section('title', 'Designation List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <!-- <a class="btn btn-primary float-right" href="{{ url('admin/designation/create') }}">Add Designation</a> -->
                    <div class="breadcrumb mt-3 border-bottom pb-2"><a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a> / Setup / Designation</div>
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">Designation</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.designation.store') }}">
                            @csrf
                            <div class="row formtype">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input class="form-control" name="name" type="text">
                                        <input class="form-control" name="created_by" value="{{session('LoggedUser')->id}}" type="hidden">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary buttonedit1">Add Designation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body booking_card">
                        <div class="row border-bottom">
                            <div class="col-md-12 pb-3"><strong>Filter By:</strong></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Designation Name</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="sel" name="sellist1">
                                        <option>Select Option</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group pt-4 mt-2">
                                    <a href="#" class="btn btn-info">Apply</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title float-left mt-2">Designation List</h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Designation</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($designations as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ convert_datetime_to_date_format($item->created_at, 'd M Y') }}</td>
                                        <td>
                                            <div class="actions"> @if($item->status == 1) <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a> @else <a href="#" class="btn btn-sm bg-danger-light mr-2">Inactive</a> @endif </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#view_emp"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
													{{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Inactive_asset"><i class="fas fa-trash m-r-5"></i> Delete</a> </div>--}}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination">
                                {{ $designations->appends(request()->input())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Inactive_asset" class="modal fade Inactive-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3 class="Inactive_class">Are you sure want to Delete this Designation?</h3>
                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-info" data-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="view_emp" class="modal fade Inactive-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form>
                                <div class="row formtype">
                                    <div class="col-md-12 border-bottom mb-3">
                                        <h5 class="Inactive_class">Edit Designation</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input class="form-control" type="text" value="Trainee">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" id="sel" name="sellist1">
                                                <option>Select Option</option>
                                                <option selected>Active</option>
                                                <option>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center col-md-12">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-info" data-dismiss="modal">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
