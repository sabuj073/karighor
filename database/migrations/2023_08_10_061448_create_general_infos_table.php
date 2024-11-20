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
        Schema::create('general_infos', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('email');
            $table->integer('phone');
            $table->string('logo');
            $table->string('favicon_logo');
            $table->string('footer_logo');
            $table->string('bradcrum_photo');
            $table->longText('footer_des')->nullable();
            $table->string('facebook');
            $table->string('instagram');
            $table->string('linkedin');
            $table->string('youtube');
            $table->string('address');
            $table->string('copyright_text');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_infos');
    }
};
