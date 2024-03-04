<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class BusinessSetting extends Model
{
    protected $fillable = [
        'type',
        'field_name',
        'value'
    ];

    /**
    * Boot the model.
    */
    protected static function boot(){
        parent::boot();
        Paginator::useBootstrap();
    }

}
