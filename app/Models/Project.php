<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'client',
        'location',
        'short_description',
        'content',
        'project_date',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'project_date' => 'date',
            'is_active' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            ProjectCategory::class,
            'category_id'
        );
    }

    public function images(): HasMany
    {
        return $this->hasMany(
            ProjectImage::class,
            'project_id'
        );
    }
}
