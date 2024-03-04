<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface ClientRepositoryInterface{
    public function storeClient($request, $data);
    public function allClients($request);
    public function findClients($id);
    public function updateClients($data, $id);
    public function deleteClients($id);

}
