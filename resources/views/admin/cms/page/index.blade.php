@extends('admin.include.master')
@section('title', 'CMS Page List')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mb-0 pt-3">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="breadcrumb "><a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a> / CMS</div>
                    </div>
                        <div class="col">
                           <a href="{{ url('admin/pages/create') }}" class="btn btn-info float-right veiwbutton"><i class="fa fa-plus" aria-hidden="true"></i>  Add New CMS Pages</a>
                        </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pages as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>
                                                <div class="actions"> @if ($value->status == 1) <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a> @else <a href="#" class="btn btn-sm bg-danger-light mr-2">Inactive</a> @endif </div>
                                            </td>
                                            <td>{{ convert_datetime_to_date_format($value->created_at, 'd M Y') }}</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                <a class="dropdown-item" href="{{ route('admin.pages.edit',$value->id) }}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="aiz-pagination mt-3 w-100">
                                <div class="row justify-content-between">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info fs-13 fw-bold" id="geniustable_info" role="status"
                                            aria-live="polite">Showing {{ $pages->currentPage() }} to {{ $pages->perPage() }} of {{ $pages->total() }} entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        {{ $pages->appends(request()->input())->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
            <div class="col-md-12">
                <div class="card card-table">
                    <div class="card-body booking_card">

                        <form method="GET" class="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title float-left mt-2">CMS Page List</h4>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="search" placeholder="Search" value="@isset($request){{$request->search}}@endisset">
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pages as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>
                                            <div class="actions"> @if ($value->status == 1) <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a> @else <a href="#" class="btn btn-sm bg-danger-light mr-2">Inactive</a> @endif </div>
                                        </td>
                                        <td>{{ convert_datetime_to_date_format($value->created_at, 'd M Y') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                            <a class="dropdown-item" href="{{ route('admin.pages.edit',$value->id) }}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination">
                                {{ $pages->appends(request()->input())->links() }}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div> --}}

        </div>
    </div>
@endsection
