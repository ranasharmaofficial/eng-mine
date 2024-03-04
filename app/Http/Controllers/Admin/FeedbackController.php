<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Interfaces\FeedbackRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\ServiceFeedback;

class FeedbackController extends Controller
{
    private $feedbackRepository;
    public function __construct(FeedbackRepositoryInterface $feedbackRepository){
        $this->feedbackRepository = $feedbackRepository;
    }



    public function customerFeedback(Request $request){
        $customer_feedbacks = $this->feedbackRepository->getFeedbackList($request);
        return view('admin.feedback.customer_feedbacks', compact('customer_feedbacks'));
    }

    public function approveStatus(Request $request){
        $feedbacks = $this->feedbackRepository->setFeedbackStatus($request);
        return response()->json($feedbacks);
    }

    public function exportCustomerFeedback(Request $request){
        $customer_feedbacks = $this->feedbackRepository->getFeedbackList($request);
        return view('admin.feedback.customer_feedback_export', compact('customer_feedbacks'));
    }

    public function customerComplain(Request $request){
        $customer_complains = $this->feedbackRepository->getComplainList($request);
        return view('admin.feedback.customer_complains', compact('customer_complains', 'request'));
    }


}
