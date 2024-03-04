<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LogoutController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ImageCategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\CmsPageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\SolutionController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ServiceOrderController;
use App\Http\Controllers\Admin\EngineerController;
use App\Http\Controllers\Admin\MasterDesignationController;
use App\Http\Controllers\Admin\UserTypeController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\Admin\InvoiceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** Route for clear cache */
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared by @RanaSharma";
})->name('clear-cache');

Route::get('admin/auth/login', [LoginController::class, 'login'])->name('admin.auth.login')->middleware('AlreadyLoggedIn');
Route::get('admin', [LoginController::class, 'login'])->name('admin')->middleware('AlreadyLoggedIn');
Route::post('adminAuthLogin', [LoginController::class, 'adminAuthLogin'])->name('adminAuthLogin')->middleware('AlreadyLoggedIn');

Route::group(['prefix' => 'admin', 'middleware' => ['AdminAuthCheck'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('dashboard');
    Route::get('/reset-password', [AdminController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/updateAdminPassword', [AdminController::class, 'updateAdminPassword'])->name('updateAdminPassword');


    Route::resource('/usertypes', UserTypeController::class);
    Route::post('/get_usertypes_details', [UserTypeController::class, 'get_usertypes_details'])->name('get_usertypes_details');
    Route::post('/update_usertypes', [UserTypeController::class, 'update_usertypes'])->name('update_usertypes');


    Route::resource('/designation', DesignationController::class);

    /** Route for Category and Sub Category */
    Route::resource('/categories', CategoryController::class);
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::resource('/sub_categories', SubCategoryController::class);

    /** Route for Locations */
    Route::resource('/countries', CountryController::class);

    /** Route for Blog */
    Route::resource('/blogs', BlogController::class);
    Route::get('/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
    // Route::post('/blogs/fetch_subcategory', [BlogController::class, 'fetchSubCategory'])->name('blogs.fetch_subcategory');
    Route::post('/blogs/fetch_category', [BlogController::class, 'fetchCategory'])->name('blogs.fetch_category');
    Route::get('/blogs/show_comments/{blog_id}', [BlogController::class, 'showComments'])->name('blogs.show_comments');
    Route::get('/blogs/show_likes/{blog_id}', [BlogController::class, 'showLikes'])->name('blogs.show_likes');
    Route::get('/blogs/show_views/{blog_id}', [BlogController::class, 'showViews'])->name('blogs.show_views');
    Route::get('/blog/change_comment_status', [BlogController::class, 'changeCommentStatus'])->name('blog.change_comment_status');

    /** Route For Gallery */
    Route::resource('/image_categories', ImageCategoryController::class);
    Route::get('/image_categories/delete/{id}', [ImageCategoryController::class, 'delete'])->name('image_categories.delete');
    Route::resource('/galleries', GalleryController::class);
    Route::get('/galleries/delete/{id}', [GalleryController::class, 'delete'])->name('galleries.delete');

    /** Route For CMS Page */
    Route::resource('/pages', CmsPageController::class);

    /** Route For Page Section */
    Route::get('/page_sections', [CmsPageController::class, 'pageSectionIndex'])->name('page_sections.index');
    Route::get('/page_sections/create', [CmsPageController::class, 'pageSectionCreate'])->name('page_sections.create');
    Route::post('/page_sections/store', [CmsPageController::class, 'pageSectionStore'])->name('page_sections.store');
    Route::get('/page_sections/{id}/edit', [CmsPageController::class, 'pageSectionEdit'])->name('page_sections.edit');
    Route::put('/page_sections/update/{id}', [CmsPageController::class, 'pageSectionUpdate'])->name('page_sections.update');

    /** Route For Section Data */
    Route::get('/section_data', [CmsPageController::class, 'sectionDataIndex'])->name('section_data.index');
    Route::get('/section_data/create', [CmsPageController::class, 'sectionDataCreate'])->name('section_data.create');
    Route::post('/section_data/fetch_section', [CmsPageController::class, 'fetchSection'])->name('section_data.fetch_section');
    Route::post('/section_data/store', [CmsPageController::class, 'sectionDataStore'])->name('section_data.store');
    Route::get('/section_datas/{id}/edit', [CmsPageController::class, 'sectionDataEdit'])->name('section_data.edit');
    Route::put('/section_datas/update/{id}', [CmsPageController::class, 'sectionDataUpdate'])->name('section_data.update');
	Route::get('/cms_section_datas/delete/{id}', [CmsPageController::class, 'deleteCmsSectionData'])->name('cmssection_data.delete');

    /** Route For Product Page */
    Route::resource('/product', ProductController::class);
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    /** Route For Product Page Section */
    Route::get('/product_sections', [ProductController::class, 'productSectionIndex'])->name('product_sections.index');
    Route::get('/product_sections/create', [ProductController::class, 'productSectionCreate'])->name('product_sections.create');
    Route::post('/product_sections/store', [ProductController::class, 'productSectionStore'])->name('product_sections.store');
    Route::get('/product_sections/{id}/edit', [ProductController::class, 'productSectionEdit'])->name('product_sections.edit');
    Route::put('/product_sections/update/{id}', [ProductController::class, 'productSectionUpdate'])->name('product_sections.update');
    Route::get('/product_sections/delete/{id}', [ProductController::class, 'deleteProductSection'])->name('product_sections.delete');

    /** Route For  Product Section Data */
    Route::get('/product_section_data', [ProductController::class, 'productsectionDataIndex'])->name('productsection_data.index');
    Route::get('/product_section_data/create', [ProductController::class, 'productsectionDataCreate'])->name('productsectionDataCreate.create');
    Route::post('/product_section_data/fetch_section', [ProductController::class, 'productfetchSection'])->name('productsection_data.fetch_section');
    Route::post('/product_section_data/store', [ProductController::class, 'productsectionDataStore'])->name('productsection_data.store');
    Route::get('/product_section_datas/{id}/edit', [ProductController::class, 'productsectionDataEdit'])->name('productsection_data.edit');
    Route::put('/product_section_datas/update/{id}', [ProductController::class, 'productsectionDataUpdate'])->name('productsection_data.update');
    Route::get('/product_section_datas/delete/{id}', [ProductController::class, 'deleteProductSectionData'])->name('productsection_data.delete');

    /** Route For Product Page */
    Route::resource('/service_category', ServiceController::class);
    Route::get('/service_category/delete/{id}', [ServiceController::class, 'delete'])->name('service_category.delete');
    Route::get('/service_category_export', [ServiceController::class, 'serviceCategoryExport'])->name('service_category.serviceCategoryExport');
    Route::post('/updateServiceCategory', [ServiceController::class, 'updateServiceCategory'])->name('updateServiceCategory');

    Route::get('/service-sub-category', [ServiceController::class, 'ServiceSubCategory'])->name('ServiceSubCategory.index');
    Route::get('/service-sub-category/create', [ServiceController::class, 'ServiceSubCategoryCreate'])->name('ServiceSubCategory.index');
    Route::post('/service_sub_category/store', [ServiceController::class, 'ServiceSubCategoryStore'])->name('service_sub_category.store');
    Route::get('/service_sub_category/{id}/edit', [ServiceController::class, 'ServiceSubCategoryEdit'])->name('service_sub_category.edit');
    Route::put('/service_sub_category/update/{id}', [ServiceController::class, 'ServiceSubCategoryUpdate'])->name('service_sub_category.update');
    Route::get('/service_sub_category/delete/{id}', [ServiceController::class, 'deleteServiceSubCategory'])->name('service_sub_category.deleteServiceSubCategory');
    Route::get('/service_subcategory_export', [ServiceController::class, 'serviceSubCategoryExport'])->name('service_category.serviceSubCategoryExport');
    // Route::get('/services/delete/{id}', [ServiceController::class, 'deleteServices'])->name('service_sub_category.deleteServices');
    Route::post('/admin/get-service-list', [ServiceController::class, 'getServiceList'])->name('getServiceList');
    Route::post('/admin/get-engineer-list', [ServiceController::class, 'getEngineerList'])->name('getEngineerList');

    Route::get('/service', [ServiceController::class, 'serviceList'])->name('service.index');
    Route::get('/main_service_export', [ServiceController::class, 'mainServiceExport'])->name('service.mainServiceExport');
    Route::get('/service/create', [ServiceController::class, 'serviceCreate'])->name('service.index');
    Route::post('/service/store', [ServiceController::class, 'serviceStore'])->name('service.store');
    Route::get('/service/{id}/edit', [ServiceController::class, 'serviceEdit'])->name('service.edit');
    Route::put('/service/update/{id}', [ServiceController::class, 'serviceUpdate'])->name('service.update');
    Route::get('/services/delete/{id}', [ServiceController::class, 'deleteServices'])->name('service.deleteServices');

    Route::get('/sub-service', [ServiceController::class, 'subServiceList'])->name('subservice.index');
    Route::get('/sub_service_export', [ServiceController::class, 'subServiceExport'])->name('subservice.subServiceExport');
    Route::get('/sub-service/create', [ServiceController::class, 'subServiceCreate'])->name('subservice.index');
    Route::post('/sub-service/store', [ServiceController::class, 'subServiceStore'])->name('subservice.store');
    Route::get('/sub-service/{id}/edit', [ServiceController::class, 'subServiceEdit'])->name('subservice.edit');
    Route::put('/sub-service/update/{id}', [ServiceController::class, 'subServiceUpdate'])->name('subservice.update');
    Route::get('/sub-service/delete/{id}', [ServiceController::class, 'subServiceDelete'])->name('subservice.subServiceDelete');

    Route::post('get-subcategory-list', [ServiceController::class, 'getSubcategoryList'])->name('getSubcategoryList');
    Route::post('get-service-list-ad', [ServiceController::class, 'getServiceListAdmin'])->name('getServiceListAdmin');


    /** Route For Product Page Section */
    Route::get('/service_sections', [ServiceController::class, 'serviceSectionIndex'])->name('service_sections.index');
    Route::get('/service_sections/create', [ServiceController::class, 'serviceSectionCreate'])->name('service_sections.create');
    Route::post('/service_sections/store', [ServiceController::class, 'serviceSectionStore'])->name('service_sections.store');
    Route::get('/service_sections/{id}/edit', [ServiceController::class, 'serviceSectionEdit'])->name('service_sections.edit');
    Route::put('/service_sections/update/{id}', [ServiceController::class, 'serviceSectionUpdate'])->name('service_sections.update');
    Route::get('/service_sections/delete/{id}', [ServiceController::class, 'deleteServiceSection'])->name('service_sections.delete');

    /** Route For  Product Section Data */
    Route::get('/service_section_data', [ServiceController::class, 'servicesectionDataIndex'])->name('servicesection_data.index');
    Route::get('/service_section_data/create', [ServiceController::class, 'servicesectionDataCreate'])->name('servicesectionDataCreate.create');
    Route::post('/service_section_data/fetch_service_section', [ServiceController::class, 'servicefetchSection'])->name('servicesection_data.fetch_section');
    Route::post('/service_section_data/store', [ServiceController::class, 'servicesectionDataStore'])->name('servicesection_data.store');
    Route::get('/service_section_datas/{id}/edit', [ServiceController::class, 'servicesectionDataEdit'])->name('servicesection_data.edit');
    Route::put('/service_section_datas/update/{id}', [ServiceController::class, 'servicesectionDataUpdate'])->name('servicesection_data.update');
    Route::get('/service_section_datas/delete/{id}', [ServiceController::class, 'deleteServiceSectionData'])->name('servicesection_data.delete');

    /** Route For Indusry CMS Page */
    Route::resource('/industry_pages', IndustryController::class);

    /** Route For Page Section */
    Route::get('/industry_page_sections', [IndustryController::class, 'pageSectionIndex'])->name('industry_page_sections.index');
    Route::get('/industry_page_sections/create', [IndustryController::class, 'pageSectionCreate'])->name('industry_page_sections.create');
    Route::post('/industry_page_sections/store', [IndustryController::class, 'pageSectionStore'])->name('industry_page_sections.store');
    Route::get('/industry_page_sections/{id}/edit', [IndustryController::class, 'pageSectionEdit'])->name('industry_page_sections.edit');
    Route::put('/industry_page_sections/update/{id}', [IndustryController::class, 'pageSectionUpdate'])->name('industry_page_sections.update');

    /** Route For Indusry Section Data */
    Route::get('/industry_section_data', [IndustryController::class, 'sectionDataIndex'])->name('industry_section_data.index');
    Route::get('/industry_section_data/create', [IndustryController::class, 'sectionDataCreate'])->name('industry_section_data.create');
    Route::post('/industry_section_data/fetch_section', [IndustryController::class, 'fetchSection'])->name('industry_section_data.fetch_section');
    Route::post('/industry_section_data/store', [IndustryController::class, 'sectionDataStore'])->name('industry_section_data.store');
    Route::get('/industry_section_datas/{id}/edit', [IndustryController::class, 'sectionDataEdit'])->name('industry_section_data.edit');
    Route::put('/industry_section_datas/update/{id}', [IndustryController::class, 'sectionDataUpdate'])->name('industry_section_data.update');

    Route::get('/price/enquiry', [CmsPageController::class, 'priceEnquiryList'])->name('price.enquiry');
    Route::get('/customer/leads', [CmsPageController::class, 'customerLeadList'])->name('customer.leads');
    Route::get('/career/enquiry', [CmsPageController::class, 'careerEnquiryList'])->name('career.enquiry');
    Route::get('/hire_team/enquiry', [CmsPageController::class, 'hireTeamEnquiryList'])->name('hire_team.enquiry');
    Route::get('/quotation-list', [CmsPageController::class, 'quotationList'])->name('career.quotationList');
    Route::get('/schedule-meeting-list', [CmsPageController::class, 'scheduleMeetingList'])->name('career.scheduleMeetingList');
    Route::get('/subscribers', [CmsPageController::class, 'subscriberList'])->name('subscribers');
    Route::get('/certificates', [CmsPageController::class, 'certificateList'])->name('certificateList');
    Route::get('/delete/certificate/{id}', [CmsPageController::class, 'deleteCertificate'])->name('deleteCertificate');
    Route::get('/certificate/add-certificate', [CmsPageController::class, 'addCertificate'])->name('addCertificate');
    Route::post('storeCertificate', [CmsPageController::class, 'storeCertificate'])->name('storeCertificate');
    Route::post('/engineer/delete-customer-lead', [CmsPageController::class, 'deleteCustomerLead'])->name('deleteCustomerLead');
    Route::post('/engineer/delete-subscribers', [CmsPageController::class, 'deleteSubscribers'])->name('deleteSubscribers');

    /** Route For Testimonial Page */
    Route::resource('/testimonials', TestimonialController::class);
    Route::get('/testimonials/delete/{id}', [TestimonialController::class, 'delete'])->name('testimonials.delete');

    Route::get('/testimonial/videos', [TestimonialController::class, 'videoIndex'])->name('testimonial.videos');
    Route::get('/testimonial/videos/create', [TestimonialController::class, 'videoCreate'])->name('testimonial.videos.create');
    Route::post('/testimonial/videos/store', [TestimonialController::class, 'videoStore'])->name('testimonial.videos.store');
    Route::get('/testimonial/videos/{id}/edit', [TestimonialController::class, 'videoEdit'])->name('testimonial.videos.edit');
    Route::put('/testimonial/videos/update/{id}', [TestimonialController::class, 'videoUpdate'])->name('testimonial.videos.update');
    Route::get('/testimonial/videos/delete/{id}', [TestimonialController::class, 'deleteVideo'])->name('testimonial.videos.delete');

    /** Route For user/customer Page */
    Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/change_status', [UserController::class, 'changeStatus'])->name('users.change_status');

    /** Route For Bussiness Setting page */
    Route::get('/website/social_media', [BusinessController::class, 'socialMedia'])->name('website.social_media');
    Route::get('/website/header', [BusinessController::class, 'websiteHeader'])->name('website.header');
    Route::get('/website/footer', [BusinessController::class, 'websiteFooter'])->name('website.footer');
    Route::post('/website/update', [BusinessController::class, 'websiteSetupUpdate'])->name('website.update');
    Route::post('/website/update_widget', [BusinessController::class, 'websiteSetupUpdateWidget'])->name('website.update_widget');
    Route::get('/website/office_setup', [BusinessController::class, 'officeSetup'])->name('website.office_setup');
    Route::post('/website/update_office_setup', [BusinessController::class, 'updateOfficeSetup'])->name('website.update_office_setup');

    Route::resource('/faqs', FaqController::class);
    Route::get('faq-category', [FaqController::class, 'faqCategory'])->name('faq.faqCategory');
    Route::get('faq-category-list', [FaqController::class, 'faqCategoryList'])->name('faqCategoryList');
    Route::get('faq-category-edit/{id}', [FaqController::class, 'faqCategoryEdit'])->name('faqCategoryEdit');
    Route::post('storeFaqCategory', [FaqController::class, 'storeFaqCategory'])->name('storeFaqCategory');
    Route::post('FaqCategoryUpdate', [FaqController::class, 'FaqCategoryUpdate'])->name('FaqCategoryUpdate');
    Route::post('fetch_faq_category', [FaqController::class, 'fetch_faq_category'])->name('fetch_faq_category');
    Route::get('/faqs/delete/{id}', [FaqController::class, 'delete'])->name('faqs.delete');

    Route::resource('/staffs', StaffController::class);
    Route::post('/staffs/addStaffRegister', [StaffController::class, 'addStaffRegister'])->name('addStaffRegister');
    Route::post('/staffs/updateStaffdetails', [StaffController::class, 'updateStaffdetails'])->name('updateStaffdetails');

    Route::get('/staffs/staff_export', [StaffController::class, 'staffExport'])->name('staffExport');

    Route::get('/staffs/customer/customer-list', [StaffController::class, 'customerList'])->name('customerList');
    Route::get('/customer/customer-export', [StaffController::class, 'customerExport'])->name('customerExport');
    Route::get('/user/change_status', [StaffController::class, 'changeStatus'])->name('customer.change_status');

    Route::get('/customer/customer-list', [StaffController::class, 'customer_list'])->name('customer_list');
    Route::get('/engineer-commission', [StaffController::class, 'engineerCommission'])->name('engineerCommission');




    Route::get('/customer/guest-list', [StaffController::class, 'guestList'])->name('guestList');
    Route::get('/customer/view-guest-estimate/{id}', [StaffController::class, 'viewGuestEstimate'])->name('viewGuestEstimate');
    Route::get('/customer/view-customer-estimate/{id}', [StaffController::class, 'viewCustomerEstimate'])->name('viewGuestEstimate');

    Route::get('/customer/guest-export', [StaffController::class, 'guestExport'])->name('guestExport');
    // Route::get('/user/change_status', [StaffController::class, 'changeStatus'])->name('customer.change_status');

    Route::resource('/masterdesignation', MasterDesignationController::class);

    /** Route For solutions Page */
    Route::resource('/solutions', SolutionController::class);
	Route::get('/solutions/delete/{id}', [SolutionController::class, 'delete'])->name('solutions.delete');

    /** Route For Page Section */
    Route::get('/solution_page_sections', [SolutionController::class, 'solutionSectionIndex'])->name('solution_page_sections.index');
    Route::get('/solution_page_sections/create', [SolutionController::class, 'solutionSectionCreate'])->name('solution_page_sections.create');
    Route::post('/solution_page_sections/store', [SolutionController::class, 'solutionSectionStore'])->name('solution_page_sections.store');
    Route::get('/solution_page_sections/{id}/edit', [SolutionController::class, 'solutionSectionEdit'])->name('solution_page_sections.edit');
    Route::put('/solution_page_sections/update/{id}', [SolutionController::class, 'solutionSectionUpdate'])->name('solution_page_sections.update');
	Route::get('/solution_sections/delete/{id}', [SolutionController::class, 'deleteSolutionSection'])->name('solution_sections.delete');


    /** Route For Indusry Section Data */
    Route::get('/solution_section_data', [SolutionController::class, 'solutionsectionDataIndex'])->name('solution_section_data.index');
    Route::get('/solution_section_data/create', [SolutionController::class, 'solutionsectionDataCreate'])->name('solution_section_data.create');
    Route::post('/solution_section_data/fetch_section', [SolutionController::class, 'solutionfetchSection'])->name('solution_section_data.fetch_section');
    Route::post('/solution_section_data/store', [SolutionController::class, 'solutionsectionDataStore'])->name('solution_section_data.store');
    Route::get('/solution_section_data/{id}/edit', [SolutionController::class, 'solutionsectionDataEdit'])->name('solution_section_data.edit');
    Route::put('/solution_section_data/update/{id}', [SolutionController::class, 'solutionsectionDataUpdate'])->name('solution_section_data.update');
    // Route::get('/solution_section_data/delete/{id}', [SolutionController::class, 'delete'])->name('solution_section_data.delete');
	Route::get('/solution_section_datas/delete/{id}', [SolutionController::class, 'deleteSolutionSectionData'])->name('solutionsection_data.delete');


    /** Route for Pricing Section  */
    Route::get('/pricing/price-type/list', [PricingController::class, 'priceTypeList'])->name('pricing.priceTypeList');
    Route::get('/pricing/price-type/add', [PricingController::class, 'priceTypeAdd'])->name('pricing.priceTypeAdd');

    Route::post('storePriceType', [PricingController::class, 'storePriceType'])->name('pricing.storePriceType');

    Route::get('/pricing/list', [PricingController::class, 'pricingList'])->name('pricing.pricingList');
    Route::get('/pricing/add', [PricingController::class, 'addPricing'])->name('pricing.addPricing');
    Route::post('storePricings', [PricingController::class, 'storePricings'])->name('storePricings');
    Route::post('updatePricings/{id}', [PricingController::class, 'updatePricings'])->name('updatePricings');
    Route::get('pricing/get_table_fields', [PricingController::class, 'getTableFields'])->name('pricing.get_table_fields');
    Route::get('pricing/get_sub_products', [PricingController::class, 'getSubProducts'])->name('pricing.get_sub_products');
    Route::get('pricing/edit-pricing/{id}', [PricingController::class, 'editPricing'])->name('pricing.edit-pricing');
    Route::get('pricing/delete/{id}', [PricingController::class, 'deletePricing'])->name('pricing.delete');

    // Route::resource('/careers', CareerController::class);

    /** Route For Partner Page */
    Route::resource('/partner', PartnerController::class);
    Route::get('/partner/delete/{id}', [PartnerController::class, 'delete'])->name('partner.delete');

    /** Route For Partner Page Section */
    Route::get('/partner_sections', [PartnerController::class, 'partnerSectionIndex'])->name('partner_sections.index');
    Route::get('/partner_sections/create', [PartnerController::class, 'partnerSectionCreate'])->name('partner_sections.create');
    Route::post('/partner_sections/store', [PartnerController::class, 'partnerSectionStore'])->name('partner_sections.store');
    Route::get('/partner_sections/{id}/edit', [PartnerController::class, 'partnerSectionEdit'])->name('partner_sections.edit');
    Route::put('/partner_sections/update/{id}', [PartnerController::class, 'partnerSectionUpdate'])->name('partner_sections.update');
    Route::get('/partner_sections/delete/{id}', [PartnerController::class, 'deletePartnerSection'])->name('partner_sections.delete');

    /** Route For  Partner Section Data */
    Route::get('/partner_section_data', [PartnerController::class, 'partnersectionDataIndex'])->name('partnersection_data.index');
    Route::get('/partner_section_data/create', [PartnerController::class, 'partnersectionDataCreate'])->name('partnersectionDataCreate.create');
    Route::post('/partner_section_data/fetch_section', [PartnerController::class, 'partnerfetchSection'])->name('partnersection_data.fetch_section');
    Route::post('/partner_section_data/store', [PartnerController::class, 'partnersectionDataStore'])->name('partnersection_data.store');
    Route::get('/partner_section_datas/{id}/edit', [PartnerController::class, 'partnersectionDataEdit'])->name('partnersection_data.edit');
    Route::put('/partner_section_datas/update/{id}', [PartnerController::class, 'partnersectionDataUpdate'])->name('partnersection_data.update');
    Route::get('/partner_section_datas/delete/{id}', [PartnerController::class, 'deletePartnerSectionData'])->name('partnersection_data.delete');

        /** Route For  Service Order */
    Route::resource('/service-order', ServiceOrderController::class);

    Route::get('/order/export-all-order', [ServiceOrderController::class, 'exportallOrder'])->name('order.exportallOrder');
    Route::get('/order/export-pending-order', [ServiceOrderController::class, 'exportPendingOrder'])->name('order.exportPendingOrder');
    Route::get('/order/export-ongoing-order', [ServiceOrderController::class, 'exportOngoingOrder'])->name('order.exportOngoingOrder');
    Route::get('/order/export-completed-order', [ServiceOrderController::class, 'exportCompletedOrder'])->name('order.exportCompletedOrder');
    Route::get('/order/export-cancelled-order', [ServiceOrderController::class, 'exportCancelledOrder'])->name('order.exportCancelledOrder');

    Route::get('/order/order_details', [ServiceOrderController::class, 'order_details'])->name('order.order_details');
    Route::get('/order/pending-order', [ServiceOrderController::class, 'pendingOrder'])->name('order.pendingOrder');
    Route::get('/order/ongoing-order', [ServiceOrderController::class, 'ongoingOrder'])->name('order.ongoingOrder');
    Route::get('/order/completed-order', [ServiceOrderController::class, 'completedOrder'])->name('order.completedOrder');
    Route::get('/order/declined-order', [ServiceOrderController::class, 'declinedOrder'])->name('order.declinedOrder');
    Route::get('/order/cancelled-order', [ServiceOrderController::class, 'cancelledOrder'])->name('order.cancelledOrder');

    Route::get('/order/order_status', [ServiceOrderController::class, 'updateOrderStatus'])->name('updateOrderStatus');
    Route::get('/order/payment_status', [ServiceOrderController::class, 'updatePaymentStatus'])->name('updatePaymentStatus');
    Route::get('/order/order-view/{id}', [ServiceOrderController::class, 'viewOrderDetails'])->name('viewOrderDetails');
    Route::get('/order/download-invoice/{id}', [InvoiceController::class, 'downloadInvoice'])->name('downloadInvoice');
    Route::get('/order/view-invoice/', [InvoiceController::class, 'viewInvoice'])->name('downloviewInvoiceadInvoice');

    Route::post('assignServicetoEngineer', [ServiceOrderController::class, 'assignServicetoEngineer'])->name('assignServicetoEngineer');
    Route::post('updateCustomerOrder', [ServiceOrderController::class, 'updateCustomerOrder'])->name('updateCustomerOrder');

    Route::post('/post/invoice', [ServiceOrderController::class, 'generateInvoice'])->name('generateInvoice');


    Route::get('/service-complete', [ServiceOrderController::class, 'complteserviceIndex'])->name('service-complete.index');


    Route::get('/service-decline', [ServiceOrderController::class, 'declineserviceIndex'])->name('service-decline.index');

    // Route For Staff
    Route::resource('/engineer-list', EngineerController::class);
    Route::get('/engineer/engineer_export', [EngineerController::class, 'engineerExport'])->name('users.engineerExport');
    Route::get('/engineer/staff_export', [EngineerController::class, 'staffExport'])->name('users.staffExport');
    Route::get('/engineer/change_status', [EngineerController::class, 'changeStatus'])->name('users.change_status');
    Route::get('/engineer/engineer_details', [EngineerController::class, 'engineer_details'])->name('users.engineer_details');
    Route::get('/engineer/edit-engineer/{id}', [EngineerController::class, 'editEngineer'])->name('editEngineer');
    Route::get('/engineer/add-working-hour/{id}', [EngineerController::class, 'addWorkingHour'])->name('addWorkingHour');
    Route::post('/engineer/delete-engineer', [EngineerController::class, 'deleteEngineer'])->name('deleteEngineer');


    Route::post('/admin/updateEmploymentStatus', [EngineerController::class, 'updateEmploymentStatus'])->name('updateEmploymentStatus');
    Route::post('/admin/updateEmployeeDetails', [EngineerController::class, 'updateEmployeeDetails'])->name('updateEmployeeDetails');
    Route::post('/admin/addEmployeeDetails', [EngineerController::class, 'addEmployeeDetails'])->name('addEmployeeDetails');
    Route::post('/admin/addEngineerWorkingHour', [EngineerController::class, 'addEngineerWorkingHour'])->name('addEngineerWorkingHour');
    Route::post('/admin/saveCerifiedEngineer', [EngineerController::class, 'saveCerifiedEngineer'])->name('saveCerifiedEngineer');
    Route::post('/admin/updateCerifiedEngineer', [EngineerController::class, 'updateCerifiedEngineer'])->name('updateCerifiedEngineer');

    Route::get('/engineer/working-hour-export', [EngineerController::class, 'engineerWorkingHourExport'])->name('engineerWorkingHourExport');
    Route::get('/engineer/working-hour-list', [EngineerController::class, 'workingHourList'])->name('workingHourList');
    Route::get('/engineer/certified-engineer', [EngineerController::class, 'certifiedEngineer'])->name('certifiedEngineer');
    Route::get('/engineer/certified-engineer/add', [EngineerController::class, 'addCertifiedEngineer'])->name('addCertifiedEngineer');
    Route::get('/engineer/edit-certified-engineer/{id}', [EngineerController::class, 'editCertifiedEngineer'])->name('editCertifiedEngineer');
    Route::get('/engineer/delete-certified-engineer/{id}', [EngineerController::class, 'deleteCertifiedEngineer'])->name('deleteCertifiedEngineer');

    Route::resource('/client', ClientController::class);
    Route::get('/admin/client-export', [ClientController::class, 'clientExport'])->name('clientExport');
    Route::post('/admin/saveClient', [ClientController::class, 'saveClient'])->name('saveClient');
    Route::post('/admin/updateClient', [ClientController::class, 'updateClient'])->name('updateClient');
    Route::get('/client/delete-client/{id}', [ClientController::class, 'deleteClient'])->name('deleteClient');

    Route::get('/feedback/customer-feedback', [FeedbackController::class, 'customerFeedback'])->name('customerFeedback');
    Route::get('/feedback/customer-complain', [FeedbackController::class, 'customerComplain'])->name('customerComplain');
    Route::get('/feedback/approve_status', [FeedbackController::class, 'approveStatus'])->name('users.approve_status');
    Route::get('/feedback/export-customer-feedback', [FeedbackController::class, 'exportCustomerFeedback'])->name('exportCustomerFeedback');


    Route::get('/template/sms-template-list', [TemplateController::class, 'smsTemplateList'])->name('smsTemplateList');


    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

});
