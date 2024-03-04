<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Models\UserLogin;

class AdminController extends Controller
{
    private $adminRepository;
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function adminDashboard()
    {
        $data = $this->adminRepository->dashboardDataCount();
        return view('admin.dashboard.dashboard_view', $data);
    }

    public function resetPassword()
    {
        $data = $this->adminRepository->dashboardDataCount();
        return view('admin.dashboard.reset_password', compact('data'));
    }
    // UserLogin
    public function updateAdminPassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        $user_details = UserLogin::findOrFail(1);
        // dd($user_details);
         #Match The Old Password
        if($request->old_password==$user_details->password){
            UserLogin::where('id', 1)->update([
                'password' => $request->new_password,
            ]);
            return back()->with(session()->flash('alert-success', 'Updated Successfully'));
        }else{
            return back()->with(session()->flash('alert-danger', 'Wrong Old Password'));
        }

    }

}
