<?php
namespace App\Repositories\Interfaces\WebInterface;
use Illuminate\Http\Request;

Interface HProductRepositoryInterface{
    public function getProductDetails($slug);
    public function getProductSectionData($page_id);
    public function getProductList();

}
