<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageOrder extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'reference_id',
        'package_id',
        'user_id',
        'total_price',
        'quantity',
        'txn',
        'status',
        'payment_method',
        'payment_status',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package_order_details()
    {
        return $this->hasMany(PackageOrderDetails::class);
    }

    public function packageOrderModification()
    {
        return $this->hasMany(PackageOrderModification::class);
    }
}
