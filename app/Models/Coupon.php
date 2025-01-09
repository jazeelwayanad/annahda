<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'title',
        'code',
        'type',
        'discount',
        'start_date',
        'end_date',
        'status',
        'max_usage',
        'total_usage',
    ];
}
