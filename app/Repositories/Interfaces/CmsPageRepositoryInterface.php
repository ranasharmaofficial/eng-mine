<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface CmsPageRepositoryInterface{
    public function getCmsPageList();
    public function getPageSectionList($page_id);
    public function allCustomerLeadList();
    public function allCareerEnquiryList();
    public function allSubscriberList();
    
    /** CMS Page Interface Start */
    public function allCmsPages($request);
    public function storeCmsPage($request, $data);
    public function findCmsPage($id);
    public function updateCmsPage($data, $id); 
    /** CMS Page Interface End */
    
    /** Page Section Interface Start */
    public function allPageSectionList($request);
    public function findPageSection($id);
    public function storePageSection($data, $type);
    /** Page Section Interface End */

    /** Section Data Interface Start */
    public function allSectionDataList($request);
    public function findSectionData($id);
    public function storeSectionData($data, $type);
    /** Section Data Interface End */

}