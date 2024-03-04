<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface TestimonialRepositoryInterface{
    public function allTestimonials();
    public function storeTestimonial($request, $data);
    public function findTestimonial($id);
    public function updateTestimonial($data, $id);

    public function allVideos();
    public function storeVideo($request, $data);
    public function findVideo($id);
    public function updateVideo($data, $id);
}
