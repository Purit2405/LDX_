<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();

            // ข้อมูลลูกค้า
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone');

            // ข้อมูลโครงการ
            $table->unsignedInteger('floor_count')->nullable();
            $table->string('contact_time')->nullable();
            $table->string('installation_province')->nullable();

            // รายละเอียดเพิ่มเติม
            $table->longText('details');

            // สถานะ
            $table->enum('status', [
                'pending',
                'contacted',
                'quoted',
                'completed',
                'cancelled',
            ])->default('pending');

            $table->timestamps();

            $table->index('status');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};