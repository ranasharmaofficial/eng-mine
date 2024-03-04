<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CareerRepositoryInterface;

class CareerController extends Controller
{
    private $careerPageRepository;
    public function __construct(CareerRepositoryInterface $careerPageRepository){
        $this->careerPageRepository = $careerPageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $careers =  $this->careerPageRepository->allCareers();
        return view('admin.careers.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required',
            'specialization' => 'required',
            'job_type' => 'required',
            'reference_number' => 'required',
            'contact_person' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'order_number' => 'required',
        ]);
        
        $this->careerPageRepository->storeCareer($request, $data);

        return redirect()->route('admin.careers.index')->with(session()->flash('alert-success', 'Career Created Successfully'));
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
        $career = $this->careerPageRepository->findCareer($id);
        if($career){
            return view('admin.careers.update', compact('career'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){ 
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required',
            'specialization' => 'required',
            'job_type' => 'required',
            'reference_number' => 'required',
            'contact_person' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'order_number' => 'required',
        ]);
        
        $this->careerPageRepository->updateCareer($data, $id);
        return redirect()->route('admin.careers.index')->with(session()->flash('alert-success', 'Career Updated Successfully'));
    }

  

   

}