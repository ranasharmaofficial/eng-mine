<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface ServiceRepositoryInterface{
    public function getServiceList();
    public function getServiceSectionList($page_id);

    /** CMS Page Interface Start */
    public function allServices($request);
    public function storeService($request, $data);
    public function findService($id);
    public function updateService($data, $id);
    public function deleteService($id);
    /** CMS Page Interface End */

    /** Page Section Interface Start */
    public function allServiceSectionList($request);
    public function findServiceSection($id);
    public function storeServiceSection($data, $type);
    public function deleteServiceSection($id);
    /** Page Section Interface End */

    /** Section Data Interface Start */
    public function allServiceSectionDataList($request);
    public function findServiceSectionData($id);
    public function storeServiceSectionData($data, $type);
    public function deleteServiceSectionData($id);
    /** Section Data Interface End */

}
