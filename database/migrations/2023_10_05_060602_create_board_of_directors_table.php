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
        Schema::create('board_of_directors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');            
            $table->string('photo');
            $table->string('alt_text')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('whatsapp')->nullable();
            $table->longText('description')->nullable();

            $table->string('meta_photo')->nullable();
            $table->string('m_title')->nullable();
            $table->string('m_keyword')->nullable();
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
        Schema::dropIfExists('board_of_directors');
    }
};