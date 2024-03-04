<?php
namespace App\Repositories\CustomerRepo;

use App\Repositories\Interfaces\CustomerInterface\CustomerRepositoryInterface;
use App\Models\User;


class CustomerRepository implements CustomerRepositoryInterface
{
    public function customerDashboard(){
    }

    public function findProfile($user_id){
        return User::find($user_id);
    }

    public function getProfile( $user_id){
        $us_details = User::where('id', $user_id)->first();

        if($us_details->country!=null && $us_details->state!=null &&  $us_details->city!=null){
            return User::where('users.status' ,1)->where('users.id', $user_id)
            ->join('countries', 'countries.id', '=', 'users.country')
            ->join('states', 'states.id', '=', 'users.state')
            ->join('cities', 'cities.id', '=', 'users.city')
            ->select(['users.*', 'countries.name as countryName', 'states.name as stateName', 'cities.name as cityName'])
            ->first();
        }else{
            return User::where('users.status', 1)->where('users.id', $user_id)->first();
            // ->join('countries', 'countries.id', '=', 'users.country')
            // ->join('states', 'states.id', '=', 'users.state')
            // ->join('cities', 'cities.id', '=', 'users.city')
            // ->select(['users.*', 'countries.name as countryName', 'states.name as stateName', 'cities.name as cityName'])
            // ->first();
        }


    }

    public function updateProfileDetails($data, $user_id){

        $us__id = User::where('user_type_id',  3)->where('user_type', null)->orderBy('id', 'desc')->first();
        if($us__id){
            $center_code = substr($us__id->username, 3);
            $inc_id = $center_code+1;
            $username ='ENC'.$inc_id.'';
        }else{
            $username = 'ENC101';
        }

        $profile = User::where('id', $user_id)->first();
        $profile->username = $username;
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

        if($data['gst']!=null){
            $profile->user_type = 'proper_user';
        }

        $profile->save();
    }




}
