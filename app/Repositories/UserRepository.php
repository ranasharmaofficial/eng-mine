<?php
namespace App\Repositories;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Models\UserLogin;

class UserRepository implements UserRepositoryInterface
{
    public function allUsers(){
        $users = User::select('users.*', 'user_types.name AS user_type_name')
            ->leftJoin('user_types', 'users.user_type_id', '=', 'user_types.id')
            ->where('users.user_type_id', '!=', 1)
            ->latest()->paginate(10);
        return $users;
    }

    public function setUserStatus($user_data){
        $user = User::find($user_data->id);
        $user->status = $user_data->status;
        if($user->save()){
            $update_User_login = UserLogin::where('user_id', $user_data->id)->first();
            $update_User_login->status = $user_data->status;
            $update_User_login->save();
        }
    }
}