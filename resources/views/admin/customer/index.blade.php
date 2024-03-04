@extends('admin.include.master')
@section('title', 'Client List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mb-0 pt-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="breadcrumb "><a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard</a> / Customer</div>
                </div>
                <div class="col">
                    <a href="{{ route('admin.client.create') }}" class="btn btn-info float-right veiwbutton ">Add Client</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card1">
                            <div class="row gutters-5 align-items-center">
                                <div class="col pr-0">
                                    <h5 class="mb-md-0 h6">Client List</h5>
                                </div>
                                <div class="col text-right">
                                    <a href="image/incomplete_orders.xlsx" class="btn btn-circle btn-info h-35"
                                        download>
                                        <span>Export in Excel</span>
                                    </a>
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
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            S.no
                                        </th>
                                        <th>
                                            Client Name
                                        </th>
                                        <th>
                                            Company Name
                                        </th>
                                        <th>
                                            Logo
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $index=>$value)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td class="py-1">
                                            {{ $value->user_name }}
                                        </td>
                                        <td>
                                            {{ $value->company_name }}
                                        </td>
                                        <td>
                                            <img class="w-50px" src="{{ static_asset($value->logo) }}" title="content_image">
                                        </td>
                                        <td>
                                            <select name="cars" id="cars"
                                                class="border-0 bg-danger text-white rounded-pill px-1">
                                                <option value="1" @if($value->status == 1) selected @endif>Active</option>
                                                <option value="0" @if($value->status == 0) selected @endif>Inactive</option>
                                            </select>
                                        </td>
                                        <td>
                                            <form class="d-flex">
                                                <a class="btn btn-primary mx-1"
                                                    href="{{ route('admin.client.edit', $value->id) }}">Edit</a>
                                                <a href="{{ route('admin.client.destroy', $value->id) }}" onclick="return confirm('Are you sure want to delete this')" type="button"
                                                    class="btn btn-danger">Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="aiz-pagination mt-3 w-100">
                            {{ $clients->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

