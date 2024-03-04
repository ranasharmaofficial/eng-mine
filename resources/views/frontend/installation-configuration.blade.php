@extends('frontend.layouts.master')
@section('title') Installation-Configuration @endsection
@section('content')@include('frontend.includes.header')
    <section class="breadcrumbs-custom bg-image context-dark"
        style="background-image: url({{ static_asset('assets/assets_web/img/server-sevice.png') }}); height:369px; background-repeat: no-repeat; background-size: cover; padding-top:239px">
        <div class="container">
            <div>
                <h2 class="breadcrumbs-custom-title text-dark">Service All</h2>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{ url('') }}">Home<i class="fa fa-arrow-right px-2" aria-hidden="true"></i></a></li>
                    <li class="active" style="color:#ff008a;">Installation & Configuration</li>
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
                                            src="{{ static_asset('assets/assets_web/img/serversupporteight.jpg')}}">
                                    </a>
                                </div>
                                <div class="service-content online-service">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Downloading or Acquiring</a>
                                    </h3>
                                    <p>Obtain the necessary installation files or media. This might involve downloading
                                        software from the internet, using physical installation disks, or other means of
                                        distribution.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$50.00</h6>
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
                                            src="assets/img/serversupport-siz.jpg">
                                    </a>
                                </div>
                                <div class="service-content online-service">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Setup</a>
                                    </h3>
                                    <p>Run the installation program or script provided by the software or hardware
                                        manufacturer. This program guides users through the installation process.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$60.00</h6>
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
                                        <a href="service-details.php">Configuration Options</a>
                                    </h3>
                                    <p>During installation, users may be prompted to make decisions about the software
                                        or hardware's initial settings, such as choosing installation directories,
                                        setting up user accounts, or configuring network settings.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$70.00</h6>
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
                                        <a href="service-details.php">Copying Files</a>
                                    </h3>
                                    <p>The installation program copies the necessary files, libraries, and dependencies
                                        onto the computer's storage device (e.g., hard drive or SSD).</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$80.00</h6>
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
                                        <a href="service-details.php">Registry or Database Entries</a>
                                    </h3>
                                    <p>In the case of software, relevant entries are often added to the system registry
                                        (on Windows) or configuration databases (on Unix-like systems) to keep track of
                                        installed software.</p>
                                    <div class="serv-info">
                                        <span style="font-size:12px;" class="pe-2">Starting at</span>
                                        <h6>$90.00</h6>
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
                                        <a href="service-details.php">Finalization</a>
                                    </h3>
                                    <p>Once all files are copied, the installation program may perform final
                                        configurations and checks to ensure that the software or hardware is ready for
                                        use.</p>
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
                                            src="assets/img/serversupportten.jpg">
                                    </a>
                                </div>
                                <div class="service-content online-service">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Completion</a>
                                    </h3>
                                    <p>The installation process is considered complete when all necessary files and
                                        settings are in place, and the software or hardware is ready to be used.</p>
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
                                            src="assets/img/serversupportelen.jpg">
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Setting Preferences</a>
                                    </h3>
                                    <p>Configuring options such as user preferences, language settings, and regional
                                        settings in software applications.</p>
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
                                            src="assets/img/serversupporttwel.jpg">
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Network Configuration</a>
                                    </h3>
                                    <p>Configuring network settings, including IP addresses, DNS servers, and network
                                        protocols, to establish connectivity.</p>
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
                                            src="assets/img/serversupportthirteen.jpeg">
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Security Configuration</a>
                                    </h3>
                                    <p>Enabling or configuring security features such as firewalls, access controls, and
                                        encryption to protect systems and data.</p>
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
                                            src="assets/img/serversupporttwel.jpg">
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Hardware Configuration</a>
                                    </h3>
                                    <p>Adjusting hardware settings or parameters, like display resolution, printer
                                        settings, or peripheral device configurations.</p>
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
                                            src="assets/img/serversupporttwel.jpg">
                                    </a>
                                </div>
                                <div class="service-content">
                                    <h3 class="title fs-4">
                                        <a href="service-details.php">Application Configuration</a>
                                    </h3>
                                    <p>Customizing software applications by specifying options such as default fonts,
                                        notification preferences, and user-specific settings.</p>
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
