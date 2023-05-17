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
        Schema::create('package_order_modifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->longText('messages');
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('package_order_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_order_modifications');
    }
};
