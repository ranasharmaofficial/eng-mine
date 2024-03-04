<?php

namespace App\Repositories;
use App\Models\MasterDesignation;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use App\Models\Staff;
use App\Models\User;
use App\Models\UserType;
use App\Models\UserLogin;
use App\Models\TempOrder;



class StaffRepository implements StaffRepositoryInterface

{

    public function allStaffs($request){

        $staffs = User::where('user_type_id',5)->select(['users.*','master_designations.name as roleName'])->latest();

        if($request['username']){
            $staffs = $staffs->where('username', $request['username']);
        }
        if($request['mobile']){
            $staffs = $staffs->where('mobile',$request['mobile']);
        }
        if($request['email']){
            $staffs = $staffs->where('email',$request['email']);
        }
        if($request['date_from']){
            $staffs = $staffs->where('created_at', '>=', date('Y-m-d', strtotime($request['date_from'])))->where('created_at', '<=', date('Y-m-d', strtotime($request['date_to'])));
        }
        if($request['name']){
            $staffs = $staffs->where('first_name','LIKE',"%{$request['name']}%");
        }

        $staffs = $staffs->leftjoin('master_designations', 'master_designations.id', '=', 'users.user_designation_id');

        $staffs = $staffs->paginate(10);

        return $staffs;

    }



    public function storeStaff($data){

        $staff = new User();
        $staff->role = $data['user_type'];
        $staff->first_name = $data['f_name'];
        $staff->last_name = $data['l_name'];
        $staff->email = $data['email'];
        $staff->mobile = $data['phone'];
        $staff->password = $data['password'];
        $staff->status = $data['status'];
        $staff->created_by = $data['created_by'];
        $staff->save();

    }



    public function findStaff($id){
        return  User::where('users.status',1)->where('users.id', $id)
                    ->join('user_logins', 'user_logins.user_id', '=', 'users.id')
                    ->select(['users.*','user_logins.password as pass'])->first();
    }



    public function updateStaff($data, $id){

        $staff = User::where('id', $id)->first();

        $staff->role = $data['user_type'];

        $staff->first_name = $data['f_name'];

        $staff->last_name = $data['l_name'];

        $staff->email = $data['email'];

        $staff->mobile = $data['phone'];

        $staff->password = $data['password'];

        // $staff->designation = $data['designation'];

        // if($data['profile_pic']){

        //     $staff->profile_pic = $data['profile_pic'];

        // }

        // $staff->facebook_id = $data['facebook_id'];

        // $staff->twitter_id = $data['twitter_id'];

        // $staff->linkedin_id = $data['linkedin_id'];

        $staff->status = $data['status'];

        $staff->save();

    }



    public function allmasterdesignation(){
        return MasterDesignation::get();
    }

    public function allusertypes(){
        return UserType::where('id', '!=', 1)->where('id', '!=', 2)->get();
    }

    public function getCustomerList($request){
        $data = User::where('users.user_type_id', 3)->where('users.is_verified', 1)->where('users.user_type', NULL)->orWhere('users.user_type', 'proper_user')
                ->select('users.*', 'co.name as countryName', 's.name as stateName', 'c.name as cityName',)
                ->leftJoin('countries as co', 'co.id', '=', 'users.country')
                ->leftJoin('states as s', 's.id', '=', 'users.state')
                ->leftJoin('cities as c', 'c.id', '=', 'users.city');
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

    public function getGuestList($request){
        $data = User::where('users.user_type_id', 3)->where('users.is_verified', 1)->where('users.user_type', 'guest')
                // ->select('users.*');
                ->select('users.*', 'co.name as countryName', 's.name as stateName', 'c.name as cityName',)
                ->leftJoin('countries as co', 'co.id', '=', 'users.country')
                ->leftJoin('states as s', 's.id', '=', 'users.state')
                ->leftJoin('cities as c', 'c.id', '=', 'users.city');
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

    public function getGuestEstimate($id){
        return TempOrder::where('user_id', $id)->where('book_status',0)->latest()->paginate(20);
    }

    public function getGuestDetails($id){
        return User::where('id', $id)->first();
    }

    public function setUserStatus($user_data){

        $user = User::find($user_data->id);
        $user->status = $user_data->status;
        // $user->is_verified = $user_data->status;
        if($user->save()){
            $update_User_login = UserLogin::where('user_id', $user_data->id)->first();
            $update_User_login->status = $user_data->status;
            $update_User_login->save();
        }

    }





}

