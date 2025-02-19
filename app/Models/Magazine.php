<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Magazine extends Model
{
    protected $fillable = [
        'year',
        'start_month',
        'end_month',
        'cover_image',
        'article_ids'
    ];

    protected $casts = [
        'article_ids' => 'array'
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
