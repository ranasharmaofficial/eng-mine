<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\IndustryRepositoryInterface;
use App\Models\IndustryPageSection;

class IndustryController extends Controller
{
    private $industryRepository;
    public function __construct(IndustryRepositoryInterface $industryRepository){
        $this->industryRepository = $industryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pages =  $this->industryRepository->allCmsPages();
        return view('admin.industry.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories =  $this->industryRepository->getCmsPageList();
        return view('admin.industry.page.create', compact('categories'));
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
            'title' => 'required|string|max:255',
            'page_url' => 'required',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable',
        ]);

        $data['created_by'] = session('LoggedUser')->id;
        $this->industryRepository->storeCmsPage($request, $data);

        return redirect()->route('admin.industry_pages.index')->with(session()->flash('alert-success', 'CmsPage Created Successfully'));
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
        $page = $this->industryRepository->findCmsPage($id);
        if($page){
            $menus =  $this->industryRepository->getCmsPageList();
            return view('admin.industry.page.update', compact('page', 'menus'));
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
        ]);

        $data['updated_by'] = session('LoggedUser')->id;
        $this->industryRepository->updateCmsPage($data, $id);
        return redirect()->route('admin.industry_pages.index')->with(session()->flash('alert-success', 'CmsPage Updated Successfully'));
    }

    /** Page Section CRUD Start */
        public function pageSectionIndex(){
            $page_sections =  $this->industryRepository->allPageSectionList();
            return view('admin.industry.page_section.index', compact('page_sections'));
        }

        public function pageSectionCreate(){
            $cms_pages =  $this->industryRepository->getCmsPageList();
            return view('admin.industry.page_section.create', compact('cms_pages'));
        }

        public function pageSectionStore(Request $request){
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

            $data['created_by'] = session('LoggedUser')->id;

            $checkSectionAdded = IndustryPageSection::where('page_id', $request->page_id)->where('section_name', $request->section_name)->count();
            if($checkSectionAdded==0){
                $this->industryRepository->storePageSection($data, 'store');
                return redirect()->route('admin.industry_page_sections.index')->with(session()->flash('alert-success', 'Page Section Created Successfully'));
            }else{
                return redirect()->route('admin.industry_page_sections.index')->with(session()->flash('alert-danger', 'Already Exist!'));
            }

        }

        public function pageSectionEdit($id){
            $page_section = $this->industryRepository->findPageSection($id);
            if($page_section){
                $cms_pages =  $this->industryRepository->getCmsPageList();
                return view('admin.industry.page_section.update', compact('page_section', 'cms_pages'));
            }
        }

        public function pageSectionUpdate(Request $request, $id){
            $data = $request->validate([
                'page_id' => 'required|numeric',
                'section_name' => 'required|unique:page_sections,section_name,'.$id,
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
            $this->industryRepository->storePageSection($data, 'update');
            return redirect()->route('admin.industry_page_sections.index')->with(session()->flash('alert-success', 'Page Section Updated Successfully'));
        }
    /** Page Section CRUD End */

    /** Section Data CRUD Start */
        public function sectionDataIndex(){
            $page_sections =  $this->industryRepository->allSectionDataList();
            return view('admin.industry.section_data.index', compact('page_sections'));
        }

        public function fetchSection(Request $request){
            $data['sections'] = $this->industryRepository->getPageSectionList($request->page_id);
            return response()->json($data);
        }

        public function sectionDataCreate(){
            $cms_pages =  $this->industryRepository->getCmsPageList();
            return view('admin.industry.section_data.create', compact('cms_pages'));
        }

        public function sectionDataStore(Request $request){
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

            $data['created_by'] = session('LoggedUser')->id;
            $this->industryRepository->storeSectionData($data, 'store');
            return redirect()->route('admin.industry_section_data.index')->with(session()->flash('alert-success', 'Section Data Created Successfully'));
        }

        public function sectionDataEdit($id){
            $section_data = $this->industryRepository->findSectionData($id);
            if($section_data){
                $cms_pages =  $this->industryRepository->getCmsPageList();
                $page_sections =  $this->industryRepository->getPageSectionList($section_data->page_id);
                return view('admin.industry.section_data.update', compact('section_data', 'cms_pages', 'page_sections'));
            }
        }

        public function sectionDataUpdate(Request $request, $id){
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

            $data['id'] = $request->id;
            $data['updated_by'] = session('LoggedUser')->id;
            $this->industryRepository->storeSectionData($data, 'update');
            return redirect()->route('admin.industry_section_data.index')->with(session()->flash('alert-success', 'Page Section Updated Successfully'));
        }
    /** Section Data CRUD End */

}
