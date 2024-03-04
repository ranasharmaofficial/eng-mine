<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\UserLogin;
use App\Models\Cart;
// use Hash;
// use Validator;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerOtpEmailManager;
use App\Mail\CustomerRegSuccessEmailManager;
use App\Mail\EngineerRegSuccessEmailManager;
use App\Mail\EngineerRegSuccessAdminAlert;


class AuthController extends Controller
{

    /** Customer Login page start */
    public function login(){
        return view('frontend.auth.login');
    }

    public function customerEmailLogin(){
        return view('frontend.auth.customer-email-login');
    }

    public function getMobileOtp(Request $request){
        $request->validate([
            'mobile' => 'required|unique:users,mobile',
            'email' => 'required|unique:users,email',
        ]);

        $mobileotp = $request->mobile;
        $mobileotpsend = rand(111111,999999);
        session()->put('mobilenumber',$mobileotp);
        session()->put('mobileotp',$mobileotpsend);
        $msg = '# '.$mobileotpsend.' is the verification code to log in to your Smazz Kart account.Thanks, Team Smazz Kart.';
        $phones = $mobileotp;
        $url = "http://45.249.108.134/api.php";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=smazzkart&password=799309&sender=SMZKRT&sendto=".$phones."&message=".$msg."&PEID=1301168077776725528&templateid=1307168105994789755&type=3");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        $email_id = $request->email;
        // $emailotpsend = '123456';
        // $emailotpsend = rand(111111,999999);
        Session()->forget('email_otp');
        Session()->put('emailid',$email_id);
        Session()->put('email_otp',$mobileotpsend);

        $html_body = view('mail_template.otp_verification', compact('mobileotpsend'));
        if (env('MAIL_USERNAME')!=null) {
            $array['view'] = 'mail_template.otp_verification';
            $array['subject'] = 'OTP Received from Engineer Mine';
            $array['from'] = env('MAIL_FROM_ADDRESS');
            $array['otp'] = $mobileotpsend;

            // dd($request->email);

            try {
                Mail::to($request->email)->queue(new CustomerOtpEmailManager($array));
            } catch (\Exception $e) {

            }
        }

        if ($response) {

            $us__id = User::where('user_type_id',  3)->where('user_type',NULL)->orderBy('id', 'desc')->first();
            if($us__id){
                $center_code = substr($us__id->username, 3);
                $inc_id = $center_code+1;
                $username ='ENC'.$inc_id.'';
            }else{
                $username = 'ENC101';
            }

            $user = new User;
            $user->username = $username;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->mobile_otp = $mobileotpsend;
            $user->user_type_id = 3;
            $user->save();

            session()->put('savedCurrentId',$user->id);

            return 'success';
        } else{
            session()->forget(['mobileotp', 'mobilenumber']);
            return 'failed';
        }
    }

    public function getEngineerMobileOtp(Request $request){
        $request->validate([
            'engineer_mobile' => 'required|unique:users,mobile',
            'engemail' => 'required|unique:users,email',
        ]);
        $mobileotp = $request->engineer_mobile;
        // $mobileotpsend = '123456';
        $mobileotpsend = rand(111111,999999);
        session()->put('engineer_mobilenumber',$mobileotp);
        session()->put('engineer_mobileotp',$mobileotpsend);

        $msg = '# '.$mobileotpsend.' is the verification code to log in to your Smazz Kart account.Thanks, Team Smazz Kart.';
        $phones = $mobileotp;
        $url = "http://45.249.108.134/api.php";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=smazzkart&password=799309&sender=SMZKRT&sendto=".$phones."&message=".$msg."&PEID=1301168077776725528&templateid=1307168105994789755&type=3");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);

        // $html_body = view('frontend.mail_template.otp_verification', compact('mobileotpsend'));
        // $html_body = view('frontend.mail_template.otp_verification', compact('mobileotpsend'));
        if (env('MAIL_USERNAME') != null) {
            $array['view'] = 'mail_template.otp_verification';
            $array['subject'] = 'OTP Received from Engineer Mine';
            $array['from'] = env('MAIL_FROM_ADDRESS');
            $array['otp'] = $mobileotpsend;

            try {
                Mail::to($request->engemail)->queue(new CustomerOtpEmailManager($array));
            } catch (\Exception $e) {

            }
        }

        if ($response) {
            $us__id = User::where('user_type_id',  4)->orderBy('id', 'desc')->first();
        if($us__id){
            $center_code = substr($us__id->username, 3);
            $inc_id = $center_code+1;
            $username ='SPE'.$inc_id.'';
        }else{
            $username = 'SPE101';
        }

            $user = new User;
            $user->email = $request->engemail;
            $user->username = $username;
            $user->mobile = $request->engineer_mobile;
            $user->mobile_otp = $mobileotpsend;
            $user->user_type_id = 4;
            $user->save();

            session()->put('savedCurrentId',$user->id);

            return 'success';
        } else{
            session()->forget(['engineer_mobileotp', 'engineer_mobilenumber']);
            return 'failed';
        }
    }

    public function checkEngineerMobileOtp(Request $request){
        // dd($request->all());
        if($request->all()!=null){
            $checkOtp = User::where('mobile', $request->engineer_mobile_number)->first();
            // dd(Session::get('savedCurrentId'));
            // dd($checkOtp);
            if($checkOtp){
                if($request->engineer_mobile_otp==$checkOtp->mobile_otp){
                    return array(
                        'status' => 'success',
                        'message' => 'Otp Verified',
                    );
                }else{
                    return array(
                        'status' => 'failed',
                        'message' => 'Incorrect Otp',
                    );
                }
            }else{
                return array(
                    'status' => 'failed',
                    'message' => 'Incorrect Otp',
                );
            }

        }

    }

    public function checkMobileOtp(Request $request){
        // dd($request->all());
        if($request->all()!=null){
            $checkOtp = User::where('mobile', $request->mobile_number)->first();
            // dd(Session::get('savedCurrentId'));
            // dd($checkOtp);
            if($checkOtp){
                if($request->mobile_otp==$checkOtp->mobile_otp){
                    return array(
                        'status' => 'success',
                        'message' => 'Otp Verified',
                    );
                }else{
                    return array(
                        'status' => 'failed',
                        'message' => 'Incorrect Otp',
                    );
                }
            }else{
                return array(
                    'status' => 'failed',
                    'message' => 'Incorrect Otp',
                );
            }

        }
        /*
        if(Session::get('mobileotp')!=null){
            if($request->mobile_otp == Session::get('mobileotp')){
                return array(
                    'status' => 'success',
                    'message' => 'Otp Verified',
                );
            }else{
                return array(
                    'status' => 'failed',
                    'message' => 'Incorrect Otp',
                );
            }
        }
        */
    }

    public function getEmailOtp(Request $request){
        $request->validate([
            'email' => 'required|unique:users,email',
        ]);

        $email_id = $request->email;
        $emailotpsend = '123456';
        // $emailotpsend = rand(111111,999999);
        Session()->forget('email_otp');
        Session()->put('emailid',$email_id);
        Session()->put('email_otp',$emailotpsend);

        $html_body='<h4> Your Otp is : '.$emailotpsend.'</h4></br> ';

        require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'mail.omhero.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'info@omhero.com';   //  sender username
            $mail->Password = 'J0BM7UZS#6X&';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('info@omhero.com', 'Om Hero');
            $mail->addAddress($request->email);
            $mail->addCC('ranasharma880@gmail.com');
            // $mail->addBCC($request->emailBcc);

            $mail->addReplyTo('info@omhero.com', 'Om Hero');
            $mail->isHTML(true);                // Set email content format to HTML

        $mail->Subject = 'Mail Received from Enginner Mine';
        $mail->Body    = $html_body;
        $mail->send();

        if( !$mail->send() )
        {
            return 'failed';
        }else{
            return 'success';
        }


    }


    public function getEngineerEmailOtp(Request $request){
        $request->validate([
            'engineer_email' => 'required|unique:users,email',
        ]);

        $engineer_email = $request->engineer_email;
        $emailotpsend = '123456';
        // $emailotpsend = rand(111111,999999);
        Session()->forget('email_otp');
        Session()->put('engineer_email',$engineer_email);
        Session()->put('engineer_email_otp',$emailotpsend);

        $html_body='<h4> Your Otp is : '.$emailotpsend.'</h4></br> ';

        require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'mail.omhero.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'info@omhero.com';   //  sender username
            $mail->Password = 'J0BM7UZS#6X&';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('info@omhero.com', 'Om Hero');
            $mail->addAddress($request->engineer_email);
            $mail->addCC('ranasharma880@gmail.com');
            // $mail->addBCC($request->emailBcc);

            $mail->addReplyTo('info@omhero.com', 'Om Hero');
            $mail->isHTML(true);                // Set email content format to HTML

        $mail->Subject = 'Mail Received from Enginner Mine';
        $mail->Body    = $html_body;
        $mail->send();

        if( !$mail->send() )
        {
            return 'failed';
        }else{
            return 'success';
        }


    }



    public function checkEmailOtp(Request $request){
        if(Session::get('email_otp')!=null){
            if(Session::get('email_otp')==$request->email_otp){
                return array(
                    'status' => 'success',
                    'message' => 'Otp Verified',
                );
            }else{
                return array(
                    'status' => 'failed',
                    'message' => 'Incorrect Otp',
                );
            }
        }
    }

    public function checkEngineerEmailOtp(Request $request){
        if(Session::has('engineer_email_otp')!=null){
            if(Session::has('engineer_email_otp')==$request->engineer_email_otp){
                return array(
                    'status' => 'success',
                    'message' => 'Otp Verified',
                );
            }else{
                return array(
                    'status' => 'failed',
                    'message' => 'Incorrect Otp',
                );
            }
        }
    }

    public function resendEmailOtp(Request $request){
        $request->validate([
            'email' => 'required|unique:users,email',
        ]);

        $email_id = $request->email;
        $emailotpsend = '1234567';
        // $emailotpsend = rand(111111,999999);
        Session()->forget(['email_otp', 'email_otp_exp_time']);
        $otp_expires_time = now()->addMinutes(1); //Adjust the time as needed.
        Session()->put('email_otp_exp_time', $otp_expires_time);
        Session()->put('emailid',$email_id);
        Session()->put('email_otp',$emailotpsend);

        $html_body='<h4> Your Otp is : '.$emailotpsend.'</h4></br> ';

        require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'mail.omhero.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'info@omhero.com';   //  sender username
            $mail->Password = 'J0BM7UZS#6X&';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('info@omhero.com', 'Om Hero');
            $mail->addAddress($request->email);
            $mail->addCC('ranasharma880@gmail.com');
            // $mail->addBCC($request->emailBcc);

            $mail->addReplyTo('info@omhero.com', 'Om Hero');
            $mail->isHTML(true);                // Set email content format to HTML

        $mail->Subject = 'Mail Received from Enginner Mine';
        $mail->Body    = $html_body;
        $mail->send();

        if( !$mail->send() )
        {
            return 'failed';
        }else{
            return 'success'. $otp_expires_time;
        }
    }

    public function postLogin(Request $request){
        $data = $request->validate([
            'mobile' => 'required',
            'password' => 'required',
        ]);

        $is_loggedin = UserLogin::join('users', 'users.id', '=', 'user_logins.user_id')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->where('user_logins.username',  $data['mobile'])
            ->where('user_logins.password', $data['password'])
            ->where('user_logins.status', 1)
            ->where('users.is_verified', 1)
            ->where('user_logins.user_type_id', 3)
            ->select(['users.*', 'user_types.name as userType', 'user_logins.*'])
            ->first();

        if (!$is_loggedin) {
            // return redirect()->back()->with(session()->flash('alert-danger', 'Failed! We do not recognize your username or password.'));
            return response()->json([
                "status" => false,
                //"redirect" => url("dashboard")
            ]);
        } else  {
            $request->session()->put('LoggedCustomer', $is_loggedin);

            if (Session('temp_user_id') != null) {
                // $uri = explode('/',session('url.intended'));
                Cart::where('temp_user_id', session('temp_user_id'))
                        ->update([
                            'user_id' => Session('LoggedCustomer')->id,
                            'temp_user_id' => null
                        ]);

                Session::forget('temp_user_id');
                // $output['redirectTo'] = session('url.intended');
            }


            return response()->json([
                "status" => true,
                //"redirect" => url("dashboard")
            ]);
        }
    }

    public function postEngineerLogin(Request $request){
        $data = $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        $is_loggedin = UserLogin::join('users', 'users.id', '=', 'user_logins.user_id')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->where('user_logins.username',  $data['phone'])
            ->where('user_logins.password', $data['password'])
            ->where('user_logins.status', 1)
            ->where('user_logins.user_type_id', 4)
            ->where('users.is_verified', 1)
            ->select(['users.*', 'user_types.name as userType', 'user_logins.*'])
            ->first();

        if (!$is_loggedin) {
            // return redirect()->back()->with(session()->flash('alert-danger', 'Failed! We do not recognize your username or password.'));
            return response()->json([
                "status" => false,
                //"redirect" => url("dashboard")
            ]);
        } else  {
            $request->session()->put('LoggedEngineer', $is_loggedin);
            return response()->json([
                "status" => true,
                //"redirect" => url("dashboard")
            ]);
        }
    }



    public function postEmailLogin(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $is_loggedin = UserLogin::join('users', 'users.id', '=', 'user_logins.user_id')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->where('user_logins.email',  $data['email'])
            ->where('user_logins.password', $data['password'])
            ->where('user_logins.status', 1)
            ->where('user_logins.user_type_id', 3)
            ->where('users.is_verified', 1)
            ->select(['users.*', 'user_types.name as userType', 'user_logins.*'])
            ->first();

        if (!$is_loggedin) {
            // return redirect()->back()->with(session()->flash('alert-danger', 'Failed! We do not recognize your username or password.'));
            return response()->json([
                "status" => false,
                //"redirect" => url("dashboard")
            ]);
        } else  {
            $request->session()->put('LoggedCustomer', $is_loggedin);
            return response()->json([
                "status" => true,
                //"redirect" => url("dashboard")
            ]);
        }
    }

    public function postEngineerEmailLogin(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $is_loggedin = UserLogin::join('users', 'users.id', '=', 'user_logins.user_id')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->where('user_logins.email',  $data['email'])
            ->where('user_logins.password', $data['password'])
            ->where('user_logins.status', 1)
            ->where('user_logins.user_type_id', 4)
            ->where('users.is_verified', 1)
            ->select(['users.*', 'user_types.name as userType', 'user_logins.*'])
            ->first();

        if (!$is_loggedin) {
            // return redirect()->back()->with(session()->flash('alert-danger', 'Failed! We do not recognize your username or password.'));
            return response()->json([
                "status" => false,
                //"redirect" => url("dashboard")
            ]);
        } else  {
            $request->session()->put('LoggedEngineer', $is_loggedin);
            return response()->json([
                "status" => true,
                //"redirect" => url("dashboard")
            ]);
        }
    }


    /** Customer Login page start */


    /** Customer Registration page start */
    public function registration(){
        return view('frontend.auth.register');
    }

    public function getIpAddress(Request $request){
        return $request->ip();
    }

    public function saveCustomerRegistration(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gst_number' => 'nullable',
            // 'email' => 'required|email|unique:users',
            // 'mobile' => 'required|unique:users|min:10|max:13',
            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'required',
        ]);

        $user_details = User::where('mobile', $request->mobile)->first();
        // dd($user_details);
        // $user_details->username = $username;
        $user_details->first_name = $request->first_name;
        $user_details->last_name = $request->last_name;
        $user_details->email = $request->email;
        $user_details->password = Hash::make($request->password);
        $user_details->email_otp = $request->email_otp;
        $user_details->company_name = $request->company_name;
        $user_details->gst_number = $request->gst_number;
        $user_details->email_verified_at = now();
        $user_details->mobile_verified_at = now();
        $user_details->is_verified = 1;
        $user_details->user_type_id = 3;
        $user_details->save();

        $user_login = UserLogin::create([
            'username' => $request->mobile,
            'email' => $request->email,
            'password' => $request->password,
            'user_id' => $user_details->id,
            'user_type_id' => 3,
            'status' => 1,
        ]);

        if($user_login){
            if (env('MAIL_USERNAME') != null) {
                $array['view'] = 'mail_template.customer_reg_successful';
                $array['subject'] = 'Customer Registration Successfull';
                $array['from'] = env('MAIL_FROM_ADDRESS');
                $array['user_details'] = $user_details;
                    // dd($array);
                try {
                    Mail::to($request->email)->queue(new CustomerRegSuccessEmailManager($array));
                } catch (\Exception $e) {

                }
            }
        }

        return response()->json([
            "status" => true,
            "redirect" => url("dashboard")
        ]);

    }


    public function saveEngineerRegistration(Request $request)
    {
        $request->validate([
            'engineer_first_name' => 'required',
            'engineer_last_name' => 'required',
            // 'gst_number' => 'nullable',
            // 'email' => 'required|email|unique:users',
            // 'mobile' => 'required|unique:users|min:10|max:13',
            'engineer_email' => 'required|email',
            'engineer_mobile' => 'required',
            'engineer_password' => 'required',
        ]);

        $user_details = User::where('mobile', $request->engineer_mobile)
                    ->first();
        // dd($user_details);
        // $user_details->username = $username;
        $user_details->first_name = $request->engineer_first_name;
        $user_details->last_name = $request->engineer_last_name;
        $user_details->email = $request->engineer_email;
        $user_details->password = Hash::make($request->engineer_password);
        $user_details->email_otp = $request->email_otp;
        // $user_details->company_name = $request->company_name;
        // $user_details->gst_number = $request->gst_number;
        $user_details->email_verified_at = now();
        $user_details->mobile_verified_at = now();
        $user_details->is_verified = 1;
        $user_details->user_type_id = 4;
        $user_details->save();

        $user_login = UserLogin::create([
            'username' => $request->engineer_mobile,
            'email' => $request->engineer_email,
            'password' => $request->engineer_password,
            'user_id' => $user_details->id,
            'user_type_id' => 4,
            'status' => 1,
        ]);

        if($user_login){
            if (env('MAIL_USERNAME') != null) {
                $array['view'] = 'mail_template.customer_reg_successful';
                $array['subject'] = 'Engineer Registration Successfull';
                $array['from'] = env('MAIL_FROM_ADDRESS');
                $array['user_details'] = $user_details;

                try {
                    Mail::to($request->engineer_email)->queue(new EngineerRegSuccessEmailManager($array));
                } catch (\Exception $e) {

                }
            }

            if (env('MAIL_USERNAME') != null) {
                $array['view'] = 'mail_template.engineer_reg_alert_to_admin';
                $array['subject'] = 'New Engineer Registration';
                $array['from'] = env('MAIL_FROM_ADDRESS');
                $array['user_details'] = $user_details;

                try {
                    Mail::to(env('ADMIN_EMAIL'))->queue(new EngineerRegSuccessAdminAlert($array));
                } catch (\Exception $e) {

                }
            }

        }

        return response()->json([
            "status" => true,
            "redirect" => url("dashboard")
        ]);

    }

    // public function postRegistration(Request $request){
    //     // dd($request->all());
    //     $request->validate([
    //         'first_name' => 'required',
    //         'company_name' => 'required',
    //         'last_name' => 'required',
    //         'gst_number' => 'nullable',
    //         'email' => 'required|email|unique:users',
    //         'mobile' => 'required|unique:users|min:10|max:13',
    //         'password' => 'required'
    //     ]);

    //     // mobilenumber
    //     $user_details = User::where('mobile', $request->mobile)
    //                 ->where('email', $request->email)
    //                 ->first();

    //                 dd($user_details);

    //     $user->mobile = $request->mobile;
    //     $user->mobile_otp = $mobileotpsend;
    //     $user->user_type_id = 3;
    //     $user->save();

    //     $data = $request->all();
    //     $data['ip_address'] = $request->ip();

    //     $check = $this->create($data);
    //     if($check){
    //         $user_login = UserLogin::create([
    //             'username' => $data['email'],
    //             'password' => $data['password'],
    //             'user_id' => $check->id,
    //             'user_type_id' => 3,
    //             'status' => 1,
    //         ]);
    //     }

    //     return redirect("login")->with(session()->flash('alert-success', 'Successfully Registered.'));
    // }

    public function create(array $data){
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'status' => 1,
            'user_type_id' => 3,
            'user_designation_id' => 2,
            'ip_address' => $data['ip_address'],
        ]);
    }
    /** Customer Registration page End */

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/')->with(session()->flash('alert-success', 'Successfully Loggedout'));
    }

    public function otp_view(){
        $mobileotpsend = '654644';
        return view('frontend.mail_template.otp_verification', compact('mobileotpsend'));
    }

    public function forgotPassword(){
        return view('frontend.auth.forgot_password');
    }

    public function engineerForgotPassword(){
        return view('frontend.auth.engineer_forgot_password');
    }

    public function getForgotPasswordOtp(Request $request){
        // $request->validate([
        //     'mobile' => 'required|unique:users,mobile',
        //     'email' => 'required|unique:users,email',
        // ]);

        $mobileotp = $request->mobile;
        $mobileotpsend = rand(111111,999999);
        if($request->mobile){
            $check_mobile_exist = User::where('mobile', $request->mobile)->count();
            if($check_mobile_exist>=1){
                session()->put('mobilenumber',$mobileotp);
                session()->put('mobileotp',$mobileotpsend);
                $msg = '# '.$mobileotpsend.' is the verification code to log in to your Smazz Kart account.Thanks, Team Smazz Kart.';
                $phones = $mobileotp;
                $url = "http://45.249.108.134/api.php";
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "username=smazzkart&password=799309&sender=SMZKRT&sendto=".$phones."&message=".$msg."&PEID=1301168077776725528&templateid=1307168105994789755&type=3");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                $response = curl_exec($ch);
                if ($response) {
                    $result = array(
                        'status' => 200,
                        'message' => 'Otp Sent!',
                    );
                    return $result;
                } else{
                    session()->forget(['mobileotp', 'mobilenumber']);

                    $result = array(
                        'status' => 300,
                        'message' => 'Something Went Wrong!',
                    );
                    return 'failed';
                }
            }else{
                $result = array(
                    'status' => 404,
                    'message' => 'Mobile No. Not Found!',
                );
                return $result;
            }


        }

        if($request->email){
            $check_email_exist = User::where('email', $request->email)->count();
            if($check_email_exist>=1){
                $email_id = $request->email;
                Session()->forget('email_otp');
                Session()->put('emailid',$email_id);
                Session()->put('mobileotp',$mobileotpsend);

                $html_body = view('mail_template.otp_verification', compact('mobileotpsend'));
                if (env('MAIL_USERNAME')!=null) {
                    $array['view'] = 'mail_template.otp_verification';
                    $array['subject'] = 'OTP Received from Engineer Mine';
                    $array['from'] = env('MAIL_FROM_ADDRESS');
                    $array['otp'] = $mobileotpsend;

                    // dd($request->email);

                    try {
                      $mail_send =  Mail::to($request->email)->queue(new CustomerOtpEmailManager($array));
                    } catch (\Exception $e) {

                    }
                }


                $result = array(
                    'status' => 200,
                    'message' => 'Otp Sent!',
                );
                return $result;

            }else{
                $result = array(
                    'status' => 404,
                    'message' => 'Email Not Found!',
                );
                return $result;
            }

        }





    }



    public function getEngineerForgotPasswordOtp(Request $request){
        // $request->validate([
        //     'mobile' => 'required|unique:users,mobile',
        //     'email' => 'required|unique:users,email',
        // ]);

        $mobileotp = $request->mobile;
        $mobileotpsend = rand(111111,999999);
        if($request->mobile){
            $check_mobile_exist = User::where('mobile', $request->mobile)->count();
            if($check_mobile_exist>=1){
                session()->put('mobilenumber',$mobileotp);
                session()->put('mobileotp',$mobileotpsend);
                $msg = '# '.$mobileotpsend.' is the verification code to log in to your Smazz Kart account.Thanks, Team Smazz Kart.';
                $phones = $mobileotp;
                $url = "http://45.249.108.134/api.php";
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "username=smazzkart&password=799309&sender=SMZKRT&sendto=".$phones."&message=".$msg."&PEID=1301168077776725528&templateid=1307168105994789755&type=3");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                $response = curl_exec($ch);
                if ($response) {
                    $result = array(
                        'status' => 200,
                        'message' => 'Otp Sent!',
                    );
                    return $result;
                } else{
                    session()->forget(['mobileotp', 'mobilenumber']);

                    $result = array(
                        'status' => 300,
                        'message' => 'Something Went Wrong!',
                    );
                    return 'failed';
                }
            }else{
                $result = array(
                    'status' => 404,
                    'message' => 'Mobile No. Not Found!',
                );
                return $result;
            }


        }

        if($request->email){
            $email_id = $request->email;
            Session()->forget('email_otp');
            Session()->put('emailid',$email_id);
            Session()->put('mobileotp', $mobileotpsend);

            $html_body = view('mail_template.otp_verification', compact('mobileotpsend'));
            if (env('MAIL_USERNAME')!=null) {
                $array['view'] = 'mail_template.otp_verification';
                $array['subject'] = 'OTP Received from Engineer Mine';
                $array['from'] = env('MAIL_FROM_ADDRESS');
                $array['otp'] = $mobileotpsend;

                // dd($request->email);

                try {
                    Mail::to($request->email)->queue(new CustomerOtpEmailManager($array));
                } catch (\Exception $e) {

                }
            }

            $result = array(
                'status' => 200,
                'message' => 'Otp Sent!',
            );
            return $result;
        }else{
            $result = array(
                'status' => 404,
                'message' => 'Email No. Not Found!',
            );
            return $result;
        }





    }

    public function checkForgotMobileOtp(Request $request){
        if($request->all()!=null){
            $checkOtp = User::where('mobile', $request->mobile_number)->first();
            // dd(Session::get('savedCurrentId'));
            // dd($checkOtp);
            if(Session::get('mobileotp')){
                if($request->mobile_otp==Session::get('mobileotp')){
                    return array(
                        'status' => 'success',
                        'message' => 'Otp Verified',
                    );
                }else{
                    return array(
                        'status' => 'failed',
                        'message' => 'Incorrect Otp',
                    );
                }
            }else{
                return array(
                    'status' => 'failed',
                    'message' => 'Incorrect Otp',
                );
            }

        }
    }

    public function checkEngineerForgotMobileOtp(Request $request){
        // dd($request->all());
        if($request->all()!=null){
            $checkOtp = User::where('mobile', $request->mobile_number)->first();
            // dd(Session::get('savedCurrentId'));
            // dd($checkOtp);
            if(Session::get('mobileotp')){
                if($request->mobile_otp==Session::get('mobileotp')){
                    return array(
                        'status' => 'success',
                        'message' => 'Otp Verified',
                    );
                }else{
                    return array(
                        'status' => 'failed',
                        'message' => 'Incorrect Otp',
                    );
                }
            }else{
                return array(
                    'status' => 'failed',
                    'message' => 'Incorrect Otp',
                );
            }

        }
    }

    public function resetPassword(Request $request){
        if($request->mobile!=null){
            if($request->password==$request->confirm_password){
                // $update_password =
                UserLogin::where('username', $request->mobile)
                ->update([
                    'password' => $request->password,
                ]);
                $result = array(
                    'message' => 'Password Updated Successfully',
                    'status' => '200'
                );
                return $result;
            }else{
                $result = array(
                    'message' => 'Password and confirm password are not same',
                    'status' => '300'
                );
                return $result;
            }
        }

        if($request->email!=null){
            if($request->password==$request->confirm_password){
                // $update_password =
                UserLogin::where('email', $request->email)
                ->update([
                    'password' => $request->password,
                ]);
                $result = array(
                    'message' => 'Password Updated Successfully',
                    'status' => '200'
                );
                return $result;
            }else{
                $result = array(
                    'message' => 'Password and confirm password are not same',
                    'status' => '300'
                );
                return $result;
            }
        }
    }

    public function customerLoginWithOtp(){
        return view('frontend.auth.customer_login_with_otp');
    }

    public function engineerLoginWithOtp(){
        return view('frontend.auth.engineer_login_with_otp');
    }

    public function getCustomerLoginOtp(Request $request){
        // dd($request);
        $mobileotp = $request->mobile;
        $mobileotpsend = rand(111111,999999);
        if($request->mobile){
            $check_mobile_exist = User::where('mobile', $request->mobile)->count();
            if($check_mobile_exist>=1){
                session()->put('mobilenumber',$mobileotp);
                session()->put('mobileotp',$mobileotpsend);
                $msg = '# '.$mobileotpsend.' is the verification code to log in to your Smazz Kart account.Thanks, Team Smazz Kart.';
                $phones = $mobileotp;
                $url = "http://45.249.108.134/api.php";
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "username=smazzkart&password=799309&sender=SMZKRT&sendto=".$phones."&message=".$msg."&PEID=1301168077776725528&templateid=1307168105994789755&type=3");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                $response = curl_exec($ch);
                if ($response) {
                    $result = array(
                        'status' => 200,
                        'message' => 'Otp Sent!',
                    );
                    return $result;
                } else{
                    session()->forget(['mobileotp', 'mobilenumber']);
                    $result = array(
                        'status' => 300,
                        'message' => 'Something Went Wrong!',
                    );
                    return $result;
                }
            }else{
                $result = array(
                    'status' => 404,
                    'message' => 'Mobile No. Not Found!',
                );
                return $result;
            }


        }

        if($request->email){
            $check_email_exist = User::where('email', $request->email)->count();
            if($check_email_exist>=1){
                $email_id = $request->email;
                Session()->forget('email_otp');
                Session()->put('emailid',$email_id);
                Session()->put('mobileotp',$mobileotpsend);

                $html_body = view('mail_template.otp_verification', compact('mobileotpsend'));
                if (env('MAIL_USERNAME')!=null) {
                    $array['view'] = 'mail_template.otp_verification';
                    $array['subject'] = 'OTP Received from Engineer Mine';
                    $array['from'] = env('MAIL_FROM_ADDRESS');
                    $array['otp'] = $mobileotpsend;

                    // dd($request->email);

                    try {
                      $mail_send =  Mail::to($request->email)->queue(new CustomerOtpEmailManager($array));
                    } catch (\Exception $e) {

                    }
                }


                $result = array(
                    'status' => 200,
                    'message' => 'Otp Sent!',
                );
                return $result;

            }else{
                $result = array(
                    'status' => 404,
                    'message' => 'Email Not Found!',
                );
                return $result;
            }

        }
    }


    public function getEngineerLoginOtp(Request $request){
        // dd($request);
        $mobileotp = $request->mobile;
        $mobileotpsend = rand(111111,999999);
        if($request->mobile){
            $check_mobile_exist = User::where('mobile', $request->mobile)->where('user_type_id', 4)->count();
            if($check_mobile_exist>=1){
                session()->put('mobilenumber',$mobileotp);
                session()->put('mobileotp',$mobileotpsend);
                $msg = '# '.$mobileotpsend.' is the verification code to log in to your Smazz Kart account.Thanks, Team Smazz Kart.';
                $phones = $mobileotp;
                $url = "http://45.249.108.134/api.php";
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "username=smazzkart&password=799309&sender=SMZKRT&sendto=".$phones."&message=".$msg."&PEID=1301168077776725528&templateid=1307168105994789755&type=3");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                $response = curl_exec($ch);
                if ($response) {
                    $result = array(
                        'status' => 200,
                        'message' => 'Otp Sent!',
                    );
                    return $result;
                } else{
                    session()->forget(['mobileotp', 'mobilenumber']);
                    $result = array(
                        'status' => 300,
                        'message' => 'Something Went Wrong!',
                    );
                    return $result;
                }
            }else{
                $result = array(
                    'status' => 404,
                    'message' => 'Mobile No. Not Found!',
                );
                return $result;
            }


        }

        if($request->email){
            $check_email_exist = User::where('email', $request->email)->where('user_type_id', 4)->count();
            if($check_email_exist>=1){
                $email_id = $request->email;
                Session()->forget('email_otp');
                Session()->put('emailid',$email_id);
                Session()->put('mobileotp',$mobileotpsend);

                $html_body = view('mail_template.otp_verification', compact('mobileotpsend'));
                if (env('MAIL_USERNAME')!=null) {
                    $array['view'] = 'mail_template.otp_verification';
                    $array['subject'] = 'OTP Received from Engineer Mine';
                    $array['from'] = env('MAIL_FROM_ADDRESS');
                    $array['otp'] = $mobileotpsend;

                    // dd($request->email);

                    try {
                      $mail_send =  Mail::to($request->email)->queue(new CustomerOtpEmailManager($array));
                    } catch (\Exception $e) {

                    }
                }


                $result = array(
                    'status' => 200,
                    'message' => 'Otp Sent!',
                );
                return $result;

            }else{
                $result = array(
                    'status' => 404,
                    'message' => 'Email Not Found!',
                );
                return $result;
            }

        }
    }

    /** proceed to login */
    public function proceedToLogin(Request $request){
        // dd($request->all());
        if($request->all()!=null){

            if(Session::get('mobileotp')){

                if($request->mobile_otp==Session::get('mobileotp')){
                    if($request->mobile_number!=null){
                        $user_details =  UserLogin::where('username', $request->mobile_number)->first();
                        $is_loggedin = UserLogin::join('users', 'users.id', '=', 'user_logins.user_id')
                                    ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
                                    ->where('user_logins.username',  $user_details->username)
                                    ->where('user_logins.password', $user_details->password)
                                    ->where('user_logins.status', 1)
                                    ->where('users.is_verified', 1)
                                    ->where('user_logins.user_type_id', 3)
                                    ->select(['users.*', 'user_types.name as userType', 'user_logins.*'])
                                    ->first();
                        // dd($is_loggedin);
                        $request->session()->put('LoggedCustomer', $is_loggedin);

                        return array(
                            'status' => 'success',
                            'message' => 'Otp Verified',
                        );
                    }
                    if($request->email!=null){
                        $user_details =  UserLogin::where('email', $request->email)->first();
                        $is_loggedin = UserLogin::join('users', 'users.id', '=', 'user_logins.user_id')
                                    ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
                                    ->where('user_logins.email',  $user_details->email)
                                    ->where('user_logins.password', $user_details->password)
                                    ->where('user_logins.status', 1)
                                    ->where('users.is_verified', 1)
                                    ->where('user_logins.user_type_id', 3)
                                    ->select(['users.*', 'user_types.name as userType', 'user_logins.*'])
                                    ->first();
                        // dd($is_loggedin);
                        $request->session()->put('LoggedCustomer', $is_loggedin);

                        return array(
                            'status' => 'success',
                            'message' => 'Otp Verified',
                        );
                    }
                }else{
                    return array(
                        'status' => 'failed',
                        'message' => 'Incorrect Otp',
                    );
                }
            }else{
                return array(
                    'status' => 'failed',
                    'message' => 'Incorrect Otp',
                );
            }

        }
    }

    /** proceed to engineer login */
    public function proceedToEngineerLogin(Request $request){
        // dd($request->all());
        if($request->all()!=null){

            if(Session::get('mobileotp')){

                if($request->mobile_otp==Session::get('mobileotp')){
                    if($request->mobile_number!=null){
                        $user_details =  UserLogin::where('username', $request->mobile_number)->first();
                        $is_loggedin = UserLogin::join('users', 'users.id', '=', 'user_logins.user_id')
                                    ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
                                    ->where('user_logins.username',  $user_details->username)
                                    ->where('user_logins.password', $user_details->password)
                                    ->where('user_logins.status', 1)
                                    ->where('users.is_verified', 1)
                                    ->where('user_logins.user_type_id', 4)
                                    ->select(['users.*', 'user_types.name as userType', 'user_logins.*'])
                                    ->first();
                        // dd($is_loggedin);
                        $request->session()->put('LoggedEngineer', $is_loggedin);

                        return array(
                            'status' => 'success',
                            'message' => 'Otp Verified',
                        );
                    }
                    if($request->email!=null){
                        $user_details =  UserLogin::where('email', $request->email)->first();
                        $is_loggedin = UserLogin::join('users', 'users.id', '=', 'user_logins.user_id')
                                    ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
                                    ->where('user_logins.email',  $user_details->email)
                                    ->where('user_logins.password', $user_details->password)
                                    ->where('user_logins.status', 1)
                                    ->where('users.is_verified', 1)
                                    ->where('user_logins.user_type_id', 4)
                                    ->select(['users.*', 'user_types.name as userType', 'user_logins.*'])
                                    ->first();
                        // dd($is_loggedin);
                        $request->session()->put('LoggedEngineer', $is_loggedin);

                        return array(
                            'status' => 'success',
                            'message' => 'Otp Verified',
                        );
                    }
                }else{
                    return array(
                        'status' => 'failed',
                        'message' => 'Incorrect Otp',
                    );
                }
            }else{
                return array(
                    'status' => 'failed',
                    'message' => 'Incorrect Otp',
                );
            }

        }
    }
}
