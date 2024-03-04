<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class IndustryPageSection extends Model
{
    protected $fillable = [
        'page_id',
        'section_name',
        'title',
        'description',
        'image',
        'status',
        'created_by'
    ];

     /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
        Paginator::useBootstrap();
    }

}
