@extends('admin.include.master')
@section('title', 'Add New Client')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mb-0 pt-3">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="breadcrumb "><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>
                                Dashboard</a> / Customer</div>
                    </div>
                    <div class="col">
                        <a href="{{ route('admin.client.index') }}" class="btn btn-info float-right veiwbutton ">Back</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body1">
                    <div class="bg-white shadow p-3 rounded position-relative">
                        <div class="profile-menu">
                            <ul class="nav nav-tabs nav-tabs-solid">
                                <li class="nav-item"> <a class="nav-link active border rounded-top" data-toggle="tab"
                                        href="#indian_cuisine">Add Customer's Profile</a> </li>
                            </ul>
                        </div>
                        <div class="tab-content profile-tab-cont mt-1">
                            <div class="tab-pane fade active show" id="indian_cuisine">
                                <h6 class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                                    Add Customer's Profile</h6>
                                    <div class="col-md-12">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                <form class="form-sample" enctype="multipart/form-data" action="{{ route('admin.client.store') }}" method="POST">
                                    @csrf
                                    <p class="card-description"></p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Company Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="company_name">
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Client Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="username">
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="email">
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Phone No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="phone_number">
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Mobile No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="mobile_number">
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">GST Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="gst_number">
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control cus-textarea" name="address" rows="10" cols="50"></textarea>
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Country</label>
                                                <div class="col-sm-9">
                                                   <input type="text" class="form-control" name="country">
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">State</label>
                                                <div class="col-sm-9">
                                                   <input type="text" class="form-control" name="state">
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">City</label>
                                                <div class="col-sm-9">
                                                   <input type="text" class="form-control" name="city">
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Zipcode</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="zipno">
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alternate Phone</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="alternate_phone_number">
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Discount Applicable</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="discount_applicable">
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Discount Percentage</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        name="discount_percentage">
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Logo</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control"
                                                        name="logo">
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Stauts</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                    <div class="error-msg" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-icon-text">
                                        <i class="ti-file btn-icon-prepend"></i>
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
