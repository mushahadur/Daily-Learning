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
        Schema::create('subscribers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignUuid('plan_id')->constrained('subscribe_plans')->onDelete('cascade');
            $table->string('country_id')->nullable();
            $table->dateTime('active_until')->nullable();
            $table->string('payment_gateway')->nullable();
            // $table->string('subscription_id')->nullable();
            $table->string('status')->default(0)->comment('0=FreePlan 1=ActiePlan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
};
