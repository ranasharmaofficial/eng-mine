<?php
namespace App\Repositories;
use App\Repositories\Interfaces\ServiceRepositoryInterface;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use App\Models\Service;
use App\Models\SubService;
use App\Models\MasterService;
use App\Models\ServiceSection;
use App\Models\ServiceSectionData;


class ServiceRepository implements ServiceRepositoryInterface
{
    public function getServiceList(){
        return Service::select('id', 'name')->where('status', 1)->get();
    }

    public function getServiceCategoryList(){
        return ServiceCategory::select('id', 'name')->where('status', 1)->get();
    }

    public function getServiceCategory($id){
        return ServiceCategory::findOrFail($id);
    }

    public function getMainServiceList(){
        return Service::select('id', 'name')->where('status', 1)->get();
    }

    public function getServiceSectionList($page_id){
        return ServiceSection::select('id', 'section_name', 'title')->where('page_id', $page_id)->where('status', 1)->get();
    }

    /** CMS Page Repo Function Start */
        public function allServices($request){
            $pages = ServiceCategory::select('*');
            if($request['search']){
                $pages = $pages->where('name','LIKE',"%{$request['search']}%");
            }
            $pages = $pages->latest()->paginate(10);
            return $pages;
        }

        public function storeService($request, $data){
            $service = new ServiceCategory();
            $service->name = $data['name'];
            $service->status = $data['status'];
            // if($data['image']){
            //     $master_product->image = $data['image'];
            // }
            $service->save();
        }

        public function updateServiceCategory($data, $id){
            $service_category = ServiceCategory::where('id', $id)->first();
            $service_category->name = $data['name'];
            $service_category->status = $data['status'];
            $service_category->save();
        }

        public function findServices($id){
            return Service::find($id);
        }

        public function findSubService($id){
            return SubService::find($id);
        }

        public function updateService($data, $id){
            $service_det = Service::where('id', $id)->first();
            $service_det->category_id = $data['category_id'];
            $service_det->subcategory_id = $data['subcategory_id'];
            $service_det->name = $data['name'];
            $service_det->description = $data['description'];
            $service_det->status = $data['status'];
            $service_det->service_pre_requiste = $data['service_pre_requiste'];
            $service_det->service_scope_of_work = $data['service_scope_of_work'];
            $service_det->service_completion_criteria = $data['service_completion_criteria'];
            $service_det->service_inclusion = $data['service_inclusion'];
            $service_det->service_exclusion = $data['service_exclusion'];
            $service_det->service_adons = $data['service_adons'];
            $service_det->save();
        }

        public function deleteService($id){
            $delete_service = MasterService::find($id);
            $section_ids = ServiceSection::where('page_id', $id)->pluck('id');
            if(sizeof($section_ids)>0){
                $delete_section = ServiceSection::whereIn('id', $section_ids)->delete();
            }
            $section_data_ids = ServiceSectionData::where('page_id', $id)->pluck('id');
            if(sizeof($section_data_ids)>0){
                $delete_section_data = ServiceSectionData::whereIn('id', $section_data_ids)->delete();
            }
            $delete_service->delete();
        }
    /** CMS Page Repo Function End */


    public function allServiceSubcategories($request){
            $service_subcategories = ServiceSubCategory::select('service_sub_categories.*', 'cp.name as categoryName')
            ->leftJoin('service_categories as cp', 'cp.id', '=', 'service_sub_categories.category_id');
            if($request['category_id']){
                $service_subcategories = $service_subcategories->where('service_sub_categories.category_id',$request['category_id']);
            }
            if($request['section']){
                $service_subcategories = $service_subcategories->where('service_sub_categories.name','LIKE',"%{$request['name']}%");
            }
            $service_subcategories = $service_subcategories->latest()->paginate(10);
            return $service_subcategories;
    }

    public function storeServiceSubCategory($request, $data){
        $service = new ServiceSubCategory();
        $service->category_id = $data['category_id'];
        $service->name = $data['name'];
        $service->status = $data['status'];
        // if($data['image']){
        //     $master_product->image = $data['image'];
        // }
        $service->save();
    }

    public function findServiceSubCategory($id){
        return ServiceSubCategory::find($id);
    }

    public function findService($id){
        return ServiceSubCategory::find($id);
    }

    public function updateServiceSubCategory($data){
        $service = ServiceSubCategory::find($data['id']);
        $service->category_id = $data['category_id'];
        $service->name = $data['name'];
        $service->status = $data['status'];
        $service->save();
    }

    // public function del($id){
    //     $delete_product = ServiceSubCategory::find($id);
    //     $section_ids = ProductSection::where('page_id', $id)->pluck('id');
    //     if(sizeof($section_ids)>0){
    //         $delete_section = ProductSection::whereIn('id', $section_ids)->delete();
    //     }
    //     $section_data_ids = ProductSectionData::where('page_id', $id)->pluck('id');
    //     if(sizeof($section_data_ids)>0){
    //         $delete_section_data = ProductSectionData::whereIn('id', $section_data_ids)->delete();
    //     }
    //     $delete_product->delete();
    // }


    /** main service */

    public function storeMainService($data){
        $service = new Service();
        $service->name = $data['name'];
        $service->category_id = $data['category_id'];
        $service->subcategory_id = $data['subcategory_id'];
        $service->description = $data['description'];
        $service->service_pre_requiste = $data['service_pre_requiste'];
        $service->service_scope_of_work = $data['service_scope_of_work'];
        $service->service_completion_criteria = $data['service_completion_criteria'];
        $service->service_inclusion = $data['service_inclusion'];
        $service->service_exclusion = $data['service_exclusion'];
        $service->service_adons = $data['service_adons'];
        $service->status = $data['status'];
        $service->save();
    }


    public function allMainServices($request){
        $service_subcategories = Service::select('services.*', 'cp.name as categoryName','csp.name as subcategoryName')
        ->leftJoin('service_categories as cp', 'cp.id', '=', 'services.category_id')
        ->leftJoin('service_sub_categories as csp', 'csp.id', '=', 'services.subcategory_id');
        if($request['category_id']){
            $service_subcategories = $service_subcategories->where('services.category_id',$request['category_id']);
        }

        if($request['name']){
            $service_subcategories = $service_subcategories->where('services.name','LIKE',"%{$request['name']}%");
        }
        $service_subcategories = $service_subcategories->latest()->paginate(10);
        return $service_subcategories;
    }




    public function storeSubService($data){
        $service = new SubService();
        $service->name = $data['name'];
        $service->service_id = $data['service_id'];
        $service->onsite_price = $data['onsite_price'];
        $service->offsite_price = $data['offsite_price'];
        $service->description = $data['name'];
        $service->status = $data['status'];
        $service->save();
    }

    public function updateSubService($data, $id){
        $service = SubService::where('id', $id)->first();
        $service->name = $data['name'];
        $service->service_id = $data['service_id'];
        $service->onsite_price = $data['onsite_price'];
        $service->offsite_price = $data['offsite_price'];
        $service->description = $data['description'];
        $service->status = $data['status'];
        $service->save();
    }

    public function allMainSubServices($request){
        $service_subcategories = SubService::select('sub_services.*', 'cp.name as serviceName')
        ->leftJoin('services as cp', 'cp.id', '=', 'sub_services.service_id');

        // if($request['service_id']){
        //     $service_subcategories = $service_subcategories->where('sub_services.service_id',$request['service_id']);
        // }

        // if($request['service_id']){
        //     $service_subcategories = $service_subcategories->where('sub_services.service_id',$request['service_id']);
        // }

        if($request['service_id']){
            $service_subcategories = $service_subcategories->where('sub_services.service_id',$request['service_id']);
        }

        if($request['name']){
            $service_subcategories = $service_subcategories->where('sub_services.name','LIKE',"%{$request['name']}%");
        }
        $service_subcategories = $service_subcategories->latest()->paginate(30);
        return $service_subcategories;
    }

    /** Page Section Repo Function Start */
        public function allServiceSectionList($request){
            $master_pages = ServiceSection::select('service_sections.*', 'cp.title as page_title')
                ->leftJoin('master_services as cp', 'cp.id', '=', 'service_sections.page_id');
                if($request['page_id']){
                    $master_pages = $master_pages->where('service_sections.page_id',$request['page_id']);
                }
                if($request['section']){
                    $master_pages = $master_pages->where('service_sections.section_name','LIKE',"%{$request['section']}%");
                }
                if($request['search']){
                    $master_pages = $master_pages->where('service_sections.title','LIKE',"%{$request['search']}%");
                }
                $master_pages = $master_pages->latest()->paginate(10);
            return $master_pages;
        }

        public function findServiceSection($id){
            return ServiceSection::find($id);
        }

        public function storeServiceSection($data, $type){
            if($type == "store"){
                $page = new ServiceSection();
            }else{
                $page = ServiceSection::find($data['id']);
            }
            $page->page_id = $data['page_id'];
            $page->section_name = $data['section_name'];
            $page->title = $data['title'];
            $page->description = $data['description'];
            if($data['image']){
                $page->image = $data['image'];
            }

            $page->status = $data['status'];
            $page->created_by = $data['created_by'];
            $page->save();

        }

        public function deleteServiceSection($id){
            $delete_section = ServiceSection::find($id);
            $section_data_ids = ServiceSectionData::where('page_id', $delete_section->page_id)->where('section_id', $id)->pluck('id');
            if(sizeof($section_data_ids)>0){
                $delete_section_data = ServiceSectionData::whereIn('id', $section_data_ids)->delete();
            }
            $delete_section->delete();
        }
    /** Page Section Repo Function End */

    /** Section Data Repo Function Start */
        public function allServiceSectionDataList($request){
            $data = ServiceSectionData::select('service_section_datas.*', 'cp.title as page_title', 'ps.section_name')
                ->leftJoin('master_services as cp', 'cp.id', '=', 'service_section_datas.page_id')
                ->leftJoin('service_sections as ps', 'ps.id', '=', 'service_section_datas.section_id');
                if($request['page_id']){
                    $data = $data->where('service_section_datas.page_id', $request['page_id']);
                }
                if($request['section']){
                    $data = $data->where('service_section_datas.section_id',$request['section']);
                }
                if($request['search']){
                    $data = $data->where('service_section_datas.title','LIKE',"%{$request['search']}%");
                }
                $data = $data->latest()->paginate(10);
            return $data;
        }

        public function findServiceSectionData($id){
            return ServiceSectionData::find($id);
        }

        public function storeServiceSectionData($data, $type){
            if($type == "store"){
                $page = new ServiceSectionData();
                $page->created_by = $data['created_by'];
            }else{
                $page = ServiceSectionData::find($data['id']);
                $page->updated_by = $data['updated_by'];
            }
            $page->page_id = $data['page_id'];
            $page->section_id = $data['section_id'];
            $page->title = $data['title'];
            $page->description = $data['description'];
            if($data['img']){
                $page->img = $data['img'];
            }
            if($data['other']){
                $page->other = $data['other'];
            }
            $page->order_number = $data['order_number'];
            // $page->other = $data['other'];
            $page->status = $data['status'];
            $page->save();

        }

        public function deleteServiceSectionData($id){
            $delete_section_data = ServiceSectionData::find($id);
            $delete_section_data->delete();
        }

        public function deleteServiceSubCategory($id){
            $delete_sub_category = ServiceSubCategory::find($id);
            $service_ids = Service::where('subcategory_id', $id)->pluck('id');
            if(sizeof($service_ids)>0){
                $delete_service = Service::whereIn('id', $service_ids)->delete();
            }

            // $section_data_ids = ProductSectionData::where('page_id', $id)->pluck('id');

            // if(sizeof($section_data_ids)>0){
            //     $delete_section_data = ProductSectionData::whereIn('id', $section_data_ids)->delete();
            // }

            $delete_sub_category->delete();
        }

        public function deleteServices($id){
            $delete_services = Service::find($id);
            $service_ids = SubService::where('service_id', $id)->pluck('id');
            if(sizeof($service_ids)>0){
                $delete_service = SubService::whereIn('id', $service_ids)->delete();
            }
            $delete_services->delete();
        }

        public function subServiceDelete($id){
            $delete_sub_service = SubService::find($id);
            $delete_sub_service->delete();
        }


    /** Section Data Repo Function End */
}
