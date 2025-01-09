<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'code',
        'type',
        'plan_ids',
        'discount',
        'start_date',
        'end_date',
        'status',
        'max_usage',
        'total_usage',
    ];

}
