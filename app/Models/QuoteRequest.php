<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'floor_count',
        'contact_time',
        'installation_province',
        'details',
        'status',
    ];

    protected $casts = [
        'floor_count' => 'integer',
    ];

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'รอติดต่อ',
            'contacted' => 'ติดต่อแล้ว',
            'quoted' => 'ส่งใบเสนอราคาแล้ว',
            'completed' => 'ดำเนินการเสร็จสิ้น',
            'cancelled' => 'ยกเลิก',
            default => 'ไม่ทราบสถานะ',
        };
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'contacted' => 'bg-blue-100 text-blue-800',
            'quoted' => 'bg-purple-100 text-purple-800',
            'completed' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
}