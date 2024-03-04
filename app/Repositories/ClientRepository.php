<?php
namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Interfaces\ClientRepositoryInterface;


class ClientRepository implements ClientRepositoryInterface
{

    public function allClients($request){
     $data = Client::latest();
        if($request['search']){
            $data = $data->where('client_name', $request['search']);
        }
        $data = $data->paginate(20);
        return $data;

    }

    public function storeClient($request, $data){
        $client = new Client();
        $client->company_name = $data['company_name'];
        $client->user_name = $data['username'];
        $client->email = $data['email'];
        $client->phone_number = $data['phone_number'];
        $client->mobile_number = $data['mobile_number'];
        $client->gst_number = $data['gst_number'];
        $client->address = $data['address'];
        $client->country = $data['country'];
        $client->state = $data['state'];
        $client->city = $data['city'];
        $client->zipno = $data['zipno'];
        $client->alternate_phone_number = $data['alternate_phone_number'];
        $client->discount_applicable = $data['discount_applicable'];
        $client->discount_percentage = $data['discount_percentage'];
        $client->status = $data['status'];
        if($data['logo']){
            $client->logo = $data['logo'];
        }else{
            $client->logo = NULL;
        }
        $client->save();
    }

    public function findClients($id){
        return Client::find($id);
    }

    public function updateClients($data, $id){
        $client = Client::where('id', $id)->first();
        $client->company_name = $data['company_name'];
        $client->user_name = $data['username'];
        $client->email = $data['email'];
        $client->phone_number = $data['phone_number'];
        $client->mobile_number = $data['mobile_number'];
        $client->gst_number = $data['gst_number'];
        $client->address = $data['address'];
        $client->country = $data['country'];
        $client->state = $data['state'];
        $client->city = $data['city'];
        $client->zipno = $data['zipno'];
        $client->alternate_phone_number = $data['alternate_phone_number'];
        $client->discount_applicable = $data['discount_applicable'];
        $client->discount_percentage = $data['discount_percentage'];
        $client->status = $data['status'];
        if($data['logo']){
            $client->logo = $data['logo'];
        }else{
            $client->logo = NULL;
        }
        $client->save();
    }

    public function deleteClients($id){
        $delete_clients = Client::find($id);
        $delete_clients->delete();
    }
}
