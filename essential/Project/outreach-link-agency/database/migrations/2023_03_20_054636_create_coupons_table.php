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
        Schema::create('coupons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('couponId_generate');
            $table->longText('description')->nullable();
            $table->longText('all_coupon_price')->nullable();
            $table->string('discount_type');
            $table->string('limit_to_one_use_per_customer')->nullable();
            $table->string('set_expiry_date')->nullable();
            $table->string('expiry_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
