<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('thumbnail')->nullable();
            $table->longText('photo')->nullable();
            $table->string('short_description')->nullable();
            $table->string('description')->nullable();
            $table->json('booking_info')->nullable();
            $table->longText('m_photo')->nullable();
            $table->longText('m_title')->nullable();
            $table->longText('m_keyword')->nullable();
            $table->longText('m_description')->nullable();
            $table->string('status')->default('publish');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_bookings');
    }
};
