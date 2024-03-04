<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface BusinessRepositoryInterface{
    public function getBusinessSetupList($type);
    public function updateWebsiteData($data);
    public function updateWebsiteWidgetData($data);
    public function updateOfficeSetuptData($data);
}