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
        Schema::create('explore_country_explore_site', function (Blueprint $table) {
            $table->foreignUuid('explore_site_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('explore_country_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explore_country_explore_site');
    }
};
