<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface FaqRepositoryInterface{
    public function allFaqs($request);
    public function storeFaq($request, $data);
    public function findFaq($id);
    public function updateFaq($data, $id); 
    public function destroyFaq($id); 
}