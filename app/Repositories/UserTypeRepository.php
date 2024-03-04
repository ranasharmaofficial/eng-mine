<?php
namespace App\Repositories;
use App\Repositories\Interfaces\UserTypeRepositoryInterface;
use App\Models\UserType;

class UserTypeRepository implements UserTypeRepositoryInterface
{
    public function allUserTypes()
    {
        return UserType::latest()->paginate(10);
    }

    public function storeUserType($data)
    {
        return UserType::create($data);
    }

    public function getUserTypeDetails($data)
    {
        return UserType::where('id', $data)->first();
    }

    public function updateUserType($data)
    {
        $designation = UserType::where('id', $data['id'])->first();
        $designation->name = $data['name'];
        $designation->created_by = '1';
        $designation->updated_at = now();
        $designation->save();
    }

}
