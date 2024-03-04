<?php
namespace App\Repositories;
use App\Repositories\Interfaces\LoginRepositoryInterface;

use App\Models\UserLogin;

class LoginRepository implements LoginRepositoryInterface
{
    public function adminAuthLogin($data){
        return UserLogin::join('users', 'users.id', '=', 'user_logins.user_id')
        ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
        ->where('user_logins.username',  $data['username'])
        ->where('user_logins.password', $data['password'])
        ->where('user_logins.status', 1)
        ->where('users.user_type_id', 1)
        ->select(['users.*', 'user_types.name as userType', 'user_logins.*'])
        ->first();
    }
}


