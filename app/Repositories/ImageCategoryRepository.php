<?php
namespace App\Repositories;
use App\Repositories\Interfaces\ImageCategoryRepositoryInterface;
use App\Models\ImageCategory;

class ImageCategoryRepository implements ImageCategoryRepositoryInterface
{
    public function allCategories()
    {
        return ImageCategory::where('parent_id', 0)->latest()->paginate(10);
    }

    public function storeCategory($data)
    {
        return ImageCategory::create($data);
    }

    public function findCategory($id)
    {
        return ImageCategory::find($id);
    }

    public function updateCategory($data, $id)
    {
        $updated_by = session('LoggedUser')->id;
        $category = ImageCategory::where('id', $id)->first();
        $category->title = $data['title'];
        $category->status = $data['status'];
        $category->updated_by = $updated_by;
        $category->save();
    }

    public function destroyCategory($id)
    {
        $category = ImageCategory::find($id);
        $category->delete();
    }
}