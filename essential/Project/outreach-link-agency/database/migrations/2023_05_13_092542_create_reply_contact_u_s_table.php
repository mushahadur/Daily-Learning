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
        Schema::create('reply_contact_u_s', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('message_id')->references('id')->on('contact_us')->constrained()->onDelete('cascade');
            $table->string('user_id');
            $table->longText('reply');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reply_contact_u_s');

    }
};
