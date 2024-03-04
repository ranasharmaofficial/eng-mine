<?php
namespace App\Repositories;
use App\Repositories\Interfaces\SolutionRepositoryInterface;
use App\Models\MasterSolution;
use App\Models\SolutionSection;
use App\Models\SolutionSectionData;


class SolutionRepository implements SolutionRepositoryInterface
{
    public function getSolutionList(){
        return MasterSolution::select('id', 'title')->where('status', 1)->get();
    }
    
    public function getSolutionSectionList($page_id){
        return SolutionSection::select('id', 'section_name', 'title')->where('page_id', $page_id)->where('status', 1)->get();
    }

    /** CMS Page Repo Function Start */
        public function allSolutions($request){
            $pages = MasterSolution::select('master_solutions.*');
            if($request['search']){
                $pages = $pages->where('title','LIKE',"%{$request['search']}%");
            }
            $pages = $pages->latest()->paginate(25);
            return $pages;
        }

        public function storeSolution($request, $data){
            $master_product = new MasterSolution();
            $master_product->parent_id = $data['parent_id'];
            $master_product->title = $data['title'];
            $master_product->page_url = $data['page_url'];
            $master_product->status = $data['status'];
            $master_product->meta_title = $data['meta_title'];
            $master_product->meta_tag = $data['meta_tag'];
            $master_product->meta_description = $data['meta_description'];
            $master_product->created_by = $data['created_by'];
            $master_product->other_icon = $data['other_icon'];
            $master_product->short_description = $data['short_description'];
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

        public function findSolution($id){
            return MasterSolution::find($id);
        }

        public function updateSolution($data, $id){
            $page = MasterSolution::where('id', $id)->first();
            $page->parent_id = $data['parent_id'];
            $page->title = $data['title'];
            $page->page_url = $data['page_url'];
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
		
		public function deleteSolution($id){
            $delete_solution = MasterSolution::find($id);
            $section_ids = SolutionSection::where('page_id', $id)->pluck('id');
            if(sizeof($section_ids)>0){
                $delete_section = SolutionSection::whereIn('id', $section_ids)->delete();
            }
            $section_data_ids = SolutionSectionData::where('page_id', $id)->pluck('id');
            if(sizeof($section_data_ids)>0){
                $delete_section_data = SolutionSectionData::whereIn('id', $section_data_ids)->delete();
            }
            $delete_solution->delete();
        }
		
    /** CMS Page Repo Function End */

    /** Page Section Repo Function Start */
        public function allSolutionSectionList($request){
            $master_pages = SolutionSection::select('solution_sections.*', 'cp.title as page_title')
                ->leftJoin('master_solutions as cp', 'cp.id', '=', 'solution_sections.page_id');
                if($request['page_id']){
                    $master_pages = $master_pages->where('solution_sections.page_id',$request['page_id']);
                }
                if($request['section']){
                    $master_pages = $master_pages->where('solution_sections.section_name','LIKE',"%{$request['section']}%");
                }
                if($request['search']){
                    $master_pages = $master_pages->where('solution_sections.title','LIKE',"%{$request['search']}%");
                }
                $master_pages = $master_pages->latest()->paginate(25);
            return $master_pages;
        }

        public function findSolutionSection($id){
            return SolutionSection::find($id);
        }

        public function storeSolutionSection($data, $type){
            if($type == "store"){
                $page = new SolutionSection();
            }elseif($type == "update"){
                $page = SolutionSection::find($data['id']);
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

        public function updateSolutionSection($data, $type){
            $page = SolutionSection::find($data['id']);
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
		
		public function deleteSolutionSection($id){
            $delete_section = SolutionSection::find($id);
            $section_data_ids = SolutionSectionData::where('page_id', $delete_section->page_id)->where('section_id', $id)->pluck('id');
            if(sizeof($section_data_ids)>0){
                $delete_section_data = SolutionSectionData::whereIn('id', $section_data_ids)->delete();
            }
            $delete_section->delete();
        }
    /** Page Section Repo Function End */

    /** Section Data Repo Function Start */
        public function allSolutionSectionDataList($request){
            $data = SolutionSectionData::select('solution_section_datas.*', 'ms.title as page_title', 'ss.section_name')
                ->leftJoin('master_solutions as ms', 'solution_section_datas.page_id', '=', 'ms.id')
                ->leftJoin('solution_sections as ss', 'solution_section_datas.section_id', '=', 'ss.id');
                if($request['page_id']){
                    $data = $data->where('solution_section_datas.page_id', $request['page_id']);
                }
                if($request['section']){
                    $data = $data->where('solution_section_datas.section_id',$request['section']);
                }
                if($request['search']){
                    $data = $data->where('solution_section_datas.title','LIKE',"%{$request['search']}%");
                }
                $data = $data->latest()->paginate(25);
                return $data;
        }

        public function findSolutionSectionData($id){
            return SolutionSectionData::find($id);
        }

        public function storeSolutionSectionData($data, $type){
            if($type == "store"){
                $page = new SolutionSectionData();
                $page->created_by = $data['created_by'];
            }else{
                $page = SolutionSectionData::find($data['id']);
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
		
		public function deleteSolutionSectionData($id){
            $delete_section_data = SolutionSectionData::find($id);
            $delete_section_data->delete();
        }
    /** Section Data Repo Function End */

}
