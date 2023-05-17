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
        Schema::table('explore_service_orders', function (Blueprint $table) {
            $table->foreignUuid('campaign_id')->after('exploresite_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('explore_service_orders', function (Blueprint $table) {
            $table->dropColumn('campaign_id');
        });
    }
};
