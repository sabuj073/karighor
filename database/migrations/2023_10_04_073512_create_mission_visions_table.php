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
        Schema::create('mission_visions', function (Blueprint $table) {
            $table->id();

            $table->string('mission');
            $table->string('mission_photo');
            $table->string('vision');
            $table->string('vision_photo');
            $table->string('values');
            $table->string('values_photo');


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
        Schema::dropIfExists('mission_visions');
    }
};
