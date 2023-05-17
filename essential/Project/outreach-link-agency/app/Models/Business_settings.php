<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business_settings extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'favicon',
        'name',
        'email',
        'contact',
        'tagline',
        'address',
        'office_start',
        'office_end',
        'website_link',
        'facebook',
        'linkedin',
        'youtube',
        'mail_mailer',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_encryption',
        'mail_from_address',
        'mail_from_name',
        'stripe_key',
        'stripe_secret',
        'is_stripe_active',
        'is_paypal_active',
        'paypal_mode',
        'paypal_client_id',
        'paypal_test_mode',
        'paypal_client_secret',
        'paypal_currency',
    ];
}
