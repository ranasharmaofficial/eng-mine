<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface EngineerRepositoryInterface{
    public function getEngineerList($request);

}
