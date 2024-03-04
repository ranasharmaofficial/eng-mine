<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface;
use JD\Cloudder\Facades\Cloudder;

class UserController extends Controller
{

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  $this->userRepository->allUsers();
        return view('admin.users.index', compact('users'));
    }

    public function changeStatus(Request $request){
        $user = $this->userRepository->setUserStatus($request);
        return response()->json($user);
    }

}