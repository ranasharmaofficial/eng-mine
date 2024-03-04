<?php
namespace App\Repositories;
use App\Repositories\Interfaces\BusinessRepositoryInterface;
use App\Models\BusinessSetting;

class BusinessRepository implements BusinessRepositoryInterface
{
    public function getBusinessSetupList($type){
        return BusinessSetting::select('field_name', 'value')->where('type', $type)->where('status', 1)->get();
    }

    public function updateWebsiteData($data){
        foreach($data['field_names'] as $key => $val){
            // dd($data['field_names'][1]);
            $social_media = BusinessSetting::where('type', $data['type'])->where('field_name', $val)->first();
            if($social_media == null){
                $social_media = new BusinessSetting(); 
                $social_media->type = $data['type'];
                $social_media->field_name = $val;
            }
            $social_media->value = $data['values'][$key];
            $social_media->save();
        }
        
        if($data['header_logo']){
            $header_logo_update = BusinessSetting::where('type', $data['type'])->where('field_name', 'header_logo')->first();
            if($header_logo_update == null){
                $header_logo_update = new BusinessSetting(); 
                $header_logo_update->type = $data['type'];
                $header_logo_update->field_name = 'header_logo';
            }
            $header_logo_update->value = $data['header_logo'];
            $header_logo_update->save();
        }

        if($data['footer_logo']){
            $footer_logo_update = BusinessSetting::where('type', $data['type'])->where('field_name', 'footer_logo')->first();
            if($footer_logo_update == null){
                $footer_logo_update = new BusinessSetting(); 
                $footer_logo_update->type = $data['type'];
                $footer_logo_update->field_name = 'footer_logo';
            }
            $footer_logo_update->value = $data['footer_logo'];
            $footer_logo_update->save();
        }
    }

    public function updateWebsiteWidgetData($data){
        $widget_lable = BusinessSetting::where('type', $data['widget_type1'])->first();
        if($widget_lable == null){
            $widget_lable = new BusinessSetting(); 
            $widget_lable->type = $data['widget_type1'];
            $widget_lable->field_name = $data['widget_lable'];
        }
        $widget_lable->value = $data['widget_name'];
        $widget_lable->save();

        $widget_link = BusinessSetting::where('type', $data['widget_type2'])->first();
        if($widget_link == null){
            $widget_link = new BusinessSetting(); 
            $widget_link->type = $data['widget_type2'];
        }
        $widget_link->field_name = json_encode($data['widget_lables']);
        $widget_link->value = json_encode($data['widget_links']);
        $widget_link->save();
    }

    public function updateOfficeSetuptData($data){
        // dd($data);
        $office_type = BusinessSetting::where('type', $data['office_type'])->first();
        if($office_type == null){
            $office_type = new BusinessSetting(); 
            $office_type->type = $data['office_type'];
        }
        $office_type->field_name = json_encode($data['email']);
        $office_type->value = json_encode($data['contact']);
        $office_type->save();

        $office_address = BusinessSetting::where('type', $data['address_type'])->first();
        if($office_address == null){
            $office_address = new BusinessSetting(); 
            $office_address->type = $data['address_type'];
        }
        $office_address->field_name = json_encode($data['address']);
        $office_address->value = json_encode($data['timing']);
        $office_address->save();
    }

}