<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubFilter extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'category_name',
        'filter',
        'filter_list',
    ];
}
