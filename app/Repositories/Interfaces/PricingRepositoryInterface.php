<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface PricingRepositoryInterface{
    public function pricing_type_list();
    public function storePriceType($data);
    public function findFaq($id);
    public function updateFaq($data, $id);
    public function findPricing($id);
    // public function updatePricing($data, $id);
    public function pricing_list($request);
    public function getPriceTableFields($product_id);
    public function getSubProductList($product_id);
}
