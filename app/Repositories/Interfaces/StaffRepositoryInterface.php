<?php

namespace App\Repositories\Interfaces;



Interface StaffRepositoryInterface{
    public function allStaffs($request);
    public function storeStaff($data);
    public function findStaff($id);
    public function updateStaff($data, $id);
    public function allmasterdesignation();
    public function allusertypes();

}

