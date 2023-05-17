<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageOrderDetails extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'package_order_id',
        'topic',
        'anchor_text',
        'landing_page',
        'instruction',
    ];

    public function package_order()
    {
        return $this->belongsTo(PackageOrder::class);
    }
}
