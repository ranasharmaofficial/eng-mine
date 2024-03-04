<?php
namespace App\Repositories\Interfaces;

Interface SubCategoryRepositoryInterface{
    
    public function allSubCategories();
    public function getCategoryList();
    public function storeSubCategory($data);
    public function findSubCategory($id);
    public function updateSubCategory($data, $id); 
    public function destroySubCategory($id);
}