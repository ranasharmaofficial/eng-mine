<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\FaqRepositoryInterface;

class FaqController extends Controller
{

    private $faqRepository;

    public function __construct(FaqRepositoryInterface $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $faqs =  $this->faqRepository->allFaqs($request);
        return view('admin.faqs.index', compact('faqs', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required',
            'status' => 'required',
        ]);


        $data['created_by'] = session('LoggedUser')->id;
        $this->faqRepository->storeFaq($request, $data);

        return redirect()->route('admin.faqs.index')->with(session()->flash('alert-success', 'FAQ Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = $this->faqRepository->findFaq($id);
        if($faq){
            return view('admin.faqs.update', compact('faq'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required',
            'status' => 'required',
        ]);
        $data['updated_by'] = session('LoggedUser')->id;
        $this->faqRepository->updateFaq($data, $id);
        return redirect()->route('admin.faqs.index')->with(session()->flash('alert-success', 'FAQ Updated Successfully'));
    }

    public function delete($id){
        $this->faqRepository->destroyFaq($id);
        return redirect()->route('admin.faqs.index')->with(session()->flash('alert-success', 'FAQ Deleted Successfully'));
    }

    /** faq category code start here */
    public function faqCategory(){
        return view('admin.faqs.faq_category_create');
    }

    public function storeFaqCategory(Request $request){
        $data = $request->validate([
            'type' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);
        $this->faqRepository->storeFaqCategory($request, $data);
        return redirect()->back()->with(session()->flash('alert-success', 'Created Successfully'));
    }

    public function faqCategoryList(){
        $faq_category_list =  $this->faqRepository->faq_category_list();
        return view('admin.faqs.faq_category_list', compact('faq_category_list'));
    }

    public function faqCategoryEdit($id){
        $faq_cat = $this->faqRepository->findFaqCategory($id);
        if($faq_cat){
            return view('admin.faqs.faq_category_update', compact('faq_cat'));
        }
    }

    public function FaqCategoryUpdate(Request $request){
        $data = $request->validate([
            'type' => 'required',
            'name' => 'required',
            'status' => 'required',
            'id' => 'required',
        ]);
        $this->faqRepository->updateFaqCategory($data);
        return redirect()->back()->with(session()->flash('alert-success', 'Updated Successfully'));
    }

    public function fetch_faq_category(Request $request){
        // dd($request->all());
        $data['categories'] = $this->faqRepository->getFaqCategoryList($request->faq_type);
        // dd($data['categories']);
        return response()->json($data);
    }



}
