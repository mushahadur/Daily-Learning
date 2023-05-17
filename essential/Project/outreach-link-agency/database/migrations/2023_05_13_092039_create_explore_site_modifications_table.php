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
        Schema::create('explore_site_modifications', function (Blueprint $table) {

            $table->uuid('id')->primary();
            $table->longText('messages');
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('explore_service_order_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explore_site_modifications');
    }
};
