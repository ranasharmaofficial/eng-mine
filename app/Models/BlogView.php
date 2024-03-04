<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class BlogView extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'blog_id',
        'ip_address',
        'date',
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
