<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class HireTeam extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'gender',
        'resume',
        'message',
        'status'
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
