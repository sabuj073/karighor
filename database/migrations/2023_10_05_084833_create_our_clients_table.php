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
        Schema::create('our_clients', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('alt_text');
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
        Schema::dropIfExists('our_clients');
    }
};
