<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'temp_user_id',
        'category_id',
        'subcategory_id',
        'service_id',
        'subservice_id',
        'activity_type',
        'model',
        'qty',
        'price',
        'status',
    ];

     /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
        Paginator::useBootstrap();

        // static::created(function ($post) {
        //     $post->slug = $post->createSlug($post->name);
        //     $post->save();
        // });

    }

    // private function createSlug($title)
    // {
    //     if (static::whereSlug($slug = Str::slug($title))->exists()) {
    //         $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');

    //         if (is_numeric($max[-1])) {
    //             return preg_replace_callback('/(\d+)$/', function ($mathces) {
    //                 return $mathces[1] + 1;
    //             }, $max);
    //         }

    //         return "{$slug}-2";
    //     }

    //     return $slug;
    // }

}
