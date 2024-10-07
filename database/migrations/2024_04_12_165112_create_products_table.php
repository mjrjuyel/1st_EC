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
            $table->string('pro_title',50);
            $table->string('pro_code',50);
            $table->string('pro_unit')->nullable();
            $table->string('pro_tags',50)->nullable();
            $table->text('pro_description')->nullable();
            $table->string('pro_video',50)->nullable();
            $table->string('pro_color',50)->nullable();
            $table->string('pro_size',50)->nullable();
            $table->integer('pro_purchase_price')->nullable();
            $table->integer('pro_selling_price')->nullable();
            $table->integer('pro_discount_price')->nullable();
            $table->integer('pro_stock_quantity')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('pro_thumbnail',100)->nullable();
            $table->string('pro_pic2',100)->nullable();
            $table->string('pro_pic3',100)->nullable();
            $table->string('pro_pic4',100)->nullable();
            $table->string('pro_pic5',100)->nullable();
            $table->integer('pro_featured')->nullable();
            $table->integer('pro_slider')->default(0);
            $table->integer('pro_today_deal')->nullable();
            $table->integer('flash_deal_id')->nullable();
            $table->integer('cash_on_delevery')->nullable();
            $table->string('pro_slug',20)->nullable();
            $table->integer('pro_creator')->nullable();
            $table->integer('pro_editor')->nullable();
            $table->integer('pro_status')->nullable();
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreignId('child_cat_id')->references('id')->on('child_categories')->onDelete('cascade');
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
