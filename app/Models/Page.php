<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
    ];

    public function getThumbnailUrlAttribute(): string
    {
        return Storage::disk('s3')->url($this->thumbnail);
    }
}
