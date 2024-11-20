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
        Schema::table('metas', function (Blueprint $table) {
            $table->renameColumn('title', 'm_title');
            $table->renameColumn('description', 'm_description');
            $table->renameColumn('keyword', 'm_keyword');
            $table->renameColumn('meta_photo', 'm_photo');
            $table->integer('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('metas', function (Blueprint $table) {
            $table->renameColumn('title', 'm_title');
            $table->renameColumn('description', 'm_description');
            $table->renameColumn('keyword', 'm_keyword');
            $table->renameColumn('meta_photo', 'm_photo');
            $table->dropColumn('status');
        });
    }
};
