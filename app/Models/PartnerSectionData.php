<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnerSectionData extends Model
{
    protected $table = 'partner_section_datas';

    use SoftDeletes;

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
