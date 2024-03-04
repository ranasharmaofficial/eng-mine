@extends('frontend.layouts.master')
@section('title') Upgrade-Migration @endsection


@section('content')@include('frontend.includes.header')
<section class="breadcrumbs-custom bg-image context-dark"
style="background-image: url({{ static_asset('assets/assets_web/img/server-sevice.png') }}); height:369px; background-repeat: no-repeat; background-size: cover; padding-top:239px">
<div class="container">
    <div>
        <h2 class="breadcrumbs-custom-title text-dark">Service All</h2>
        <ul class="breadcrumbs-custom-path">
            <li><a href="index.php">Home<i class="fa fa-arrow-right px-2" aria-hidden="true"></i></a></li>
            <li class="active" style="color:#ff008a;">Upgrade & Migration</li>
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
                                <a href="service-details.php">Hardware Upgrade</a>
                            </h3>
                            <p>Hardware upgrades involve replacing or adding hardware components to improve a
                                computer or system's performance. For example, upgrading a computer's RAM or
                                replacing a hard drive with a solid-state drive (SSD).</p>
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
                                    src="assets/img/serversupportten.jpg">
                            </a>
                        </div>
                        <div class="service-content online-service">
                            <h3 class="title fs-4">
                                <a href="service-details.php">Software Upgrade</a>
                            </h3>
                            <p>In the context of software, an upgrade typically involves installing a newer
                                version of an application, operating system, or firmware. This can result in
                                enhanced features, bug fixes, and security patches.</p>
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
                                <a href="service-details.php">Incremental Improvement</a>
                            </h3>
                            <p>Upgrades are often incremental and aim to build upon the existing infrastructure
                                or software. They may not involve significant changes in architecture or
                                functionality.</p>
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
                                <a href="service-details.php">Compatibility</a>
                            </h3>
                            <p>During an upgrade, it's essential to ensure compatibility between the existing
                                system and the upgraded component, whether it's software or hardware.</p>
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
                                <a href="service-details.php">Data Preservation</a>
                            </h3>
                            <p>In most cases, upgrades aim to preserve existing data, settings, and
                                configurations. Compatibility and data migration are crucial considerations.</p>
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
                                <a href="service-details.php">Are you looking some</a>
                            </h3>
                            <p>I never spend much time in school but I taught ladies plenty. It’s true I hire my
                                body out for pay,...</p>
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
                                <a href="service-details.php">Data Migration</a>
                            </h3>
                            <p>Data migration is a common type of migration where data is moved from one storage
                                system or format to another. This can involve transferring data from an old
                                database to a new one or moving data to a cloud-based storage solution.</p>
                            <div class="serv-info">
                                <span style="font-size:12px;" class="pe-2">Starting at</span>
                                <h6>$110.00</h6>
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
                                <a href="service-details.php">Platform Migration</a>
                            </h3>
                            <p>Platform migration involves moving from one technology platform to another. For
                                example, migrating from a legacy on-premises server infrastructure to a
                                cloud-based platform like AWS or Azure.</p>
                            <div class="serv-info">
                                <span style="font-size:12px;" class="pe-2">Starting at</span>
                                <h6>$120.00</h6>
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
                                <a href="service-details.php">Application Migration</a>
                            </h3>
                            <p>Application migration involves moving software applications from one environment
                                or platform to another. This can include migrating web applications, databases,
                                or entire software ecosystems.</p>
                            <div class="serv-info">
                                <span style="font-size:12px;" class="pe-2">Starting at</span>
                                <h6>$130.00</h6>
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
                                <a href="service-details.php">Change in Architecture</a>
                            </h3>
                            <p>Migrations often involve significant changes in architecture or infrastructure to
                                meet new requirements or leverage modern technologies.</p>
                            <div class="serv-info">
                                <span style="font-size:12px;" class="pe-2">Starting at</span>
                                <h6>$140.00</h6>
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
                                <a href="service-details.php">Testing and Validation</a>
                            </h3>
                            <p>Migrations require careful planning, testing, and validation to ensure that data
                                and functionality are successfully transferred to the new environment.</p>
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
                                    src="assets/img/serversupporttwel.jpg">
                            </a>
                        </div>
                        <div class="service-content">
                            <h3 class="title fs-4">
                                <a href="service-details.php">Risk Management</a>
                            </h3>
                            <p>Migrations carry inherent risks, such as data loss, downtime, and compatibility
                                issues. Mitigating these risks is a critical part of the migration process.</p>
                            <div class="serv-info">
                                <span style="font-size:12px;" class="pe-2">Starting at</span>
                                <h6>$160.00</h6>
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
