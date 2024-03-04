@extends('admin.include.master')
@section('title', 'Partner Section Data List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <a class="btn btn-primary float-right" href="{{ url('admin/partner_section_data/create') }}">Add Partner Section Data</a>
                    <div class="breadcrumb mt-3 border-bottom pb-2">
                        <a href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>/Section Data
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
                                <h4 class="card-title float-left mt-2">Partner Section Data List</h4>
                            </div>
                        </div>

                        <form method="GET" class="form">
                            <div class="row">
                                <div class="col-md-3">
                                    <select class="form-control" name="page_id" id="page_id">
                                        <option value="">Select Page</option>
                                        @foreach($cms_pages as $page)
                                            <option value="{{$page->id}}" @if($request->page_id == $page->id) selected @endif>{{$page->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select class="form-control" name="section" id="section_id">
                                        <option value="">Section Name</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="search" placeholder="Search" value="@isset($request){{$request->search}}@endisset">
                                </div>

                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-danger"> Search </button>
                                    <a href="{{ url('admin/product_section_data') }}" class="btn btn-warning"> Reset </a>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table id="section_data_table" class="table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Page Name</th>
                                        <th>Section Name</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($page_sections as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->page_title }}</td>
                                        <td>{{ $value->section_name }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>
                                            <div class="actions"> @if($value->status == 1) <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a> @else <a href="#" class="btn btn-sm bg-danger-light mr-2">Inactive</a> @endif </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a class="text-primary" href="{{ route('admin.productsection_data.edit',$value->id) }}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                &nbsp;&nbsp;<a class="text-danger" onclick="return confirm('Are you sure, you want to delete this?')" href="{{route('admin.partnersection_data.delete',$value->id)}}"><i class="fas fa-trash-alt m-r-5"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination">
                                {{ $page_sections->appends(request()->input())->links() }}
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
    <script>
        $(document).ready(function () {
            // var idPage = {{$request->page}};
            // getSection(idPage);

            $('#page_id').on('change', function () {
                var idPage = this.value;
                getSection(idPage);
            });

            function getSection(idPage){
                $("#section_id").html('');
                $.ajax({
                    url: "{{url('admin/partner_section_data/fetch_section')}}",
                    type: "POST",
                    data: {
                        page_id: idPage,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',

                    success: function (result) {
                        $('#section_id').html('<option value="">Choose Section</option>');
                        $.each(result.sections, function (key, value) {
                            // if(value.id == {{$request->section}}){
                                var output = '<option value="' + value.id + '" selected>' + value.section_name + '</option>'
                            // }else{
                            //     var output = '<option value="' + value.id + '">' + value.section_name + '</option>'
                            // }
                            $("#section_id").append(output);
                        });
                    }
                });
            }
        });


    </script>
@endsection

