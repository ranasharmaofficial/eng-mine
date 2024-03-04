<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\SolutionRepositoryInterface;
use App\Models\SolutionSection;


class SolutionController extends Controller
{
    private $solutionRepository;
    public function __construct(SolutionRepositoryInterface $solutionRepository){
        $this->solutionRepository = $solutionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $pages =  $this->solutionRepository->allSolutions($request);
        return view('admin.solutions.solution.index', compact('pages', 'request'));
    }

    /**
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories =  $this->solutionRepository->getSolutionList();
        return view('admin.solutions.solution.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->validate([
            'parent_id' => 'required',
            'icon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'banner' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            'title' => 'required|string|max:255',
            'page_url' => 'required',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable',
            'other_icon' => 'nullable',
            'short_description' => 'nullable',

        ]);

        if($request->has('icon')){
            $data['icon'] = upload_asset($request->icon, "cms");
        }else{
            $data['icon'] = NULL;
        }

        if($request->has('banner')){
            $data['banner'] = upload_asset($request->banner, "cms");
        }else{
            $data['banner'] = NULL;
        }

        if($request->has('image')){
            $data['image'] = upload_asset($request->image, "cms");
        }else{
            $data['image'] = NULL;
        }

        $data['created_by'] = session('LoggedUser')->id;
        $this->solutionRepository->storeSolution($request, $data);

        return redirect()->route('admin.solutions.index')->with(session()->flash('alert-success', 'CmsPage Created Successfully'));
    }

    public function generateSlug(){
        $this->slug = SlugService::createSlug(MasterSolution::class, 'slug', $this->title);
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
        $page = $this->solutionRepository->findSolution($id);
        if($page){
            $menus =  $this->solutionRepository->getSolutionList();
            return view('admin.solutions.solution.update', compact('page', 'menus'));
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
            'parent_id' => 'required',
            'title' => 'required|string|max:255',
            'page_url' => 'required',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable',
            'other_icon' => 'nullable',
            'short_description' => 'nullable',

        ]);

        if($request->has('icon')){
            $data['icon'] = upload_asset($request->icon, "cms");
        }else{
            $data['icon'] = NULL;
        }

        if($request->has('banner')){
            $data['banner'] = upload_asset($request->banner, "cms");
        }else{
            $data['banner'] = NULL;
        }

        if($request->has('image')){
            $data['image'] = upload_asset($request->image, "cms");
        }else{
            $data['image'] = NULL;
        }

        $data['updated_by'] = session('LoggedUser')->id;
        $this->solutionRepository->updateSolution($data, $id);
        return redirect()->route('admin.solutions.index')->with(session()->flash('alert-success', 'CmsPage Updated Successfully'));
    }
	
	public function delete($id){
        $this->solutionRepository->deleteSolution($id);
        return redirect()->route('admin.solutions.index')->with(session()->flash('alert-danger', 'Data Deleted Successfully'));
    }

    /** Page Section CRUD Start */
        public function solutionSectionIndex(Request $request){
            $solution_sections =  $this->solutionRepository->allSolutionSectionList($request);
            $cms_pages =  $this->solutionRepository->getSolutionList();
            return view('admin.solutions.solution_section.index', compact('solution_sections', 'cms_pages', 'request'));
        }

        public function solutionSectionCreate(){
            $cms_pages =  $this->solutionRepository->getSolutionList();
            return view('admin.solutions.solution_section.create', compact('cms_pages'));
        }

        public function solutionSectionStore(Request $request){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                // 'section_name' => 'required|unique:solution_sections,section_name',
                'section_name' => 'required',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'status' => 'required',
            ]);

            if($request->has('image')){
                $data['image'] = upload_asset($request->image, "cms");
            }else{
                $data['image'] = NULL;
            }

            $data['created_by'] = session('LoggedUser')->id;
            $checkSectionAdded = SolutionSection::where('page_id', $request->page_id)->where('section_name', $request->section_name)->count();
            if($checkSectionAdded==0){
                $this->solutionRepository->storeSolutionSection($data, 'store');
                return redirect()->route('admin.solution_page_sections.index')->with(session()->flash('alert-success', 'Page Section Created Successfully'));
            }else{
                return redirect()->route('admin.solution_page_sections.index')->with(session()->flash('alert-danger', 'Already Exist!'));
            }


        }

        public function solutionSectionEdit($id){
            $page_section = $this->solutionRepository->findSolutionSection($id);
            if($page_section){
                $cms_pages =  $this->solutionRepository->getSolutionList();
                return view('admin.solutions.solution_section.update', compact('page_section', 'cms_pages'));
            }
        }

        public function solutionSectionUpdate(Request $request, $id){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                'section_name' => 'required',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'status' => 'required',
            ]);

            if($request->has('image')){
                $data['image'] = upload_asset($request->image, "cms");
            }else{
                $data['image'] = NULL;
            }

            $data['id'] = $request->id;
            $data['created_by'] = session('LoggedUser')->id;
            $this->solutionRepository->updateSolutionSection($data, 'update');
            return redirect()->route('admin.solution_page_sections.index')->with(session()->flash('alert-success', 'Page Section Updated Successfully'));
        }
		
		 public function deleteSolutionSection($id){
            $this->solutionRepository->deleteSolutionSection($id);
            return redirect()->route('admin.solution_page_sections.index')->with(session()->flash('alert-danger', 'Deleted Successfully'));
        }
    /** Page Section CRUD End */

    /** Section Data CRUD Start */
        public function solutionsectionDataIndex(Request $request){
            $page_sections =  $this->solutionRepository->allSolutionSectionDataList($request);
            $cms_pages =  $this->solutionRepository->getSolutionList();
            return view('admin.solutions.solution_section_data.index', compact('page_sections', 'cms_pages', 'request'));
        }

        public function solutionfetchSection(Request $request){
            $data['sections'] = $this->solutionRepository->getSolutionSectionList($request->page_id);
            return response()->json($data);
        }

        public function solutionsectionDataCreate(){
            $cms_pages =  $this->solutionRepository->getSolutionList();
            return view('admin.solutions.solution_section_data.create', compact('cms_pages'));
        }

        public function solutionsectionDataStore(Request $request){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                'section_id' => 'required|numeric',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'order_number' => 'required|numeric',
                'other' => 'nullable',
                'status' => 'required|numeric',
            ]);

            if($request->has('img')){
                $data['img'] = upload_asset($request->img, "cms");
            }else{
                $data['img'] = NULL;
            }

            if($request->has('other')){
                $data['other'] = upload_asset($request->other, "cms");
            }else{
                $data['other'] = NULL;
            }

            $data['created_by'] = session('LoggedUser')->id;
            $this->solutionRepository->storeSolutionSectionData($data, 'store');
            return redirect()->route('admin.solution_section_data.index')->with(session()->flash('alert-success', 'Section Data Created Successfully'));
        }

        public function solutionsectionDataEdit($id){
            $section_data = $this->solutionRepository->findSolutionSectionData($id);
            if($section_data){
                $cms_pages =  $this->solutionRepository->getSolutionList();
                $page_sections =  $this->solutionRepository->getSolutionSectionList($section_data->page_id);
                return view('admin.solutions.solution_section_data.update', compact('section_data', 'cms_pages', 'page_sections'));
            }
        }

        public function solutionsectionDataUpdate(Request $request, $id){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                'section_id' => 'required|numeric',
                'title' => 'required_without:description',
                'description' => 'required_without:title',
                'img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'order_number' => 'required|numeric',
                // 'other' => 'nullable',
                'status' => 'required|numeric',
            ]);
            // dd($request->all());
            if($request->has('img')){
                $data['img'] = upload_asset($request->img, "cms");
            }else{
                $data['img'] = NULL;
            }

            if($request->has('other')){
                $data['other'] = upload_asset($request->other, "cms");
            }else{
                $data['other'] = NULL;
            }

            $data['id'] = $request->id;
            $data['updated_by'] = session('LoggedUser')->id;
            $this->solutionRepository->storeSolutionSectionData($data, 'update');
            return redirect()->route('admin.solution_section_data.index')->with(session()->flash('alert-success', 'Page Section Updated Successfully'));
        }
    /** Section Data CRUD End */

       public function deleteSolutionSectionData($id){
            $this->solutionRepository->deleteSolutionSectionData($id);
            return redirect()->route('admin.solution_section_data.index')->with(session()->flash('alert-danger', 'Data Deleted Successfully'));
        }




}
