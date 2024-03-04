<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Interfaces\TemplateRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\ServiceFeedback;

class TemplateController extends Controller
{
    private $templateRepository;
    public function __construct(TemplateRepositoryInterface $templateRepository){
        $this->templateRepository = $templateRepository;
    }



    public function smsTemplateList(Request $request){
        $sms_template_list = $this->templateRepository->getFeedbackList($request);
        return view('admin.template.customer_feedbacks', compact('customer_feedbacks'));
    }

    public function approveStatus(Request $request){
        $feedbacks = $this->templateRepository->setFeedbackStatus($request);
        return response()->json($feedbacks);
    }

    public function exportCustomerFeedback(Request $request){
        $customer_feedbacks = $this->templateRepository->getFeedbackList($request);
        return view('admin.feedback.customer_feedback_export', compact('customer_feedbacks'));
    }

    public function customerComplain(Request $request){
        $customer_complains = $this->templateRepository->getComplainList($request);
        return view('admin.feedback.customer_complains', compact('customer_complains', 'request'));
    }


}
