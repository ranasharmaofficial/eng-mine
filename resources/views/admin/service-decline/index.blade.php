@extends('admin.include.master')
@section('title', 'ServiceOder List')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mb-0 mt-3">
            <div class="row align-items-center justify-conent-between">
                <div class="col">
                    <div class="breadcrumb  "><a href="index.php">
                            <i class="fa fa-home" aria-hidden="true"></i> Dashboard</a> / Service
                    </div>
                </div>
                <div class=" col">
                    <a href="{{ route('admin.service-order.create') }}" class="btn btn-info float-right veiwbutton"><i class="fa fa-plus"
                            aria-hidden="true"></i> Add New Service</a>
                </div>

            </div>
        </div>
        <hr>
        <div class="main-panel card-header ">
            <div class="row gutters-5 align-items-center">
                <div class="col">
                    <h5 class="mb-md-0 h6">Services </h5>
                </div>
                <div class="col text-right">
                    <a href="image/incomplete_orders.xlsx" class="btn btn-circle btn-info h-35" download>
                        <span>Export in Excel</span>
                    </a>
                </div>
                <div class="col-md-3 ml-auto">
                    <ul class="nav nav-tabs border h-35 d-block">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">Select Services </a>
                            <ul class="dropdown-menu  w-100">
                                <li><a class="dropdown-item" href="all_service.php">All Services</a></li>
                                <li><a class="dropdown-item" href="pending_service.php">Pending Services</a>
                                </li>
                                <li><a class="dropdown-item" href="complete_service.php">Complete Service</a>
                                </li>
                                <li><a class="dropdown-item" href="decline_service.php">Declined Service</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control form-control-sm h-35" id="search" name="search"
                            placeholder="Type & Enter">
                    </div>
                </div>
                <div class="col text-right">
                    <button type="submit" class="btn btn-primary btn-icon-text h-35">
                        <i class="ti-file btn-icon-prepend"></i>
                        Submit
                    </button>
                </div>
            </div>
            <hr>
            <div class="card shadow-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Service_Name
                                    </th>
                                    <th>
                                        User Email
                                    </th>
                                    <th>
                                        Prices
                                    </th>
                                    <th>
                                        Title
                                    </th>

                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Created Date
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-1">
                                        Service Name1
                                    </td>
                                    <td>
                                        seller@gmail.com
                                    </td>
                                    <td>
                                        $40
                                    </td>
                                    <td>
                                        Get Professional SEO Content writing for 3 Hours
                                    </td>

                                    <td>
                                        <select name="cars" id="cars"
                                            class="border-0 bg-primary text-white rounded-pill px-1">
                                            <option value="volvo">Completed</option>
                                            <option value="volvo">Pending</option>
                                            <option value="saab">Declined</option>
                                        </select>

                                    </td>
                                    <td>
                                        2022-10-22 08:13:36
                                    </td>
                                    <td>
                                        <form id="frm_19" action="" class="d-flex fs-6" method="POST">
                                            <a class="btn btn-primary mx-1" href="edit_service.php">Edit</a>
                                            <input type="hidden" name="_token" value=""> <input type="hidden"
                                                name="_method" value="DELETE">
                                            <button onclick="" button="submit"
                                                class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="py-1">
                                        Service Name2
                                    </td>
                                    <td>
                                        seller@gmail.com
                                    </td>
                                    <td>
                                        $50
                                    </td>
                                    <td>
                                        Get Professional SEO Content writing for 3 Hours
                                    </td>

                                    <td>
                                        <select name="cars" id="cars"
                                            class="border-0 bg-primary text-white rounded-pill px-1">
                                            <option value="volvo">Pending</option>
                                            <option value="volvo">Completed</option>
                                            <option value="saab">Declined</option>
                                        </select>
                                    </td>
                                    <td>
                                        2022-10-22 08:17:53
                                    </td>
                                    <td>
                                        <form id="frm_20" action="" method="POST">

                                            <a class="btn btn-primary" href="edit_service.php">Edit</a>

                                            <input type="hidden" name="_token" value=""> <input type="hidden"
                                                name="_method" value="DELETE">
                                            <button onclick="" button="submit"
                                                class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="py-1">
                                        Service Name3
                                    </td>
                                    <td>
                                        seller@gmail.com
                                    </td>
                                    <td>
                                        $80
                                    </td>
                                    <td>
                                        Get Professional SEO Content writing for 3 Hours
                                    </td>

                                    <td>
                                        <select name="cars" id="cars"
                                            class="border-0 bg-primary text-white rounded-pill px-1">
                                            <option value="saab">Declined</option>
                                            <option value="volvo">Pending</option>
                                            <option value="volvo">Completed</option>

                                        </select>
                                    </td>
                                    <td>
                                        2022-10-22 08:19:05
                                    </td>
                                    <td>
                                        <form id="frm_21" action="" method="POST">

                                            <a class="btn btn-primary" href="edit_service.php">Edit</a>

                                            <input type="hidden" name="_token" value=""> <input type="hidden"
                                                name="_method" value="DELETE">
                                            <button onclick="" button="submit"
                                                class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="py-1">
                                        Service Name4
                                    </td>
                                    <td>
                                        seller@gmail.com
                                    </td>
                                    <td>
                                        $30
                                    </td>
                                    <td>
                                        Get Professional SEO Content writing for 3 Hours
                                    </td>

                                    <td>
                                        <select name="cars" id="cars"
                                            class="border-0 bg-primary text-white rounded-pill px-1">
                                            <option value="volvo">Pending</option>
                                            <option value="volvo">Completed</option>
                                            <option value="saab">Declined</option>
                                        </select>
                                    </td>
                                    <td>
                                        2022-10-22 09:28:19
                                    </td>
                                    <td>
                                        <form id="frm_22" action="" method="POST">

                                            <a class="btn btn-primary" href="edit_service.php">Edit</a>

                                            <input type="hidden" name="_token" value=""> <input type="hidden"
                                                name="_method" value="DELETE">
                                            <button onclick="" button="submit"
                                                class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="py-1">
                                        Service Name5
                                    </td>
                                    <td>
                                        seller@gmail.com
                                    </td>
                                    <td>
                                        $90
                                    </td>
                                    <td>
                                        Get Professional SEO Content writing for 3 Hours
                                    </td>

                                    <td>
                                        <select name="cars" id="cars"
                                            class="border-0 bg-primary text-white rounded-pill px-1">
                                            <option value="volvo">Completed</option>
                                            <option value="volvo">Pending</option>
                                            <option value="saab">Declined</option>
                                        </select>
                                    </td>
                                    <td>
                                        2022-10-22 09:30:20
                                    </td>
                                    <td>
                                        <form id="frm_24" action="" method="POST">

                                            <a class="btn btn-primary" href="edit_service.php">Edit</a>

                                            <input type="hidden" name="_token" value=""> <input type="hidden"
                                                name="_method" value="DELETE">
                                            <button onclick="" button="submit"
                                                class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="aiz-pagination mt-3 w-100">
                        <div class="row justify-content-between">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info fs-13 fw-bold" id="geniustable_info" role="status"
                                    aria-live="polite">Showing 1 to 7 of 7 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers"
                                    id="geniustable_paginate">
                                    <ul class="pagination justify-content-end">
                                        <li class="paginate_button page-item previous disabled"
                                            id="geniustable_previous">
                                            <a href="#" aria-controls="geniustable" data-dt-idx="0" tabindex="0"
                                                class="page-link">Previous</a>
                                        </li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                aria-controls="geniustable" data-dt-idx="1" tabindex="0"
                                                class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="geniustable" data-dt-idx="1" tabindex="0"
                                                class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="geniustable" data-dt-idx="1" tabindex="0"
                                                class="page-link">3</a></li>
                                        <li class="paginate_button page-item next disabled"
                                            id="geniustable_next"><a href="#" aria-controls="geniustable"
                                                data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div>
            </div>
        </div>
    </div>
</div>

@endsection

