<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\PricingRepositoryInterface;
use App\Models\Pricing;
class PricingController extends Controller
{
    private $pricingRepository;

    public function __construct(PricingRepositoryInterface $pricingRepository)
    {
        $this->pricingRepository = $pricingRepository;
    }

    /** faq category code start here */
    public function priceTypeList(){
        $pricing_type_list =  $this->pricingRepository->pricing_type_list();
        return view('admin.pricing.pricing_type_list', compact('pricing_type_list'));
    }

    public function priceTypeAdd(){
        return view('admin.pricing.pricing_type_add');
    }

    public function storePriceType(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'icon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
        ]);
        if($request->has('icon')){
            $data['icon'] = upload_asset($request->icon);
        }else{
            $data['icon'] = NULL;
        }
        $this->pricingRepository->storePriceType($data);
        return redirect()->back()->with(session()->flash('alert-success', 'Created Successfully'));
    }

    public function faqCategoryList(){
        $faq_category_list =  $this->pricingRepository->faq_category_list();
        return view('admin.faqs.faq_category_list', compact('faq_category_list'));
    }

    public function faqCategoryEdit($id){
        $faq_cat = $this->pricingRepository->findFaqCategory($id);
        if($faq_cat){
            return view('admin.faqs.faq_category_update', compact('faq_cat'));
        }
    }

    public function FaqCategoryUpdate(Request $request){
        $data = $request->validate([
            'type' => 'required',
            'name' => 'required',
            'status' => 'required',
            'id' => 'required',
        ]);
        $this->pricingRepository->updateFaqCategory($data);
        return redirect()->back()->with(session()->flash('alert-success', 'Updated Successfully'));
    }

    public function fetch_faq_category(Request $request){
        // dd($request->all());
        $data['categories'] = $this->pricingRepository->getFaqCategoryList($request->faq_type);
        // dd($data['categories']);
        return response()->json($data);
    }

    public function pricingList (Request $request){
        $products = $this->pricingRepository->product_list();
        $priceTypeList = $this->pricingRepository->priceTypeList();
        $pricing_list =  $this->pricingRepository->pricing_list($request);
        return view('admin.pricing.price.pricing_list', compact('pricing_list', 'products', 'priceTypeList', 'request'));
    }

    public function getTableFields(Request $request){
        $results = $this->pricingRepository->getPriceTableFields($request->product_id);
        $output="";
        // dd(json_decode($results->table_fields)[0] != null);
        if($results){
            if(json_decode($results->table_fields)[0] != null){
                foreach (json_decode($results->table_fields) as $value) {
                    $output.='<div class="col-md-6"><div class="form-group">';
                    $output.='<label>'. $value .'<span class="text-danger">*</span> </label>';
                    $output.='<input type="text" placeholder="Enter '.$value.'" class="form-control" name="table_fields[]"></div></div>';
                }
            }
            $output.='<div class="col-md-6"><div class="form-group">';
            $output.='<label> Price <span class="text-danger">*</span> </label>';
            $output.='<input type="text" placeholder="Enter Price" class="form-control" name="price"></div></div>';
        }
        return Response($output);
    }

    public function getSubProducts(Request $request) {
        $results = $this->pricingRepository->getSubProductList($request->product_id);
        $output="";
        if($results){
            foreach ($results as $value) {
                $output.= '<option value="'.$value->id.'">'.$value->title.'</option>';
            }
        }
        return Response($output);
    }
    
    public function addPricing(){
        $products = $this->pricingRepository->product_list();
        $priceTypeList = $this->pricingRepository->priceTypeList();
        return view('admin.pricing.price.add_pricing', compact('products', 'priceTypeList'));
    }

    public function storePricings(Request $request){
        $request->validate([
            'common' => 'required|numeric',
            'product_id' => 'required|numeric',
            'type_id' => 'required|numeric',
            'status' => 'required|numeric',
            "table_fields"    => "required|array",
            "table_fields.*"  => "required|string",
            "price"  => "required|numeric",
        ]);

        $details = new Pricing;
        $details->common = $request->common;
        $details->product_id = $request->product_id;
        $details->type_id = $request->type_id;
        $details->fields = json_encode($request->table_fields);
        $details->price = $request->price;
        $details->status = $request->status;
        $details->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Added Successfully'));
    }

    public function editPricing($id){
        $pricing = $this->pricingRepository->findPricing($id);
        $products = $this->pricingRepository->product_list();
        $priceTypeList = $this->pricingRepository->getSubProductList($pricing->product_id);
        return view('admin.pricing.price.update_pricing', compact('products', 'priceTypeList', 'pricing'));
    }

    public function updatePricings(Request $request, $id){
        $request->validate([
            'type_id' => 'required|numeric',
            'status' => 'required|numeric',
            "table_fields"    => "required|array",
            "table_fields.*"  => "required|string",
            "price"  => "required|numeric",
        ]);
        $details = Pricing::find($id);
        $details->type_id = $request->type_id;
        $details->fields = json_encode($request->table_fields);
        $details->price = $request->price;
        $details->status = $request->status;
        $details->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Updated Successfully'));
    }

    public function deletePricing($id){
        $this->pricingRepository->destroyPricing($id);
        return redirect()->route('admin.pricing.pricingList')->with(session()->flash('alert-success', 'Data Deleted Successfully'));
    }


}
