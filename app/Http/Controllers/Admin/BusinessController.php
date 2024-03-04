<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\BusinessRepositoryInterface;

class BusinessController extends Controller
{
    private $businessRepository;
    public function __construct(BusinessRepositoryInterface $businessRepository)
    {
        $this->businessRepository = $businessRepository;
    }

    public function socialMedia(){
        $social_meadia_values = $this->businessRepository->getBusinessSetupList('social_media');
        return view('admin.business_setting.social_media', compact('social_meadia_values'));
    }

    public function websiteHeader(){
        $datas = $this->businessRepository->getBusinessSetupList('header_setup');
        return view('admin.business_setting.header', compact('datas'));
    }

    public function websiteFooter(){
        $widget_one_data = $this->businessRepository->getBusinessSetupList('footer_widget_one_links');
        $widget_two_data = $this->businessRepository->getBusinessSetupList('footer_widget_two_links');
        $widget_three_data = $this->businessRepository->getBusinessSetupList('footer_widget_three_links');
        return view('admin.business_setting.footer', compact('widget_one_data', 'widget_two_data', 'widget_three_data'));
    }
     
    

    /** Store or Update Business Setting for website setup */
    public function websiteSetupUpdate(Request $request){
        $data = $request->validate([
            'type' => 'required|string|max:50',
            'field_names' => 'required|array',
            'values' => 'array',
        ]);

        if($request->has('header_logo')){
            $data['header_logo'] = upload_asset($request->header_logo, 'logo');
        }else{
            $data['header_logo'] = NULL;
        }

        if($request->has('footer_logo')){
            $data['footer_logo'] = upload_asset($request->footer_logo, 'logo');
        }else{
            $data['footer_logo'] = NULL;
        }

        $this->businessRepository->updateWebsiteData($data);
        return redirect()->back()->with(session()->flash('alert-success', 'Website Setup Updated Successfully'));
    }

    /** Store or Update Business Setting for website Widgets Setup */
    public function websiteSetupUpdateWidget(Request $request){
        $data = $request->validate([
            'widget_type1' => 'required',
            'widget_lable' => 'required',
            'widget_name' => 'required',
            'widget_type2' => 'required',
            'widget_lables' => 'required|array',
            'widget_lables.*' => 'required|string',
            'widget_links' => 'required|array',
            'widget_links.*' => 'required|string',
        ]);

        $this->businessRepository->updateWebsiteWidgetData($data);
        return redirect()->back()->with(session()->flash('alert-success', 'Website Setup Updated Successfully'));
    }

    
    public function officeSetup(){
        return view('admin.business_setting.office_setup');
    }

    public function updateOfficeSetup(Request $request){
        $data = $request->validate([
            'email' => 'required|array',
            'contact' => 'required|array',
            'address' => 'required|array',
            'timing' => 'required|array',
            'office_type' => 'required',
            'address_type' => 'required',
        ]);

        $this->businessRepository->updateOfficeSetuptData($data);
        return redirect()->back()->with(session()->flash('alert-success', 'Office Address Setup Updated Successfully'));
    }
    
}
