<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'short_description',
        'content',
        'published_at',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            NewsCategory::class,
            'category_id'
        );
    }

    public function images(): HasMany
    {
        return $this->hasMany(
            NewsImage::class,
            'news_id'
        );
    }
}