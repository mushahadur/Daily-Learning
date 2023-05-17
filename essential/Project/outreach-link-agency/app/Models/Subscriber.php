<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'plan_id',
        'active_until',
        'country_id',
        'payment_gateway',
        'subscription_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscribe_plan()
    {
        return $this->belongsTo(SubscribePlan::class, 'plan_id');
    }
}
