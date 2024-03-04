<?php



namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Repositories\Interfaces\MasterDesignationRepositoryInterface;





class MasterDesignationController extends Controller

{

    private $masterDesignationRepository;



    public function __construct(MasterDesignationRepositoryInterface $masterDesignationRepository)

    {

        $this->masterDesignationRepository = $masterDesignationRepository;

    }



    public function index(){

        $designation =  $this->masterDesignationRepository->alldesignation();

        return view('admin.master-designation.index', compact('designation'));

    }



    public function create(){

        return view('admin.master-designation.create');

    }



    public function store(Request $request){

        $data = $request->validate([

            'designation' => 'required',

            'status' => 'required',

        ]);





        $data['created_by'] = session('LoggedUser')->id;

        $this->masterDesignationRepository->storedesignation($data);



        return redirect()->route('admin.masterdesignation.index')->with(session()->flash('alert-success', 'Designation Created Successfully'));

    }



    public function show($id){

        //

    }



    public function edit($id){

        $designation = $this->masterDesignationRepository->findDesignation($id);

        return view('admin.master-designation.update', compact('designation'));

    }



    public function update(Request $request, $id){

        $data = $request->validate([

            'name' => 'required',
        ]);





        $this->masterDesignationRepository->updatedesignation($data, $id);



        return redirect()->route('admin.masterdesignation.index')->with(session()->flash('alert-success', 'Designation Updated Successfully'));

    }

}

