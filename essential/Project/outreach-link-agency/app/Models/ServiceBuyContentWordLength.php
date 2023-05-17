<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBuyContentWordLength extends Model
{
    use HasFactory, HasUuids;

    public function buyContent()
    {
        return $this->belongsTo(ServiceBuyContent::class, 'service_buy_content_id');
    }
}
