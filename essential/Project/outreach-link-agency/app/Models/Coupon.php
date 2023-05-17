<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Coupon extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'couponId_generate',
        'all_coupon_price',
        'description',
        'discount_type',
        'limit_to_one_use_per_customer',
        'set_expiry_date',
        'expiry_date',
    ];

    public function exploreSites()
    {
        return $this->belongsToMany(ExploreSite::class)->withPivot('price');
    }
}
