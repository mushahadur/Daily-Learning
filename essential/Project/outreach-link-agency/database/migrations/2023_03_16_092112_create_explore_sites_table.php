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
        Schema::create('explore_sites', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('site_name');
            $table->string('domain');
            $table->string('domain_url');
            $table->string('example_post_url');
            $table->integer('moz_domain_authority');
            $table->integer('moz_spam_score');
            $table->integer('ahref_domain_rating');
            $table->integer('ahref_organic_traffic');
            $table->integer('max_no_of_hyperlink');
            $table->foreignUuid('explore_publication_type_id')->constrained();
            $table->longText('about');
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explore_sites');
    }
};
