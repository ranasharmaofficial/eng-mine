<?php

namespace App\Http\Controllers\admin;
use App\Repositories\Interfaces\ClientRepositoryInterface;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    private $clientRepository;
    public function __construct(ClientRepositoryInterface $clientRepository){
        $this->clientRepository = $clientRepository;
    }

    public function index(Request $request){
        $clients = $this->clientRepository->allClients($request);
        return view('admin.client.index', compact('clients', 'request'));
    }

    public function create(){
        return view('admin.client.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'company_name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'mobile_number' => 'required',
            'gst_number' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipno' => 'required',
            'alternate_phone_number' => 'required',
            'discount_applicable' => 'required',
            'discount_percentage' => 'required',
            // 'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required'
        ]);

        if($request->has('logo')){
            $data['logo'] = upload_asset($request->logo);
        }else{
            $data['logo'] = NULL;
        }
        $data['created_by'] = session('LoggedUser')->id;
        $this->clientRepository->storeClient($request, $data);
        return redirect()->route('admin.client.index')->with(session()->flash('alert-success', 'client created successfully'));
    }

    public function show(){

    }

    public function edit($id){
        $clients = $this->clientRepository->findClients($id);
        return view('admin.client.update', compact('clients'));
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'company_name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'mobile_number' => 'required',
            'gst_number' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipno' => 'required',
            'alternate_phone_number' => 'required',
            'discount_applicable' => 'required',
            'discount_percentage' => 'required',
            // 'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required'
        ]);

        if($request->has('logo')){
            $data['logo'] = upload_asset($request->logo);
        }else{
            $data['logo'] = NULL;
        }
        $data['updated_by'] = session('LoggedUser')->id;
        $this->clientRepository->updateClients($data, $id);
        return redirect()->route('admin.client.index')->with(session()->flash('alert-success', 'client updated successfully'));
    }

    public function deleteClient($id){
        // dd($id);
        $this->clientRepository->deleteClients($id);
        return redirect()->route('admin.client.index')->with(session()->flash('alert-danger', 'Clients Deleted Successfully'));
    }

    public function saveClient(Request $request){

        $request->validate([
            'client_name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $img_name5 = 'img_'.time().'.'.$request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('uploads/'), $img_name5);
        $logos = $img_name5;



            $add_certifiedEngineer = new Client;
            $add_certifiedEngineer->client_name = $request->client_name;
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

    public function updateClient(Request $request){

        $request->validate([
            'client_name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        if($request->logo!=null){
            $img_name5 = 'img_'.time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads/'), $img_name5);
            $logos = $img_name5;
        }




            $update_client = Client::where('id', $request->id)->first();
            $update_client->client_name = $request->client_name;
            $update_client->description = $request->description;
            if($request->logo!=null){
                 $update_client->logo = $logos;
            }
            $update_client->status = $request->status;
            $update_client->save();

            if ($update_client) {
                return response()->json([
                    "status" => true,
                ]);
            } else  {
                return response()->json([
                    "status" => false,

                ]);

            }
    }

    public function clientExport(){
        return view('admin.client.client_export');
    }


}
