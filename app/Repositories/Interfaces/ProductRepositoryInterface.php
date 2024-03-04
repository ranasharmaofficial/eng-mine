<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface ProductRepositoryInterface{
    public function getProductList();
    public function getProductSectionList($page_id);


    /** CMS Page Interface Start */
    public function allProducts($request);
    public function storeProduct($request, $data);
    public function findProduct($id);
    public function updateProduct($data, $id);
    public function deleteProduct($id);
    /** CMS Page Interface End */

    /** Page Section Interface Start */
    public function allProductSectionList($request);
    public function findProductSection($id);
    public function storeProductSection($data, $type);
    public function deleteProductSection($id);
    /** Page Section Interface End */

    /** Section Data Interface Start */
    public function allProductSectionDataList($request);
    public function findProductSectionData($id);
    public function storeProductSectionData($data, $type);
    public function deleteProductSectionData($id);
    /** Section Data Interface End */

}
