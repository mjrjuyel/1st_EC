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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('c_name',20)->nullable();
            $table->string('c_email',50)->nullable();
            $table->text('c_address')->nullable();
            $table->string('c_zipcode',10)->nullable();
            $table->string('c_country',20)->nullable();
            $table->string('c_phone',20)->nullable();
            $table->string('Shipping_charge')->nullable();
            $table->string('tax')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('total')->nullable();
            $table->string('coupon_code',20)->nullable();
            $table->string('coupon_discount')->nullable();
            $table->string('coupon_after_discount')->nullable();
            $table->string('payment_type',20)->nullable();
            $table->string('order_id')->nullable();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('status')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
