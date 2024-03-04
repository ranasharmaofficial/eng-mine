<?php
namespace App\Repositories;
use App\Repositories\Interfaces\PartnerRepositoryInterface;
use App\Models\MasterPartner;
use App\Models\PartnerSection;
use App\Models\PartnerSectionData;


class PartnerRepository implements PartnerRepositoryInterface
{
    public function getPartnerList(){
        return MasterPartner::select('id', 'title')->where('status', 1)->get();
    }

    public function getPartnerSectionList($page_id){
        return PartnerSection::select('id', 'section_name', 'title')->where('page_id', $page_id)->where('status', 1)->get();
    }

    /** CMS Page Repo Function Start */
        public function allPartners($request){
            $pages = MasterPartner::select('master_partners.*');
            if($request['search']){
                $pages = $pages->where('title','LIKE',"%{$request['search']}%");
            }
            $pages = $pages->latest()->paginate(25);
            return $pages;
        }

        public function storePartner($request, $data){
            $master_product = new MasterPartner();
            $master_product->parent_id = $data['parent_id'];
            $master_product->title = $data['title'];
            // $master_product->page_url = $data['page_url'];
            $master_product->status = $data['status'];
            $master_product->meta_title = $data['meta_title'];
            $master_product->meta_tag = $data['meta_tag'];
            $master_product->meta_description = $data['meta_description'];
            $master_product->created_by = $data['created_by'];
            $master_product->other_icon = $data['other_icon'];
            $master_product->short_description = $data['short_description'];
            // $master_product->table_fields = json_encode($data['table_fields']);

            if($data['icon']){
                $master_product->icon = $data['icon'];
            }

            if($data['banner']){
                $master_product->banner = $data['banner'];
            }

            if($data['image']){
                $master_product->image = $data['image'];
            }

            $master_product->save();
        }

        public function findPartner($id){
            return MasterPartner::find($id);
        }

        public function updatePartner($data, $id){
            $page = MasterPartner::where('id', $id)->first();
            $page->parent_id = $data['parent_id'];
            $page->title = $data['title'];
            // $page->page_url = $data['page_url'];
            $page->status = $data['status'];
            $page->meta_title = $data['meta_title'];
            $page->meta_tag = $data['meta_tag'];
            $page->meta_description = $data['meta_description'];
            $page->updated_by = $data['updated_by'];
            $page->other_icon = $data['other_icon'];
            $page->short_description = $data['short_description'];
            // $page->table_fields = json_encode($data['table_fields']);
            if($data['icon']){
                $page->icon = $data['icon'];
            }

            if($data['banner']){
                $page->banner = $data['banner'];
            }
            if($data['image']){
                $page->image = $data['image'];
            }
            $page->save();
        }

        public function deletePartner($id){
            $delete_partner = MasterPartner::find($id);
            $section_ids = PartnerSection::where('page_id', $id)->pluck('id');
            if(sizeof($section_ids)>0){
                $delete_section = PartnerSection::whereIn('id', $section_ids)->delete();
            }
            $section_data_ids = PartnerSectionData::where('page_id', $id)->pluck('id');
            if(sizeof($section_data_ids)>0){
                $delete_section_data = PartnerSectionData::whereIn('id', $section_data_ids)->delete();
            }
            $delete_partner->delete();
        }
    /** CMS Page Repo Function End */

    /** Page Section Repo Function Start */
        public function allPartnerSectionList($request){
            $master_pages = PartnerSection::select('partner_sections.*', 'cp.title as page_title')
                ->leftJoin('master_partners as cp', 'cp.id', '=', 'partner_sections.page_id');
                if($request['page_id']){
                    $master_pages = $master_pages->where('partner_sections.page_id',$request['page_id']);
                }
                if($request['section']){
                    $master_pages = $master_pages->where('partner_sections.section_name','LIKE',"%{$request['section']}%");
                }
                if($request['search']){
                    $master_pages = $master_pages->where('partner_sections.title','LIKE',"%{$request['search']}%");
                }
                $master_pages = $master_pages->latest()->paginate(25);
            return $master_pages;
        }

        public function findPartnerSection($id){
            return PartnerSection::find($id);
        }

        public function storePartnerSection($data, $type){
            if($type == "store"){
                $page = new PartnerSection();
            }elseif($type == "update"){
                $page = PartnerSection::find($data['id']);
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

        public function updatePartnerSection($data, $type){
            $page = PartnerSection::find($data['id']);
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

        public function deletePartnerSection($id){
            $delete_section = PartnerSection::find($id);
            $section_data_ids = PartnerSectionData::where('page_id', $delete_section->page_id)->where('section_id', $id)->pluck('id');
            if(sizeof($section_data_ids)>0){
                $delete_section_data = PartnerSectionData::whereIn('id', $section_data_ids)->delete();
            }
            $delete_section->delete();
        }

    /** Page Section Repo Function End */

    /** Section Data Repo Function Start */
        public function allPartnerSectionDataList($request){
            $data = PartnerSectionData::select('partner_section_datas.*', 'cp.title as page_title', 'ps.section_name')
                ->leftJoin('master_partners as cp', 'cp.id', '=', 'partner_section_datas.page_id')
                ->leftJoin('partner_sections as ps', 'ps.id', '=', 'partner_section_datas.section_id');
                if($request['page_id']){
                    $data = $data->where('partner_section_datas.page_id', $request['page_id']);
                }
                if($request['section']){
                    $data = $data->where('partner_section_datas.section_id',$request['section']);
                }
                if($request['search']){
                    $data = $data->where('partner_section_datas.title','LIKE',"%{$request['search']}%");
                }
                $data = $data->latest()->paginate(25);
                return $data;
        }

        public function findPartnerSectionData($id){
            return PartnerSectionData::find($id);
        }

        public function storePartnerSectionData($data, $type){
            // dd($data);
            if($type == "store"){
                $page = new PartnerSectionData();
                $page->created_by = $data['created_by'];
            }else{
                $page = PartnerSectionData::find($data['id']);
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

        public function deletePartnerSectionData($id){
            $delete_section_data = PartnerSectionData::find($id);
            $delete_section_data->delete();
        }
    /** Section Data Repo Function End */

}
