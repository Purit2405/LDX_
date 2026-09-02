<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->id();

            // General SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            // Open Graph
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();

            // Search Engine Verification
            $table->text('google_site_verification')->nullable();
            $table->text('bing_site_verification')->nullable();

            // Analytics
            $table->string('google_analytics_id')->nullable();
            $table->string('google_tag_manager_id')->nullable();

            // Advanced SEO
            $table->string('canonical_url')->nullable();
            $table->string('robots')->default('index, follow');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_settings');
    }
};