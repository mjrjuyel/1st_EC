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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('cat_title',20)->nullable()->unique();
            $table->string('cat_slug',20)->nullable();
            $table->string('cat_pic',40)->nullable();
            $table->boolean('cat_terms')->default(0);
            $table->integer('cat_status')->default(1);
            $table->integer('cat_creator')->nullable();
            $table->integer('cat_editor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
