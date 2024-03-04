<?php
namespace App\Repositories;
use App\Repositories\Interfaces\GalleryRepositoryInterface;
use App\Models\Gallery;
use App\Models\ImageCategory;
use App\Models\Country;
// use Illuminate\Http\Request;

class GalleryRepository implements GalleryRepositoryInterface
{
    public function allGallery($request){
        $galleries = Gallery::select('galleries.*', 'cat.title as parent_name')
            ->leftJoin('image_categories as cat', 'cat.id', '=', 'galleries.category_id');
            if($request->category_id){
                $galleries = $galleries->where('galleries.category_id', $request['category_id']);
            }
            if($request->search){
                $galleries = $galleries->where('galleries.description','LIKE',"%{$request['search']}%");
            }
            $galleries = $galleries->latest()->paginate(30);
        return $galleries;
    }

    public function getCategoryList(){
        return ImageCategory::select('id', 'title')->where('parent_id', '0')->where('status', 1)->get();
    }

    public function storeGallery($request, $data){
        $gallery = new Gallery();
        $gallery->category_id = $data['category_id'];
        $gallery->description = $data['description'];

        if($data['image']){
            $gallery->image = $data['image'];
        }else{
            $gallery->image = NULL;
        }

        if($data['icon']){
            $gallery->icon = $data['icon'];
        }else{
            $gallery->icon = NULL;
        }

        $gallery->status = $data['status'];
        $gallery->created_by = $data['created_by'];
        $gallery->save();
    }

    public function findGallery($id){
        return Gallery::find($id);
    }

    public function updateGallery($data, $id){
        $gallery = Gallery::where('id', $id)->first();
        $gallery->category_id = $data['category_id'];
        $gallery->description = $data['description'];

        if($data['image']){
            $gallery->image = $data['image'];
        }

        if($data['icon']){
            $gallery->icon = $data['icon'];
        }

        $gallery->status = $data['status'];
        $gallery->updated_by = $data['updated_by'];
        $gallery->save();
    }

    public function deleteGallery($id){
        $delete = Gallery::find($id);
        $delete->delete();
    }

}
