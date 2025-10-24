<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Popup extends Model
{
    protected $fillable = [
        'image',
        'redirect_url',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function getImageUrlAttribute(): string
    {
        return Storage::disk('imagekit')->url($this->image);
    }
}
