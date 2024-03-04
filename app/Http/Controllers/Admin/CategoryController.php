<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{

    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =  $this->categoryRepository->allCategories();
        return view('admin.categories.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.category.create');
    }

    public function generateSlug()
    {
        $this->slug = SlugService::createSlug(Category::class, 'slug', $this->title);
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
            'title' => 'required|unique:categories|string|max:255',
            'type' => 'required',
            'status' => 'required',
        ]);

        $data['created_by'] = session('LoggedUser')->id;
        $this->categoryRepository->storeCategory($data);
        return response()->json([
            "status" => true,
        ]);
        // return redirect()->route('admin.categories.index')->with(session()->flash('alert-success', 'Category Created Successfully'));
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
        $category = $this->categoryRepository->findCategory($id);
        return view('admin.categories.category.update', compact('category'));
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
            'type' => 'required',
            'status' => 'required',
        ]);
        $this->categoryRepository->updateCategory($request->all(), $id);
        // return redirect()->route('admin.categories.index')->with(session()->flash('alert-success', 'Category Updated Successfully'));
        return response()->json([
            "status" => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepository->destroyCategory($id);
        return redirect()->route('admin.categories.index')->with(session()->flash('alert-success', 'Category Delete Successfully'));
    }

    public function delete($id){
        $this->categoryRepository->deleteCategory($id);
        return redirect()->route('admin.categories.index')->with(session()->flash('alert-danger', 'Category Deleted Successfully'));
    }

}
