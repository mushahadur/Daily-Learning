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
        Schema::create('explore_service_order_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('explore_service_order_id')->constrained()->onDelete('cascade');
            $table->string('service_id');
            $table->string('title')->nullable();
            $table->string('anchor_text');
            $table->string('landing_page');
            $table->string('topic')->nullable();
            $table->string('post_url')->nullable();
            $table->longText('content')->nullable();
            $table->longText('specialInstruction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explore_service_order_details');
    }
};
