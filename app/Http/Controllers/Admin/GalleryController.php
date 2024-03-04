<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\GalleryRepositoryInterface;
use JD\Cloudder\Facades\Cloudder;

class GalleryController extends Controller
{

    private $galleryRepository;

    public function __construct(GalleryRepositoryInterface $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $categories =  $this->galleryRepository->getCategoryList();
        $galleries =  $this->galleryRepository->allGallery($request);
        return view('admin.galleries.gallery.index', compact('galleries', 'categories', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  $this->galleryRepository->getCategoryList();
        return view('admin.galleries.gallery.create', compact('categories'));
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
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);
        
        if($request->has('image')){
            $data['image'] = upload_asset($request->image);
        }else{
            $data['image'] = NULL;
        }

        if($request->has('icon')){
            $data['icon'] = upload_asset($request->icon);
        }else{
            $data['icon'] = NULL;
        }

        $data['created_by'] = session('LoggedUser')->id;
        $this->galleryRepository->storeGallery($request, $data);

        return redirect()->route('admin.galleries.index')->with(session()->flash('alert-success', 'Gallery Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = $this->galleryRepository->findGallery($id);
        if($gallery){
            $categories =  $this->galleryRepository->getCategoryList();
            return view('admin.galleries.gallery.update', compact('gallery', 'categories'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'category_id' => 'required|not_in:0',
            'description' => 'required',
            // 'blog_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);
        
        if($request->has('image')){
            $data['image'] = upload_asset($request->image);
        }else{
            $data['image'] = NULL;
        }

        if($request->has('icon')){
            $data['icon'] = upload_asset($request->icon);
        }else{
            $data['icon'] = NULL;
        }
        
        $data['updated_by'] = session('LoggedUser')->id;

        $this->galleryRepository->updateGallery($data, $id);
        return redirect()->route('admin.galleries.index')->with(session()->flash('alert-success', 'Gallery Updated Successfully'));
    }

    public function delete($id){
        $this->galleryRepository->deleteGallery($id);
        return redirect()->route('admin.galleries.index')->with(session()->flash('alert-danger', 'Data Deleted Successfully'));
    }

}