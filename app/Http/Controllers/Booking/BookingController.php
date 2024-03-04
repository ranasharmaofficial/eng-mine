<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\BookingInterface\BookingRepositoryInterface;

class BookingController extends Controller
{
    private $bookingRepository;
    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function createBooking(){
        return view('frontend.booking.add_booking');
    }

    public function indexBooking(){
        $user_id = Session('LoggedCustomer')->user_id;
        $all_service_booking  = $this->bookingRepository->getServiceBooking($user_id);
        // $all_service_booking_list  = $this->bookingRepository->getBookingListDetails($user_id);
        // dd($all_booking_list);
        return view('frontend.booking.index_booking', compact('all_service_booking'));
    }

    public function upComingBooking(){
        return view('frontend.booking.upComing_booking');
    }

    public function ongoingBooking(){
        return view('frontend.booking.ongoing');
    }

    public function completeBooking(){
        return view('frontend.booking.completed_booking');
    }

    public function cancellBooking(){
        return view('frontend.booking.cancelled_booking');
    }
}
