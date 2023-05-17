<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordContentOrder extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'reference_id',
        'word_content_id',
        'user_id',
        'total_price',
        'quantity',
        'txn',
        'status',
        'payment_method',
        'payment_status',
    ];

    public function word_content()
    {
        return $this->belongsTo(WordContent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function word_content_order_detail()
    {
        return $this->hasMany(WordContentOrderDetail::class);
    }

    public function contentOrderModification()
    {
        return $this->hasMany(ContentOrderModification::class);
    }
}
