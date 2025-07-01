<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

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

    public function getCoverImageUrlAttribute(): string
    {
        return Storage::disk('s3')->url($this->cover_image);
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
