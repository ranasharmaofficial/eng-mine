<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\ProductSection;


class ProductController extends Controller
{
    private $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository){
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $pages =  $this->productRepository->allProducts($request);
        return view('admin.product.product.index', compact('pages', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories =  $this->productRepository->getProductList();
        return view('admin.product.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->validate([
            'parent_id' => 'required',
            'icon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'banner' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            'title' => 'required|string|max:255',
            'slug' => 'required',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable',
            'other_icon' => 'nullable',
            'short_description' => 'nullable',
            'table_fields' => 'nullable|array',
            'table_fields.*' => 'nullable|string',
        ]);

        if($request->has('icon')){
            $data['icon'] = upload_asset($request->icon, "cms");
        }else{
            $data['icon'] = NULL;
        }

        if($request->has('banner')){
            $data['banner'] = upload_asset($request->banner, "cms");
        }else{
            $data['banner'] = NULL;
        }

        if($request->has('image')){
            $data['image'] = upload_asset($request->image, "cms");
        }else{
            $data['image'] = NULL;
        }

        $data['created_by'] = session('LoggedUser')->id;
        $this->productRepository->storeProduct($request, $data);

        return redirect()->route('admin.product.index')->with(session()->flash('alert-success', 'CmsPage Created Successfully'));
    }

    // public function generateSlug(){
    //     $this->slug = SlugService::createSlug(MasterProduct::class, 'slug', $this->title);
    // }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $page = $this->productRepository->findProduct($id);
        if($page){
            $menus =  $this->productRepository->getProductList();
            return view('admin.product.product.update', compact('page', 'menus'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        // dd($request);
        $data = $request->validate([
            'parent_id' => 'required',
            'title' => 'required|string|max:255',
            'slug' => 'required',
            'status' => 'required',
            'order_no' => 'nullable',
            'meta_title' => 'nullable',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable',
            'other_icon' => 'nullable',
            'short_description' => 'nullable',
            'table_fields' => 'nullable|array',
            'table_fields.*' => 'nullable|string',
        ]);

        if($request->has('icon')){
            $data['icon'] = upload_asset($request->icon, "cms");
        }else{
            $data['icon'] = NULL;
        }

        if($request->has('banner')){
            $data['banner'] = upload_asset($request->banner, "cms");
        }else{
            $data['banner'] = NULL;
        }

        if($request->has('image')){
            $data['image'] = upload_asset($request->image, "cms");
        }else{
            $data['image'] = NULL;
        }

        $data['updated_by'] = session('LoggedUser')->id;
        $this->productRepository->updateProduct($data, $id);
        return redirect()->route('admin.product.index')->with(session()->flash('alert-success', 'CmsPage Updated Successfully'));
    }

    public function delete($id){
        $this->productRepository->deleteProduct($id);
        return redirect()->route('admin.product.index')->with(session()->flash('alert-danger', 'Data Deleted Successfully'));
    }

    /** Page Section CRUD Start */
        public function productSectionIndex(Request $request){
            $product_sections =  $this->productRepository->allProductSectionList($request);
            $cms_pages =  $this->productRepository->getProductList();
            return view('admin.product.product_section.index', compact('product_sections', 'cms_pages', 'request'));
        }

        public function productSectionCreate(){
            $cms_pages =  $this->productRepository->getProductList();
            return view('admin.product.product_section.create', compact('cms_pages'));
        }

        public function productSectionStore(Request $request){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                // 'section_name' => 'required|unique:product_sections,section_name',
                'section_name' => 'required',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'status' => 'required',
            ]);

            if($request->has('image')){
                $data['image'] = upload_asset($request->image, "cms");
            }else{
                $data['image'] = NULL;
            }

            $data['created_by'] = session('LoggedUser')->id;
            $checkSectionAdded = ProductSection::where('page_id', $request->page_id)->where('section_name', $request->section_name)->count();
            if($checkSectionAdded==0){
                $this->productRepository->storeProductSection($data, 'store');
                return redirect()->route('admin.product_sections.index')->with(session()->flash('alert-success', 'Page Section Created Successfully'));
            }else{
                return redirect()->route('admin.product_sections.index')->with(session()->flash('alert-danger', 'Already Exist!'));
            }


        }

        public function productSectionEdit($id){
            $page_section = $this->productRepository->findProductSection($id);
            if($page_section){
                $cms_pages =  $this->productRepository->getProductList();
                return view('admin.product.product_section.update', compact('page_section', 'cms_pages'));
            }
        }

        public function productSectionUpdate(Request $request, $id){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                'section_name' => 'required',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'status' => 'required',
            ]);

            if($request->has('image')){
                $data['image'] = upload_asset($request->image, "cms");
            }else{
                $data['image'] = NULL;
            }

            $data['id'] = $request->id;
            $data['created_by'] = session('LoggedUser')->id;
            $this->productRepository->updateProductSection($data, 'update');
            return redirect()->route('admin.product_sections.index')->with(session()->flash('alert-success', 'Page Section Updated Successfully'));
        }

        public function deleteProductSection($id){
            $this->productRepository->deleteProductSection($id);
            return redirect()->route('admin.product_sections.index')->with(session()->flash('alert-danger', 'Data Deleted Successfully'));
        }
    /** Page Section CRUD End */

    /** Section Data CRUD Start */
        public function productsectionDataIndex(Request $request){
            $page_sections =  $this->productRepository->allProductSectionDataList($request);
            $cms_pages =  $this->productRepository->getProductList();
            return view('admin.product.product_section_data.index', compact('page_sections', 'cms_pages', 'request'));
        }

        public function productfetchSection(Request $request){
            $data['sections'] = $this->productRepository->getProductSectionList($request->page_id);
            return response()->json($data);
        }

        public function productsectionDataCreate(){
            $cms_pages =  $this->productRepository->getProductList();
            return view('admin.product.product_section_data.create', compact('cms_pages'));
        }

        public function productsectionDataStore(Request $request){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                'section_id' => 'required|numeric',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'order_number' => 'required|numeric',
                'other' => 'nullable',
                'status' => 'required|numeric',
            ]);

            if($request->has('img')){
                $data['img'] = upload_asset($request->img, "cms");
            }else{
                $data['img'] = NULL;
            }

            if($request->has('other')){
                $data['other'] = upload_asset($request->other, "cms");
            }else{
                $data['other'] = NULL;
            }

            $data['created_by'] = session('LoggedUser')->id;
            $this->productRepository->storeProductSectionData($data, 'store');
            return redirect()->route('admin.productsection_data.index')->with(session()->flash('alert-success', 'Section Data Created Successfully'));
        }

        public function productsectionDataEdit($id){
            $section_data = $this->productRepository->findProductSectionData($id);
            if($section_data){
                $cms_pages =  $this->productRepository->getProductList();
                $page_sections =  $this->productRepository->getProductSectionList($section_data->page_id);
                return view('admin.product.product_section_data.update', compact('section_data', 'cms_pages', 'page_sections'));
            }
        }

        public function productsectionDataUpdate(Request $request, $id){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                'section_id' => 'required|numeric',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'order_number' => 'required|numeric',
                // 'other' => 'nullable',
                'status' => 'required|numeric',
            ]);
            // dd($request->all());
            if($request->has('img')){
                $data['img'] = upload_asset($request->img, "cms");
            }else{
                $data['img'] = NULL;
            }

            if($request->has('other')){
                $data['other'] = upload_asset($request->other, "cms");
            }else{
                $data['other'] = NULL;
            }

            $data['id'] = $request->id;
            $data['updated_by'] = session('LoggedUser')->id;
            $this->productRepository->storeProductSectionData($data, 'update');
            return redirect()->route('admin.productsection_data.index')->with(session()->flash('alert-success', 'Page Section Updated Successfully'));
        }

        public function deleteProductSectionData($id){
            $this->productRepository->deleteProductSectionData($id);
            return redirect()->route('admin.productsection_data.index')->with(session()->flash('alert-danger', 'Data Deleted Successfully'));
        }
    /** Section Data CRUD End */

}
