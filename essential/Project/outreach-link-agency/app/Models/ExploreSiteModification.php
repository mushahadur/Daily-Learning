<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExploreSiteModification extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'messages',
        'user_id',
        'explore_service_order_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function explore_serivce_order()
    {
        return $this->belongsTo(ExploreServiceOrder::class);
    }
}
