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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('level')->default(0);
            $table->string('order_level')->default(0);
            $table->string('parent_id')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('m_photo')->nullable();
            $table->string('m_title')->nullable();
            $table->string('m_keyword')->nullable();
            $table->string('m_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('slug');
            $table->dropColumn('level');
            $table->dropColumn('order_level');
            $table->dropColumn('parent_id');
            $table->dropColumn('logo');
            $table->dropColumn('banner');
            $table->dropColumn('m_photo');
            $table->dropColumn('m_title');
            $table->dropColumn('m_keyword');
            $table->dropColumn('m_description');
        });
    }
};
