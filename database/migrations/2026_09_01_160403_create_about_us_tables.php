<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | About Us
        |--------------------------------------------------------------------------
        */
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();

            $table->string('company_name')->nullable();
            $table->string('tagline')->nullable();

            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->longText('vision')->nullable();
            $table->longText('mission')->nullable();

            $table->string('hero_image')->nullable();
            $table->string('company_image')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index('is_active');
        });


        /*
        |--------------------------------------------------------------------------
        | Certificates
        |--------------------------------------------------------------------------
        */
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->string('certificate_number')->nullable();

            $table->string('issuer')->nullable();

            $table->date('issued_date')->nullable();

            $table->string('image');

            $table->text('description')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index('is_active');
        });


        /*
        |--------------------------------------------------------------------------
        | Clients
        |--------------------------------------------------------------------------
        */
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->string('logo');

            $table->string('website')->nullable();

            $table->string('industry')->nullable();

            $table->text('description')->nullable();

            $table->boolean('is_active')->default(true);

            $table->integer('sort_order')->default(0);

            $table->timestamps();

            $table->index('is_active');
            $table->index('sort_order');
        });


        /*
        |--------------------------------------------------------------------------
        | Timeline
        |--------------------------------------------------------------------------
        */
        Schema::create('about_timelines', function (Blueprint $table) {
            $table->id();

            $table->string('year');

            $table->string('title');

            $table->text('description')->nullable();

            $table->string('image')->nullable();

            $table->integer('sort_order')->default(0);

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index('is_active');
            $table->index('sort_order');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('about_timelines');

        Schema::dropIfExists('clients');

        Schema::dropIfExists('certificates');

        Schema::dropIfExists('about_us');
    }
};