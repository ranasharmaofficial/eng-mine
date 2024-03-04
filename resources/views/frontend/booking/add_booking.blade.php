@extends('frontend.layouts.master')
@section('title') Add Booking  @endsection
@section('content')
@include('frontend.customer.partials.dash_header')

<div class="main-wrapper">

    <div class="bg-img">
        <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg1">
        <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg2">
        <img src="{{ static_asset('assets/assets_web/img/bg/feature-bg-03.png')}}" alt="img" class="bgimg3">
    </div>

    <div class="content">
            <div class="container">
                <div class="row">
                    <!-- Customer Menu -->
                    <!-- <div class="col-md-4 col-lg-3 theiaStickySidebar">
                  <?php
						   //include 'left-sidebar.php'
						?>
               </div> -->
                    <!-- /Customer Menu -->
                    <div class="col-sm-12">
                        <div class="row">
                            <section class="providers-section-two">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 text-md-start aos aos-init aos-animate" data-aos="fade-up">
                                            <a href="{{ route('customer.index_booking') }}" class="btn btn-pink btn-viewall">
                                                <i class="bi bi-arrow-left-circle"></i> Back
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!--tab of engineering mine section start-->
                            <section class="offsite-support">
                                <div class="container position-relative">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="toggle-tab">
                                                <ul class="nav nav-tabs border-0 ms-5 justify-content-center">
                                                    <li class="nav-item tab-nav-item text-center rounded">
                                                        <a class="nav-link text-dark active" data-bs-toggle="tab"
                                                            href="#home">Hire
                                                            Onsite L1
                                                            Engineer @ 3500</a>
                                                    </li>
                                                    <li class="nav-item tab-nav-item text-center rounded">
                                                        <a class="nav-link text-dark" data-bs-toggle="tab"
                                                            href="#menu1">Installation
                                                            & Configuration
                                                            @ 5000</a>
                                                    </li>
                                                    <li class="nav-item tab-nav-item text-center rounded">
                                                        <a class="nav-link text-dark" data-bs-toggle="tab"
                                                            href="#menu2">Upgrade &
                                                            Migration @
                                                            7500</a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content field py-5">
                                                    <div class="tab-pane container active justifly-content-round"
                                                        id="home">
                                                        <table id="myTable"
                                                            class="input-group rounded-3 d-block w-100 border-0 fs-13 overflow-hidden">
                                                            <tbody class="d-block w-100">
                                                                <tr>
                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Select Domain</label>
                                                                                </div>
                                                                                <select
                                                                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    id="validationCustom04" required="">
                                                                                    <option value="" selected="">Select
                                                                                        Domain</option>
                                                                                    <option value="Rack Mounting"> Rack
                                                                                        Mounting </option>
                                                                                    <option value="Operating System">
                                                                                        Operating System
                                                                                    </option>
                                                                                    <option value="Database"> Database
                                                                                    </option>
                                                                                    <option value="Virtualization">
                                                                                        Virtualization </option>
                                                                                    <option value="Router"> Router
                                                                                    </option>
                                                                                    <option value="Switch"> Switch
                                                                                    </option>
                                                                                    <option value="Firewall"> Firewall
                                                                                    </option>
                                                                                    <option value="Backup"> Backup
                                                                                    </option>
                                                                                </select>
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1  align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Sub Domain</label>
                                                                                </div>

                                                                                <select
                                                                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    id="validationCustom04" required="">
                                                                                    <option value="" selected="">Select
                                                                                        Sub Domain</option>
                                                                                    <option
                                                                                        value="Windows Server Edition">
                                                                                        Windows Server
                                                                                        Edition </option>
                                                                                    <option value="Oracle Solaris">
                                                                                        Oracle Solaris</option>
                                                                                    <option value="Oracle Solaris"> MS
                                                                                        SQL</option>
                                                                                    <option value="Oracle Solaris"> Mari
                                                                                        DB</option>
                                                                                    <option value="Oracle Solaris"> Post
                                                                                        Gress</option>
                                                                                    <option value="Oracle Solaris">
                                                                                        VMware</option>
                                                                                    <option value="Oracle Solaris">
                                                                                        RedHat RHEV</option>
                                                                                    <option value="Oracle Solaris">
                                                                                        Microsoft Hyper-V
                                                                                    </option>
                                                                                </select>
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Select Activity</label>
                                                                                </div>

                                                                                <select
                                                                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    id="validationCustom04" required="">
                                                                                    <option value="" selected=""> Select
                                                                                        Activity </option>
                                                                                    <option value="staticWebsite">Static
                                                                                        Website</option>
                                                                                </select>
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Activity Type</label>
                                                                                </div>
                                                                                <select
                                                                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    id="validationCustom04" required="">
                                                                                    <option value="" selected="">
                                                                                        Activity Type</option>
                                                                                    <option value="Rack Mounting">
                                                                                        On-Site </option>
                                                                                    <option value="Operating System">
                                                                                        Off-Site </option>
                                                                                </select>
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 d-flex align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Modal</label>
                                                                                </div>
                                                                                <input type="text"
                                                                                    class="form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    value=""
                                                                                    placeholder="Model/Version "
                                                                                    required="">
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 d-flex align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Qty</label>
                                                                                </div>

                                                                                <input type="number"
                                                                                    class="form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    value="" placeholder="Qty"
                                                                                    required="" style="width:60px;">
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="d-flex w-160 justify-content-end">
                                                                            <button
                                                                                class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button>
                                                                            <button
                                                                                class="btn border-1 border-danger w-auto delete_button rounded-pill px-3 fs-14 bg-danger mx-1">Delete</button>
                                                                            <button
                                                                                class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div
                                                            class="position-relative justify-content-center d-flex w-50 mx-auto my-2 pt-3">
                                                            <button
                                                                class="btn btn-primary border-1 border-danger w-150 rounded px-3 fs-14 bg-danger show-my-estimate1"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal">
                                                                <i class="fa fa-sign-in pe-2" aria-hidden="true"></i>
                                                                Show My Estimate
                                                            </button>
                                                            <button
                                                                class="btn btn-primary border-1 border-success w-150 rounded px-3 fs-14 bg-success mx-2 addown"
                                                                onclick="addRow()"><i class="fa fa-sign-in pe-2"
                                                                    aria-hidden="true"></i>
                                                                Add Service
                                                            </button>
                                                        </div>

                                                    </div>

                                                    <div class="tab-pane container fade" id="menu1">
                                                        <table id="myTable2"
                                                            class="input-group rounded-3 w-100  border-0 py-0 px-0 fs-13 overflow-hidden">
                                                            <tbody class="d-block w-100">
                                                                <tr>
                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Select Domain</label>
                                                                                </div>
                                                                                <select
                                                                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    id="validationCustom04" required="">
                                                                                    <option value="" selected="">Select
                                                                                        Domain</option>
                                                                                    <option value="Rack Mounting"> Rack
                                                                                        Mounting </option>
                                                                                    <option value="Operating System">
                                                                                        Operating System
                                                                                    </option>
                                                                                    <option value="Database"> Database
                                                                                    </option>
                                                                                    <option value="Virtualization">
                                                                                        Virtualization </option>
                                                                                    <option value="Router"> Router
                                                                                    </option>
                                                                                    <option value="Switch"> Switch
                                                                                    </option>
                                                                                    <option value="Firewall"> Firewall
                                                                                    </option>
                                                                                    <option value="Backup"> Backup
                                                                                    </option>
                                                                                </select>
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1  align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Select Sub Domain</label>
                                                                                </div>
                                                                                <select
                                                                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    id="validationCustom04" required="">
                                                                                    <option value="" selected="">Select
                                                                                        Sub Domain</option>
                                                                                    <option
                                                                                        value="Windows Server Edition">
                                                                                        Windows Server
                                                                                        Edition </option>
                                                                                    <option value="Oracle Solaris">
                                                                                        Oracle Solaris</option>
                                                                                    <option value="Oracle Solaris"> MS
                                                                                        SQL</option>
                                                                                    <option value="Oracle Solaris"> Mari
                                                                                        DB</option>
                                                                                    <option value="Oracle Solaris"> Post
                                                                                        Gress</option>
                                                                                    <option value="Oracle Solaris">
                                                                                        VMware</option>
                                                                                    <option value="Oracle Solaris">
                                                                                        RedHat RHEV</option>
                                                                                    <option value="Oracle Solaris">
                                                                                        Microsoft Hyper-V
                                                                                    </option>
                                                                                </select>
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>

                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Select Activity</label>
                                                                                </div>
                                                                                <select
                                                                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    id="validationCustom04" required="">
                                                                                    <option value="" selected=""> Select
                                                                                        Activity </option>
                                                                                    <option value="staticWebsite">Static
                                                                                        Website</option>
                                                                                </select>
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Activity Type</label>
                                                                                </div>
                                                                                <select
                                                                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    id="validationCustom04" required="">
                                                                                    <option value="" selected="">
                                                                                        Activity Type</option>
                                                                                    <option value="Rack Mounting">
                                                                                        On-Site </option>
                                                                                    <option value="Operating System">
                                                                                        Off-Site </option>
                                                                                </select>
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 d-flex align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Modal</label>
                                                                                </div>
                                                                                <input type="text"
                                                                                    class="form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    value=""
                                                                                    placeholder="Model/Version "
                                                                                    required="">
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 d-flex align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Qty</label>
                                                                                </div>
                                                                                <input type="number"
                                                                                    class="form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    value="" placeholder="Qty"
                                                                                    required="" style="width:60px;">
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex w-160 justify-content-end">
                                                                            <button
                                                                                class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button>
                                                                            <button
                                                                                class="btn border-1 border-danger w-auto delete_button rounded-pill px-3 fs-14 bg-danger mx-1">Delete</button>
                                                                            <button
                                                                                class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div
                                                            class="position-relative justify-content-center d-flex w-50 mx-auto my-2 pt-3">
                                                            <button
                                                                class="btn btn-primary border-1 border-danger w-150 rounded px-3 fs-14 bg-danger  show-my-estimate1"
                                                                type="button"><i class="fa fa-sign-in pe-2"
                                                                    aria-hidden="true"></i> Show
                                                                My
                                                                Estimate</button>
                                                            <button
                                                                class="btn btn-primary border-1 border-success w-150 rounded px-3 fs-14 bg-success mx-2 addown"
                                                                onclick="addRow2()"><i class="fa fa-sign-in pe-2"
                                                                    aria-hidden="true"></i> Add Service
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane container fade" id="menu2">
                                                        <table id="myTable3"
                                                            class="input-group rounded-3 w-100 border-0 py- px- fs-13 overflow-hidden">
                                                            <tbody class="d-block w-100">
                                                                <tr>
                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Select Domain</label>
                                                                                </div>
                                                                                <select
                                                                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    id="validationCustom04" required="">
                                                                                    <option value="" selected="">Select
                                                                                        Domain</option>
                                                                                    <option value="Rack Mounting"> Rack
                                                                                        Mounting </option>
                                                                                    <option value="Operating System">
                                                                                        Operating System
                                                                                    </option>
                                                                                    <option value="Database"> Database
                                                                                    </option>
                                                                                    <option value="Virtualization">
                                                                                        Virtualization </option>
                                                                                    <option value="Router"> Router
                                                                                    </option>
                                                                                    <option value="Switch"> Switch
                                                                                    </option>
                                                                                    <option value="Firewall"> Firewall
                                                                                    </option>
                                                                                    <option value="Backup"> Backup
                                                                                    </option>
                                                                                </select>
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1  align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Select Sub Domain</label>
                                                                                </div>

                                                                                <select
                                                                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    id="validationCustom04" required="">
                                                                                    <option value="" selected="">Select
                                                                                        Sub Domain</option>
                                                                                    <option
                                                                                        value="Windows Server Edition">
                                                                                        Windows Server
                                                                                        Edition </option>
                                                                                    <option value="Oracle Solaris">
                                                                                        Oracle Solaris</option>
                                                                                    <option value="Oracle Solaris"> MS
                                                                                        SQL</option>
                                                                                    <option value="Oracle Solaris"> Mari
                                                                                        DB</option>
                                                                                    <option value="Oracle Solaris"> Post
                                                                                        Gress</option>
                                                                                    <option value="Oracle Solaris">
                                                                                        VMware</option>
                                                                                    <option value="Oracle Solaris">
                                                                                        RedHat RHEV</option>
                                                                                    <option value="Oracle Solaris">
                                                                                        Microsoft Hyper-V
                                                                                    </option>
                                                                                </select>
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>

                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Select Activity</label>
                                                                                </div>

                                                                                <select
                                                                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    id="validationCustom04" required>
                                                                                    <option value="" selected=""> Select
                                                                                        Activity </option>
                                                                                    <option value="staticWebsite">Static
                                                                                        Website</option>
                                                                                </select>
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Activity Type</label>
                                                                                </div>
                                                                                <select
                                                                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    id="validationCustom04" required="">
                                                                                    <option value="" selected="">
                                                                                        Activity Type</option>
                                                                                    <option value="Rack Mounting">
                                                                                        On-Site </option>
                                                                                    <option value="Operating System">
                                                                                        Off-Site </option>
                                                                                </select>
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 d-flex align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Modal</label>
                                                                                </div>
                                                                                <input type="text"
                                                                                    class="form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    value=""
                                                                                    placeholder="Model/Version "
                                                                                    required="">
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div
                                                                            class="position-relative col-1ine1 d-flex align-items-center pe-0">
                                                                            <div class="d-flex justify-content-around">
                                                                                <div class="tab-domain me-2">
                                                                                    <span><i class="fa fa-globe"
                                                                                            aria-hidden="true"></i></span>
                                                                                    <label>Qty</label>
                                                                                </div>
                                                                                <input type="number"
                                                                                    class="form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                                                                    value="" placeholder="Qty"
                                                                                    required="" style="width:60px;">
                                                                                <div class="valid-feedback">Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="d-flex w-160 justify-content-end">
                                                                            <button
                                                                                class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button>
                                                                            <button
                                                                                class="btn border-1 border-danger w-auto delete_button rounded-pill px-3 fs-14 bg-danger mx-1">Delete</button>
                                                                            <button
                                                                                class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div
                                                            class="position-relative justify-content-center d-flex w-50 mx-auto my-2 pt-3">
                                                            <button
                                                                class="btn btn-primary border-1 border-danger w-150 rounded px-3 fs-14 bg-danger show-my-estimate1"
                                                                type="button"><i class="fa fa-sign-in pe-2"
                                                                    aria-hidden="true"></i> Show
                                                                My
                                                                Estimate</button>
                                                            <button
                                                                class="btn btn-primary bg-danger border-1 border-success w-150 rounded px-3 fs-14 bg-success mx-2 addown"
                                                                onclick="addRow3()"><i class="fa fa-sign-in pe-2"
                                                                    aria-hidden="true"></i> Add Service
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!--/tab of engineering mind section end-->
                        </div>
                    </div>
                </div>

            </div>

        </div>

</div>

@endsection
