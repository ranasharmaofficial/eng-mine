<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\SubCategoryRepositoryInterface;

class SubCategoryController extends Controller
{

    private $subcategoryRepository;

    public function __construct(SubCategoryRepositoryInterface $subcategoryRepository)
    {
        $this->subcategoryRepository = $subcategoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories =  $this->subcategoryRepository->allSubCategories();
        return view('admin.categories.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  $this->subcategoryRepository->getCategoryList();
        return view('admin.categories.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'parent_id' => 'required',
            'title' => 'required|string|max:255',
            'status' => 'required',
        ]);

        $data['created_by'] = session('LoggedUser')->id;
        $this->subcategoryRepository->storeSubCategory($data);

        return redirect()->route('admin.sub_categories.index')->with(session()->flash('alert-success', 'Sub Category Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = $this->subcategoryRepository->findSubCategory($id);
        if($subcategory){
            $categories =  $this->subcategoryRepository->getCategoryList();
            return view('admin.categories.subcategory.update', compact('subcategory', 'categories'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'parent_id' => 'required',
            'title' => 'required|string|max:255',
            'status' => 'required',
        ]);
        $this->subcategoryRepository->updateSubCategory($request->all(), $id);
        return redirect()->route('admin.sub_categories.index')->with(session()->flash('alert-success', 'SubCategory Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->subcategoryRepository->destroySubCategory($id);
        return redirect()->route('admin.sub_categories.index')->with(session()->flash('alert-success', 'SubCategory Delete Successfully'));
    }
}