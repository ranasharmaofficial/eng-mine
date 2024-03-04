<?php
namespace App\Repositories\Interfaces;

Interface DesignationRepositoryInterface
{
    public function allDesignations();
    public function storeDesignation($data);
}
