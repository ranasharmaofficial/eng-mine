<?php
namespace App\Repositories\WebRepo;
use App\Repositories\Interfaces\WebInterface\HProductRepositoryInterface;
use App\Models\PageSection;
use App\Models\MasterProduct;
use App\Models\ProductSection;
use App\Models\Pricing;


class HProductRepository implements HProductRepositoryInterface
{
    public function getProductDetails($slug){
        return MasterProduct::select('*')->where('slug', $slug)->first();
    }

    public function getProductDetail($id){
        return MasterProduct::select('*')->where('id', $id)->first();
    }



    public function getProductSectionData($page_id){
        return ProductSection::select('id', 'page_id', 'section_name', 'title', 'description', 'image')->where('page_id', $page_id)->where('status', 1)->get();
    }

    public function getPricingList($data){
        return Pricing::where('product_id', $data['product_id'])->where('type_id', $data['type'])->where('status', 1)->latest()->get();
    }

    public function checkPricingExist($data){
        return Pricing::where('product_id', $data)->count();
    }

    public function getPageSectionData($page_id){
        return PageSection::select('id', 'page_id', 'section_name', 'title', 'description', 'image')->where('page_id', $page_id)->where('status', 1)->get();
    }

    public function getProductList(){
        return MasterProduct::select('id', 'title', 'slug', 'table_fields')->where('parent_id', 0)->where('status', 1)->get();
    }

    public function getproductPriceDetails($id){
        return Pricing::select('*')->where('id', $id)->first();
    }

}
