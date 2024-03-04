@extends('admin.include.master')
@section('title', 'Hire Team Enquiry List')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="breadcrumb mt-3 border-bottom pb-2">
                            <a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>/Hire Team Enquiry
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
                                    <h4 class="card-title float-left mt-2">Hire Team Enquiry List</h4>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-stripped table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Conatct</th>
                                            <th>Resume</th>
                                            <th>Message</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enquiries as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>
                                                @if($value->resume) 
                                                    <a class="btn btn-success" target="_blank" href="{{ static_asset($value->resume) }}">View Resume</a>
                                                @endif
                                            </td>
                                            <td>{{ $value->message }}</td>
                                            <td>{{ convert_datetime_to_date_format($value->created_at, 'd M Y') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="pagination">
                                    {{ $enquiries->appends(request()->input())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

