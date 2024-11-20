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
        Schema::create('packages_details', function (Blueprint $table) {
            $table->id();
            $table->string('package_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('brad_title')->nullable();
            $table->string('brad_subtitle')->nullable();
            $table->string('brad_photo')->nullable();
            $table->string('photo')->nullable();
            $table->string('alt_text')->nullable();
            $table->longText('h_makkah')->nullable();
            $table->longText('h_madinah')->nullable();
            $table->string('c_review')->nullable();
            $table->longText('description')->nullable();
            $table->string('duration')->nullable();
            $table->string('package_type')->nullable();
            $table->string('airline')->nullable();
            $table->string('makkah')->nullable();
            $table->string('madinah')->nullable();
            $table->string('price')->nullable();
            $table->longText('up_flight')->nullable();
            $table->longText('sh_flight')->nullable();


            $table->string('m_photo')->nullable();
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
        Schema::dropIfExists('packages_details');
    }
};