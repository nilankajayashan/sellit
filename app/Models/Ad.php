<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $fillable=[
        'ad_id',
        'category_id',
        'user_id',
        'user_type',
        'tittle',
        'description',
        'price',
        'city',
        'town',
        'images',
        'ad_info',
        'status',
        'reject',
        'reject_reason',




    ];
    protected $primaryKey = 'ad_id';
    protected $casts = [
        'ad_info' => 'object'
    ];
}
