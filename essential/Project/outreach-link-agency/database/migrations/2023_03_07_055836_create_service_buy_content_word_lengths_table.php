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
        Schema::create('service_buy_content_word_lengths', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('length');
            $table->decimal('price', 9, 2);
            $table->foreignUuid('service_buy_content_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_buy_content_word_lengths');
    }
};
