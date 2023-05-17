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
        Schema::create('package_order_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('package_order_id')->constrained()->onDelete('cascade');
            $table->string('topic')->nullable();
            $table->string('anchor_text');
            $table->string('landing_page');
            $table->longText('instruction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_order_details');
    }
};
