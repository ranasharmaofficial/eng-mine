<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface MasterDesignationRepositoryInterface{

    public function alldesignation();

    public function storedesignation($data);

    public function findDesignation($id);

    public function updatedesignation($data, $id);

}
