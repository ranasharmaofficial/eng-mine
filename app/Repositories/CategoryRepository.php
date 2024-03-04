<?php
namespace App\Repositories;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use App\Models\Blog;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function allCategories()
    {
        return Category::where('parent_id', 0)->latest()->paginate(10);
    }

    public function storeCategory($data)
    {
        return Category::create($data);
    }

    public function findCategory($id)
    {
        return Category::find($id);
    }

    public function updateCategory($data, $id)
    {
        $updated_by = session('LoggedUser')->id;

        $category = Category::where('id', $id)->first();
        $category->type = $data['type'];
        $category->title = $data['title'];
        $category->status = $data['status'];
        $category->updated_by = $updated_by;
        $category->save();
    }

    public function destroyCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    public function deleteCategory($id){
        $delete_category = Category::find($id);
        $category_ids = Blog::where('category_id', $id)->pluck('id');
        // dd($category_ids);
        if(sizeof($category_ids)>0){
            $delete_blog_data = Blog::whereIn('id', $category_ids)->delete();
        }
        $delete_category->delete();
    }

}
