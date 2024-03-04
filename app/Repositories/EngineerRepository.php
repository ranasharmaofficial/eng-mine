<?php
namespace App\Repositories;
use App\Repositories\Interfaces\EngineerRepositoryInterface;

use App\Models\User;
use App\Models\CertifiedEngineer;
use App\Models\EngineerSkill;
use App\Models\UserLogin;

class EngineerRepository implements EngineerRepositoryInterface
{
    public function getEngineerList($request){
        // return User::where('user_type_id', 4)->paginate(20);

        $data = User::where('user_type_id', 4);
                if($request['username']){
                    $data = $data->where('username', $request['username']);
                }
                if($request['mobile']){
                    $data = $data->where('mobile',$request['mobile']);
                }
                if($request['email']){
                    $data = $data->where('email',$request['email']);
                }
                if($request['date_from']){
                    $data = $data->where('created_at', '>=', date('Y-m-d', strtotime($request['date_from'])))->where('created_at', '<=', date('Y-m-d', strtotime($request['date_to'])));
                }
                if($request['name']){
                    $data = $data->where('first_name','LIKE',"%{$request['name']}%");
                }
                $data = $data->latest()->paginate(20);
        return $data;


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

    public function getEngineerDetails($request){
        return User::where('id', $request->user_id)->first();
    }

    public function getEngineerFullDetails($id){
        $check_engineer_skill = EngineerSkill::where('user_id',  $id)->first();
            // if($check_engineer_skill){
            //     return  User::where('users.status',1)->where('users.id', $id)
            //             ->join('countries', 'countries.id', '=', 'users.country')
            //             ->join('states', 'states.id', '=', 'users.state')
            //             ->join('cities', 'cities.id', '=', 'users.city')
            //             ->join('engineer_skills', 'engineer_skills.user_id', '=', 'users.id')
            //             ->join('engineer_education', 'engineer_education.user_id', '=', 'users.id')
            //             ->select(['users.*','engineer_skills.*','engineer_education.*', 'countries.name as countryName', 'states.name as stateName', 'cities.name as cityName'])->first();
            // }else{
                return User::where('id', $id)->first();
            // }
    }

    public function getEngineerWorkingHourList($request){
        // return User::where('user_type_id', 4)->paginate(20);

        $data = User::where('users.user_type_id', 4)
                ->select('users.*', 'cp.working_type', 'cp.start_date', 'cp.start_time', 'cp.end_date', 'cp.end_time',)
                ->leftJoin('engineer_working_hours as cp', 'cp.user_id', '=', 'users.id');
                if($request['username']){
                    $data = $data->where('users.username', $request['username']);
                }
                if($request['mobile']){
                    $data = $data->where('users.mobile',$request['mobile']);
                }
                if($request['email']){
                    $data = $data->where('users.email',$request['email']);
                }
                if($request['date_from']){
                    $data = $data->where('users.created_at', '>=', date('Y-m-d', strtotime($request['date_from'])))->where('created_at', '<=', date('Y-m-d', strtotime($request['date_to'])));
                }
                if($request['name']){
                    $data = $data->where('users.first_name','LIKE',"%{$request['name']}%");
                }
                $data = $data->latest()->paginate(20);
        return $data;


    }

    public function getCertifiedEngineer($request){
        $data = CertifiedEngineer::latest();
        if($request['title']){
            $data = $data->where('title', $request['title']);
        }
        $data = $data->paginate(20);
        return $data;
    }

    public function deleteCertifiedEngineer($id){
        $delete_certified = CertifiedEngineer::find($id);
        $delete_certified->delete();
    }

    public function getCertifiedEngineerDetails($id){
        return CertifiedEngineer::findOrFail($id);
    }


}
