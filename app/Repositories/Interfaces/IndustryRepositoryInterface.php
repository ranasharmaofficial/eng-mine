<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface IndustryRepositoryInterface{
    public function getCmsPageList();
    public function getPageSectionList($page_id);
    
    /** CMS Page Interface Start */
    public function allCmsPages();
    public function storeCmsPage($request, $data);
    public function findCmsPage($id);
    public function updateCmsPage($data, $id); 
    /** CMS Page Interface End */
    
    /** Page Section Interface Start */
    public function allPageSectionList();
    public function findPageSection($id);
    public function storePageSection($data, $type);
    /** Page Section Interface End */

    /** Section Data Interface Start */
    public function allSectionDataList();
    public function findSectionData($id);
    public function storeSectionData($data, $type);
    /** Section Data Interface End */

}