<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Staff extends Model
{
    protected $table = 'staffs';
    protected $fillable = [
        'type',
        'name',
        'designation',
        'profile_pic',
        'facebook_id',
        'twitter_id',
        'linkedin_id',
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
