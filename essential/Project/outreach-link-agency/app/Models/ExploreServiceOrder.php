<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExploreServiceOrder extends Model
{
    use HasFactory, HasUuids;

    public function orderDetails()
    {
        return $this->hasOne(ExploreServiceOrderDetails::class, 'explore_service_order_id');
    }

    public function exploreSiteModification()
    {
        return $this->hasMany(ExploreSiteModification::class);
    }

    public function exploreSite()
    {
        return $this->belongsTo(ExploreSite::class, 'exploresite_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function wordLength()
    {
        return $this->belongsTo(ServiceBuyContentWordLength::class, 'service_buy_content_word_length_id');
    }
}
