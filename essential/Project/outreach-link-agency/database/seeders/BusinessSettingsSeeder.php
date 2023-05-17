<?php

namespace Database\Seeders;

use App\Models\Business_settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business_settings::create([
            'name'              =>'OutreachLink Agency',
            'email'             =>'info@outreachlink.com',
            'contact'           =>'01315-083437',
            'tagline'           =>'Lorem ipsum dolor sit amit',
            'address'           =>'Level 12 (12/C), Tropical Alauddin Tower, Road #02 , Sector #03, Rajlaxmi Uttara, Dhaka- 1230',
            'website_link'      =>'https://www.outrechlink.com/',

            // mail config for google
             'mail_mailer'       => 'smtp',
             'mail_host'         => 'sandbox.smtp.mailtrap.io',
             'mail_port'         => 2525,
             'mail_username'     => '9f38517146aa3b',
             'mail_password'     => 'b4bac5d90f05d7',
             'mail_from_address' => 'info@outreachlink.com',
             'mail_from_name'    => 'OutreachLinkAgency',
             'mail_encryption'   => 'tls',

            // stripe config
            'is_stripe_active'  => '0',
            'stripe_secret'     => '',
            'stripe_key'        => '',
            //paypal
            'is_paypal_active' => '0',
            'paypal_mode' => 'sandbox',
            'paypal_client_id' => '',
            'paypal_client_secret' => '',
            'paypal_currency' => 'USD',
            'paypal_test_mode' => '0',

        ]);
    }
}
