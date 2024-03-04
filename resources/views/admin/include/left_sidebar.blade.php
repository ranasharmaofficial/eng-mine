
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
					<a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
				</li>
                <li class="submenu"> <a href="#"><i class="fa fa-wrench aiz-side-nav-icon"></i> <span>
                            Services Management</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ url('admin/service_category') }}">Service Category</a></li>
                        <li><a href="{{ url('admin/service-sub-category') }}">Service Sub Category</a></li>
                        <li><a href="{{ url('admin/service') }}">Service List</a></li>
                        <li><a href="{{ url('admin/sub-service') }}">Sub Service Pricing</a></li>
                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fa fa-user-tie aiz-side-nav-icon"></i> <span> Staff </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('admin.engineer-list.index') }}">Engineer List</a></li>
                        <li><a href="{{ route('admin.workingHourList') }}">Engineer Working HR List</a></li>
                        <li><a href="{{  route('admin.staffs.index') }}">Manage Staff</a></li>
                        <li><a href="{{ route('admin.certifiedEngineer') }}">Certified by Engineer</a></li>
                    </ul>
                </li>

                <!-- <li class="submenu"> <a href="#"><i class="fa fa-dolly-flatbed"></i> <span>
                           Service Area</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="service_state.php">State</a></li>
                        <li><a href="service_city.php">City</a></li>
                        <li><a href="service_area.php">Area</a></li>
                    </ul>
                </li> -->
                <li class="submenu"> <a href="#"><i class="fa fa-dolly-flatbed"></i> <span>
                            Service Order</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('admin.service-order.index') }}">All Orders</a></li>
                        <li><a href="{{ route('admin.order.pendingOrder') }}">Pending Order</a></li>
                        <li><a href="{{ route('admin.order.ongoingOrder') }}">Ongoing Order</a></li>
                        <li><a href="{{ route('admin.order.completedOrder') }}">Completed Order</a></li>
                        <li><a href="{{ route('admin.order.declinedOrder') }}">Declined Order</a></li>
                        <li><a href="{{ route('admin.order.cancelledOrder') }}">Cancelled Order</a></li>
                    </ul>
                </li>
                {{--<li class="submenu"> <a href="#"><i class="fa fa-dolly-flatbed"></i> <span>
                            Order</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="order_list.php">All Order List</a></li>
                        <li><a href="complete_order.php">Complete Order</a></li>
                        <li><a href="incomplete_order_list.php">Incomplete Order</a></li>
                        <li><a href="cancel_order_list.php">Cancelled Order</a></li>
                        <li><a href="decline_order_list.php">Decline Order</a></li>
                    </ul>
                </li>--}}

                <li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                    Manage Customers</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('admin.customerList') }}">Customer List</a></li>
                        <li><a href="{{ route('admin.client.index') }}"> Our Client</a></li>
                        <li><a href="{{ route('admin.guestList') }}"> Annonymous User</a></li>
                    </ul>
                </li>

                <li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                            Estimate </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ route('admin.customer_list') }}">Customer Estimate</a></li>
                        <li><a href="{{ route('admin.guestList') }}"> Annonymous User Estimate</a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="transaction.php"><i class="fa fa-dharmachakra aiz-side-nav-icon"></i> <span>Transaction</span></a>
                </li> --}}
                <li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                            Commissions</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ url('admin/engineer-commission') }}">Engineer Commissions</a></li>


                    </ul>
                </li>
                {{-- <li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                            Withdraws</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="javascript:void(0)">Withdraws Request</a></li>
                        <!-- <li><a href="withdraws-method.php">Withdraws Method</a></li> -->


                    </ul>
                </li> --}}
                <li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                            Manage Blog</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ url('admin/categories') }}"> Categories </a></li>
						<li><a href="{{ url('admin/blogs') }}"> All Blogs </a></li>
						<li><a href="{{ url('admin/blogs/create') }}"> Add New Blog </a></li>
                    </ul>
                </li>
                {{--<li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                            Home Pages Manage </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="hero-section.php">Slider Section</a></li>
                        <li><a href="about-section.php">About Us Section</a></li>
                        <li><a href="about-counter.php">About Us Counter</a></li>
                        <li><a href="partner-section.php">Partners</a></li>
                        <li><a href="how_it_works.php">How It Works</a></li>
                        <li><a href="choose_us_section.php"> Why Choose Us</a></li>
                    </ul>
                </li>--}}

                {{-- <li> <a href="deposits.php"><i class="fa fa-dharmachakra aiz-side-nav-icon"></i> <span>Deposits</span></a>
                </li> --}}
                <li> <a href="#"><i class="fa fa-dharmachakra aiz-side-nav-icon"></i> <span>CMS Pages</span><span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ url('admin/pages') }}"> All Master Pages </a></li>
						<li><a href="{{ url('admin/page_sections') }}"> All Page Section </a></li>
						<li><a href="{{ url('admin/section_data') }}"> All Section Data </a></li>
						<li><a href="{{ url('admin/certificates') }}"> All Certificates </a></li>
                    </ul>
                </li>


                <li class="submenu"> <a href="#"><i class="fa fa-question aiz-side-nav-icon"></i> <span>
                            Enquiry </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
					<li><a href="{{ url('admin/customer/leads') }}"> All Customer Leads </a></li>
						<li><a href="{{ url('admin/subscribers') }}">Subscriber List</a></li>
                        {{--<li><a href="enquiry_normal.php">Enquiry Normal</a></li>--}}
                    </ul>
                </li>

                <li class="submenu"> <a href="#"><i class="fa fa-desktop aiz-side-nav-icon"></i> <span>
                            Website Setup</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{ url('admin/website/header') }}">Header</a></li>
                        <li><a href="{{ url('admin/website/footer') }}">Footer</a></li>
                        <li><a href="{{ url('admin/website/social_media') }}">Social Media</a></li>
                        <li><a href="{{ route('admin.masterdesignation.index') }}">Master Designation</a></li>
                        <li><a href="{{ url('admin/usertypes') }}"> User Type </a></li>
                    </ul>
                </li>


                <li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                            Feedback / Complain</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">


                        <li><a href="{{ route('admin.customerFeedback') }}">Customer Feedback List</a></li>
                        <li><a href="{{ route('admin.customerComplain') }}">Customer Complain List</a></li>
                        {{-- <li><a href="javascript:void(0)">Feedback Admin List</a></li> --}}
                    </ul>
                </li>
                {{-- <li class="submenu"> <a href="#"><i class="fa fa-user-friends aiz-side-nav-icon"></i> <span>
                            Template</span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="javascript:void(0)">SMS Template List</a></li>
                        <li><a href="javascript:void(0)">Mailer Template List</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span>
                            Package </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="javascript:void(0)"> Package Listing </a></li>
                    </ul>
                </li> --}}

                <!-- <li> <a href="report.php"><i class="fa fa-file-alt aiz-side-nav-icon"></i> <span>Report</span></a> -->
                </li>

                <li> <a href="{{ url('admin/faqs') }}"><i class="fas fa-cg"></i> <span>FAQs</span></a>
                </li>

            </ul>
        </div>
    </div>
</div>
