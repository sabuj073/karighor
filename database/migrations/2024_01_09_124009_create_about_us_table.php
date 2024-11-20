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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();

            $table->longText('banner_photo')->nullable();
            
            $table->string('description')->nullable();
            $table->string('photo')->nullable();
            $table->string('chairman_photo')->nullable();
            $table->string('alt_text')->nullable();
            $table->longText('chairman_message')->nullable();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('twitter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};