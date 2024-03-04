<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\BookingInterface\BookingRepositoryInterface;
use App\Repositories\Interfaces\WebInterface\CommonRepositoryInterface;

use App\Models\OrderDetail;
use App\Models\Order;

class BookingController extends Controller
{
    private $bookingRepository;
    public function __construct(BookingRepositoryInterface $bookingRepository, CommonRepositoryInterface $webRepository)
    {
        $this->bookingRepository = $bookingRepository;
        $this->webRepository = $webRepository;
    }

    public function createBooking(){
        $service_categories = $this->webRepository->getServiceCategory();
        return view('frontend.customer.add_booking', compact('service_categories'));
    }

    public function indexBooking(){
        $user_id = Session('LoggedCustomer')->user_id;
        $all_service_booking  = $this->bookingRepository->getServiceBooking($user_id);
        // $service_booking = OrderDetail::where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        $service_booking = Order::where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        return view('frontend.customer.index_booking', compact('all_service_booking', 'service_booking'));
    }

    public function upComingBooking(){
        $user_id = Session('LoggedCustomer')->user_id;
        $service_booking = Order::where('user_id', $user_id)->where('status', 6)->orderBy('id', 'DESC')->get();
        return view('frontend.customer.upComing_booking', compact('service_booking'));
    }

    public function ongoingBooking(){
        $user_id = Session('LoggedCustomer')->user_id;
        $service_booking = Order::where('user_id', $user_id)->where('status', 2)->orderBy('id', 'DESC')->get();
        return view('frontend.customer.ongoing', compact('service_booking'));
    }

    public function completeBooking(){
        $user_id = Session('LoggedCustomer')->user_id;
        $service_booking = Order::where('user_id', $user_id)->where('status', 3)->orderBy('id', 'DESC')->get();
        return view('frontend.customer.completed_booking', compact('service_booking'));
    }

    public function cancellBooking(){
        $user_id = Session('LoggedCustomer')->user_id;
        // $service_booking = OrderDetail::where('user_id', $user_id)->where('status', 5)->orderBy('id', 'DESC')->get();
        $service_booking = Order::where('user_id', $user_id)->where('status', 5)->orderBy('id', 'DESC')->get();
        return view('frontend.customer.cancelled_booking', compact('service_booking'));
    }

    public function pendingBooking(){
        $user_id = Session('LoggedCustomer')->user_id;
        $service_booking = Order::where('user_id', $user_id)->where('status', 0)->orderBy('id', 'DESC')->get();
        // $service_booking = OrderDetail::where('user_id', $user_id)->where('status', 0)->orderBy('id', 'DESC')->get();
        return view('frontend.customer.pending_booking', compact('service_booking'));
    }


}
