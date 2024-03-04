<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Frontend\CommonController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\SubscriberController;



use App\Http\Controllers\Customer\CountryStateCityController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\BookingController;

use App\Http\Controllers\Engineer\EngineerController;



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

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared by @RanaSharma";
});


Route::post('get-states-by-country', [CountryStateCityController::class, 'getState']);
Route::post('get-cities-by-state', [CountryStateCityController::class, 'getCity']);


Route::get('test_mail', [CommonController::class, 'testSimpleMail'])->name('test_mail');

Route::post('get-mobile-otp', [AuthController::class, 'getMobileOtp'])->name('getMobileOtp');
Route::post('get-otp-forgot-password', [AuthController::class, 'getForgotPasswordOtp'])->name('getForgotPasswordOtp');
Route::post('get-engineer-otp-forgot-password', [AuthController::class, 'getEngineerForgotPasswordOtp'])->name('getEngineerForgotPasswordOtp');
Route::post('get-customer-login-otp', [AuthController::class, 'getCustomerLoginOtp'])->name('getCustomerLoginOtp');
Route::post('get-engineer-login-otp', [AuthController::class, 'getEngineerLoginOtp'])->name('getEngineerLoginOtp');

Route::post('get-engineer-mobile-otp', [AuthController::class, 'getEngineerMobileOtp'])->name('getEngineerMobileOtp');
Route::post('check-mobile-otp', [AuthController::class, 'checkMobileOtp'])->name('checkMobileOtp');
Route::post('check-mobile-otp', [AuthController::class, 'checkMobileOtp'])->name('checkMobileOtp');
Route::post('check-engineer-mobile-otp', [AuthController::class, 'checkEngineerMobileOtp'])->name('checkEngineerMobileOtp');
Route::post('get-email-otp', [AuthController::class, 'getEmailOtp'])->name('getEmailOtp');
Route::post('resend-email-otp', [AuthController::class, 'resendEmailOtp'])->name('resendEmailOtp');
Route::post('check-email-otp', [AuthController::class, 'checkEmailOtp'])->name('checkEmailOtp');
Route::post('check-engineer-email-otp', [AuthController::class, 'checkEngineerEmailOtp'])->name('checkEngineerEmailOtp');
Route::post('check-forgot-mobile-otp', [AuthController::class, 'checkForgotMobileOtp'])->name('checkForgotMobileOtp');
Route::post('check-engineer-forgot-mobile-otp', [AuthController::class, 'checkEngineerForgotMobileOtp'])->name('checkEngineerForgotMobileOtp');
Route::post('resetPassword', [AuthController::class, 'resetPassword'])->name('resetPassword');
Route::post('proceed-to-login', [AuthController::class, 'proceedToLogin'])->name('proceedToLogin');
Route::post('proceed-to-engineer-login', [AuthController::class, 'proceedToEngineerLogin'])->name('proceedToEngineerLogin');


Route::post('get-engineer-email-otp', [AuthController::class, 'getEngineerEmailOtp'])->name('getEngineerEmailOtp');


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('customer-email-login', [AuthController::class, 'customerEmailLogin'])->name('customerEmailLogin');
Route::get('password-recovery', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::get('engineer-password-recovery', [AuthController::class, 'engineerForgotPassword'])->name('engineerForgotPassword');
Route::get('customer-login-with-otp', [AuthController::class, 'customerLoginWithOtp'])->name('customerLoginWithOtp');
Route::get('engineer-login-with-otp', [AuthController::class, 'engineerLoginWithOtp'])->name('engineerLoginWithOtp');

Route::post('show/service/category', [CommonController::class, 'showServiceCategoryDetails'])->name('home.showServiceCategoryDetails');


Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('post-email-login', [AuthController::class, 'postEmailLogin'])->name('email.login');
Route::post('post-engineer-email-login', [AuthController::class, 'postEngineerEmailLogin'])->name('engineer_email.login');
Route::post('enginner-login-post', [AuthController::class, 'postEngineerLogin'])->name('enginner.login.post');
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('saveCustomerRegistration', [AuthController::class, 'saveCustomerRegistration'])->name('saveCustomerRegistration');
Route::post('saveEngineerRegistration', [AuthController::class, 'saveEngineerRegistration'])->name('saveEngineerRegistration');
// Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
// Route::get('dashboard', [AuthController::class, 'dashboard']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'customer', 'middleware' => ['CustomerAuthCheck'], 'as' => 'customer.'], function () {
    Route::get('customer-dashboard', [CustomerController::class, 'customerDashboard'])->name('dashboard');
    Route::get('profile', [CustomerController::class, 'customerProfile'])->name('profile');
    Route::get('edit-profile', [CustomerController::class, 'customerProfileEdit'])->name('edit-profile');
    Route::get('change-password', [CustomerController::class, 'customerChangepassword'])->name('change-password');
    Route::get('add_booking', [BookingController::class, 'createBooking'])->name('add_booking');
    Route::get('all_booking', [BookingController::class, 'indexBooking'])->name('index_booking');
    Route::get('upComing-booking', [BookingController::class, 'upComingBooking'])->name('upComing_booking');
    Route::get('ongoing-booking', [BookingController::class, 'ongoingBooking'])->name('ongoing_booking');
    Route::get('completed-booking', [BookingController::class, 'completeBooking'])->name('complete_booking');
    Route::get('cancelled-booking', [BookingController::class, 'cancellBooking'])->name('cancell_booking');
    Route::get('pending-booking', [BookingController::class, 'pendingBooking'])->name('pendingBooking');
    Route::get('feedback', [CustomerController::class, 'customerFeedback'])->name('feedback');
    Route::get('add-feedback', [CustomerController::class, 'addFeedback'])->name('addFeedback');
    Route::get('complain', [CustomerController::class, 'customerComplain'])->name('complain');
    Route::get('add_complain', [CustomerController::class, 'customerAddComplain'])->name('add_complain');
    Route::post('customer/update_profile', [CustomerController::class, 'updateProfileDetails'])->name('updateProfileDetails');
    Route::post('customer/update_profile_picture', [CustomerController::class, 'update_profile_picture'])->name('update_profile_picture');
    Route::post('customer/update_customer_password', [CustomerController::class, 'update_customer_password'])->name('update_customer_password');
    Route::post('customer/saveFeedBack', [CustomerController::class, 'saveFeedBack'])->name('saveFeedBack');
    Route::post('customer/saveComplain', [CustomerController::class, 'saveComplain'])->name('saveComplain');
    Route::post('getComplainDetails', [CustomerController::class, 'getComplainDetails'])->name('getComplainDetails');
    Route::post('cancelServiceOrder', [CustomerController::class, 'cancelServiceOrder'])->name('cancelServiceOrder');

    Route::get('customer/view-estimate', [CustomerController::class, 'viewEstimate'])->name('viewEstimate');
    Route::get('customer/view-estimate-details/{temp_order_id}', [CustomerController::class, 'viewEstimateDetails'])->name('viewEstimateDetails');

});


Route::group(['prefix' => 'engineer', 'middleware' => ['EngineerAuthCheck'], 'as' => 'engineer.'], function () {
    Route::get('engineer-dashboard', [EngineerController::class, 'engineerDashboard'])->name('dashboard');
    Route::get('ongoing-booking', [EngineerController::class, 'ongoingBooking'])->name('ongoing_booking');
    Route::get('profile', [EngineerController::class, 'engineerProfile'])->name('profile');
    Route::get('edit-profile', [EngineerController::class, 'engineerEditProfile'])->name('engineerEditProfile');
    Route::get('change-password', [EngineerController::class, 'engineerChangepassword'])->name('change-password');
    Route::post('engineer/update_engineer_password', [EngineerController::class, 'update_engineer_password'])->name('update_engineer_password');
    Route::post('engineer/update_profile_picture', [EngineerController::class, 'update_profile_picture'])->name('update_profile_picture');
    Route::post('engineer/update_enginner_profile_details', [EngineerController::class, 'update_enginner_profile_details'])->name('update_enginner_profile_details');

    Route::get('upcoming-job', [EngineerController::class, 'upComingBooking'])->name('upComing_booking');
    Route::get('ongoing-job', [EngineerController::class, 'ongoingBooking'])->name('ongoing_booking');
    Route::get('completed-job', [EngineerController::class, 'completeBooking'])->name('complete_booking');
    Route::get('all-jobs', [EngineerController::class, 'getAllJobs'])->name('getAllJobs');
    Route::get('earned-revenue', [EngineerController::class, 'earnedRevenue'])->name('earnedRevenue');
    Route::get('cancelled-job', [EngineerController::class, 'cancellBooking'])->name('cancell_booking');

    Route::get('add-working-hour', [EngineerController::class, 'addWorkingHour'])->name('addWorkingHour');

    Route::post('/admin/get-service-list', [EngineerController::class, 'getServiceList'])->name('getServiceList');
    Route::post('addEngineerWorkingHour', [EngineerController::class, 'addEngineerWorkingHour'])->name('addEngineerWorkingHour');
    Route::post('addEngineerWorkingHour', [EngineerController::class, 'addEngineerWorkingHour'])->name('addEngineerWorkingHour');
    Route::post('updateEngineerJobStatus', [EngineerController::class, 'updateEngineerJobStatus'])->name('updateEngineerJobStatus');
    Route::post('startEngineerJob', [EngineerController::class, 'startEngineerJob'])->name('startEngineerJob');
    Route::post('completedEngineerJob', [EngineerController::class, 'completedEngineerJob'])->name('completedEngineerJob');

    Route::get('/order/order_status', [EngineerController::class, 'updateOrderStatus'])->name('updateOrderStatus');
    Route::get('/engineer/engineer_job_details', [EngineerController::class, 'engineer_job_details'])->name('engineer_job_details');

});

Route::post('get-service-list', [CommonController::class, 'getServiceList'])->name('getServiceList');
Route::post('store-service-categories', [CommonController::class, 'storeServiceCategories'])->name('storeServiceCategories');
Route::post('store-service-categories-admin', [CommonController::class, 'storeServiceCategoriesAdmin'])->name('storeServiceCategoriesAdmin');

Route::resource('/subscribers', SubscriberController::class);

Route::post('get-subservice-list', [CommonController::class, 'getSubServiceList'])->name('getSubServiceList');
Route::post('saveQuoteEnquiry', [CommonController::class, 'saveQuoteEnquiry'])->name('saveQuoteEnquiry');
Route::post('save/guest/user', [CommonController::class, 'saveGuestUser'])->name('saveGuestUser');

Route::get('/', [CommonController::class, 'index'])->name('index');
Route::get('index', [CommonController::class, 'index'])->name('index');
Route::get('about', [CommonController::class, 'about_us'])->name('about');
Route::get('mission-vission', [CommonController::class, 'mission'])->name('mission-vission');
Route::get('partners', [CommonController::class, 'partner'])->name('partners');
Route::get('awards', [CommonController::class, 'awards'])->name('awards');
Route::get('clients', [CommonController::class, 'clients'])->name('clients');
Route::get('straitegic-alliances', [CommonController::class, 'straitegicAlliances'])->name('straitegic-alliances');
Route::get('page/{slug}', [CommonController::class, 'pageDetails'])->name('pageDetails');

Route::get('industry/{slug}', [CommonController::class, 'industry'])->name('industry.slug');

Route::get('news', [CommonController::class, 'newsListing'])->name('news');
Route::get('news/{slug}', [CommonController::class, 'newsSlugListing'])->name('news.slug');
Route::get('news_detail/{slug}', [CommonController::class, 'newsDetail'])->name('news.detail');

Route::get('events', [CommonController::class, 'eventListing'])->name('events');
Route::get('events/{slug}', [CommonController::class, 'eventSlugListing'])->name('events.slug');
Route::get('event_detail/{slug}', [CommonController::class, 'eventDetail'])->name('events.detail');

Route::get('blogs', [CommonController::class, 'blogListing'])->name('blogs');
Route::get('blogs/{slug}', [CommonController::class, 'blogSlugListing'])->name('blogs.slug');
Route::get('blog_detail/{slug}', [CommonController::class, 'blogDetail'])->name('blog.detail');
Route::post('blog/store_comment', [CommonController::class, 'storeBlogComment'])->name('blog.store_comment');
Route::get('blog/show_comments', [CommonController::class, 'showBlogComments'])->name('blog.show_comments');

Route::get('service', [ServiceController::class, 'index'])->name('service');
Route::get('hire_onsite', [ServiceController::class, 'Hire_Onsite'])->name('hire_onsite');
Route::get('installation_configuration', [ServiceController::class, 'Installation_Configuration'])->name('installation_configuration');
Route::get('upgrade_migration', [ServiceController::class, 'Upgrade_Migration'])->name('upgrade_migration');
// Route::get('service/{slug}', [ServiceController::class, 'index'])->name('service.slug');

Route::get('case-study', [CommonController::class, 'caseStudyListing'])->name('case-study');
Route::get('case-study-detail/{slug}', [CommonController::class, 'caseStudyDetail'])->name('case-study.detail');
Route::get('csr', [CommonController::class, 'csr'])->name('csr');
Route::get('career', [CommonController::class, 'career'])->name('career');
Route::get('career-details', [CommonController::class, 'careerDetails'])->name('career-details');
Route::post('career/enquiry', [CommonController::class, 'careerEnquiry'])->name('career.enquiry');
Route::get('faqs', [CommonController::class, 'faqs'])->name('faqs');
Route::get('videos', [CommonController::class, 'videos'])->name('videos');
Route::get('projects', [CommonController::class, 'projects'])->name('projects');
Route::get('gallery', [CommonController::class, 'galleries'])->name('gallery');
Route::get('testimonial', [CommonController::class, 'testimonial'])->name('testimonial');
Route::get('our-team', [CommonController::class, 'ourTeam'])->name('ourTeam');
Route::get('clients', [CommonController::class, 'ourClients'])->name('ourClients');
Route::get('awards', [CommonController::class, 'awards'])->name('awards');
Route::get('profile', [CommonController::class, 'profile'])->name('profile');
Route::post('storeCareerData', [CommonController::class, 'storeCareerData'])->name('home.storeCareerData');

Route::get('contact-us', [CommonController::class, 'contact_us'])->name('contact');
Route::post('contact/enquiry', [CommonController::class, 'postContactEnquiry'])->name('contact.enquiry');

Route::post('store/subscriber', [CommonController::class, 'postNewsletter'])->name('store.subscriber');

Route::get('product/{slug}', [ProductController::class, 'productDetails'])->name('productDetail.slug');

Route::post('showPricingDetails', [ProductController::class, 'showPricingDetails'])->name('home.showPricingDetails');
Route::post('showFaqList', [ServiceController::class, 'showFaqList'])->name('home.showFaqList');


Route::get('service/{slug}', [ServiceController::class, 'serviceDetails'])->name('serviceDetails.slug');

Route::get('privacy-policy', [CommonController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('terms-condition', [CommonController::class, 'termsCondition'])->name('termsCondition');
Route::get('disclaimer', [CommonController::class, 'disclaimer'])->name('disclaimer');
Route::get('refund-policy', [CommonController::class, 'refundPolicy'])->name('refundPolicy');
Route::get('get-quote', [CommonController::class, 'getQuote'])->name('getQuote');
Route::get('schedule-meeting', [CommonController::class, 'scheduleMeeting'])->name('scheduleMeeting');
Route::post('postQuoteData', [CommonController::class, 'postQuoteData'])->name('postQuoteData');
Route::post('storeScheduleMeetings', [CommonController::class, 'storeScheduleMeetings'])->name('storeScheduleMeetings');
Route::post('storePricingEnquiry', [CommonController::class, 'storePricingEnquiry'])->name('storePricingEnquiry');

Route::get('partner/{slug}', [CommonController::class, 'partnerDetails'])->name('partnerDetails.slug');

Route::get('industry/{slug}', [CommonController::class, 'industryDetails'])->name('industry.slug');
Route::get('solution/{slug}', [CommonController::class, 'solutionDetails'])->name('solution.slug');

Route::post('showCommonFaqList', [CommonController::class, 'showCommonFaqList'])->name('home.showCommonFaqList');

Route::get('prices', [ProductController::class, 'priceListPage'])->name('prices');
Route::get('price-details/{id}', [ProductController::class, 'productPriceDetails'])->name('productPriceDetails');

Route::post('stripeCheckout', [ProductController::class, 'stripeCheckout'])->name('stripe.checkout');
Route::get('pricing-order-review', [ProductController::class, 'CheckoutSuccess'])->name('stripe.checkout.success');

Route::get('hire-team', [CommonController::class, 'hireTeam'])->name('hire-team');
Route::post('storeHireTeam', [CommonController::class, 'storeHireTeam'])->name('home.storeHireTeam');

Route::get('show-estimate/{temp_order_id}', [CommonController::class, 'showTempEstimate'])->name('home.showTempEstimate');
Route::get('/estimate/download-estimate/{temp_order_id}', [CommonController::class, 'downloadEstimate'])->name('downloadEstimate');

Route::get('/invoice/download-invoice/{order_id}', [CommonController::class, 'downloadInvoice'])->name('downloadInvoice');

Route::get('/estimate/view-sample-estimate', [CommonController::class, 'viewSampleEstimate'])->name('viewSampleEstimate');
Route::get('/estimate/view-sample-invoice', [CommonController::class, 'viewSampleInvoice'])->name('viewSampleInvoice');

Route::get('service-booking-first/{temp_order_id}', [CommonController::class, 'service_booking'])->name('home.service_booking');

Route::post('getPinCodeDetails', [CommonController::class, 'getPinCodeDetails'])->name('getPinCodeDetails');

Route::post('save/save-booking-order', [CommonController::class, 'saveBookingOrder'])->name('order.saveBookingOrder');
Route::post('service/completed-service-booking', [CommonController::class, 'completeServiceBooking'])->name('order.completeServiceBooking');


Route::get('service-booking-second/{temp_order_id}', [CommonController::class, 'service_booking_second'])->name('home.service_booking_second');
Route::get('service-booking-completed', [CommonController::class, 'service_booking_completed'])->name('home.service_booking_completed');
Route::get('otp-template-view', [AuthController::class, 'otp_view'])->name('otp_view');
