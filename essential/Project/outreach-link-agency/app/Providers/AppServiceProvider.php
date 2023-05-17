<?php

namespace App\Providers;

use App\Models\Business_settings;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();

        // $businessSettings = Business_settings::first();

        // if ($businessSettings) {
        //     $config = [
        //         'logo' => $businessSettings->logo,
        //         'favicon' => $businessSettings->favicon,
        //         'name' => $businessSettings->name,
        //         'email' => $businessSettings->email,
        //         'contact' => $businessSettings->contact,
        //         'tagline' => $businessSettings->tagline,
        //         'address' => $businessSettings->address,
        //         'office_start' => $businessSettings->office_start,
        //         'office_end' => $businessSettings->office_end,
        //         'website_link' => $businessSettings->website_link,
        //         'facebook' => $businessSettings->facebook,
        //         'linkedin' => $businessSettings->linkedin,
        //         'youtube' => $businessSettings->youtube,
        //         'mail_mailer' => $businessSettings->mail_mailer,
        //         'mail_host' => $businessSettings->mail_host,
        //         'mail_port' => $businessSettings->mail_port,
        //         'mail_username' => $businessSettings->mail_username,
        //         'mail_password' => $businessSettings->mail_password,
        //         'mail_encryption' => $businessSettings->mail_encryption,
        //         'mail_from_address' => $businessSettings->mail_from_address,
        //         'mail_from_name' => $businessSettings->mail_from_name,
        //         'stripe_key' => $businessSettings->stripe_key,
        //         'stripe_secret' => $businessSettings->stripe_secret,
        //         'is_stripe_active' => $businessSettings->is_stripe_active,
        //         'is_paypal_active' => $businessSettings->is_paypal_active,
        //         'paypal_mode' => $businessSettings->paypal_mode,
        //         'paypal_client_id' => $businessSettings->paypal_client_id,
        //         'paypal_test_mode' => $businessSettings->paypal_test_mode,
        //         'paypal_client_secret' => $businessSettings->paypal_client_secret,
        //         'paypal_currency' => $businessSettings->paypal_currency,
        //     ];

        //     config([
        //         'global' => $config
        //     ]);
        // }

        if (Schema::hasTable('business_settings')) {
            $baseSetting = DB::table('business_settings')->first();
            // dd($baseSetting);
            if ($baseSetting) //checking if table is not empty
            {
                $config = array(
                    // config for smtp mail
                    'driver'                 => optional($baseSetting)->mail_mailer,
                    'host'                      => optional($baseSetting)->mail_host,
                    'port'                      => optional($baseSetting)->mail_port,
                    'encryption'                => optional($baseSetting)->mail_encryption,
                    'username'                  => optional($baseSetting)->mail_username,
                    'password'                  => optional($baseSetting)->mail_password,
                    'from' => [
                        'address' => optional($baseSetting)->mail_from_address,
                        'name' => optional($baseSetting)->mail_from_name,
                    ],
                );

                Config::set('mail', $config);

                config([
                    // config for stripe
                    'app.stripe_key' => optional($baseSetting)->stripe_key,
                    'app.stripe_secret' => optional($baseSetting)->stripe_secret,
                    'app.is_stripe_active' => optional($baseSetting)->is_stripe_active,
                    // config for paypal
                    'app.paypal_mode' => optional($baseSetting)->paypal_mode,
                    'app.paypal_client_id' => optional($baseSetting)->paypal_client_id,
                    'app.paypal_client_secret' => optional($baseSetting)->paypal_client_secret,
                    'app.paypal_currency' => optional($baseSetting)->paypal_currency,
                    'app.is_paypal_active' => optional($baseSetting)->is_paypal_active,
                    'app.paypal_test_mode' => optional($baseSetting)->paypal_test_mode,
                    // config for general information
                    'app.logo' => optional($baseSetting)->logo,
                    'app.favicon' => optional($baseSetting)->favicon,
                ]);

                // dd(config('app.favicon'));
            }
        }
    }
}
