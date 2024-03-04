<?php
namespace App\Repositories\Interfaces\BookingInterface;
use Illuminate\Http\Request;

Interface BookingRepositoryInterface{
    public function getServiceBooking($user_id);
 }
