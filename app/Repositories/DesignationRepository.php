<?php
namespace App\Repositories;
use App\Repositories\Interfaces\DesignationRepositoryInterface;
use App\Models\MasterDesignation;

class DesignationRepository implements DesignationRepositoryInterface
{
    public function allDesignations()
    {
        return MasterDesignation::latest()->paginate(10);
    }

    public function storeDesignation($data)
    {
        return MasterDesignation::create($data);
    }

}
