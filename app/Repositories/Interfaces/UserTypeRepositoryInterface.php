<?php
namespace App\Repositories\Interfaces;

Interface UserTypeRepositoryInterface
{
    public function allUserTypes();
    public function storeUserType($data);
    public function getUserTypeDetails($data);
    public function updateUserType($data);
}
