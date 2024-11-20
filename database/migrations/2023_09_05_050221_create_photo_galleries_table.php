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
        Schema::create('photo_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('thumb_photo')->nullable();
            $table->string('thumb_alt_text')->nullable();
            $table->string('title')->nullable();
            $table->string('slug');
            $table->string('photo')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('photo_title')->nullable();
            $table->string('parent_id')->nullable();
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
        Schema::dropIfExists('photo_galleries');
    }
};
