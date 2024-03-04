@extends('admin.include.master')
@section('title', 'Designation List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mb-0 pt-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="breadcrumb "><a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard</a> /Master Designation</div>
                </div>
                <div class="col">
                    <a href="{{ url('admin/masterdesignation/create') }}" class="btn btn-info float-right veiwbutton "><i
                            class="fa fa-plus" aria-hidden="true"></i> Add New Designation</a>
                </div>
            </div>
        </div>
        <hr>



        <div class="card">
            <div class="main-panel card-header ">
                <div class="row gutters-5 align-items-center">
                    <div class="col pr-0">
                        <h5 class="mb-md-0 h6">All Master Designation</h5>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control form-control-sm h-35" id="search"
                                name="search" placeholder="Type & Enter">
                        </div>
                    </div>
                    <div class="col-md-1 pl-0 text-right">
                        <button type="submit" class="btn btn-danger btn-icon-text h-35">
                            <i class="ti-file btn-icon-prepend"></i>
                            Submit
                        </button>
                    </div>
                </div>
                <hr>
                <div class="card-body px-0">
                    <table class="table aiz-table mb-0">
                        <thead>
                            <tr>
                                <th data-breakpoints="lg" width="10%">#</th>
                                <th>Designation</th>
                                {{-- <th data-breakpoints="lg">Status</th> --}}
                                <th width="10%">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($designation as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td><a class="btn btn-primary mx-1" href="{{ route('admin.masterdesignation.edit',$value->id) }}">Edit</a>
	{{-- <form id="frm_33" action="" class="d-flex fs-6" method="POST">
                                        
                                        <input type="hidden" name="_token" value=""> <input type="hidden"
                                            name="_method" value="DELETE">
                                        <button onclick="" type="button" class="btn btn-danger">Delete</button>
	</form>--}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="aiz-pagination mt-3 w-100">
                        <div class="row justify-content-between">
                            {{ $designation->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(false)
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{ url('admin/staffs/create') }}">Add New Staff</a>
                    <div class="breadcrumb mt-3 border-bottom pb-2">
                        <a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>/Staff List
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
                                <h4 class="card-title float-left mt-2">Staff List</h4>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="hotel_table" class="table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        {{-- <th>Profile Pic</th> --}}
                                        <th> Type</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staffs as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->designation }}</td>
                                        {{-- <td><img src="{{ static_asset($value->profile_pic) }}" height="100" width="100"></td> --}}
                                        <td>{{ $value->type }}</td>
                                        <td>
                                            <div class="actions"> @if($value->status == 1) <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a> @else <a href="#" class="btn btn-sm bg-danger-light mr-2">Inactive</a> @endif </div>
                                        </td>
                                        <td>{{ convert_datetime_to_date_format($value->created_at, 'd M Y') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                            <a class="dropdown-item" href="{{ route('admin.staffs.edit',$value->id) }}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination">
                                {{ $staffs->appends(request()->input())->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

