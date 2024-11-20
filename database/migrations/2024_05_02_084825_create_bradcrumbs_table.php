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
        Schema::create('bradcrumbs', function (Blueprint $table) {
            $table->id();
            $table->string('blog_photo')->nullable();
            $table->string('team_photo')->nullable();
            $table->string('about_photo')->nullable();
            $table->string('career_photo')->nullable();
            $table->string('gallery_photo')->nullable();
            $table->string('video_photo')->nullable();
            $table->string('contact_photo')->nullable();
            $table->string('page')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bradcrumbs');
    }
};
