@extends('admin.include.master')
 @section('title', 'Add New Staff')
 @section('content')

 <div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mb-0 pt-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="breadcrumb ">
                        <a href="{{ url('admin/dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i> Dashboard </a> / Staff
                    </div>
                </div>
                <div class="col">
                    <a href="{{ url('admin/staffs') }}" class="btn btn-info float-right veiwbutton ">Back </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="bg-white shadow p-3 rounded position-relative">
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active border rounded-top" data-toggle="tab" href="#indian_cuisine">Add Staff
                            Information</a>
                    </li>
                    <li class="nav-item d-none">
                        <a class="nav-link border mx-1 rounded-top" data-toggle="tab" href="#indian_cuisine2">Add
                            Certified By Engineers </a>
                    </li>
                    <li class="nav-item d-none">
                        <a class="nav-link border mx-1 rounded-top" data-toggle="tab" href="#indian_cuisine3">Add New
                            Role</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content profile-tab-cont mt-1">
                <div class="tab-pane fade active show" id="indian_cuisine">
                    <h6
                        class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                        Add Staff Information</h6>
                    <form method="post" id="add-staff" action="#" enctype="multipart/form-data">
                        @csrf
                        <div class="row formtype">
                            <div class="col-md-12">
                                <div style="display:none;" id="show-form-error" class="alert alert-danger form-group">
                                    <ul>
                                        <div class="errorMsgntainer"></div>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="first_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="last_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" name="mobile">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password <span class="text-danger"></span>
                                    </label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>User Type <span class="text-danger">*</span></label>
                                    <select class=" form-control" name="user_type_id">
                                        <option value="">Select User Type</option>
                                        @foreach ($user_type_list as $key=> $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role <span class="text-danger">*</span></label>
                                    <select class=" form-control" name="user_designation_id">
                                        <option value="">Select Role</option>
                                        @foreach ($master_designation as $key=> $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status <span class="text-danger">*</span>
                                    </label>
                                    <select class=" form-control" name="status">
                                        <option value="1" selected>Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary buttonedit1 add_staff">Add Staff</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="tab-pane fade" id="indian_cuisine2">
                    <h6
                        class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                        Add Certified By Engineers</h6>
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-from-label" for="name">Select Sub Category
                                            List</label>
                                        <div class="col-sm-12">
                                            <select name="role_id" required class="form-control aiz-selectpicker">
                                                <option value="1">Engineers List1</option>
                                                <option value="2">Engineers List2</option>
                                                <option value="3">Engineers List3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-from-label" for="email">Select Service List</label>
                                        <div class="col-sm-12">
                                            <select name="role_id" required class="form-control aiz-selectpicker">
                                                <option value="1">Engineers List1</option>
                                                <option value="2">Engineers List2</option>
                                                <option value="3">Engineers List3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-from-label" for="mobile">Search Engineer Id</label>
                                        <div class="col-sm-12">
                                            <input type="text" placeholder="Search Engineer Id" id="mobile"
                                                name="mobile" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-from-label" for="password">Engineer Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" placeholder="Engineer Name" id="password" name="password"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-from-label" for="password">Engineer Mail</label>
                                        <div class="col-sm-12">
                                            <input type="text" placeholder="Engineer Mail" id="password" name="password"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 pl-0">
                                    <label class="col-sm-12 col-from-label" for="password">&nbsp;</label>
                                    <div class="form-group mb-0 text-right w-100">
                                        <button type="submit" class="btn btn-sm btn-primary px-3">Search</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped fs-13 lsp-5">
                            <thead>
                                <tr>
                                    <th> Engineer Id </th>
                                    <th> First Name </th>
                                    <th> Email </th>
                                    <th> Mobile No. </th>
                                    <th> Certificate </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-1"> SPE0002 </td>
                                    <td class="py-1"> amit </td>
                                    <td> amits110202@gmail.com </td>
                                    <td> 8396863519 </td>
                                    <td> Cisco </td>
                                    <td>
                                        <form id="frm_2" class="d-flex" method="POST">
                                            <a class="btn btn-primary p-1 mx-1" href="#1" data-toggle="modal"
                                                data-target="#staticBackdrop">Add Certificate</a>
                                            <input type="hidden" name="_token" value="1">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="button" class="btn btn-danger p-1">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-1"> SPE0003 </td>
                                    <td class="py-1"> Nitya </td>
                                    <td> pandey.nityanand@gmail.com </td>
                                    <td> 9871933901 </td>
                                    <td> Dell </td>
                                    <td>
                                        <form id="frm_2" class="d-flex" method="POST">
                                            <a class="btn btn-primary p-1 mx-1" href="#1" data-toggle="modal"
                                                data-target="#staticBackdrop">Add Certificate</a>
                                            <input type="hidden" name="_token" value="1">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="button" class="btn btn-danger p-1">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="indian_cuisine3">
                    <h6
                        class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                        Add New Role</h6>
                    <div class="card-body p-0 pt-3">
                        <form class="geniusform" action="#1" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inp-name">Role Name</label>
                                <input type="text" class="form-control" id="inp-name" name="name"
                                    placeholder="Enter Role Name" value="" required="">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Menu Builder"
                                                class="custom-control-input" id="menu_builder">
                                            <label class="custom-control-label" for="menu_builder">Menu Builder</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Manage Plan"
                                                class="custom-control-input" id="manage_plan">
                                            <label class="custom-control-label" for="manage_plan">All Plan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Seller Subscription"
                                                class="custom-control-input" id="seller_subscription">
                                            <label class="custom-control-label" for="seller_subscription">Seller
                                                Subscription</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Manage Category"
                                                class="custom-control-input" id="manage_category">
                                            <label class="custom-control-label" for="manage_category">Manage
                                                Category</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Service Area"
                                                class="custom-control-input" id="service_area">
                                            <label class="custom-control-label" for="service_area">Service Area</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Services"
                                                class="custom-control-input" id="service">
                                            <label class="custom-control-label" for="service">Services</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="All Jobs"
                                                class="custom-control-input" id="all_job">
                                            <label class="custom-control-label" for="all_job">All Jobs</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="All Orders"
                                                class="custom-control-input" id="all_order">
                                            <label class="custom-control-label" for="all_order">All Orders</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Manage Customers"
                                                class="custom-control-input" id="manage_customer">
                                            <label class="custom-control-label" for="manage_customer">Manage
                                                Customers</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Transactions"
                                                class="custom-control-input" id="transactions">
                                            <label class="custom-control-label" for="transactions">Transactions</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Commissions"
                                                class="custom-control-input" id="commission">
                                            <label class="custom-control-label" for="commission">Commissions</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Withdraws"
                                                class="custom-control-input" id="withdraws">
                                            <label class="custom-control-label" for="withdraws">Withdraws</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Deposits"
                                                class="custom-control-input" id="Deposits">
                                            <label class="custom-control-label" for="Deposits">Deposits</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Manage Blog"
                                                class="custom-control-input" id="manage_blog">
                                            <label class="custom-control-label" for="manage_blog">Manage Blog</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="General Setting"
                                                class="custom-control-input" id="general_setting">
                                            <label class="custom-control-label" for="general_setting">General
                                                Setting</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Tax"
                                                class="custom-control-input" id="tax">
                                            <label class="custom-control-label" for="tax">Tax</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Homepage Manage"
                                                class="custom-control-input" id="homepage_manage">
                                            <label class="custom-control-label" for="homepage_manage">Homepage
                                                Manage</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Email Setting"
                                                class="custom-control-input" id="email_setting">
                                            <label class="custom-control-label" for="email_setting">Email
                                                Setting</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Message"
                                                class="custom-control-input" id="Message">
                                            <label class="custom-control-label" for="Message">Message</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Payment Setting"
                                                class="custom-control-input" id="payment_setting">
                                            <label class="custom-control-label" for="payment_setting">Payment
                                                Setting</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Manage Roles"
                                                class="custom-control-input" id="manage_roles">
                                            <label class="custom-control-label" for="manage_roles">Manage Roles</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Manage Staff"
                                                class="custom-control-input" id="manage_staff">
                                            <label class="custom-control-label" for="manage_staff">Manage Staff</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Manage KYC Form"
                                                class="custom-control-input" id="manage_kyc">
                                            <label class="custom-control-label" for="manage_kyc">Manage KYC Form</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Language Manage"
                                                class="custom-control-input" id="language_setting">
                                            <label class="custom-control-label" for="language_setting">Language
                                                Manage</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Fonts"
                                                class="custom-control-input" id="font">
                                            <label class="custom-control-label" for="font">Fonts</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Menupage Setting"
                                                class="custom-control-input" id="menupage_setting">
                                            <label class="custom-control-label" for="menupage_setting">Menupage
                                                Setting</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Seo Tools"
                                                class="custom-control-input" id="seo_tools">
                                            <label class="custom-control-label" for="seo_tools">Seo Tools</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Sitemaps"
                                                class="custom-control-input" id="Sitemaps">
                                            <label class="custom-control-label" for="Sitemaps">Sitemaps</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="section[]" value="Subscribers"
                                                class="custom-control-input" id="subscribers">
                                            <label class="custom-control-label" for="subscribers">Subscribers</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" id="submit-btn" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Start -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Assign Engineer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <select class="form-control" name="service_cat_id" id="service_cat_id">
                                <option value="">Select Certified Title Name</option>
                                <option value="2"> Cisco</option>
                                <option value="3">Dell</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->


 <script type="text/javascript">
	   $(document).on('click', '.add_staff', function(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("add-staff"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		$.ajax({
            type: "POST",
			url: "{{ route('admin.addStaffRegister') }}",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data) {
                // console.log('status ' + data.status);
                if (data.status == true) {
                    toastr.success('Added Successfully.');
                    setTimeout(function() {
                        window.location = "{{ url('admin/staffs') }}"
                    }, 2000);
                } else {
                    toastr.error('Something went wrong.');
                }
            },

            error: function(err) {
                document.getElementById('show-form-error').style = "display: block";

                let error = err.responseJSON;
                $.each(error.errors, function(index, value) {
                    $('.errorMsgntainer').append('<span class="text-danger">' + value + '<span>' + '<br>');

                });

            }



        });

    });
	</script>

 @endsection



