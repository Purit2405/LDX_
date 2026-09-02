<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'short_description',
        'content',
        'is_active',
        'publish_date',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'publish_date' => 'date',
    ];

    /**
     * กำหนดวันที่เผยแพร่อัตโนมัติ
     * หาก Admin ไม่ได้ระบุวันที่
     */
    protected static function booted(): void
    {
        static::creating(function (Service $service) {

            if (!$service->publish_date) {
                $service->publish_date = now()->toDateString();
            }

        });
    }

    /**
     * Service belongs to Category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(
            ServiceCategory::class,
            'category_id'
        );
    }

    /**
     * Service has many Images
     *
     * sort_order ตรงนี้เป็นของ "รูปภาพ"
     * ไม่ใช่ของ Service
     */
    public function images(): HasMany
    {
        return $this->hasMany(
            ServiceImage::class,
            'service_id'
        )->orderBy('sort_order');
    }
}
