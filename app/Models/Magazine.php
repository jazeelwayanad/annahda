<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $fillable = [
        'year',
        'start_month',
        'end_month',
        'cover_image',
        'article_ids'
    ];
}
