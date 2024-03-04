@extends('frontend.layouts.master')
@section('title') Hire Onsite @endsection


@section('content')@include('frontend.includes.header')
    <section class="breadcrumbs-custom bg-image context-dark"
        style="background-image: url({{ static_asset('assets/assets_web/img/server-sevice.png') }}); height:369px; background-repeat: no-repeat; background-size: cover; padding-top:239px">
        <div class="container">
            <div>
                <h2 class="breadcrumbs-custom-title text-dark">Service All</h2>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{ url('') }}">Home<i class="fa fa-arrow-right px-2" aria-hidden="true"></i></a></li>
                    <li class="active" style="color:#ff008a;">Hire Onsite L1 Engineer</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- /Breadcrumb -->

    <div class="content pt-5">
        <div class="container">

            <div class="row">

                <!-- Filter -->
                <div class="col-lg-3 col-sm-12 theiaStickySidebar">
                    <div class="filter-div">
                        <div class="filter-head d-flex justify-content-between mb-3">
                            <h5>Filter by</h5>
                            <a href="#" class="reset-link">Reset Filters</a>
                        </div>
                        <div class="filter-content">
                            <h2>Keyword</h2>
                            <input type="text" class="form-control" placeholder="What are you looking for?">
                        </div>

                        <div class="filter-content">
                            <h2> Domain</h2>
                            <select class="form-control select">
                                <option>Select domain</option>
                                <option>Rack Mounting</option>
                                <option>Operating System</option>
                                <option>Database</option>
                                <option>Vertualization</option>
                                <option>Router</option>
                                <option>Switch</option>
                                <option>Firewell</option>
                                <option>Backup</option>
                            </select>
                        </div>
                        <div class="filter-content">
                            <h2>Sub Domain</h2>
                            <select class="form-control select">
                                <option>Select Sub domain</option>
                                <option>Window Server Addition</option>
                                <option>Oracle Solaris</option>
                                <option>MS SQL</option>
                                <option>Mari DB</option>
                                <option>Post Gress</option>
                                <option>Oracle Solaris</option>
                                <option>VMware</option>
                                <option>RedHat RHEV</option>
                                <option>Microsoft Hyper-V</option>
                            </select>
                        </div>
                        <div class="filter-content">
                            <h2>Activity Type</h2>
                            <select class="form-control select">
                                <option>Activity Type</option>
                                <option>On-site</option>
                                <option>Off-site</option>
                            </select>
                        </div>
                        <div class="filter-content">
                            <h2>Domain</h2>
                            <select class="form-control select">
                                <option>Domain Tpe</option>
                                <!-- <option></option>
                                <option></option> -->
                            </select>
                        </div>
                        <div class="filter-content">
                            <h2>By Rating <span><i class="feather-chevron-down"></i></span></h2>
                            <ul class="rating-set">
                                <li>
                                    <label class="checkboxs d-inline-flex">
                                        <input type="checkbox">
                                        <span><i></i></span>
                                    </label>
                                    <a class="rating" href="#">
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                        <span class="d-inline-block average-rating float-end">(35)</span>
                                    </a>
                                </li>
                                <li>
                                    <label class="checkboxs d-inline-flex">
                                        <input type="checkbox">
                                        <span><i></i></span>
                                    </label>
                                    <a class="rating" href="#">
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-warning" aria-hidden="true"></i>

                                        <span class="d-inline-block average-rating float-end">(40)</span>
                                    </a>
                                </li>
                                <li>
                                    <label class="checkboxs d-inline-flex">
                                        <input type="checkbox">
                                        <span><i></i></span>
                                    </label>
                                    <a class="rating" href="#">
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                        <span class="d-inline-block average-rating float-end">(40)</span>
                                    </a>
                                </li>
                                <li>
                                    <label class="checkboxs d-inline-flex">
                                        <input type="checkbox">
                                        <span><i></i></span>
                                    </label>
                                    <a class="rating" href="#">
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                        <span class="d-inline-block average-rating float-end">(20)</span>
                                    </a>
                                </li>
                                <li>
                                    <label class="checkboxs d-inline-flex">
                                        <input type="checkbox">
                                        <span><i></i></span>
                                    </label>
                                    <a class="rating" href="#">
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                        <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                        <span class="d-inline-block average-rating float-end">(5)</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <button class="btn btn-yellow w-100 text-white mx-auto mb-4 bt-hover">Search</button>
                    </div>
                </div>
                <!-- /Filter -->

                <!-- Service -->
                <div class="col-lg-9 col-sm-12">

                    <div class="row">
                        <!-- Service List -->
                        <div class="col-xl-4 col-md-6">
                            <div class="service-widget servicecontent">
                                <div class="service-img">
                                    <a href="service-details.php">
                                        <img class="img-fluid serv-img" alt="Service Image"
                                            src="{{ static_asset('assets/assets_web/img/serversupportten.jpg') }}">
                                    </a>
                                </div>
                                <div class="service-content online-service">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Front-End Developer</a>
                                    </h3>
                                    <p>Specializes in creating the user interface and user experience of web and mobile
                                        applications.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$40.00</h6>
                                    </div>
                                    <div class="d-flex py-2">
                                        {{-- <a href="service-booking.php"
                                    class="btn btn-yellow w-100 text-white mx-1 border-1 btn btn-pink btn-viewall view-detail-btn mx-1 bg-pink rounded">Book
                                    Now</a> --}}
                                        <a href="server-detail.php"
                                            class="btn btn-yellow w-100 text-white mx-1 border-1 btn btn-pink btn-viewall view-detail-btn bg-pink rounded">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Service List -->

                        {{-- <!-- Service List -->
                        <div class="col-xl-4 col-md-6">
                            <div class="service-widget servicecontent">
                                <div class="service-img">
                                    <a href="service-details.php">
                                        <img class="img-fluid serv-img" alt="Service Image"
                                            src="assets/img/serversupporteight.jpg">
                                    </a>
                                </div>
                                <div class="service-content online-service">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Back-End Developer</a>
                                    </h3>
                                    <p>Focuses on server-side development, database management, and server
                                        infrastructure.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$100.00</h6>
                                    </div>
                                    <div class="d-flex py-2">
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">Book Now</button>
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">View
                                            Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Service List -->

                        <!-- Service List -->
                        <div class="col-xl-4 col-md-6">
                            <div class="service-widget servicecontent">
                                <div class="service-img">
                                    <a href="service-details.php">
                                        <img class="img-fluid serv-img" alt="Service Image"
                                            src="assets/img/serversupportelen.jpg">
                                    </a>
                                </div>
                                <div class="service-content online-service">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Full-Stack Developer</a>
                                    </h3>
                                    <p>Skilled in both front-end and back-end development, capable of working on all
                                        aspects of a software project.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$150.00</h6>
                                    </div>
                                    <div class="d-flex py-2">
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">Book Now</button>
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">View
                                            Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Service List -->

                        <!-- Service List -->
                        <div class="col-xl-4 col-md-6">
                            <div class="service-widget servicecontent">
                                <div class="service-img">
                                    <a href="service-details.php">
                                        <img class="img-fluid serv-img" alt="Service Image"
                                            src="assets/img/serversupportfive.jpg">
                                    </a>
                                </div>
                                <div class="service-content online-service">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Mobile App Developer</a>
                                    </h3>
                                    <p>Specializes in creating applications for mobile devices, such as iOS or Android
                                        apps.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$200.00</h6>
                                    </div>
                                    <div class="d-flex py-2">
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">Book Now</button>
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">View
                                            Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Service List -->

                        <!-- Service List -->
                        <div class="col-xl-4 col-md-6">
                            <div class="service-widget servicecontent">
                                <div class="service-img">
                                    <a href="service-details.php">
                                        <img class="img-fluid serv-img" alt="Service Image"
                                            src="assets/img/serversupport-siz.jpg">
                                    </a>
                                </div>
                                <div class="service-content online-service">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">DevOps Engineer</a>
                                    </h3>
                                    <p>Focuses on automating and streamlining the software development and deployment
                                        processes to enhance collaboration and efficiency.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$250.00</h6>
                                    </div>
                                    <div class="d-flex py-2">
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">Book Now</button>
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">View
                                            Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Service List -->

                        <!-- Service List -->
                        <div class="col-xl-4 col-md-6">
                            <div class="service-widget servicecontent">
                                <div class="service-img">
                                    <a href="service-details.php">
                                        <img class="img-fluid serv-img" alt="Service Image"
                                            src="assets/img/serversupporteight.jpg">
                                    </a>
                                </div>
                                <div class="service-content online-service">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Data Engineer</a>
                                    </h3>
                                    <p>Works with data infrastructure, data pipelines, and data storage systems, often
                                        in the context of big data and analytics.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$300.00</h6>
                                    </div>
                                    <div class="d-flex py-2">
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">Book Now</button>
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">View
                                            Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Service List -->

                        <!-- Service List -->
                        <div class="col-xl-4 col-md-6">
                            <div class="service-widget servicecontent">
                                <div class="service-img">
                                    <a href="service-details.php">
                                        <img class="img-fluid serv-img" alt="Service Image"
                                            src="assets/img/serversupportten.jpg">
                                    </a>
                                </div>
                                <div class="service-content online-service">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Machine Learning Engineer</a>
                                    </h3>
                                    <p>Develops machine learning models and AI algorithms for applications like natural
                                        language processing, computer vision, and predictive analytics.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$350.00</h6>
                                    </div>
                                    <div class="d-flex py-2">
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">Book Now</button>
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">View
                                            Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Service List -->

                        <!-- Service List -->
                        <div class="col-xl-4 col-md-6">
                            <div class="service-widget servicecontent">
                                <div class="service-img">
                                    <a href="service-details.php">
                                        <img class="img-fluid serv-img" alt="Service Image"
                                            src="assets/img/serversupportelen.jpg">
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Game Developer</a>
                                    </h3>
                                    <p>Specializes in designing and programming video games, including gameplay,
                                        graphics, and physics engines.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$400.00</h6>
                                    </div>
                                    <div class="d-flex py-2">
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">Book Now</button>
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">View
                                            Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Service List -->

                        <!-- Service List -->
                        <div class="col-xl-4 col-md-6">
                            <div class="service-widget servicecontent">
                                <div class="service-img">
                                    <a href="service-details.php">
                                        <img class="img-fluid serv-img" alt="Service Image"
                                            src="assets/img/serversupporttwel.jpg">
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Embedded Systems Engineer</a>
                                    </h3>
                                    <p>Works on software that runs on embedded systems, such as microcontrollers in
                                        hardware devices.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$450.00</h6>
                                    </div>
                                    <div class="d-flex py-2">
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">Book Now</button>
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">View
                                            Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Service List -->

                        <!-- Service List -->
                        <div class="col-xl-4 col-md-6">
                            <div class="service-widget servicecontent">
                                <div class="service-img">
                                    <a href="service-details.php">
                                        <img class="img-fluid serv-img" alt="Service Image"
                                            src="assets/img/serversupportthirteen.jpeg">
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Security Engineer</a>
                                    </h3>
                                    <p>Focuses on the security of software systems, identifying vulnerabilities, and
                                        implementing security measures.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$500.00</h6>
                                    </div>
                                    <div class="d-flex py-2">
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">Book Now</button>
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">View
                                            Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Service List -->

                        <!-- Service List -->
                        <div class="col-xl-4 col-md-6">
                            <div class="service-widget servicecontent">
                                <div class="service-img">
                                    <a href="service-details.php">
                                        <img class="img-fluid serv-img" alt="Service Image"
                                            src="assets/img/serversupporttwel.jpg">
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Cloud Engineer</a>
                                    </h3>
                                    <p>Specializes in designing, deploying, and managing applications and infrastructure
                                        in cloud environments like AWS, Azure, or Google Cloud.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$550.00</h6>
                                    </div>
                                    <div class="d-flex py-2">
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">Book Now</button>
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">View
                                            Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Service List -->

                        <!-- Service List -->
                        <div class="col-xl-4 col-md-6">
                            <div class="service-widget servicecontent">
                                <div class="service-img">
                                    <a href="service-details.php">
                                        <img class="img-fluid serv-img" alt="Service Image"
                                            src="assets/img/serversupporttwel.jpg">
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Quality Assurance (QA) Engineer</a>
                                    </h3>
                                    <p>Ensures software meets quality standards through testing and quality control
                                        processes.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$600.00</h6>
                                    </div>
                                    <div class="d-flex py-2">
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">Book Now</button>
                                        <button class="btn btn-yellow w-100 text-white mx-1 bt-hover">View
                                            Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Service List --> --}}

                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="blog-pagination rev-page">
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link page-prev" href="#" tabindex="-1"><i
                                                    class="fa fa-long-arrow-left" aria-hidden="true"></i> PREV</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link page-next" href="#">NEXT <i
                                                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- /Pagination -->

                </div>
                <!-- /Service -->

            </div>
        </div>
    </div>
@endsection
