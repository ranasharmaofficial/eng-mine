<?php
namespace App\Repositories\Interfaces\FrontEngInterface;
use Illuminate\Http\Request;

Interface FrontEngRepositoryInterface{
    public function customerDashboard();
    public function findProfile($user_id);
    public function getProfile($user_id);
    public function updateProfileDetails($data, $user_id);
 }
