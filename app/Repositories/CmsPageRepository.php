<?php
namespace App\Repositories;
use App\Repositories\Interfaces\CmsPageRepositoryInterface;
use App\Models\CmsPage;
use App\Models\PageSection;
use App\Models\SectionData;
use App\Models\CustomerLead;
use App\Models\JobEnquiry;
use App\Models\Subscriber;
use App\Models\Certificate;
use App\Models\Quote;
use App\Models\ScheduleMeeting;
use App\Models\HireTeam;
use App\Models\PricingEnq;

class CmsPageRepository implements CmsPageRepositoryInterface
{
    public function getCmsPageList(){
        return CmsPage::select('id', 'title')->where('status', 1)->get();
    }

    public function getPageSectionList($page_id){
        return PageSection::select('id', 'section_name', 'title')->where('page_id', $page_id)->where('status', 1)->get();
    }

    /** CMS Page Repo Function Start */
        public function allCmsPages($request){
            $pages = CmsPage::select('cms_pages.*');
                if($request['search']){
                    $pages = $pages->where('title','LIKE',"%{$request['search']}%");
                }
                $pages = $pages->latest()->paginate(10);
            return $pages;
        }


        public function storeCmsPage($request, $data){
            $page = new CmsPage();
            $page->parent_id = $data['parent_id'];
            $page->title = $data['title'];
            $page->page_url = $data['page_url'];
            $page->status = $data['status'];
            $page->meta_title = $data['meta_title'];
            $page->meta_tag = $data['meta_tag'];
            $page->meta_description = $data['meta_description'];
            $page->created_by = $data['created_by'];
            $page->save();
        }

        public function findCmsPage($id){
            return CmsPage::find($id);
        }

        public function updateCmsPage($data, $id){
            $page = CmsPage::where('id', $id)->first();
            $page->parent_id = $data['parent_id'];
            $page->title = $data['title'];
            $page->page_url = $data['page_url'];
            $page->status = $data['status'];
            $page->meta_title = $data['meta_title'];
            $page->meta_tag = $data['meta_tag'];
            $page->meta_description = $data['meta_description'];
            $page->updated_by = $data['updated_by'];
            $page->save();
        }
    /** CMS Page Repo Function End */

    /** Page Section Repo Function Start */
        public function allPageSectionList($request){
            $master_pages = PageSection::select('page_sections.*', 'cp.title as page_title')
                ->leftJoin('cms_pages as cp', 'cp.id', '=', 'page_sections.page_id');
                if($request['page_id']){
                    $master_pages = $master_pages->where('page_sections.page_id',$request['page_id']);
                }
                if($request['section']){
                    $master_pages = $master_pages->where('page_sections.section_name','LIKE',"%{$request['section']}%");
                }
                if($request['search']){
                    $master_pages = $master_pages->where('page_sections.title','LIKE',"%{$request['search']}%");
                }
                $master_pages = $master_pages->latest()->paginate(10);
            return $master_pages;
        }

        public function findPageSection($id){
            return PageSection::find($id);
        }

        public function storePageSection($data, $type){
            if($type == "store"){
                $page = new PageSection();
            }else{
                $page = PageSection::find($data['id']);
            }
            $page->page_id = $data['page_id'];
            $page->section_name = $data['section_name'];
            $page->title = $data['title'];
            $page->description = $data['description'];
            if($data['image']){
                $page->image = $data['image'];
            }
            $page->status = $data['status'];
            $page->created_by = $data['created_by'];
            $page->save();

        }

        public function updatePageSection($data, $type){
            $page = PageSection::find($data['id']);
            $page->page_id = $data['page_id'];
            $page->section_name = $data['section_name'];
            $page->title = $data['title'];
            $page->description = $data['description'];
            if($data['image']){
                $page->image = $data['image'];
            }
            $page->status = $data['status'];
            $page->created_by = $data['created_by'];
            $page->save();

        }
    /** Page Section Repo Function End */

    /** Section Data Repo Function Start */
        public function allSectionDataList($request){
            $data = SectionData::select('section_datas.*', 'cp.title as page_title', 'ps.section_name')
                ->leftJoin('cms_pages as cp', 'cp.id', '=', 'section_datas.page_id')
                ->leftJoin('page_sections as ps', 'ps.id', '=', 'section_datas.section_id');
                if($request['page_id']){
                    $data = $data->where('section_datas.page_id', $request['page_id']);
                }
                if($request['section']){
                    $data = $data->where('section_datas.section_id',$request['section']);
                }
                if($request['search']){
                    $data = $data->where('section_datas.title','LIKE',"%{$request['search']}%");
                }
                $data = $data->latest()->paginate(10);
            return $data;

        }

        public function findSectionData($id){
            return SectionData::find($id);
        }

        public function storeSectionData($data, $type){
            if($type == "store"){
                $page = new SectionData();
                $page->created_by = $data['created_by'];
            }else{
                $page = SectionData::find($data['id']);
                $page->updated_by = $data['updated_by'];
            }
            $page->page_id = $data['page_id'];
            $page->section_id = $data['section_id'];
            $page->title = $data['title'];
            $page->description = $data['description'];
            if($data['img']){
                $page->img = $data['img'];
            }
            $page->order_number = $data['order_number'];
            $page->other = $data['other'];
            $page->status = $data['status'];
            $page->save();

        }
    /** Section Data Repo Function End */

    public function allPriceEnquiryList(){
        return PricingEnq::select('*')->latest()->paginate(20);
    }

    public function allCustomerLeadList(){
        return CustomerLead::select('*')->latest()->paginate(10);
    }

    public function allCareerEnquiryList(){
        return JobEnquiry::select('*')->latest()->paginate(10);
    }

    public function allHireTeamEnquiryList(){
        return HireTeam::select('*')->latest()->paginate(10);
    }

    public function allSubscriberList(){
        return Subscriber::select('*')->latest()->paginate(10);
    }

    public function allCertificateList(){
        return Certificate::select('*')->latest()->paginate(10);
    }

    public function storeCertificate($request, $data){
        $certificate = new Certificate();
        $certificate->title = $data['title'];
        if($data['blog_image']){
            $certificate->image = $data['blog_image'];
        }else{
            $certificate->image = NULL;
        }
        $certificate->save();
    }

    public function allquotationList(){
        return Quote::select('*')->latest()->paginate(20);
    }

    public function allScheduleMeeting(){
        return ScheduleMeeting::select('*')->latest()->paginate(20);
    }

    public function deleteCmsSectionData($id){
        $delete_section_data = SectionData::find($id);
        $delete_section_data->delete();
    }

    public function deleteCertificate($id){
        $delete_certificate_data = Certificate::find($id);
        $delete_certificate_data->delete();
    }

}
