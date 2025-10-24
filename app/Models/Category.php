<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'image',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function getImageUrlAttribute(): string
    {
        return Storage::disk('imagekit')->url($this->image);
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
