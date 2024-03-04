<?php

namespace App\Repositories;
use App\Repositories\Interfaces\FeedbackRepositoryInterface;
use App\Models\Order;
use App\Models\ServiceFeedback;;
use App\Models\Complain;
class FeedbackRepository implements FeedbackRepositoryInterface
{

    // public function getOrderDetails($request){
    //     return Order::where('id', $request->order_id)->first();
    // }

    public function getFeedbackList($request){
            $data = ServiceFeedback::latest()
            ->select('service_feedback.*', 'u.first_name', 'u.last_name', 'u.company_name', 'o.service_order_id')
            ->leftJoin('users as u', 'u.id', '=', 'service_feedback.user_id')
            ->leftJoin('orders as o', 'o.id', '=', 'service_feedback.order_id');
            // if($request['service_order_id']){
            //     $data = $data->where('orders.service_order_id', $request['service_order_id']);
            // }
            // if($request['customer_mobile']){
            //     $data = $data->where('u.mobile',$request['customer_mobile']);
            // }
            // if($request['eng_mobile']){
            //     $data = $data->where('e.mobile',$request['eng_mobile']);
            // }


            // if($request['date_from']){
            //     $data = $data->where('orders.created_at', '>=', date('Y-m-d', strtotime($request['date_from'])))->where('orders.created_at', '<=', date('Y-m-d', strtotime($request['date_to'])));
            // }
            // if($request['customer_name']){
            //     $data = $data->where('u.first_name','LIKE',"%{$request['customer_name']}%");
            // }
            $data = $data->latest()->paginate(20);
        return $data;
    }

    public function getServiceOrder($request, $status){
        $data = Order::where('orders.status', $status)->latest()
        ->select('orders.*', 'u.first_name', 'u.last_name', 'u.mobile')
        ->leftJoin('users as u', 'u.id', '=', 'orders.user_id')
        ->leftJoin('users as e', 'e.id', '=', 'orders.engineer_id');
        if($request['service_order_id']){
            $data = $data->where('orders.service_order_id', $request['service_order_id']);
        }
        if($request['customer_mobile']){
            $data = $data->where('u.mobile',$request['customer_mobile']);
        }
        if($request['eng_mobile']){
            $data = $data->where('e.mobile',$request['eng_mobile']);
        }


        if($request['date_from']){
            $data = $data->where('orders.created_at', '>=', date('Y-m-d', strtotime($request['date_from'])))->where('orders.created_at', '<=', date('Y-m-d', strtotime($request['date_to'])));
        }
        if($request['customer_name']){
            $data = $data->where('u.first_name','LIKE',"%{$request['customer_name']}%");
        }
        $data = $data->latest()->paginate(20);
        return $data;
    }



    public function serviceOrderDetails($id){
        $data = Order::where('orders.id', $id)
                ->leftJoin('users as u', 'u.id', '=', 'orders.user_id')
                ->leftJoin('users as e', 'e.id', '=', 'orders.engineer_id')
                ->select('orders.*', 'u.first_name', 'u.last_name', 'u.mobile', 'u.address', 'u.state',
                        'u.city','u.country','u.email','u.pincode','u.pincode',
                        'u.username', 'u.profile_pic'
                        ,'e.first_name as eng_first_name', 'e.last_name as eng_last_name',
                        'e.mobile as eng_mobile', 'e.email as eng_email','e.aadhar as eng_aadhar',
                        'e.country as eng_country', 'e.state as eng_state','e.city as eng_city','e.address as eng_address',
                        'e.pincode as eng_pincode', 'e.username as eng_username', 'e.profile_pic as eng_profile_pic')
                ->first();
        return $data;
    }

    public function setFeedbackStatus($request){
        $approve_feedback = ServiceFeedback::find($request->id);
        $approve_feedback->status = $request->status;
        $approve_feedback->rating_approved_by = Session('LoggedUser')->user_id;
        $approve_feedback->save();
    }

    public function getComplainList($request){
        // $complain_list = Complain::get();
        $data = Complain::latest()
        ->select('complains.*', 'u.first_name', 'u.last_name', 'u.company_name', 'o.service_order_id')
        ->leftJoin('users as u', 'u.id', '=', 'complains.user_id')
        ->leftJoin('orders as o', 'o.id', '=', 'complains.order_id');
        if($request['order_id']){
            $data = $data->where('o.service_order_id', $request['order_id']);
        }
        if($request['customer_mobile']){
            $data = $data->where('u.mobile',$request['customer_mobile']);
        }
        if($request['eng_mobile']){
            $data = $data->where('e.mobile',$request['eng_mobile']);
        }


        if($request['date_from']){
            $data = $data->where('orders.created_at', '>=', date('Y-m-d', strtotime($request['date_from'])))->where('orders.created_at', '<=', date('Y-m-d', strtotime($request['date_to'])));
        }
        if($request['name']){
            $data = $data->where('u.first_name','LIKE',"%{$request['name']}%");
        }
       return $data = $data->latest()->paginate(20);
    }

}

