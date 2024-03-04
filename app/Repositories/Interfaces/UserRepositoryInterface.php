<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface UserRepositoryInterface{
    public function allUsers();
    public function setUserStatus($user_data);
}