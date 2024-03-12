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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('subcat_title',30)->nullable();
            $table->string('subcat_slug',25)->nullable();
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->integer('subcat_status')->default(1);
            $table->integer('subcat_creator')->nullable();
            $table->integer('subcat_editor')->nullable();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
