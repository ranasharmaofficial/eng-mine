<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\UserLogin;
use App\Repositories\Interfaces\LoginRepositoryInterface;

class LoginController extends Controller
{

    private $loginRepository;

    public function __construct(LoginRepositoryInterface $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }
    public function login()
    {
        return view('admin.auth.login');
    }
    public function adminAuthLogin(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        $adminInfo =  $this->loginRepository->adminAuthLogin($data);

        if (!$adminInfo) {
            return response()->json([
                "status" => false,

            ]);
        } else  {
            $request->session()->put('LoggedUser', $adminInfo);
            return response()->json([
                "status" => true,
             ]);
            }

        // if (!$adminInfo) {
        //     return redirect()->route('admin.auth.login')->with(session()->flash('alert-danger', 'Failed! We do not recognize your username or password.'));
        // } else  {
        //     $request->session()->put('LoggedUser', $adminInfo);
        //     return redirect('admin/dashboard')->with(session()->flash('alert-success', 'Successfully Loggedin'));
        // }
    }



}
