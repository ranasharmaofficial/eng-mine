<?php

namespace App\Http\Controllers\Admin;
use App\Repositories\UserTypeRepository;
use App\Repositories\Interfaces\UserTypeRepositoryInterface;

use Illuminate\Http\Request;
use App\Models\UserType;

class UserTypeController extends Controller
{
    private $usertypeRepository;

    public function __construct(UserTypeRepositoryInterface $usertypeRepository)
    {
        $this->usertypeRepository = $usertypeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usertypes = $this->usertypeRepository->allUserTypes();
        return view('admin.usertypes.index', compact('usertypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.designation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'created_by' => 'required',
        ]);

        $this->usertypeRepository->storeUserType($data);
        return redirect()->back()->with('message', 'User Type Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function get_usertypes_details(Request $request)
    {
        $data = $request->pid;
        return $this->usertypeRepository->getUserTypeDetails($data);
        //return $details = MasterDesignation::where('id', $request->pid)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_usertypes(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $this->usertypeRepository->updateUserType($request->all());
        return redirect()->back()->with('message', 'Designation Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
