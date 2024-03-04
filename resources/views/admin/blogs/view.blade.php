@extends('admin.include.master')
@section('title', 'Blog Views')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="breadcrumb mt-3 border-bottom pb-2">
                            <a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>/
                            <a href="{{ route('admin.blogs.index') }}"></i> Blog</a>/Views
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
                                    <h4 class="card-title float-left mt-2">Blog View List</h4>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="hotel_table" class="table table-stripped table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ip Address</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->ip_address }}</td>
                                            <td>{{ $value->date }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="pagination">
                                    {{ $blogs->appends(request()->input())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



