<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Interfaces\EngineerRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLogin;
use App\Models\EngineerWorkingHour;
use App\Models\CertifiedEngineer;
use App\Models\ServiceSubCategory;
use App\Models\EngineerSkill;

class EngineerController extends Controller
{
    private $engineerRepository;

    public function __construct(EngineerRepositoryInterface $engineerRepository)
    {
        $this->engineerRepository = $engineerRepository;
    }

    public function index(Request $request){
        $engineerList = $this->engineerRepository->getEngineerList($request);
        return view('admin.engineer-list.index', compact('engineerList', 'request'));
    }

    public function create(){
        $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.engineer-list.create', compact('service_subcategory_list'));
    }

    public function changeStatus(Request $request){
        $user = $this->engineerRepository->setUserStatus($request);
        return response()->json($user);
    }

    public function engineer_details(Request $request){
        $engineer = $this->engineerRepository->getEngineerDetails($request);
        return response()->json($engineer);
    }

    public function updateEmploymentStatus(Request $request){
        $request->validate([
            'employment_block_reason' => 'required',
        ]);
        $updateEmploymentStatus = User::where('id', $request->engId)->first();
        $updateEmploymentStatus->employment_status = $request->emp_employment_status;
        $updateEmploymentStatus->employment_block_reason = $request->reason;
        $updateEmploymentStatus->employment_block_by = Session('LoggedUser')->user_id;
        $updateEmploymentStatus->save();
        if (!$updateEmploymentStatus) {
            // return response()->json([
            //     "status" => false,

            // ]);
            return redirect('admin/engineer-list')->with(session()->flash('alert-success', 'Updation Failed'));
        } else  {
            // return response()->json([
            //     "status" => true,
            //  ]);
            return redirect('admin/engineer-list')->with(session()->flash('alert-success', 'Updated Successfully'));

        }
    }

    public function editEngineer($id){
        $engineer_details = $this->engineerRepository->getEngineerFullDetails($id);
        if($engineer_details){
            $service_subcategory_list = ServiceSubCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
            return view('admin.engineer-list.update', compact('engineer_details', 'service_subcategory_list'));
        }
    }

    public function addWorkingHour($id){
        $engineer_details = $this->engineerRepository->getEngineerFullDetails($id);
        if($engineer_details){
            return view('admin.engineer-list.add_working_hour', compact('engineer_details'));
        }
    }

    public function updateEmployeeDetails(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ]);


		$check_engineer_skill = EngineerSkill::where('user_id',  $request->engineer_id)->count();

        if($check_engineer_skill==0){
            $engineer_skill = new EngineerSkill;
            $engineer_skill->user_id = $request->engineer_id;
            $engineer_skill->primary_skills1  = $request->primary_skills1;
            $engineer_skill->primary_subskills1 = $request->primary_subskills1;
            $engineer_skill->save();
		}else{
            $engineer_skill = EngineerSkill::where('user_id',  $request->engineer_id)->first();
            $engineer_skill->user_id = $request->engineer_id;
            $engineer_skill->primary_skills1  = $request->primary_skills1;
            $engineer_skill->primary_subskills1 = $request->primary_subskills1;
            $engineer_skill->save();
		}

        $updateEmploymentDetails = User::where('id', $request->engineer_id)->first();
        $updateEmploymentDetails->first_name = $request->first_name;
        $updateEmploymentDetails->last_name = $request->last_name;
        $updateEmploymentDetails->mobile = $request->mobile;
        $updateEmploymentDetails->email = $request->email;
        $updateEmploymentDetails->status = $request->emp_status;
        $updateEmploymentDetails->save();




        if (!$updateEmploymentDetails) {
            return response()->json([
                "status" => false,

            ]);
        } else  {
            return response()->json([
                "status" => true,
             ]);

        }
    }

    public function addEmployeeDetails(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ]);

        $us__id = User::where('user_type_id',  4)->orderBy('id', 'desc')->first();

            // $center_code = substr($us__id->username, 3);
            // $inc_id = $center_code+1;
            // $username ='SPE'.$inc_id.'';

            if($us__id){
                $center_code = substr($us__id->username, 3);
                $inc_id = $center_code+1;
                $username ='SPE'.$inc_id.'';
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
        $addEmployee->user_type_id = 4;
        $addEmployee->save();

		$check_engineer_skill = EngineerSkill::where('user_id',  $addEmployee->id)->count();

        if($check_engineer_skill==0){
            $engineer_skill = new EngineerSkill;
            $engineer_skill->user_id = $addEmployee->id;
            $engineer_skill->primary_skills1  = $request->primary_skills1;
            $engineer_skill->primary_subskills1 = $request->primary_subskills1;
            $engineer_skill->save();
		}else{
            $engineer_skill = EngineerSkill::where('user_id',  $addEmployee->id)->first();
            $engineer_skill->user_id = $addEmployee->id;
            $engineer_skill->primary_skills1  = $request->primary_skills1;
            $engineer_skill->primary_subskills1 = $request->primary_subskills1;
            $engineer_skill->save();
		}

        $user_login = UserLogin::create([
            'username' => $request->mobile,
            'email' => $request->_email,
            'password' => $request->password,
            'user_id' => $addEmployee->id,
            'user_type_id' => 4,
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

    public function addEngineerWorkingHour(Request $request){

        $request->validate([
            'working_type' => 'required',
        ]);

        $checkWorkingTypeInserted = EngineerWorkingHour::where('user_id',  $request->engineer_id)->count();

        // dd($checkWorkingTypeInserted);

        if($checkWorkingTypeInserted==0){
            $add_working_hour = new EngineerWorkingHour;
            $add_working_hour->user_id = $request->engineer_id;
            $add_working_hour->working_type = $request->working_type;
            $add_working_hour->start_date = $request->start_date;
            $add_working_hour->start_time = $request->start_time;
            $add_working_hour->end_date = $request->end_date;
            $add_working_hour->end_time = $request->end_time;
            $add_working_hour->save();

            if ($add_working_hour) {
                return response()->json([
                    "status" => true,
                ]);
            } else  {
                return response()->json([
                    "status" => false,

                ]);

            }

        }else{
            $update_working_hour = EngineerWorkingHour::where('user_id', $request->engineer_id)->first();
            $update_working_hour->user_id = $request->engineer_id;
            $update_working_hour->working_type = $request->working_type;
            $update_working_hour->start_date = $request->start_date;
            $update_working_hour->start_time = $request->start_time;
            $update_working_hour->end_date = $request->end_date;
            $update_working_hour->end_time = $request->end_time;
            $update_working_hour->save();

            if ($update_working_hour ) {
                return response()->json([
                    "status" => true,
                ]);
            } else  {
                return response()->json([
                    "status" => false,

                ]);

            }
        }


    }

    public function workingHourList(Request $request){
        $engineerList = $this->engineerRepository->getEngineerWorkingHourList($request);
        // dd($engineerList);
        return view('admin.engineer-list.working_hour_list', compact('engineerList', 'request'));
    }

    public function certifiedEngineer(Request $request){
        $certifiedEngineerList = $this->engineerRepository->getCertifiedEngineer($request);
        return view('admin.engineer-list.certified_engineer', compact('certifiedEngineerList', 'request'));
    }

    public function addCertifiedEngineer(Request $request){
        $engineerList = $this->engineerRepository->getEngineerWorkingHourList($request);
        return view('admin.engineer-list.add_certified_engineer', compact('engineerList', 'request'));
    }

    public function saveCerifiedEngineer(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cr_status' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $img_name5 = 'img_'.time().'.'.$request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('uploads/'), $img_name5);
        $logos = $img_name5;



            $add_certifiedEngineer = new CertifiedEngineer;
            $add_certifiedEngineer->title = $request->title;
            $add_certifiedEngineer->description = $request->description;
            $add_certifiedEngineer->logo = $logos;
            $add_certifiedEngineer->status = $request->cr_status;
            $add_certifiedEngineer->save();

            if ($add_certifiedEngineer) {
                return response()->json([
                    "status" => true,
                ]);
            } else  {
                return response()->json([
                    "status" => false,

                ]);

            }
    }

    public function deleteCertifiedEngineer($id){
        $this->engineerRepository->deleteCertifiedEngineer($id);
        return redirect()->route('admin.certifiedEngineer')->with(session()->flash('alert-danger', 'Deleted Successfully'));
    }

    public function editCertifiedEngineer($id){
        $certified_engineer = $this->engineerRepository->getCertifiedEngineerDetails($id);
        if($certified_engineer){
            return view('admin.engineer-list.edit_certified_engineer', compact('certified_engineer'));
        }
    }

    public function updateCerifiedEngineer(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        if($request->logo!=null){
            $img_name5 = 'img_'.time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads/'), $img_name5);
            $logos = $img_name5;
        }




            $update_certifiedEngineer = CertifiedEngineer::where('id', $request->id)->first();
            $update_certifiedEngineer->title = $request->title;
            $update_certifiedEngineer->description = $request->description;
            if($request->logo!=null){
                 $update_certifiedEngineer->logo = $logos;
            }
            $update_certifiedEngineer->status = $request->status;
            $update_certifiedEngineer->save();

            if ($update_certifiedEngineer) {
                return response()->json([
                    "status" => true,
                ]);
            } else  {
                return response()->json([
                    "status" => false,

                ]);

            }
    }

    public function engineerExport(){
        return view('admin.engineer-list.engineer_export');
    }

    public function engineerWorkingHourExport(){
        return view('admin.engineer-list.engineer_working_hour_export');
    }
    public function staffExport(){
        return view('admin.engineer-list.staff_export');
    }

    public function deleteEngineer(Request $request){
        $delete_engineer = User::find($request->user_id);
            $user_login_ids = UserLogin::where('user_id', $request->user_id)->pluck('id');
            if(sizeof($user_login_ids)>0){
                $delete_userlogins = UserLogin::whereIn('id', $user_login_ids)->delete();
            }
        $delete_engineer->delete();

        if (!$delete_engineer) {
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
