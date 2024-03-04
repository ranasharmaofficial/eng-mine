@extends('admin.include.master')
@section('title', 'User List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="breadcrumb mt-3 border-bottom pb-2">
                        <a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>/Users
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
                                <h4 class="card-title float-left mt-2">User List</h4>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="hotel_table" class="table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th>User Type</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->mobile }}</td>
                                        <td>{{ $value->user_type_name }}</td>
                                        <td>
                                            <select class="change_status" name="status" data-user_id="{{$value->id}}">
                                                <option value="1" class="text-success" @if($value->status == 1) selected @endif>Active</option>
                                                <option value="0" class="text-danger" @if($value->status == 0) selected @endif>Inactive</option>
                                            </select>
                                        </td>
                                        <td>{{ convert_datetime_to_date_format($value->created_at, 'd M Y') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action"> 
                                            <a class="dropdown-item" href=""><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination">
                                {{ $users->appends(request()->input())->links() }}
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
        $(".change_status").change(function (event) {
            event.preventDefault();
            var user_id = $(this).data("user_id");
            var status = $(this).val();
            changeStatus(user_id, status);        
        });

        function changeStatus(user_id, status){
            $.ajax({
                url: "{{url('admin/users/change_status')}}",
                type: "GET",
                data: {
                    id: user_id,
                    status: status,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    toastr.success("Status Successfully Updated");
                }
            });
        }
    </script>
@endsection

