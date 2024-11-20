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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('id_address')->nullable();
            $table->integer('package_id')->nullable();
            $table->string('rating');
            $table->string('comment')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('approve')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
