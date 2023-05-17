<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBuyContent extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['name', 'price', 'service_id'];

    public function wordLength()
    {
        return $this->hasMany(ServiceBuyContentWordLength::class);
    }

    public function serviceType()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
