<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSectionData extends Model
{
    use SoftDeletes;
    protected $table = 'product_section_datas';

    protected $fillable = [
        'section_id',
        'title',
        'section_desc',
        'img',
        'status',
        'created_by',
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
