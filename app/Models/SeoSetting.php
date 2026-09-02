<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_keywords',

        'og_title',
        'og_description',
        'og_image',

        'google_site_verification',
        'bing_site_verification',

        'google_analytics_id',
        'google_tag_manager_id',

        'canonical_url',
        'robots',
    ];
}