<?php
namespace App\Repositories;
use App\Repositories\Interfaces\IndustryRepositoryInterface;
use App\Models\IndustryCmsPage;
use App\Models\IndustryPageSection;
use App\Models\IndustrySectionData;

class IndustryRepository implements IndustryRepositoryInterface
{
    public function getCmsPageList(){
        return IndustryCmsPage::select('id', 'title')->where('status', 1)->get();
    }   

    public function getPageSectionList($page_id){
        return IndustryPageSection::select('id', 'section_name', 'title')->where('page_id', $page_id)->where('status', 1)->get();
    }

    /** CMS Page Repo Function Start */
        public function allCmsPages(){
            $pages = IndustryCmsPage::select('*')
                ->latest()->paginate(10);
            return $pages;
        }

        public function storeCmsPage($request, $data){
            $page = new IndustryCmsPage();
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
            return IndustryCmsPage::find($id);
        }

        public function updateCmsPage($data, $id){
            $page = IndustryCmsPage::where('id', $id)->first();
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
        public function allPageSectionList(){
            $master_pages = IndustryPageSection::select('industry_page_sections.*', 'cp.title as page_title')
                ->leftJoin('industry_cms_pages as cp', 'cp.id', '=', 'industry_page_sections.page_id')
                ->latest()->paginate(10);
            return $master_pages;
        }

        public function findPageSection($id){
            return IndustryPageSection::find($id);
        }

        public function storePageSection($data, $type){
            if($type == "store"){
                $page = new IndustryPageSection();
            }else{
                $page = IndustryPageSection::find($data['id']);
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
    /** Page Section Repo Function End */

    /** Section Data Repo Function Start */
        public function allSectionDataList(){
            return IndustrySectionData::select('industry_section_datas.*', 'cp.title as page_title', 'ps.section_name')
                ->leftJoin('industry_cms_pages as cp', 'cp.id', '=', 'industry_section_datas.page_id')
                ->leftJoin('industry_page_sections as ps', 'ps.id', '=', 'industry_section_datas.section_id')
                ->latest()->paginate(10);
        }

        public function findSectionData($id){
            return IndustrySectionData::find($id);
        }

        public function storeSectionData($data, $type){
            if($type == "store"){
                $page = new IndustrySectionData();
                $page->created_by = $data['created_by'];
            }else{
                $page = IndustrySectionData::find($data['id']);
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

}