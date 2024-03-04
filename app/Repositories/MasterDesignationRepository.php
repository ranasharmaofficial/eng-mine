<?php

namespace App\Repositories;



use App\Models\MasterDesignation;

use App\Repositories\Interfaces\MasterDesignationRepositoryInterface;





class MasterDesignationRepository implements MasterDesignationRepositoryInterface

{



    public function alldesignation(){

        $designation = MasterDesignation::select('*')->latest()->paginate(10);

        return $designation;

    }



    public function storedesignation($data){

        $staff = new MasterDesignation();

        $staff->name = $data['designation'];

        $staff->status = $data['status'];

        $staff->created_by = $data['created_by'];

        $staff->save();

    }



    public function findDesignation($id){

        return MasterDesignation::find($id);

    }



    public function updatedesignation($data, $id){

        $staff = MasterDesignation::where('id', $id)->first();

        $staff->name = $data['name'];

        // $staff->status = $data['status'];

        $staff->save();

    }



}

