@extends('admin.include.master')
@section('title', 'User Type List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="breadcrumb mt-3 border-bottom pb-2"><a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a> / Setup / User Type</div>
                    <div class="mt-2">
                        <h4 class="card-title float-left mt-2">User Type</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body booking_card">
                        <form method="post" action="{{ route('admin.usertypes.store') }}">
                            @csrf
                            <div class="row formtype">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>User Type</label>
                                        <input class="form-control" name="name" type="text">
                                        <input class="form-control" name="created_by" value="Admin" type="hidden">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary buttonedit1">Add User Type</button>
                        </form>
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
                                <h4 class="card-title float-left mt-2">User Type List</h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Type</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usertypes as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ date('d-M-Y', strtotime($item->created_at)) }}</td>
                                        <td>
                                            <div class="actions"> <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a> </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void();" onclick="showDetails(this)" id="{{$item->id}}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                    
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach





                                </tbody>
                            </table>
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
                            <form method="post" action="{{ route('admin.update_usertypes') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row formtype">
                                    <div class="col-md-12 border-bottom mb-3">
                                        <h5 class="Inactive_class">Edit User Type</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>User Type</label>
                                            <input class="form-control" required id="name" name="name" type="text">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="id">
                                    </div>


                                </div>
                                <div class="text-center col-md-12">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script type="text/javascript">

    function showDetails(showdetails){

        $('#view_emp').modal('show');
        let datas = '';
        let pid = $(showdetails).attr('id');

        console.log(pid);
        $('#pid').html(pid);
        $.ajax({
            url: '{{ route('admin.get_usertypes_details') }}',
            type: 'post',
            data:'pid='+pid+'&_token={{csrf_token()}}',
            success:function(response){
                console.log(response);

                $('#name').val(response.name);
                $('#id').val(response.id);
                $('#status').val(response.status);
            }
        })
    }

</script>

@endsection
