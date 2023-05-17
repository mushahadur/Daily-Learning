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
        Schema::create('coupon_explore_site', function (Blueprint $table) {
            $table->foreignUuid('explore_site_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('coupon_id')->constrained()->onDelete('cascade');
            $table->string('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_explore_site');
    }
};
