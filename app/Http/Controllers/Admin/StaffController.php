<?php
namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use App\Models\User;
use App\Models\UserLogin;
use App\Models\EngineerJob;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\StaffRepositoryInterface;

class StaffController extends Controller

{

    private $staffRepository;
    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request){

        $staffs =  $this->staffRepository->allStaffs($request);

        return view('admin.staffs.index', compact('staffs','request'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create(){

        $master_designation = $this->staffRepository->allmasterdesignation();
        $user_type_list = $this->staffRepository->allusertypes();
        return view('admin.staffs.create', ['master_designation'=>$master_designation, 'user_type_list'=>$user_type_list]);

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */



    public function addStaffRegister(Request $request){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'status' => 'required',
            'user_type_id' => 'required',
            'user_designation_id' => 'required',
            'status' => 'required',
        ]);



        $us__id = User::where('user_type_id',  5)->orderBy('id', 'desc')->first();
            if($us__id){
                $center_code = substr($us__id->username, 3);
                $inc_id = $center_code+1;
                $username ='EST'.$inc_id.'';
            }else{
                $username = 'EST101';
            }




        $addEmployee = new User;
        $addEmployee->username = $username;
        $addEmployee->first_name = $request->first_name;
        $addEmployee->last_name = $request->last_name;
        $addEmployee->mobile = $request->mobile;
        $addEmployee->email = $request->email;
        $addEmployee->status = $request->status;
        $addEmployee->email_verified_at = now();
        $addEmployee->mobile_verified_at = now();
        $addEmployee->is_verified = 1;
        $addEmployee->user_type_id = $request->user_type_id;
        $addEmployee->user_designation_id = $request->user_designation_id;
        $addEmployee->save();

        $user_login = UserLogin::create([
            'username' => $request->mobile,
            'email' => $request->_email,
            'password' => $request->password,
            'user_id' => $addEmployee->id,
            'user_type_id' => $request->user_type_id,
            'status' => 1,
        ]);

        if (!$user_login) {
            return response()->json([
                "status" => false,

            ]);
        } else  {
            return response()->json([
                "status" => true,
             ]);

        }


    }



    /**

     * Display the specified resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function show($id){

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function edit($id){
        $staff = $this->staffRepository->findStaff($id);
        $master_designation = $this->staffRepository->allmasterdesignation();
        $user_type_list = $this->staffRepository->allusertypes();
        return view('admin.staffs.update', compact('staff', 'master_designation', 'user_type_list'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */


    public function updateStaffdetails(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'status' => 'required',
            'user_type_id' => 'required',
            'user_designation_id' => 'required',
            'status' => 'required',
        ]);

        $addEmployee = User::where('id', $request->id)->first();
        $addEmployee->first_name = $request->first_name;
        $addEmployee->last_name = $request->last_name;
        $addEmployee->mobile = $request->mobile;
        $addEmployee->email = $request->email;
        $addEmployee->status = $request->status;
        $addEmployee->user_type_id = $request->user_type_id;
        $addEmployee->user_designation_id = $request->user_designation_id;
        $addEmployee->save();

        $user_login = UserLogin::where('user_id', $request->id)->first();
        $user_login->username = $request->mobile;
        $user_login->email = $request->email;
        $user_login->password = $request->password;
        $user_login->user_type_id = $request->user_type_id;
        $user_login->status = 1;
        $user_login->save();

        if(!$user_login) {
            return response()->json([
                "status" => false,

            ]);
        } else  {
            return response()->json([
                "status" => true,
             ]);

        }
    }


    public function customerList(Request $request){
        $customer_list = $this->staffRepository->getCustomerList($request);
        return view('admin.customer-list.index', compact('customer_list', 'request'));
    }

    public function guestList(Request $request){
        $guest_list = $this->staffRepository->getGuestList($request);
        // dd($guest_list);
        return view('admin.customer-list.guest-list.index', compact('guest_list', 'request'));
    }

    public function viewGuestEstimate($id){
        $estimate_list = $this->staffRepository->getGuestEstimate($id);
        $guest_details = $this->staffRepository->getGuestDetails($id);
        return view('admin.customer-list.guest-list.estimate_list', compact('estimate_list','guest_details'));
    }

    public function viewCustomerEstimate($id){
        $estimate_list = $this->staffRepository->getGuestEstimate($id);
        $guest_details = $this->staffRepository->getGuestDetails($id);
        return view('admin.customer-list.guest-list.customer_estimate_list', compact('estimate_list','guest_details'));
    }





    public function changeStatus(Request $request){
        $user = $this->staffRepository->setUserStatus($request);
        return response()->json($user);

    }

    public function staffExport(){
        return view('admin.engineer-list.staff_export');
    }

    public function customerExport(){
        return view('admin.customer-list.customer_export');
    }

    public function guestExport(){
        return view('admin.customer-list.guest-list.guest_export');
    }

    public function customer_list(Request $request){
        $customer_list = $this->staffRepository->getCustomerList($request);
        return view('admin.estimate-list.customer_lis', compact('customer_list', 'request'));
    }

    public function engineerCommission(Request $request){
        $engineer_commission = EngineerJob::where('engineer_jobs.status', 'completed')
        ->leftJoin('users as u', 'u.id', '=', 'engineer_jobs.user_id')
        ->leftJoin('users as ue', 'ue.id', '=', 'engineer_jobs.engineer_id')
        ->leftJoin('orders as o', 'o.id', '=', 'engineer_jobs.order_id')
        ->select('engineer_jobs.*','ue.first_name as eng_first_name','ue.last_name as eng_last_name','ue.username as eng_username','o.id as order_id','o.created_at as order_date','o.service_order_id','o.location', 'o.landmark', 'o.city', 'o.state', 'o.pincode', 'u.first_name', 'u.last_name', 'u.mobile', 'u.email', 'u.address', 'u.state')
        ->latest()
        ->paginate(15);
        return view('admin.engineer-list.engineer_commission', compact('engineer_commission', 'request'));
    }



}

