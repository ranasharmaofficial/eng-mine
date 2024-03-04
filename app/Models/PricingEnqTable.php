<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingEnqTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'skype',
        'pricing_id',
        'message',
    ];
}
