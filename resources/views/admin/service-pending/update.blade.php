@extends('admin.include.master')
@section('title', 'Edit Service')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header pb-0 pt-3 mb-0">
            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <div class="breadcrumb"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard</a> / Service List</div>

                </div>
                <div class="col">

                    <a href="{{ route('admin.service-order.index') }}" class="btn btn-info float-right veiwbutton ">Back</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="bg-white shadow p-3 rounded position-relative">
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item"> <a class="nav-link active border rounded-top" data-toggle="tab"
                            href="#indian_cuisine">Edit Service</a> </li>

                </ul>
            </div>
            <div class="tab-content profile-tab-cont mt-1">
                <div class="tab-pane fade active show" id="indian_cuisine">
                    <h6
                        class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                        Edit Service</h6>
                    <form class="form-sample" action="" method="post">
                        <input type="hidden" name="_token" value="">
                        <p class="card-description">
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Category</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="service_cat_id" id="service_cat_id"
                                            onchange="autocompleteDropDown(
                                        'service_sub_cat_id',
                                        'api/fetch-sub-cat',
                                        this.value,
                                        'Subcategory'
                                        );">
                                            <option value="" select>Select Category</option>
                                            <option value="2">New Installtion &amp; Configuration</option>
                                            <option value="3">Upgrade, Migration &amp; Troubleshooting</option>
                                        </select>
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Sub Category</label>

                                    <div class="col-sm-12">
                                        <select class="form-control" name="service_sub_cat_id"
                                            id="service_sub_cat_id">

                                            <option value="">Select Subcategory</option>

                                        </select>
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Service Name</label>

                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="service_name"
                                            value="Service Name">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Description</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="service_desc"
                                            value="Description">
                                        <div class="error-msg" role="alert"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-12  col-form-label">Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="service_status">
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a type="submit" href="service_list.php" class="btn btn-primary btn-icon-text">
                            <i class="ti-file btn-icon-prepend"></i>
                            Submit
                        </a>
                    </form>

                </div>

            </div>
        </div>

    </div>
</div>
@endsection
