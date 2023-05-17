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
        Schema::create('package_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('reference_id');
            $table->foreignUuid('package_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->string('total_price');
            $table->string('quantity');
            $table->string('txn')->nullable();
            $table->string('status')->default('Draft');
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
        Schema::dropIfExists('package_orders');
    }
};
