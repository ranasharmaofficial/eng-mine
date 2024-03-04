<?php

namespace App\Repositories;

use App\Repositories\Interfaces\SubCategoryRepositoryInterface;
use App\Models\Category;

class SubCategoryRepository implements SubCategoryRepositoryInterface
{

    public function allSubCategories()
    {
        $sub_category = Category::select('categories.*', 'parent_cat.title as parent_name')
            ->leftJoin('categories as parent_cat', 'parent_cat.id', '=', 'categories.parent_id')
            ->where('categories.parent_id', '!=', 0)->latest()->paginate(10);
        return $sub_category;
    }

    public function getCategoryList(){
        return Category::select('id', 'title')->where('parent_id',  0)->where('status', 1)->get();
    }

    public function storeSubCategory($data)
    {
        return Category::create($data);
    }

    public function findSubCategory($id)
    {
        return Category::find($id);
    }

    public function updateSubCategory($data, $id)
    {
        $updated_by = session('LoggedUser')->id;

        $category = Category::where('id', $id)->first();
        $category->title = $data['title'];
        $category->parent_id = $data['parent_id'];
        $category->status = $data['status'];
        $category->updated_by = $updated_by;
        $category->save();
    }

    public function destroySubCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}