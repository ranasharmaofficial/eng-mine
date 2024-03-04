<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface PartnerRepositoryInterface{
    public function getPartnerList();
    public function getPartnerSectionList($page_id);


    /** CMS Page Interface Start */
    public function allPartners($request);
    public function storePartner($request, $data);
    public function findPartner($id);
    public function updatePartner($data, $id);
    /** CMS Page Interface End */

    /** Page Section Interface Start */
    public function allPartnerSectionList($request);
    public function findPartnerSection($id);
    public function storePartnerSection($data, $type);
    public function updatePartnerSection($data, $type);
    /** Page Section Interface End */

    /** Section Data Interface Start */
    public function allPartnerSectionDataList($request);
    public function findPartnerSectionData($id);
    public function storePartnerSectionData($data, $type);
    /** Section Data Interface End */

}
