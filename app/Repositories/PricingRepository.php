<?php
namespace App\Repositories;
use App\Repositories\Interfaces\PricingRepositoryInterface;
use App\Models\PricingType;
use App\Models\Pricing;
use App\Models\FaqCategory;
use App\Models\MasterProduct;

class PricingRepository implements PricingRepositoryInterface
{
    public function pricing_type_list()
    {
        $pricing_type_list = PricingType::select('*')->latest()->paginate(10);
        return $pricing_type_list;
    }

    public function storePriceType($data)
    {
        $pricing_type = new PricingType();
        $pricing_type->name = $data['name'];
        $pricing_type->status = $data['status'];
        if($data['icon']){
            $pricing_type->icon = $data['icon'];
        }
        $pricing_type->save();
    }

    public function pricing_list($request)
    {
        $pricing_list = Pricing::select('*');
        if($request['common']){
            $pricing_list = $pricing_list->where('common', $request['common']);
        }
        if($request['product']){
            $pricing_list = $pricing_list->where('product_id', $request['product']);
        }
        if($request['price_type']){
            $pricing_list = $pricing_list->where('type_id', $request['price_type']);
        }
        $pricing_list = $pricing_list->latest()->paginate(10);
        
        return $pricing_list;
    }

    public function getPriceTableFields($product_id){
        return MasterProduct::select('table_fields')->where('id', $product_id)->first();
    }

    public function getSubProductList($product_id){
        return MasterProduct::select('id', 'title')->where('parent_id', $product_id)->where('status', 1)->get();
    }

    public function storeFaqCategory($request, $data)
    {
        $faq = new FaqCategory();
        $faq->type = $data['type'];
        $faq->name = $data['name'];
        $faq->status = $data['status'];
        $faq->save();
    }

    public function findFaq($id){
        return Faq::find($id);
    }

    public function updateFaq($data, $id)
    {
        $faq = Faq::find($id);
        $faq->question = $data['question'];
        $faq->answer = $data['answer'];
        $faq->status = $data['status'];
        $faq->save();
    }

    public function faq_category_list(){
        $faq_category_list = FaqCategory::select('*')->latest()->paginate(10);
        return $faq_category_list;
    }

    public function findFaqCategory($id){
        return FaqCategory::find($id);
    }

    public function updateFaqCategory($data){
        $faq_update = FaqCategory::find($data['id']);
        $faq_update->name = $data['name'];
        $faq_update->type = $data['type'];
        $faq_update->status = $data['status'];
        $faq_update->save();
    }

    public function getFaqCategoryList($type_id){
        return FaqCategory::select('id', 'name')->where('type', $type_id)->where('status', 1)->get();
    }

    public function product_list(){
        return MasterProduct::where('parent_id', 0)->where('status', 1)->latest()->get();
    }

    public function priceTypeList(){
        return PricingType::where('status', 1)->latest()->get();
    }

    public function findPricing($id){
        return Pricing::find($id);
    }

    public function destroyPricing($id){
        $delete_data = Pricing::find($id);
        $delete_data->delete();
    }

    

}
