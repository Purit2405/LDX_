<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutTimeline extends Model
{
    protected $table = 'about_timelines';

    protected $fillable = [
        'year',
        'title',
        'description',
        'image',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}