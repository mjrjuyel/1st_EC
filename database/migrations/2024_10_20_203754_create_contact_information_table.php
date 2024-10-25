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
        Schema::create('contact_information', function (Blueprint $table) {
            $table->id();
            $table->string('ci_phone1',20)->nullable();
            $table->string('ci_phone2',20)->nullable();
            $table->string('ci_email1',50)->nullable();
            $table->string('ci_email2',50)->nullable();
            $table->text('ci_add1')->nullable();
            $table->text('ci_add2')->nullable();
            $table->integer('ci_creator')->nullable();
            $table->integer('ci_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_information');
    }
};
