<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageOrderModification extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'messages',
        'user_id',
        'package_order_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package_order()
    {
        return $this->belongsTo(PackageOrder::class);
    }
}
