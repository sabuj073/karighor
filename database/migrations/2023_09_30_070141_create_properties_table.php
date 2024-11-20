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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('requirement_type_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('banner_image')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('description')->nullable();




            $table->string('thumb_image')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('land_area')->nullable();
            $table->string('property_orientation')->nullable();
            $table->string('road_width')->nullable();
            $table->string('design_consultant')->nullable();
            $table->string('building_height')->nullable();
            $table->string('no_of_unit')->nullable();
            $table->string('no_of_parking')->nullable();
            $table->string('launch_date')->nullable();
            $table->string('video')->nullable();
            $table->string('gallery_image')->nullable();

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
        Schema::dropIfExists('properties');
    }
};