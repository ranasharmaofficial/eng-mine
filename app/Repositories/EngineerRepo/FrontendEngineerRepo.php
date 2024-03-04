<?php
namespace App\Repositories\EngineerRepo\FrontendEngineerRepo;

use App\Repositories\Interfaces\FrontendEngineerInterface\FrontendEngineerInterface;
use App\Models\User;


class FrontendEngineerRepo implements FrontendEngineerInterface
{
    public function customerDashboard(){
    }

    public function findProfile($user_id){
        return User::find($user_id);
    }

    public function getProfile( $user_id){
        return User::where('users.status' ,1)->where('users.id', $user_id)
        ->join('countries', 'countries.id', '=', 'users.country')
        ->join('states', 'states.id', '=', 'users.state')
        ->join('cities', 'cities.id', '=', 'users.city')
        ->select(['users.*', 'countries.name as countryName', 'states.name as stateName', 'cities.name as cityName'])
        ->first();
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




}
