<?php
namespace App\Repositories;
use App\Repositories\Interfaces\FaqRepositoryInterface;
use App\Models\Faq;
use App\Models\FaqCategory;

class FaqRepository implements FaqRepositoryInterface
{
    public function allFaqs($request)
    {
        $faqs = Faq::select('*');
        if($request->type){
            $faqs = $faqs->where('faq_type', $request->type);
        }
        if($request->category){
            $faqs = $faqs->where('faq_category', $request->category);
        }
        if($request->search){
            $faqs = $faqs->where('question','LIKE',"%{$request['search']}%");
        }
        $faqs = $faqs->latest()->paginate(10);
        return $faqs;
    }

    public function storeFaq($request, $data)
    {
        $faq = new Faq();
        $faq->question = $data['question'];
        $faq->answer = $data['answer'];
        $faq->status = $data['status'];
        // $faq->faq_type = $data['faq_type'];
        // $faq->faq_category = $data['faq_category'];
        $faq->save();
    }

    public function storeFaqCategory($request, $data)
    {
        $faq = new FaqCategory();
        $faq->type = $data['type'];
        $faq->name = $data['name'];
        $faq->status = $data['status'];
        $faq->save();
    }

    public function findFaq($id)
    {
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

    public function destroyFaq($id){
        $faq = Faq::find($id);
        $faq->delete();
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

}
