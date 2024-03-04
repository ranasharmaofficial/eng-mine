<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Repositories\Interfaces\WebInterface\WebServiceRepositoryInterface;

class ServiceController extends Controller
{
    private $serviceRepository;

    public function __construct(WebServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index(){
        return view('frontend.service.index');
    }

    public function Hire_Onsite(){
        return view('frontend.hire-onsite');
    }

    public function Installation_Configuration(){
        return view('frontend.installation-configuration');
    }

    public function Upgrade_Migration(){
        return view('frontend.upgrade-migration');
    }

    // public function index($slug){
    //     $page = $this->serviceRepository->getServicePage($slug);
    //     $datas = [
    //         'page' => $page,
    //         'section_lists' => $this->serviceRepository->getAllServiceSection($page->id),
    //         'testimonials' => $this->serviceRepository->getTestimonial(),
    //         'faqs' => $this->serviceRepository->getFaqs(),
    //        ];


    //     return view('frontend.service', $datas);
    // }

    // public function serviceDetails($slug){
    //     $serviceDetails = $this->serviceRepository->getserviceDetails($slug);
    //     $datas = [
    //         'serviceDetails' => $this->serviceRepository->getserviceDetails($slug),
    //         'section_lists' => $this->serviceRepository->getServiceSectionData($serviceDetails->id),
    //         'common_section_lists' => $this->serviceRepository->getPageSectionData(4),
    //     ];
    //     return view('frontend.service.service_details_one', $datas);
    // }

    // public function showFaqList(Request $request){
    //     $data = $request->all();
    //     $faqList = $this->serviceRepository->getFaqList($data);
    //     // dd($faqList);
    //     // $request->pid  <td>' . $k . '</td> show
    //     $output = '';
    //     foreach ($faqList as $key => $row) {

    //         $k = $key + 1;

    //         $output .='
    //         <div class="accordion-item  bg-light-green rounded   overflow-hidden   py-0 mb-2 mt-1 px-2">
    //             <h2 class="accordion-header">
    //                 <button  class="accordion-button fs-14 fw-bold text-muted2 text-capitalize px-1 py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1e'.$k.'" aria-expanded="false" aria-controls="collapse1e'.$k.'"><i class="bi bi-dot fs-1 lh-0"></i> '.$row->question.'</button>
    //             </h2>
    //             <div id="collapse1e'.$k.'" class="accordion-collapse show collapse px-2" data-bs-parent="#vsaccordion" style="">
    //                 <div class="accordion-body px-0">
    //                     '.$row->answer.'
    //                 </div>
    //             </div>
    //         </div> ';

    //     }


    // echo  $output;
    // }

}
