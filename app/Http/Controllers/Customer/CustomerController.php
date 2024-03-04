<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\CustomerInterface\CustomerRepositoryInterface;
use App\Models\UserLogin;
use App\Models\User;
use App\Models\Order;
use App\Models\TempOrder;
use App\Models\ServiceFeedback;
use App\Models\Complain;
use App\Models\OrderDetail;

class CustomerController extends Controller
{
    private $customerRepository;
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function customerDashboard()
    {
        $user_id = Session('LoggedCustomer')->user_id;
        $countUpcomingService = OrderDetail::where('user_id', $user_id)->where('status', 6)->count();
        $datas = [
            'countUpcomingService' => OrderDetail::where('user_id', $user_id)->where('status', 6)->count(),
            'inProgressService' => OrderDetail::where('user_id', $user_id)->where('status', 2)->count(),
            'completedService' => OrderDetail::where('user_id', $user_id)->where('status', 3)->count(),
            'totalService' => OrderDetail::where('user_id', $user_id)->count(),
            'UpcomingServiceList' => OrderDetail::where('user_id', $user_id)->where('status', 6)->get(),
            'ongoingServiceList' => OrderDetail::where('user_id', $user_id)->where('status', 2)->get(),
            'profile_details' => User::where('id', $user_id)->first(),
        ];
        return view('frontend.customer.customer-dashboard', $datas);
    }

    public function customerProfile(){
        $user_id = Session('LoggedCustomer')->user_id;
        $profile_details = $this->customerRepository->getProfile($user_id);
        // dd($profile_details);
        return view('frontend.customer.profile', compact('profile_details'));
    }

    public function customerProfileEdit(){
        $user_id = Session('LoggedCustomer')->user_id;
        $profile = $this->customerRepository->findProfile($user_id);
        return view('frontend.customer.update_profile', compact('profile'));
    }

    public function updateProfileDetails(Request $request){
        // dd($request->all());
        $user_id = Session('LoggedCustomer')->user_id;
        $data = $request->validate([
            'company_name' =>'required',
            'email' =>'required',
            'gst' =>'required',
            'address' =>'required',
            'alt_phone' =>'nullable',
            'country' =>'required',
            'state' =>'required',
            'city' =>'required',
            'pincode' =>'required',
        ]);
        $data['updated_by'] = session('LoggedCustomer')->user_id;
        $this->customerRepository->updateProfileDetails($data, $user_id);
        return redirect()->route('customer.profile')->with(session()->flash('alert-success', 'Profile Updated Successfully'));
    }

    public function customerChangepassword(){
        return view('frontend.customer.change-password');
    }

    // UserLogin
    public function update_customer_password(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        $user_id = Session('LoggedCustomer')->user_id;
        $user_details = UserLogin::where('user_id', $user_id)->first();
        // dd($user_details);
         #Match The Old Password
        if($request->old_password==$user_details->password){
            UserLogin::where('user_id', $user_id)->update([
                'password' => $request->new_password,
            ]);
            $response['status'] = true;
            $response['message'] = 'Success! Record Updated Successfully.';
        }else{
            $response['status'] = false;
            $response['message'] = 'Error! Record Not Updated.';
        }
        return $response;


    }

    public function customerFeedback(){
        $user_id = Session('LoggedCustomer')->user_id;
        $completed_service_booking = Order::where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        $service_feedback_list = ServiceFeedback::where('service_feedback.user_id', $user_id)
        ->join('orders', 'orders.id', '=', 'service_feedback.order_id')
        ->select(['service_feedback.*', 'orders.service_order_id as serviceOrderId'])
        ->get();
        return view('frontend.customer.feedback_list', compact('completed_service_booking', 'service_feedback_list'));
    }

    public function addFeedback(){
        $user_id = Session('LoggedCustomer')->user_id;
        $completed_service_booking = Order::where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        return view('frontend.customer.feedback', compact('completed_service_booking'));
    }

    public function saveFeedBack(Request $request){
        // dd($request->all());
        $request->validate([
            'order_id' => 'required',
            'rating' => 'required',
            'feedback' => 'required',
        ]);

        $user_id = Session('LoggedCustomer')->user_id;

        $service_feedback  = new ServiceFeedback;
        $service_feedback->order_id  = $request->order_id;
        $service_feedback->rating  = $request->rating;
        $service_feedback->feedback  = $request->feedback;
        $service_feedback->user_id  = $user_id;
        $service_feedback->save();

        if (!$service_feedback) {
            return response()->json([
                "status" => false,

            ]);
        } else  {
            return response()->json([
                "status" => true,
             ]);

        }


        // return redirect()->back()->with(session()->flash('alert-success', 'Thank you for your feedback.'));
    }

    public function saveComplain(Request $request){
        // dd($request->all());
        $request->validate([
            'order_id' => 'required',
            'subject' => 'required',
            'complain_details' => 'required',
        ]);

        $user_id = Session('LoggedCustomer')->user_id;
        $complain  = new Complain;
        $complain->order_id  = $request->order_id;
        $complain->subject  = $request->subject;
        $complain->complain_details  = $request->complain_details;
        $complain->user_id  = $user_id;
        $complain->save();

        if (!$complain) {
            return response()->json([
                "status" => false,

            ]);
        } else  {
            return response()->json([
                "status" => true,
             ]);

        }


        // return redirect()->back()->with(session()->flash('alert-success', 'Thank you for your feedback.'));
    }



    public function customerComplain(){
        $user_id = Session('LoggedCustomer')->user_id;
        $service_complain_list = Complain::where('complains.user_id', $user_id)
        ->join('orders', 'orders.id', '=', 'complains.order_id')
        ->select(['complains.*', 'orders.service_order_id as complainOrderId'])
        ->get();
        return view('frontend.customer.complain', compact('service_complain_list'));
    }

    public function getComplainDetails(Request $request){
        dd($request->all());
    }

    public function customerAddComplain(){
        $user_id = Session('LoggedCustomer')->user_id;
        $completed_service_booking = Order::where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        return view('frontend.customer.add_complain', compact('completed_service_booking'));
    }

    // public function resetPassword()
    // {
    //     $data = $this->customerRepository->dashboardDataCount();
    //     return view('admin.dashboard.reset_password', compact('data'));
    // }
    // UserLogin
    // public function updateAdminPassword(Request $request){
    //     $request->validate([
    //         'old_password' => 'required',
    //         'new_password' => 'required|confirmed',
    //     ]);
    //     $user_details = UserLogin::findOrFail(1);
    //     // dd($user_details);
    //      #Match The Old Password
    //     if($request->old_password==$user_details->password){
    //         UserLogin::where('id', 1)->update([
    //             'password' => $request->new_password,
    //         ]);
    //         return back()->with(session()->flash('alert-success', 'Updated Successfully'));
    //     }else{
    //         return back()->with(session()->flash('alert-danger', 'Wrong Old Password'));
    //     }

    // }

    /** Update Profile Picture */
    public function update_profile_picture (Request $request){
        // dd($request->all());
        $img_name = 'img_'.time().'.'.$request->profile->getClientOriginalExtension();
        $request->profile->move(public_path('uploads/customer/'), $img_name);
        $imagePath = $img_name;
        // dd($imagePath);
        $data = [
            'profile_pic'=>$imagePath,
        ];
        $update = User::where('id', $request->user_id)->first();
        $update->profile_pic = $imagePath;
        $update->save();
        if($update){
            $response['status'] = true;
            $response['message'] = 'Success! Record Updated Successfully.';
        }else{
            $response['status'] = false;
            $response['message'] = 'Error! Record Not Updated.';
        }
        return $response;
    }

    public function viewEstimate(){
        $user_id = Session('LoggedCustomer')->user_id;
        $view_estimate =TempOrder::where('user_id', $user_id)->where('book_status',0)->orderBy('id', 'DESC')->get();
        if($view_estimate){
            $profile_details = User::where('id', $user_id)->first();
            return view('frontend.customer.view_estimate', compact('view_estimate', 'profile_details'));
        }
    }

    public function viewEstimateDetails($temp_order_id){
        $user_id = Session('LoggedCustomer')->user_id;
        $view_estimate = TempOrder::where('user_id', $user_id)->where('id', $temp_order_id)->where('book_status',0)->orderBy('id', 'DESC')->first();
        if($view_estimate){
            $profile_details = User::where('id', $user_id)->first();
            return view('frontend.customer.view_estimate_details', compact('view_estimate', 'profile_details'));
        }else{
            return redirect()->route('index');
        }

    }

    public function cancelServiceOrder(Request $request){
        // dd($request->all());
        $request->validate([
            'cancellation_reason' => 'required'
        ]);

        $update_order = Order::where('id', $request->order_id)->first();
        $update_order->status = 5;
        $update_order->cancellation_reason = $request->cancellation_reason;
        $update_order->cancellation_time = now();
        $update_order->save();

        $order_details = OrderDetail::where('order_id', $request->order_id)
            ->update([
                      'status' => 5,
                ]);

        if (!$order_details) {
            return response()->json([
                "status" => false,

            ]);
        } else  {
            return response()->json([
                "status" => true,
                ]);

        }


    }

}
