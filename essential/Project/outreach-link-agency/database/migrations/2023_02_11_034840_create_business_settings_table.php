<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('tagline')->nullable();
            $table->string('address')->nullable();
            $table->time('office_start')->nullable();
            $table->time('office_end')->nullable();
            //social link
            $table->string('website_link')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            // mail settings
            $table->string('mail_mailer')->nullable();
            $table->string('mail_host')->nullable();
            $table->string('mail_port')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_encryption')->nullable();
            $table->string('mail_from_address')->nullable();
            $table->string('mail_from_name')->nullable();
            // payment getway stripe
            $table->string('stripe_key')->nullable();
            $table->string('stripe_secret')->nullable();
            $table->boolean('is_stripe_active')->default(0);
            // payment getway paypal
            $table->boolean('is_paypal_active')->default(0);
            $table->string('paypal_mode')->nullable();
            $table->string('paypal_client_id')->nullable();
            $table->boolean('paypal_test_mode')->default(0);
            $table->string('paypal_client_secret')->nullable();
            $table->string('paypal_currency')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_settings');
    }
};
