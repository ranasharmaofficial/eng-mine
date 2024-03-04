<?php
namespace App\Repositories\BookingRepo;

use App\Repositories\Interfaces\BookingInterface\BookingRepositoryInterface;

use App\Models\Order;
use App\Models\OrderDetail;

class BookingRepository implements BookingRepositoryInterface
{
    public function getServiceBooking($user_id){
        return Order::where('user_id', $user_id)->get();
    }
}
