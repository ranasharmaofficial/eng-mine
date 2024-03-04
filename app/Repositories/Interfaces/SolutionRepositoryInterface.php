<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface SolutionRepositoryInterface{
    public function getSolutionList();
    public function getSolutionSectionList($page_id);


    /** CMS Page Interface Start */
    public function allSolutions($request);
    public function storeSolution($request, $data);
    public function findSolution($id);
    public function updateSolution($data, $id);
    /** CMS Page Interface End */

    /** Page Section Interface Start */
    public function allSolutionSectionList($request);
    public function findSolutionSection($id);
    public function storeSolutionSection($data, $type);
    /** Page Section Interface End */

    /** Section Data Interface Start */
    public function allSolutionSectionDataList($request);
    public function findSolutionSectionData($id);
    public function storeSolutionSectionData($data, $type);
    /** Section Data Interface End */

}
