<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function cover_image(): string
    {
        return env('IMAGEKIT_ENDPOINT') . '/' . $this->cover_image;
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
