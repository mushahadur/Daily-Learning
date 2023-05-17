<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribePlan extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'name',
        'price',
        'description',
        'validity',
        'is_active',
    ];
}
