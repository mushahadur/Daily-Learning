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
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('tnx_id');
            $table->string('reference_id');
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->char('invoiceable_id', 36);
            $table->string('invoiceable_type');
            $table->string('source');
            $table->string('type');
            $table->integer('price');
            $table->string('status');
            $table->string('payment_method');
            $table->enum('payment_status', ['Not Paid', 'Paid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
