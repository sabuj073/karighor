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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('logo')->nullable();
            $table->longText('slider')->nullable();
            $table->string('alt_text')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('title1')->nullable();
            $table->longText('content1')->nullable();
            $table->longText('airline_photo')->nullable();
            $table->string('airline_name')->nullable();
            $table->longText('banner')->nullable();
            $table->string('title2')->nullable();
            $table->longText('content2')->nullable();
            $table->string('photo')->nullable();
            $table->string('title3')->nullable();
            $table->longText('reservation')->nullable();
            $table->string('title4')->nullable();
            $table->string('photo1')->nullable();
            $table->longText('content3')->nullable();
            $table->longText('tags')->nullable();
            $table->string('title5')->nullable();
            $table->longText('content4')->nullable();


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
        Schema::dropIfExists('services');
    }
};
