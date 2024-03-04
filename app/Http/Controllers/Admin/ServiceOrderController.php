<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Interfaces\ServiceOrderRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\ServiceSubCategory;
use App\Models\EngineerJob;
use App\Models\OrderInvoice;
use App\Models\Cart;

use Illuminate\Support\Facades\Mail;
use App\Mail\JobAssignToEngineerEmailManager;
use PDF;

class ServiceOrderController extends Controller
{
    private $serviceOrderRepository;
    public function __construct(ServiceOrderRepositoryInterface $serviceOrderRepository){
        $this->serviceOrderRepository = $serviceOrderRepository;
    }

    public function index(Request $request){
        $service_order_list = $this->serviceOrderRepository->getServiceOrderList($request);
        $engineer_list = User::where('user_type_id', 4)->where('status', 1)->where('employment_status', 1)->where('is_busy', 0)->orderBy('created_at', 'desc')->get();
        $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.service-order.index', compact('service_order_list', 'engineer_list', 'service_subcategory_list', 'request'));
    }

    public function viewOrderDetails($id, Request $request){
        $service_order_details = $this->serviceOrderRepository->serviceOrderDetails($id);

        if($service_order_details){
            $order_id = $id;
            $service_categories = $this->serviceOrderRepository->getServiceCategory();
            return view('admin.service-order.view_order_details', compact('service_order_details', 'service_categories', 'order_id', 'request'));
        }
    }

   // Pending Service Controller

    public function pendingOrder(Request $request){
        $status = 0;
        $service_order_list = $this->serviceOrderRepository->getServiceOrder($request, $status);
        $engineer_list = User::where('user_type_id', 4)->where('status', 1)->where('employment_status', 1)->where('is_busy', 0)->orderBy('created_at', 'desc')->get();
        $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.service-order.pending_order', compact('service_order_list', 'engineer_list', 'service_subcategory_list', 'request'));
    }

    public function ongoingOrder(Request $request){
        $status = 2;
        $service_order_list = $this->serviceOrderRepository->getServiceOrder($request, $status);
        $engineer_list = User::where('user_type_id', 4)->where('status', 1)->where('employment_status', 1)->where('is_busy', 0)->orderBy('created_at', 'desc')->get();
        $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.service-order.ongoing_order', compact('service_order_list', 'engineer_list', 'service_subcategory_list', 'request'));
    }

    public function completedOrder(Request $request){
        $status = 3;
        $service_order_list = $this->serviceOrderRepository->getServiceOrder($request, $status);
        $engineer_list = User::where('user_type_id', 4)->where('status', 1)->where('employment_status', 1)->where('is_busy', 0)->orderBy('created_at', 'desc')->get();
        $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.service-order.completed_order', compact('service_order_list', 'engineer_list', 'service_subcategory_list', 'request'));
    }

    public function declinedOrder(Request $request){
        $status = 4;
        $service_order_list = $this->serviceOrderRepository->getServiceOrder($request, $status);
        $engineer_list = User::where('user_type_id', 4)->where('status', 1)->where('employment_status', 1)->where('is_busy', 0)->orderBy('created_at', 'desc')->get();
        $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.service-order.declined_order', compact('service_order_list', 'engineer_list', 'service_subcategory_list', 'request'));
    }

    public function cancelledOrder(Request $request){
        $status = 5;
        $service_order_list = $this->serviceOrderRepository->getServiceOrder($request, $status);
        $engineer_list = User::where('user_type_id', 4)->where('status', 1)->where('employment_status', 1)->where('is_busy', 0)->orderBy('created_at', 'desc')->get();
        $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.service-order.cancelled_order', compact('service_order_list', 'engineer_list', 'service_subcategory_list', 'request'));
    }

    public function pendingserviceCreate(){
        return view('admin.service-pending.create');
    }

    // Complete Service Controller

    public function complteserviceIndex(){
        return view('admin.service-complete.index');
    }

    public function complteserviceCreate(){
        return view('admin.service-complete.create');
    }

    // Decline Service Controller

    public function declineserviceIndex(){
        return view('admin.service-decline.index');
    }

    public function declineserviceCreate(){
        return view('admin.service-decline.create');
    }

    public function assignServicetoEngineer(Request $request){
        $request->validate([
            'service_date' => 'required',
            'engineer_id' => 'required',
        ]);

        $job_Id = EngineerJob::orderBy('id', 'desc')->first();
            if($job_Id){
                $center_code = substr($job_Id->job_id, 3);
                $inc_id = $center_code+1;
                $job_id ='JOB'.$inc_id.'';
            }else{
                $job_id = 'JOB101';
            }

        $customer_details = Order::where('id', $request->order_id)->first();

        $engineer_details = User::where('id', $request->engineer_id)->first();
        $customer = User::where('id', $customer_details->user_id)->first();

        $assignJob = new EngineerJob;
        $assignJob->job_id = $job_id;
        $assignJob->user_id = $customer_details->user_id;
        $assignJob->order_id = $request->order_id;
        $assignJob->engineer_id = $request->engineer_id;
        $assignJob->service_date = $request->service_date;
        $assignJob->service_time = $request->service_time;
        $assignJob->status = 'upcoming';
        $assignJob->save();

        $updateEngineerBusy = User::where('id', $request->engineer_id)->first();
        $updateEngineerBusy->is_busy = 1;
        $updateEngineerBusy->save();

        $assignEngineer = Order::where('id', $request->order_id)->first();
        $assignEngineer->engineer_id = $request->engineer_id;
        $assignEngineer->service_date = $request->service_date;
        $assignEngineer->status = 1;
        $assignEngineer->save();

        $order_details = OrderDetail::where('order_id', $request->order_id)
            ->update([
                      'engineer_id' => $request->engineer_id,
                      'status' => 1,
                ]);

                if($assignJob){
                    if (env('MAIL_USERNAME')!=null) {
                        $array['view'] = 'mail_template.job_assign_to_eng_email_manager';
                        $array['subject'] = 'New Job Assigned from Engineermine';
                        $array['from'] = env('MAIL_FROM_ADDRESS');
                        $array['engineer_details'] = $engineer_details;
                        $array['customer'] = $customer;
                        $array['customer_details'] = $customer_details;
                        try {
                            Mail::to($engineer_details->email)->queue(new JobAssignToEngineerEmailManager($array));
                        } catch (\Exception $e) {

                        }
                    }
                }


        // if (!$assignEngineer) {
        //     return response()->json([
        //         "status" => false,

        //     ]);
        // } else  {
        //     return response()->json([
        //         "status" => true,
        //      ]);

        // }
        return redirect()->back()->with(session()->flash('alert-success', 'Assigned Successfully'));
    }

    public function order_details(Request $request){
        $orderDetails = $this->serviceOrderRepository->getOrderDetails($request);
        return response()->json($orderDetails);
    }

    public function updateOrderStatus(Request $request){
        // dd($request->all());
        $order = Order::where('id', $request->id)->first();
        $order->status = $request->status;
        $order->save();

        $order_details = OrderDetail::where('order_id', $request->id)
            ->update([
                      'status' => $request->status,
                ]);
        return response()->json($order_details);
    }

    public function updatePaymentStatus(Request $request){
        $order_pay = Order::where('id', $request->id)->first();
        $order_pay->payment_status = $request->payment_status;
        $order_pay->save();
        return response()->json($order_pay);
    }

    public function exportallOrder(){
        return view('admin.service-order.export_all_order');
    }

    public function exportPendingOrder(){
        return view('admin.service-order.export_pending_order');
    }

    public function exportOngoingOrder(){
        return view('admin.service-order.export_ongoing_order');
    }

    public function exportCompletedOrder(){
        return view('admin.service-order.export_completed_order');
    }

    public function exportCancelledOrder(){
        return view('admin.service-order.export_cancelled_order');
    }

    public function generateInvoice(Request $request){
        $generate_invoice = new OrderInvoice;
        $generate_invoice->order_id = $request->order_id;
        $generate_invoice->invoice_date = $request->invoice_date;
        $generate_invoice->created_by = $request->created_by;
        $generate_invoice->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Invoice Generated Successfully!'));
    }

    public function updateCustomerOrder(Request $request){
        // dd($request->all());
        /** update order for total amount */
        // $save_order = Order::where('id', $request->order_id);
        $cart_details_count = Cart::where('added_by', $request->added_by)->where('o_id', $request->order_id)->where('user_id', $request->user_id)->count();
        $cart_details = Cart::where('added_by', $request->added_by)->where('o_id', $request->order_id)->where('user_id', $request->user_id)->get();

        // dd($cart_details_count);

        if($cart_details_count>0){
			$deleteLastOrder = OrderDetail::where('order_id', $request->order_id)->where('user_id', $request->user_id)->delete();

            foreach ($cart_details as $item) {
				OrderDetail::create([
                    'order_id' => $request->order_id,
                    'user_id' => $request->user_id,
                    'category_id'=>$item->category_id,
                    'subcategory_id'=>$item->subcategory_id,
                    'service_id'=>$item->service_id,
                    'subservice_id'=>$item->subservice_id,
                    'activity_type'=>$item->activity_type,
                    'model'=>$item->model,
                    'qty'=>$item->qty,
                    'price'=>$item->price,
                    'total_price'=>$item->total_price,
                ]);
			}

            $total_service_order_amount = Cart::where('user_id', $request->user_id)->where('o_id', $request->order_id)->where('added_by', $request->added_by)->sum('total_price');
            $update_order = Order::where('id', $request->order_id)->where('user_id', $request->user_id)->first();
            $update_order->total_amount = $total_service_order_amount;
            $update_order->save();

            /** destroy carts */

            $deleteCarts = Cart::where('o_id', $request->order_id)->where('user_id', $request->user_id)->where('added_by', 'admin')->delete();

            return redirect('admin/order/order-view/'.$request->order_id.'?update=success');


        }else{
            return redirect('admin/order/order-view/'.$request->order_id.'?cart_empty=success');
        }



    }





}
