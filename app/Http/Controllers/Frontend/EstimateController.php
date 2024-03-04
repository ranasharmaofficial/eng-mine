<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Models\UserLogin;
use App\Models\User;
use PDF;


class EstimateController extends Controller
{

    public function downloadInvoice($id)
    {
        $service_order_details = $this->serviceOrderRepository->serviceOrderDetails($id);
        if($service_order_details){

            // dd($service_order_details);
            // return PDF::loadView('admin.service-order.invoice', compact('service_order_details'))->setOptions(['defaultFont' => 'Roboto','sans-serif', 'isRemoteEnabled' => true])->download('service-order-'.$service_order_details->service_order_id.'.pdf');
            $pdf=PDF::loadView('admin.service-order.invoice', compact('service_order_details'))->setOptions(['defaultFont' => 'Roboto','sans-serif', 'isRemoteEnabled' => true]);
            return $pdf->download('service-order-'.$service_order_details->service_order_id.'.pdf');
        }
    }

    public function viewInvoice(){
        return view('admin.service-order.invoice');
    }



}
