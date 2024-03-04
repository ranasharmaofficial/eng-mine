<?php
namespace App\Repositories\FrontEngineerRepo;
use App\Repositories\Interfaces\FrontEngInterface\FrontEngRepositoryInterface;
use App\Models\User;
use App\Models\EngineerSkill;
use App\Models\EngineerEducation;
use App\Models\EngineerWorkingHour;
use App\Models\Order;
use App\Models\EngineerJob;


class FrontEngRepository implements FrontEngRepositoryInterface
{
    public function customerDashboard(){
    }

    public function findProfile($user_id){
        return User::find($user_id);
    }

    public function getProfile($engineer_id){

        $count_engineer_skill = EngineerSkill::where('user_id',  $engineer_id)->count();
        $count_engineer_education = EngineerEducation::where('user_id',  $engineer_id)->count();


        if($count_engineer_skill>0 && $count_engineer_education>0){
            $check_engineer_skill = EngineerSkill::where('user_id',  $engineer_id)->first();
             $check_engineer_education = EngineerEducation::where('user_id',  $engineer_id)->first();
            if($check_engineer_skill && $check_engineer_education){
                return  User::where('users.status',1)->where('users.id', $engineer_id)
                         ->join('countries', 'countries.id', '=', 'users.country')
                         ->join('states', 'states.id', '=', 'users.state')
                         ->join('cities', 'cities.id', '=', 'users.city')
                         ->join('engineer_skills', 'engineer_skills.user_id', '=', 'users.id')
                         ->join('engineer_education', 'engineer_education.user_id', '=', 'users.id')
                         ->select(['users.*','engineer_skills.*','engineer_education.*', 'countries.name as countryName', 'states.name as stateName', 'cities.name as cityName'])->first();
             }else{
                 return User::where('status' ,1)->where('id', $engineer_id)->first();
             }
        }else{
            return User::where('status' ,1)->where('id', $engineer_id)->first();
        }



    }

    public function updateProfileDetails($data, $user_id){
        $profile = User::where('id', $user_id)->first();
        $profile->company_name = $data['company_name'];
        $profile->email = $data['email'];
        $profile->gst_number = $data['gst'];
        // $profile->alt_email = $data['alt_email'];
        $profile->address = $data['address'];
        // $profile->mobile = $data['phone'];
        $profile->alt_mobile = $data['alt_phone'];
        $profile->country = $data['country'];
        $profile->state = $data['state'];
        $profile->city = $data['city'];
        $profile->pincode = $data['pincode'];
        $profile->updated_by = $data['updated_by'];
        $profile->save();
    }

    public function getWorkingHour($engineer_id){
        return EngineerWorkingHour::where('user_id', $engineer_id)->get();
    }

    public function getServiceOrder($request, $status, $user_id){
        $data = Order::where('orders.status', $status)->where('orders.engineer_id', $user_id)->latest()
        ->select('orders.*', 'u.first_name', 'u.last_name', 'u.mobile')
        ->leftJoin('users as u', 'u.id', '=', 'orders.user_id')
        ->leftJoin('users as e', 'e.id', '=', 'orders.engineer_id');
        if($request['service_order_id']){
            $data = $data->where('orders.service_order_id', $request['service_order_id']);
        }
        if($request['customer_mobile']){
            $data = $data->where('u.mobile',$request['customer_mobile']);
        }
        if($request['eng_mobile']){
            $data = $data->where('e.mobile',$request['eng_mobile']);
        }


        if($request['date_from']){
            $data = $data->where('orders.created_at', '>=', date('Y-m-d', strtotime($request['date_from'])))->where('orders.created_at', '<=', date('Y-m-d', strtotime($request['date_to'])));
        }
        if($request['customer_name']){
            $data = $data->where('u.first_name','LIKE',"%{$request['customer_name']}%");
        }
        $data = $data->latest()->paginate(2);
        return $data;
    }

    public function getEngineersJob($request, $status, $user_id){
        return EngineerJob::where('engineer_jobs.status', $status)
                    ->where('engineer_jobs.engineer_id', $user_id)
                    ->leftJoin('users as u', 'u.id', '=', 'engineer_jobs.user_id')
                    ->leftJoin('orders as o', 'o.id', '=', 'engineer_jobs.order_id')
                    ->select('engineer_jobs.*','o.app_date','o.app_time', 'o.total_amount','o.location', 'o.landmark', 'o.city', 'o.state', 'o.pincode','o.status as orderStatus','o.created_at as order_date','o.service_order_id', 'u.first_name', 'u.last_name', 'u.mobile', 'u.email', 'u.address', 'u.state')
                    ->paginate(15);
    }

    public function getEngineerAllJobs($request, $status, $user_id){
        return EngineerJob::where('engineer_jobs.engineer_id', $user_id)
                    ->leftJoin('users as u', 'u.id', '=', 'engineer_jobs.user_id')
                    ->leftJoin('orders as o', 'o.id', '=', 'engineer_jobs.order_id')
                    ->select('engineer_jobs.*','o.app_date','o.app_time', 'o.total_amount','o.location', 'o.landmark', 'o.city', 'o.state', 'o.pincode','o.status as orderStatus','o.created_at as order_date','o.service_order_id', 'u.first_name', 'u.last_name', 'u.mobile', 'u.email', 'u.address', 'u.state')
                    ->paginate(15);
    }

    public function getEngineerEarnedRevenue($request, $status, $user_id){
        return EngineerJob::where('engineer_jobs.status', $status)
        ->where('engineer_jobs.engineer_id', $user_id)
        ->leftJoin('users as u', 'u.id', '=', 'engineer_jobs.user_id')
        ->leftJoin('orders as o', 'o.id', '=', 'engineer_jobs.order_id')
        ->select('engineer_jobs.*','o.total_amount','o.created_at as order_date','o.service_order_id', 'u.first_name', 'u.last_name', 'u.mobile', 'u.email', 'u.address', 'u.state')
        ->get();
    }

    public function getEngineerJobDetails($request){
        return EngineerJob::where('id', $request->job_id)->first();
    }


}
