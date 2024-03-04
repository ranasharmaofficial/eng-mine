<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\ImageCategoryRepositoryInterface;

class ImageCategoryController extends Controller
{

    private $imageCategoryRepository;

    public function __construct(ImageCategoryRepositoryInterface $imageCategoryRepository)
    {
        $this->imageCategoryRepository = $imageCategoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =  $this->imageCategoryRepository->allCategories();
        return view('admin.galleries.image_category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.image_category.create');
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
            'title' => 'required|string|max:255',
            'status' => 'required',
        ]);

        $data['created_by'] = session('LoggedUser')->id;
        $this->imageCategoryRepository->storeCategory($data);

        return redirect()->route('admin.image_categories.index')->with(session()->flash('alert-success', 'Image Category Created Successfully'));
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
        $category = $this->imageCategoryRepository->findCategory($id);
        return view('admin.galleries.image_category.update', compact('category'));
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
            'title' => 'required|string|max:255',
            'status' => 'required'
        ]);
        $this->imageCategoryRepository->updateCategory($request->all(), $id);
        return redirect()->route('admin.image_categories.index')->with(session()->flash('alert-success', 'Image Category Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
    */
    public function delete($id){
        $this->imageCategoryRepository->destroyCategory($id);
        return redirect()->route('admin.image_categories.index')->with(session()->flash('alert-danger', 'Data Deleted Successfully'));
    }
}