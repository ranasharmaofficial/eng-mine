<?php
namespace App\Repositories\WebRepo;
use App\Repositories\Interfaces\WebInterface\WebServiceRepositoryInterface;
use App\Models\MasterService;
use App\Models\ServiceSection;
use App\Models\ServiceSectionData;
use App\Models\PageSection;
use App\Models\Faq;

class WebServiceRepository implements WebServiceRepositoryInterface
{
    public function getserviceDetails($slug){
        return MasterService::select('*')->where('slug', $slug)->first();
    }

    public function getServiceSectionData($page_id){
        return ServiceSection::select('id', 'page_id', 'section_name', 'title', 'description', 'image')->where('page_id', $page_id)->where('status', 1)->get();
    }

    public function getPageSectionData($page_id){
        return PageSection::select('id', 'page_id', 'section_name', 'title', 'description', 'image')->where('page_id', $page_id)->where('status', 1)->get();
    }

    public function getFaqList($data){
        return Faq::where('faq_type', $data['type'])->where('faq_category', $data['product_id'])->where('status', 1)->get();
    }


}
