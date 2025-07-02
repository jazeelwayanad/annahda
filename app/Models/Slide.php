<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Slide extends Model
{
    protected $fillable = [
        'type',
        'article_id',
        'link',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function getImageUrlAttribute(): string
    {
        return Storage::disk('s3')->url($this->image); // assuming 'image' is the column name
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
