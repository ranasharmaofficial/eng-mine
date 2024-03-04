@extends('admin.include.master')
@section('title', 'Update Staff')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mb-0 pt-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="breadcrumb "><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard</a> / Staff</div>
                </div>
                <div class="col">
                    <a href="{{ url('admin/staffs') }}" class="btn btn-info float-right veiwbutton ">Back </a>
                </div>
            </div>
        </div>
        <hr>
        <hr>

        <div class="bg-white shadow p-3 rounded position-relative">
            <div class="tab-content profile-tab-cont mt-1">
                <div class="tab-pane fade active show" id="indian_cuisine">
                    <h6
                        class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                        Edit Staff Information</h6>
                        <form method="post" id="update-staff" action="#" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="row formtype">
								<input type="hidden" name="id" value="{{ $staff->id }}">
                                <div class="col-md-6">


                                 

                            </div>
                           
                        </form>

                </div>
                 
            </div>
        </div>
    </div>
</div>

 

@endsection