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
        Schema::create('explore_service_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('reference_id');
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->uuid('exploresite_id');
            $table->uuid('coupon_id')->nullable();
            $table->uuid('service_buy_content_word_length_id')->nullable();
            $table->string('status')->default('Draft');
            $table->string('txn')->nullable();
            $table->string('discount')->nullable();
            $table->string('total_price');
            $table->string('total_discount')->nullable();
            $table->string('grand_total');
            $table->string('payment_method')->nullable();
            $table->enum('payment_status', ['Not Paid', 'Paid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explore_service_orders');
    }
};
