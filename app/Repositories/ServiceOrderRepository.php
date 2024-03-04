<?php

namespace App\Repositories;
use App\Repositories\Interfaces\ServiceOrderRepositoryInterface;
use App\Models\Order;
use App\Models\ServiceCategory;
class ServiceOrderRepository implements ServiceOrderRepositoryInterface
{

    public function getOrderDetails($request){
        return Order::where('id', $request->order_id)->first();
    }

    public function getServiceOrderList($request){
            $data = Order::latest()
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

    public function getServiceCategory(){
        return ServiceCategory::select('id', 'name')->where('status', 1)->get();
    }



}

