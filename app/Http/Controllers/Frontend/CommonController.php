<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Session;
use App\Repositories\Interfaces\WebInterface\CommonRepositoryInterface;
use App\Models\Service;
use App\Models\SubService;
use App\Models\ServiceSubCategory;
use App\Models\Cart;
use App\Models\TempOrder;
use App\Models\TempOrderDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\CmsPage;
use App\Models\User;
use App\Models\UserLogin;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderBookAdminAlert;
use App\Mail\CustomerOrderBookSuccess;

use PDF;

class CommonController extends Controller
{
    private $webRepository;

    public function __construct(CommonRepositoryInterface $webRepository)
    {
        $this->webRepository = $webRepository;
    }


    public function index()
    {
        $page = $this->webRepository->getPage(1);
        $section_lists = $this->webRepository->getPageSectionData($page->id);
        // dd($section_lists);
        $datas = [
            'page' => $page,
            'banners' => $this->webRepository->getHomePageBanner(),
            'section_lists' => $this->webRepository->getPageSectionData($page->id),
            'common_section_lists' => $this->webRepository->getPageSectionData(4),
            'testimonials' => $this->webRepository->getTestimonial(),
            // 'staffs' => $this->webRepository->getStaffData("Main Staff"),
            'faqList' => $this->webRepository->getFaqs(),
            'service_categories' => $this->webRepository->getServiceCategory(),
        ];
        return view('frontend.index', $datas);
    }


    public function getServiceList(Request $request){
        $data['subcategories'] = Service::where("subcategory_id",$request->subcategory_id)
        ->get(["name","id"]);
        return response()->json($data);
    }

    public function getSubServiceList(Request $request){
        $data['subcategories'] = SubService::where("service_id",$request->service_id)
        ->get(["name","id"]);
        return response()->json($data);
    }



    /** Company Section Start */
    public function about_us()
    {
        $page = $this->webRepository->getPage(2);
        // $team_list = $this->webRepository->getTeamList();
        // dd($team_list);
        $datas = [
            'page' => $page,
            'section_lists' => $this->webRepository->getPageSectionData($page->id),
            'testimonials' => $this->webRepository->getTestimonial(),
            'team_list' => $this->webRepository->getTeamList(),
            'partner_list' => $this->webRepository->getPartnerList(),
            'faqs' => $this->webRepository->getFaqs(),
        ];
        return view('frontend.about', $datas);
    }

    public function mission()
    {
        $page = $this->webRepository->getPage(4);
        $datas = [
            'page' => $page,
            'section_lists' => $this->webRepository->getPageSectionData($page->id),
        ];
        return view('frontend.mission', $datas);
    }

    public function partner()
    {
        $page = $this->webRepository->getPage(5);
        $datas = [
            'page' => $page,
            'section_lists' => $this->webRepository->getPageSectionData($page->id),
        ];
        return view('frontend.partners', $datas);
    }

    public function clients()
    {
        $page = $this->webRepository->getPage(9);
        $datas = [
            'page' => $page,
            'section_lists' => $this->webRepository->getPageSectionData($page->id),
        ];
        return view('frontend.clients', $datas);
    }

    public function straitegicAlliances()
    {
        $page = $this->webRepository->getPage(10);
        $datas = [
            'page' => $page,
            'section_lists' => $this->webRepository->getPageSectionData($page->id),
        ];
        return view('frontend.straitegic_alliances', $datas);
    }
    /** Company Section End */

    /** Industry Section Start */
    public function industry($slug)
    {
        $page = $this->webRepository->getIndustryPage($slug);
        $datas = [
            'page' => $page,
            'section_lists' => $this->webRepository->getIndustryPageSections($page->id),
            'testimonials' => $this->webRepository->getTestimonial(),
            'faqs' => $this->webRepository->getFaqs(),
        ];
        return view('frontend.industry_page', $datas);
    }
    /** Industry Section End */

    /** Case Study Section Start */
    public function caseStudyListing()
    {

        $data = [
            'cases' => $this->webRepository->getBlogs('case_study'),
            'categories' => $this->webRepository->getCategories('case_study'),
            'recent_posts' => $this->webRepository->getRecentPost('case_study'),
        ];
        return view('frontend.case_study.list', $data);
    }

    public function caseStudyDetail(Request $request, $slug)
    {
        $ip = $request->ip();
        $post = $this->webRepository->getBlogDetail($slug, $ip);
        $data = [
            'post' => $post,
            'recent_posts' => $this->webRepository->getRecentPost('case_study'),
        ];

        return view('frontend.case_study.details', $data);
    }
    /** Case Study Section End */

    /** Insights Section Start */
    public function csr()
    {
        $page = $this->webRepository->getPage(13);
        $datas = [
            'page' => $page,
            'section_lists' => $this->webRepository->getPageSectionData($page->id),
        ];
        return view('frontend.insights.csr', $datas);
    }

    public function career()
    {
        return view('frontend.insights.career');
    }

    public function careerDetails(Request $request)
    {
        $career = $this->webRepository->getCareerDetail($request->career_id);
        if ($request->career_id != null && $career != null) {
            return view('frontend.insights.career_detail', ['career' => $career]);
        } else {
            abort(404);
        }
    }

    public function careerEnquiry(Request $request)
    {
        $data = $request->validate([
            'career_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'nullable',
            'email' => 'required|email',
            'phone' => 'required|max:15',
            'gender' => 'required',
            'resume'   => 'required|mimes:doc,pdf,docx',
            'message' => 'required',
        ]);

        if ($request->has('resume')) {
            $data['resume'] = upload_asset($request->resume, "resume");
        } else {
            $data['resume'] = NULL;
        }
        $this->webRepository->storeCareerEnquiry($data);
        return redirect("index")->with(session()->flash('alert-success', 'Thankyou contacting with us. Our Team will contact you soon...'));
    }

    public function storeCareerData(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'resume'   => 'required|mimes:doc,pdf,docx',
            'message' => 'required',
        ]);

        if ($request->has('resume')) {
            $data['resume'] = upload_asset($request->resume, "resume", "local");
        } else {
            $data['resume'] = NULL;
        }
        // dd($data);
        $this->webRepository->storeCareerData($data);
        return redirect("index")->with(session()->flash('alert-success', 'Thank You. Our Team will contact you soon...'));
    }

    public function hireTeam()
    {
        return view('frontend.hire_team');
    }

    public function storeHireTeam(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'resume'   => 'nullable|mimes:doc,pdf,docx',
            'message' => 'required',
        ]);

        if ($request->has('resume')) {
            $data['resume'] = upload_asset($request->resume, "resume", "local");
        } else {
            $data['resume'] = NULL;
        }
        $this->webRepository->storeHireTeam($data);

        return redirect("hire-team")->with(session()->flash('alert-success', 'Thank You. Our Team will contact you soon...'));
    }

    public function faqs()
    {
        $page = $this->webRepository->getPage(8);
        $datas = [
            'page' => $page,
            'section_lists' => $this->webRepository->getPageSectionData($page->id),
            'faqList' => $this->webRepository->getFaqs(),
        ];
        return view('frontend.faq', $datas);
    }

    public function videos()
    {
        $page = $this->webRepository->getPage(16);
        $datas = [
            'page' => $page,
            'section_lists' => $this->webRepository->getPageSectionData($page->id),
        ];
        return view('frontend.insights.videos', $datas);
    }

    public function projects()
    {
        $page = $this->webRepository->getPage(17);
        $datas = [
            'page' => $page,
            'section_lists' => $this->webRepository->getPageSectionData($page->id),
        ];
        return view('frontend.insights.project', $datas);
    }

    public function galleries()
    {
        $page = $this->webRepository->getPage(18);
        $datas = [
            'page' => $page,
            'section_lists' => $this->webRepository->getPageSectionData($page->id),
            'categories' => $this->webRepository->getImageCategory(),
            'galleries' => $this->webRepository->getGallery(),
        ];
        return view('frontend.insights.gallery', $datas);
    }
    /** Insights Section End */

    /** News Section Start */
    public function newsListing()
    {
        $data = [
            'news' => $this->webRepository->getBlogs('news'),
            'categories' => $this->webRepository->getCategories('news'),
            'recent_posts' => $this->webRepository->getRecentPost('news'),
        ];
        // dd($data);
        return view('frontend.news.list', $data);
    }

    public function newsSlugListing($cat_slug)
    {
        $data = [
            'news' => $this->webRepository->getBlogs('news', $cat_slug),
            'categories' => $this->webRepository->getCategories('news'),
            'recent_posts' => $this->webRepository->getRecentPost('news'),
        ];
        return view('frontend.news.list', $data);
    }

    public function newsDetail(Request $request, $slug)
    {
        $ip = $request->ip();
        $post = $this->webRepository->getBlogDetail($slug, $ip);
        $data = [
            'post' => $post,
            'categories' => $this->webRepository->getCategories('news'),
            'recent_posts' => $this->webRepository->getRecentPost('news'),
            'related_posts' => $this->webRepository->getRelatedPost('news', $post->category_id),
        ];

        return view('frontend.news.details', $data);
    }
    /** News Section End */


    /** Event Section Start */
    public function eventListing()
    {
        $data = [
            'events' => $this->webRepository->getBlogs('event'),
            'categories' => $this->webRepository->getCategories('event'),
            'recent_posts' => $this->webRepository->getRecentPost('event'),
        ];
        // dd($data);
        return view('frontend.events.list', $data);
    }

    public function eventSlugListing($cat_slug)
    {
        $data = [
            'events' => $this->webRepository->getBlogs('event', $cat_slug),
            'categories' => $this->webRepository->getCategories('event'),
            'recent_posts' => $this->webRepository->getRecentPost('event'),
        ];
        return view('frontend.events.list', $data);
    }

    public function eventDetail(Request $request, $slug)
    {
        $ip = $request->ip();
        $post = $this->webRepository->getBlogDetail($slug, $ip);
        $data = [
            'post' => $post,
            'categories' => $this->webRepository->getCategories('event'),
            'recent_posts' => $this->webRepository->getRecentPost('event'),
            'related_posts' => $this->webRepository->getRelatedPost('event', $post->category_id),
        ];

        return view('frontend.events.details', $data);
    }
    /** Event Section End */

    /** Blog Section Start */
    public function blogListing()
    {
        $data = [
            'blogs' => $this->webRepository->getBlogs('blog'),
            'categories' => $this->webRepository->getCategories('blog'),
            'recent_posts' => $this->webRepository->getRecentPost('blog'),
        ];
        // dd($data);
        return view('frontend.blogs', $data);
    }

    public function blogSlugListing($cat_slug)
    {
        $data = [
            'blogs' => $this->webRepository->getBlogs('blog', $cat_slug),
            'categories' => $this->webRepository->getCategories('blog'),
            'recent_posts' => $this->webRepository->getRecentPost('blog'),
        ];
        return view('frontend.blogs', $data);
    }

    public function blogDetail(Request $request, $slug)
    {
        $ip = $request->ip();
        $post = $this->webRepository->getBlogDetail($slug, $ip);
        $data = [
            'post' => $post,
            'categories' => $this->webRepository->getCategories('blog'),
            'recent_posts' => $this->webRepository->getRecentPost('blog'),
            'related_posts' => $this->webRepository->getRelatedPost('blog', $post->category_id),
        ];

        return view('frontend.blog_detail', $data);
    }

    public function storeBlogComment(Request $request)
    {
        $data = $request->validate([
            'blog_id' => 'required',
            'comment' => 'required',
            // 'comment' => 'required|max:160',
            'name' => 'required',
            'email' => 'required',
        ]);

        $response = $this->webRepository->storeBlogComment($data);
        if ($response) {
            return response($response);
        } else {
            return 'false';
        }
    }

    public function showBlogComments(Request $request)
    {
        $data = $request->validate([
            'blog_id' => 'required',
        ]);

        $response = $this->webRepository->getBlogComments($request->blog_id);
        // dd($response);
        $output = '';

        if ($response != null) {
            foreach ($response as $res) {
                //$output .= '<div class="comment"><div class="comment-body"><div class="comment-meta"><div class="comment-meta-author"><a href="#">'.$res->first_name. ' ' .$res->last_name.'</a></div>';
                //$output .= '<div class="comment-meta-date">'.$res->created_at.'</div></div>';
                // $output .= ' <div class="comment-content"><p>'.$res->comment.'</p></div></div></div>';

                $output .= '<div class=" d-flex">
                    <div class="commetn-img w-10">
                       <img src="' . static_asset('assets/assets_web/img/blog1.png') . '" alt="comment" class="w-50px h-50px p-1 shadow  rounded-circle ">
                    </div>
                    <div class="comment-text w-90">
                       <h2 class="fs-16 lsp-5 text-block fw-bold">' . $res->name . '</h2>
                       <em class="fs-12 lsp-5">' . convert_datetime_to_date_format($res->created_at, 'd M Y') . '</em>
                       <p>' . $res->comment . '</p>
                       <a href="javascript:void();" class="bg-sky w-120 h-35px d-block fs-13 lsp-5 text-center lh-35 text-white rounded-1">Reply</a>
                    </div>
                 </div></br>';
            }
        }
        return Response::json([
            'status' => true,
            'data' => $output,
        ], 200);
    }
    /** Blog Section End */
    /**
     *
     * <div class=" d-flex">  */

    public function contact_us()
    {
        $page = $this->webRepository->getPage(3);
        $datas = [
            'page' => $page,
            'section_lists' => $this->webRepository->getPageSectionData($page->id),
        ];
        return view('frontend.contact_us', $datas);
    }

    public function postContactEnquiry(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'message' => 'required',
        ]);

        // $this->validate($request, [
        //     'name' => 'required|string|min:2|max:255',
        // ]);


        // dd($request);

        $this->webRepository->storeContactEnquiry($data);
        return redirect()->back()->with(session()->flash('alert-success', 'Thankyou contacting with us. Our Team will help you soon...'));
    }

    public function postNewsletter(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
        ]);
        $response = $this->webRepository->storeNewsletter($data);
        return response($response);
    }

    public function testimonial()
    {
        $page = $this->webRepository->getPage(6);
        return view('frontend.testimonial', compact('page'));
    }

    public function ourTeam()
    {
        $page = $this->webRepository->getPage(7);
        return view('frontend.team', compact('page'));
    }

    public function ourClients()
    {
        return view('frontend.clients');
    }

    public function awards()
    {
        $awards = $this->webRepository->getAwardList();
        $certificates = $this->webRepository->getCertificateList();
        return view('frontend.awards', compact('awards', 'certificates'));
    }

    public function profile()
    {
        return view('frontend.profile.index');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy_policy');
    }

    public function termsCondition()
    {
        return view('frontend.term_condition');
    }

    public function disclaimer()
    {
        return view('frontend.disclaimer');
    }

    public function refundPolicy()
    {
        return view('frontend.refund');
    }

    public function getQuote()
    {
        return view('frontend.get_quote');
    }

    public function scheduleMeeting()
    {
        return view('frontend.schedule_meeting');
    }

    public function postQuoteData(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'skype' => 'required',
            'message' => 'required',
        ]);
        $this->webRepository->storeQuoteData($data);
        return redirect()->back()->with(session()->flash('alert-success', 'Thankyou contacting with us. Our Team will help you soon...'));
    }

    public function storeScheduleMeetings(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'skype' => 'required',
            'schedule_date' => 'required',
            'schedule_time' => 'required',
            'message' => 'required',
        ]);
        $this->webRepository->storeScheduleMeetings($data);
        return redirect()->back()->with(session()->flash('alert-success', 'Thankyou contacting with us. Our Team will help you soon...'));
    }

    public function storePricingEnquiry(Request $request)
    {
        // $data = [
        //     'transport' => 'smtp',
        //     'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
        //     'port' => env('MAIL_PORT', 587),
        //     'encryption' => env('MAIL_ENCRYPTION', 'null'),
        //     'username' => env('MAIL_USERNAME'),
        //     'password' => env('MAIL_PASSWORD'),
        //     'timeout' => null,
        //     'local_domain' => env('MAIL_EHLO_DOMAIN'),

        //     'auth_mode'  => null,
        //      'verify_peer'       => false,
        // ];
        // dd($data);
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'skype' => 'required',
            'pricing_id' => 'required',
            'message' => 'required',
        ]);

        $this->webRepository->storePricingEnquiries($data);
        return redirect()->back()->with(session()->flash('alert-success', 'Thankyou contacting with us. Our Team will help you soon...'));
    }

    /** Partner details function  */
    public function partnerDetails($slug)
    {
        $partnerDetails = $this->webRepository->getPartnerDetails($slug);
        $datas = [
            'partnerDetails' => $this->webRepository->getPartnerDetails($slug),
            'section_lists' => $this->webRepository->getPartnerSection($partnerDetails->id),
        ];
        return view('frontend.partner.partner_details', $datas);
    }



    /** industry best support */
    public function industryDetails($slug)
    {
        $industryDetails = $this->webRepository->getIndustryDetails($slug);
        $datas = [
            'industryDetails' => $this->webRepository->getIndustryDetails($slug),
            'section_lists' => $this->webRepository->getIndustrySection($industryDetails->id),
        ];
        return view('frontend.industries', $datas);
    }

    public function solutionDetails($slug)
    {
        $solutionDetails = $this->webRepository->getSolutionDetails($slug);
        // dd($solutionDetails);
        $datas = [
            'solutionDetails' => $this->webRepository->getSolutionDetails($slug),
            'section_lists' => $this->webRepository->getSolutionSection($solutionDetails->id),
        ];
        return view('frontend.solution_details', $datas);
    }

    public function showCommonFaqList(Request $request)
    {
        $data = $request->all();
        $faqList = $this->webRepository->getCommonFaqList($data);
        //  dd($faqList);
        // $request->pid  <td>' . $k . '</td> show
        $output = '';
        foreach ($faqList as $key => $row) {

            $k = $key + 1;

            $output .= '
            <div class="accordion-item  bg-light-green rounded   overflow-hidden   py-0 mb-2 mt-1 px-2">
                <h2 class="accordion-header">
                    <button  class="accordion-button fs-14 fw-bold text-muted2 text-capitalize px-1 py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1e' . $k . '" aria-expanded="false" aria-controls="collapse1e' . $k . '"><i class="bi bi-dot fs-1 lh-0"></i> ' . $row->question . '</button>
                </h2>
                <div id="collapse1e' . $k . '" class="accordion-collapse collapse px-2" data-bs-parent="#vsaccordion" style="">
                    <div class="accordion-body px-0">
                        ' . $row->answer . '
                    </div>
                </div>
            </div> ';
        }


        echo  $output;
    }





    public function testSimpleMail(Request $request)
    {

        $to = "clsupport@cloudwareindia.com";
        $subject = "This is subject";

        $message = "<b>This is HTML message.</b>";
        $message .= "<h1>This is headline.</h1>";

        $header = "from:orrishvikash@gmail.com \r\n";
        //  $header .= "cc:afgh@somedomain.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail($to, $subject, $message, $header);

        if ($retval == true) {
            echo "Message sent successfully...";
        } else {
            echo "Message could not be sent...";
        }


        // $msg = "This is a simple text message";

        // // send email
        // $success = mail("avinash.orrish@gmail.com","My subject",$msg);
        // if (!$success) {
        //     $errorMessage = error_get_last()['message'];
        //     dd($errorMessage);
        // }else{
        //     dd("Mail Sent Successfully");
        // }
    }

    public function showServiceCategoryDetails(Request $request){
        $output = '';
        $data = $request->all();
        $domainList = $this->webRepository->getServiceSubCategory($data);

        // dd(count($domainList));

        $output .= '
        <div class="tab-pane container active justifly-content-round" id="menu1">
								<table id="myTable" class="input-group rounded-3 d-block w-100 border-0 fs-13 overflow-hidden ">
            <tbody class="d-block w-100">
                <tr>
                    <td>
                        <div class="position-relative col-1ine1 align-items-center pe-0">
                            <div class="d-flex justify-content-around">
                                <div class="tab-domain me-2">
                                    <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                                    <label>Select Domain</label>
                                </div>
                                <select name="subcategory_id[]" class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                    id="subcategory_id" required="">
                                    <option value="" selected="">Select Domain</option>';
                                        foreach($domainList as $row){
                                            $output .= ' <option value="'.$row->id.'">'.$row->name.'</option>';
                                        }


                                        $output .= '</select>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="position-relative col-1ine1  align-items-center pe-0">
                            <div class="d-flex justify-content-around">
                                <div class="tab-domain me-2">
                                    <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                                    <label>Sub Domain</label>
                                </div>

                                <select name="service_id[]" class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                    id="service_id" required="">
                                    <option value="" selected="">Select Sub Domain
                                    </option>

                                </select>

                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="position-relative col-1ine1 align-items-center pe-0">
                            <div class="d-flex justify-content-around">
                                <div class="tab-domain me-2">
                                    <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                                    <label>Select Activity</label>
                                </div>

                                <select name="subservice_id[]" class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                    id="subservice_id" required>
                                    <option value="" selected=""> Select Activity</option>

                                </select>

                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="position-relative col-1ine1 align-items-center pe-0">
                            <div class="d-flex justify-content-around">
                                <div class="tab-domain me-2">
                                    <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                                    <label>Activity Type</label>
                                </div>
                                <select name="activity_type[]"
                                    class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                    id="validationCustom04" required="">
                                    <option value="" selected=""> Activity Type</option>
                                    <option value="on_site"> On-Site </option>
                                    <option value="off_site"> Off-Site </option>
                                </select>

                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="position-relative col-1ine1 d-flex align-items-center pe-0">
                            <div class="d-flex justify-content-around">
                                <div class="tab-domain me-2">
                                    <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                                    <label>Model</label>
                                </div>
                                <input type="text" name="model[]"
                                    class="form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                        placeholder="Model/Version " required="">

                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="position-relative col-1ine1 d-flex align-items-center pe-0">
                            <div class="d-flex justify-content-around">
                                <div class="tab-domain me-2">
                                    <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                                    <label>Qty</label>
                                </div>

                                <input type="number" name="qty[]" class="form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                                        placeholder="Qty" required=""
                                    style="width:60px;">
                                <div class="valid-feedback">Looks good!</div>
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
								<div class="position-relative justify-content-center d-flex w-50 mx-auto my-2 pt-3">
									<button
										class="btn btn-primary border-1 border-danger w-150 rounded px-3 fs-14 bg-danger show-my-estimate1"
										type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
										<i class="fa fa-sign-in pe-2" aria-hidden="true"></i> Show My Estimate
									</button>
									<button
										class="btn btn-primary border-1 border-success w-150 rounded px-3 fs-14 bg-success mx-2 addown"
										onclick="addRow()"><i class="fa fa-sign-in pe-2" aria-hidden="true"></i> Add
										Service
									</button>
								</div>
							</div>
        ';
        echo  $output;
    }



    /** Store service categories */

    public function storeServiceCategories(Request $request){
        // dd($request->all(0));

        $subcategory_id = $request->subcategory_id;
        $service_id = $request->service_id;
        $subservice_id = $request->subservice_id;
        $activity_type = $request->activity_type;
        $model = $request->model;
        $qty = $request->qty;

        $subservice_details = SubService::where('id', $subservice_id)->first();
        $get_category_id = ServiceSubCategory::where('id', $subcategory_id)->first();

        if($activity_type=='on_site'){
            $product_price = $subservice_details->onsite_price;
        }elseif($activity_type=='off_site'){
            $product_price = $subservice_details->offsite_price;
        }


        if(Session('LoggedCustomer') != null) {
            $user_id = Session('LoggedCustomer')->user_id;
            $temp_user_id = null;
			// $check_product_av = Cart::where('product_id',$product_id)->where('user_id',$user_id)->exists();
        }else{
            $user_id = null;
            $temp_user_id = $request->session()->get('temp_user_id');
            if($temp_user_id == null || $temp_user_id == ""){
                $temp_user_id = bin2hex(random_bytes(10));
                $request->session()->put('temp_user_id', $temp_user_id);
				// $check_product_av = Cart::where('product_id',$product_id)->where('user_id',$temp_user_id)->exists();
            }
        }

        $prod_check = ServiceSubCategory::where('id', $subcategory_id)->exists();
        if($prod_check)
        {
            if(Session('LoggedCustomer') != null) {
                $user_id = Session('LoggedCustomer')->user_id;
                $carts = Cart::where('user_id', $user_id)->get();
                $check_product_av = Cart::where('category_id',$get_category_id->category_id)->where('subcategory_id',$subcategory_id)->where('service_id', $service_id)->where('subservice_id', $subservice_id)->where('activity_type', $activity_type)->where('user_id',$user_id)->exists();
                    if($check_product_av!=null)
                    {
                        $check_product_quantity = Cart::where('category_id',$get_category_id->category_id)->where('subcategory_id',$subcategory_id)->where('service_id', $service_id)->where('subservice_id', $subservice_id)->where('activity_type', $activity_type)->where('user_id',$user_id)->first();
                        $check_product_quantity = $check_product_quantity->qty;
                    }
            } else {
                $carts = Cart::where('temp_user_id', $temp_user_id)->get();
                $check_product_av = Cart::where('category_id',$get_category_id->category_id)->where('subcategory_id',$subcategory_id)->where('service_id', $service_id)->where('subservice_id', $subservice_id)->where('activity_type', $activity_type)->where('temp_user_id',$temp_user_id)->exists();
                    if($check_product_av!=null)
                    {
                        $check_product_quantity = Cart::where('category_id',$get_category_id->category_id)->where('subcategory_id',$subcategory_id)->where('service_id', $service_id)->where('subservice_id', $subservice_id)->where('activity_type', $activity_type)->where('temp_user_id',$temp_user_id)->first();
                        $check_prod_quantity = $check_product_quantity->quantity;
                    }
                // dd($check_prod_quantity);die;
            }

            if($check_product_av)
            {
                // return response()->json(['status'=>'Already Added to Cart']);
                    if(Session('LoggedCustomer') != null) {
                        $user_id = Session('LoggedCustomer')->user_id;
                        $carts = Cart::where('user_id', $user_id)->get();
                        $check_product_quantity = Cart::where('category_id',$get_category_id->category_id)->where('subcategory_id',$subcategory_id)->where('service_id', $service_id)->where('subservice_id', $subservice_id)->where('activity_type', $activity_type)->where('user_id',$user_id)->first();
                        if($check_product_quantity != null){
                            $check_prod_quantity = $check_product_quantity->qty;
                            $total_qty = $qty+$check_prod_quantity;
                        }else{
                            $total_qty = $qty;
                        }

                        $cart_update = Cart::where('category_id',$get_category_id->category_id)->where('subcategory_id',$subcategory_id)->where('service_id', $service_id)->where('subservice_id', $subservice_id)->where('activity_type', $activity_type)->where('user_id', $user_id)
                                        ->update([
                                                'qty' =>$total_qty,
                                                'total_price' => $total_qty*$product_price,
                                            ]);
                    }else{
                        $total_qty = $qty + $check_prod_quantity;
                        $cart_update = Cart::where('subcategory_id',$subcategory_id)->where('temp_user_id', $temp_user_id)
                                        ->update([
                                                'qty' =>$total_qty,
                                                'total_price' => $total_qty*$product_price,
                                            ]);
                    }
                if(Session('LoggedCustomer') != null) {
                    $user_id = Session('LoggedCustomer')->user_id;
                    $carts = Cart::where('user_id', $user_id)->get();
                    $sumcartamount = Cart::where('user_id',$user_id)->sum('total_price');
                } else {
                    // $temp_user_id = $request->session()->get('temp_user_id');
                    $carts = Cart::where('temp_user_id', $temp_user_id)->get();
                    $sumcartamount = Cart::where('temp_user_id',$temp_user_id)->sum('total_price');
                }
                return array(
                    // 'status' => 'Added To Cart!',
                    'cart_count' => count($carts),
                    'sum_cart_count' => $sumcartamount,
                    // 'nav_cart_view' => view('frontend.partials.cart')->render(),
                );
            }

            $get_category_id = ServiceSubCategory::where('id', $subcategory_id)->first();
		    $cartItem = new Cart();
            $cartItem->user_id = $user_id;
            $cartItem->temp_user_id = $temp_user_id;
            $cartItem->category_id = $get_category_id->category_id;
            $cartItem->subcategory_id = $subcategory_id;
            $cartItem->service_id = $service_id;
            $cartItem->subservice_id = $subservice_id;
            $cartItem->activity_type = $activity_type;
            $cartItem->model = $model;
            $cartItem->qty = $qty;
            $cartItem->price = $product_price;
            $cartItem->total_price = $product_price*$qty;
            $cartItem->save();
            return response()->json(['status'=>'Added to Cart']);


            if(Session('LoggedCustomer') != null) {
                $user_id = Session('LoggedCustomer')->user_id;
                $carts = Cart::where('user_id', $user_id)->get();
				$sumamount = Cart::where('user_id',$user_id)->sum('total_price');
                $sumcartamount = filter_var($sumamount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            } else {
                // $temp_user_id = $request->session()->get('temp_user_id');
                $carts = Cart::where('temp_user_id', $temp_user_id)->get();
				$sumamount = Cart::where('temp_user_id',$temp_user_id)->sum('total_price');
                $sumcartamount = filter_var($sumamount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            }
            return array(
                // 'status' => 'Added To Cart!',
                'cart_count' => count($carts),
                'sum_cart_count' => $sumcartamount,
				// 'product_box_view' => view('frontend.partials.product_box_ajax', compact('carts','products','check_cart_product_list'))->render(),
                // 'nav_cart_view' => view('frontend.partials.cart')->render(),
            );

	    }
    }

    public function storeServiceCategoriesAdmin(Request $request){
        $subcategory_id = $request->subcategory_id;
        $service_id = $request->service_id;
        $subservice_id = $request->subservice_id;
        $activity_type = $request->activity_type;
        $model = $request->model;
        $qty = $request->qty;
        $user_id = $request->user_id;

        $subservice_details = SubService::where('id', $subservice_id)->first();
        $get_category_id = ServiceSubCategory::where('id', $subcategory_id)->first();

        if($activity_type=='on_site'){
            $product_price = $subservice_details->onsite_price;
        }elseif($activity_type=='off_site'){
            $product_price = $subservice_details->offsite_price;
        }

        $prod_check = ServiceSubCategory::where('id', $subcategory_id)->exists();
        if($prod_check)
        {

                $carts = Cart::where('user_id', $user_id)->get();
                $check_product_av = Cart::where('category_id',$get_category_id->category_id)->where('subcategory_id',$subcategory_id)->where('service_id', $service_id)->where('subservice_id', $subservice_id)->where('activity_type', $activity_type)->where('user_id',$user_id)->exists();
                    if($check_product_av!=null)
                    {
                        $check_product_quantity = Cart::where('category_id',$get_category_id->category_id)->where('subcategory_id',$subcategory_id)->where('service_id', $service_id)->where('subservice_id', $subservice_id)->where('activity_type', $activity_type)->where('user_id',$user_id)->first();
                        $check_product_quantity = $check_product_quantity->qty;
                    }


            if($check_product_av)
            {

                $carts = Cart::where('user_id', $user_id)->get();
                $check_product_quantity = Cart::where('category_id',$get_category_id->category_id)->where('subcategory_id',$subcategory_id)->where('service_id', $service_id)->where('subservice_id', $subservice_id)->where('activity_type', $activity_type)->where('user_id',$user_id)->first();
                if($check_product_quantity != null){
                    $check_prod_quantity = $check_product_quantity->qty;
                    $total_qty = $qty+$check_prod_quantity;
                }else{
                    $total_qty = $qty;
                }

                $cart_update = Cart::where('category_id',$get_category_id->category_id)->where('subcategory_id',$subcategory_id)->where('service_id', $service_id)->where('subservice_id', $subservice_id)->where('activity_type', $activity_type)->where('user_id', $user_id)
                                ->update([
                                        'qty' =>$total_qty,
                                        'total_price' => $total_qty*$product_price,
                                    ]);

                    $carts = Cart::where('user_id', $user_id)->get();
                    $sumcartamount = Cart::where('user_id',$user_id)->sum('total_price');

                return array(
                    // 'status' => 'Added To Cart!',
                    'cart_count' => count($carts),
                    'sum_cart_count' => $sumcartamount,
                    // 'nav_cart_view' => view('frontend.partials.cart')->render(),
                );
            }

            $get_category_id = ServiceSubCategory::where('id', $subcategory_id)->first();
		    $cartItem = new Cart();
            $cartItem->user_id = $user_id;
            $cartItem->category_id = $get_category_id->category_id;
            $cartItem->subcategory_id = $subcategory_id;
            $cartItem->service_id = $service_id;
            $cartItem->subservice_id = $subservice_id;
            $cartItem->activity_type = $activity_type;
            $cartItem->model = $model;
            $cartItem->qty = $qty;
            $cartItem->price = $product_price;
            $cartItem->total_price = $product_price*$qty;
            $cartItem->added_by = 'admin';
            $cartItem->o_id = $request->o_id;
            $cartItem->save();
            return response()->json(['status'=>'Added to Cart']);

                $carts = Cart::where('user_id', $user_id)->get();
				$sumamount = Cart::where('user_id',$user_id)->sum('total_price');
                $sumcartamount = filter_var($sumamount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            return array(
                // 'status' => 'Added To Cart!',
                'cart_count' => count($carts),
                'sum_cart_count' => $sumcartamount,
				// 'product_box_view' => view('frontend.partials.product_box_ajax', compact('carts','products','check_cart_product_list'))->render(),
                // 'nav_cart_view' => view('frontend.partials.cart')->render(),
            );

	    }
    }

    public function saveGuestUser(Request $request){
        // dd($request->all());
        $request->validate([
            'mobile' => 'required|unique:users,mobile',
            'email' => 'required|unique:users,email',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $url = "https://accounts.zoho.in/oauth/v2/token?refresh_token=1000.b9c9d26fd68532bdf0b4cfd0ebcf8404.552f67e9193971907092a3f1f3540eeb&client_id=1000.3WL2F45B9QT7KYDXDBYJMGF3Z6D5RU&client_secret=38a8aae1530889a1f729c8473fac4b4b358708470b&grant_type=refresh_token";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($result, true);
        $zoho_access_token = $output['access_token'];
        $headerTwo =array("Authorization: Zoho-oauthtoken $zoho_access_token");
        $contact_name = $request->first_name.''.$request->last_name;
        $address = $request->guest_service_location;
        $mobile = $request->mobile;

        $datas = array(
            'authtoken'         => $zoho_access_token,
            'JSONString'        => '{
                "first_name": '.$request->first_name.',
                "last_name": '.$request->last_name.',
                "contact_name": '.$contact_name.',
                "company_name": '.$contact_name.',
                "mobile": '.$mobile.',
                "email": '.$request->email.',
                "phone": '.$request->mobile.',
                "contact_type": "customer",
            }'

        );




        $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => 'https://www.zohoapis.in/books/v3/contacts?organization_id=60027336565',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $datas,
        CURLOPT_HTTPHEADER => $headerTwo,
    ));

    $response = curl_exec($ch);

    curl_close($ch);

    $contact_creation_response = json_decode($response, true);

    // if (isset($contact_creation_response["code"]) && $contact_creation_response["code"] === 0) {
    //     echo "Contact created successfully with ID: " . $contact_creation_response["contact"]["contact_id"];
    // } else if($contact_creation_response["code"] === 3062){
    //     echo "Message: ".$contact_creation_response["message"];
    // }
    // else {
    //     echo "Error creating contact: " . print_r($contact_creation_response, true);
    // }

    // dd($response);

        if($request->has('files')){
            $file = $request->file('files');
            $extenstion = $file->getClientOriginalExtension();
            $document_name = 'cost_est-' . time() . '.' . $extenstion;
            $file->move(public_path('uploads/cost_estimate'), $document_name);
        }else{
            $document_name = NULL;
        }

        if($request->message!=null){
            $message = $request->message;
        }else{
            $message = NULL;
        }

        $check_user = User::where('mobile', $request->mobile)->where('email', $request->email)->count();
        // if($check_user==0){

        // code here
        if (isset($contact_creation_response["code"]) && $contact_creation_response["code"] === 0)
        {
            $save_user = new User;
            $save_user->user_type = 'guest';
            $save_user->user_type_id = 3;
            $save_user->first_name = $request->first_name;
            $save_user->last_name = $request->last_name;
            $save_user->mobile = $request->mobile;
            $save_user->email = $request->email;
            $save_user->address = $request->guest_service_location;
            $save_user->is_verified = 1;
            $save_user->zoho_contact_id = $contact_creation_response["contact"]["contact_id"];
            $save_user->save();

            $user_login = new UserLogin;
            $user_login->user_type_id = 3;
            $user_login->user_id = $save_user->id;
            $user_login->username = $request->mobile;
            $user_login->email = $request->email;
            $user_login->password = $request->mobile;
            $user_login->save();

            $last_user = $save_user->id;
            if(Session('LoggedCustomer') != null) {
                $user_id = Session('LoggedCustomer')->user_id;
            }else{
                $user_id = $save_user->id;
            }

            if (Session('temp_user_id') != null) {
                // $uri = explode('/',session('url.intended'));
                Cart::where('temp_user_id', session('temp_user_id'))
                        ->update([
                            'user_id' => $save_user->id,
                            'temp_user_id' => null
                        ]);

                Session::forget('temp_user_id');
                // $output['redirectTo'] = session('url.intended');
            }

            $sl_no = TempOrder::orderBy('slno', 'desc')->first();
            if($sl_no){
                $last_serial_no = $sl_no->slno;
            }else{
                $last_serial_no = 0001;
            }



            $tem_order = new TempOrder;

            if($sl_no){
                $tem_order->slno = $last_serial_no + 1;
            }
            else{
                $tem_order->slno = $last_serial_no;
            }

            if (isset($sl_no)) {
                $unique_id = 'ES/' . date('my') . '/000' . $last_serial_no + 1;
            } else {
                $unique_id = 'ES/' . date('my') . '/000' . $last_serial_no;
            }

            $tem_order->unique_id = $unique_id;
            $tem_order->user_id = $user_id;
            $tem_order->files = $document_name;
            $tem_order->message = $message;
            $tem_order->app_date = $request->guest_service_date;
            $tem_order->app_time = $request->guest_service_time;
            $tem_order->service_location = $request->guest_service_location;
            $tem_order->save();

            // dd($user_id);
            /** Save Temp Order Details here */
            $cartItems = Cart::where('user_id', $user_id)->get();
            foreach($cartItems as $item)
            {
                TempOrderDetail::create([
                    'temp_order_id' => $tem_order->id,
                    'user_id' => $user_id,
                    'category_id'=>$item->category_id,
                    'subcategory_id'=>$item->subcategory_id,
                    'service_id'=>$item->service_id,
                    'subservice_id'=>$item->subservice_id,
                    'activity_type'=>$item->activity_type,
                    'model'=>$item->model,
                    'qty'=>$item->qty,
                    'price'=>$item->price,
                    'total_price'=>$item->total_price,
                ]);
            }
                $cartItems = Cart::where('user_id', $user_id)->get();
                Cart::destroy($cartItems);
                // if($cartItems){
                //     return response()->json([
                //         "status" => true,
                //         "temp_id" => $tem_order->id
                //     ]);
                // }else{
                //     return response()->json([
                //         "status" => false,
                //         "temp_id" => $tem_order->id
                //     ]);
                // }
            return response()->json([
                "message" => 'Contact Saved',
                "status" => true,
                "temp_id" => $tem_order->id
            ]);
        } else if($contact_creation_response["code"] === 3062){
            return response()->json([
                "status" => false,
                // "temp_id" => $tem_order->id,
                "message" => "Message: ".$contact_creation_response["message"],
            ]);
        }else{
            return response()->json([
                "status" => false,
                "temp_id" => $tem_order->id,
                "message" => "Error in creating contact",
            ]);
        }


        // return redirect('show-estimate/'.$tem_order->id)->with(session()->flash('alert-success', 'Estimation Generated Successfully!'));


    }


    public function saveQuoteEnquiry(Request $request){
        // dd($request->all());

        /** Save Temp Order */

        if($request->has('files')){
            $file = $request->file('files');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'cost_est-' . time() . '.' . $extenstion;
            $file->move(public_path('uploads/cost_estimate'), $filename);
        }else{
            $filename = NULL;
        }

        if($request->message!=null){
            $message = $request->message;
        }else{
            $message = NULL;
        }

        if(Session('LoggedCustomer') != null) {
            $user_id = Session('LoggedCustomer')->user_id;
		}else{
            $user_id = $request->session()->get('temp_user_id');
        }


         $sl_no = TempOrder::orderBy('slno', 'desc')->first();
			if($sl_no){
				$last_serial_no = $sl_no->slno;
			}else{
				$last_serial_no = 1;
			}

        $tem_order = new TempOrder;
		if($sl_no){
            $tem_order->slno = $last_serial_no + 1;
        }
        else{
            $tem_order->slno = $last_serial_no;
        }

        if (isset($sl_no)) {
            $unique_id = 'ES/' . date('my') . '/000' . $last_serial_no + 1;
        } else {
            $unique_id = 'ES/' . date('my') . '/000' . $last_serial_no;
        }

		$tem_order->unique_id = $unique_id;
        $tem_order->user_id = $user_id;
        $tem_order->files = $filename;
        $tem_order->message = $message;
        $tem_order->service_location = $request->user_service_location;
        $tem_order->app_date = $request->user_service_date;
        $tem_order->app_time = $request->user_service_time;
        $tem_order->save();

        /** Save Temp Order Details here */
        $cartItems = Cart::where('user_id', $user_id)->get();
        foreach($cartItems as $item)
        {
            TempOrderDetail::create([
                'temp_order_id' => $tem_order->id,
                'user_id' => $user_id,
                'category_id'=>$item->category_id,
                'subcategory_id'=>$item->subcategory_id,
                'service_id'=>$item->service_id,
                'subservice_id'=>$item->subservice_id,
                'activity_type'=>$item->activity_type,
                'model'=>$item->model,
                'qty'=>$item->qty,
                'price'=>$item->price,
                'total_price'=>$item->total_price,
            ]);
        }
            $cartItems = Cart::where('user_id', $user_id)->get();
            Cart::destroy($cartItems);

            if($cartItems){
                return response()->json([
                    "status" => true,
                    "temp_id" => $tem_order->id
                ]);
            }else{
                return response()->json([
                    "status" => false,
                    "temp_id" => $tem_order->id
                ]);
            }

        // return redirect('show-estimate/'.$tem_order->id)->with(session()->flash('alert-success', 'Saved Successfully!'));

    }

    public function showTempEstimate($temp_order_id){

        $tempOrderDetails = $this->webRepository->ShowTempEstimate($temp_order_id);
        $getTotalOrderAmount = $this->webRepository->getTotalOrderAmount($temp_order_id);
        // dd($tempOrderDetails);
        $datas = [
            'tempOrderDetails' => $this->webRepository->ShowTempEstimate($temp_order_id),
            'temp_order_details' => $this->webRepository->ShowTempOrderDetail($temp_order_id),
            'temp_order_id' => $temp_order_id,
            'getTotalOrderAmount' => $getTotalOrderAmount,
        ];
        return view('frontend.show_estimate', $datas);
    }

    public function downloadEstimate($temp_order_id){
        $tempOrderDetails = $this->webRepository->ShowTempEstimate($temp_order_id);
        $user_details = User::where('id', $tempOrderDetails->user_id)->first();
        // dd($user_details);
        $datas = [
            'tempOrderDetails' => $this->webRepository->ShowTempEstimate($temp_order_id),
            'temp_order_details' => $this->webRepository->ShowTempOrderDetail($temp_order_id),
            'temp_order_id' => $temp_order_id,
            'user_details' => $user_details,
        ];
            $pdf=PDF::loadView('frontend.estimate.estimate_download', $datas)->setOptions(['defaultFont' => 'Roboto','sans-serif', 'isRemoteEnabled' => true]);
            return $pdf->download('engineer-mine-quotation-'.$temp_order_id.'.pdf');
    }

    public function service_booking($temp_order_id){

        $tempOrderDetails = $this->webRepository->ShowTempEstimate($temp_order_id);
        // dd($tempOrderDetails);
        $datas = [
            'tempOrderDetails' => $this->webRepository->ShowTempEstimate($temp_order_id),
            'temp_order_details' => $this->webRepository->ShowTempOrderDetail($temp_order_id),
            'temp_order_id' => $temp_order_id,
        ];
        return view('frontend.service_booking', $datas);
    }

    public function getPinCodeDetails(Request $request)
    {
        $pincode = $_POST['pincode'];
        $data = file_get_contents('http://postalpincode.in/api/pincode/' . $pincode);
        $data = json_decode($data);
        if (isset($data->PostOffice['0'])) {
            $arr['city'] = $data->PostOffice['0']->Taluk;
            $arr['state'] = $data->PostOffice['0']->State;
            echo json_encode($arr);
        } else {
            echo 'no';
        }
    }


    public function saveBookingOrder(Request $request){
        $data = $request->validate([
            // 'location' => 'required',
            // 'landmark' => 'required',
            // 'pincode' => 'required',
            // 'city' => 'required',
            // 'state' => 'required',
            'service_location' => 'required',
            'app_date' => 'required',
            'app_time' => 'required',
        ]);

        // dd(Session('LoggedCustomer')->user_id);
        // $saveTempBookingOrder = new
        $saveTempBookingOrder = TempOrder::where('id', $request->temp_order_id)->where('user_id', Session('LoggedCustomer')->user_id)->first();
        // $saveTempBookingOrder->location = $request->location;
        // $saveTempBookingOrder->landmark = $request->landmark;
        // $saveTempBookingOrder->pincode = $request->pincode;
        // $saveTempBookingOrder->city = $request->city;
        // $saveTempBookingOrder->state = $request->state;
        // $saveTempBookingOrder->state = $request->state;
        $saveTempBookingOrder->service_location = $request->service_location;
        $saveTempBookingOrder->app_date = $request->app_date;
        $saveTempBookingOrder->app_time = $request->app_time;
        $saveTempBookingOrder->save();

        if (!$saveTempBookingOrder) {
            // return redirect()->back()->with(session()->flash('alert-danger', 'Failed! We do not recognize your username or password.'));
            return response()->json([
                "status" => false,

            ]);
        } else  {
            // return redirect('service-booking-second/'.$request->temp_order_id);

           return response()->json([
                "status" => true,
                //"redirect" => url("dashboard")
            ]);

        }
    }

    public function service_booking_second($temp_order_id){

        $tempOrderDetails = $this->webRepository->ShowTempEstimate($temp_order_id);
        $user_id = Session('LoggedCustomer')->user_id;
        //  dd($temp_order_total_price);
        $datas = [
            'tempOrderDetails' => $this->webRepository->ShowTempEstimate($temp_order_id),
            'temp_order_details' => $this->webRepository->ShowTempOrderDetail($temp_order_id),
            'temp_order_total_price' => $this->webRepository->tempTotalPrice($temp_order_id, $user_id),
            'temp_order_id' => $temp_order_id,
        ];
        return view('frontend.service_booking_second', $datas);
    }

    public function completeServiceBooking(Request $request){
        $user_id = Session('LoggedCustomer')->user_id;

        $get_temp_order_details = TempOrder::where('user_id', $user_id)->where('id', $request->temp_order_id)->first();

		$sl_no = Order::orderBy('slno', 'desc')->first();
        if($sl_no){
            $last_serial_no = $sl_no->slno;
        }else{
            $last_serial_no = 1;
        }


        // $servId = Order::orderBy('id', 'desc')->first();
        // if (isset($servId)) {
            // $center_code = substr($servId->service_order_id, 8);
            // $inc_id = $center_code+1;
            // $service_order_id ='EGMNEORD0000'.$inc_id.'';
        // } else {
            // Sum 1 + last id
            // $service_order_id = 'EGMNEORD00001';
        // }

        $total_service_order_amount = TempOrderDetail::where('user_id', $user_id)->where('temp_order_id', $request->temp_order_id)->sum('total_price');

		if (isset($sl_no)) {
            $service_order_id = 'EM/' . date('my') . '/000' . $last_serial_no + 1;
        } else {
            $service_order_id = 'EM/' . date('my') . '/000' . $last_serial_no;
        }

        /** Save Order here */
        $order = new Order;
		if($sl_no){
            $order->slno = $last_serial_no + 1;
        }
        else{
            $order->slno = $last_serial_no;
        }
		$order->service_order_id = $service_order_id;
        $order->user_id = $user_id;
        $order->files = $get_temp_order_details->files;
        $order->message = $get_temp_order_details->message;
        $order->location = $get_temp_order_details->service_location;
        $order->landmark = $get_temp_order_details->landmark;
        $order->pincode = $get_temp_order_details->pincode;
        $order->city = $get_temp_order_details->city;
        $order->state = $get_temp_order_details->state;
        $order->app_date = $get_temp_order_details->app_date;
        $order->app_time = $get_temp_order_details->app_time;
        $order->payment_mode = $request->payment_mode;
        $order->payment_status = 'unpaid';
        $order->total_amount = $total_service_order_amount;
        $order->save();

        $order_details = Order::where('id', $order->id)->first();

        $user_details = User::where('id', $user_id)->first();

        if($order){
            if (env('MAIL_USERNAME') != null) {
                $array['view'] = 'mail_template.customer_order_book_success';
                // $array['view'] = 'mail_template.order_book_admin_alert';
                $array['subject'] = 'Order Placed Successfully';
                $array['from'] = env('MAIL_FROM_ADDRESS');
                $array['order_details'] = $order_details;
                $array['user_details'] = $user_details;
                // dd($user_details->email);
                try {
                    Mail::to($user_details->email)->queue(new CustomerOrderBookSuccess($array));

                } catch (\Exception $e) {

                }
            }

            if (env('MAIL_USERNAME') != null) {
                $array2['view'] = 'mail_template.order_book_admin_alert';
                $array2['subject'] = 'New Order Placed Successfully';
                $array2['from'] = env('MAIL_FROM_ADDRESS');
                $array2['order_details'] = $order_details;
                $array2['user_details'] = $user_details;
                    // dd($array);
                try {
                    Mail::to(env('ADMIN_EMAIL'))->queue(new OrderBookAdminAlert($array2));
                } catch (\Exception $e) {

                }
            }
        }

        /** Save Order Details here */
        $temp_service_items = TempOrderDetail::where('user_id', $user_id)->where('temp_order_id', $request->temp_order_id)->get();
        foreach($temp_service_items as $item)
        {
            OrderDetail::create([
                'order_id' => $order->id,
                'user_id' => $user_id,
                'category_id'=>$item->category_id,
                'subcategory_id'=>$item->subcategory_id,
                'service_id'=>$item->service_id,
                'subservice_id'=>$item->subservice_id,
                'activity_type'=>$item->activity_type,
                'model'=>$item->model,
                'qty'=>$item->qty,
                'price'=>$item->price,
                'total_price'=>$item->total_price,
            ]);
        }

        /** update temp orders */
         $update_templ_order = TempOrder::where('user_id', $user_id)->where('id', $request->temp_order_id)->first();
         $update_templ_order->book_status = 1;
         $update_templ_order->save();

        if (!$order) {
            return response()->json([
                "status" => false,

            ]);
        } else  {
            return response()->json([
                "status" => true,
             ]);

        }
    }

    public function service_booking_completed(){
        return view('frontend.service_booking_completed');
    }

    public function rana(){

    }

    public function pageDetails($slug){
        $page = CmsPage::where('page_url', $slug)->first();

        if($page){
            $section_lists =  $this->webRepository->getCmsPageSectionData($page->id);
            return view('frontend.cms_page_details', compact('page', 'section_lists'));
        }else{
            return redirect()->route('index');
        }

    }


    public function viewSampleEstimate(){
        $temp_order_id = 1;
        $tempOrderDetails = $this->webRepository->ShowTempEstimate($temp_order_id);
        $user_details = User::where('id', $tempOrderDetails->user_id)->first();
        // dd($user_details);
        $datas = [
            'tempOrderDetails' => $this->webRepository->ShowTempEstimate($temp_order_id),
            'temp_order_details' => $this->webRepository->ShowTempOrderDetail($temp_order_id),
            'temp_order_id' => $temp_order_id,
            'user_details' => $user_details,
        ];
        return view('frontend.estimate.estimate_download', $datas);

    }

    public function viewSampleInvoice(){
        $order_id = 1;
        $order = $this->webRepository->ShowOrder($order_id);
        $user_details = User::where('id', $order->user_id)->first();
        $temp_order_id = TempOrder::where('user_id', $user_details->id)->orderBy('created_at', 'desc')->pluck('id')->first();
        $datas = [
            'order' => $this->webRepository->ShowOrder($order_id),
            'order_id' => $order_id,
            'user_details' => $user_details,
            'temp_order_id' => $temp_order_id,
        ];
        return view('frontend.invoice.invoice_download', $datas);

    }

    public function downloadInvoice($order_id){
        $order = $this->webRepository->ShowOrder($order_id);
        // dd($order);
        $user_details = User::where('id', $order->user_id)->first();
        $temp_order_id = TempOrder::where('user_id', $user_details->id)->orderBy('created_at', 'desc')->pluck('id')->first();
        $datas = [
            'order' => $this->webRepository->ShowOrder($order_id),
            'order_id' => $order_id,
            'user_details' => $user_details,
            'temp_order_id' => $temp_order_id,
        ];
            $pdf=PDF::loadView('frontend.invoice.invoice_download', $datas)->setOptions(['defaultFont' => 'Roboto','sans-serif', 'isRemoteEnabled' => true]);
            return $pdf->download('engineer-mine-invoice-'.$order_id.'.pdf');
    }




}


