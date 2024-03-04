<?php
namespace App\Repositories;
use App\Repositories\Interfaces\CareerRepositoryInterface;
use App\Models\Career;

class CareerRepository implements CareerRepositoryInterface
{
    public function allCareers(){
        $careers = Career::select('*')
            ->latest()->paginate(10);
        return $careers;
    }

    public function storeCareer($request, $data){
        $career = new Career();
        $career->title = $data['title'];
        $career->description = $data['description'];
        $career->location = $data['location'];
        $career->specialization = $data['specialization'];
        $career->job_type = $data['job_type'];
        $career->reference_number = $data['reference_number'];
        $career->contact_person = $data['contact_person'];
        $career->email = $data['email'];
        $career->phone = $data['phone'];
        $career->status = $data['status'];
        $career->order_number = $data['order_number'];
        $career->save();
    }

    public function findCareer($id){
        return Career::find($id);
    }

    public function updateCareer($data, $id){
        $career = Career::where('id', $id)->first();
        $career->title = $data['title'];
        $career->description = $data['description'];
        $career->location = $data['location'];
        $career->specialization = $data['specialization'];
        $career->job_type = $data['job_type'];
        $career->reference_number = $data['reference_number'];
        $career->contact_person = $data['contact_person'];
        $career->email = $data['email'];
        $career->phone = $data['phone'];
        $career->status = $data['status'];
        $career->order_number = $data['order_number'];
        $career->save();
    }
}