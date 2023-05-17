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
        Schema::create('explore_site_service', function (Blueprint $table) {
            $table->foreignUuid('explore_site_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('service_id')->constrained()->onDelete('cascade');
            $table->float('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explore_site_service');
    }
};
