@extends('frontend.layouts.master')
@section('title') Complete Booking  @endsection
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
                <div class="col-md-4 col-lg-3 theiaStickySidebar">
                 @include('frontend.booking.partials.left-sidebar')
                </div>
                <!-- /Customer Menu -->
                <div class="col-md-8 col-lg-9">
                    <div class="row">
                        <div class="widget-title d-flex align-items-center justify-content-between">
                            <h4 class="d-none d-lg-inline-block fw-bold">Complete Booking List</h4>
                            <!-- <div class="d-flex align-items-center w-50 justify-content-between ms-auto">
                       <h5 class="pt-2 me-2">Sort</h5>
                       <form action="" class="">
                          <ul class="nav navbar-nav">
                             <li class="dropdown">
                                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">My Booking
                                   <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                   <li><a href="my-booking.php">All Booking</a></li>
                                   <li><a href="complete-booking.php">Completed</a></li>
                                   <li><a href="ongoing-booking.php">Ongoing</a></li>
                                   <li><a href="pending-booking.php">Pending</a></li>
                                   <li><a href="cancelled-booking.php">Cancelled</a></li>
                                </ul>
                             </li>
                          </ul>
                       </form>
                       <a href="add-booking.php"
                          class="fs-14 py-1 bg-primary2 rounded-pill px-4 text-white bt-hover">
                          Book Service
                       </a>
                    </div> -->
                        </div>
                    </div>

                    <div class="row mt-4 border border-1 py-3 rounded">
                        <!-- Details Section Start -->
                        <div class="col-lg-3 position-relative">
                            <img src="assets/img/gallery/hardware-instllation.jpg" alt=""
                                class="img-fluid rounded h-100">
                            <img src="assets/img/gallery/heart-icon.svg" alt=""
                                class="img-fluid rounded position-absolute top-0 end-0 pe-3 pt-2 rounded-circle">
                        </div>
                        <div class="col-lg-9 mt-3 mt-lg-0">
                            <div class="d-flex">
                                <div>
                                    <span class="book-item fw-bold me-5">Service Name</span>
                                    : Hire Onsite L1 Engineer
                                </div>
                                <span class="badge bg-success text-white fw-bold ms-2 px-3">Completed</span>
                            </div>
                            <ul class="booking-details">
                                <li>
                                    <span class="book-item fw-bold">Service ID</span> : EGMNE-ORD-00175
                                    <a href="javascript:void();"
                                        class="bg-secondary bg-opacity-25 px-2 py-1 rounded text-primary2"
                                        data-bs-toggle="modal" data-bs-target="#add-wallet">
                                        View Service
                                    </a>
                                </li>
                                <li>
                                    <span class="book-item fw-bold">Service Date</span> : 28 Sept 2023
                                </li>
                                <li>
                                    <span class="book-item fw-bold">Amount</span> : 9900.00
                                    <span class="float-end fw-bolder bg-primary2 p-1 rounded text-light">
                                        <a href="javascript:void()" class="text-white">Rebook</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="book-item fw-bold">Order Date</span> : 27 Sept 20223
                                </li>
                                <li>
                                    <span class="book-item fw-bold">Assigned Engineer</span> : SPE0024
                                </li>
                                <li>
                                    <span class="book-item fw-bold">Completed Date</span> : Oct 13, 2023
                                </li>
                                <li>
                                    <span class="book-item fw-bold">Action</span> :
                                    <a href="./assets/invoice/invoice.pdf" class="text-info fw-bold"
                                        download>Download
                                        Invoice</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Details Section End -->
                    </div>

                    <div class="row mt-4 border border-1 py-3 rounded">
                        <!-- Details Section Start -->
                        <div class="col-lg-3 position-relative">
                            <img src="assets/img/gallery/hireL1engg.jpg" alt="" class="img-fluid rounded h-100">
                            <img src="assets/img/gallery/heart-icon.svg" alt=""
                                class="img-fluid rounded position-absolute top-0 end-0 pe-3 pt-2 rounded-circle">
                        </div>
                        <div class="col-lg-9 mt-3 mt-lg-0">
                            <div class="d-flex">
                                <div>
                                    <span class="book-item fw-bold me-5">Service Name</span>
                                    : Hire Onsite L1 Engineer
                                </div>
                                <span class="badge bg-success text-white fw-bold ms-2 px-3">Completed</span>
                            </div>
                            <ul class="booking-details">
                                <li>
                                    <span class="book-item fw-bold">Service ID</span> : EGMNE-ORD-00175
                                    <a href="javascript:void();"
                                        class="bg-secondary bg-opacity-25 px-2 py-1 rounded text-primary2"
                                        data-bs-toggle="modal" data-bs-target="#add-wallet">
                                        View Service
                                    </a>
                                </li>
                                <li>
                                    <span class="book-item fw-bold">Service Date</span> : 28 Sept 2023
                                </li>
                                <li>
                                    <span class="book-item fw-bold">Amount</span> : 9900.00
                                    <span class="float-end fw-bolder bg-primary2 p-1 rounded text-light">
                                        <a href="javascript:void()" class="text-white">Rebook</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="book-item fw-bold">Order Date</span> : 27 Sept 20223
                                </li>
                                <li>
                                    <span class="book-item fw-bold">Assigned Engineer</span> : SPE0024
                                </li>
                                <li>
                                    <span class="book-item fw-bold">Completed Date</span> : Oct 13, 2023
                                </li>
                                <li>
                                    <span class="book-item fw-bold">Action</span> :
                                    <a href="./assets/invoice/invoice.pdf" class="text-info fw-bold"
                                        download>Download
                                        Invoice</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Details Section End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>

    @endsection
