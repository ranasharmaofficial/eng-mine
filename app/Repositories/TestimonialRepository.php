<?php
namespace App\Repositories;
use App\Repositories\Interfaces\TestimonialRepositoryInterface;
use App\Models\Testimonial;
use App\Models\Video;

class TestimonialRepository implements TestimonialRepositoryInterface
{
    public function allTestimonials()
    {
        $testimonials = Testimonial::select('*')->latest()->paginate(10);
        return $testimonials;
    }

    public function storeTestimonial($request, $data)
    {
        $testimonial = new Testimonial();
        $testimonial->name = $data['name'];
        $testimonial->designation = $data['title'];
        $testimonial->message = $data['message'];
        if($data['img']){
            $testimonial->img = $data['img'];
        }else{
            $testimonial->img = NULL;
        }

        $testimonial->status = $data['status'];
        $testimonial->created_by = $data['created_by'];
        $testimonial->save();
    }

    public function findTestimonial($id)
    {
        return Testimonial::find($id);
    }

    public function updateTestimonial($data, $id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->name = $data['name'];
        $testimonial->designation = $data['title'];
        $testimonial->message = $data['message'];
        if($data['img']){
            $testimonial->img = $data['img'];
        }
        $testimonial->status = $data['status'];
        $testimonial->updated_by = $data['updated_by'];
        $testimonial->save();
    }

    public function destroyTestimonial($id){
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
    }

    public function allVideos()
    {
        $videos = Video::select('*')->latest()->paginate(10);
        return $videos;
    }

    public function storeVideo($request, $data)
    {
        $video = new Video();
        $video->title = $data['title'];
        $video->link = $data['link'];
        $video->status = $data['status'];
        $video->created_by = $data['created_by'];
        $video->save();
    }

    public function findVideo($id)
    {
        return Video::find($id);
    }

    public function updateVideo($data, $id)
    {
        $video = Video::find($id);
        $video->title = $data['title'];
        $video->link = $data['link'];
        $video->status = $data['status'];
        $video->updated_by = $data['updated_by'];
        $video->save();
    }

    public function destroyVideo($id){
        $testimonial = Video::find($id);
        $testimonial->delete();
    }

}
