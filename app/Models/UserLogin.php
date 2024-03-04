<?php



namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'username',
        'password',
        'status',
        'user_type_id',
        'email'

    ];

}

