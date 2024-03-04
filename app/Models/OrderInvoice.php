<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderInvoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'status',
        'payment_mode',
        'order_id',
        'invoice_date',
        'created_by',
        'payment_status',
        'transaction_no',
        'utr_no',
        'created_at',
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
