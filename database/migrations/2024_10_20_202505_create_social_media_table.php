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
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('sm_facebook',200)->nullable();
            $table->string('sm_x',200)->nullable();
            $table->string('sm_linkedin',200)->nullable();
            $table->string('sm_youtube',200)->nullable();
            $table->string('sm_pinterest',200)->nullable();
            $table->string('sm_vimeo',200)->nullable();
            $table->string('sm_instagram',200)->nullable();
            $table->string('sm_whatsapp',200)->nullable();
            $table->string('sm_skype',200)->nullable();
            $table->string('sm_flickr',200)->nullable();
            $table->integer('sm_creator')->nullable();
            $table->integer('sm_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media');
    }
};
