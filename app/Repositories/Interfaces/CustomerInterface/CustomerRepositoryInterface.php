<?php
namespace App\Repositories\Interfaces\CustomerInterface;
use Illuminate\Http\Request;

Interface CustomerRepositoryInterface{
    public function customerDashboard();
    public function findProfile($user_id);
    public function getProfile($user_id);
    public function updateProfileDetails($data, $user_id);
 }
