<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class CustomerLead extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'contact',
        'company_name',
        'message'
    ];

    protected static function boot()
    {
        parent::boot();
        Paginator::useBootstrap(); //Used for pagination
    }


}
