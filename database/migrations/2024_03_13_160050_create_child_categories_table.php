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
        Schema::create('child_categories', function (Blueprint $table) {
            $table->id();
            $table->string('child_cat_title',50);
            $table->string('child_cat_slug',25);
            $table->foreignId('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('subcat_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->integer('child_cat_creator');
            $table->integer('child_cat_editor')->nullable();
            $table->integer('child_cat_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_categories');
    }
};
