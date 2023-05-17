<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['name', 'price', 'initial_quantity', 'increment_decrement_quantity', 'description', 'is_active'];

    public function package_order()
    {
        return $this->hasMany(PackageOrder::class);
    }
}
