<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'thumbnail',
        'status',
        'reviewed',
        'comments',
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'magazine_id',
        'premium',
        'views',
    ];

    protected $casts = [
        'reviewed' => 'boolean',
        'comments' => 'boolean',
        'premium' => 'boolean',
    ];

    public function scopePublished(Builder $query): void
    {
        $query->where('status', '=',  'published');
    }

    public function scopePremium(Builder $query): void
    {
        $query->where('premium', '=',  true);
    }

    public function getThumbnailUrlAttribute(): string
    {
        return Storage::disk('s3')->url($this->thumbnail);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function magazine(): BelongsTo
    {
        return $this->belongsTo(Magazine::class);
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
