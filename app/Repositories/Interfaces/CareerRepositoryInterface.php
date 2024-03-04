<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface CareerRepositoryInterface{
    public function allCareers();
    public function storeCareer($request, $data);
    public function findCareer($id);
    public function updateCareer($data, $id);

}