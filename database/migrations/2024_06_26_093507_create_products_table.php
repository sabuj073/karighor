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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('price')->nullable();
            $table->string('sku')->nullable();
            $table->json('specification')->nullable();
            $table->longText('description')->nullable();
            $table->text('feature')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('photo')->nullable();
            $table->string('pdf')->nullable();
            $table->string('m_photo')->nullable();
            $table->string('m_title')->nullable();
            $table->string('m_keyword')->nullable();
            $table->string('m_description')->nullable();
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
        Schema::dropIfExists('products');
    }
};
