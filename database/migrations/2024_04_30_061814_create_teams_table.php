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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('about')->nullable();
            $table->string('designation')->nullable();
            $table->string('experience')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website_link')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->text('photo')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('status')->default('publish');

            $table->text('slider')->nullable();
            $table->integer('order_level')->nullable();
            $table->text('meta_photo')->nullable();
            $table->string('m_title')->nullable();
            $table->string('m_keyword')->nullable();
            $table->text('m_description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
