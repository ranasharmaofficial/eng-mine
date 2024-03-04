<?php
namespace App\Repositories\Interfaces\WebInterface;
use Illuminate\Http\Request;

Interface WebServiceRepositoryInterface{
    public function getserviceDetails($slug);
    public function getServiceSectionData($page_id);
    public function getPageSectionData($page_id);


}
