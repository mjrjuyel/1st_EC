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
        Schema::create('smtps', function (Blueprint $table) {
            $table->id();
            $table->string('mailer',40)->nullable();
            $table->string('host',100)->nullable();
            $table->string('port',10)->nullable();
            $table->string('username',50)->nullable();
            $table->string('password',50)->nullable();
            $table->string('encription',20)->nullable();
            $table->string('from_email',40)->nullable();
            $table->integer('editor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smtps');
    }
};
