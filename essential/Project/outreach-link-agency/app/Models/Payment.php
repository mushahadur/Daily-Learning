<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'payment_id',
        'payer_id',
        'payer_email',
        'amount',
        'currency',
        'payment_status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
